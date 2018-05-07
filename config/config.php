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
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.7',
				'internalVersion' => '12.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'd5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
VLCL+gCaLUQE0S7RW6FU6w==',
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
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.7',
				'internalVersion' => '12.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'd5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
VLCL+gCaLUQE0S7RW6FU6w==',
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
		'13' => [
			'100' => [
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.2',
				'internalVersion' => '13.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'LM7g6SaWxzArRLd++9sdk80UZw1mIzAaqEnH75YO3EBK7qF7xxVdvb7tnu9cipsr
Y5e/MoISsNOgc3FZoRygGrkKl4GVf4SZSOSusmoDxwHNT0tBSK8u0QMRXrEXLuyE
pxyvA3hHMP/gGhLn+T0/CrvI/QBy3QO1N74OUWc+nc+NnKnWSwwVP4/OITRkAtYj
zsIH95cgI4e3Eez6c63YsITKLWVwoE4Qu0ubU8HGfhHBYxqFoGbNfSWvB78gV/gf
S3QFUmoMjKoOvo1Q4s7UQv0xE5TUDC4XFIW6q1ly1Z/XRPZaywstv3br8J52L6+J
G2ZuS4ms5s9o5i2OrogYRQ==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.7',
				'internalVersion' => '12.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.7.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'd5mcL7Smk1aebH1MVRs0pWY00bq6JUIamsRVpd/uxYOeKi5z9nwhv2Ot8KfiI41S
1mLCjZwalyJlkon+zdPgolgwT9cUiKNLLpjNCeaC46/RWUlct+8hvPq6DxiTVEkb
k/gDAbrWBI4VtjH11b1ecSXvTGCt9zywcyl4uCeN16waz4CIcYi22/jixzdEQihj
381raoX5ygW8Rlfpv1SwKwM1C2xYGrzsbdP34TJojw8vjNrBVus+cM3H5ZFvHRPC
Wu+KPsSxdkQeVph+/ukn0tQoTymusbUjqhXscqg4TejDtlZ//XBlrY/xW+6pocGN
VLCL+gCaLUQE0S7RW6FU6w==',
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
];
