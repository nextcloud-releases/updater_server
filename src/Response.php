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
								Config $config) {
		$this->request = $request;
		$this->config = $config;
	}

	/**
	 * @return array
	 */
	private function getFuzzySearches() {
		// The search scheme is defined as following:
		// 1. Major.Minor.Maintenance.Revision
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion().'.'.$this->request->getRevisionVersion();
		// 2. Major.Minor.Maintenance
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion();
		// 3. Major.Minor
		$searches[] = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion();
		// 4. Major
		$searches[] = $this->request->getMajorVersion();
		// 5. Major . 0
		$searches[] = $this->request->getMajorVersion().'.0';
		return $searches;
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
	private function getStableResponse(array $versions,
									   $completeCurrentVersion,
									   $phpVersion,
									   $installationMtime) {
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
						$newVersion = $newVersions[$chance];
						break;
					}
				}

				if (!isset($newVersion['internalVersion'])) {
					$newVersion['internalVersion'] = $newVersion['latest'];
				}

				// skip incompatible releases
				if(isset($newVersion['minPHPVersion']) && version_compare($newVersion['minPHPVersion'], $phpVersion, '>')) {
					$newVersion = '';
					continue;
				}

				if(version_compare($newVersion['internalVersion'], $completeCurrentVersion, '<=')) {
					return '';
				} else {
					break;
				}
			}
		}

		if($newVersion === '') {
			return '';
		}

		$downloadUrl = 'https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip';
		if(isset($newVersion['downloadUrl'])) {
			$downloadUrl = $newVersion['downloadUrl'];
		}

		$writer = new \XMLWriter();
		$writer->openMemory();
		$writer->startDocument('1.0','UTF-8');
		$writer->setIndent(4);
		$writer->startElement('nextcloud');
		$writer->writeElement('version', $newVersion['internalVersion']);
		$writer->writeElement('versionstring', 'Nextcloud '.$newVersion['latest']);
		$writer->writeElement('url', $downloadUrl);
		$writer->writeElement('web', $newVersion['web']);
		$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : true);
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
					$writer = new \XMLWriter();
					$writer->openMemory();
					$writer->startDocument('1.0','UTF-8');
					$writer->setIndent(4);
					$writer->startElement('nextcloud');
					$writer->writeElement('version', '100.0.0.0');
					$writer->writeElement('versionstring', 'Nextcloud daily');
					$writer->writeElement('url', $newVersion['downloadUrl']);
					$writer->writeElement('web', $newVersion['web']);
					$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : true);
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
			case 'production':
				return $this->getStableResponse(
					$this->config->get('production'),
					$completeCurrentVersion,
					$phpVersion,
					$this->request->getInstallationMtime()
				);
			case 'stable':
				return $this->getStableResponse(
					$this->config->get('stable'),
					$completeCurrentVersion,
					$phpVersion,
					$this->request->getInstallationMtime()
				);
			case 'beta':
				return $this->getStableResponse(
					$this->config->get('beta'),
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
