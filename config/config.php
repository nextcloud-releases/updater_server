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
		'15' => [
			'100' => [
				'latest' => '15.0.4',
				'internalVersion' => '15.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'qc02+m/hYn1LP7ax2j9nkm6twoEMS2adz6WQp++7WCbJCU0u7cATjlO40ZS06V3v
eIR4tZD+FbHGnPuuGOnK4nPKgDR28z9PxyB022HNBEpk7UbAVhT4Z2VysXEcPJCS
q5jP5hEEgV34zdz+8f31vu1/Lxd24IkTZuZ19mZaPtD3DcCgN6m1PCKduNqX4ZcU
rvI+kMzNDB6A9dPN0X1nwolYKRvDEihnI8sGcgHTnP49rPRjpOvh+TzOKMrFMLD5
XaRVB9zYlG1HxynI3GZoMEbUnzufsi7E1+zVkzNgd5RGD2lIcIC8aFlZ1RIul7BF
uiEiEB8dBhn2p6hruRnXkw==',
			],
		],
		'14.0.7' => [
			'100' => [
				'latest' => '15.0.4',
				'internalVersion' => '15.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'qc02+m/hYn1LP7ax2j9nkm6twoEMS2adz6WQp++7WCbJCU0u7cATjlO40ZS06V3v
eIR4tZD+FbHGnPuuGOnK4nPKgDR28z9PxyB022HNBEpk7UbAVhT4Z2VysXEcPJCS
q5jP5hEEgV34zdz+8f31vu1/Lxd24IkTZuZ19mZaPtD3DcCgN6m1PCKduNqX4ZcU
rvI+kMzNDB6A9dPN0X1nwolYKRvDEihnI8sGcgHTnP49rPRjpOvh+TzOKMrFMLD5
XaRVB9zYlG1HxynI3GZoMEbUnzufsi7E1+zVkzNgd5RGD2lIcIC8aFlZ1RIul7BF
uiEiEB8dBhn2p6hruRnXkw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '14.0.7',
				'internalVersion' => '14.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'bTbnni75MclqR8BOxs0e/REa6SX3Kqt13NpopbNIdinTMI+sHksysB5uxUn3T/JT
LbsLg9aKR95MkGSHPjEojonmH7Bxwt5OjLEDEY7ZJ1s8evmuVBZcx8N2CiHSwUVF
keSAxMaoiaYJqCRfkShJB8chfebTECMPBCiR2oIukQve/TH44zOUhfuUki1WTuN8
KsZeLzMYnM/YsYhyYIZ4RP+90MwfFPoor3zVlzaioXu75Yum0h19AR2tz1ZLr25G
2GnEbokhMZYYDGvat6cIIPpC/9vrxV8HNA83QlBbSJ/RJJXjZEEbG72uM2iG8rSj
+cwpw3NSFPI2tuT0er/gvQ==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.7',
				'internalVersion' => '14.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'bTbnni75MclqR8BOxs0e/REa6SX3Kqt13NpopbNIdinTMI+sHksysB5uxUn3T/JT
LbsLg9aKR95MkGSHPjEojonmH7Bxwt5OjLEDEY7ZJ1s8evmuVBZcx8N2CiHSwUVF
keSAxMaoiaYJqCRfkShJB8chfebTECMPBCiR2oIukQve/TH44zOUhfuUki1WTuN8
KsZeLzMYnM/YsYhyYIZ4RP+90MwfFPoor3zVlzaioXu75Yum0h19AR2tz1ZLr25G
2GnEbokhMZYYDGvat6cIIPpC/9vrxV8HNA83QlBbSJ/RJJXjZEEbG72uM2iG8rSj
+cwpw3NSFPI2tuT0er/gvQ==',
			],
			'101' => [
				'latest' => '13.0.11',
				'internalVersion' => '13.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => '0y3atdZWQYBHr3NblUoqnUvO3Xum5dldFKy6F5ApY+cVInlIx4qTKTKZiGrSRasU
5wqbJwp4GE29MHpjOrMJfEUOCTz7nFH0iD4EVBbH8nTlqUB1QsQSRaGz9d6Ajs98
OopvaB2DcCQZ9GWhspCuoFKDu0NyzqD3RK6jOhtwDVIObQLeSLVulNClDlIXo1SC
DJsmVi4m7rOWDYrNFdDcDQsWo7Clwyv26mGkj132Fne1qIKoQ2X/eIz8oHnsi4v0
TfsjdQxGHxreYCFNxpX/NJtOe0r3wauF5d4gTCdXP0+z9x56PKhAYZ9XukN/krx+
BgNGvlj3eVHqWt2kjKvFCQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.11',
				'internalVersion' => '13.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => '0y3atdZWQYBHr3NblUoqnUvO3Xum5dldFKy6F5ApY+cVInlIx4qTKTKZiGrSRasU
5wqbJwp4GE29MHpjOrMJfEUOCTz7nFH0iD4EVBbH8nTlqUB1QsQSRaGz9d6Ajs98
OopvaB2DcCQZ9GWhspCuoFKDu0NyzqD3RK6jOhtwDVIObQLeSLVulNClDlIXo1SC
DJsmVi4m7rOWDYrNFdDcDQsWo7Clwyv26mGkj132Fne1qIKoQ2X/eIz8oHnsi4v0
TfsjdQxGHxreYCFNxpX/NJtOe0r3wauF5d4gTCdXP0+z9x56PKhAYZ9XukN/krx+
BgNGvlj3eVHqWt2kjKvFCQ==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.13',
				'internalVersion' => '12.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
vbaIJ8CiZnKdMBDAdXAVMA==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'stable' => [
		'15' => [
			'100' => [
				'latest' => '15.0.4',
				'internalVersion' => '15.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'qc02+m/hYn1LP7ax2j9nkm6twoEMS2adz6WQp++7WCbJCU0u7cATjlO40ZS06V3v
eIR4tZD+FbHGnPuuGOnK4nPKgDR28z9PxyB022HNBEpk7UbAVhT4Z2VysXEcPJCS
q5jP5hEEgV34zdz+8f31vu1/Lxd24IkTZuZ19mZaPtD3DcCgN6m1PCKduNqX4ZcU
rvI+kMzNDB6A9dPN0X1nwolYKRvDEihnI8sGcgHTnP49rPRjpOvh+TzOKMrFMLD5
XaRVB9zYlG1HxynI3GZoMEbUnzufsi7E1+zVkzNgd5RGD2lIcIC8aFlZ1RIul7BF
uiEiEB8dBhn2p6hruRnXkw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.4',
				'internalVersion' => '15.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'qc02+m/hYn1LP7ax2j9nkm6twoEMS2adz6WQp++7WCbJCU0u7cATjlO40ZS06V3v
eIR4tZD+FbHGnPuuGOnK4nPKgDR28z9PxyB022HNBEpk7UbAVhT4Z2VysXEcPJCS
q5jP5hEEgV34zdz+8f31vu1/Lxd24IkTZuZ19mZaPtD3DcCgN6m1PCKduNqX4ZcU
rvI+kMzNDB6A9dPN0X1nwolYKRvDEihnI8sGcgHTnP49rPRjpOvh+TzOKMrFMLD5
XaRVB9zYlG1HxynI3GZoMEbUnzufsi7E1+zVkzNgd5RGD2lIcIC8aFlZ1RIul7BF
uiEiEB8dBhn2p6hruRnXkw==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.7',
				'internalVersion' => '14.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'bTbnni75MclqR8BOxs0e/REa6SX3Kqt13NpopbNIdinTMI+sHksysB5uxUn3T/JT
LbsLg9aKR95MkGSHPjEojonmH7Bxwt5OjLEDEY7ZJ1s8evmuVBZcx8N2CiHSwUVF
keSAxMaoiaYJqCRfkShJB8chfebTECMPBCiR2oIukQve/TH44zOUhfuUki1WTuN8
KsZeLzMYnM/YsYhyYIZ4RP+90MwfFPoor3zVlzaioXu75Yum0h19AR2tz1ZLr25G
2GnEbokhMZYYDGvat6cIIPpC/9vrxV8HNA83QlBbSJ/RJJXjZEEbG72uM2iG8rSj
+cwpw3NSFPI2tuT0er/gvQ==',
			],
			'101' => [
				'latest' => '13.0.11',
				'internalVersion' => '13.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => '0y3atdZWQYBHr3NblUoqnUvO3Xum5dldFKy6F5ApY+cVInlIx4qTKTKZiGrSRasU
5wqbJwp4GE29MHpjOrMJfEUOCTz7nFH0iD4EVBbH8nTlqUB1QsQSRaGz9d6Ajs98
OopvaB2DcCQZ9GWhspCuoFKDu0NyzqD3RK6jOhtwDVIObQLeSLVulNClDlIXo1SC
DJsmVi4m7rOWDYrNFdDcDQsWo7Clwyv26mGkj132Fne1qIKoQ2X/eIz8oHnsi4v0
TfsjdQxGHxreYCFNxpX/NJtOe0r3wauF5d4gTCdXP0+z9x56PKhAYZ9XukN/krx+
BgNGvlj3eVHqWt2kjKvFCQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.11',
				'internalVersion' => '13.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => '0y3atdZWQYBHr3NblUoqnUvO3Xum5dldFKy6F5ApY+cVInlIx4qTKTKZiGrSRasU
5wqbJwp4GE29MHpjOrMJfEUOCTz7nFH0iD4EVBbH8nTlqUB1QsQSRaGz9d6Ajs98
OopvaB2DcCQZ9GWhspCuoFKDu0NyzqD3RK6jOhtwDVIObQLeSLVulNClDlIXo1SC
DJsmVi4m7rOWDYrNFdDcDQsWo7Clwyv26mGkj132Fne1qIKoQ2X/eIz8oHnsi4v0
TfsjdQxGHxreYCFNxpX/NJtOe0r3wauF5d4gTCdXP0+z9x56PKhAYZ9XukN/krx+
BgNGvlj3eVHqWt2kjKvFCQ==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.13',
				'internalVersion' => '12.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
vbaIJ8CiZnKdMBDAdXAVMA==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'beta' => [
		'15' => [
			'100' => [
				'latest' => '15.0.5 RC 2',
				'internalVersion' => '15.0.5.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.5RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'nQ6/eb/+GtqnparPXnUpiFlEA1wjzOrkUaDr2E+EYuhCRDOrZMMxRTa5Tupk+I+4
LOumaYBtegy8fXgai3yYJb9/tV+EonvocGLsbVK9p598MyMPnbn3mk8rn5nUBWNB
mSlaknaiMAzS7U+YlB+d/j9ddohZ57KtcKqu86F8VPdfEBq02UXBs9NY+roDxuxQ
NpNlJb6fnA6GeZNP/PzmaBkR6qxi6Wjj5aLWjilNjcnGB0+IkqazkZ1GoEoSKutS
Ta97oKRVzE45qpgEHk4fBeLpoQlrz/2QIdPybAUvNfl/jL/9XB9NP51mozRQSVIl
mlRtVGljolAGWgjNcpU6+w==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.5 RC 2',
				'internalVersion' => '15.0.5.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.5RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'nQ6/eb/+GtqnparPXnUpiFlEA1wjzOrkUaDr2E+EYuhCRDOrZMMxRTa5Tupk+I+4
LOumaYBtegy8fXgai3yYJb9/tV+EonvocGLsbVK9p598MyMPnbn3mk8rn5nUBWNB
mSlaknaiMAzS7U+YlB+d/j9ddohZ57KtcKqu86F8VPdfEBq02UXBs9NY+roDxuxQ
NpNlJb6fnA6GeZNP/PzmaBkR6qxi6Wjj5aLWjilNjcnGB0+IkqazkZ1GoEoSKutS
Ta97oKRVzE45qpgEHk4fBeLpoQlrz/2QIdPybAUvNfl/jL/9XB9NP51mozRQSVIl
mlRtVGljolAGWgjNcpU6+w==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.8 RC 1',
				'internalVersion' => '14.0.8.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.8RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'yvPFEDOcMJE7Vx4Ht8UHNNL1FuN3EPmYcCnpa8IomihJ5jzMqIluzRgYMRyM/1KO
KtIf24bERLv89OQBAU8K1aL8q9+4u1s9489mJkwJe13har6ip0E81dSHjveRMCG/
ydGudWT6LnS3iTXuebMxkfw33rkmzF/9JAvy3EmSg3fl9ieIhTBO478YRNLSvSuk
BHfMHGZl7qgdH9zJKJ5iaz40PQzwD6VkUq25ZHtZzq6tViCc7J4e+r4XAIKSZMDY
PKocVq7acbcISPljMyMbONRdhyvwTf5loN0dADALoKm7ugXDoQk2Zrpss25CKiNP
DNNDS3fPJx6q7FmHFZbIPw==',
			],
			'101' => [
				'latest' => '13.0.12 RC 1',
				'internalVersion' => '13.0.12.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
sociqWNeP1tudPnoWkS2jg==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.12 RC 1',
				'internalVersion' => '13.0.12.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.12RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'OqBzXyl7eI6KWhJfzZGli0V87TYEzpY1v+zWTMWyrbtpGjuVJMIKBuHvO5MsCzF5
6fuuOn17A3z3XmvHp5gs4nliSbMNaYrSEMy1X9pRDjcmqs96MhphV//XZpsigfcu
mD2Fw2w7mhbnwJJyHMYb9/QkOceJSJ64vmMnXC+e1Phnkx4ixECn2o8dZZoqB4RF
QzzmBNY4Uf+j8vtMnqBpQ7GITvu+gO75JfJ6X/E8c4sqw8ob0OoOO+As0YKP1L1n
cjKP2EK5zEWo3mo1hrddiVXmC8lNQdkmMLHwNN+If+4mLN30SWeu3xBGxw5w8gUf
sociqWNeP1tudPnoWkS2jg==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.13',
				'internalVersion' => '12.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'jZbAdJ9cHzBcw7BatJoX7/0Nv9NdecbsR4wEnRBbWI/EmAQ09HoMmmC1xiY88ME5
lvHlcEgF0sVTx6tdg4LvqAH2ze34LhzxgIu7mS1tAHIZ81elGhv66VuRv17QYVs1
7QQySikKMprI+mzdTjIf3rloc97lpm9ynQ+6vizwdxhZ0w5r4Gl85ni52MpeN1Zd
Sx/Z9LJ0bCIO9C+E6kyQvjI7Q7A+WpMF1SiQL2RJsLJERtV4BP8izVuZQ/hI9NDj
rdZAAiMKh8jB0atDNbxu24dWI2Ie7MvnzadL6Ax9+qIWUzlZIqX9yXgFVE2RsGVS
vbaIJ8CiZnKdMBDAdXAVMA==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'daily' => [
		'16' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.1',
		],
		'15' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable15.zip',
			'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.0',
		],
		'14' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable14.zip',
			'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.0',
		],
		'13' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable13.zip',
			'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'12' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable12.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.6',
		],
		'11' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable11.zip',
			'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.6',
		],
		'9.1' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable10.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
		'9.0' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
		'8.2' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
	],
	'_settings' => [
		'changelogServer' => 'https://updates.nextcloud.com/changelog_server/',
	],
];
