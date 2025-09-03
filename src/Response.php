<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer;

class Response {
	/** @var Config */
	private $config;
	/** @var Request */
	private $request;

	/**
	 * @param Request $request
	 * @param Config $config
	 */
	public function __construct(Request $request,
								Config $config
	) {
		$this->request = $request;
		$this->config = $config;
	}

	/**
	 * @return array
	 */
	private function getFuzzySearches() {
		$searches = [];
		// The search scheme is defined as following:
		// 1. Major.Minor.Maintenance.Revision
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion().'.'.$this->request->getRevisionVersion();
		// 2. Major.Minor.Maintenance
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion();
		// 3. Major.Minor
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion();
		// 4. Major
		$searches[] = $this->request->getMajorVersion();
		return $searches;
	}

	/**
	 * @param \XMLWriter $writer
	 * @param $version
	 */
	private function addChangelogURLIfApplicable(\XMLWriter $writer, $version) {
		if(version_compare($version, '13.99.0', '<')) {
			return;
		}

		$versionString = implode('.', array_slice(explode('.', $version), 0, 3));
		$preReleasePos = strpos($versionString, ' ');
		if($preReleasePos !== false) {
			$versionString = substr($versionString, 0, $preReleasePos);
		}

		$changesUrl = rtrim($this->config->get('_settings')['changelogServer'], '/')
			. '/?version=' . urlencode($versionString);

		$writer->writeElement('changes', $changesUrl);
	}

	/**
	 * Code for the stable editions
	 *
	 * @param array $versions
	 * @param string $completeCurrentVersion
	 * @param string $phpVersion
	 * @param int $installationMtime
	 * @return string
	 */
	private function getStableResponse(
		array $versions,
		$completeCurrentVersion,
		$phpVersion,
		$installationMtime
	) {
		$newVersion = '';
		foreach($this->getFuzzySearches() as $search) {
			if(isset($versions[$search])) {
				/** @var array $newVersions */
				$newVersions = $versions[$search];

				$counter = 100;
				$instanceChance = (int)substr($installationMtime, -2);
				if($instanceChance !== 0) {
					ksort($newVersions);
				}

				foreach($newVersions as $chance => $updateOptions) {
					$counter -= $chance;
					if($instanceChance <= (100 - $counter)) {
						// skip incompatible releases due to PHP version
						if(isset($newVersions[$chance]['minPHPVersion']) && version_compare($newVersions[$chance]['minPHPVersion'], $phpVersion, '>')) {
							continue;
						}
						// skip incompatible releases due to lower version number
						if(version_compare($newVersions[$chance]['internalVersion'], $completeCurrentVersion, '<=')) {
							continue;
						}
						$newVersion = $newVersions[$chance];
						break 2;
					}
				}
			}
		}

		if($newVersion === '') {
			return '';
		}

		$isEol = $newVersion['eol'] ? $newVersion['eol'] <= date('Y-m-d') : false;

		$writer = new \XMLWriter();
		$writer->openMemory();
		$writer->startDocument('1.0','UTF-8');
		$writer->setIndent(4);
		$writer->startElement('nextcloud');
		$writer->writeElement('version', $newVersion['internalVersion']);
		$writer->writeElement('versionstring', 'Nextcloud '.$newVersion['latest']);
		$writer->writeElement('url', $newVersion['downloadUrl']);
		$writer->startElement('downloads');
		foreach ($newVersion['downloads'] as $format => $urls) {
			foreach ($urls as $url) {
				$writer->writeElement($format, $url);
			}
		}
		$writer->endElement();
		$writer->writeElement('web', $newVersion['web']);
		$this->addChangelogURLIfApplicable($writer, $newVersion['latest']);
		$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : 1);
		$writer->writeElement('eol', (int) $isEol);
		$writer->writeElement('eolDate', $newVersion['eol']);
		if(isset($newVersion['signature'])) {
			$writer->writeElement('signature', $newVersion['signature']);
		}
		$writer->endElement();
		$writer->endDocument();
		return $writer->flush();
	}

	/**
	 * Code for the daily builds
	 *
	 * @param array $versions
	 * @return string
	 */
	private function getDailyResponse(array $versions) {
		foreach($this->getFuzzySearches() as $search) {
			if(isset($versions[$search])) {
				if((time() - strtotime($this->request->getBuild())) > 172800) {
					$newVersion = $versions[$search];
					$isEol = $newVersion['eol'] ? $newVersion['eol'] <= date('Y-m-d') : false;
					$writer = new \XMLWriter();
					$writer->openMemory();
					$writer->startDocument('1.0','UTF-8');
					$writer->setIndent(4);
					$writer->startElement('nextcloud');
					$writer->writeElement('version', '100.0.0.0');
					$writer->writeElement('versionstring', 'Nextcloud daily');
					$writer->writeElement('url', $newVersion['downloadUrl']);
					$writer->startElement('downloads');
					$writer->writeElement('zip', $newVersion['downloadUrl']);
					$writer->endElement();
					$writer->writeElement('web', $newVersion['web']);
					$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : 1);
					$writer->writeElement('eol', (int) $isEol);
					$writer->writeElement('eolDate', $newVersion['eol']);
					$writer->endElement();
					$writer->endDocument();
					return $writer->flush();
				}
			}
		}

		return '';
	}

	/**
	 * @return string
	 */
	public function buildResponse() {
		$completeCurrentVersion = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion().'.'.$this->request->getRevisionVersion();
		$phpVersion = implode(
			'.',
			[
				$this->request->getPHPMajorVersion(),
				$this->request->getPHPMinorVersion(),
				$this->request->getPHPReleaseVersion(),
			]
		);

		$completeCurrentVersion = rtrim($completeCurrentVersion, '.');

		switch ($this->request->getChannel()) {
			case 'enterprise':
				return $this->getStableResponse(
					$this->config->getWithAlternative('enterprise', 'stable'),
					$completeCurrentVersion,
					$phpVersion,
					$this->request->getInstallationMtime()
				);
			case 'beta':
				$betaVersion = $this->getStableResponse(
					$this->config->get('beta'),
					$completeCurrentVersion,
					$phpVersion,
					$this->request->getInstallationMtime()
				);
				if ($betaVersion !== '') {
					return $betaVersion;
				}
				// no break
			case 'stable':
				return $this->getStableResponse(
					$this->config->get('stable'),
					$completeCurrentVersion,
					$phpVersion,
					$this->request->getInstallationMtime()
				);
			case 'daily':
				return $this->getDailyResponse($this->config->get('daily'));
			default:
				return '';
		}
	}
}
