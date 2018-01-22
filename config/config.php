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
 * 		// 95% of instances on 9.1 will get this response
 * 		'95' => [
 * 			'latest' => '10.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/upgrade.html',
 * 			// downloadUrl is an optional entry, if not specified the URL is generated using https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip
 * 			'downloadUrl' => 'https://download.nextcloud.com/foo.zip',
 * 			// internalVersion
 * 			'internalVersion' => '9.1.0'
 * 			// autoupdater is an optional boolean value to define whether the update should be just announced or also delivered
 * 			// defaults to true
 * 			'autoupdater' => true,
 * 			// minPHPVersion is used to check the transferred PHP against this one here and allows to skip updates that are not compatible with this version of PHP
 * 			// if nothing is set the PHP version is not checked
 * 			'minPHPVersion' => '5.4',
 * 		],
 * 		// 5% of instances on 9.1 will get this response
 * 		'5' => [
 * 			'latest' => '11.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/upgrade.html',
 *			// downloadUrl is an optional entry, if not specified the URL is generated using https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip
 * 			'downloadUrl' => 'https://download.nextcloud.com/foo.zip',
 *			// internalVersion
 * 			'internalVersion' => '11.0.0'
 * 			// autoupdater is an optional boolean value to define whether the update should be just announced or also delivered
 * 			// defaults to true
 * 			'autoupdater' => true,
 *			// minPHPVersion is used to check the transferred PHP against this one here and allows to skip updates that are not compatible with this version of PHP
 * 			// if nothing is set the PHP version is not checked
 * 			'minPHPVersion' => '5.4',
 * 		],
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
 * 		'100' => [
 * 			'latest' => '8.2.1',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2' => [
 * 		'100' => [
 * 			'latest' => '8.2.4',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2.4' => [
 * 		'5' => [
 * 			'latest' => '9.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 		'95' => [
 * 			'latest' => '8.2.5',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * ]
 *
 * This configuration array would have the following meaning:
 *
 * 1. 8.2.0 instances would be delivered 8.2.1
 * 2. All instances below 8.2.4 EXCEPT 8.2.0 would be delivered 8.2.4
 * 3. 8.2.4 instances get 9.0.0 delivered with a 5% chance and 8.2.5 with a 95% chance
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
		'12' => [
			'100' => [
				'latest' => '12.0.4',
				'internalVersion' => '12.0.4.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
1lfbqYRCWrhsrulksMda/A==',
			],
		],
		'11' => [
			'49' => [
				'latest' => '12.0.4',
				'internalVersion' => '12.0.4.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
1lfbqYRCWrhsrulksMda/A==',
			],
			'51' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
/l4U06AGoCaWHiYAKXbHGg=='
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
/l4U06AGoCaWHiYAKXbHGg==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'minPHPVersion' => '5.4',
				'autoupdater' => '0',
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
	],
	'stable' => [
		'12' => [
			'100' => [
				'latest' => '12.0.4',
				'internalVersion' => '12.0.4.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
1lfbqYRCWrhsrulksMda/A==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.4',
				'internalVersion' => '12.0.4.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'pdpExf2i5sgwNzkP7fcOKWBcMoZzsSe8PwjZYYi0ZFlUqayQMnlVqmZ0Lc/hBWg/
AAuiH+WViv/dHfxECMlcHTVBFABCn8qqHlfllfEoLVGI2V3GoOOYdij72N5pFm3Z
8A8ccUEHso3QjdhiwcofSyJ5vxWdJZvruNIdW9M+UfW3Sm98HYoirRUEdvEBKJzZ
OOkWI1NexeTzPBErQneNvI1iXl5LSV9Ert4HfIVkMA8Wfpvt8X6tH7G5pGpBrky3
nc4UiS2SHl724076KdRNT3amt3XvhkSs6WukH6hAxiWIvygBVRYbAE2tUW+7UPoh
1lfbqYRCWrhsrulksMda/A==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'OaNjted6Hw/rpiE07lbWTCRgePzWO970h3/I2wRyXwctlYv5BKdFBF7Q2L6BG3ml
alihAAjVXU9kxK/YL40ZIK7MW2RwIXTOnNSzXbi4VqpX11UhshVvRqsR+xubg0jI
8aa1ahICZaezkfW32AdIOVmVxTfz7JOrxKEq1fg5/4n5z0J5jyBKkx2a2ZVLaMLO
Fs4ECJ2ntpMtD4+2X0V4TXNZN3LPpDHE5vwTBHcJr52R0+s96731FYRUGesGmsHb
xG0LjsK2vZOV4ZHT3tZPHGUV1Nrpfj5LIuCyPgn0w+XqTBm+AuF1W5MsgtDq0GOo
/l4U06AGoCaWHiYAKXbHGg==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'minPHPVersion' => '5.4',
				'autoupdater' => '0',
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
	],
	'beta' => [
		'13' => [
			'100' => [
				'latest' => '13.0.0 RC 2',
				'internalVersion' => '13.0.0.11',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.0RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'Nr+b4svVD6Y//JQKMiRn/VSYZrTlPpdQ+3oOYVR1VFrc9ZZr0SIV9/VxDHL6prbT
GRGSiMNBogq+mj12KC243w7TBOBT5x3zlEhbysHuNScAsKeAMf5dRlUFBb7klMEr
9gw+Q6B57XsVHT4lxEDgLrOVsQxuuXX39tVYZi4H+Abob/VBXnBwwFXgBYKUahkx
k8ZZNFeeXmvbIq4VcUoe3yg+dC7OpfVh6rEvlMlDLumGxk4Ht9gMP2fNeQvqOhib
oxxOER2kH0ATEBCOsVHSMBruViAkjltOBPCSoZY+j+ggjj9wjBEjbetGepXkSgtI
3N03uA/njV2Yx08qBHk+JQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '12.0.5 RC 2',
				'internalVersion' => '12.0.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.5RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'giCuXP8BjgzJPgRyNVCE5GdQPGMHQArQ2aW6EThT4NuxggmZUrl+3v7ZE0NdcDHM
TvQ0BUGBWRjGCQSK35Pl5yjMrraGWRIhHMkyMdY076zdLhWGLrQGJXpGhf9MQ4rS
whKtqB+ZID2ipAuVDEWZsJKUypBlF7XpSnkHPPfU6i/d4f+mhXj3ZTXOKgGBYH2N
QsX2MT2LFFggjqYqNewcNlfDYz30KNzJINcYBhy8VtLShP1/lxj/Z+wuGOYjFdHZ
Irs0S1UWs1QlqsurdJf7NwC5+TOqsZ8F3JvKYvcOZKcQiQfsM7KRZobXlu3d9vhC
7vZDXl3nnu/Dq78GrhEFIw==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '11.0.7 RC 2',
				'internalVersion' => '11.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
Ql8peu2DgUjoFYzF5YiIpg==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.7 RC 2',
				'internalVersion' => '11.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.7RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'X5rOHn9UJ0d78t1iiPbhm2DlXfEbd6A++YNPCwGoSBLBrJpLqoS2JBY7sjN5sZ+W
Skp7zu55p4NJZ31xAvsf3/ZmD7Nh17+Jq0PFvd97fEEn+mrT6adLBx9LHN4+Oyjz
8QXg0Pqj4Xs41EcvjkWVkqW2pK9IGoHC7j26D3k5NlqAHSIe4LeRg6QZgoyKtZPF
aUDRK+VfWRD8mu/hFk1CWfLCI3t0PSxYJ+C3j6L+6XPYYw4+oF/9qSm6Gki8qOcn
anPxbDr32MKDUgO4opS/KeSQtaNokhLjz25Crq9mtk60qcVDpcaNuGjgMTTGphpj
Ql8peu2DgUjoFYzF5YiIpg==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.6',
				'internalVersion' => '11.0.6.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'minPHPVersion' => '5.4',
				'autoupdater' => '0',
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
			],
		],
	],
	'daily' => [
		'14' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'minPHPVersion' => '7.0',
		],
		'13' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable13.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'minPHPVersion' => '5.6',
		],
		'12' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable12.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'minPHPVersion' => '5.6',
		],
		'11' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable11.zip',
			'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
			'minPHPVersion' => '5.6',
		],
		'9.1' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable10.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
			'minPHPVersion' => '5.4',
		],
		'9.0' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'minPHPVersion' => '5.4',
		],
		'8.2' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'minPHPVersion' => '5.4',
		],
	],
];
