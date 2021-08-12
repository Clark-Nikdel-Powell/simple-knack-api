<?php
/**
 * FromToDate Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * FromToDate Class
 */
class FromToDate extends Date {

	/**
	 * Date
	 *
	 * @var \Knack\Fields\Date
	 */
	public $to;

	/**
	 * All day
	 *
	 * @var bool
	 */
	public $all_day;

	/**
	 * FromToDate constructor
	 *
	 * @param string $date Date.
	 * @param string $to_date To Date.
	 */
	public function __construct( $date, $to_date ) {

		parent::__construct( $date );
		$this->to      = new \Knack\Fields\Date( $to_date );
		$this->all_day = true;

	}

	/**
	 * Return the date range as a string
	 *
	 * @return string
	 */
	public function to_string() {

		return sprintf( '%s to %s', $this->date, $this->to->date );
	}

}
