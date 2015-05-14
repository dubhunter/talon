<?php

namespace Talon;

use Phalcon\Http\Response as PhalconResponse;

class Response extends PhalconResponse {
	/**
	 * @const int OK HTTP Response Code for OK
	 */
	const HTTP_OK = 200;

	/**
	 * @const int OK HTTP Response Code for fulfilled request, no content
	 */
	const HTTP_NO_CONTENT = 204;

	/**
	 * @const int Permanent Redirect HTTP Response Code for permanently moved
	 */
	const HTTP_PERMANENT_REDIRECT = 301;

	/**
	 * @const int Temporary Redirect HTTP Response Code for temporarily moved
	 */
	const HTTP_TEMPORARY_REDIRECT = 302;

	/**
	 * @const int NOT_MODIFIED HTTP Response Code for content not modified
	 */
	const HTTP_NOT_MODIFIED = 304;

	/**
	 * @const int BAD_REQUEST HTTP Response Code for an invalid request
	 */
	const HTTP_BAD_REQUEST = 400;

	/**
	 * @const int UNAUTHORIZED HTTP Response Code for unauthorized access
	 */
	const HTTP_UNAUTHORIZED = 401;

	/**
	 * @const int PAYMENT_REQUIRED HTTP Response Code for payment required
	 */
	const HTTP_PAYMENT_REQUIRED = 402;

	/**
	 * @const int FORBIDDEN HTTP Response Code for a forbidden endpoint (despite being authorized)
	 */
	const HTTP_FORBIDDEN = 403;

	/**
	 * @const int NOT_FOUND HTTP Response Code for content not found
	 */
	const HTTP_NOT_FOUND = 404;

	/**
	 * @const int METHOD_NOT_ALLOWED HTTP Response Code for method not allowed
	 */
	const HTTP_METHOD_NOT_ALLOWED = 405;

	/**
	 * @const int TOO_MANY_REQUESTS HTTP Response Code for too many requests
	 */
	const HTTP_TOO_MANY_REQUESTS = 429;

	/**
	 * @const int INTERNAL_SERVER_ERROR HTTP Response Code for server error
	 */
	const HTTP_INTERNAL_SERVER_ERROR = 500;

	/**
	 * @var array
	 */
	protected static $defaultHeaders = array();

	/**
	 * @var int
	 */
	protected $statusCode;

	/**
	 * @var string
	 */
	protected $statusMessage;

	/**
	 * Get the default headers that will be included in every response
	 */
	public static function getDefaultHeaders() {
		return self::$defaultHeaders;
	}

	/**
	 * Set the default headers to be included in every response
	 * @param $headers
	 */
	public static function setDefaultHeaders($headers) {
		self::$defaultHeaders = $headers;
	}

	/**
	 * Set a default header to be included in every response
	 * @param $name
	 * @param $value
	 */
	public static function addDefaultHeader($name, $value) {
		self::$defaultHeaders[$name] = $value;
	}

	/**
	 * Factory function for creating a Response with a specific HTTP Status Code
	 * @static
	 * @param int $code HTTP Status Code
	 * @param string $content The content, if any, to set on the response
	 * @return Response The Response with the given HTTP Status Code
	 */
	public static function code($code, $content = null) {
		return new static($content, $code);
	}

	/**
	 * Convenience function to create a 200 OK
	 * @static
	 * @param null|mixed $content The response content
	 * @return Response HTTP 200 Response
	 */
	public static function ok($content = null) {
		return static::code(self::HTTP_OK, $content);
	}

	/**
	 * Convenience function to create a 204 No Content
	 * @static
	 * @return Response HTTP 204 Response
	 */
	public static function noContent() {
		return static::code(self::HTTP_NO_CONTENT, '');
	}

	/**
	 * Convenience function to create a 304 response
	 * @see Response::code()
	 * @static
	 * @return Response HTTP 304 Response
	 */
	public static function notModified() {
		return static::code(self::HTTP_NOT_MODIFIED);
	}

	/**
	 * Convenience function to create a 400 response
	 * @see Response::code()
	 * @static
	 * @param null|string $message Optional message for the error
	 * @return Response HTTP 400 Response with optional message
	 */
	public static function badRequest($message = null) {
		return static::code(self::HTTP_BAD_REQUEST, $message);
	}

