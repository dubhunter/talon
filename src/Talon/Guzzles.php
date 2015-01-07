<?php

namespace Talon;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Response;

class Guzzles {

	/**
	 * @param string $method
	 * @param string $url
	 * @param null|array $headers
	 * @param null|string $body
	 * @param array $options
	 * @return Response
	 */
	public static function request($method, $url, $headers = null, $body = null, array $options = array()) {
		$client = new Client();
		$request = $client->createRequest($method, $url, $headers, $body, $options);
		return $request->send();
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param array $options
	 * @return Response
	 */
	public static function get($uri, $headers = null, array $options = array()) {
		return self::request('GET', $uri, $headers, null, $options);
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param array $options
	 * @return Response
	 */
	public static function head($uri, $headers = null, array $options = array()) {
		return self::request('HEAD', $uri, $headers, null, $options);
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param null|string $body
	 * @param array $options
	 * @return Response
	 */
	public static function delete($uri, $headers = null, $body = null, array $options = array()) {
		return self::request('DELETE', $uri, $headers, $body, $options);
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param null|string $body
	 * @param array $options
	 * @return Response
	 */
	public static function put($uri, $headers = null, $body = null, array $options = array()) {
		return self::request('PUT', $uri, $headers, $body, $options);
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param null|string $body
	 * @param array $options
	 * @return Response
	 */
	public static function patch($uri, $headers = null, $body = null, array $options = array()) {
		return self::request('PATCH', $uri, $headers, $body, $options);
	}

	/**
	 * @param string $uri
	 * @param null|array $headers
	 * @param null|string $postBody
	 * @param array $options
	 * @return Response
	 */
	public static function post($uri, $headers = null, $postBody = null, array $options = array()) {
		return self::request('POST', $uri, $headers, $postBody, $options);
	}

	/**
	 * @param string $uri
	 * @param array $options
	 * @return Response
	 */
	public static function options($uri, array $options = array()) {
		return self::request('OPTIONS', $uri, $options);
	}

}