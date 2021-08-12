<?php
/**
 * Coordinates Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Coordinates Class
 */
class Coordinates {

	/**
	 * Latitude
	 *
	 * @var string
	 */
	public $latitude;

	/**
	 * Longitude
	 *
	 * @var string
	 */
	public $longitude;

	/**
	 * Coordinates constructor
	 *
	 * @param string $latitude Latitude.
	 * @param string $longitude Longitude.
	 */
	public function __construct( $latitude, $longitude ) {

		$this->latitude  = $latitude;
		$this->longitude = $longitude;

	}
}
