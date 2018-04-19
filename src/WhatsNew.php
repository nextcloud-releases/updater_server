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

namespace UpdateServer;

use UpdateServer\Exceptions\UnavailableWhatsNewException;

class WhatsNew {
	/** @var array */
	private $whatsNewData = [];

	/**
	 * @param string $whatsNewFile
	 */
	public function __construct($whatsNewFile) {
		$data = file_get_contents($whatsNewFile);
		if(!is_string($data)) {
			throw new \RuntimeException('Could not read file data');
		}
		$this->whatsNewData = json_decode($data, true);
	}

	/**
	 * @param string $key
	 * @param string $lang
	 * @return string[]
	 * @throws UnavailableWhatsNewException
	 */
	public function get($key, $lang = 'en') {
		if(isset($this->whatsNewData[$key][$lang])) {
		   return $this->whatsNewData[$key][$lang];
		}
		if($lang !== 'en' && isset($this->whatsNewData[$key]['en'])) {
			return $this->whatsNewData[$key]['en'];
		}
		throw new UnavailableWhatsNewException();
	}
}
