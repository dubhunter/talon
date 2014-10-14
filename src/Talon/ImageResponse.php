<?php

namespace Talon;

use Phalcon\Image\Adapter as Image;

class ImageResponse extends Response {

	/**
	 * @param Image|string $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		if ($content instanceof Image) {
			$this->setContentType($content->getMime());
			$content = $content->render();
		}
		parent::setContent($content);
	}

}
