<?php

namespace Dubhunter\Talon\Mvc;

use Dubhunter\Talon\Http\Response;
use Dubhunter\Talon\Http\Response\Json as JsonResponse;
use Dubhunter\Talon\Mvc\View\Template;
use League\Uri\Schemes\Http as HttpUri;
use Phalcon\Mvc\Controller;


/**
 * @property \Dubhunter\Talon\Http\RestRequest $request
 */
class RestController extends Controller {

	public function options() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	public function head() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	public function get() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	public function post() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	public function put() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	public function delete() {
		return $this->request->isAjax() || $this->request->isJson() ? JsonResponse::methodNotAllowed() : Response::methodNotAllowed();
	}

	/**
	 * @param bool $includePath
	 * @return string
	 */
	protected function getUrl($includePath = false) {
		$url = $this->request->getScheme() . '://' . $this->request->getHttpHost();
		if ($includePath) {
			/** @var RestRequest $request */
			$request = $this->request;
			$url .= $request->getURI();
		}
		return $url;
	}

	/**
	 * @param $url
	 * @param $params
	 * @return string
	 */
	protected function buildUrl($url, $params) {
		return HttpUri::createFromString($url)->withQuery(http_build_query($params))->__toString();
	}

	/**
	 * @param string $filename
	 * @return Template
	 */
	protected function getTemplate($filename) {
		return new Template($this->view, $filename);
	}

}
