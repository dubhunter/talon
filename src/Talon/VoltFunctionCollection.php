<?php

namespace Talon;

use Phalcon\Text;
use Phalcon\Mvc\View\Engine\Volt\Compiler as VoltCompiler;

abstract class VoltFunctionCollection {

	/**
	 * @param VoltCompiler $compiler
	 */
	public static function install($compiler) {
		foreach (get_class_methods(get_called_class()) as $method) {
			if ($method != __METHOD__) {
				$compiler->addFunction(Text::uncamelize($method), function ($resolvedArgs, $exprArgs) use ($method) {
					return get_called_class() . '::' . $method . '(' . $resolvedArgs . ')';
				});
			}
		}
	}
}