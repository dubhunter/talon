<?php

namespace Dubhunter\Talon\Http\Response;

use Dubhunter\Talon\Http\Response;
use Dubhunter\Talon\Mvc\View\Template;
use Phalcon\Http\ResponseInterface;

class Js extends Response {

	/**
	 * @param string|Template $content
	 * @return ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/javascript', 'UTF-8');
		parent::setContent($content);
	}

}
