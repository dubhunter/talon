<?php

namespace Dubhunter\Talon\Flash;

use Phalcon\Flash\Session;

class Bootstrap extends Session {
	
	public function __construct() {
		parent::__construct([
			'notice' => 'alert alert-info',
			'success' => 'alert alert-success',
			'warning' => 'alert alert-warning',
			'error' => 'alert alert-danger',
		]);
	}

}
