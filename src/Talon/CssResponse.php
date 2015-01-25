<?php

namespace Talon;

class CssResponse extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('text/css');
		parent::setContent($content);
	}

}
