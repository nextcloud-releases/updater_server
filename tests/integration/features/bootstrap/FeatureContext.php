<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

class FeatureContext implements Context, SnippetAcceptingContext {
	/** @var string */
	private $releaseChannel = '';
	/** @var string */
	private $majorVersion = '';
	/** @var string */
	private $minorVersion = '';
	/** @var string */
	private $maintenanceVersion = '';
	/** @var string */
	private $revisionVersion = '';
	/** @var string */
	private $installationMtime = '';
	/** @var string */
	private $lastCheck = '';
	/** @var string  */
	private $edition = '';
	/** @var string */
	private $build = '';
	/** @var string */
	private $phpMajorVersion = '';
	/** @var string */
	private $phpMinorVersion = '';
	/** @var string */
	private $phpReleaseVersion = '';
	/** @var string */
	private $result = '';
	/** @var array */
	private $resultArray = [];

	/**
	 * @Given There is a release with channel :arg1
	 */
	public function thereIsAReleaseWithChannel($arg1) {
		$this->releaseChannel = $arg1;
	}

	/**
	 * @Given The received version is :version
	 */
	public function theReceivedVersionIs($version) {
		$version = explode('.', $version);

		$this->majorVersion = $version[0];
		$this->minorVersion = $version[1];
		$this->maintenanceVersion = $version[2];
		$this->revisionVersion = '';
		if(isset($version[3])) {
			$this->revisionVersion = $version[3];
		}
	}

	/**
	 * @Given The received PHP version is :version
	 */
	public function theReceivedPHPVersionIs($version) {
		$version = explode('.', $version);

		$this->phpMajorVersion = $version[0];
		$this->phpMinorVersion = $version[1];
		$this->phpReleaseVersion = $version[2];
	}

	/**
	 * @Given The received build is :arg1
	 */
	public function theReceivedBuildIs($arg1) {
		$this->build = $arg1;
	}

	/**
	 * @Given the installation mtime is :time
	 */
	public function theInstallationMtimeIs($time) {
		$this->installationMtime = $time;
	}

	/**
	 * Builds the version to sent
	 *
	 * @return string
	 */
	private function buildVersionToSend() {
		$parameters = [
			$this->majorVersion,
			$this->minorVersion,
			$this->maintenanceVersion,
			$this->revisionVersion,
			$this->installationMtime,
			$this->lastCheck,
			$this->releaseChannel,
			$this->edition,
			$this->build,
		];

		if($this->phpMajorVersion !== '') {
			$parameters[] = $this->phpMajorVersion;
			$parameters[] = $this->phpMinorVersion;
			$parameters[] = $this->phpReleaseVersion;
		}

		return implode('x', $parameters);
	}

	/**
	 * @When /^The request is sent$/
	 */
	public function theRequestIsSent() {
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => 'http://localhost:8888/?version='.$this->buildVersionToSend(),
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$this->result = curl_exec($ch);
		curl_close($ch);
	}

	/**
	 * @Then The signature is
	 *
	 * @param \Behat\Gherkin\Node\PyStringNode $string
	 * @throws Exception
	 */
	public function theSignatureIs(\Behat\Gherkin\Node\PyStringNode $string) {
		if(isset($this->resultArray['signature'])) {
			if($this->resultArray['signature'] === $string->getRaw()) {
				return;
			}
		}

		throw new \Exception(sprintf('Invalid signature, got %s', $this->resultArray['signature']));
	}

	/**
	 * @Then No signature is set
	 */
	public function noSignatureIsSet()  {
		if(isset($this->resultArray['signature'])) {
			throw new \Exception('Signature is set');
		}
	}

	/**
	 * @Then The response is non-empty
	 */
	public function theResponseIsNonEmpty() {
		if(empty($this->result)) {
			throw new \Exception('Response is empty');
		}

		$xml = simplexml_load_string($this->result);
		$json = json_encode($xml);
		$this->resultArray = json_decode($json, TRUE);
		if(count($this->resultArray) < 6 || count($this->resultArray) > 8) {
			throw new \Exception('Response contains not between 6 or 8 array elements.');
		}
	}

	/**
	 * @Then Update to version :arg1 is available
	 */
	public function updateToVersionIsAvailable($arg1) {
		$version = $this->resultArray['version'];
		if(empty($version)) {
			throw new \Exception('Version is empty in result array');
		}
		if($version !== $arg1) {
			throw new \Exception("Expected version $arg1 does not equals $version");
		}
	}

	/**
	 * @Then URL to download is :arg1
	 */
	public function urlToDownloadIs($arg1) {
		$url = $this->resultArray['url'];
		if(empty($url)) {
			throw new \Exception('URL is empty in result array');
		}
		if($url !== $arg1) {
			throw new \Exception("Expected url $arg1 does not equals $url");
		}
	}

	/**
	 * @Then URL to documentation is :arg1
	 */
	public function urlToDocumentationIs($arg1) {
		$web = $this->resultArray['web'];
		if(empty($web)) {
			throw new \Exception('web is empty in result array');
		}
		if($web !== $arg1) {
			throw new \Exception("Expected web $arg1 does not equals $web");
		}
	}

	/**
	 * @Then URL to changelog is :arg1
	 */
	public function urlToChangelogIs($arg1) {
		$changesUrl = $this->resultArray['changes'];
		if(empty($changesUrl)) {
			throw new \Exception('changes is empty in result array');
		}
		if($changesUrl !== $arg1) {
			throw new \Exception("Expected changes $arg1 does not equals $changesUrl");
		}
	}

	/**
	 * @Then The response is empty
	 */
	public function theResponseIsEmpty() {
		if($this->result !== '') {
			throw new \Exception('Response is not empty:' . PHP_EOL . PHP_EOL . $this->result);
		}
	}

	/**
	 * @Then Autoupdater is set to :arg1
	 */
	public function autoupdaterIsSetTo($autoupdaterValue) {
		$autoupdater = $this->resultArray['autoupdater'];
		if($autoupdater !== $autoupdaterValue) {
			throw new \Exception("Expected autoupdate $autoupdaterValue does not equals $autoupdater");
		}
	}

	/**
	 * @Then EOL is set to :arg1
	 */
	public function eolIsSetTo($eolValue) {
		$eol = $this->resultArray['eol'];
		if($eol !== $eolValue) {
			throw new \Exception("Expected eol $eolValue does not equals $eol");
		}
	}
}
