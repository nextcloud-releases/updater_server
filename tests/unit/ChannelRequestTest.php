<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace Tests;

use UpdateServer\Requests\ChannelRequest;

class ChannelRequestTest extends \PHPUnit_Framework_TestCase {
	public function testRequest()
	{
		$request = new ChannelRequest('stable');
		$this->assertSame('stable', $request->getChannel());
	}
}
