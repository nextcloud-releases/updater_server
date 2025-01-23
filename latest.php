<?php
declare(strict_types = 1);
require_once __DIR__.'/build/utils.php';

// Send headers
header('Content-Type: application/json');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Robots-Tag: none');
header('Content-Security-Policy: default-src \'none\';');

$channel = $_GET['channel'] ?? 'stable';
$phpVersion = $_GET['php'] ?? '';
if (!preg_match('/^\d{1,2}\.\d{1,2}(?:\.\d{1,2}(?: \w{,20})?)?$|^$/', $phpVersion)){
	http_response_code(400);
	echo json_encode(['error' => 'Invalid PHP version provided']);
	exit;
}

if (!in_array($channel, ['stable', 'beta', 'enterprise'])) {
	http_response_code(400);
	echo json_encode(['error' => 'Invalid channel provided']);
	exit;
}

// Filter suitable major versions
$majorVersions = loadJson('major_versions');
try {
	$enterpriseMajorVersions = loadJson('enterprise_major_versions');
	foreach($majorVersions as $name => $version) {
		if (isset($enterpriseMajorVersions[$name])) {
			$majorVersions[$name] = array_merge($version, $enterpriseMajorVersions[$name]);
		}
	}
	$majorVersions = array_replace_recursive($majorVersions + $enterpriseMajorVersions);
} catch (\Exception) {
	if ($channel === 'enterprise') {
		http_response_code(400);
		echo json_encode(['error' => 'Invalid channel provided']);
		exit;
	}
}

if ($phpVersion) {
	$majorVersions = array_filter($majorVersions, static function ($release) use ($phpVersion) {
		return version_compare($release['minPHP'], $phpVersion, '<=');
	});
}

if (empty($majorVersions)) {
	http_response_code(400);
	echo json_encode(['error' => 'No major version found for your version of PHP']);
	exit;
}
$suitableMajors = array_keys($majorVersions);

// Filter suitable releases
$allowedChannels = [$channel];
if ($channel === 'beta') {
	$allowedChannels[] = 'stable';
}
$releases = loadJson($channel === 'enterprise' ? 'enterprise_releases' : 'releases');
$releases = array_filter($releases, function ($name) use ($allowedChannels, $suitableMajors) {
	return in_array(getStabilityFromName($name), $allowedChannels)
		&& preg_match('/^('.implode('|', $suitableMajors).')\./', $name);
}, ARRAY_FILTER_USE_KEY);
uksort($releases, static fn($a, $b) => version_compare($a, $b, '<'));
if (empty($releases)) {
	http_response_code(400);
	echo json_encode(['error' => 'No version found for your version of PHP']);
	exit;
}
// Show latest
$release = key($releases);
$info = current($releases);
echo json_encode([
	'version' => $release,
	'url' => buildDownloadUrl($release, $info, $majorVersions[explode('.', $release)[0]]),
], JSON_UNESCAPED_SLASHES);

