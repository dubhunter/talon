<?php

namespace Dubhunter\Talon\Mvc;

use Dubhunter\Talon\Http\Response;
use Dubhunter\Talon\Http\Response\Json as JsonResponse;
use Dubhunter\Talon\Mvc\View\Template;
use Phalcon\DiInterface;
use Phalcon\Mvc\Application;

/**
 * @property \Dubhunter\Talon\Http\RestRequest $request
 */
class RestApplication extends Application {

	/**
	 * @param DiInterface $dependencyInjector
	 */
	public function __construct(DiInterface $dependencyInjector) {
		parent::__construct($dependencyInjector);
		$this->useImplicitView(false);
	}

	public function handle($uri = null) {
		/** @var Response $response */
		$response = parent::handle($uri);

		if ($response->getContent()) {
			return $response;
		}

		switch ($response->getStatusCode()) {
			case Response::HTTP_NOT_FOUND:
			case Response::HTTP_METHOD_NOT_ALLOWED:
			case Response::HTTP_UNAUTHORIZED:
			case Response::HTTP_FORBIDDEN:
			case Response::HTTP_INTERNAL_SERVER_ERROR:
				if ($this->request->isAjax() || $this->request->isJson() || $response instanceof JsonResponse) {
					$response->setContent([
						'error' => $response->getStatusMessage(),
					]);
				} else {
					$template = new Template($this->view, 'error');
					$template->set('code', $response->getStatusCode());
					$template->set('message', $response->getStatusMessage());
					$response->setContent($template->render());
				}
				break;
			default:
				break;
		}

		return $response;
	}

}
