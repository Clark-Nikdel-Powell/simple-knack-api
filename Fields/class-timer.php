<?php
/**
 * Timer Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Timer Class
 */
class Timer {

	/**
	 * Times
	 *
	 * @var stdClass[]
	 */
	public $times;

	/**
	 * Add timers
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
	public function add_timer( $date, $hours, $minutes, $am_pm, $to_date, $to_hours, $to_minutes, $to_am_pm ) {

		$timer       = new \stdClass();
		$timer->from = new DateTime( $date, $hours, $minutes, $am_pm, $to_date );
		$timer->to   = new DateTime( $to_date, $to_hours, $to_minutes, $to_am_pm );

		array_push( $this->times, $timer );

	}
}
