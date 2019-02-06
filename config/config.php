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
				'latest' => '15.0.2',
				'internalVersion' => '15.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'jbMZKu/ICGvOnG44z6I3H996RJ5At4c0i6E4b/K6/imO/18XxRXnKVpUkImt46q0
+2PjJ8CL8v/2hbhYO1kCExeQ9HWrKn9FnkkxT4K6Q+jnq42nOv/BddDMrzAlxmAu
qCKARb652D3bfOyGx2+cSc45YxbJqQiGMm/wCnPCZLtx9RUOG5C0Lt4/vgeN8Rk2
GaBv6cn6GE9lntP4aa3YKqt67KovHeSHYIiP7MVwe0Bwiu2n6adkDLn+WmVU/Osw
dQWgfifeB/isVeb8koOmkK8rQ+M0FicrfHsCUqzh/oDap7lu7WdgRvNCiUbEwcIw
GZyAWsPsboY0Qg7I2XWssA==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '14.0.6',
				'internalVersion' => '14.0.6.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'kr8VAKHaR8aadC6UNomS/Z1g6G6p9lNdu0Jb7ASBv4JrLaUeqU7iqNIZX4NotJAc
sZ2YbOP+SQ2QPbAVxJNEjaK+Su6EBarEt2Z9uw48+GyNdWUr1QbZLHwjXgxVqv+T
BXQuRLdjp/s/EureazaCvTzQETvg7TIHI3T8BtuLdr3y8vhxR/6dygQZKz9rikFT
GcieFznuMhaXbssXmntuV+NUqSZtExqVMN68HMVgBCdbniqmrLkNiOOhGW3EZYas
AjN5hksLm/b7URzdahKrFwa2IcpAuYnqckCtveIhPK4COrhtm0lPx797WCTHNWmx
8M2RkM0Foc7oVgFcxOo94A==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.6',
				'internalVersion' => '14.0.6.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'kr8VAKHaR8aadC6UNomS/Z1g6G6p9lNdu0Jb7ASBv4JrLaUeqU7iqNIZX4NotJAc
sZ2YbOP+SQ2QPbAVxJNEjaK+Su6EBarEt2Z9uw48+GyNdWUr1QbZLHwjXgxVqv+T
BXQuRLdjp/s/EureazaCvTzQETvg7TIHI3T8BtuLdr3y8vhxR/6dygQZKz9rikFT
GcieFznuMhaXbssXmntuV+NUqSZtExqVMN68HMVgBCdbniqmrLkNiOOhGW3EZYas
AjN5hksLm/b7URzdahKrFwa2IcpAuYnqckCtveIhPK4COrhtm0lPx797WCTHNWmx
8M2RkM0Foc7oVgFcxOo94A==',
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
				'latest' => '15.0.2',
				'internalVersion' => '15.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'jbMZKu/ICGvOnG44z6I3H996RJ5At4c0i6E4b/K6/imO/18XxRXnKVpUkImt46q0
+2PjJ8CL8v/2hbhYO1kCExeQ9HWrKn9FnkkxT4K6Q+jnq42nOv/BddDMrzAlxmAu
qCKARb652D3bfOyGx2+cSc45YxbJqQiGMm/wCnPCZLtx9RUOG5C0Lt4/vgeN8Rk2
GaBv6cn6GE9lntP4aa3YKqt67KovHeSHYIiP7MVwe0Bwiu2n6adkDLn+WmVU/Osw
dQWgfifeB/isVeb8koOmkK8rQ+M0FicrfHsCUqzh/oDap7lu7WdgRvNCiUbEwcIw
GZyAWsPsboY0Qg7I2XWssA==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.2',
				'internalVersion' => '15.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-15.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'jbMZKu/ICGvOnG44z6I3H996RJ5At4c0i6E4b/K6/imO/18XxRXnKVpUkImt46q0
