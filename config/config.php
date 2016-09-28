<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

/**
 * Welcome to the almighty configuration file. In this file the update definitions for each version are released. Please
 * make sure to read below description of the config format carefully before proceeding.
 *
 * Nextcloud updates are delivered by a release channel, at the moment the following channels are available:
 *
 * - production
 * - stable
 * - beta
 * - daily
 *
 * With exception of daily (which is a daily build of master) all of them need to be configured manually. The config
 * array looks like the following:
 *
 * 'production' => [
 * 	'9.1' => [
 * 		'latest' => '10.0.0',
 * 		'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/upgrade.html',
 * 		// downloadUrl is an optional entry, if not specified the URL is generated using https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip
 * 		'downloadUrl' => 'https://download.nextcloud.com/foo.zip',
 * 		// internalVersion is an optional entry that defaults to latest if not set
 * 		'internalVersion' => '9.1.0'
 * 		// autoupdater is an optional boolean value to define whether the update should be just announced or also delivered
 * 		// defaults to true
 * 		'autoupdater' => true,
 * 	],
 * ]
 *
 * In this case if a Nextcloud with the major release of 8.2 sends an update request the 8.2.3 version is returned if the
 * current Nextcloud version is below 8.2.
 *
 * The search for releases in the config array is fuzzy and happens as following:
 * 	1. Major.Minor.Maintenance.Revision
 * 	2. Major.Minor.Maintenance
 * 	3. Major.Minor
 * 	4. Major
 *
 * Once a result has been found this one is taken. This allows it to define an update order in case some releases should
 * not be skipped. Let's take a look at an example:
 *
 * 'production' => [
 * 	'8.2.0' => [
 * 		'latest' => '8.2.1',
 * 		'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 	],
 * 	'8.2' => [
 * 		'latest' => '8.2.4',
 * 		'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 	],
 * 	'8.2.4' => [
 * 		'latest' => '9.0.0',
 * 		'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 	],
 * ]
 *
 * This configuration array would have the following meaning:
 *
 * 1. 8.2.0 instances would be delivered 8.2.1
 * 2. All instances below 8.2.4 EXCEPT 8.2.0 would be delivered 8.2.4
 * 3. 8.2.4 instances get 9.0.0 delivered
 *
 * Oh. And be a nice person and also adjust the integration tests at /tests/integration/features/update.feature after doing
 * a change to the update logic. That way you can also ensure that your changes will do what you wanted them to do. The
 * tests are automatically executed on Travis or you can do it locally:
 *
 * 	- php -S localhost:8888 ./index.php &
 * 	- cd tests/integration/ && ../../vendor/bin/behat .
 */

return [
	'production' => [
		'9.1' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
		'9.0' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
	],
	'stable' => [
		'9.1' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
		'9.0' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
	],
	'beta' => [
		'9.1' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
		'9.0' => [
			'latest' => '10.0.1',
			'internalVersion' => '9.1.1.5',
			'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.1.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
	],
	'daily' => [
		'9.1' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable10.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
		],
		'9.0' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
		],
	],
];
