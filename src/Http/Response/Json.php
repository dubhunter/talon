<?php

namespace Dubhunter\Talon\Http\Response;

use Dubhunter\Talon\Http\Response;

class Json extends Response {

	/**
	 * @param mixed $content
	 * @param int|null $code
	 * @param array $headers
	 */
	public function __construct($content = null, $code = null, $headers = []) {
		parent::__construct(null, $code, $headers);

		$this->setContentType('application/json', 'UTF-8');

		if ($content) {
			$this->setJsonContent($content);
		}
	}

}
