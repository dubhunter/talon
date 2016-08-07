<?php

namespace Dubhunter\Talon;

use Phalcon\Filter;
use Phalcon\Text;

abstract class FilterCollection {

	/**
	 * @param Filter $filter
	 */
	public static function install($filter) {
		foreach (get_class_methods(get_called_class()) as $method) {
			if ($method != __METHOD__) {
				$filter->add(Text::uncamelize($method), function ($value) use ($method) {
					return call_user_func([get_called_class(), $method], $value);
				});
			}
		}
	}
}
