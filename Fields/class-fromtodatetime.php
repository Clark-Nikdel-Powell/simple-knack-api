<?php
/**
 * FromToDateTime Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * FromToDateTime Class
 */
class FromToDateTime extends DateTime {

	/**
	 * To DateTimeDate
	 *
	 * @var \Knack\Fields\DateTime
	 */
	public $to;

	/**
	 * FromToDateTime constructor
	 *
	 * @param string $date Date.
	 * @param int    $hours Hours.
	 * @param int    $minutes Minutes.
	 * @param string $am_pm AM/PM.
	 * @param string $to_date To Date.
	 * @param int    $to_hours Hours.
	 * @param int    $to_minutes Minutes.
	 * @param string $to_am_pm AM/PM.
	 */
	public function __construct( $date, $hours, $minutes, $am_pm, $to_date, $to_hours, $to_minutes, $to_am_pm ) {

		parent::__construct( $date, $hours, $minutes, $am_pm );
		$this->to = new \Knack\Fields\DateTime( $to_date, $to_hours, $to_minutes, $to_am_pm );

	}

	/**
	 * Return the FromToDateTime as a string
	 *
	 * @return string
	 */
	public function to_string() {

		return sprintf( '%s %s:%s%s to %s %s:%s%s', $this->date, $this->hours, $this->minutes, $this->am_pm, $this->to->date, $this->to->hours, $this->to->minutes, $this->to->am_pm );
	}

}
