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
 * 			// internalVersion is an optional entry that defaults to latest if not set
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
 *			// internalVersion is an optional entry that defaults to latest if not set
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
				'latest' => '12.0.3',
				'internalVersion' => '12.0.3.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
0ee22KtYHJFmotmZ9EjwIg==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '11.0.5',
				'internalVersion' => '11.0.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
czpgycaoL8+t+4iHq4CLiA=='
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.5',
				'internalVersion' => '11.0.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
czpgycaoL8+t+4iHq4CLiA==',
			],
			// For PHP 5.4 users
			'0' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
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
				'latest' => '12.0.3',
				'internalVersion' => '12.0.3.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
0ee22KtYHJFmotmZ9EjwIg==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.3',
				'internalVersion' => '12.0.3.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'YDatIPqOzjHGdV4sCKAqOHPZORN4k7FswMpfTl8S7JlyRW0aLOxA8KUyBmxmfgVY
lMujKm2gtCRHGEs7QrG+J5NeJ5g9PS1vWsrU1mCpGgLz1ifjF5VfpSuSTWK3WxpS
b0aRy+YfJNrfZjYHGFiL/KDlr0+Eu+MWSKHNbM5YZBZcYCbgSQZH4ry2AgMPAqRq
qaZ9jV3c0nObBq4Ha2qDAmBhcSnVMVmoXrrumgVyzSC+F7CLf7X34TjEPw/hFzr2
N4FMRE9PHpYqRqoRF+OKNYvcs3MVAiv2QTSjJd2wtiutfaDO8zJUsd/CoTbPr750
0ee22KtYHJFmotmZ9EjwIg==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.5',
				'internalVersion' => '11.0.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
czpgycaoL8+t+4iHq4CLiA==',
			],
			// For PHP 5.4 users
			'0' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'minPHPVersion' => '5.4',
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
		'12' => [
			'100' => [
				'latest' => '12.0.4RC1',
				'internalVersion' => '12.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'ZmarQAiK2MhHZ7EaIofw+hZWLho9KINh0uqeChdZzkG+iiF6rSreGrjXGWlxiuOI
HNZEKUYV639kCaFNBc2WO9jhTHAUH1Se59XWTiqUdkTVChYdrI/w8x5jxMdlSD/L
mrLJsOuq7R7qHRUrITPul7KVJk2Qi6PYeDmD70qw0LmxfAdP87WOCACFM/ro2liM
i1Gzp4kM8pqQKq0HP/Emm+JHcMnhSxELp3UC2RFoT2V8KwpWf7wFCbEKEKCrzXhR
YQ2Q2UV2Z0retDVoqIdMvVTk/dyGFvWe8vrrAbGv8xs/ljKlvrQMHuPlmxS/RZqX
v3OsUUoPNLEtsb/tspchWg==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.4RC1',
				'internalVersion' => '12.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.4RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'ZmarQAiK2MhHZ7EaIofw+hZWLho9KINh0uqeChdZzkG+iiF6rSreGrjXGWlxiuOI
HNZEKUYV639kCaFNBc2WO9jhTHAUH1Se59XWTiqUdkTVChYdrI/w8x5jxMdlSD/L
mrLJsOuq7R7qHRUrITPul7KVJk2Qi6PYeDmD70qw0LmxfAdP87WOCACFM/ro2liM
i1Gzp4kM8pqQKq0HP/Emm+JHcMnhSxELp3UC2RFoT2V8KwpWf7wFCbEKEKCrzXhR
YQ2Q2UV2Z0retDVoqIdMvVTk/dyGFvWe8vrrAbGv8xs/ljKlvrQMHuPlmxS/RZqX
v3OsUUoPNLEtsb/tspchWg==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.5',
				'internalVersion' => '11.0.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.5.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'cHDTGRqT5giXS+sgbFsOxvpag1dZRbJdU5OJ1bHp4j1o4/WE5uGM/bEC96G3tbHM
AT/tOw71l6lMX3zDM9QAZxAY2ZnfnQoBGn6DiURFV7DR/xpEVLY4+d/yLMlpi9bE
y3l4SxnM0NDbF0brD168Oi4aKquccpXQmngEPK9JcRcN8OZ9PksKQmI8C78b/2b2
PWXMikNX9t2Ir7pMnCHUoeLAuN/7KVxbkDRKIqVp/7xPEwbFKS2g4YuF7NdA2WA5
HXOX96B1e8foC+zLoFn/BKhOWMFgOsPogn17xscfsNYsIC8kosegEp0qWmi3pFZ0
czpgycaoL8+t+4iHq4CLiA==',
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
		'13' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
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
