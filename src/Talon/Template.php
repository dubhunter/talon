<?php

namespace Talon;

use Phalcon\Mvc\ViewInterface;
use Phalcon\Mvc\View\Simple as View;

class Template {

	/**
	 * @var View
	 */
	protected $view;
	protected $name;
	protected $variables;

	/**
	 * @param View|ViewInterface $view
	 * @param string $name
	 */
	public function __construct($view, $name) {
		$this->view = $view;
		$this->name = $name;
		$this->variables = array();
	}

	/**
	 * Validate values for safety
	 * @param $value
	 * @throws \Exception
	 */
	protected function validateValue($value) {
		if (is_object($value)) {
			throw new \Exception('Can not set an object on template');
		}
	}

	/**
	 * Set a given key to a view value
	 * @param string $key The key to set
	 * @param string $value The value to set
	 * @return void
	 */
	public function set($key, $value) {
		$this->validateValue($value);
		$this->variables[$key] = $value;
	}

	/**
	 * Adds a value to a collection, collection will be created if it doesn't already exist
	 * @param string $key The collection key
	 * @param $value
	 */
	public function add($key, $value) {
		$this->validateValue($value);
		if (!isset($this->variables[$key])) {
			$this->variables[$key] = array();
		}

		if (!is_array($this->variables[$key])) {
			$this->variables[$key] = array($this->variables[$key]);
		}

		$this->variables[$key][] = $value;
	}

	/**
	 * Render the template using the Simple View
	 * @return string
	 */
	public function render() {
		return $this->view->render($this->name, $this->variables);
	}

}