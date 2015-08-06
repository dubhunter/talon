<?php

namespace Talon;

use Phalcon\Text;
use Phalcon\Filter;

abstract class FilterCollection {

	/**
	 * @param Filter $filter
	 */
	public static function install($filter) {
		foreach (get_class_methods(get_called_class()) as $method) {
			if ($method != __METHOD__) {
				$filter->add(Text::uncamelize($method), function ($value) use ($method) {
					call_user_func(array(get_called_class(), $method), $value);
				});
			}
		}
	}
}