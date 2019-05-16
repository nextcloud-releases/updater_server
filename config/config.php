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
				'latest' => '16.0.1',
				'internalVersion' => '16.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'EztP8mnw0b3LMdTF/XvG75zid8SCY65izgJT5r6wzWNmmwLgTWLYAdLuOJUjrLzp
/Hz4EREmOqiQfVMYQYvjRgGIC6CuB6fReZjjb/4wEzILheOMkKo1NMgA23FJL+gW
lDLuaYxHcZXsgWtSmk8P0+4rjLs5Lda9rKE/ELCCmk+QH+TusGoAq4UGeE0KNxuV
+u4yVs5IM/Hw8tHI/utf393zr/9DBx+lA2Lur1xQ2VTXaS6cNhqC1jnwxyn/U5yE
hg/E1EkHNjdwU2NQmoW700eVAOqjWV7BTuJSVb/5KgH3aySnVaxedr6xelaymivy
Ag4MmolWt+CHLzysVq+imQ==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'14.0.10' => [
			'100' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'Y4pYfduB6QBDRHM5xn5w79jTwA2Q1ouNbEIEvdymrek4KGIB9U/YLd/XeFQhIJxI
JotTgLG6tegrKVEp5gKcoZBOPyeCulq6xsyL3XhKmxBK+XS/Hcioo9XGHVQU6PRg
vmiZpXSBsxpkHEJXsnMa5esX+BPT7oNsVbiXSWSUBXd5px43TA5R1j8yYmBVkkuL
ef+Z8MAROkmzDc0zGDQsIwxxKCNW25sa9wQP2JJaDC686DpIM3ouai4wve1Dw3Uc
sEMOSGG+pElQQSYcNxG2oex6v+dsst8KHS1AhhiU/Kg8uvYzsBiEEwRf7biMDD4Q
293HUGcejWFDofzHgtse7A==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'Y4pYfduB6QBDRHM5xn5w79jTwA2Q1ouNbEIEvdymrek4KGIB9U/YLd/XeFQhIJxI
JotTgLG6tegrKVEp5gKcoZBOPyeCulq6xsyL3XhKmxBK+XS/Hcioo9XGHVQU6PRg
vmiZpXSBsxpkHEJXsnMa5esX+BPT7oNsVbiXSWSUBXd5px43TA5R1j8yYmBVkkuL
ef+Z8MAROkmzDc0zGDQsIwxxKCNW25sa9wQP2JJaDC686DpIM3ouai4wve1Dw3Uc
sEMOSGG+pElQQSYcNxG2oex6v+dsst8KHS1AhhiU/Kg8uvYzsBiEEwRf7biMDD4Q
293HUGcejWFDofzHgtse7A==',
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
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
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
				'latest' => '16.0.1',
				'internalVersion' => '16.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'EztP8mnw0b3LMdTF/XvG75zid8SCY65izgJT5r6wzWNmmwLgTWLYAdLuOJUjrLzp
/Hz4EREmOqiQfVMYQYvjRgGIC6CuB6fReZjjb/4wEzILheOMkKo1NMgA23FJL+gW
lDLuaYxHcZXsgWtSmk8P0+4rjLs5Lda9rKE/ELCCmk+QH+TusGoAq4UGeE0KNxuV
+u4yVs5IM/Hw8tHI/utf393zr/9DBx+lA2Lur1xQ2VTXaS6cNhqC1jnwxyn/U5yE
hg/E1EkHNjdwU2NQmoW700eVAOqjWV7BTuJSVb/5KgH3aySnVaxedr6xelaymivy
Ag4MmolWt+CHLzysVq+imQ==',
			],
		],
		'15' => [
			'25' => [
				'latest' => '16.0.1',
				'internalVersion' => '16.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'EztP8mnw0b3LMdTF/XvG75zid8SCY65izgJT5r6wzWNmmwLgTWLYAdLuOJUjrLzp
/Hz4EREmOqiQfVMYQYvjRgGIC6CuB6fReZjjb/4wEzILheOMkKo1NMgA23FJL+gW
lDLuaYxHcZXsgWtSmk8P0+4rjLs5Lda9rKE/ELCCmk+QH+TusGoAq4UGeE0KNxuV
+u4yVs5IM/Hw8tHI/utf393zr/9DBx+lA2Lur1xQ2VTXaS6cNhqC1jnwxyn/U5yE
hg/E1EkHNjdwU2NQmoW700eVAOqjWV7BTuJSVb/5KgH3aySnVaxedr6xelaymivy
Ag4MmolWt+CHLzysVq+imQ==',
			],
			'75' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'Y4pYfduB6QBDRHM5xn5w79jTwA2Q1ouNbEIEvdymrek4KGIB9U/YLd/XeFQhIJxI
JotTgLG6tegrKVEp5gKcoZBOPyeCulq6xsyL3XhKmxBK+XS/Hcioo9XGHVQU6PRg
vmiZpXSBsxpkHEJXsnMa5esX+BPT7oNsVbiXSWSUBXd5px43TA5R1j8yYmBVkkuL
ef+Z8MAROkmzDc0zGDQsIwxxKCNW25sa9wQP2JJaDC686DpIM3ouai4wve1Dw3Uc
sEMOSGG+pElQQSYcNxG2oex6v+dsst8KHS1AhhiU/Kg8uvYzsBiEEwRf7biMDD4Q
293HUGcejWFDofzHgtse7A==',
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
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
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
				'latest' => '16.0.1',
				'internalVersion' => '16.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'EztP8mnw0b3LMdTF/XvG75zid8SCY65izgJT5r6wzWNmmwLgTWLYAdLuOJUjrLzp
/Hz4EREmOqiQfVMYQYvjRgGIC6CuB6fReZjjb/4wEzILheOMkKo1NMgA23FJL+gW
lDLuaYxHcZXsgWtSmk8P0+4rjLs5Lda9rKE/ELCCmk+QH+TusGoAq4UGeE0KNxuV
+u4yVs5IM/Hw8tHI/utf393zr/9DBx+lA2Lur1xQ2VTXaS6cNhqC1jnwxyn/U5yE
hg/E1EkHNjdwU2NQmoW700eVAOqjWV7BTuJSVb/5KgH3aySnVaxedr6xelaymivy
Ag4MmolWt+CHLzysVq+imQ==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.1',
				'internalVersion' => '16.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'EztP8mnw0b3LMdTF/XvG75zid8SCY65izgJT5r6wzWNmmwLgTWLYAdLuOJUjrLzp
/Hz4EREmOqiQfVMYQYvjRgGIC6CuB6fReZjjb/4wEzILheOMkKo1NMgA23FJL+gW
lDLuaYxHcZXsgWtSmk8P0+4rjLs5Lda9rKE/ELCCmk+QH+TusGoAq4UGeE0KNxuV
+u4yVs5IM/Hw8tHI/utf393zr/9DBx+lA2Lur1xQ2VTXaS6cNhqC1jnwxyn/U5yE
hg/E1EkHNjdwU2NQmoW700eVAOqjWV7BTuJSVb/5KgH3aySnVaxedr6xelaymivy
Ag4MmolWt+CHLzysVq+imQ==',
			],
			'101' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.8',
				'internalVersion' => '15.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'HfCCCyWWbk0tzwwVW9AYgoIG1WBJjkppYfSH+7avEQ4R16bu99Xe8MCpu3k6aEbG
