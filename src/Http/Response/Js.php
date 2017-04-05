<?php

namespace Dubhunter\Talon\Http\Response;

use Dubhunter\Talon\Http\Response;
use Dubhunter\Talon\Mvc\View\Template;

class Js extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/javascript', 'UTF-8');
		parent::setContent($content);
	}

}
