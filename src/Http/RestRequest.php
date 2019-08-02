<?php

namespace Dubhunter\Talon\Http;

use Phalcon\Http\Request;

class RestRequest extends Request {

	public function isJson() {
		return strpos($this->getHeader('CONTENT_TYPE'), 'application/json') === 0;
	}

	public function getJsonRawBody($associative = true) {
		parent::getJsonRawBody($associative);
	}

	public function getQuery($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false) {
		$query = parent::getQuery($name, $filters, $defaultValue);
		if (isset($query['_url'])) {
			unset($query['_url']);
		}
		return $query;
	}

	public function getPost($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false) {
		if ($this->isJson()) {
			$post = $this->getJsonRawBody();
			if ($name) {
				return isset($post[$name]) ? $post[$name] : null;
			}
			return $post;
		}
		return parent::getPost($name, $filters, $defaultValue);
	}

	public function getPut($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false) {
		if ($this->isJson()) {
			$put = $this->getJsonRawBody();
			if ($name) {
				return isset($put[$name]) ? $put[$name] : null;
			}
			return $put;
		}
		return parent::getPut($name, $filters, $defaultValue, $notAllowEmpty, $noRecursive);
	}

}
