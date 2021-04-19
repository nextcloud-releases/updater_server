<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer\Responses;

use UpdateServer\Config;
use UpdateServer\Requests\ChannelRequest;

class ChannelResponse extends BaseResponse {
	/** @var ChannelRequest */
	private $request;

	/**
	 * @param ChannelRequest $request
	 * @param Config $config
	 */
	public function __construct(ChannelRequest $request, Config $config) {
		parent::__construct($config);
		$this->request = $request;
	}

	/**
	 * @param string $channel
	 * @return array|null
	 */
	private function getBestVersionConfigForRegularChannel(string $channel): ?array {
		$channelConfig = $this->getChannelConfig($channel);
		$bestVersionConfig = null;
		$highestVersionNumber = null;
		foreach($channelConfig as $versionNumber => $releaseConfig) {
			if($highestVersionNumber === null || version_compare($highestVersionNumber, $versionNumber, '<')) {
				$highestProbability = 0;
				foreach($releaseConfig as $probability => $versionConfig) {
					if((int)$probability > $highestProbability && (!isset($versionConfig['eol']) || $versionConfig['eol'] !== true)) {
						$highestProbability = $probability;
						$bestVersionConfig = $versionConfig;
					}
				}
				if($highestProbability !== 0) {
					// Only increase the highestVersionNumber if we actually found a new version config.
					$highestVersionNumber = $versionNumber;
				}
			}
		}
		return $bestVersionConfig;
	}

	/**
	 * @return array|null
	 */
	private function getBestVersionConfigForDailyChannel(): ?array {
		$channelConfig = $this->getChannelConfig('daily');
		$bestVersionConfig = null;
		$highestVersionNumber = null;
		foreach($channelConfig as $versionNumber => $versionConfig) {
			if($highestVersionNumber === null || version_compare($highestVersionNumber, $versionNumber, '<')
				&& (!isset($versionConfig['eol']) || $versionConfig['eol'] !== true)) {
				$bestVersionConfig = $versionConfig;
				$highestVersionNumber = $versionNumber;
			}
		}
		return $bestVersionConfig;
	}

	/**
	 * @param string $channel
	 * @return array|null
	 */
	private function getBestVersionConfig(string $channel): ?array {
		return $channel !== 'daily' ? $this->getBestVersionConfigForRegularChannel($channel) : $this->getBestVersionConfigForDailyChannel();
	}

	public function buildResponse(): string {
		$bestVersion = $this->getBestVersionConfig($this->request->getChannel());
		if($bestVersion === null) {
			return '';
		}
		if ($this->request->getChannel() !== 'daily') {
			return $this->buildXMLForVersion($bestVersion);
		} else {
			return $this->buildXMLForDailyVersion($bestVersion);
		}
	}
}
