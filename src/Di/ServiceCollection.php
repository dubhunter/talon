<?php

namespace Dubhunter\Talon\Di;

use Phalcon\Di;

abstract class ServiceCollection {

	/**
	 * @var Di
	 */
	protected $di;

	public function __construct(Di $di) {
		$this->di = $di;
	}

	public function install() {
		foreach (get_class_methods($this) as $method) {
			if (!in_array($method, [__FUNCTION__, '__construct'])) {
				$this->di->setShared($method, call_user_func([$this, $method]));
			}
		}
	}
}
