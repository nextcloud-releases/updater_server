<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace Tests;

use UpdateServer\Config;
use UpdateServer\Requests\ChannelRequest;
use UpdateServer\Responses\ChannelResponse;

class ChannelResponseTest extends \PHPUnit_Framework_TestCase
{
	/** @var ChannelRequest */
	private $request;
	/** @var Config|\PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var ChannelResponse */
	private $response;

	public function setUp()
	{
		date_default_timezone_set('Europe/Berlin');

		$this->request = $this->getMockBuilder(ChannelRequest::class)
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder(Config::class)
			->disableOriginalConstructor()->getMock();
		$this->response = new ChannelResponse($this->request, $this->config);
	}

	public function updateDataProvider() {
		return [
			[
				'beta',
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
				'stable',
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
				'',
			],
		];
	}

	/**
	 * @dataProvider updateDataProvider
	 * @param string $channel
	 * @param string $expected
	 */
	public function testBuildChannelResponse($channel, $expected) {
		$betaConfig = [
			'9.0' => [
				'100' => [
					'latest' => '9.0.0',
					'internalVersion' => '9.0.0',
					'web' => 'https://doc.owncloud.org/server/9.0/admin_manual/maintenance/upgrade.html',
					'autoupdater' => false,
					'minPHPVersion' => '5.6',
					'eol' => false,
				]
			],
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
		$stableConfig = [
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
			->willReturn($channel);
		$this->config
			->expects($this->any())
			->method('get')
			->with('stable')
			->willReturn($stableConfig);
		$this->config
			->expects($this->any())
			->method('get')
			->with('beta')
			->willReturn($betaConfig);
		$this->assertSame($expected, $this->response->buildResponse());
	}

	public function dailyVersionProvider() {
		return [
			[
				'<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>100.0.0.0</version>
 <versionstring>Nextcloud daily</versionstring>
 <url>https://download.nextcloud.com/server/daily/latest-master.zip</url>
 <web>https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html</web>
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
	public function testBuildResponseForDailyChannel($expected) {
		$this->request
			->expects($this->any())
			->method('getChannel')
			->willReturn('daily');
		$this->config
			->expects($this->once())
			->method('get')
			->with('daily')
			->willReturn(
				[
					'21.1' => [
						'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master-eol.zip',
						'web' => 'https://docs.nextcloud.com/server/eol/admin_manual/maintenance/upgrade.html',
						'eol' => true,
					],
					'21' => [
						'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
						'web' => 'https://docs.nextcloud.com/server/latest/admin_manual/maintenance/upgrade.html',
						'eol' => false,
					],
					'20' => [
						'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable20.zip',
						'web' => 'https://docs.nextcloud.com/server/20/admin_manual/maintenance/upgrade.html',
						'eol' => false,
					],
					'19' => [
						'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable19.zip',
						'web' => 'https://docs.nextcloud.com/server/19/admin_manual/maintenance/upgrade.html',
						'eol' => false,
					],
				]
			);

		$this->assertSame($expected, $this->response->buildResponse());
	}
}
