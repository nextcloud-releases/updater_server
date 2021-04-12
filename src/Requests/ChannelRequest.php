<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

namespace UpdateServer\Requests;

class ChannelRequest {
	/** @var string */
	private $channel;

	/**
	 * ChannelRequest constructor.
	 * @param string $channel
	 */
	public function __construct(string $channel) {
		$this->channel = $channel;
	}

	/**
	 * @return string
	 */
	public function getChannel(): string {
		return $this->channel;
	}
}
