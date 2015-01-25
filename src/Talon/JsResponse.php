<?php

namespace Talon;

class JsResponse extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/javascript');
		parent::setContent($content);
	}

}
