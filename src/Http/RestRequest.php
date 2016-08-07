<?php

namespace Dubhunter\Talon\Http;

use Phalcon\Http\Request;

class RestRequest extends Request {

	public function getJsonRawBody() {
		return json_decode($this->getRawBody(), true);
	}

	public function getQuery($name = null, $filters = null, $defaultValue = null) {
		$query = parent::getQuery($name, $filters, $defaultValue);
		if (isset($query['_url'])) {
			unset($query['_url']);
		}
		return $query;
	}

	public function getPost($name = null, $filters = null, $defaultValue = null) {
		if ($this->getHeader('CONTENT_TYPE') == 'application/json') {
			$post = $this->getJsonRawBody();
			if ($name) {
				return isset($post[$name]) ? $post[$name] : null;
			}
			return $post;
		}
		return parent::getPost($name, $filters, $defaultValue);
	}

	public function getPut($name = null, $filters = null, $defaultValue = null) {
		if ($this->getHeader('CONTENT_TYPE') == 'application/json') {
			$put = $this->getJsonRawBody();
			if ($name) {
				return isset($put[$name]) ? $put[$name] : null;
			}
			return $put;
		}
		return parent::getPut($name, $filters, $defaultValue);
	}

}
