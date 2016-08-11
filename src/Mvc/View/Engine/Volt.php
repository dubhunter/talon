<?php

namespace Dubhunter\Talon\Mvc\View\Engine;

use Phalcon\DiInterface;
use Phalcon\Mvc\ViewBaseInterface;

class Volt extends \Phalcon\Mvc\View\Engine\Volt {

	public function __construct(ViewBaseInterface $view, DiInterface $dependencyInjector, $development = true, $prefix = '') {
		parent::__construct($view, $dependencyInjector);
		$this->setOptions([
			'compiledPath' => function ($templatePath) use ($view, $development, $prefix) {
				$dir = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'volt-cache';
				if (!is_dir($dir)) {
					mkdir($dir);
				}
				if ($prefix !== '') {
					$prefix .= '%';
				}
				return $dir . DIRECTORY_SEPARATOR . $prefix . str_replace(DIRECTORY_SEPARATOR, '%', str_replace($view->getViewsDir(), '', $templatePath)) . '.php';
			},
			'compileAlways' => $development,
			'stat' => $development,
		]);
	}

}
