<?php

namespace Talon\Http\Response;

use Talon\Http\Response;
use Talon\Mvc\View\Template;

class Js extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/javascript');
		parent::setContent($content);
	}

}
