<?php

namespace Dubhunter\Talon\Http\Response;

use Dubhunter\Talon\Http\Response;
use Phalcon\Http\ResponseInterface;
use Phalcon\Image\Adapter as ImageAdapter;

class Image extends Response {

	/**
	 * @param ImageAdapter|string $content
	 * @return ResponseInterface|void
	 */
	public function setContent($content) {
		if ($content instanceof ImageAdapter) {
			$this->setContentType($content->getMime());
			$content = $content->render();
		}
		parent::setContent($content);
	}

}
