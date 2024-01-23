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
		'28' => [
			'100' => [
				'latest' => '28.0.1',
				'internalVersion' => '28.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-28.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'PB7AjlVnpiDLYiytmWieowBCOgK5WJU9GywGwU6JSSBMrWBGAnxq8jSyzixffii2
gqKN8LEYwlv2jG1HHU94JIV7YCP+vBMtRt7W4u3y4vh1x7lwRw/axhuFxa0wq159
DjHIiY//tp8qabdQMZzU9V8Kdzo1nfDMJsGA+dk3reP8PpplsbwvjbzwFSab2blN
ap3M8fqq7PvLgY/yf89Al1uwajFKP536qdafIJEgnl27AMGLx2DlBengLyja2YuS
IGuxKrdHrFMPTEf85VawKbT6ppih4A4DIzUoQ9aYI84a/Cg6Bhg4XzHaK4zsquGJ
Ab9YM6+UnBP51pSst3KNSA==',
			],
		],
		'27.1.5' => [
			'70' => [
				'latest' => '28.0.1',
				'internalVersion' => '28.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-28.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'PB7AjlVnpiDLYiytmWieowBCOgK5WJU9GywGwU6JSSBMrWBGAnxq8jSyzixffii2
gqKN8LEYwlv2jG1HHU94JIV7YCP+vBMtRt7W4u3y4vh1x7lwRw/axhuFxa0wq159
DjHIiY//tp8qabdQMZzU9V8Kdzo1nfDMJsGA+dk3reP8PpplsbwvjbzwFSab2blN
ap3M8fqq7PvLgY/yf89Al1uwajFKP536qdafIJEgnl27AMGLx2DlBengLyja2YuS
IGuxKrdHrFMPTEf85VawKbT6ppih4A4DIzUoQ9aYI84a/Cg6Bhg4XzHaK4zsquGJ
Ab9YM6+UnBP51pSst3KNSA==',
			],
		],
		'27' => [
			'100' => [
				'latest' => '27.1.5',
				'internalVersion' => '27.1.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.1.5.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => '1F9XxI67a9hARF50mL3YYax6+Takd1EU0R6mOAm5EYB7EbzdKqbQCzFhObX1jwcn
OB4S+68ZtcHhSngWz429nMHWt/dN4zFZjFv1b49Fa/3T2LGFfG6fju/VznTM/8n9
bZKfvQdpdUB9ilAzkdXZuKLl4niK/WEhL2xWY2ZV4sT9DkOFtVFNig2cPEL1rrw9
I6xqffV3bwlH5zI9hqJ1sPk63v/3mjgqDorqPTM8irHXNqQzbh1VdmeHz/Af/ncj
9J0xDa5AoDtEc1E/mW20em3adiHIMnMmmYg5XvwISKuKRsPP22f9M67kQYR8tedJ
SQf15rCZIxeaqll1lJMrMA==',
			],
		],
		'26.0.10' => [
			'100' => [
				'latest' => '27.1.5',
				'internalVersion' => '27.1.5.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-27.1.5.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => '1F9XxI67a9hARF50mL3YYax6+Takd1EU0R6mOAm5EYB7EbzdKqbQCzFhObX1jwcn
OB4S+68ZtcHhSngWz429nMHWt/dN4zFZjFv1b49Fa/3T2LGFfG6fju/VznTM/8n9
bZKfvQdpdUB9ilAzkdXZuKLl4niK/WEhL2xWY2ZV4sT9DkOFtVFNig2cPEL1rrw9
I6xqffV3bwlH5zI9hqJ1sPk63v/3mjgqDorqPTM8irHXNqQzbh1VdmeHz/Af/ncj
9J0xDa5AoDtEc1E/mW20em3adiHIMnMmmYg5XvwISKuKRsPP22f9M67kQYR8tedJ
SQf15rCZIxeaqll1lJMrMA==',
			],
		],
		'26' => [
			'100' => [
				'latest' => '26.0.10',
				'internalVersion' => '26.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-26.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'cwSGuhJ8a2If8WRV7GYmycIizZllybZNRlejJbOi2ioTHHJeMJYl+YkFi/YfjZ/h
ytTQ1gJrfJ4vhUSwqqlD2U585x02KyK46PT+exXR1G0h6+aXo9Yjwxw0lnkjrlVJ
/tKXi5VIkaCwJUBLWWaja3XFv3MKCNS7RsEpiRzbz383SPHxS6aPuzZOVsJ1Gaj0
VLN3tSSLmfhRz/rqgX8in9aWcYPs76zwBD4iDPKs097GgFSzQ0dNyOBQCkLlDoEC
nQGIR+lUBPn5Azv+qbT/vmAHYx4ictbWclzoDDIxbnUokNHR1/YFLVB1lzG0xegc
oq63vxoPglN5AMAA9h01vw==',
			],
		],
		'25.0.13' => [
			'100' => [
				'latest' => '26.0.10',
				'internalVersion' => '26.0.10.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-26.0.10.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'cwSGuhJ8a2If8WRV7GYmycIizZllybZNRlejJbOi2ioTHHJeMJYl+YkFi/YfjZ/h
ytTQ1gJrfJ4vhUSwqqlD2U585x02KyK46PT+exXR1G0h6+aXo9Yjwxw0lnkjrlVJ
/tKXi5VIkaCwJUBLWWaja3XFv3MKCNS7RsEpiRzbz383SPHxS6aPuzZOVsJ1Gaj0
VLN3tSSLmfhRz/rqgX8in9aWcYPs76zwBD4iDPKs097GgFSzQ0dNyOBQCkLlDoEC
nQGIR+lUBPn5Azv+qbT/vmAHYx4ictbWclzoDDIxbnUokNHR1/YFLVB1lzG0xegc
oq63vxoPglN5AMAA9h01vw==',
			],
		],
		'25' => [
			'100' => [
				'latest' => '25.0.13',
				'internalVersion' => '25.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
c2rOEZwqzv2p7fWh4Ovl6g==',
			],
		],
		'24.0.12' => [
			'100' => [
				'latest' => '25.0.13',
				'internalVersion' => '25.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
c2rOEZwqzv2p7fWh4Ovl6g==',
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
		'28' => [
			'100' => [
				'latest' => '28.0.2 RC2',
				'internalVersion' => '28.0.2.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-28.0.2rc2.zip',
				'web' => 'https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'xKjVKn5we5Vf5MzhbKD4qvL1Vd9D+3cDyVBaa6+I5dxwNgWJEqxQCw33MygOQ7UG
R7oHou0lTKetdsqz6ZhuU577hW2Hrut0ewRBL0qftvtO0OvPX6fq/hDCxJ4Eebw4
2fNMd6b2CwebDYHKVx8b06+ocKxey4YR32LVh2vn+nCRdGmRtTKk0Sj1XVFXUNGr
8HeH014mJMYLHL6lU1KLJYGpFgAykMoWaaALhQ0hio1eeDN0YOgSx7K1nTUJp3T1
Ciprla+ef6Ohe9/3H84HYGHW4izJUE4zy+G5qG8Ya207ro8XVmBwUc3RaLo/XO04
ReRkmKuamIJv45Uaqk5PRQ==',
			],
		],
		'27.1.6' => [
			'100' => [
				'latest' => '28.0.2 RC1',
				'internalVersion' => '28.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-28.0.2rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'o4L9/VRAIGodk5CInHk9JiUkTcF0EbgQRllPM+0oPoPyb4IS8HZsuRs24l/bEK1R
pEU6oE5UdROiI9ug80/mYfnOXbw9xyRfv+znP/mlnjugvoGIkSJU8BBqRBLbS9V9
9xSqhOBYRN6JEleYXlrHNWWwDW0+Cy9AUHbN/XEw/a0zZXg/IaJCZLuyuqmFOrDI
jTpqn1RaGGoc2ypt40kIYml9gxByqks0KUxS/0T6PF+ncXl5ofDla7HzFyTFaOA8
4cw1ze50UL8BegH08M8JPjcC1xOWEcwiIs/kbkISQwR46JwvV5GDmRAHErJ1IirK
BXD6DbScYZ0gLImeLWeQbw==',
			],
		],
		'27' => [
			'100' => [
				'latest' => '27.1.6 RC1',
				'internalVersion' => '27.1.6.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-27.1.6rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'k6MYE0AAOYd3/w+5OU4gFOUvwLBHCfD1wriSqAQFr7UGnIHDfuzFTas6taaFpng/
uP4J3GkBQ6yHOMjrreU+K7EwMTGwvkmquSYKL6EY8miCcS+tSNhwZ2DERZoMfDif
ClKvanaI0exxwL2vEgeZSsMnMWVKE1BcvpOGdytcHqLBsco2Kpey37MelVBULY3s
/iHsUia9goytgCBOBR6JiH4hzH9Ru6Fd6AT/C1tl+T7QkslpvbzqNhAZCvhGe9As
j8Jqvyo//s6+4S7jREZMAsWT1iCEwDhhOvMgpACFkNhnbUvrrIENOo29aZ+W+hBY
fbCJRBEVfU3V2PK8g9uiVQ==',
			],
		],
		'26.0.11' => [
			'100' => [
				'latest' => '27.1.6 RC1',
				'internalVersion' => '27.1.6.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-27.1.6rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/27/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'k6MYE0AAOYd3/w+5OU4gFOUvwLBHCfD1wriSqAQFr7UGnIHDfuzFTas6taaFpng/
uP4J3GkBQ6yHOMjrreU+K7EwMTGwvkmquSYKL6EY8miCcS+tSNhwZ2DERZoMfDif
ClKvanaI0exxwL2vEgeZSsMnMWVKE1BcvpOGdytcHqLBsco2Kpey37MelVBULY3s
/iHsUia9goytgCBOBR6JiH4hzH9Ru6Fd6AT/C1tl+T7QkslpvbzqNhAZCvhGe9As
j8Jqvyo//s6+4S7jREZMAsWT1iCEwDhhOvMgpACFkNhnbUvrrIENOo29aZ+W+hBY
fbCJRBEVfU3V2PK8g9uiVQ==',
			],
		],
		'26' => [
			'100' => [
				'latest' => '26.0.11 RC1',
				'internalVersion' => '26.0.11.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-26.0.11rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'M0pqdU74bXBIms7G2RHiWEElUNTZjp5SC24Q0UL/eP760RtNs2XmHGhihhwj5ybo
/RGJF0zkiUY3XulxQvIrNQ038X/uGHiLpjyiwQHaEvWLdlomDm+jqFyfWwQvdxS4
47dTKptNa1OGix9CTdE77X96qzni8E03b/cRu7uf1FrEYTEfomcjG86v4pCyqJ46
G4HegxAqdjhF0Lvcqe9GKZzvTe9p3+m+llJ2KLDThY73I9aEm1WE1rlJK1Zj035j
Xqpab311m3Tt4y1/Y8qXCUpLmAnfTTe1k7aFsaI6M3MMF/lhNWx7j4Lrtcnp1FU4
KecWUDFzNihNSKfl/QmcZg==',
			],
		],
		'25.0.13' => [
			'100' => [
				'latest' => '26.0.11 RC1',
				'internalVersion' => '26.0.11.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-26.0.11rc1.zip',
				'web' => 'https://docs.nextcloud.com/server/26/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '8.0',
				'signature' => 'M0pqdU74bXBIms7G2RHiWEElUNTZjp5SC24Q0UL/eP760RtNs2XmHGhihhwj5ybo
/RGJF0zkiUY3XulxQvIrNQ038X/uGHiLpjyiwQHaEvWLdlomDm+jqFyfWwQvdxS4
47dTKptNa1OGix9CTdE77X96qzni8E03b/cRu7uf1FrEYTEfomcjG86v4pCyqJ46
G4HegxAqdjhF0Lvcqe9GKZzvTe9p3+m+llJ2KLDThY73I9aEm1WE1rlJK1Zj035j
Xqpab311m3Tt4y1/Y8qXCUpLmAnfTTe1k7aFsaI6M3MMF/lhNWx7j4Lrtcnp1FU4
KecWUDFzNihNSKfl/QmcZg==',
			],
		],
		'25' => [
			'100' => [
				'latest' => '25.0.13',
				'internalVersion' => '25.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
c2rOEZwqzv2p7fWh4Ovl6g==',
			],
		],

		'24.0.12' => [
			'100' => [
				'latest' => '25.0.13',
				'internalVersion' => '25.0.13.2',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-25.0.13.zip',
				'web' => 'https://docs.nextcloud.com/server/25/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '7.4',
				'signature' => 'FVPFITm49G4y0pv7xo9XWeLw4zKopsAwrj2iVSW2je9Nq2U25RpudHkrSwHZY2JD
Fsjx8xFncgjHT1iiuZJHBOkInfmJYvsBe3RVuS87uLhmeVevLKwBC+ZkgbRiMwX8
j6TaNthAVOlYaowAQAjyRgJ8AAg3L5liYmqhobBUgtwd86wRlzk5Fy9MTAM3BSwn
J5CqVqcGxVBCJdTp73oryXSctu1lHS4zS4eMWaqSPrCDb4uSMyjE4DESH60dwVyR
X6IrjOfLlNvurihALJuhJzqWG+Xdi3xurMOI65ad8im2+7tiB/yu5Bb5NdSl8KvL
c2rOEZwqzv2p7fWh4Ovl6g==',
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
		'29' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '8.0',
		],
		'28' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable28.zip',
			'web' => 'https://docs.nextcloud.com/server/28/admin_manual/maintenance/upgrade.html',
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
			'eol' => true,
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
