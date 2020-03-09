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
		'18' => [
			'100' => [
				'latest' => '18.0.1',
				'internalVersion' => '18.0.1.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'rW2CcWd2qpHJmHzu4tKNIenxpcGgYNKj87xja0BG38Cu6WcbPj1kDsx7B+MmcPvV
pJcnuTVTpD381L3CxfktNf/yk1ecHEk61XnZWqqQhSqiCBkDOFpcJ3bfnXIfkx20
MEt4YiAtzW2PMnS+MsBD+MQ37H8jEiXyzQajYdQaDeuzkUuxrxq88QgKWBx3HJgb
X/9uwRASAUAfWRCu8ONFzq0ig5KhXIPoTQFojGQcSkSxwrOl3V/6zdvyEXJ/uh88
WX/4+ZolyRljFy7/C38gxg7o3nmZsU6UFJ+rJZv5blDekWQPG3gSijOThhiuh2bZ
N4G2ppYlgquUXqcb6PcLPA==',
			],
		],
		'17' => [
			'100' => [
				'latest' => '17.0.3',
				'internalVersion' => '17.0.3.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'bvMtFkhYbMzG4S1S2U75lDkf92GMxtejlcCaVDifjFzlpH2x8FI3Ggu0XHNBMgJv
VAqGFWl9U4kgAMT+jcrmRLdE8f9TlOXFwvvXA8pr0cxvefzMwhRyEvSOQIqL1m9S
KtdgK7XLu3vDC6OxsumxV6LJCqYvNZlMYzv8eR44yGttcoF77wxlB4HTugoylDFc
NdjU7Ie/s9+sUwkx948xHZZEN6jqHTnMBDhJrOEztPnYy0ZNNh3n9QGf9GBTgl/b
lNbhw20vUeiGhqZeevGVMbNarezC0w3eONLPQH+lvgi9YfSdbqGXT5QvZVHYux8y
Bqk7JVRm7517qvPooSoLIQ==',
			],
		],
		'16.0.8' => [
			'100' => [
				'latest' => '17.0.3',
				'internalVersion' => '17.0.3.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'bvMtFkhYbMzG4S1S2U75lDkf92GMxtejlcCaVDifjFzlpH2x8FI3Ggu0XHNBMgJv
VAqGFWl9U4kgAMT+jcrmRLdE8f9TlOXFwvvXA8pr0cxvefzMwhRyEvSOQIqL1m9S
KtdgK7XLu3vDC6OxsumxV6LJCqYvNZlMYzv8eR44yGttcoF77wxlB4HTugoylDFc
NdjU7Ie/s9+sUwkx948xHZZEN6jqHTnMBDhJrOEztPnYy0ZNNh3n9QGf9GBTgl/b
lNbhw20vUeiGhqZeevGVMbNarezC0w3eONLPQH+lvgi9YfSdbqGXT5QvZVHYux8y
Bqk7JVRm7517qvPooSoLIQ==',
			],
		],
		'16' => [
			'100' => [
				'latest' => '16.0.8',
				'internalVersion' => '16.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'fomhn3ZfTXlP1XWiyvpZrHnl+a28lXc4NQftoWnNoblqwGkE6+pG4W0+LAlonogx
4efZsB3jcyBXPWF6eLPXJxh8HfimS7QJw/+A1xwXIphkgqj36a7euIgjuwFLx+jF
i3SUj7LUaxeF7NNWbj6jqELcfBCHglp2HrGkEdVJm2gRB4rxBEI3fHLz7xC1DbIa
5f/RPw9HpCxUV81oj/nGnf3aJQdB/R/ZH3Cavrm7B/G2Jsa17hnSxr+9GfumW+xY
xj3v2msG7/vmitT+Y2/hiwoSJoP4c/i3nBA0DrH5SyakGP8nqy4oupGtfhWb3yMF
5lGcwxgIRCuLWE2o23DDLw==',
			],
		],
		'15.0.14' => [
			'100' => [
				'latest' => '16.0.8',
				'internalVersion' => '16.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'fomhn3ZfTXlP1XWiyvpZrHnl+a28lXc4NQftoWnNoblqwGkE6+pG4W0+LAlonogx
4efZsB3jcyBXPWF6eLPXJxh8HfimS7QJw/+A1xwXIphkgqj36a7euIgjuwFLx+jF
i3SUj7LUaxeF7NNWbj6jqELcfBCHglp2HrGkEdVJm2gRB4rxBEI3fHLz7xC1DbIa
5f/RPw9HpCxUV81oj/nGnf3aJQdB/R/ZH3Cavrm7B/G2Jsa17hnSxr+9GfumW+xY
xj3v2msG7/vmitT+Y2/hiwoSJoP4c/i3nBA0DrH5SyakGP8nqy4oupGtfhWb3yMF
5lGcwxgIRCuLWE2o23DDLw==',
			],
			'101' => [
				'latest' => '16.0.8',
				'internalVersion' => '16.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'15' => [
			'100' => [
				'latest' => '15.0.14',
				'internalVersion' => '15.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
DvYBQvWAJx0Q7tV9bofZjA==',
			],
		],
		'14.0.14' => [
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
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
FaqAZYszh1hjGEyQaoibXw==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
FaqAZYszh1hjGEyQaoibXw==',
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
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
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
		'18' => [
			'100' => [
				'latest' => '18.0.1',
				'internalVersion' => '18.0.1.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'rW2CcWd2qpHJmHzu4tKNIenxpcGgYNKj87xja0BG38Cu6WcbPj1kDsx7B+MmcPvV
pJcnuTVTpD381L3CxfktNf/yk1ecHEk61XnZWqqQhSqiCBkDOFpcJ3bfnXIfkx20
MEt4YiAtzW2PMnS+MsBD+MQ37H8jEiXyzQajYdQaDeuzkUuxrxq88QgKWBx3HJgb
X/9uwRASAUAfWRCu8ONFzq0ig5KhXIPoTQFojGQcSkSxwrOl3V/6zdvyEXJ/uh88
WX/4+ZolyRljFy7/C38gxg7o3nmZsU6UFJ+rJZv5blDekWQPG3gSijOThhiuh2bZ
N4G2ppYlgquUXqcb6PcLPA==',
			],
		],
		'17.0.2' => [
			'100' => [
				'latest' => '17.0.3',
				'internalVersion' => '17.0.3.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'bvMtFkhYbMzG4S1S2U75lDkf92GMxtejlcCaVDifjFzlpH2x8FI3Ggu0XHNBMgJv
VAqGFWl9U4kgAMT+jcrmRLdE8f9TlOXFwvvXA8pr0cxvefzMwhRyEvSOQIqL1m9S
KtdgK7XLu3vDC6OxsumxV6LJCqYvNZlMYzv8eR44yGttcoF77wxlB4HTugoylDFc
NdjU7Ie/s9+sUwkx948xHZZEN6jqHTnMBDhJrOEztPnYy0ZNNh3n9QGf9GBTgl/b
lNbhw20vUeiGhqZeevGVMbNarezC0w3eONLPQH+lvgi9YfSdbqGXT5QvZVHYux8y
Bqk7JVRm7517qvPooSoLIQ==',
			],
		],
		'17' => [
			'100' => [
				'latest' => '18.0.1',
				'internalVersion' => '18.0.1.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'rW2CcWd2qpHJmHzu4tKNIenxpcGgYNKj87xja0BG38Cu6WcbPj1kDsx7B+MmcPvV
pJcnuTVTpD381L3CxfktNf/yk1ecHEk61XnZWqqQhSqiCBkDOFpcJ3bfnXIfkx20
MEt4YiAtzW2PMnS+MsBD+MQ37H8jEiXyzQajYdQaDeuzkUuxrxq88QgKWBx3HJgb
X/9uwRASAUAfWRCu8ONFzq0ig5KhXIPoTQFojGQcSkSxwrOl3V/6zdvyEXJ/uh88
WX/4+ZolyRljFy7/C38gxg7o3nmZsU6UFJ+rJZv5blDekWQPG3gSijOThhiuh2bZ
N4G2ppYlgquUXqcb6PcLPA==',
			],
			'101' => [
				'latest' => '17.0.3',
				'internalVersion' => '17.0.3.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'bvMtFkhYbMzG4S1S2U75lDkf92GMxtejlcCaVDifjFzlpH2x8FI3Ggu0XHNBMgJv
VAqGFWl9U4kgAMT+jcrmRLdE8f9TlOXFwvvXA8pr0cxvefzMwhRyEvSOQIqL1m9S
KtdgK7XLu3vDC6OxsumxV6LJCqYvNZlMYzv8eR44yGttcoF77wxlB4HTugoylDFc
NdjU7Ie/s9+sUwkx948xHZZEN6jqHTnMBDhJrOEztPnYy0ZNNh3n9QGf9GBTgl/b
lNbhw20vUeiGhqZeevGVMbNarezC0w3eONLPQH+lvgi9YfSdbqGXT5QvZVHYux8y
Bqk7JVRm7517qvPooSoLIQ==',
			],
		],
		'16.0.8' => [
			'100' => [
				'latest' => '17.0.3',
				'internalVersion' => '17.0.3.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'bvMtFkhYbMzG4S1S2U75lDkf92GMxtejlcCaVDifjFzlpH2x8FI3Ggu0XHNBMgJv
VAqGFWl9U4kgAMT+jcrmRLdE8f9TlOXFwvvXA8pr0cxvefzMwhRyEvSOQIqL1m9S
KtdgK7XLu3vDC6OxsumxV6LJCqYvNZlMYzv8eR44yGttcoF77wxlB4HTugoylDFc
NdjU7Ie/s9+sUwkx948xHZZEN6jqHTnMBDhJrOEztPnYy0ZNNh3n9QGf9GBTgl/b
lNbhw20vUeiGhqZeevGVMbNarezC0w3eONLPQH+lvgi9YfSdbqGXT5QvZVHYux8y
Bqk7JVRm7517qvPooSoLIQ==',
			],
		],
		'16' => [
			'100' => [
				'latest' => '16.0.8',
				'internalVersion' => '16.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'fomhn3ZfTXlP1XWiyvpZrHnl+a28lXc4NQftoWnNoblqwGkE6+pG4W0+LAlonogx
4efZsB3jcyBXPWF6eLPXJxh8HfimS7QJw/+A1xwXIphkgqj36a7euIgjuwFLx+jF
i3SUj7LUaxeF7NNWbj6jqELcfBCHglp2HrGkEdVJm2gRB4rxBEI3fHLz7xC1DbIa
5f/RPw9HpCxUV81oj/nGnf3aJQdB/R/ZH3Cavrm7B/G2Jsa17hnSxr+9GfumW+xY
xj3v2msG7/vmitT+Y2/hiwoSJoP4c/i3nBA0DrH5SyakGP8nqy4oupGtfhWb3yMF
5lGcwxgIRCuLWE2o23DDLw==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.8',
				'internalVersion' => '16.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'fomhn3ZfTXlP1XWiyvpZrHnl+a28lXc4NQftoWnNoblqwGkE6+pG4W0+LAlonogx
4efZsB3jcyBXPWF6eLPXJxh8HfimS7QJw/+A1xwXIphkgqj36a7euIgjuwFLx+jF
i3SUj7LUaxeF7NNWbj6jqELcfBCHglp2HrGkEdVJm2gRB4rxBEI3fHLz7xC1DbIa
5f/RPw9HpCxUV81oj/nGnf3aJQdB/R/ZH3Cavrm7B/G2Jsa17hnSxr+9GfumW+xY
xj3v2msG7/vmitT+Y2/hiwoSJoP4c/i3nBA0DrH5SyakGP8nqy4oupGtfhWb3yMF
5lGcwxgIRCuLWE2o23DDLw==',
			],
			'101' => [
				'latest' => '15.0.14',
				'internalVersion' => '15.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
DvYBQvWAJx0Q7tV9bofZjA==',
			],
			'102' => [
				'latest' => '16.0.7',
				'internalVersion' => '16.0.7.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.12',
				'internalVersion' => '15.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
nfCSJ75Tc780Fqo0Q4pc8A==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
FaqAZYszh1hjGEyQaoibXw==',
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
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
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
		'18' => [
			'100' => [
				'latest' => '18.0.2 RC1',
				'internalVersion' => '18.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-18.0.2RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'qJswkswJ/U22XYme9KloTDwZa7240uR6nv7ZxYuDRO2RKJ8t0WRq0fpWATvJWga4
RJ9ccpAXMho6MABwjDICtyBmwTY4bpnEpJfUWji7IdbKXYtyEwJw/v3DiaBAyoFf
8LlgUyffuHNoYiCtuh4BBhxqd31serAQhyP5A0lFEjPd+eq7qNz9JmGpBOohzoIg
azk4OY9CSlp8z24meqohu38zWBvqd2LjhtU1JomNfcgdW+7yRmfrP2r3khgeiEY7
/v/oejAGXCpP+K0CJGm7biSNJRwVtnFPpaRgSV9mG04z3Yzd/ht1Q2IlYob8Ofdj
QDm6Gkw2jc0iC9xbzrUlag==',
			],
		],
		'17' => [
			'100' => [
				'latest' => '18.0.2 RC1',
				'internalVersion' => '18.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-18.0.2RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'qJswkswJ/U22XYme9KloTDwZa7240uR6nv7ZxYuDRO2RKJ8t0WRq0fpWATvJWga4
RJ9ccpAXMho6MABwjDICtyBmwTY4bpnEpJfUWji7IdbKXYtyEwJw/v3DiaBAyoFf
8LlgUyffuHNoYiCtuh4BBhxqd31serAQhyP5A0lFEjPd+eq7qNz9JmGpBOohzoIg
azk4OY9CSlp8z24meqohu38zWBvqd2LjhtU1JomNfcgdW+7yRmfrP2r3khgeiEY7
/v/oejAGXCpP+K0CJGm7biSNJRwVtnFPpaRgSV9mG04z3Yzd/ht1Q2IlYob8Ofdj
QDm6Gkw2jc0iC9xbzrUlag==',
			],
		],
		'16' => [
			'100' => [
				'latest' => '17.0.4 RC2',
				'internalVersion' => '17.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-17.0.4RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'GBzeuZuQYgzYM4C4Uh+qYj4y2K1Gc7TgQa/K1YoUbO6Xb8AyV9WItRmiWi6pteQp
Qq6LFDmSLS6p9nHkQMj1C7F9fES6TcT5kmYxCujtwQANi+cn3qijlspDnZaLCkY9
6/N52SrbBH6JZTBfG2aH15PgSzZdcXGThjh3VPuGRZ2wmkelrjtwfgiooUIEqW14
U2As4jYVYIOrLta6Q0dj3cT6V9inLxth9F22/DDJh9+DVAl1IM6vxtqX1E33pfDp
UYHdjkA6Idn1vHBhpGFmBgWhMsLwMaX7NbcefYgrmnLlxq4J4yUMiuIxffb/3VRm
bFtdOwBf6GEYTo9jZBnn5g==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.9 RC2',
				'internalVersion' => '16.0.9.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-16.0.9RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'HbJYkziC2e+eyJPbiLuNWTOzXCdZ5o6eyAVry5bDgegWhJOW0URy+a02n4Js+aIC
zdwyyCrKeWCzwZIyFLvDELxFgh5sg27l96xMye3+cVjh79/NKAQqi5Oo/IZgeD6h
4cM15AMBLIHJ0bVQclppoPstfT323qhfIZw1bgRdZhI60cEx6+p6EJhPxcxxlwFN
Sw2YksG5iewCV65BECzVgcRRyswBdS1Iz5iFsmD+ev7yYNf5CjB5teJFoHw+uut+
ekF+KWZYcXEumDVTOkvT8rGXtFBkFfeWFNvjCSNuy1qOefz9dphqQcSiKDpe8xAz
ooQ8bJh09ZQ6tIrXjiNcyA==',
			],
			'101' => [
				'latest' => '15.0.14',
				'internalVersion' => '15.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
DvYBQvWAJx0Q7tV9bofZjA==',
			],
			'102' => [
				'latest' => '16.0.7',
				'internalVersion' => '16.0.7.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'autoupdater' => false,
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.12',
				'internalVersion' => '15.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'ky2vKMSu1tjkpsPaAf6CkqtKJwkeZ8fxT9a9TBNwAAbl3AAIYqQKjT0Np5nvFwzb
Z9N2axbhWdy0WuY7ffxDwYL7lKzzJ4nfeYzIVJV49y1W2kbz5KvDhX4/ACgGw42m
WSmJdyx7hnp5JdcddA/eZDh2yrffC+MjrSaZXBvitnxMtI2xaeOUpphvjKgy8wF+
Cb8hjiKCAbhG11F2qq8TpX79l5I1n32RhvhJMc1GXmSSlR+dKK0zVIspW9ENMsRc
xsVlYeI9cGdGpShVj4eC3ya2ZZ0KFsEwwvJlOjXbJ8Ctw133fWEp/1nGFuiCP3sZ
nfCSJ75Tc780Fqo0Q4pc8A==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'Nw1PhE391uasWeU66JtBoJGTRHDdImBNBkpMlh4nTG6UJFouFTDDmqHq6DcanS5e
qoC79rxiC7lloaN/05AZ7AY1FSNjG5G9xPM4OWgTCbwXhUfD3DjGVzzbMVnTWgeK
ZMgZqqU8F4uWHkcEB0fqImZYnFMdX7E7xZmEIO8BSOOdS6PvvZTAeDXEwWSBMRVa
7wEYp/hwJzV3UCy5SThYHqs+8EIdQeql1/3o/P/0bsGnsgpLGK/2bV4lzVV74m3T
RrZ6EDdSnGyybYX4QGv/wfng9RijMdMdr1SYzJfkRKj+JX37zgscL/87XgnApkQS
FaqAZYszh1hjGEyQaoibXw==',
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
				'latest' => '14.0.14',
				'internalVersion' => '14.0.14.1',
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
		'19' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.1',
		],
		'18' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable18.zip',
			'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.1',
		],
		'17' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable17.zip',
			'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.1',
		],
		'16' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable16.zip',
			'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
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
