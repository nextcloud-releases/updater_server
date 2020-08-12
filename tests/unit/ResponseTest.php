<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace Tests;

use UpdateServer\Config;
use UpdateServer\Request;
use UpdateServer\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase {
	/** @var Request */
	private $request;
	/** @var Config|\PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var Response */
	private $response;

	public function setUp() {
		date_default_timezone_set('Europe/Berlin');

		$this->request = $this->getMockBuilder(Request::class)
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder(Config::class)
			->disableOriginalConstructor()->getMock();
		$this->response = new Response($this->request, $this->config);
	}

	public function dailyVersionProvider() {
		return [
			[
				'5',
				'',
			],
			[
				'6',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-7.0.13.zip</url>
 <web>https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'7.0.2',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-8.0.11.zip</url>
 <web>https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'8.0.3',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-8.1.6.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'8.0.5',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-8.1.6.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'9.0.1',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-daily-master.zip</url>
 <web>https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'9.0.3',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.owncloud.org/community/owncloud-daily-master.zip</url>
 <web>https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			]
		];
	}

	/**
	 * @dataProvider dailyVersionProvider
	 */
	public function testBuildResponseForOutdatedDaily($version, $expected) {
		$this->request
			->expects($this->once())
			->method('getChannel')
			->willReturn('daily');
		$this->request
			->expects($this->any())
			->method('getBuild')
			->willReturn('2015-10-19T18:44:30+00:00');
		$this->config
			->expects($this->once())
			->method('get')
			->with('daily')
			->willReturn(
				[
					'9.1' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-master.zip',
						'web' => 'https://doc.owncloud.org/server/9.1/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'9.0' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-master.zip',
						'web' => 'https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html',
						'eol' => false,
					],
					'8.2' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-stable9.zip',
						'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'8.1' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.2.3.zip',
						'web' => 'https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'8.0' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.1.6.zip',
						'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'7' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.0.11.zip',
						'web' => 'https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'6' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-7.0.13.zip',
						'web' => 'https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
				]
			);
		$this->request
			->expects($this->any())
			->method('getMajorVersion')
			->willReturn($version[0]);
		if(isset($version[2])) {
			$this->request
				->expects($this->any())
				->method('getMinorVersion')
				->willReturn($version[2]);
		}
		if(isset($version[4])) {
			$this->request
				->expects($this->any())
				->method('getMaintenanceVersion')
				->willReturn($version[4]);
		}

		$this->assertSame($expected, $this->response->buildResponse());
	}

	/**
	 * @dataProvider dailyVersionProvider
	 */
	public function testBuildResponseForCurrentDaily($version) {
		$this->request
			->expects($this->once())
			->method('getChannel')
			->willReturn('daily');
		$this->request
			->expects($this->any())
			->method('getBuild')
			->willReturn('2025-10-19T18:44:30+00:00');
		$this->request
			->expects($this->any())
			->method('getMajorVersion')
			->willReturn($version[0]);
		if(isset($version[4])) {
			$this->request
				->expects($this->any())
				->method('getMinorVersion')
				->willReturn($version[4]);
		}
		$this->config
			->expects($this->once())
			->method('get')
			->with('daily')
			->willReturn(
				[
					'9.1' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-master.zip',
						'web' => 'https://doc.owncloud.org/server/9.1/admin_manual/maintenance/upgrade.html',
					],
					'9.0' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-master.zip',
						'web' => 'https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html',
					],
					'8.2' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-daily-stable9.zip',
						'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
					],
					'8.1' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.2.3.zip',
						'web' => 'https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html',
					],
					'8.0' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.1.6.zip',
						'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					],
					'7' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-8.0.11.zip',
						'web' => 'https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html',
					],
					'6' => [
						'downloadUrl' => 'https://download.owncloud.org/community/owncloud-7.0.13.zip',
						'web' => 'https://doc.owncloud.org/server/7.0/admin_manual/maintenance/upgrade.html',
					],
				]
			);

		$expected = '';

		$this->assertSame($expected, $this->response->buildResponse());
	}

	/**
	 * @return array
	 */
	public function responseProvider() {
		return [
			[
				'stable',
				'8',
				'0',
				'9',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.0.10</version>
 <versionstring>Nextcloud 8.0.10</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.0.10.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'0',
				'10',
				'',
				'',
			],
			[
				'stable',
				'8',
				'0',
				'11',
				'',
				'',
			],
			[
				'stable',
				'6',
				'0',
				'5',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://downloads.owncloud.com/foo.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'7',
				'0',
				'11',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-7.0.12.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'1',
				'4',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.1.5</version>
 <versionstring>Nextcloud 8.1.5</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.1.5.zip</url>
 <web>https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'1',
				'5',
				'',
				'',
			],
			[
				'stable',
				'8',
				'2',
				'1',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'2',
				'3',
				'',
				'',
			],
			[
				'stable',
				'8',
				'3',
				'3',
				'',
				'',
			],
			[
				'stable',
				'',
				'',
				'',
				'',
				'',
			],
			[
				'beta',
				'8',
				'0',
				'9',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.0.10</version>
 <versionstring>Nextcloud 8.0.10</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.0.10.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'0',
				'10',
				'',
				'',
			],
			[
				'beta',
				'8',
				'0',
				'11',
				'',
				'',
			],
			[
				'beta',
				'7',
				'0',
				'11',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-7.0.12.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'7',
				'0',
				'13',
				'',
				'',
			],
			[
				'beta',
				'8',
				'1',
				'4',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.1.5</version>
 <versionstring>Nextcloud 8.1.5</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.1.5.zip</url>
 <web>https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'1',
				'5',
				'',
				'',
			],
			[
				'beta',
				'8',
				'2',
				'1',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>1</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'2',
				'3',
				'',
				'',
			],
			[
				'beta',
				'8',
				'3',
				'3',
				'',
				'',
			],
			[
				'beta',
				'',
				'',
				'',
				'',
				'',
			],
			[
				'',
				'8',
				'2',
				'1',
				'',
				'',
			],
			[
				'',
				'',
				'',
				'',
				'',
				'',
			],
		];
	}

	/**
	 * @return array
	 */
	public function responseProviderWithDisabledUpdates() {
		return [
			[
				'stable',
				'8',
				'0',
				'9',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.0.10</version>
 <versionstring>Nextcloud 8.0.10</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.0.10.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'0',
				'10',
				'',
				'',
			],
			[
				'stable',
				'8',
				'0',
				'11',
				'',
				'',
			],
			[
				'stable',
				'6',
				'0',
				'5',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://downloads.owncloud.com/foo.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'7',
				'0',
				'11',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-7.0.12.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'1',
				'4',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.1.5</version>
 <versionstring>Nextcloud 8.1.5</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.1.5.zip</url>
 <web>https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'1',
				'5',
				'',
				'',
			],
			[
				'stable',
				'8',
				'2',
				'1',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'stable',
				'8',
				'2',
				'3',
				'',
				'',
			],
			[
				'stable',
				'8',
				'3',
				'3',
				'',
				'',
			],
			[
				'stable',
				'',
				'',
				'',
				'',
				'',
			],
			[
				'beta',
				'8',
				'0',
				'9',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.0.10</version>
 <versionstring>Nextcloud 8.0.10</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.0.10.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'0',
				'10',
				'',
				'',
			],
			[
				'beta',
				'8',
				'0',
				'11',
				'',
				'',
			],
			[
				'beta',
				'7',
				'0',
				'11',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>7.0.12</version>
 <versionstring>Nextcloud 7.0.12</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-7.0.12.zip</url>
 <web>https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'7',
				'0',
				'13',
				'',
				'',
			],
			[
				'beta',
				'8',
				'1',
				'4',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.1.5</version>
 <versionstring>Nextcloud 8.1.5</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.1.5.zip</url>
 <web>https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'1',
				'5',
				'',
				'',
			],
			[
				'beta',
				'8',
				'2',
				'1',
				'',
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'beta',
				'8',
				'2',
				'3',
				'',
				'',
			],
			[
				'beta',
				'8',
				'3',
				'3',
				'',
				'',
			],
			[
				'beta',
				'',
				'',
				'',
				'',
				'',
			],
			[
				'',
				'8',
				'2',
				'1',
				'',
				'',
			],
			[
				'',
				'',
				'',
				'',
				'',
				'',
			],
		];
	}

	/**
	 * @param string $channel
	 * @param string $majorVersion
	 * @param string $minorVersion
	 * @param string $revisionVersion
	 * @param string $maintenanceVersion
	 * @param string $expected
	 *
	 * @dataProvider responseProvider
	 */
	public function testBuildResponseForChannel($channel,
												$majorVersion,
												$minorVersion,
												$maintenanceVersion,
												$revisionVersion,
												$expected) {
		$config = [
			'14.0' => [
				'100' => [
					'latest' => '14.0.1',
					'internalVersion' => '14.0.1',
					'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
					'signature' => 'MySignature',
					'eol' => false,
				],
			],
			'11.0' => [
				'100' => [
					'latest' => '11.0.1',
					'internalVersion' => '11.0.1',
					'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
					'signature' => 'MySignature',
					'eol' => false,
				],
			],
			'8.2' => [
				'100' => [
					'latest' => '8.2.2',
					'internalVersion' => '8.2.2',
					'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
					'eol' => false,
				],
			],
			'8.1' => [
				'100' => [
					'latest' => '8.1.5',
					'internalVersion' => '8.1.5',
					'web' => 'https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'8.0' => [
				'100' => [
					'latest' => '8.0.10',
					'internalVersion' => '8.0.10',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'8.0.7' => [
				'100' => [
					'latest' => '8.0.7.1',
					'internalVersion' => '8.0.7.1',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'8.0.7.1' => [
				'100' => [
					'latest' => '8.0.8',
					'internalVersion' => '8.0.8',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'8.0.8' => [
				'100' => [
					'latest' => '8.0.9',
					'internalVersion' => '8.0.9',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'7' => [
				'100' => [
					'latest' => '7.0.12',
					'internalVersion' => '7.0.12',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'eol' => true,
				],
			],
			'6' => [
				'100' => [
					'latest' => '7.0.12',
					'internalVersion' => '7.0.12',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'downloadUrl' => 'https://downloads.owncloud.com/foo.zip',
					'eol' => true,
				]
			],
		];
		$this->request
			->expects($this->any())
			->method('getChannel')
			->willReturn($channel);
		$this->config
			->expects($this->any())
			->method('get')
			->willReturnMap([
				[$channel, $config],
				['_settings', ['changelogServer' => 'https://updates.nextcloud.com/changelog_server/']],
			]);
		$this->request
			->expects($this->any())
			->method('getMajorVersion')
			->willReturn($majorVersion);
		$this->request
			->expects($this->any())
			->method('getMinorVersion')
			->willReturn($minorVersion);
		$this->request
			->expects($this->any())
			->method('getMaintenanceVersion')
			->willReturn($maintenanceVersion);
		$this->request
			->expects($this->any())
			->method('getRevisionVersion')
			->willReturn($revisionVersion);

		$this->assertSame($expected, $this->response->buildResponse());
	}

	/**
	 * @param string $channel
	 * @param string $majorVersion
	 * @param string $minorVersion
	 * @param string $revisionVersion
	 * @param string $maintenanceVersion
	 * @param string $expected
	 *
	 * @dataProvider responseProviderWithDisabledUpdates
	 */
	public function testBuildResponseWithDisabledUpdaterChannel($channel,
												$majorVersion,
												$minorVersion,
												$maintenanceVersion,
												$revisionVersion,
												$expected) {
		$config = [
			'8.2' => [
				'100' => [
					'latest' => '8.2.2',
					'internalVersion' => '8.2.2',
					'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => false,
				],
			],
			'8.1' => [
				'100' => [
					'latest' => '8.1.5',
					'internalVersion' => '8.1.5',
					'web' => 'https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'8.0' => [
				'100' => [
					'latest' => '8.0.10',
					'internalVersion' => '8.0.10',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'8.0.7' => [
				'100' => [
					'latest' => '8.0.7.1',
					'internalVersion' => '8.0.7.1',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'8.0.7.1' => [
				'100' => [
					'latest' => '8.0.8',
					'internalVersion' => '8.0.8',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'8.0.8' => [
				'100' => [
					'latest' => '8.0.9',
					'internalVersion' => '8.0.9',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'7' => [
				'100' => [
					'latest' => '7.0.12',
					'internalVersion' => '7.0.12',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'eol' => true,
				],
			],
			'6' => [
				'100' => [
					'latest' => '7.0.12',
					'internalVersion' => '7.0.12',
					'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
					'downloadUrl' => 'https://downloads.owncloud.com/foo.zip',
					'autoupdater' => false,
					'eol' => true,
				],
			],
		];
		$this->request
			->expects($this->any())
			->method('getChannel')
			->willReturn($channel);
		$this->config
			->expects($this->any())
			->method('get')
			->with($channel)
			->willReturn($config);
		$this->request
			->expects($this->any())
			->method('getMajorVersion')
			->willReturn($majorVersion);
		$this->request
			->expects($this->any())
			->method('getMinorVersion')
			->willReturn($minorVersion);
		$this->request
			->expects($this->any())
			->method('getMaintenanceVersion')
			->willReturn($maintenanceVersion);
		$this->request
			->expects($this->any())
			->method('getRevisionVersion')
			->willReturn($revisionVersion);

		$this->assertSame($expected, $this->response->buildResponse());
	}

	public function updateChanceDataProvider() {
		return [
			[
				'9901',
				6,
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>9.0.0</version>
 <versionstring>Nextcloud 9.0.0</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-9.0.0.zip</url>
 <web>https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>0</eol>
</nextcloud>
',
			],
			[
				'9994',
				6,
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
			[
				'',
				4,
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>8.2.2</version>
 <versionstring>Nextcloud 8.2.2</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-8.2.2.zip</url>
 <web>https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html</web>
 <autoupdater>0</autoupdater>
 <eol>1</eol>
</nextcloud>
',
			],
		];
	}

	/**
	 * @dataProvider updateChanceDataProvider
	 * @param string $mtime
	 * @param string $phpMinorVersion
	 * @param string $expected
	 */
	public function testBuildResponseStableChannelWithUpdateChance($mtime, $phpMinorVersion, $expected) {
		$config = [
			'8.2' => [
				'95' => [
					'latest' => '8.2.2',
					'internalVersion' => '8.2.2',
					'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'minPHPVersion' => '5.4',
					'eol' => true,
				],
				'5' => [
					'latest' => '9.0.0',
					'internalVersion' => '9.0.0',
					'web' => 'https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'minPHPVersion' => '5.6',
					'eol' => false,
				]
			],
		];

		$this->request
			->expects($this->any())
			->method('getChannel')
			->willReturn('stable');
		$this->config
			->expects($this->any())
			->method('get')
			->with('stable')
			->willReturn($config);
		$this->request
			->expects($this->any())
			->method('getMajorVersion')
			->willReturn('8');
		$this->request
			->expects($this->any())
			->method('getMinorVersion')
			->willReturn('2');
		$this->request
			->expects($this->any())
			->method('getMaintenanceVersion')
			->willReturn('0');
		$this->request
			->expects($this->any())
			->method('getRevisionVersion')
			->willReturn('0');
		$this->request
			->expects($this->any())
			->method('getInstallationMtime')
			->willReturn($mtime);
		$this->request
			->expects($this->any())
			->method('getPHPMajorVersion')
			->willReturn('5');
		$this->request
			->expects($this->any())
			->method('getPHPMinorVersion')
			->willReturn($phpMinorVersion);
		$this->request
			->expects($this->any())
			->method('getPHPReleaseVersion')
			->willReturn('0');

		$this->assertSame($expected, $this->response->buildResponse());
	}
}
