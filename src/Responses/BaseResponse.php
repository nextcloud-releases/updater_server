<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer\Responses;

use UpdateServer\Config;

abstract class BaseResponse {
	/** @var Config */
	private $config;

	/**
	 * @param Config $config
	 */
	protected function __construct(Config $config) {
		$this->config = $config;
	}

	/**
	 * @param string $channel
	 */
	protected function getChannelConfig(string $channel): array {
		switch ($channel) {
			case 'enterprise':
				return $this->config->getWithAlternative('enterprise', 'stable');
			case 'stable':
				return $this->config->get('stable');
			case 'beta':
				return $this->config->get('beta');
			case 'daily':
				return $this->config->get('daily');
			default:
				return [];
		}
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
	 * @param array $newVersion
	 * @return string
	 */
	protected function buildXMLForVersion(array $newVersion): string {
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
		$this->addChangelogURLIfApplicable($writer, $newVersion['latest']);
		$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : 1);
		$writer->writeElement('eol', (int) $newVersion['eol']);
		if(isset($newVersion['signature'])) {
			$writer->writeElement('signature', $newVersion['signature']);
		}
		$writer->endElement();
		$writer->endDocument();
		return $writer->flush();
	}

	/**
	 * @param array $newVersion
	 * @return string
	 */
	protected function buildXMLForDailyVersion(array $newVersion): string {
		$writer = new \XMLWriter();
		$writer->openMemory();
		$writer->startDocument('1.0','UTF-8');
		$writer->setIndent(4);
		$writer->startElement('nextcloud');
		$writer->writeElement('version', '100.0.0.0');
		$writer->writeElement('versionstring', 'Nextcloud daily');
		$writer->writeElement('url', $newVersion['downloadUrl']);
		$writer->writeElement('web', $newVersion['web']);
		$writer->writeElement('autoupdater', isset($newVersion['autoupdater']) ? (int)$newVersion['autoupdater'] : 1);
		$writer->writeElement('eol', (int) $newVersion['eol']);
		$writer->endElement();
		$writer->endDocument();
		return $writer->flush();
	}

	public abstract function buildResponse(): string;
}
