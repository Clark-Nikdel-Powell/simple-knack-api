<?php
/**
 * Knack Object
 *
 * @package knack-api
 */

namespace Knack\Objects;

use \stdClass;
use \Exception;
use \WP_Error;
use \Knack;

defined( 'ABSPATH' ) || die();

/**
 * KnackObject Class
 */
class KnackObject {

	private const KNACK_OBJECT_KEY = 'object_1';

	/**
	 * Knack id
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Create Knack record
	 *
	 * @throws Exception Error when missing data.
	 *
	 * @return array|WP_Error
	 */
	public function create() {

		// Check for missing data.
		if ( empty( $this->xxxx ) || empty( $this->xxxx ) ) {
			throw new Exception( 'Object missing data' );
		}

		return Knack\API::create( self::KNACK_OBJECT_KEY, $this->to_knack() );
	}

	/**
	 * Read Knack record
	 *
	 * @param string $id The Knack ID of the record to retrieve.
	 *
	 * @return array|WP_Error
	 */
	public function read( $id ) {

		return Knack\API::read( self::KNACK_OBJECT_KEY, $id );
	}

	/**
	 * Update Knack record
	 *
	 * @throws Exception Not Implemented.
	 */
	public function update() {

		throw new Exception( 'UPDATE Not Implemented' );
	}

	/**
	 * Delete Knack record
	 *
	 * @throws Exception Not Implemented.
	 */
	public function delete() {

		throw new Exception( 'DELETE Not Implemented' );
	}

	/**
	 * Prepare data for Knack
	 *
	 * @return \stdClass
	 */
	private function to_knack() {

		$ko = new stdClass();

		/**
		 * Build the Knack Object using the Knack field names. i.e.: `field_1`.
		 *
		 * $ko->field_1 = $this->xxxx;
		 */

		return $ko;
	}

	/**
	 * Get record by Knack ID
	 *
	 * @param string $id The Knack ID of the record to retrieve.
	 *
	 * @return KnackObject|WP_Error
	 */
	public static function with_id( $id ) {

		$response = Knack\API::read( self::KNACK_OBJECT_KEY, $id );
		$data     = json_decode( $response['body'] );

		$ko     = new KnackObject();
		$ko->id = $data->id;

		return $ko;
	}

	/**
	 * Get a single record by Knack field value
	 *
	 * @param string $knack_field The Knack field name to search in.
	 * @param string $knack_field_value The Knack field value to search for.
	 *
	 * @throws Exception Error if multiple records returned.
	 *
	 * @return Resort|WP_Error
	 */
	public static function get_record( $knack_field, $knack_field_value ) {

		$filter           = new \stdClass();
		$filter->field    = $knack_field;
		$filter->operator = 'is';
		$filter->value    = $knack_field_value;

		$response = Knack\API::filter( self::KNACK_OBJECT_KEY, [ $filter ] );
		$data     = json_decode( $response['body'] );
		if ( 1 < count( $data->records ) ) {
			throw new Exception( sprintf( 'Multiple records returned. Expected one. (%s)', $knack_field_value ) );
		}

		$ko     = new KnackObject();
		$ko->id = $data->records[0]->id;

		/**
		 * Set additional object parameters.
		 *
		 * $ko->xxxx = $data->records[0]->field_1;
		 */

		return $ko;
	}

	/**
	 * Returns the Knack ID of a resort
	 *
	 * @param string $knack_field The Knack field name to search in.
	 * @param string $knack_field_value The Knack field value to search for.
	 *
	 * @return string
	 */
	public static function get_record_id( $knack_field, $knack_field_value ) {

		$ko = self::get_record( $knack_field, $knack_field_value );

		return $ko->id;
	}

}
