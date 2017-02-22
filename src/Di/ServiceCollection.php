<?php

namespace Dubhunter\Talon\Di;

use Phalcon\Di;

abstract class ServiceCollection {

	/**
	 * @var Di
	 */
	protected static $di;

	/**
	 * @param Di $di
	 */
	public static function install(Di $di) {
		static::$di = $di;
		foreach (get_class_methods(get_called_class()) as $method) {
			if ($method != __FUNCTION__) {
				$di->setShared($method, call_user_func([get_called_class(), $method]));
			}
		}
	}
}
