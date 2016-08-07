<?php

namespace Dubhunter\Talon;

class Date {

	public static function iso9601($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $timestamp ? date('c', $timestamp) : date('c');
	}

	public static function sqlDate($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $timestamp ? date('Y-m-d', $timestamp) : date('Y-m-d');
	}

	public static function sqlDatetime($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $timestamp ? date('Y-m-d H:i:s', $timestamp) : date('Y-m-d H:i:s');
	}

	public static function sqlTime($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = Time::time($timestamp);
		}

		return $timestamp ? date('H:i:s', $timestamp) : date('H:i:s');
	}

	public static function sqlMonthDay($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $timestamp ? date('0004-m-d', $timestamp) : date('0004-m-d');
	}

	public static function currentMonthDay($timestamp = null) {
		if ($timestamp !== null && !is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return self::sqlDate(strtotime('+' . (date('Y') - 4) . ' years', $timestamp));
	}

}
