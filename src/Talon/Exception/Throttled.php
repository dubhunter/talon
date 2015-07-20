<?php

namespace Talon\Exception;

class Throttled extends TooManyRequests {

	/**
	 * @var int
	 */
	protected $LockedUntil;
	/**
	 * @var int
	 */
	protected $SecondsLocked;

	/**
	 * @param string $message
	 * @param int $lockedUntil
	 * @param int $secondsLocked
	 * @param int $code
	 */
	public function __construct($message, $lockedUntil, $secondsLocked, $code = 0) {
		parent::__construct($message, $code);
		$this->LockedUntil = $lockedUntil;
		$this->SecondsLocked = $secondsLocked;
	}

	/**
	 * @return int
	 */
	public function getLockedUntil() {
		return $this->LockedUntil;
	}

	/**
	 * @return int
	 */
	public function getSecondsLocked() {
		return $this->SecondsLocked;
	}

}