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
		'14' => [
			'100' => [
				'latest' => '14.0.4',
				'internalVersion' => '14.0.4.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'g7NKa7ZQLKfBAYOIEA0SHochEpYiCEiqlKdh5qlqjJu+QAA4kGyJ+J26RiB5gm56
KeqkSp347NaR68U6Qb9eaC3V1rrQdd990KncXqfmbqZVVN/8DXI6mej9Y5lv3Pop
9J8QuN6ViN3c3hFG/jf9laTdsLI9UCoUOM5LvngJbs2Sjv+vmMMkDguE+XyD5i9d
6Cq2ia0CEVY5J7RpBmvEaUOFSi+2fxn+QLT467pkQL9yt45Acq0oXrxXdbW9PMYP
N83+1F/AaXgMeOVJ08yffH1r0KpvN07xHAkepfPLBxe/8KrBLLJ6QIcH0qD9cJOc
cFXWg2ZhXYGHpfMvrMtueg==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
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
		'14' => [
			'100' => [
				'latest' => '14.0.4',
				'internalVersion' => '14.0.4.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'g7NKa7ZQLKfBAYOIEA0SHochEpYiCEiqlKdh5qlqjJu+QAA4kGyJ+J26RiB5gm56
KeqkSp347NaR68U6Qb9eaC3V1rrQdd990KncXqfmbqZVVN/8DXI6mej9Y5lv3Pop
9J8QuN6ViN3c3hFG/jf9laTdsLI9UCoUOM5LvngJbs2Sjv+vmMMkDguE+XyD5i9d
6Cq2ia0CEVY5J7RpBmvEaUOFSi+2fxn+QLT467pkQL9yt45Acq0oXrxXdbW9PMYP
N83+1F/AaXgMeOVJ08yffH1r0KpvN07xHAkepfPLBxe/8KrBLLJ6QIcH0qD9cJOc
cFXWg2ZhXYGHpfMvrMtueg==',
			],
		],
		'13' => [
			'49' => [
				'latest' => '14.0.4',
				'internalVersion' => '14.0.4.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'g7NKa7ZQLKfBAYOIEA0SHochEpYiCEiqlKdh5qlqjJu+QAA4kGyJ+J26RiB5gm56
KeqkSp347NaR68U6Qb9eaC3V1rrQdd990KncXqfmbqZVVN/8DXI6mej9Y5lv3Pop
9J8QuN6ViN3c3hFG/jf9laTdsLI9UCoUOM5LvngJbs2Sjv+vmMMkDguE+XyD5i9d
6Cq2ia0CEVY5J7RpBmvEaUOFSi+2fxn+QLT467pkQL9yt45Acq0oXrxXdbW9PMYP
N83+1F/AaXgMeOVJ08yffH1r0KpvN07xHAkepfPLBxe/8KrBLLJ6QIcH0qD9cJOc
cFXWg2ZhXYGHpfMvrMtueg==',
			],
			'51' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
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
				'latest' => '15.0.0 RC 2',
				'internalVersion' => '15.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'KUZBk8hLD63SG17XnBfYPgNq8cn6FWxTEpP5NR3WWvgvuycALOQ1Gc3yjTVe5o+K
1WW4f7AZqtSP9mnRIZN55svEulZII+g4drws3g2Qm4TYy+mCpep4PpwkS2Xz0Y0m
AQfy9d93CB3VwUcoL7XntDm+ZK0Wys92ZeIUtLtsOKTSbqF1QfSqXf68nvKOdPVl
T8vQUN9QCpvXxzy6f8/3ZW5QdNb3wo22Gktdn9vyy10wDkIJVU2EgF//ghpw4lSg
CqqOncSNsKpxDu0ndr7gxjkaRH7AIA8lEzemYbgPUN2Mz+BAGpmo5KGQVt8Yh5CA
pW9nLyF0LQuHqgUiKWgHiQ==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.0 RC 2',
				'internalVersion' => '15.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'KUZBk8hLD63SG17XnBfYPgNq8cn6FWxTEpP5NR3WWvgvuycALOQ1Gc3yjTVe5o+K
1WW4f7AZqtSP9mnRIZN55svEulZII+g4drws3g2Qm4TYy+mCpep4PpwkS2Xz0Y0m
AQfy9d93CB3VwUcoL7XntDm+ZK0Wys92ZeIUtLtsOKTSbqF1QfSqXf68nvKOdPVl
T8vQUN9QCpvXxzy6f8/3ZW5QdNb3wo22Gktdn9vyy10wDkIJVU2EgF//ghpw4lSg
CqqOncSNsKpxDu0ndr7gxjkaRH7AIA8lEzemYbgPUN2Mz+BAGpmo5KGQVt8Yh5CA
pW9nLyF0LQuHqgUiKWgHiQ==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.4',
				'internalVersion' => '14.0.4.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'g7NKa7ZQLKfBAYOIEA0SHochEpYiCEiqlKdh5qlqjJu+QAA4kGyJ+J26RiB5gm56
KeqkSp347NaR68U6Qb9eaC3V1rrQdd990KncXqfmbqZVVN/8DXI6mej9Y5lv3Pop
9J8QuN6ViN3c3hFG/jf9laTdsLI9UCoUOM5LvngJbs2Sjv+vmMMkDguE+XyD5i9d
6Cq2ia0CEVY5J7RpBmvEaUOFSi+2fxn+QLT467pkQL9yt45Acq0oXrxXdbW9PMYP
N83+1F/AaXgMeOVJ08yffH1r0KpvN07xHAkepfPLBxe/8KrBLLJ6QIcH0qD9cJOc
cFXWg2ZhXYGHpfMvrMtueg==',
			],
			'101' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.8',
				'internalVersion' => '13.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd220A5oVb+VhK96NmWdYMazhmcAMRT0kPuz34FnAUuVEOejRbgQ+Q+EvORMREmJg
IRSSagXEMEVfPE0ldtQi6wmpZgNtTzkxUvB3CXzzjYBZmeOLe4fcJQQLU4oAEmAK
KEpm74jQHqn72WE6d6PumdPPhOkgQCbO3r0oC7AY/BKKKdmCNng2GHIj3tDeQLQM
z7ks4kiYBu6gfazMU5ZaB5GFksrqclhU/WGlF27Aqemvho83vo43GuiNSSCTXVS9
K4p+w0pOsMnAIqXr8yEtk09DnS/gNlIn2jIHrAA1nja7hhtk23M9p0/YMKCycTPU
3RYKhMecxckBLLZMH6VMiA==',
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
		'14' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
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
