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
				'latest' => '14.0.3',
				'internalVersion' => '14.0.3.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'cWbv8qrFK4lKaRAtHLvM3AjLcwd4S1lIWYzE3hbAN30MuW60weRqYZf412jUe/7g
EEaas6MNqgd5omqwsnTwn4KwtfUkKSB5JbwGHZY95Wv/mf5EyZfw0x04xo5A6W5l
Zv7kK0HOGGOzT1nqyJJHvin9jU3eBzpWe9Es2hwhQYFI9C+V/5Fvbm37dqN821gQ
aTT4zv8XwVkAoH6BRrNGjoUqQHVBcONVEcYPEahBI9SjuTVX807e9HETrsziKtHu
k5E2t0FCNl/qUvxEDtsvQk5+XD1fW6v5ievqfLoZhv/XqKdCfAqgyC83NijYB0/8
ajEplLd/VwvoezLExRngLQ==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '13.0.7',
				'internalVersion' => '13.0.7.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'mg6ZQzeMEdUG3Fh14WwL8GMThuceU3u6ToC3K6vwsIF6OtkCZbTTNAUI6eEVdEj8
ukj48RzWcY+uTT0z1qj8H/HTLHwLnyvGmUDDFjyQhJySM0w6HeCT0Tui+Vn2XYKB
Ow1epMdVIaaqCHWogaFZar5fhUTVxhLlFMJV1IdNl94uVzHrn3aTA78L+HDR7sSk
b2l131XOqQ88ku85er4rtk8vNi6V72nVj1iybZOdMpLaVQolDy+xgeJ8H8zvgFYj
JxykFt4cHsk20guVaUrq700DCDt3/610DJY9ICthCfD9Bp7jmWK9uJnlJFRC3aL9
bIUO2hctEIlrVcUqBOeY6g==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.7',
				'internalVersion' => '13.0.7.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'mg6ZQzeMEdUG3Fh14WwL8GMThuceU3u6ToC3K6vwsIF6OtkCZbTTNAUI6eEVdEj8
ukj48RzWcY+uTT0z1qj8H/HTLHwLnyvGmUDDFjyQhJySM0w6HeCT0Tui+Vn2XYKB
Ow1epMdVIaaqCHWogaFZar5fhUTVxhLlFMJV1IdNl94uVzHrn3aTA78L+HDR7sSk
b2l131XOqQ88ku85er4rtk8vNi6V72nVj1iybZOdMpLaVQolDy+xgeJ8H8zvgFYj
JxykFt4cHsk20guVaUrq700DCDt3/610DJY9ICthCfD9Bp7jmWK9uJnlJFRC3aL9
bIUO2hctEIlrVcUqBOeY6g==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.12',
				'internalVersion' => '12.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
RqCcW694B/WCmqjxqDfbfQ==',
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
				'latest' => '14.0.3',
				'internalVersion' => '14.0.3.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'cWbv8qrFK4lKaRAtHLvM3AjLcwd4S1lIWYzE3hbAN30MuW60weRqYZf412jUe/7g
