<?php
/**
 * AddressInternational Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * AddressInternational Class
 */
class AddressInternational extends Address {

	/**
	 * Country
	 *
	 * @var string
	 */
	public $country;

	/**
	 * Address constructor
	 *
	 * @param string $street Street address.
	 * @param string $street2 Street address 2.
	 * @param string $city City.
	 * @param string $state State.
	 * @param string $zip Zip.
	 * @param string $country Country.
	 */
	public function __construct( $street, $street2, $city, $state, $zip, $country ) {

		parent::__construct( $street, $street2, $city, $state, $zip );

		$this->country = ! empty( $country ) ? $country : null;

	}

}
