<?php

namespace Dubhunter\Talon\Cache;

use Exception;
use Memcached;
use Phalcon\Cache\Frontend\Base64;
use Phalcon\Cache\Frontend\Data;
use Phalcon\Cache\Frontend\Json;

class Libmemcached extends \Phalcon\Cache\Backend\Libmemcached {

	const TYPE_BASE64 = 'base64';
	const TYPE_DATA = 'data';
	const TYPE_JSON = 'json';

	/**
	 * @param string $type
	 * @param string $host
	 * @param mixed $port
	 * @param string $prefix
	 * @param mixed $lifetime
	 * @throws Exception
	 */
	public function __construct($type, $host, $port, $prefix, $lifetime) {
		$frontendOptions = [
			'lifetime' => $lifetime,
		];
		switch ($type) {
			case self::TYPE_BASE64;
				$frontend = new Base64($frontendOptions);
				break;
			case self::TYPE_DATA;
				$frontend = new Data($frontendOptions);
				break;
			case self::TYPE_JSON;
				$frontend = new Json($frontendOptions);
				break;
			default:
				throw new Exception(__CLASS__ . ': Invalid cache frontend (' . $type . ')');
		}
		parent::__construct($frontend, [
			'servers' => [
				[
					'host' => $host,
					'port' => $port,
					'weight' => 1,
				],
			],
			'client' => [
				Memcached::OPT_PREFIX_KEY => $prefix,
			],
		]);
	}

}
