<?php

namespace Talon\Http\Response;

use Talon\Http\Response;
use Phalcon\Image\Adapter as ImageAdapter;

class Image extends Response {

	/**
	 * @param ImageAdapter|string $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		if ($content instanceof ImageAdapter) {
			$this->setContentType($content->getMime());
			$content = $content->render();
		}
		parent::setContent($content);
	}

}
