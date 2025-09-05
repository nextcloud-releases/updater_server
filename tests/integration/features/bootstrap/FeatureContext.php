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
	/** @var int */
	private $categoryId = '';
	/** @var bool */
	private $subscriptionRegistered = false;
	/** @var string */
	private $result = '';
	/** @var array */
	private $resultArray = [];
	private ?string $phpVersion = null;

	/**
	 * @Given There is a release with channel :arg1
	 */
	public function thereIsAReleaseWithChannel($arg1): void {
		$this->releaseChannel = $arg1;
	}

	/**
	 * @Given The received version is :version
	 */
	public function theReceivedVersionIs($version): void {
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
	public function theReceivedPHPVersionIs($version): void {
		$version = explode('.', $version);

		$this->phpMajorVersion = $version[0];
		$this->phpMinorVersion = $version[1];
		$this->phpReleaseVersion = $version[2];
	}

	/**
	 * @Given The received build is :arg1
	 */
	public function theReceivedBuildIs($arg1): void {
		$this->build = $arg1;
	}

	/**
	 * @Given the installation mtime is :time
	 */
	public function theInstallationMtimeIs($time): void {
		$this->installationMtime = $time;
	}

   /**
     * @Given the instance category is :categoryId
     */
    public function theInstanceCategoryIs($categoryId): void {
        $this->categoryId = $categoryId;
    }

    /**
     * @Given the instance has a subscription
     */
    public function theInstanceHasASubscription(): void {
        $this->subscriptionRegistered = true;
    }

    /**
     * @Given the instance has no subscription
     */
    public function theInstanceHasNoSubscription(): void {
        $this->subscriptionRegistered = false;
    }

	/**
	 * Builds the version to sent
	 */
	private function buildVersionToSend(): string {
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

		if ($this->phpMajorVersion !== '') {
			$parameters[] = $this->phpMajorVersion;
			$parameters[] = $this->phpMinorVersion;
			$parameters[] = $this->phpReleaseVersion;
		}

		if ($this->categoryId) {
			$parameters[] = $this->categoryId;
			$parameters[] = (int) $this->subscriptionRegistered;
		}

		return implode('x', $parameters);
	}

	/**
	 * @When /^The request is sent$/
	 */
	public function theRequestIsSent(): void {
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
	public function theSignatureIs(\Behat\Gherkin\Node\PyStringNode $string): void {
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
	public function noSignatureIsSet(): void {
		if(isset($this->resultArray['signature'])) {
			throw new \Exception('Signature is set');
		}
	}

	/**
	 * @Then The response is non-empty
	 */
	public function theResponseIsNonEmpty(): void {
		if(empty($this->result)) {
			throw new \Exception('Response is empty');
		}

		$xml = simplexml_load_string($this->result);
		$json = json_encode($xml);
		$this->resultArray = json_decode($json, TRUE);
		$nbResults = count($this->resultArray);
		if($nbResults < 8 || $nbResults > 10) {
			throw new \Exception('Response doesn’t contain between 8 and 10 elements ('.$nbResults.' found).');
		}
	}
	/**
	 * @Then The JSON response is non-empty
	 */
	public function theJsonResponseIsNonEmpty(): void {
		if(empty($this->result)) {
			throw new \Exception('Response is empty');
		}

		$this->resultArray = json_decode($this->result, true);
	}

	/**
	 * @Then Update to version :arg1 is available
	 */
	public function updateToVersionIsAvailable($arg1): void {
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
	public function urlToDownloadIs($arg1): void {
		$url = $this->resultArray['url'];
		if(empty($url)) {
			throw new \Exception('URL is empty in result array');
		}
		if($url !== $arg1) {
			throw new \Exception("Expected url $arg1 does not equals $url");
		}
	}

	/**
	 * @Then Download URLs contain :url
	 */
	public function downloadUrlsContainsUrl(string $url): void {
		$downloads = $this->resultArray['downloads'];
		if(empty($downloads)) {
			throw new \Exception('Download array is empty');
		}
		$ext = pathinfo($url, PATHINFO_EXTENSION);
		if (empty($downloads[$ext])) {
			throw new \Exception('Download array doesn’t contain '.$ext.' downloads.');
		}

		if (!in_array($url, (array) $downloads[$ext], true)) {
			throw new \Exception('Download array doesn’t contain URL '.$url);
		}
	}

	/**
	 * @Then URL to documentation is :arg1
	 */
	public function urlToDocumentationIs($arg1): void {
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
	public function urlToChangelogIs($arg1): void {
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
	public function theResponseIsEmpty(): void {
		if($this->result !== '') {
			throw new \Exception('Response is not empty:' . PHP_EOL . PHP_EOL . $this->result);
		}
	}

	/**
	 * @Then Autoupdater is set to :autoupdaterValue
	 */
	public function autoupdaterIsSetTo($autoupdaterValue): void {
		$autoupdater = $this->resultArray['autoupdater'];
		if($autoupdater !== $autoupdaterValue) {
			throw new \Exception("Expected autoupdate $autoupdaterValue does not equals $autoupdater");
		}
	}

	/**
	 * @Then EOL is set to :eolValue
	 */
	public function eolIsSetTo($eolValue): void {
		$eol = $this->resultArray['eol'];
		if($eol !== $eolValue) {
			throw new \Exception("Expected eol $eolValue does not equals $eol");
		}
	}

	/**
	 * @Then EOL date is set to :expectedEolDate
	 */
	public function eolDateIsSetTo(string $expectedEolDate): void {
		$eolDate = $this->resultArray['eolDate'];
		if ($eolDate === []) {
			$eolDate = '';
		}
		if($eolDate !== $expectedEolDate) {
			throw new \Exception("Expected EOL date $expectedEolDate doesn’t equals $eolDate");
		}

		// Empty EOL date means version never expire
		if ($eolDate === '') {
			$eolDate = '9999-99-99';
		}
		$isEol = $this->resultArray['eol'];
		$expectedIsEol = date('Y-m-d') > $eolDate ? '1' : '0';
		if($isEol !== $expectedIsEol) {
			throw new \Exception($expectedIsEol
				? 'Version have reached EOL on '.$expectedEolDate
				: 'Version didn’t reached EOL (expected on '.$expectedEolDate.')'
			);
		}
	}

	/**
	 * @Given I want to know the latest :channel release
	 */
    public function iWantToKnowTheLatestRelease(string $channel): void
    {
        $this->channel = $channel;
    }

	/**
	 * @Given I use PHP ":phpVersion"
	 */
    public function iUsePhp($phpVersion): void
    {
		$this->phpVersion = $phpVersion;
    }

	/**
	 * @When I send a request latest.php
	 */
    public function iSendARequestLatestPhp(): void
    {
		$ch = curl_init();
		$params = [
			'channel' => $this->channel,
		];
		if ($this->phpVersion !== null) {
			$params['php'] = $this->phpVersion;
		}
		$optArray = array(
			CURLOPT_URL => 'http://localhost:8888/latest.php?'.http_build_query($params),
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$this->result = curl_exec($ch);
		curl_close($ch);
    }

	/**
	 * @Then Version :expectedVersion is the latest release
	 */
    public function versionIsTheLatestRelease($expectedVersion): void
    {
		if (($this->resultArray['version'] ?? '') === '') {
			throw new \Exception("Version number is empty");
		}
		$foundVersion = $this->resultArray['version'];
		if ($foundVersion !== $expectedVersion) {
			throw new \Exception("Version number $foundVersion is different from expected version $expectedVersion");
		}
    }

	/**
	 * @Then I get error ":expectedError"
	 */
    public function iGetError($expectedError): void
    {
		if (($this->resultArray['error'] ?? '') === '') {
			throw new \Exception("Error message is empty");
		}
		$foundError = $this->resultArray['error'];
		if ($foundError !== $expectedError) {
			throw new \Exception("Error message $foundError is different from expected error $expectedError");
		}

    }
}
