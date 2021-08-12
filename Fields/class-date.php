<?php
/**
 * Date Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Date Class
 */
class Date {

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
	 */
	public function __construct( $date ) {

		$this->date = $date;

	}

}
