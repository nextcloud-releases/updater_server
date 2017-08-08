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
				'latest' => '12.0.1',
				'internalVersion' => '12.0.1.5',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'R6+aQoW/L0L7RyM/ER06kH7XJHyskvmuOHcUKIydWGbFN1PQTjblqXiiUcsmFtsD
+ZLeiPtWg3wquzuA3GWk7vrJrRvIKguULBEdtaDv76jeOxX8IVtPZYyq9ywSleHU
qd9CCurtREBZVmaQLy79+aXvan+pSvq4f9kl9jVVDp/v9QDpaHSLtKrUCHGgyQZO
0APf4QTMn+Jlw40JD3vbQSPkxWb7dcQEE6gGg6htN7iLHRRVXf8sJWFrLGotCHCH
RVY+A9o0d/+e49hXBsqNA03y1ZETQkVle1X7618aFj+Rfekq+yANXG1w2yD69Erv
DB8RQvd5QS/1Igt4LyTdMw==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '11.0.4',
				'internalVersion' => '11.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'trn0fADgH12IioNSPDzYlkIAhlXg2ETpmkm+dENefK2HqVdDJBJX62kCYug4WovB
PTS455VNR43dFFCgqjvQiip/XTLHpG2ppAZq35gDslHbD8HcACS+T0OpW/mJYseD
1+eCbaYShguIcCLlTXaPhbesIh2iO2guBzv6xODSFDKlAWHXwZ3xcumX8QE+7oex
E9HDBL7XYkvMavCvMQjYgAQ6CTCgAxe0wYpa6O8HWhk0AgidDJgevHyHFOssxrTm
TCDZ2VgqwydUVcs+pfKC3VJkutrPOOH2JcltremBpYjkL4d25BDqPNDGi5FOKWyI
tJejM2uk8UEjo4mJ6q7BIA=='
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.4',
				'internalVersion' => '11.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'trn0fADgH12IioNSPDzYlkIAhlXg2ETpmkm+dENefK2HqVdDJBJX62kCYug4WovB
PTS455VNR43dFFCgqjvQiip/XTLHpG2ppAZq35gDslHbD8HcACS+T0OpW/mJYseD
1+eCbaYShguIcCLlTXaPhbesIh2iO2guBzv6xODSFDKlAWHXwZ3xcumX8QE+7oex
E9HDBL7XYkvMavCvMQjYgAQ6CTCgAxe0wYpa6O8HWhk0AgidDJgevHyHFOssxrTm
TCDZ2VgqwydUVcs+pfKC3VJkutrPOOH2JcltremBpYjkL4d25BDqPNDGi5FOKWyI
tJejM2uk8UEjo4mJ6q7BIA==',
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
				'latest' => '12.0.1',
				'internalVersion' => '12.0.1.5',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'R6+aQoW/L0L7RyM/ER06kH7XJHyskvmuOHcUKIydWGbFN1PQTjblqXiiUcsmFtsD
