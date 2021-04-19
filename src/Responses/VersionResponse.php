<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer\Responses;

use UpdateServer\Config;
use UpdateServer\Requests\VersionRequest;

class VersionResponse extends BaseResponse {
	/** @var VersionRequest */
	private $request;

	/**
	 * @param VersionRequest $request
	 * @param Config $config
	 */
	public function __construct(VersionRequest $request, Config $config) {
		parent::__construct($config);
		$this->request = $request;
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

		return $this->buildXMLForVersion($newVersion);
	}

	/**
	 * Code for the daily builds
	 *
	 * @param array $versions
	 * @return string
	 */
	private function getDailyResponse(array $versions) {
		if ((time() - strtotime($this->request->getBuild())) <= 172800) {
			return '';
		}

		foreach($this->getFuzzySearches() as $search) {
			if(isset($versions[$search])) {
				return $this->buildXMLForDailyVersion($versions[$search]);
			}
		}

		return '';
	}

	/**
	 * @return string
	 */
	public function buildResponse(): string {
		$completeCurrentVersion = $this->request->getMajorVersion().'.'.$this->request->getMinorVersion().'.'.$this->request->getMaintenanceVersion().'.'.$this->request->getRevisionVersion();
		$completeCurrentVersion = rtrim($completeCurrentVersion, '.');
		$phpVersion = implode(
			'.',
			[
				$this->request->getPHPMajorVersion(),
				$this->request->getPHPMinorVersion(),
				$this->request->getPHPReleaseVersion(),
			]
		);
		$channelConfig = $this->getChannelConfig($this->request->getChannel());

		if ($this->request->getChannel() !== 'daily') {
			return $this->getStableResponse(
				$channelConfig,
				$completeCurrentVersion,
				$phpVersion,
				$this->request->getInstallationMtime()
			);
		} else {
			return $this->getDailyResponse($channelConfig);
		}
	}
}
