<?php
/**
 * Name Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Name Class
 */
class Name {
	/**
	 * Title
	 *
	 * @var string
	 */
	public $title;

	/**
	 * First name
	 *
	 * @var string
	 */
	public $first;

	/**
	 * Middle name
	 *
	 * @var string
	 */
	public $middle;

	/**
	 * Last name
	 *
	 * @var string
	 */
	public $last;

	/**
	 * Name constructor
	 *
	 * @param string $title Title.
	 * @param string $first First name.
	 * @param string $middle Middle name.
	 * @param string $last Last name.
	 */
	public function __construct( $title, $first, $middle, $last ) {

		$this->title  = ! empty( $title ) ? $title : null;
		$this->first  = ! empty( $first ) ? $first : null;
		$this->middle = ! empty( $middle ) ? $middle : null;
		$this->last   = ! empty( $last ) ? $last : null;

	}

}
