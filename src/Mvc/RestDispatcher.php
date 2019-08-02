<?php

namespace Dubhunter\Talon\Mvc;

use Phalcon\Http\Request;
use Phalcon\Mvc\Dispatcher;

class RestDispatcher extends Dispatcher {

	public function __construct() {
		$this->setActionSuffix('');
	}

	public function setActionName($actionName) {
		/** @var Request $request */
		$request = $this->getDI()->get('request');
		$actionName = strtolower($request->getMethod());
		parent::setActionName($actionName);
	}

}
