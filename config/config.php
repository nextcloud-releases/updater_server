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
		'20' => [
			'100' => [
				'latest' => '20.0.4',
				'internalVersion' => '20.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'ClTarIGaxeGs3sU1mwUkFrd3Y4x6j+FA7gNaZHljfgW78sFmEFHUlPm3EtCCSNFF
AbCkOoFrj52PZI9Mj4C3lyuDtS4lRHaz6u9UKr74K7uqvEy0Wsuh8lisFwZY84FP
OP/ML5q/gAyHFcX642cmCRvX5CwATTbMZWJu8i4StwpVlcvLf8K9ZYChd+r82yDf
zZTRXjT32LcGK+XzWteU0thlw3B5XVFBM6feWYp6QMB1sf/hgxZt/R6bt+A3DKMg
6bubvECfuzmG/hiGR+KoonDNUdNaQEML6XQ7o9Rr0o9uj66Sfx53sj6fXODlSxJL
EpPL6uqEg/2XoXjnLo975Q==',
			],
		],
		'19.0.6' => [
			'100' => [
				'latest' => '20.0.4',
				'internalVersion' => '20.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'ClTarIGaxeGs3sU1mwUkFrd3Y4x6j+FA7gNaZHljfgW78sFmEFHUlPm3EtCCSNFF
AbCkOoFrj52PZI9Mj4C3lyuDtS4lRHaz6u9UKr74K7uqvEy0Wsuh8lisFwZY84FP
OP/ML5q/gAyHFcX642cmCRvX5CwATTbMZWJu8i4StwpVlcvLf8K9ZYChd+r82yDf
zZTRXjT32LcGK+XzWteU0thlw3B5XVFBM6feWYp6QMB1sf/hgxZt/R6bt+A3DKMg
6bubvECfuzmG/hiGR+KoonDNUdNaQEML6XQ7o9Rr0o9uj66Sfx53sj6fXODlSxJL
EpPL6uqEg/2XoXjnLo975Q==',
			],
		],
		'19' => [
			'100' => [
				'latest' => '19.0.6',
				'internalVersion' => '19.0.6.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'l7cAfRN4GS1cqb8Iajl/gDMfAkNK+UY2Uiw1n+RyvpNc2sZrifNBo2iB8sJzQxKD
s2qYG+2du+5ccWdwwgPfTsx8kF3c9o7VyVtcGuU7Kx/jQJ4sY/d3bVd7xjvuQwJE
2oBkUXgkxZBNoqoQlhX0+Dzb6SNTQX3Ke3IXGcQbUw9um6XfqP4BY78R1YqbbDUL
aS3B/CJ5AavojkTCwztULZ4YxJQz+w07tQkkqhDoRdnvYk/revgT0pI8a7i0fMoh
K7o4gRoaXKMADVBA79TvdScmiERAktn2KFJLyUbBAfgIZ4IL+EJRw4OvqYDRP511
elQaq4VjXdmn3gEk8zaxbw==',
			],
		],
		'18.0.12' => [
			'100' => [
				'latest' => '19.0.6',
				'internalVersion' => '19.0.6.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'l7cAfRN4GS1cqb8Iajl/gDMfAkNK+UY2Uiw1n+RyvpNc2sZrifNBo2iB8sJzQxKD
s2qYG+2du+5ccWdwwgPfTsx8kF3c9o7VyVtcGuU7Kx/jQJ4sY/d3bVd7xjvuQwJE
2oBkUXgkxZBNoqoQlhX0+Dzb6SNTQX3Ke3IXGcQbUw9um6XfqP4BY78R1YqbbDUL
aS3B/CJ5AavojkTCwztULZ4YxJQz+w07tQkkqhDoRdnvYk/revgT0pI8a7i0fMoh
K7o4gRoaXKMADVBA79TvdScmiERAktn2KFJLyUbBAfgIZ4IL+EJRw4OvqYDRP511
elQaq4VjXdmn3gEk8zaxbw==',
			],
		],
		'18' => [
			'100' => [
				'latest' => '18.0.12',
				'internalVersion' => '18.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'uQEDNVJ6BLpgo6Zb24r5cRqbS628fps/JZXbZlc6x5n8WGCsjQ4XcdLLsTaIrxh3
jB0xYgv+gpiy6qJzTf9sGFu/+3lg2RuA7MAf/rFGJtxy+VMPtvAumacYmty2O3T9
eHUuB7UfaULT4/TRqu+IJlQbK0BFR9ooIYTBpVu6QdIvL7CpX1OOR/NzX9irfKgh
uZ5QDm/0Wu/Jb5YoAh7Z13o4Kx8vxQf8VugfXewUMGV31uUsYeWLAPXClU3f4WBh
g20jQTSjc00309fIw0Hc4YKJ9DbRGGLjY+qda9jqoHF+HZtRI3jW/Tq8xiM/y0EM
3nQKYmVd6j+4nyF8/hHs0Q==',
			],
		],
		'17.0.10' => [
			'100' => [
				'latest' => '18.0.12',
				'internalVersion' => '18.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'uQEDNVJ6BLpgo6Zb24r5cRqbS628fps/JZXbZlc6x5n8WGCsjQ4XcdLLsTaIrxh3
jB0xYgv+gpiy6qJzTf9sGFu/+3lg2RuA7MAf/rFGJtxy+VMPtvAumacYmty2O3T9
eHUuB7UfaULT4/TRqu+IJlQbK0BFR9ooIYTBpVu6QdIvL7CpX1OOR/NzX9irfKgh
uZ5QDm/0Wu/Jb5YoAh7Z13o4Kx8vxQf8VugfXewUMGV31uUsYeWLAPXClU3f4WBh
g20jQTSjc00309fIw0Hc4YKJ9DbRGGLjY+qda9jqoHF+HZtRI3jW/Tq8xiM/y0EM
3nQKYmVd6j+4nyF8/hHs0Q==',
			],
			'101' => [
				'latest' => '17.0.10',
				'internalVersion' => '17.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
cNaaoBpx0s3QFdfhSnSgQQ==',
			],
			'102' => [
				'latest' => '18.0.12',
				'internalVersion' => '18.0.12.2',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'autoupdater' => false,
			],
		],
		'17' => [
			'100' => [
				'latest' => '17.0.10',
				'internalVersion' => '17.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
cNaaoBpx0s3QFdfhSnSgQQ==',
			],
		],
		'16' => [
			'100' => [
				'latest' => '17.0.10',
				'internalVersion' => '17.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
cNaaoBpx0s3QFdfhSnSgQQ==',
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
		'21' => [
			'100' => [
				'latest' => '21.0.0 beta 4',
				'internalVersion' => '21.0.0.11',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-21.0.0beta4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.3',
				'signature' => 'xg2hdzeF0YJtf2YroZgFJFssANBxC4U1YSEWTM3bvBk/xiM5lYZGC3Ozyy5hmLGj
B2y2ETVMNuKZB6EjrMT6j0lSctEtIVDbVuRxqGEA9T+xFqo6BLaM9K2hUzODOzHP
wmcJoN7EhR5Hk+0fRTAE1zdQf0ontCmhtDRKYHK79qCCagetaNnP/9VX2XWqEwOg
BFx5mIx4ZgRqvFrdmcqYFRjkr6BqvVRdGZaCMfxZ2sZG3LGkfh4gfrgEYqDYmeW9
8rJBsVR7CXreZjsPFaaMOWzaFbmSg54Ym1K9LKSJV5z58Wvhj9kcclwTD3w/63XW
BcETYj5E4RjZS0ULiwNiow==',
			],
		],
		'20.0.4' => [
			'100' => [
				'latest' => '21.0.0 beta 4',
				'internalVersion' => '21.0.0.11',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-21.0.0beta4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.3',
				'signature' => 'xg2hdzeF0YJtf2YroZgFJFssANBxC4U1YSEWTM3bvBk/xiM5lYZGC3Ozyy5hmLGj
B2y2ETVMNuKZB6EjrMT6j0lSctEtIVDbVuRxqGEA9T+xFqo6BLaM9K2hUzODOzHP
wmcJoN7EhR5Hk+0fRTAE1zdQf0ontCmhtDRKYHK79qCCagetaNnP/9VX2XWqEwOg
BFx5mIx4ZgRqvFrdmcqYFRjkr6BqvVRdGZaCMfxZ2sZG3LGkfh4gfrgEYqDYmeW9
8rJBsVR7CXreZjsPFaaMOWzaFbmSg54Ym1K9LKSJV5z58Wvhj9kcclwTD3w/63XW
BcETYj5E4RjZS0ULiwNiow==',
			],
		],
		'20' => [
			'100' => [
				'latest' => '20.0.4',
				'internalVersion' => '20.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'ClTarIGaxeGs3sU1mwUkFrd3Y4x6j+FA7gNaZHljfgW78sFmEFHUlPm3EtCCSNFF
AbCkOoFrj52PZI9Mj4C3lyuDtS4lRHaz6u9UKr74K7uqvEy0Wsuh8lisFwZY84FP
OP/ML5q/gAyHFcX642cmCRvX5CwATTbMZWJu8i4StwpVlcvLf8K9ZYChd+r82yDf
zZTRXjT32LcGK+XzWteU0thlw3B5XVFBM6feWYp6QMB1sf/hgxZt/R6bt+A3DKMg
6bubvECfuzmG/hiGR+KoonDNUdNaQEML6XQ7o9Rr0o9uj66Sfx53sj6fXODlSxJL
EpPL6uqEg/2XoXjnLo975Q==',
			],
		],
		'19.0.6' => [
			'100' => [
				'latest' => '20.0.4',
				'internalVersion' => '20.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'ClTarIGaxeGs3sU1mwUkFrd3Y4x6j+FA7gNaZHljfgW78sFmEFHUlPm3EtCCSNFF
AbCkOoFrj52PZI9Mj4C3lyuDtS4lRHaz6u9UKr74K7uqvEy0Wsuh8lisFwZY84FP
OP/ML5q/gAyHFcX642cmCRvX5CwATTbMZWJu8i4StwpVlcvLf8K9ZYChd+r82yDf
zZTRXjT32LcGK+XzWteU0thlw3B5XVFBM6feWYp6QMB1sf/hgxZt/R6bt+A3DKMg
6bubvECfuzmG/hiGR+KoonDNUdNaQEML6XQ7o9Rr0o9uj66Sfx53sj6fXODlSxJL
EpPL6uqEg/2XoXjnLo975Q==',
			],
		],
		'19' => [
			'100' => [
				'latest' => '19.0.7',
				'internalVersion' => '19.0.7.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-19.0.7RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'AiKTW5WIMmYYexX7yXQd4aVfCxVJTD6PIrY3yXKOUC+cVRMjSP8OZoB7D7vkCn3B
xlLeTo/pFztO/qgeEU69t1S7BorLvSEygwiZGstkY1IMiItn+y6Zz+bZAhF/o71J
ihzcO7WBF8cBzyt6PAmRQDqK4IEv9xZq9lpcBp8jY3C35wArZepsCLAlLxea2L6C
mUc4ds84ljbzkeSD/eKfl44zq11w3uMjVKpEN8QJcR6Xfr6jj5wp8nS67SF9/oZ7
RyDkK8HrZnz27VYBAg/5xjNVW7E6YeB1wRMfAVC5x2x6zt79bpMrhRR7Bnqie+Wo
1ERwwx9qD6gLnkjJmV/Ndg==',
			],
		],
		'18.0.13' => [
			'100' => [
				'latest' => '19.0.7',
				'internalVersion' => '19.0.7.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-19.0.7RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'AiKTW5WIMmYYexX7yXQd4aVfCxVJTD6PIrY3yXKOUC+cVRMjSP8OZoB7D7vkCn3B
xlLeTo/pFztO/qgeEU69t1S7BorLvSEygwiZGstkY1IMiItn+y6Zz+bZAhF/o71J
ihzcO7WBF8cBzyt6PAmRQDqK4IEv9xZq9lpcBp8jY3C35wArZepsCLAlLxea2L6C
mUc4ds84ljbzkeSD/eKfl44zq11w3uMjVKpEN8QJcR6Xfr6jj5wp8nS67SF9/oZ7
RyDkK8HrZnz27VYBAg/5xjNVW7E6YeB1wRMfAVC5x2x6zt79bpMrhRR7Bnqie+Wo
1ERwwx9qD6gLnkjJmV/Ndg==',
			],
		],
		'18' => [
			'100' => [
				'latest' => '18.0.13 RC1',
				'internalVersion' => '18.0.13.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-18.0.13RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'XSug2agDjcD7Hh8ghrgnYNzr1pzpJVSwf0Uh59rEnu5xnDG8KmEs/Cjc5+ttGQX/
EjlNQRVmA0kWHpFvOFWveQoHItB9Cp26Rx5g7hj2iBhccz4hG6ZyOerHRMqWpAib
Nar2JhPYAiM8/4htMG0LO45eZMzfdOPwXVGs/UTMtwIzoln4pwSqnf5OyFBH5EiJ
1eEc9Kod1vQ68H/dVOZLCjUYjlmFHxOuaoZBJ2uBWRv2v4qkPgkb3fRpAMz57a+c
xtWjZ7cRXNqv7XTZCAVoBwMGpKURx3XbRep5M8yw1XSHwKkwVaqL4pqfbGwvnRd7
7dDBWNuS7+okkFPIf1l9og==',
			],
		],
		'17.0.10' => [
			'100' => [
				'latest' => '18.0.12',
				'internalVersion' => '18.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.2',
				'signature' => 'uQEDNVJ6BLpgo6Zb24r5cRqbS628fps/JZXbZlc6x5n8WGCsjQ4XcdLLsTaIrxh3
jB0xYgv+gpiy6qJzTf9sGFu/+3lg2RuA7MAf/rFGJtxy+VMPtvAumacYmty2O3T9
eHUuB7UfaULT4/TRqu+IJlQbK0BFR9ooIYTBpVu6QdIvL7CpX1OOR/NzX9irfKgh
uZ5QDm/0Wu/Jb5YoAh7Z13o4Kx8vxQf8VugfXewUMGV31uUsYeWLAPXClU3f4WBh
g20jQTSjc00309fIw0Hc4YKJ9DbRGGLjY+qda9jqoHF+HZtRI3jW/Tq8xiM/y0EM
3nQKYmVd6j+4nyF8/hHs0Q==',
			],
		],
		'17' => [
			'100' => [
				'latest' => '17.0.10',
				'internalVersion' => '17.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
cNaaoBpx0s3QFdfhSnSgQQ==',
			],
			'101' => [
				'latest' => '18.0.12',
				'internalVersion' => '18.0.12.2',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => false,
				'minPHPVersion' => '7.1',
				'autoupdater' => false,
			],
		],
		'16' => [
			'100' => [
				'latest' => '17.0.10',
				'internalVersion' => '17.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-17.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/17/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.1',
				'signature' => 'UNo0Sh9xK+TlO6rL6s380gB436990558QOjdQiDaeYuFANjCQFz0aO957Fetpkol
idhfkICTMtBC5mlSVAJjMW+5BIQ0kAHeJykqz6YD4Vw0aEIHHFgA1qCEphEj0/D5
p5OzkP6JSkwp+/e1O8xFdr/8VIHdkCEM5Kd5lchzp83XmfZm1t6YdcV8ziACDZrT
GaiG/TGRdHeR4ifgMpdMLZIy0x4Qd6k06dhCFsEz8H10Cf0oVmtrjxJsKEPY7doW
4QZIg8gwFj8Uxk4ylijHFSeIxCX96ZSmj+7wolAn8kYqq5Q8iwVYjNqFtJZ/YXIc
cNaaoBpx0s3QFdfhSnSgQQ==',
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
