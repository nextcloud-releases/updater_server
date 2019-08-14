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
		'16' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
		],
		'15.0.11' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
			'101' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'15' => [
			'100' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
		],
		'14.0.13' => [
			'100' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'qL4+2k59ZwURfQs9ZviDrfLngPh+JLfuJ2oMIrwAiCem/aAMuBT0bzX0rs+v/C6F
Mumz/0A+wVfbinEV35oEfsTDCoEdf+zGBM1rCT/Gt/RuhkCYfQwXdHiyKdOV9ucE
KxOK/f06fjY0Qn4sNCjUNQ3+XxxZu+m/XxQIbaoyA49Z1olH4bYtIHfPAoFFHGkz
c/wmORADD2LBntayaEzltk3iD+0dVMwdv8I5anRfLp0aV7XcZcXfTZuv8Qni6xle
CFCl5BbeflH+AeRZL3MR8a3aY1ClpnZGsN0DbJhg5Ql+bf0WmflnMHJfk3rFbbd1
AbWnmPMJ6CSXGWAGOQ0smg==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'qL4+2k59ZwURfQs9ZviDrfLngPh+JLfuJ2oMIrwAiCem/aAMuBT0bzX0rs+v/C6F
Mumz/0A+wVfbinEV35oEfsTDCoEdf+zGBM1rCT/Gt/RuhkCYfQwXdHiyKdOV9ucE
KxOK/f06fjY0Qn4sNCjUNQ3+XxxZu+m/XxQIbaoyA49Z1olH4bYtIHfPAoFFHGkz
c/wmORADD2LBntayaEzltk3iD+0dVMwdv8I5anRfLp0aV7XcZcXfTZuv8Qni6xle
CFCl5BbeflH+AeRZL3MR8a3aY1ClpnZGsN0DbJhg5Ql+bf0WmflnMHJfk3rFbbd1
AbWnmPMJ6CSXGWAGOQ0smg==',
			],
			'101' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
			],
			'102' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.0',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-6/',
				'web' => 'https://nextcloud.com/outdated-php-5-6/',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'autoupdater' => false,
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
		'16' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
			'101' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
			'102' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'qL4+2k59ZwURfQs9ZviDrfLngPh+JLfuJ2oMIrwAiCem/aAMuBT0bzX0rs+v/C6F
Mumz/0A+wVfbinEV35oEfsTDCoEdf+zGBM1rCT/Gt/RuhkCYfQwXdHiyKdOV9ucE
KxOK/f06fjY0Qn4sNCjUNQ3+XxxZu+m/XxQIbaoyA49Z1olH4bYtIHfPAoFFHGkz
c/wmORADD2LBntayaEzltk3iD+0dVMwdv8I5anRfLp0aV7XcZcXfTZuv8Qni6xle
CFCl5BbeflH+AeRZL3MR8a3aY1ClpnZGsN0DbJhg5Ql+bf0WmflnMHJfk3rFbbd1
AbWnmPMJ6CSXGWAGOQ0smg==',
			],
			'101' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
			],
			'102' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-6/',
				'web' => 'https://nextcloud.com/outdated-php-5-6/',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'autoupdater' => false,
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
		'16' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 's8S0e7yiQR5efWsMLZ+yVQ+QEqQ1h7PFMRsMOn3fUeOPvrZ9zxSD/87NueppRv2c
Q6BIUK+35aNiD8+92j10nLfSPj0xIGtCu6QOfOK9uF9ZfhLhyfA6WrqrpzMmsl8y
SZuHeX9Xqurc2WzRSS5b+yN6OIY3eYvo6zpJyV2PnBUvbOOyKxgmcmxE/OSuyIKI
husXQEtj/Bu8LFxWYgDCdqtFyLIf2DKx1H7rgmEuN3RcC6zS177IJ2YKxjHPGxJT
H3eyYffBGQLKmjQVeiQTotKEIl0/dwSfIffs4GGa03d6l4rfHyI1EsI44mlcwdLa
Lj2qreseuw1nNqQQ0QA7nw==',
			],
			'101' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
			'102' => [
				'latest' => '16.0.4',
				'internalVersion' => '16.0.4.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.11',
				'internalVersion' => '15.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'mxW4mpQ1iPWlMXMfM8btL5FuI+tK3whaLJIZRxKHqgboJ+I+gHL4x9Ux0PcH0Nwo
lV7ftmXFqMq4771xNGsS6iiSNa3qGddFOf3vvKtlCnKSWOTm9yJ5IMY3gzjX/duL
H2u4SkP2G4GTp6DUlzu9OkBvOfYDvQ9AbaiapkBekWe1Zkg9NSM39D86AqfUquU5
x54gGWwFE9NE1qCAIWIg2sTWB/1wKQ/pGmX0f2T6C9hnBnfkKdxUuUv4OLVOuDKn
m07ZqYbLHdwY8iIN3ZlZqTErxJWcd5/VR6ZA7B0y61spu6HkKZxVKn7bV6FvQKpg
WBdmgU9uZLgzs0sN6ibQZQ==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.14RC1',
				'internalVersion' => '14.0.14.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.14RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'G6yNLiRtG57MGTjsFsOv2b5byUnqfrfOKOWZdk8BVfB6hEST7DEYNb+3XPPXNWLz
LVmrnoGea14TVCs0YJ5XERbVoUQotJA+N8JqhE+C15KTwGey1cw+ZPbJoBfNkX8Y
UkT/AZa+uifM5xHt0IwiEIltUwx5pMx2QzntEYXuc3ryYw8k9ZQdLg9dJibpcUEy
hjpiWujfFtIMqAgEQUnqalJlITj+ToHxdKp+f1sOrNf++361gNuefasV1oQDFxCm
ZuyACRo944++c01f0SKrOwBu1EXqOL6jAQIj0tmy8RSm3AvQ6+SPSeUM5AY03JvO
9iePU+PVp7KP2+Mdghk0Zg==',
			],
			'101' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
			],
			'102' => [
				'latest' => '14.0.13',
				'internalVersion' => '14.0.13.0',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-6/',
				'web' => 'https://nextcloud.com/outdated-php-5-6/',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'autoupdater' => false,
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.12',
				'internalVersion' => '13.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'GRVpINAV11LUd+UxjnQtb2gbFHaxNrh9WzzQgPpjaKJ6J28PRQ9sq8J1GlfEN2K7
RnD/6pFkDRTlBOU56g4XC3GgDpY6F88OVQ0z9D1/nudSZV+cSu6xRuC6q7Z9sStG
oyDn+o4Z8c+i2yR6zcoVD5itXiU1w41fMT/dlzCtIDmo953+K9fNlTPlU9h9H3MI
HVECrm+3NmISmI8+5hl4Ju5p8tudxVhGF2aHR0ilG0ff+wjdz5CtsiZXoP+BUNn+
VFRfhy9vBf+VD6khhFkDXSymw0X6xNN3lMqQIJmJPsPONDXtk2diY6h204uEUofP
yiBfUT4yVTwIOt+tnqZzzw==',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-10.0.6.zip',
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
