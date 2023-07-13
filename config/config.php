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
		'27' => [
			'100' => [
				'latest' => '27.0.0',
				'internalVersion' => '27.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.0.0.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'wUz0K6QLON0SXaz5wBzJ2XW7GeYTdqGP0iJmGaGvIGT3D2+ftmHY17nCTYKcr3I5
hh/4FKfsUaoP2Ak37GR1KMLyli5hARZRApR5powznf504atImcY51LuMvXE9CgIN
yM1oJPehacjYsrJzjMizK4aTHepz+zVeWo8SlBiKXwB9Ntqhrt63mHnzMJb7B6vY
6N7YkvKlPMCSk3ttIgIH04J+CMYZWzW0UVRn2NV2ID8e22+tiskWNVK6uvTszIX5
AU45erykEtmF8RqZR5wTPBOc4kjrryTnKhuNsEPKtEjQlxpI5/PdV5fE+eegTGeh
EGDLJyXxKje9pcfLoid0xQ==',
			],
		],
		'26.0.3' => [
			'70' => [
				'latest' => '27.0.0',
				'internalVersion' => '27.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.0.0.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'wUz0K6QLON0SXaz5wBzJ2XW7GeYTdqGP0iJmGaGvIGT3D2+ftmHY17nCTYKcr3I5
hh/4FKfsUaoP2Ak37GR1KMLyli5hARZRApR5powznf504atImcY51LuMvXE9CgIN
yM1oJPehacjYsrJzjMizK4aTHepz+zVeWo8SlBiKXwB9Ntqhrt63mHnzMJb7B6vY
6N7YkvKlPMCSk3ttIgIH04J+CMYZWzW0UVRn2NV2ID8e22+tiskWNVK6uvTszIX5
AU45erykEtmF8RqZR5wTPBOc4kjrryTnKhuNsEPKtEjQlxpI5/PdV5fE+eegTGeh
EGDLJyXxKje9pcfLoid0xQ==',
			],
		],
		'26' => [
			'100' => [
				'latest' => '26.0.3',
				'internalVersion' => '26.0.3.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-26.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'BqCtBfnIaDE0aXY0kWcMXhnk37nFzJovlE2HCzIxz/JUdBgHkq9ra3f+ghY98U3w
5sNApya2Gm76/6utbgxVn4OKt1RFM/gI9kkTsaAEse/2D1RNiloDurehcI4lJIh6
VBInNX89vfn5cLRQ9n6YEBrryQfdhbnl3jYKF52A2q31IWXwHbEYoZsw+R6XnmbL
5ieFLSonRTEDx3bi2MLHjEbB+CtQbTpc3s5udCm5tJgrGX4R1EsvhZLLCDbLgTZz
bSMLbY/VdGwQwogbmVJm7E9NHe5AxcEpi6dI3gtINe1dpwGOID6yAzhtqHWUQG97
0tOB91vUVCetf+ebdEhIwg==',
			],
		],
		'25.0.8' => [
			'100' => [
				'latest' => '26.0.3',
				'internalVersion' => '26.0.3.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-26.0.3.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'BqCtBfnIaDE0aXY0kWcMXhnk37nFzJovlE2HCzIxz/JUdBgHkq9ra3f+ghY98U3w
5sNApya2Gm76/6utbgxVn4OKt1RFM/gI9kkTsaAEse/2D1RNiloDurehcI4lJIh6
VBInNX89vfn5cLRQ9n6YEBrryQfdhbnl3jYKF52A2q31IWXwHbEYoZsw+R6XnmbL
5ieFLSonRTEDx3bi2MLHjEbB+CtQbTpc3s5udCm5tJgrGX4R1EsvhZLLCDbLgTZz
bSMLbY/VdGwQwogbmVJm7E9NHe5AxcEpi6dI3gtINe1dpwGOID6yAzhtqHWUQG97
0tOB91vUVCetf+ebdEhIwg==',
			],
		],
		'25' => [
			'100' => [
				'latest' => '25.0.8',
				'internalVersion' => '25.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.4',
				'signature' => 'VCikL+8VW1raLgoxy/tvq98xVyKowiLX5U9yBBTuamZVX+qd5RUBM1mwm++XfV2+
gDIJcW/MJMjcEi8xqG1lTxNa9HuJHk77PbmTVzfcDY/2Gxwo3YfFrC3l9JpcAse+
oF0atFNzKN9/MlrUXHm4nt2AVlxiAz5q9NE1eYLTPlsK8euDTH/3IM6fOu8t4wmJ
l2rpPO7v6u48mMJMf3DhX0kCd4kMA6gQ1b0jQLmPQ/oLZ0oDr25Wn6gyU40SlOMR
0b9RtOpxGTjBqyIyeQqPGxkFI2jZvLjko1mKXfpRgOw5Y7y+sOEffQvOD96DZZBR
2TkcOrDafHke0gTrZNzGFw==',
			],
		],
		'24.0.12' => [
			'100' => [
				'latest' => '25.0.8',
				'internalVersion' => '25.0.8.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.4',
				'signature' => 'VCikL+8VW1raLgoxy/tvq98xVyKowiLX5U9yBBTuamZVX+qd5RUBM1mwm++XfV2+
gDIJcW/MJMjcEi8xqG1lTxNa9HuJHk77PbmTVzfcDY/2Gxwo3YfFrC3l9JpcAse+
oF0atFNzKN9/MlrUXHm4nt2AVlxiAz5q9NE1eYLTPlsK8euDTH/3IM6fOu8t4wmJ
l2rpPO7v6u48mMJMf3DhX0kCd4kMA6gQ1b0jQLmPQ/oLZ0oDr25Wn6gyU40SlOMR
0b9RtOpxGTjBqyIyeQqPGxkFI2jZvLjko1mKXfpRgOw5Y7y+sOEffQvOD96DZZBR
2TkcOrDafHke0gTrZNzGFw==',
			],
		],
		'24' => [
			'100' => [
				'latest' => '24.0.12',
				'internalVersion' => '24.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
ACWMWE93WNcq+HBa025zsw==',
			],
		],
		'23.0.12' => [
			'100' => [
				'latest' => '24.0.12',
				'internalVersion' => '24.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
ACWMWE93WNcq+HBa025zsw==',
			],
		],
		'23' => [
			'100' => [
				'latest' => '23.0.12',
				'internalVersion' => '23.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
PlWRhIoX0XzP82+TC5b1dg==',
			],
		],
		'22.2.10' => [
			'100' => [
				'latest' => '23.0.12',
				'internalVersion' => '23.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
PlWRhIoX0XzP82+TC5b1dg==',
			],
		],
		'22' => [
			'100' => [
				'latest' => '22.2.10',
				'internalVersion' => '22.2.10.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip',
				'web' => 'https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
GorEOAeOrtcV0ba4AVoETQ==',
			],
		],
		'21.0.9' => [
			'100' => [
				'latest' => '22.2.10',
				'internalVersion' => '22.2.10.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip',
				'web' => 'https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
GorEOAeOrtcV0ba4AVoETQ==',
			],
		],
		'21' => [
			'100' => [
				'latest' => '21.0.9',
				'internalVersion' => '21.0.9.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
mE2YG/R4IKW+A8xqweVzig==',
			],
		],
		'20.0.14' => [
			'100' => [
				'latest' => '21.0.9',
				'internalVersion' => '21.0.9.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
mE2YG/R4IKW+A8xqweVzig==',
			],
		],
		'20' => [
			'100' => [
				'latest' => '20.0.14',
				'internalVersion' => '20.0.14.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
6feVFe2PlZ2FK5zxWZNYfw==',
			],
		],
		'19.0.13' => [
			'100' => [
				'latest' => '20.0.14',
				'internalVersion' => '20.0.14.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
6feVFe2PlZ2FK5zxWZNYfw==',
			],
		],
		'19' => [
			'100' => [
				'latest' => '19.0.13',
				'internalVersion' => '19.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
+ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
WN2PwtM3nn6/5y0BMhJueQ==',
			],
		],
		'18.0.14' => [
			'100' => [
				'latest' => '19.0.13',
				'internalVersion' => '19.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
+ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
WN2PwtM3nn6/5y0BMhJueQ==',
			],
		],
		'18' => [
			'100' => [
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
OcrbOha2Z819kkukqEE34Q==',
			],
		],
		'17.0.10' => [
			'100' => [
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
OcrbOha2Z819kkukqEE34Q==',
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
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => true,
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
		'27' => [
			'100' => [
				'latest' => '27.0.0',
				'internalVersion' => '27.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.0.0.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'wUz0K6QLON0SXaz5wBzJ2XW7GeYTdqGP0iJmGaGvIGT3D2+ftmHY17nCTYKcr3I5
hh/4FKfsUaoP2Ak37GR1KMLyli5hARZRApR5powznf504atImcY51LuMvXE9CgIN
yM1oJPehacjYsrJzjMizK4aTHepz+zVeWo8SlBiKXwB9Ntqhrt63mHnzMJb7B6vY
6N7YkvKlPMCSk3ttIgIH04J+CMYZWzW0UVRn2NV2ID8e22+tiskWNVK6uvTszIX5
AU45erykEtmF8RqZR5wTPBOc4kjrryTnKhuNsEPKtEjQlxpI5/PdV5fE+eegTGeh
EGDLJyXxKje9pcfLoid0xQ==',
			],
		],
		'26.0.4' => [
			'100' => [
				'latest' => '27.0.0',
				'internalVersion' => '27.0.0.8',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.0.0.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'wUz0K6QLON0SXaz5wBzJ2XW7GeYTdqGP0iJmGaGvIGT3D2+ftmHY17nCTYKcr3I5
hh/4FKfsUaoP2Ak37GR1KMLyli5hARZRApR5powznf504atImcY51LuMvXE9CgIN
yM1oJPehacjYsrJzjMizK4aTHepz+zVeWo8SlBiKXwB9Ntqhrt63mHnzMJb7B6vY
6N7YkvKlPMCSk3ttIgIH04J+CMYZWzW0UVRn2NV2ID8e22+tiskWNVK6uvTszIX5
AU45erykEtmF8RqZR5wTPBOc4kjrryTnKhuNsEPKtEjQlxpI5/PdV5fE+eegTGeh
EGDLJyXxKje9pcfLoid0xQ==',
			],
		],
		'26' => [
			'100' => [
				'latest' => '26.0.4 RC1',
				'internalVersion' => '26.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-26.0.4rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'g+QxZK222OTOUEWIvsTCfVVKa9yqx30P4C30lhAGEqo7cYzATz8ripSZnymc0M4H
8vFpuxb45E+Vuk5QiCFWgumYEXlq5dSGj6LcuH3IU3AT+X/qhtX6nWEKFaXCJxGK
qjVCMflUbC6Rvv+WCxNwWpncPtEJzHpqN3615PHuAtH5ycCkG7gNkNBR35dUTa8M
u0lnJEGZbvsNtKv1zaOVLPSdN0Dv6Xu4ALuUOo1h27gBI+Ut+b8AyDAKb03mf1dq
paWOPhs49QumS5l7tbxCwrDNlxEOqfqAKU8MSnuHfZwJMfO6ff0MD33cZs9NKFza
hbORi5/IpfrPdXZcaa5zWg==',
			],
		],
		'25.0.9' => [
			'100' => [
				'latest' => '26.0.4 RC1',
				'internalVersion' => '26.0.4.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-26.0.4rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'g+QxZK222OTOUEWIvsTCfVVKa9yqx30P4C30lhAGEqo7cYzATz8ripSZnymc0M4H
8vFpuxb45E+Vuk5QiCFWgumYEXlq5dSGj6LcuH3IU3AT+X/qhtX6nWEKFaXCJxGK
qjVCMflUbC6Rvv+WCxNwWpncPtEJzHpqN3615PHuAtH5ycCkG7gNkNBR35dUTa8M
u0lnJEGZbvsNtKv1zaOVLPSdN0Dv6Xu4ALuUOo1h27gBI+Ut+b8AyDAKb03mf1dq
paWOPhs49QumS5l7tbxCwrDNlxEOqfqAKU8MSnuHfZwJMfO6ff0MD33cZs9NKFza
hbORi5/IpfrPdXZcaa5zWg==',
			],
		],
		'25' => [
			'100' => [
				'latest' => '25.0.9 RC1',
				'internalVersion' => '25.0.9.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-25.0.9rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.4',
				'signature' => 'Qp2uJXab8cRPsn2W+BhQOY/9VjPHPwcMcbkV/RCp7nyeCiUPhhoYWyHDXkgrL7Zi
CquxM2fqvX7Xe3M23u4wG393MU6VV82Hylo6WvRdeHC3ck/JDenI5KESP3zaov9l
idrEF8vqQlkxR0nVyH8BaNOlxKqsh2i225wg0soSLFjuygv73xujI1vuwGsXa+/J
oc27XafyBqrgVSqrjHfGhXlXJ7RCX3P6kMQSX3p8C9n+XNaCwbk8UQjQjkSRcNqM
kykRC8g+S7U7juVF29c76slshW9ixEV0gBAq11/rw1aBzfroFcpGJGtamgeXg97j
qPOnrjQTZhcr7fXCAuVPWA==',
			],
		],

		'24.0.12' => [
			'100' => [
				'latest' => '25.0.9 RC1',
				'internalVersion' => '25.0.9.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-25.0.9rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.4',
				'signature' => 'Qp2uJXab8cRPsn2W+BhQOY/9VjPHPwcMcbkV/RCp7nyeCiUPhhoYWyHDXkgrL7Zi
CquxM2fqvX7Xe3M23u4wG393MU6VV82Hylo6WvRdeHC3ck/JDenI5KESP3zaov9l
idrEF8vqQlkxR0nVyH8BaNOlxKqsh2i225wg0soSLFjuygv73xujI1vuwGsXa+/J
oc27XafyBqrgVSqrjHfGhXlXJ7RCX3P6kMQSX3p8C9n+XNaCwbk8UQjQjkSRcNqM
kykRC8g+S7U7juVF29c76slshW9ixEV0gBAq11/rw1aBzfroFcpGJGtamgeXg97j
qPOnrjQTZhcr7fXCAuVPWA==',
			],
		],

		'24' => [
			'100' => [
				'latest' => '24.0.12',
				'internalVersion' => '24.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
ACWMWE93WNcq+HBa025zsw==',
			],
		],

		'23.0.12' => [
			'100' => [
				'latest' => '24.0.12',
				'internalVersion' => '24.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-24.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'aCQnJpJjf83glgpOxTs1tenmKYhdBK34JyhBtwhikoE4bg1GpfNPe+5OVEDkKPLi
o3tAWWdx8SAR1+PuLYwjkyy6hhr80ojDrhnmjVprB9PZ5Dqqz9Uk5sLjyse2e0FC
L9eCQfFLRMxNYyucp8ihSW2100KbDKPXq5K/GUS/9TuLV99JdwJjAWtPQzsm5KK9
3SMqwkuwWg+39qVS9W1w4zWjAwfP1xyJUFTIBeS35hnmnol2goE0JbSlTMoBYFyQ
PC8WFtnBG8EIA1ncyQ/IDKUZjg79E8cM8zyIY8PYmA/Jf4MpTMwfoGJQ0GtD6nCF
ACWMWE93WNcq+HBa025zsw==',
			]
		],

		'23' => [
			'100' => [
				'latest' => '23.0.12',
				'internalVersion' => '23.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
PlWRhIoX0XzP82+TC5b1dg==',
			],
		],

		'22.2.10' => [
			'100' => [
				'latest' => '23.0.12',
				'internalVersion' => '23.0.12.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-23.0.12.zip',
				'web' => 'https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'tu+v9XHqXSKxncQi5ps0Sz7DHZ8l4sXAPw/8B2REvlkw/YC8OMSpnTy8LSKKgIdZ
sFsVcvA0Q6l84Xve6cxE3XpRKxSAxWJbamsmE35HcLwxVtuwpWxyOFD9xUzDVCVf
nZfQcDUjeK2xQxV+qVjuPuoz0TmRwcZJwrXk/nZiA1cAV/k2PPG9FP25R8WAdIQD
rfrM7C5GWPNSzv9qcUteJ4jv9ORJ/FiZVewSfP+5hKxTIeUw+D/9LbCjRVzKwvIx
3r9oA+gwN2zYNOuYFvpF9FtVtJ9NLR/EJWBoHWLuO0XcrXgVWoemwF97nFeV5Hdp
PlWRhIoX0XzP82+TC5b1dg==',
			],
		],

		'22' => [
			'100' => [
				'latest' => '22.2.10',
				'internalVersion' => '22.2.10.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip',
				'web' => 'https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
GorEOAeOrtcV0ba4AVoETQ==',
			],
		],

		'21.0.9' => [
			'100' => [
				'latest' => '22.2.10',
				'internalVersion' => '22.2.10.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-22.2.10.zip',
				'web' => 'https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'XDDYmHMD8famkqCoed6EmUO4PNL8YsMOv859HOmcPThrQ2GcTr0jeX06oQ3ZrRsC
wkfN+idHSOwY++S/qN7Pp65/isSfVU7LSYn/ELEnyRC5l8M1g1F/By4Bj8Np+7mA
HIJmvvAKiVflOGPHWIhcXin1whDXeLXxpz3ntHR02XARLgozkbnyOrjxmkcx0BOk
yyRgxVQXLR1QsFUhrt8+zjlhL/JsEHzCQ954n0mggdx8IhiEUqpHFjubwQbEytX9
fhlPbaifQKypXBpBdN/RBRt6Ox5z2lSG5IY/g8nc4x7rYQSpiTrtWi1vlcxF0aIT
GorEOAeOrtcV0ba4AVoETQ==',
			],
		],

		'21' => [
			'100' => [
				'latest' => '21.0.9',
				'internalVersion' => '21.0.9.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
mE2YG/R4IKW+A8xqweVzig==',
			],
		],

		'20.0.14' => [
			'100' => [
				'latest' => '21.0.9',
				'internalVersion' => '21.0.9.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-21.0.9.zip',
				'web' => 'https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.3',
				'signature' => 'UmaMy3Rp14wXYO8IQPzJWIsJnz5po9Fw42upR3ci+EPmfpptUgCpxDBZ+uIMLpIf
Ee9waBv1ZPRgOaUmzwWQUGzL+z1+LRMe9rm/m2SKEYDWzq0Uk0wmheqAdhaZHFYq
EIXWXKMauXl+KxdNsJOftU96NzoiWTO8m4JjT7758fyGuio7jRWHCun1m+nb4hSD
LQHdC1Ipng5IPFcR2EJ9zP+SpLR7pO7g+2raxlnLhvqT27FfiTAw3J4ztm/BsGTW
BQwO9DSgH23A3veRLMpZnuiZcZfOJIr/LSRjvgxU+RdHKWFJkmngNQAg7pTPnjMH
mE2YG/R4IKW+A8xqweVzig==',
			],
		],
		'20' => [
			'100' => [
				'latest' => '20.0.14',
				'internalVersion' => '20.0.14.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
6feVFe2PlZ2FK5zxWZNYfw==',
			],
		],

		'19.0.13' => [
			'100' => [
				'latest' => '20.0.14',
				'internalVersion' => '20.0.14.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-20.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'ie2H7/drKls2RxE5aS50ocGeXIBiAlczHvhCeObYF21s0qQtx0mGJe6TUvA8diQ5
T3ZiZwRLQT2BH6GKHbOt6ku6RRSTILhglffUAv3CellNrYmkyAl1ob6/4H5/XHjC
DgQ6Ykglk7xvQICw2l7s4tfa8KNIWLdPuWfUvXBBDsXKtFEmv8d0SU+f/dQR6JKu
uLzb1cmunoldyvH/qC4XdKx1r/JqPEaQxW7l3WQeXaLCA2OiLxIBcHH6ucNJ4ik6
fZCxpy3szm7gaozWquGfD+oglIY7GLVsbeZBTDFgF44OcDAY/29AL3TKRKN+cnQr
6feVFe2PlZ2FK5zxWZNYfw==',
			],
		],
		'19' => [
			'100' => [
				'latest' => '19.0.13',
				'internalVersion' => '19.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
+ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
WN2PwtM3nn6/5y0BMhJueQ==',
			],
		],

		'18.0.14' => [
			'100' => [
				'latest' => '19.0.13',
				'internalVersion' => '19.0.13.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-19.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'qWFamMWZegXESQawjDX9Zn5XHVNUElbOfmVKyCG/MWqTfX0cUIt/xDOccSK24hce
8M47spBztkAKLEqsCBfwwmnpqDL2iVhuQVAwHuOyev/53lfdge5j7AH4yqPAEa+j
XDdnHtLClAtYI7QtIeUAhuj0ychW47rcWRNsZ1tTxKGclZqPubiMd8eO6kn8S/uP
SnaqLa3zSAKlqrda4qsvt4AnGfOB7/MZxQBO9Sy/D6F60DqvI9/IntjJyJm6uUzo
+ziDzSgzCHt8/tFdbtjLR1j3zEv5n7epNdTZuj/Z3FVbBi4HSk9oOHa6LQTeqAeA
WN2PwtM3nn6/5y0BMhJueQ==',
			],
		],
		'18' => [
			'100' => [
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
OcrbOha2Z819kkukqEE34Q==',
			],
		],

		'17' => [
			'100' => [
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-18.0.14.zip',
				'web' => 'https://docs.nextcloud.com/server/18/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.2',
				'signature' => 'nzM1fD0IYCr86Pb7fJLGQA0usVUOKE+JyFVVhJArh4BpdDI0C2yC7l2zeJgCEd+g
RiXGB1N5a7GTfNSqdLO6ho+5dEg55OQYiTE75ji+dTKz9IDz99crk4BiYIsKc+bt
Ztuq8p/kxJK7wkRlsxDTULQWlVe0f1shX2sTCg9CNYzY5/kwmQtz8OQ/umwya1sF
FedS379Vnpa2NgAEq9W45r9hP6iZmKDBlwrY+r/pBWaJteI9xW9Ag8hhv4pSku0q
BX4Qwl1YI2f8b0KHy3yIqmY58qsWTjGb319Nq3tPFsY8N2hUmFu4yve0nW6Zb/+1
OcrbOha2Z819kkukqEE34Q==',
			],
			'101' => [
				'latest' => '18.0.14',
				'internalVersion' => '18.0.14.0',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-7-1/',
				'web' => 'https://nextcloud.com/outdated-php-7-1/',
				'eol' => true,
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
		'28' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '8.0',
		],
	    '27' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable27.zip',
			'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '8.0',
		],
		'26' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable26.zip',
			'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '8.0',
		],
		'25' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable25.zip',
			'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.4',
		],
		'24' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable24.zip',
			'web' => 'https://docs.nextcloud.com/server/24/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '7.4',
		],
		'23' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable23.zip',
			'web' => 'https://docs.nextcloud.com/server/23/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '7.3',
		],
		'22' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable22.zip',
			'web' => 'https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '7.3',
		],
		'21' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable21.zip',
			'web' => 'https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '7.3',
		],
		'20' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable20.zip',
			'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
			'eol' => true,
			'minPHPVersion' => '7.2',
		],
	],
	'_settings' => [
		'changelogServer' => 'https://updates.nextcloud.com/changelog_server/',
	],
];
