<?php

namespace Talon;

class JsonResponse extends Response {

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType('application/json');
		$this->setJsonContent($content);
	}

}