EEaas6MNqgd5omqwsnTwn4KwtfUkKSB5JbwGHZY95Wv/mf5EyZfw0x04xo5A6W5l
Zv7kK0HOGGOzT1nqyJJHvin9jU3eBzpWe9Es2hwhQYFI9C+V/5Fvbm37dqN821gQ
aTT4zv8XwVkAoH6BRrNGjoUqQHVBcONVEcYPEahBI9SjuTVX807e9HETrsziKtHu
k5E2t0FCNl/qUvxEDtsvQk5+XD1fW6v5ievqfLoZhv/XqKdCfAqgyC83NijYB0/8
ajEplLd/VwvoezLExRngLQ==',
			],
		],
		'13' => [
			'49' => [
				'latest' => '14.0.3',
				'internalVersion' => '14.0.3.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'cWbv8qrFK4lKaRAtHLvM3AjLcwd4S1lIWYzE3hbAN30MuW60weRqYZf412jUe/7g
EEaas6MNqgd5omqwsnTwn4KwtfUkKSB5JbwGHZY95Wv/mf5EyZfw0x04xo5A6W5l
Zv7kK0HOGGOzT1nqyJJHvin9jU3eBzpWe9Es2hwhQYFI9C+V/5Fvbm37dqN821gQ
aTT4zv8XwVkAoH6BRrNGjoUqQHVBcONVEcYPEahBI9SjuTVX807e9HETrsziKtHu
k5E2t0FCNl/qUvxEDtsvQk5+XD1fW6v5ievqfLoZhv/XqKdCfAqgyC83NijYB0/8
ajEplLd/VwvoezLExRngLQ==',
			],
			'51' => [
				'latest' => '13.0.7',
				'internalVersion' => '13.0.7.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'mg6ZQzeMEdUG3Fh14WwL8GMThuceU3u6ToC3K6vwsIF6OtkCZbTTNAUI6eEVdEj8
ukj48RzWcY+uTT0z1qj8H/HTLHwLnyvGmUDDFjyQhJySM0w6HeCT0Tui+Vn2XYKB
Ow1epMdVIaaqCHWogaFZar5fhUTVxhLlFMJV1IdNl94uVzHrn3aTA78L+HDR7sSk
b2l131XOqQ88ku85er4rtk8vNi6V72nVj1iybZOdMpLaVQolDy+xgeJ8H8zvgFYj
JxykFt4cHsk20guVaUrq700DCDt3/610DJY9ICthCfD9Bp7jmWK9uJnlJFRC3aL9
bIUO2hctEIlrVcUqBOeY6g==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.7',
				'internalVersion' => '13.0.7.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'mg6ZQzeMEdUG3Fh14WwL8GMThuceU3u6ToC3K6vwsIF6OtkCZbTTNAUI6eEVdEj8
ukj48RzWcY+uTT0z1qj8H/HTLHwLnyvGmUDDFjyQhJySM0w6HeCT0Tui+Vn2XYKB
Ow1epMdVIaaqCHWogaFZar5fhUTVxhLlFMJV1IdNl94uVzHrn3aTA78L+HDR7sSk
b2l131XOqQ88ku85er4rtk8vNi6V72nVj1iybZOdMpLaVQolDy+xgeJ8H8zvgFYj
JxykFt4cHsk20guVaUrq700DCDt3/610DJY9ICthCfD9Bp7jmWK9uJnlJFRC3aL9
bIUO2hctEIlrVcUqBOeY6g==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.12',
				'internalVersion' => '12.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'PZ72iVGB4dQfDsiCWgGZ1WHJJG/92Xu1b8rc6XyUlwp5H3ae11KOCvnu/Yb4Fa9Y
qQ/nfKgKM/698CoqdyzVl2GdA5OqvgLrZF4MkxP3Ybd+Ljl9rcw+ZxjQDjq/p/jj
4O92e58qJXneoovEdxTwDTY7KlfDJQ6obEWIhXlbmegQoCug7btfIy+lFAUFoTEC
MAQOPzi5o6P9hU9VqHIEK8KSet6Mqa6ZyN1CeEMQm77235M86OfMjfqxQIXTiSla
ujX6Y+BpGxAOmoTCl1/vm0x5BD/7auh+Z9oXRBxpR6BnA+oYGwW4AQTApaDp2Hkq
RqCcW694B/WCmqjxqDfbfQ==',
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
				'latest' => '15.0.0 beta 2',
				'internalVersion' => '15.0.0.6',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta2.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'W5QzT0g9uIjBE7WWPsaVNQI6tEZ8TotMbXW8bLgM5wpLNsHo/IDwyKAxCXbyYjML
V165uFZjnI8QEDS8azNUz471OzFOTgJ4ZmwAgqtfa5kfGenmbeZHnVBhctP5rXAR
CsLWlbjeCmmRYNWborX5k4X/hWenPfTitLwJMBuhXxOfRKxrtXV6jLYskmL7OKH+
G4ZItG3u+f/qjqW3Q3zVk+SA10E3da6ReniNlZsCpr8E0tIKYw3iaQ7ziVrW0ZIL
5FSIugBF1i1iiRCPEmWHIPQFsOf9f0uyatwU20eDvDMuq+WbHOAuo00frd/F46Sp
ewNOcFmzQAyO4tQUjV0RJg==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.0 beta 2',
				'internalVersion' => '15.0.0.6',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.0beta2.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'W5QzT0g9uIjBE7WWPsaVNQI6tEZ8TotMbXW8bLgM5wpLNsHo/IDwyKAxCXbyYjML
V165uFZjnI8QEDS8azNUz471OzFOTgJ4ZmwAgqtfa5kfGenmbeZHnVBhctP5rXAR
CsLWlbjeCmmRYNWborX5k4X/hWenPfTitLwJMBuhXxOfRKxrtXV6jLYskmL7OKH+
G4ZItG3u+f/qjqW3Q3zVk+SA10E3da6ReniNlZsCpr8E0tIKYw3iaQ7ziVrW0ZIL
5FSIugBF1i1iiRCPEmWHIPQFsOf9f0uyatwU20eDvDMuq+WbHOAuo00frd/F46Sp
ewNOcFmzQAyO4tQUjV0RJg==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.4 RC 1',
				'internalVersion' => '14.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.4RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'iIY5kZZmyhV21svic8dM1kDXExRUVurK4Xr5kKL+9XLTWwp+0WP/wXFvImgAp3dR
ARqDIseFTFZYQAaH+fIM3noO1nFN7ytW1Dm4+KRskAw/9s1U+n3SV4qV1YZgreNH
GJIdiTnwsC61luVKK6VLJnwzhyibTSdfSBhj64j9XgUCskTfIH9kj2Q+MLARuyAw
4CZCPo+jddiv5W/H+8UFNoi3xJga1VwkdezWwV3Oy7WmGipXlRrH/usGm3Ve5Z/p
cywHfAwr0OB+mM1WBMRDtU4k0m94WlQnX5f0GfKkcP1ZnWLFH41ZzrIIFK9d526V
K6VgBqFJPfUCAwc4wvLKWQ==',
			],
			'101' => [
				'latest' => '13.0.8 RC 1',
				'internalVersion' => '13.0.8.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
eV1Jknbnijs9vGejO8ndLw==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.8 RC 1',
				'internalVersion' => '13.0.8.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.8RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'dAxk6j5jXpU5kIKFIeJV9iszF5jzkr6b7MJiaR/JVDzwBmAAn1owd/UhwTPQ+Oux
2g55fNdciuZtSMi+dwD+kNWcZS2ZRwvNL9gkXHuNMSpnZ8aAU50gE2tw8PPq69PM
ybjMGoch+C++m4EZt5lp1LRQdfEaPA1dmz+Q6l2LMFOp9eoyeXxdPZxShNIQs8ig
rLa8qBUzsImB0gnICx6BKP/hMZd8SwDt/gSJiO/wTHGgVU5+4TRHef95gMdmsK7c
0bRtqNKXpK6JsAmOR0K647btfcRvHNqMvADeYYGoOj3/5DP4Wfdef7yTkjfOoVBm
eV1Jknbnijs9vGejO8ndLw==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.13 RC 2',
				'internalVersion' => '12.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.13RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'mUtKIwOEfImiNl+dRgvMI7to++Kd9NAoxEtTk+zTx4HxcJozw3sFUl5hEiCKOSJB
kyMGJEn3HnlYIE1baspmQGMZMBNzBDWjb4o2r//NgEkjEKlMHM1kEr5RHaTEupGH
3Ih7uAxlpY1MSiiaZbCcnvN+cAMzDDOYut4+b6DHpk/CQQb0ETXkFXN9MjH3u+Uu
e1XkjyfAL5nj7LFSogz9LXOqnhjZyZ9CHikqhdjv5u/VJXDRpt3cmLiAHEA+WbIv
r7A5kxYnC0M1SGnCIVvXLtZHKd0C2Y1wptyPB7t3MGZicJwkgZYkqZ1S0zRUpFqj
IXyGxqyzN0stYhJ4GUdbPQ==',
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
