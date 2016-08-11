<?php

namespace Dubhunter\Talon\Session\Adapter;

class Libmemcached extends \Phalcon\Session\Adapter\Libmemcached {

	/**
	 * @param string $host
	 * @param mixed $port
	 * @param string $prefix
	 * @param mixed $lifetime
	 */
	public function __construct($host, $port, $prefix, $lifetime) {
		parent::__construct([
			'servers' => [
				[
					'host' => $host,
					'port' => $port,
					'weight' => 1,
				],
			],
			'client' => [],
			'lifetime' => $lifetime,
			'prefix' => $prefix,
		]);
	}

}
