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
 * - stable
 * - beta
 * - daily
 *
 * With exception of daily (which is a daily build of master) all of them need to be configured manually. The config
 * array looks like the following:
 *
 * 'stable' => [
 * 	'9.1' => [
 * 		// 95% of instances on 9.1 will get this response
 * 		'95' => [
 * 			'latest' => '10.0.0',
 * 			'web' => 'https://docs.nextcloud.com/server/10/admin_manual/maintenance/upgrade.html',
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
 * 			// set this to true if the requesting version is end of life - it then shows an additional warning to the admin
 * 			'eol' => false,
 * 		],
 * 		// 5% of instances on 9.1 will get this response
 * 		'5' => [
 * 			'latest' => '11.0.0',
 * 			'web' => 'https://docs.nextcloud.com/server/10/admin_manual/maintenance/upgrade.html',
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
 * 			// set this to true if the requesting version is end of life - it then shows an additional warning to the admin
 * 			'eol' => false,
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
 * 'stable' => [
 * 	'8.2.0' => [
 * 		'100' => [
 * 			'latest' => '8.2.1',
 * 			'web' => 'https://docs.nextcloud.com/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2' => [
 * 		'100' => [
 * 			'latest' => '8.2.4',
 * 			'web' => 'https://docs.nextcloud.com/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2.4' => [
 * 		'5' => [
 * 			'latest' => '9.0.0',
 * 			'web' => 'https://docs.nextcloud.com/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 		'95' => [
 * 			'latest' => '8.2.5',
 * 			'web' => 'https://docs.nextcloud.com/server/8.2/admin_manual/maintenance/upgrade.html',
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
	'stable' => [
		'19' => [
			'100' => [
				'latest' => '19.0.2',
				'internalVersion' => '19.0.2.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'MfRJPu59KkLbJSICRyTyvtH4jLV6rwD5cTR3VTF7T5TqSwHLcOKDi7yEZK9qZKTm
qelJt17cUknifzJ+LKXwE26xua5SYA6KKGL1WIcaDKIJm8UMJhE3w7cMcxi79FVn
4Gs1jOc+TxTaM7hD32QzqIqLfYXmfXBjkV6zdNmqEXP8yHErdazU6+FSYbA5Z+JH
+LA46bRlAqZgf0NsfblCCpE5kAFlgMbZ4lpU6SfuNBWvIoX5k4iTtDvflQlpg58S
zY8iDQ+AZ2ttFoQ4MjfyTzM1VM0WDL5f70phVg4F+jG/JPxo9Qpyhq1Hy30ANPa0
dNqXHF6Re45NNc0vwNHjEA==',
			],
		],
		'18' => [
			'49' => [
				'latest' => '19.0.2',
				'internalVersion' => '19.0.2.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'MfRJPu59KkLbJSICRyTyvtH4jLV6rwD5cTR3VTF7T5TqSwHLcOKDi7yEZK9qZKTm
qelJt17cUknifzJ+LKXwE26xua5SYA6KKGL1WIcaDKIJm8UMJhE3w7cMcxi79FVn
4Gs1jOc+TxTaM7hD32QzqIqLfYXmfXBjkV6zdNmqEXP8yHErdazU6+FSYbA5Z+JH
+LA46bRlAqZgf0NsfblCCpE5kAFlgMbZ4lpU6SfuNBWvIoX5k4iTtDvflQlpg58S
zY8iDQ+AZ2ttFoQ4MjfyTzM1VM0WDL5f70phVg4F+jG/JPxo9Qpyhq1Hy30ANPa0
dNqXHF6Re45NNc0vwNHjEA==',
			],
			'51' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'CZbEx1X+W5dwuAQ0fha2OB5f8i/cJqF11jqdhsd9Zkz/z31NTMxUMW7QOd5xp2l9
NJTjPe8CUIk33dYioYlYZMZzP+lClzp4AyxpLUT8JUf1ShG00xXcaQHKvPTgT5Vd
JJWBiHnqRBI0UFkjDTT/i5zZNcPAjBfRn+EGtCBwI6Wj5LlY+SQpJMfZDY+y3sJO
1lg1pvzK+BjOjbO2FywgBNiQWJFcfdwGy/SKcMFtHJ/HA1RqJZTTPPzLcj2Rtaqn
JFQZhBrsMl2xDrusKJoQM3fr/1oij9Fkypdj7gSPByXGY0YYXJn0lsCk+Y3lmnJ4
iPayi7mxVC2DPou9LMNzew==',
			],
		],
		'17.0.9' => [
			'100' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'CZbEx1X+W5dwuAQ0fha2OB5f8i/cJqF11jqdhsd9Zkz/z31NTMxUMW7QOd5xp2l9
NJTjPe8CUIk33dYioYlYZMZzP+lClzp4AyxpLUT8JUf1ShG00xXcaQHKvPTgT5Vd
JJWBiHnqRBI0UFkjDTT/i5zZNcPAjBfRn+EGtCBwI6Wj5LlY+SQpJMfZDY+y3sJO
1lg1pvzK+BjOjbO2FywgBNiQWJFcfdwGy/SKcMFtHJ/HA1RqJZTTPPzLcj2Rtaqn
JFQZhBrsMl2xDrusKJoQM3fr/1oij9Fkypdj7gSPByXGY0YYXJn0lsCk+Y3lmnJ4
iPayi7mxVC2DPou9LMNzew==',
			],
			'101' => [
				'latest' => '17.0.9',
				'internalVersion' => '17.0.9.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'pAcP2aThE8GgEfJbK088+SnqYkfgLq66lyruOdjL3Q/TmlqwEb06WbOcxp91Nu45
1v177w9vJBqyx+PYo63JaOGGm8bZdfdcWHMwY6H3n0wx5RMUSQ8W9svROd5wpFwe
BxLBCJ7KK4uhhQoJmOU7qiiRkxBp9jpCx0giaNFHNMXqOF+I+SmAmuejVVK5zC99
nukGjbYybXEEImxJAM0AIGrKyHTo81FsEiHqCo7tA7ak5QMA5BN4mael9EsMv25V
upd/GQsE4qTkllmhTTjOf1HgpOnV2r4YqUftonQmwgszBOY4F4WQHVfAYe9db0tt
jkXs6eyckCsfFrd7f3MRbQ==',
			],
			'102' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'autoupdater' => false,
			],
		],
		'17' => [
			'100' => [
				'latest' => '17.0.9',
				'internalVersion' => '17.0.9.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'pAcP2aThE8GgEfJbK088+SnqYkfgLq66lyruOdjL3Q/TmlqwEb06WbOcxp91Nu45
1v177w9vJBqyx+PYo63JaOGGm8bZdfdcWHMwY6H3n0wx5RMUSQ8W9svROd5wpFwe
BxLBCJ7KK4uhhQoJmOU7qiiRkxBp9jpCx0giaNFHNMXqOF+I+SmAmuejVVK5zC99
nukGjbYybXEEImxJAM0AIGrKyHTo81FsEiHqCo7tA7ak5QMA5BN4mael9EsMv25V
upd/GQsE4qTkllmhTTjOf1HgpOnV2r4YqUftonQmwgszBOY4F4WQHVfAYe9db0tt
jkXs6eyckCsfFrd7f3MRbQ==',
			],
		],
		'16.0.11' => [
			'100' => [
				'latest' => '17.0.9',
				'internalVersion' => '17.0.9.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'pAcP2aThE8GgEfJbK088+SnqYkfgLq66lyruOdjL3Q/TmlqwEb06WbOcxp91Nu45
1v177w9vJBqyx+PYo63JaOGGm8bZdfdcWHMwY6H3n0wx5RMUSQ8W9svROd5wpFwe
BxLBCJ7KK4uhhQoJmOU7qiiRkxBp9jpCx0giaNFHNMXqOF+I+SmAmuejVVK5zC99
nukGjbYybXEEImxJAM0AIGrKyHTo81FsEiHqCo7tA7ak5QMA5BN4mael9EsMv25V
upd/GQsE4qTkllmhTTjOf1HgpOnV2r4YqUftonQmwgszBOY4F4WQHVfAYe9db0tt
jkXs6eyckCsfFrd7f3MRbQ==',
			],
		],
		'16' => [
			'100' => [
				'latest' => '16.0.11',
				'internalVersion' => '16.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'b7SOD6KATY0bpbAcL/+1gdeLeuWAvsIn+tuUzF6HStrjxLrARw8cOrM7bCq5zcq7
tJCWrI2Ww9CrKH8kNalEZNMDZy346QhYkUZNOiU2IP8wdb1601vRXfIkPyTVSpdk
RDMQWtIushwa/WIZTKnJWo1fd0juxBnbmIl30rxDgUpBOkjx0zGvA2Ff+mssezX3
qGhaB0Btr45xpgbHbeEQwsH1w2PXJFy9GsF2psbBEIykCPAxgRWR32bTGH8ws9Uy
zpAxCj7W4wEnJFhsQ2zb0Wh5ZjSA9G1SARJhMp/8Efwm3uWJr5xK4MYKG2bQ29mt
HWPTEBalqX2V9enOLAgVWQ==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.11',
				'internalVersion' => '16.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'b7SOD6KATY0bpbAcL/+1gdeLeuWAvsIn+tuUzF6HStrjxLrARw8cOrM7bCq5zcq7
tJCWrI2Ww9CrKH8kNalEZNMDZy346QhYkUZNOiU2IP8wdb1601vRXfIkPyTVSpdk
RDMQWtIushwa/WIZTKnJWo1fd0juxBnbmIl30rxDgUpBOkjx0zGvA2Ff+mssezX3
qGhaB0Btr45xpgbHbeEQwsH1w2PXJFy9GsF2psbBEIykCPAxgRWR32bTGH8ws9Uy
zpAxCj7W4wEnJFhsQ2zb0Wh5ZjSA9G1SARJhMp/8Efwm3uWJr5xK4MYKG2bQ29mt
HWPTEBalqX2V9enOLAgVWQ==',
			],
			'101' => [
				'latest' => '15.0.14',
				'internalVersion' => '15.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
DvYBQvWAJx0Q7tV9bofZjA==',
			],
			'102' => [
				'latest' => '16.0.11',
				'internalVersion' => '16.0.11.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => true,
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
	'beta' => [
		'19.0.2.2' => [
			'100' => [
				'latest' => '20.0.0 Beta 1',
				'internalVersion' => '20.0.0.3',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-20.0.0beta1.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'etqJIncFWlFZSLlNhE/cu+qCqO0a1VPNFyFcGHY6ZLzUaTls2z62i2csHO8MQxQc
0yrWy9IxMXpwuzfOkR0HCXH16jc9QWm8SqPAyYGkNdyeq2LEiAnRMHIVobTY/uLY
3JZIUSvoHGcgeAPVL2y3m0XxdBvey9k2ot/MaFTSwXulh5Y6PNpnGb1WijH0FezF
AhgRY5NaTK4kkZuBPUnAc4sPi312IkaR/6gZytNCm3JWPCKY/muY689gWii7Ft4p
jWR9BqbCeLNoG5FK7Mgod2ElX37S81gGrRVSiPwYWAHmeMHWkWr2mkr8UCFr2kXx
BeYmjrn+v374fW1I3jBudA==',
			],
		],
		'19' => [
			'100' => [
				'latest' => '19.0.2',
				'internalVersion' => '19.0.2.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'MfRJPu59KkLbJSICRyTyvtH4jLV6rwD5cTR3VTF7T5TqSwHLcOKDi7yEZK9qZKTm
qelJt17cUknifzJ+LKXwE26xua5SYA6KKGL1WIcaDKIJm8UMJhE3w7cMcxi79FVn
4Gs1jOc+TxTaM7hD32QzqIqLfYXmfXBjkV6zdNmqEXP8yHErdazU6+FSYbA5Z+JH
+LA46bRlAqZgf0NsfblCCpE5kAFlgMbZ4lpU6SfuNBWvIoX5k4iTtDvflQlpg58S
zY8iDQ+AZ2ttFoQ4MjfyTzM1VM0WDL5f70phVg4F+jG/JPxo9Qpyhq1Hy30ANPa0
dNqXHF6Re45NNc0vwNHjEA==',
			],
		],
		'18.0.8.2' => [
			'100' => [
				'latest' => '19.0.2',
				'internalVersion' => '19.0.2.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'MfRJPu59KkLbJSICRyTyvtH4jLV6rwD5cTR3VTF7T5TqSwHLcOKDi7yEZK9qZKTm
qelJt17cUknifzJ+LKXwE26xua5SYA6KKGL1WIcaDKIJm8UMJhE3w7cMcxi79FVn
4Gs1jOc+TxTaM7hD32QzqIqLfYXmfXBjkV6zdNmqEXP8yHErdazU6+FSYbA5Z+JH
+LA46bRlAqZgf0NsfblCCpE5kAFlgMbZ4lpU6SfuNBWvIoX5k4iTtDvflQlpg58S
zY8iDQ+AZ2ttFoQ4MjfyTzM1VM0WDL5f70phVg4F+jG/JPxo9Qpyhq1Hy30ANPa0
dNqXHF6Re45NNc0vwNHjEA==',
			],
		],
		'18' => [
			'100' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'CZbEx1X+W5dwuAQ0fha2OB5f8i/cJqF11jqdhsd9Zkz/z31NTMxUMW7QOd5xp2l9
NJTjPe8CUIk33dYioYlYZMZzP+lClzp4AyxpLUT8JUf1ShG00xXcaQHKvPTgT5Vd
JJWBiHnqRBI0UFkjDTT/i5zZNcPAjBfRn+EGtCBwI6Wj5LlY+SQpJMfZDY+y3sJO
1lg1pvzK+BjOjbO2FywgBNiQWJFcfdwGy/SKcMFtHJ/HA1RqJZTTPPzLcj2Rtaqn
JFQZhBrsMl2xDrusKJoQM3fr/1oij9Fkypdj7gSPByXGY0YYXJn0lsCk+Y3lmnJ4
iPayi7mxVC2DPou9LMNzew==',
			],
		],
		'17.0.9.2' => [
			'100' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'CZbEx1X+W5dwuAQ0fha2OB5f8i/cJqF11jqdhsd9Zkz/z31NTMxUMW7QOd5xp2l9
NJTjPe8CUIk33dYioYlYZMZzP+lClzp4AyxpLUT8JUf1ShG00xXcaQHKvPTgT5Vd
JJWBiHnqRBI0UFkjDTT/i5zZNcPAjBfRn+EGtCBwI6Wj5LlY+SQpJMfZDY+y3sJO
1lg1pvzK+BjOjbO2FywgBNiQWJFcfdwGy/SKcMFtHJ/HA1RqJZTTPPzLcj2Rtaqn
JFQZhBrsMl2xDrusKJoQM3fr/1oij9Fkypdj7gSPByXGY0YYXJn0lsCk+Y3lmnJ4
iPayi7mxVC2DPou9LMNzew==',
			],
		],
		'17' => [
			'100' => [
				'latest' => '17.0.9',
				'internalVersion' => '17.0.9.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'signature' => 'pAcP2aThE8GgEfJbK088+SnqYkfgLq66lyruOdjL3Q/TmlqwEb06WbOcxp91Nu45
1v177w9vJBqyx+PYo63JaOGGm8bZdfdcWHMwY6H3n0wx5RMUSQ8W9svROd5wpFwe
BxLBCJ7KK4uhhQoJmOU7qiiRkxBp9jpCx0giaNFHNMXqOF+I+SmAmuejVVK5zC99
nukGjbYybXEEImxJAM0AIGrKyHTo81FsEiHqCo7tA7ak5QMA5BN4mael9EsMv25V
upd/GQsE4qTkllmhTTjOf1HgpOnV2r4YqUftonQmwgszBOY4F4WQHVfAYe9db0tt
jkXs6eyckCsfFrd7f3MRbQ==',
			],
			'101' => [
				'latest' => '18.0.8',
				'internalVersion' => '18.0.8.2',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'autoupdater' => false,
			],
		],
		'16' => [
			'100' => [
				'latest' => '17.0.9',
				'internalVersion' => '17.0.9.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'pAcP2aThE8GgEfJbK088+SnqYkfgLq66lyruOdjL3Q/TmlqwEb06WbOcxp91Nu45
1v177w9vJBqyx+PYo63JaOGGm8bZdfdcWHMwY6H3n0wx5RMUSQ8W9svROd5wpFwe
BxLBCJ7KK4uhhQoJmOU7qiiRkxBp9jpCx0giaNFHNMXqOF+I+SmAmuejVVK5zC99
nukGjbYybXEEImxJAM0AIGrKyHTo81FsEiHqCo7tA7ak5QMA5BN4mael9EsMv25V
upd/GQsE4qTkllmhTTjOf1HgpOnV2r4YqUftonQmwgszBOY4F4WQHVfAYe9db0tt
jkXs6eyckCsfFrd7f3MRbQ==',
			],
		],
		'15' => [
			'100' => [
				'latest' => '16.0.11',
				'internalVersion' => '16.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-16.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/16/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'b7SOD6KATY0bpbAcL/+1gdeLeuWAvsIn+tuUzF6HStrjxLrARw8cOrM7bCq5zcq7
tJCWrI2Ww9CrKH8kNalEZNMDZy346QhYkUZNOiU2IP8wdb1601vRXfIkPyTVSpdk
RDMQWtIushwa/WIZTKnJWo1fd0juxBnbmIl30rxDgUpBOkjx0zGvA2Ff+mssezX3
qGhaB0Btr45xpgbHbeEQwsH1w2PXJFy9GsF2psbBEIykCPAxgRWR32bTGH8ws9Uy
zpAxCj7W4wEnJFhsQ2zb0Wh5ZjSA9G1SARJhMp/8Efwm3uWJr5xK4MYKG2bQ29mt
HWPTEBalqX2V9enOLAgVWQ==',
			],
			'101' => [
				'latest' => '15.0.14',
				'internalVersion' => '15.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.0',
				'signature' => 'A5WWizBmhSC+dfJNrA3eNjx4w3w9i+9GKs0TWCEOAi74E1gfQymaSa3UNdm/fjmP
Osy1fnmICjDfXoIwkle+dlfAbwg2faRkF1px9a538Y5XXTXZ63P5JXABHYSvIAY3
QDk2CwzM4tSiL2rf7tGgG8uxtvXkyG7DfHH7BweKFBPQ0Ly2ESiSHzVagAHo7f/O
x3G7qC6o4g8pVPfVyXhOZcwf29et9DY3xtKluMQxrmHVTQ6mJ65IRny+/MNMrjwf
05B0WC1WDnIiMAfUcEMovxuqoFexvrpnJ9ByOPPLTYMWfpQcJHjw4FiqgFQ/of/i
DvYBQvWAJx0Q7tV9bofZjA==',
			],
			'102' => [
				'latest' => '16.0.11',
				'internalVersion' => '16.0.11.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-0/',
				'web' => 'https://nextcloud.com/outdated-php-7-0/',
				'eol' => true,
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
		'20' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.2',
		],
		'19' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable19.zip',
			'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.2',
		],
		'18' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable18.zip',
			'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.2',
		],
	],
	'_settings' => [
		'changelogServer' => 'https://updates.nextcloud.com/changelog_server/',
	],
];
