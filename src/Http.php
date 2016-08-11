<?php

namespace Dubhunter\Talon;

class Http {

	protected static $statusMessages = [
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing', // WebDAV
		103 => 'Checkpoint',
		122 => 'Request-URI too long',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information', // since HTTP/1.1
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-Status', // WebDAV
		208 => 'Already Reported', // WebDAV
		226 => 'IM Used',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy', // since HTTP/1.1
		306 => 'Switch Proxy',
		307 => 'Temporary Redirect', // since HTTP/1.1
		308 => 'Permanent Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		418 => 'I\'m a teapot',
		420 => 'Enhance Your Calm',
		422 => 'Unprocessable Entity', // WebDAV
		423 => 'Locked', // WebDAV
		424 => 'Failed Dependency', // WebDAV
		426 => 'Upgrade Required',
		428 => 'Precondition Required',
		429 => 'Too Many Requests',
		431 => 'Request Header Fields Too Large',
		444 => 'No Response',
		449 => 'Retry With',
		450 => 'Blocked by Windows Parental Controls',
		451 => 'Wrong Exchange server',
		499 => 'Client Closed Request',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage', // WebDAV
		508 => 'Loop Detected', // WebDAV
		509 => 'Bandwidth Limit Exceeded', // Apache bw/limited extension
		510 => 'Not Extended',
		511 => 'Network Authentication Required',
		598 => 'Network read timeout error',
		599 => 'Network connect timeout error',
	];

	/**
	 * Returns a messages for a given code
	 * @param $code
	 * @return string
	 */
	public static function getStatusMessage($code) {
		if (!$code) {
			return '';
		}

		return isset(self::$statusMessages[$code]) ? self::$statusMessages[$code] : '';
	}
}