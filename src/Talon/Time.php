<?php

namespace Talon;

class Time {

	public static function time($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return strtotime('1970-01-01 ' . $timestamp ? date('H:i:s', $timestamp) : date('H:i:s'));
	}

}