+2PjJ8CL8v/2hbhYO1kCExeQ9HWrKn9FnkkxT4K6Q+jnq42nOv/BddDMrzAlxmAu
qCKARb652D3bfOyGx2+cSc45YxbJqQiGMm/wCnPCZLtx9RUOG5C0Lt4/vgeN8Rk2
GaBv6cn6GE9lntP4aa3YKqt67KovHeSHYIiP7MVwe0Bwiu2n6adkDLn+WmVU/Osw
dQWgfifeB/isVeb8koOmkK8rQ+M0FicrfHsCUqzh/oDap7lu7WdgRvNCiUbEwcIw
GZyAWsPsboY0Qg7I2XWssA==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.6',
				'internalVersion' => '14.0.6.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'kr8VAKHaR8aadC6UNomS/Z1g6G6p9lNdu0Jb7ASBv4JrLaUeqU7iqNIZX4NotJAc
sZ2YbOP+SQ2QPbAVxJNEjaK+Su6EBarEt2Z9uw48+GyNdWUr1QbZLHwjXgxVqv+T
BXQuRLdjp/s/EureazaCvTzQETvg7TIHI3T8BtuLdr3y8vhxR/6dygQZKz9rikFT
GcieFznuMhaXbssXmntuV+NUqSZtExqVMN68HMVgBCdbniqmrLkNiOOhGW3EZYas
AjN5hksLm/b7URzdahKrFwa2IcpAuYnqckCtveIhPK4COrhtm0lPx797WCTHNWmx
8M2RkM0Foc7oVgFcxOo94A==',
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
				'latest' => '15.0.3 RC 1',
				'internalVersion' => '15.0.3.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.3RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'lghsDIvgACtcNG09W23oGwO97OnwHK9XHdkAzSth+DXT6OxUsGYfrc1NmtYyXt6n
HT2pUVruJcCeeGdsrn2fMIazJzFyt1iPtSpxQEyX70w0VQ0K0KfhmLgzqAj9hKb/
taHUn3MVtJ97/BfCSO5B+7PIO8Yvgr791nRXtgrF3ZffhIce6YTJSlqFB6Sg+2dN
yprpAV2SwQgppAbMrCc0YDeD/i8x4Qp0oukVHCod7zkA8EWTJHCR1UV7o2SWf04R
sYAVzO+Vckl2UBeaUZjLvnct69WMZQZ3y2rgHbKYRYgxeCsFGWdIWIcyvvnGByCP
lFfUfN/DN7LGHyZTPVPgsw==',
			],
		],
		'14' => [
			'100' => [
				'latest' => '15.0.3 RC 1',
				'internalVersion' => '15.0.3.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-15.0.3RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/15/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'lghsDIvgACtcNG09W23oGwO97OnwHK9XHdkAzSth+DXT6OxUsGYfrc1NmtYyXt6n
HT2pUVruJcCeeGdsrn2fMIazJzFyt1iPtSpxQEyX70w0VQ0K0KfhmLgzqAj9hKb/
taHUn3MVtJ97/BfCSO5B+7PIO8Yvgr791nRXtgrF3ZffhIce6YTJSlqFB6Sg+2dN
yprpAV2SwQgppAbMrCc0YDeD/i8x4Qp0oukVHCod7zkA8EWTJHCR1UV7o2SWf04R
sYAVzO+Vckl2UBeaUZjLvnct69WMZQZ3y2rgHbKYRYgxeCsFGWdIWIcyvvnGByCP
lFfUfN/DN7LGHyZTPVPgsw==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.7 RC 1',
				'internalVersion' => '14.0.7.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.7RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'aNxI4fSb3EBL0Qwg13JiICtX9oZTo88Q0jbcZrCqZSRcyvOk85X4yubX4s6kEg3X
QElRP1Wsz/nppI881JUytbQb92BC1HNOaG73ZR8f+SoDoSu2QkP9e22JC1C63n0P
ACdkFars8L/W2LbrYsiwAKOSFgB5EuW/qpB4ThuCQbZ5srTeb7bKahOdDQIuFbz8
pu2oLcJIVAxBGM6aBNHzy/rfY13KoGh7MUSqcndRMbcESzGklLrjnHba5CNBd+88
wSirOd4CcLcOma0GLV79xK3aYcuzcagEEm/Y/+s01MGyMIM5Fsx1o7uA2xLrd+5z
eZEbWpxD7OJGp1ZVdB1cRw==',
			],
			'101' => [
				'latest' => '13.0.11',
				'internalVersion' => '13.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11.zip',
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
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.11.zip',
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
	'daily' => [
		'16' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.0',
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
