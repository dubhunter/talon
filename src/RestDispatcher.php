<?php

namespace Talon;

class RestDispatcher extends \Phalcon\Mvc\Dispatcher {

	public function __construct() {
		parent::__construct();
		$this->setActionSuffix('');
	}

	public function setActionName($actionName) {
		/** @var \Phalcon\Http\Request $request */
		$request = $this->getDI()->get('request');
		$actionName = strtolower($request->getMethod());
		parent::setActionName($actionName);
	}

}