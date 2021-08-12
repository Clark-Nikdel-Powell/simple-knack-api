<?php
/**
 * Address Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Address Class
 */
class Address {

	/**
	 * Street address
	 *
	 * @var string
	 */
	public $street;

	/**
	 * Street address 2
	 *
	 * @var string
	 */
	public $street2;

	/**
	 * City
	 *
	 * @var string
	 */
	public $city;

	/**
	 * State
	 *
	 * @var string
	 */
	public $state;

	/**
	 * Zip
	 *
	 * @var string
	 */
	public $zip;

	/**
	 * Address constructor
	 *
	 * @param string $street Street address.
	 * @param string $street2 Street address 2.
	 * @param string $city City.
	 * @param string $state State.
	 * @param string $zip Zip.
	 */
	public function __construct( $street, $street2, $city, $state, $zip ) {

		$this->street  = ! empty( $street ) ? $street : null;
		$this->street2 = ! empty( $street2 ) ? $street2 : null;
		$this->city    = ! empty( $city ) ? $city : null;
		$this->state   = ! empty( $state ) ? $state : null;
		$this->zip     = ! empty( $zip ) ? $zip : null;

	}
}
