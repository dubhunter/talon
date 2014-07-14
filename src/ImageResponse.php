<?php

namespace Talon;

use \Phalcon\Image\Adapter as Image;

class ImageResponse extends Response {

	/**
	 * @param Image|string $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		$this->setContentType($content->getMime());

		if ($content instanceof Image) {
			$content = $content->render();
		}
		parent::setContent($content);
	}

}
