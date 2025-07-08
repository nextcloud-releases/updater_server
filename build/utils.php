<?php
declare(strict_types=1);

if (file_exists(__DIR__.'/enterprise_utils.php')) {
	require_once __DIR__.'/enterprise_utils.php';
}

const HOST_NEXTCLOUD = 'Nextcloud';
const HOST_GITHUB = 'GitHub';

/**
 * Load JSON from configuration file
 */
function loadJson(string $name): array {
	$filepath = dirname(__DIR__).'/config/'.$name.'.json';
	if (!is_file($filepath)) {
		throw new \Exception('JSON file '.$filepath.' not found');
	}

	return json_decode(file_get_contents($filepath), true, 30, JSON_THROW_ON_ERROR);
}

/**
 * Extract stability from release name
 *
 * @return string enterprise, stable or beta
 */
function getStabilityFromName(string $releaseName): string {
	if (preg_match('/alpha|beta|rc/i', $releaseName)) {
		return 'beta';
	}
	if (preg_match('/enterprise$/i', $releaseName)) {
		return 'enterprise';
	}

	return 'stable';
}

/**
 * Extract version info from release name
 */
function parseVersionName(string $releaseName): array {
	preg_match('/(\d+)\.(\d+).(\d+)(?: (.*))?/', $releaseName, $matches);
	[, $major, $minor, $patch] = $matches;
	$stability = getStabilityFromName($releaseName);
	return [
		'major' => $major,
		'minor' => $minor,
		'patch' => $patch,
		'modifier' => isset($matches[4]) ? $matches[4] : '',
		'stability' => $stability,
	];
}

function displayAsFile(array $generatedConfig) {
	echo '<?php',PHP_EOL,'declare(strict_types=1);',PHP_EOL,PHP_EOL,'return ';
	echo preg_replace(
		['/array\s*\(/', '/\)/', "/=>\s*\n\s*\[/", '/  /'],
		['[', ']', '=> [', "\t"],
		var_export($generatedConfig, true)
	);
	echo ';',PHP_EOL;
}

function buildDownloadUrl(string $releaseName, array $info, array $majorVersion, string $host = HOST_NEXTCLOUD, string $format = 'zip'): false|string {
	if (function_exists('buildEnterpriseDownloadUrl')) {
		$url = buildEnterpriseDownloadUrl($releaseName, $info, $majorVersion, $host, $format);
		if ($url !== null) {
			return $url;
		}
	}

	$formats = [
		'zip' => 'zip',
		'bz2' => 'tar.bz2',
	];

	switch ($host) {
		case HOST_NEXTCLOUD:
			return buildNextcloudDownloadUrl($releaseName, $info, $majorVersion, $formats[$format]);
		case HOST_GITHUB:
			return buildGithubDownloadUrl($releaseName, $info, $majorVersion, $formats[$format]);
	}

	return null;
}

function buildNextcloudDownloadUrl(string $releaseName, array $info, array $majorVersion, string $extension): false|string {
	$release = parseVersionName($releaseName);
	$downloadUrl = 'https://download.nextcloud.com/server/%s/nextcloud-%d.%d.%d%s.%s';

	return sprintf($downloadUrl,
		$release['modifier'] === '' ? 'releases' : 'prereleases',
		$release['major'],
		$release['minor'],
		$release['patch'],
		$release['modifier'] === '' ? '' : str_replace(' ', '', strtolower($release['modifier'])),
		$extension,
	);

}

function buildGithubDownloadUrl(string $releaseName, array $info, array $majorVersion, string $extension): false|string {
	$release = parseVersionName($releaseName);

	// No releases on GitHub before 30.0.12 and 31.0.6
	if (
		$release['major'] < 30
		|| ($release['major'] === 30 && $release['minor'] === 0 && $release['patch'] < 12)
		|| ($release['major'] === 31 && $release['minor'] === 0 && $release['patch'] < 6)
	) {
		return false;
	}

	$downloadUrl = 'https://github.com/nextcloud-releases/server/releases/download/v%1$d.%2$d.%3$d%4$s/nextcloud-%1$d.%2$d.%3$d%4$s.%5$s';

	return sprintf($downloadUrl,
		$release['major'],
		$release['minor'],
		$release['patch'],
		$release['modifier'] === '' ? '' : str_replace(' ', '', strtolower($release['modifier'])),
		$extension,
	);
}

function isEol(string $releaseName, array $majorVersion): bool {
	if (function_exists('isEnterpriseEol')) {
		$isEol = isEnterpriseEol($releaseName, $majorVersion);
		if ($isEol !== null) {
			return $isEol;
		}
	}

	if (!isset($majorVersion['eol'])) {
		return false;
	}

	return $majorVersion['eol'] <= date('Y-m');
}
