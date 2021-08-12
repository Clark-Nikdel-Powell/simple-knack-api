<?php
/**
 * Time Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Time Class
 */
class Time {

	/**
	 * Hours
	 *
	 * @var int
	 */
	public $hours;

	/**
	 * Minutes
	 *
	 * @var int
	 */
	public $minutes;

	/**
	 * AM/PM
	 *
	 * @var string
	 */
	public $am_pm;

	/**
	 * Time constructor
	 *
	 * @param int    $hours Hours.
	 * @param int    $minutes Minutes.
	 * @param string $am_pm AM/PM.
	 */
	public function __construct( $hours, $minutes, $am_pm ) {

		$this->hours   = $hours;
		$this->minutes = $minutes;
		$this->am_pm   = $am_pm;

	}

	/**
	 * Returns time as a string
	 *
	 * @return string
	 */
	public function to_string() {

		return sprintf( '%s:%s%s', $this->hours, $this->minutes, $this->am_pm );
	}

}
