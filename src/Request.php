<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer;

use UpdateServer\Exceptions\UnsupportedReleaseException;

class Request {
	/** @var int|null */
	private $majorVersion = null;
	/** @var int|null */
	private $minorVersion = null;
	/** @var int|null */
	private $maintenanceVersion = null;
	/** @var int|null */
	private $revisionVersion = null;
	/** @var float|null */
	private $installationMtime = null;
	/** @var int|null */
	private $lastCheck = null;
	/** @var null|string */
	private $channel = null;
	/** @var null|string */
	private $edition;
	/** @var null|string */
	private $build;
	/** @var null|string */
	private $remoteAddress;
	/** PHP version defaults to 5.4.0 because all Nextcloud versions run at least with this PHP version */
	/** @var int|null */
	private $phpMajorVersion = '5';
	/** @var int|null */
	private $phpMinorVersion = '4';
	/** @var int|null */
	private $phpReleaseVersion = '0';
	/** @var int|null */
	private $category = null;
	/** @var int|null */
	private $isSubscriber = null;

	/**
	 * @param string $versionString
	 * @param array $server
	 * @throws UnsupportedReleaseException If the release is not supported by this update script.
	 */
	public function __construct($versionString,
								array $server) {
		$this->readVersion($versionString, $server);
	}

	/**
	 * @return int|null
	 */
	public function getMajorVersion() {
		return $this->majorVersion;
	}

	/**
	 * @return int|null
	 */
	public function getMinorVersion() {
		return $this->minorVersion;
	}

	/**
	 * @return int|null
	 */
	public function getMaintenanceVersion() {
		return $this->maintenanceVersion;
	}

	/**
	 * @return int|null
	 */
	public function getRevisionVersion() {
		return $this->revisionVersion;
	}

	/**
	 * @return float|null
	 */
	public function getInstallationMtime() {
		return $this->installationMtime;
	}

	/**
	 * @return int|null
	 */
	public function getLastCheck() {
		return $this->lastCheck;
	}

	/**
	 * @return null|string
	 */
	public function getChannel() {
		return $this->channel;
	}

	/**
	 * @return null|string
	 */
	public function getEdition() {
		return $this->edition;
	}

	/**
	 * @return null|string
	 */
	public function getBuild() {
		return $this->build;
	}

	/**
	 * @return null|string
	 */
	public function getRemoteAddress() {
		return $this->remoteAddress;
	}

	/**
	 * @return int|null
	 */
	public function getPHPMajorVersion() {
		return $this->phpMajorVersion;
	}

	/**
	 * @return int|null
	 */
	public function getPHPMinorVersion() {
		return $this->phpMinorVersion;
	}

	/**
	 * @return int|null
	 */
	public function getPHPReleaseVersion() {
		return $this->phpReleaseVersion;
	}

	/**
	 * @return int|null
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @return int|null
	 */
	public function isSubscriber() {
		return $this->isSubscriber;
	}

	/**
	 * @param string $versionString
	 * @param array $server
	 * @throws UnsupportedReleaseException If the release is not supported by this update script.
	 */
	private function readVersion($versionString, array $server) {
		$version = explode('x', $versionString);

		$this->remoteAddress = (isset($server['REMOTE_ADDR']) ? $server['REMOTE_ADDR'] : '');
		switch (count($version)) {
			case 14:
				$this->isSubscriber = (int) $version[13];
				$this->category = (int) $version[12];
				// no break
			case 12:
				if($version['9'] !== '') {
					$this->phpMajorVersion = (int)$version['9'];
				}
				if($version['10'] !== '') {
					$this->phpMinorVersion = (int)$version['10'];
				}
				if($version['11'] !== '') {
					$this->phpReleaseVersion = (int)$version['11'];
				}
				// no break
			case 9:
				$this->majorVersion = (int)$version['0'];
				$this->minorVersion = (int)$version['1'];
				$this->maintenanceVersion = (int)$version['2'];
				$this->revisionVersion = (int)$version['3'];
				$this->installationMtime = (float)$version['4'];
				$this->lastCheck = (int)$version['5'];
				$this->channel = $version['6'];
				$this->edition = $version['7'];
				$this->build = explode(' ', substr(urldecode($version['8']), 0, strrpos(urldecode($version['8']), ' ')))[0];
				// starting with nextcloud 17 there is no production channel anymore
				if ($this->channel === 'production') {
					$this->channel = 'stable';
				}
				break;
			default:
				throw new UnsupportedReleaseException;
		}

		// Nextcloud 11 at least runs on PHP 5.6 (so if there is PHP 5.4 and Nextcloud 11 detected we set it to PHP 5.6)
		if ($this->majorVersion === 11 &&
			$this->phpMajorVersion === '5' &&
			$this->phpMinorVersion === '4'
		) {
			$this->phpMinorVersion = '6';
		}
	}
}
