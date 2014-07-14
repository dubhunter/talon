<?php

namespace Talon;

class TwimlResponse extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/xml');
		parent::setContent($content);
	}

}
