<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace Tests;

use UpdateServer\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase {
	public function testGet() {
		$config = new Config(__DIR__ . '/../data/config.php');

		$stableResponse = [
			'8.2' => [
				'latest' => '8.2.3',
				'web' => 'https://doc.owncloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'8.1' => [
				'latest' => '8.1.6',
				'web' => 'https://doc.owncloud.org/server/8.1/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'8.0' => [
				'latest' => '8.0.11',
				'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.4',
			],
			'7' => [
				'latest' => '7.0.13',
				'web' => 'https://doc.owncloud.org/server/8.0/admin_manual/maintenance/upgrade.html',
				'minPHPVersion' => '5.4',
			],
		];
		$this->assertSame($stableResponse, $config->get('stable'));
	}
}
