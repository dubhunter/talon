<?php

namespace Dubhunter\Talon\Mvc;

use Phalcon\Mvc\Router;

class RestRouter extends Router {

	public function __construct() {
		parent::__construct(false);
		$this->removeExtraSlashes(true);
	}

}
