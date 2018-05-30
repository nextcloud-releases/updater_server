<?php
/**
 * @copyright Copyright (c) 2018 Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Tests;

use UpdateServer\WhatsNew;

class WhatsNewTest extends \PHPUnit_Framework_TestCase {
	public function whatsNewProvider() {
		return [
			[
				'en',
				[
					'admin' => [
						"Pollute the files failing to update l n files for pdf",
						"Emaillogin server show open graph preview in gallery removed old code",
						"Server sharee email search server log exceptions that s settings server",
					],
					'regular' => [
						"A beautifully revamped web UI",
						"Sparkling buttons with pew-pew-sound effects when you look at them",
						"Everything is shared automatically with your mother-in-law"
					]
				]
			],
			[
				'de-KX',
				[
					'admin' => [
						"Verschmutzen Sie die Dateien kein update auf l n für pdf-Dateien",
						"Emaillogin server zeigen open graph-Vorschau in der Galerie entfernt, alten code",
						"Server sharee E-Mail-such-server-log-Ausnahmen, die s-Einstellungen server"
					],
					'regular' => [
						"Eine hübsch umgemodeltes webbasiertes Benutzerinterface",
						"Funkelnde Schaltflächen mit Laserwaffensoundeffekten wenn man auf sie schaut",
						"Alles wird automatisch mit der Schwiegermutter geteilt"
					]

				]
			],
			[
				'tlh-KX',
				[
					'admin' => [
						"Pollute the files failing to update l n files for pdf",
						"Emaillogin server show open graph preview in gallery removed old code",
						"Server sharee email search server log exceptions that s settings server",
					],
					'regular' => [
						"A beautifully revamped web UI",
						"Sparkling buttons with pew-pew-sound effects when you look at them",
						"Everything is shared automatically with your mother-in-law"
					]
				]
			],

		];
	}


	/**
	 * @dataProvider whatsNewProvider
	 * @param $expected
	 * @throws \UpdateServer\Exceptions\UnavailableWhatsNewException
	 */
	public function testGet($lang, $expected) {
		$whatsNew = new WhatsNew(__DIR__ . '/../data/whatsnew.json');

		$bulletPoints = $whatsNew->get('17.0.7', $lang);
		$this->assertSame($expected, $bulletPoints);
	}

	/**
	 * @expectedException \UpdateServer\Exceptions\UnavailableWhatsNewException
	 */
	public function testNotAvailable() {
		$whatsNew = new WhatsNew(__DIR__ . '/../data/whatsnew.json');
		$whatsNew->get('4.0.4');
	}
}
