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
		'13' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.9',
				'internalVersion' => '12.0.9.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'VJaOSKDB3j2w3NIt5ZZ7K0s4ZLjcISj/7GGAaRlqamRLOVI+KXonm3ij+x6Liejn
8a//7H8p5gKb6SA//8xgcYscioSjaen9yprSY9Wcr4VxeG4VZCBnDDnwjy1CMd8o
1JoRoJ7wFKaIzsp0n9YY7lKz2aOiYYAT43nFwcKbTTCy+bABPc8DQdKd76S62dlZ
xFAWF0U1b4FrLbprTbFgK1IBvRxPz+/6VLIjv6Vw+HaNR1G0m0/Y5N9r6wkCxycQ
16ioKnOJFQNKFpM4bOU1MVo9sOeIJ5P4xH8cR/jlOYRNiRNIg51oo0p7glnt8E+Z
opffCkYONZh0uwZ6FFQtCA==',
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
		'13' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.10',
				'internalVersion' => '12.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'wCWCrhlkL8YYL7UdYUeMnCJIgJSuZrjTe1kMd/HW7ZmJQi6v20ReIB8mTz1UZoPw
HPiTIQmSClg2QN0J3NJCA4ZgZOhNpdqpD+hlKdVs+Tejj2rOEpxCRb8G3qH23pFy
2zDik1SCHjO2UEmqHa8lZhr/DwsZrU5y2tmc37BM6DNSYMn9EDAlQ9Zf3tfdJyzb
q+PLEagO07LU2TpELpYWcxKy/DeLnCbxhhKVAVfnUFVjrpn/a/oaRvhmnGkkUpIJ
1YyE6sebvGVBt2sNA1I6eDGojI1bo5qYLwXsPUeD2DUo/BqR593nIQJU/AldFnaA
JCqlRb+QYQLpwipZJEukaw==',
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
		'14' => [
			'100' => [
				'latest' => '14.0.0 RC 1',
				'internalVersion' => '14.0.0.17',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.0RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'FgME97y+ulK7Rizv3pM/YAWqKBQPl9xhLxl3lO6ww0KMUto3tdBq+pR/YccZws9K
NEkF43Fj10atImNzUFIH/3GAf2tm4gTaZs6SgeoCL+CRHyCKJAwbu4Yv+mAIQGhI
zxvZvo97OIxKN9djk22w2bxJ3AfwSeJh59sExrTT7UTFrJzgr57WMBFbxUvEvuss
x3TuBX4fXcpd3AMNebGk75JZi8JgSGSHSFFKkfAX3911X4TZNnKtHe+t5ilKMOZN
J9a5kEawdNb1DyI4o+PxrLwnWV1p/3EmkAYwiMhKFhol8INiXWW3ax8rlFXTjeUH
g2hVPLtUN7YOXb0LBRCOdw==',
			],
		],
		'13' => [
			'20' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
			'80' => [
				'latest' => '14.0.0 RC 1',
				'internalVersion' => '14.0.0.17',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.0RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'FgME97y+ulK7Rizv3pM/YAWqKBQPl9xhLxl3lO6ww0KMUto3tdBq+pR/YccZws9K
NEkF43Fj10atImNzUFIH/3GAf2tm4gTaZs6SgeoCL+CRHyCKJAwbu4Yv+mAIQGhI
zxvZvo97OIxKN9djk22w2bxJ3AfwSeJh59sExrTT7UTFrJzgr57WMBFbxUvEvuss
x3TuBX4fXcpd3AMNebGk75JZi8JgSGSHSFFKkfAX3911X4TZNnKtHe+t5ilKMOZN
J9a5kEawdNb1DyI4o+PxrLwnWV1p/3EmkAYwiMhKFhol8INiXWW3ax8rlFXTjeUH
g2hVPLtUN7YOXb0LBRCOdw==',
			],
			'101' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.11',
				'internalVersion' => '12.0.11.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.11RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'f8U5vP8g48PhL0BAKznOI0WvY0oxXo+st/Ng+N14TXBCgiDLWH0KxLPUbHkRI4vE
ksly5mOqMW5Pxriogfnuf/WQEG4KM2/9GmqRaiOR89aWpIQhUdFqEVdDa3EX9bb1
jdTzLjR41+Az06qX2IA4V4udztQnMu0tN8VTC85+9BarlXZDFC9GpyIV6HukLvGv
Gp5XiTwNJZ3uen5bvpPUY45vMQqjkYeOXAjpMlYueDcGRW45DqPxEDundF0g5hzF
9dUogOvWwPOOMlFDu/saaiJk7yEX9svJlbFhrAgOEHxwbtPp2bwbn4kh9+g6FHPV
mST9SQNuqgXcjNFQdg5gTQ==',
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
		'14' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.0',
		],
		'13' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable13.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'12' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable12.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'11' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable11.zip',
			'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
			'eol' => false,
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
