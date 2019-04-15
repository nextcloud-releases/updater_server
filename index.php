<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

require_once __DIR__ . '/vendor/autoload.php';

// Set the default timezone to Europe/Berlin
date_default_timezone_set('Europe/Berlin');

// Set Content-Type to XML
header('Content-Type: application/xml');
// Enforce browser based XSS filters
header('X-XSS-Protection: 1; mode=block');
// Disable sniffing the content type for IE
header('X-Content-Type-Options: nosniff');
// Disallow iFraming from other domains
header('X-Frame-Options: Sameorigin');
// https://developers.google.com/webmasters/control-crawl-index/docs/robots_meta_tag
header('X-Robots-Tag: none');

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
	isset($_SERVER['PATH_INFO']) &&
	substr($_SERVER['PATH_INFO'], -5) === '/hook' &&
	isset($_SERVER['HTTP_X_HUB_SIGNATURE']) &&
	isset($_SERVER['HTTP_X_GITHUB_EVENT']) &&
	$_SERVER['HTTP_X_GITHUB_EVENT'] === 'push') {

	if (!file_exists(__DIR__ . '/config/secrets.php')) {
		exit();
	}
	try {
		$config = new \UpdateServer\Config(__DIR__ . '/config/secrets.php');
	} catch (\RuntimeException $e) {
		exit();
	}
	$webhookSecret = $config->get('githubWebhookSecret');
	$branch = $config->get('githubWebhookBranch');
	if (!is_string($webhookSecret) || !is_string($branch)) {
		exit();
	}

	$body = file_get_contents('php://input');
	$expectedSecretHeader = $_SERVER['HTTP_X_HUB_SIGNATURE'];
	$actualSecret = 'sha1=' . hash_hmac('sha1', $body, $webhookSecret);

	if ($actualSecret !== $expectedSecretHeader) {
		exit();
	}

	$data = json_decode($body, true);

	if (!is_array($data)) {
		exit();
	}

	if (isset($data['ref']) && $data['ref'] === 'refs/heads/' . $branch) {
		$escapedDir = escapeshellarg(__DIR__);
		exec("cd $escapedDir && git pull");
		echo "Deployed";
	}

	exit();
}

// Return empty response if no version is supplied
if(!isset($_GET['version']) || !is_string($_GET['version'])) {
	exit();
}

// Parse the request
try {
	$request = new \UpdateServer\Request($_GET['version'], $_SERVER);
} catch (\UpdateServer\Exceptions\UnsupportedReleaseException $e) {
	exit();
}

try {
	$config = new \UpdateServer\Config(__DIR__ . '/config/config.php');
} catch (\RuntimeException $e) {
	exit();
}

// Return a response
$response = new \UpdateServer\Response($request, $config);
echo $response->buildResponse();
