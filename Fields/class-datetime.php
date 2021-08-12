<?php
/**
 * DateTime Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * DateTime Class
 */
class DateTime extends Time {

	/**
	 * Date
	 *
	 * @example mm/dd/yyyy
	 *
	 * @var string
	 */
	public $date;

	/**
	 * DateTime constructor
	 *
	 * @param string $date Date.
	 * @param int    $hours Hours.
	 * @param int    $minutes Minutes.
	 * @param string $am_pm AM/PM.
	 */
	public function __construct( $date, $hours, $minutes, $am_pm ) {

		$this->date = $date;
		parent::__construct( $hours, $minutes, $am_pm );

	}

	/**
	 * Returns DateTime as a string
	 *
	 * @return string
	 */
	public function as_string() {

		return sprintf( '%s %s:%s%s', $this->date, $this->hours, $this->minutes, $this->am_pm );
	}

}