+ZLeiPtWg3wquzuA3GWk7vrJrRvIKguULBEdtaDv76jeOxX8IVtPZYyq9ywSleHU
qd9CCurtREBZVmaQLy79+aXvan+pSvq4f9kl9jVVDp/v9QDpaHSLtKrUCHGgyQZO
0APf4QTMn+Jlw40JD3vbQSPkxWb7dcQEE6gGg6htN7iLHRRVXf8sJWFrLGotCHCH
RVY+A9o0d/+e49hXBsqNA03y1ZETQkVle1X7618aFj+Rfekq+yANXG1w2yD69Erv
DB8RQvd5QS/1Igt4LyTdMw==',
			],
		],
		'11' => [
			'15' => [
				'latest' => '12.0.1',
				'internalVersion' => '12.0.1.5',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'R6+aQoW/L0L7RyM/ER06kH7XJHyskvmuOHcUKIydWGbFN1PQTjblqXiiUcsmFtsD
+ZLeiPtWg3wquzuA3GWk7vrJrRvIKguULBEdtaDv76jeOxX8IVtPZYyq9ywSleHU
qd9CCurtREBZVmaQLy79+aXvan+pSvq4f9kl9jVVDp/v9QDpaHSLtKrUCHGgyQZO
0APf4QTMn+Jlw40JD3vbQSPkxWb7dcQEE6gGg6htN7iLHRRVXf8sJWFrLGotCHCH
RVY+A9o0d/+e49hXBsqNA03y1ZETQkVle1X7618aFj+Rfekq+yANXG1w2yD69Erv
DB8RQvd5QS/1Igt4LyTdMw==',
			],		
			'85' => [
				'latest' => '11.0.4',
				'internalVersion' => '11.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'trn0fADgH12IioNSPDzYlkIAhlXg2ETpmkm+dENefK2HqVdDJBJX62kCYug4WovB
PTS455VNR43dFFCgqjvQiip/XTLHpG2ppAZq35gDslHbD8HcACS+T0OpW/mJYseD
1+eCbaYShguIcCLlTXaPhbesIh2iO2guBzv6xODSFDKlAWHXwZ3xcumX8QE+7oex
E9HDBL7XYkvMavCvMQjYgAQ6CTCgAxe0wYpa6O8HWhk0AgidDJgevHyHFOssxrTm
TCDZ2VgqwydUVcs+pfKC3VJkutrPOOH2JcltremBpYjkL4d25BDqPNDGi5FOKWyI
tJejM2uk8UEjo4mJ6q7BIA==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.4',
				'internalVersion' => '11.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'trn0fADgH12IioNSPDzYlkIAhlXg2ETpmkm+dENefK2HqVdDJBJX62kCYug4WovB
PTS455VNR43dFFCgqjvQiip/XTLHpG2ppAZq35gDslHbD8HcACS+T0OpW/mJYseD
1+eCbaYShguIcCLlTXaPhbesIh2iO2guBzv6xODSFDKlAWHXwZ3xcumX8QE+7oex
E9HDBL7XYkvMavCvMQjYgAQ6CTCgAxe0wYpa6O8HWhk0AgidDJgevHyHFOssxrTm
TCDZ2VgqwydUVcs+pfKC3VJkutrPOOH2JcltremBpYjkL4d25BDqPNDGi5FOKWyI
tJejM2uk8UEjo4mJ6q7BIA==',
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
				'latest' => '12.0.1',
				'internalVersion' => '12.0.1.5',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'R6+aQoW/L0L7RyM/ER06kH7XJHyskvmuOHcUKIydWGbFN1PQTjblqXiiUcsmFtsD
+ZLeiPtWg3wquzuA3GWk7vrJrRvIKguULBEdtaDv76jeOxX8IVtPZYyq9ywSleHU
qd9CCurtREBZVmaQLy79+aXvan+pSvq4f9kl9jVVDp/v9QDpaHSLtKrUCHGgyQZO
0APf4QTMn+Jlw40JD3vbQSPkxWb7dcQEE6gGg6htN7iLHRRVXf8sJWFrLGotCHCH
RVY+A9o0d/+e49hXBsqNA03y1ZETQkVle1X7618aFj+Rfekq+yANXG1w2yD69Erv
DB8RQvd5QS/1Igt4LyTdMw==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.1',
				'internalVersion' => '12.0.1.5',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'R6+aQoW/L0L7RyM/ER06kH7XJHyskvmuOHcUKIydWGbFN1PQTjblqXiiUcsmFtsD
+ZLeiPtWg3wquzuA3GWk7vrJrRvIKguULBEdtaDv76jeOxX8IVtPZYyq9ywSleHU
qd9CCurtREBZVmaQLy79+aXvan+pSvq4f9kl9jVVDp/v9QDpaHSLtKrUCHGgyQZO
0APf4QTMn+Jlw40JD3vbQSPkxWb7dcQEE6gGg6htN7iLHRRVXf8sJWFrLGotCHCH
RVY+A9o0d/+e49hXBsqNA03y1ZETQkVle1X7618aFj+Rfekq+yANXG1w2yD69Erv
DB8RQvd5QS/1Igt4LyTdMw==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.4',
				'internalVersion' => '11.0.4.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-11.0.4.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.6',
				'signature' => 'trn0fADgH12IioNSPDzYlkIAhlXg2ETpmkm+dENefK2HqVdDJBJX62kCYug4WovB
PTS455VNR43dFFCgqjvQiip/XTLHpG2ppAZq35gDslHbD8HcACS+T0OpW/mJYseD
1+eCbaYShguIcCLlTXaPhbesIh2iO2guBzv6xODSFDKlAWHXwZ3xcumX8QE+7oex
E9HDBL7XYkvMavCvMQjYgAQ6CTCgAxe0wYpa6O8HWhk0AgidDJgevHyHFOssxrTm
TCDZ2VgqwydUVcs+pfKC3VJkutrPOOH2JcltremBpYjkL4d25BDqPNDGi5FOKWyI
tJejM2uk8UEjo4mJ6q7BIA==',
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
