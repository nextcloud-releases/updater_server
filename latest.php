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
$filterVersion = $_GET['version'] ?? '';
// If only major version is provided, force the `.`
if (filter_var($filterVersion, FILTER_VALIDATE_INT)) {
	$filterVersion .= '.';
}
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
$releases = array_filter($releases, function ($name) use ($allowedChannels, $suitableMajors, $filterVersion) {
	return in_array(getStabilityFromName($name), $allowedChannels)
		&& preg_match('/^('.implode('|', $suitableMajors).')\./', $name)
		&& ($filterVersion === '' | str_starts_with($name, $filterVersion));
}, ARRAY_FILTER_USE_KEY);
uksort($releases, static fn($a, $b) => version_compare($a, $b, '<'));
if (empty($releases)) {
	http_response_code(400);
	echo json_encode(['error' => 'No version found for your version of PHP']);
	exit;
}

$release = key($releases);
$info = current($releases);

// Build URLs
$major = $majorVersions[explode('.', $release)[0]];
$downloads = [];
$formats = ['zip', 'bz2'];
$sources = [HOST_GITHUB, HOST_NEXTCLOUD];
foreach ($formats as $format) {
	$downloads[$format] = [];
	foreach ($sources as $source) {
		$downloads[$format][] = buildDownloadUrl($release, $info, $major, $source, $format);
	}
	$downloads[$format] = array_values(array_filter($downloads[$format]));
}

// Show latest
echo json_encode([
	'version' => $release,
	'url' => buildDownloadUrl($release, $info, $majorVersions[explode('.', $release)[0]]),
	'downloads' => $downloads,
], JSON_UNESCAPED_SLASHES);