	/**
	 * Convenience function to create a 401 response
	 * @see Response::code()
	 * @static
	 * @param null|string $message Optional message for the error
	 * @return Response HTTP 401 Response with optional message
	 */
	public static function unauthorized($message = null) {
		return static::code(self::HTTP_UNAUTHORIZED, $message);
	}

	/**
	 * Convenience function to create a 403 response
	 * @see Response::code()
	 * @static
	 * @param null|string $message Optional message for the error
	 * @return Response HTTP 403 Response with optional message
	 */
	public static function forbidden($message = null) {
		return static::code(self::HTTP_FORBIDDEN, $message);
	}

	/**
	 * Convenience function to create a 404 response
	 * @see Response::code()
	 * @static
	 * @param null|string $content Optional 404 Response Content
	 * @return Response HTTP 404 Response
	 */
	public static function notFound($content = null) {
		return static::code(self::HTTP_NOT_FOUND, $content);
	}

	/**
	 * Convenience function to create a 405 response
	 * @see Response::code()
	 * @static
	 * @param null|string $content Optional 405 Response Content
	 * @return Response HTTP 405 Response
	 */
	public static function methodNotAllowed($content = null) {
		return static::code(self::HTTP_METHOD_NOT_ALLOWED, $content);
	}

	/**
	 * Convenience function to create a 429 response
	 * @see Response::code()
	 * @static
	 * @param null|string $content Optional 429 Response Content
	 * @return Response HTTP 429 Response
	 */
	public static function tooManyRequests($content = null) {
		return static::code(self::HTTP_TOO_MANY_REQUESTS, $content);
	}

	/**
	 * Convenience function to create a 500 response
	 * @see Response::code()
	 * @static
	 * @param null|string $message Optional message for the error
	 * @return Response HTTP 500 Response with optional message
	 */
	public static function error($message = null) {
		return static::code(self::HTTP_INTERNAL_SERVER_ERROR, $message);
	}

	/**
	 * Convenience function to create a 301 response
	 * @see Response::redirect()
	 * @static
	 * @param string $url The url to redirect to
	 * @param boolean $externalRedirect Treat the redirect as external
	 * @return Response
	 */
	public static function permanentRedirect($url, $externalRedirect = false) {
		/** @var Response $response */
		$response = new static();
		$response->redirect($url, $externalRedirect, self::HTTP_PERMANENT_REDIRECT);
		return $response;
	}

	/**
	 * Convenience function to create a 302 response
	 * @see Response::redirect()
	 * @static
	 * @param string $url The url to redirect to
	 * @param boolean $externalRedirect Treat the redirect as external
	 * @return Response HTTP 302 Response with URL
	 */
	public static function temporaryRedirect($url, $externalRedirect = false) {
		/** @var Response $response */
		$response = new static();
		$response->redirect($url, $externalRedirect, self::HTTP_TEMPORARY_REDIRECT);
		return $response;
	}

	/**
	 * @param Template|string|null $content
	 * @param int|null $code
	 * @param array $headers
	 */
	public function __construct($content = null, $code = null, $headers = array()) {
		parent::__construct();

		if ($content) {
			$this->setContent($content);
		}

		if ($code) {
			$this->setStatusCode($code);
		}

		foreach (array_merge(self::$defaultHeaders, $headers) as $name => $value) {
			$this->setHeader($name, $value);
		}
	}

	/**
	 * @param int $code
	 * @param null $message
	 * @return Response
	 */
	public function setStatusCode($code, $message = null) {
		if (!$message) {
			$message = Http::getStatusMessage($code);
		}
		$this->statusCode = $code;
		$this->statusMessage = $message;
		return parent::setStatusCode($this->statusCode, $this->statusMessage);
	}

	/**
	 * @return int
	 */
	public function getStatusCode() {
		return $this->statusCode;
	}

	/**
	 * @return string
	 */
	public function getStatusMessage() {
		return $this->statusMessage;
	}

	/**
	 * @param string|Template $content
	 * @return \Phalcon\Http\ResponseInterface|void
	 */
	public function setContent($content) {
		if ($content instanceof Template) {
			$content = $content->render();
		}

		return parent::setContent($content);
	}

}