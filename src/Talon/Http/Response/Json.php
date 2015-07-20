<?php

namespace Talon\Http\Response;

use Talon\Mvc\View\Template;

class Json extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/json');
		$this->setJsonContent($content);
	}

}
