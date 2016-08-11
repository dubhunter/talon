<?php

namespace Dubhunter\Talon\Mvc\Router;

use Phalcon\Mvc\Router\Group;
use Phalcon\Text;

class NamedGroup extends Group {

	const NSPACE = null;
	const PREFIX = null;
	const ROUTES = [];

	public function initialize() {
		if (static::PREFIX) {
			$this->setPrefix(static::PREFIX);
		}
		foreach (static::ROUTES as $route => $controller) {
			$namespace = '';
			if (static::NSPACE) {
				$namespace = static::NSPACE . '\\';
			}
			$name = implode('-', array_map(function ($name) {
				$name = Text::uncamelize($name);
				$name = str_replace('_', '-', $name);
				return $name;
			}, explode('\\', $controller)));
			$this->add($route, $namespace . $controller)->setName($name);
		}
	}

}