jaNOdmhQjLMPq5Z19s1DnV0SIb6Sg+l6EJkoAUNv5DqvqN+Pf+AR1xdoCNpcD2dE
qqEnVOxTbcfl2O6fzJzpfmxJpb9oiwT+MdivrHZIaYKXTSIWdzCAYuWN4MM025Jg
f7V+WxSNVoVhrklxpX3uKUA/NGDnQHhhWhhUYkD+NPi2k9RWttx8ZIERA2VJsIJh
JsLiABg6rggR4lbSQmj7LXGmDcwia0ATA/NW6cjphEugwvNjZC4caK5QXxEMLG9h
VyC3u5CORz5PHlIv2Jefyw==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.11 RC1',
				'internalVersion' => '14.0.11.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.11RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'DHzgsAQjAi/ZY1xr6FErs0NrmMJT8LrUS5ixsAL+B3B143AwF84aM8Ar87rPlkBY
EqM/VdiuIqHgbTFDbIJzhsYFXlo4Ws2Zht3wkY08Jg66BJQHRLfdZ7FvNI4UOHge
2f6DDno+na8hYEx0ARRE/wEh88pG0emWuuDsmBL5A4f8OGYZR8qObIX+dzxntXry
qrEizf3IVUmxBDVZQOPh91giATAha8MwpM63GvklDnTbuME3g7Y57ZKHt5YH444/
TtAWoo2BhDHdjrFVvUvklgMoE/LxQ6RaYsMTraH5Ry7MFAA1JVRWSeFhEQaAMw7F
izomIiYS7ybAJXBxIzoBMg==',
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
				'latest' => '14.0.10',
				'internalVersion' => '14.0.10.0',
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
