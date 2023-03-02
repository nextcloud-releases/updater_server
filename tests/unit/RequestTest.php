<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace Tests;

use UpdateServer\Exceptions\UnsupportedReleaseException;
use UpdateServer\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {
	public function testRequest() {
		$request = new Request('8x2x0x12x1448709225.0768x1448709281xtestingxx2015-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e', []);
		$this->assertSame(8, $request->getMajorVersion());
		$this->assertSame(2, $request->getMinorVersion());
		$this->assertSame(0, $request->getMaintenanceVersion());
		$this->assertSame(12, $request->getRevisionVersion());
		$this->assertSame(1448709225.0768, $request->getInstallationMtime());
		$this->assertSame(1448709281, $request->getLastCheck());
		$this->assertSame('testing', $request->getChannel());
		$this->assertSame('', $request->getEdition());
		$this->assertSame('2015-10-19T18:44:30', $request->getBuild());
		$this->assertSame('', $request->getRemoteAddress());
	}

	public function testRequestPHP() {
		$request = new Request('8x2x0x12x1448709225.0768x1448709281xtestingxx2015-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3ex5x6x36', []);
		$this->assertSame(8, $request->getMajorVersion());
		$this->assertSame(2, $request->getMinorVersion());
		$this->assertSame(0, $request->getMaintenanceVersion());
		$this->assertSame(12, $request->getRevisionVersion());
		$this->assertSame(1448709225.0768, $request->getInstallationMtime());
		$this->assertSame(1448709281, $request->getLastCheck());
		$this->assertSame('testing', $request->getChannel());
		$this->assertSame('', $request->getEdition());
		$this->assertSame('2015-10-19T18:44:30', $request->getBuild());
		$this->assertSame('', $request->getRemoteAddress());
		$this->assertSame(5, $request->getPHPMajorVersion());
		$this->assertSame(6, $request->getPHPMinorVersion());
		$this->assertSame(36, $request->getPHPReleaseVersion());
	}

	public function testRequestInvalidEntry() {
		$this->expectException(UnsupportedReleaseException::class);
		new Request('x8x2x0x12x1448709225.0768x1448709281xtestingxx2015-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e', []);
	}
}
