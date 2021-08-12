<?php
/**
 * API Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack;

use \Exception;

/**
 * API Class
 */
class API {

	private const API_BASE = 'https://api.knack.com/v1';

	/**
	 * Request headers
	 *
	 * @var array
	 */
	private $headers;

	/**
	 * Knack object
	 *
	 * @var object
	 */
	private $object;

	/**
	 * JSON encoded Knack object
	 *
	 * @var string
	 */
	private $object_json;

	/**
	 * URL
	 *
	 * @var string
	 */
	private $url;

	/**
	 * API constructor
	 *
	 * @param object $object The Knack object.
	 * @param string $url The Knack API endpoint.
	 */
	public function __construct( $object, $url ) {

		\add_filter(
			'http_request_timeout',
			function() {
				return 10;
			}
		);

		$this->headers = [
			'X-Knack-Application-Id' => KNACK_API_APPLICATION_ID,
			'X-Knack-REST-API-KEY'   => KNACK_API_KEY,
		];

		$this->object = $object;
		$this->url    = self::API_BASE . $url;

		if ( ! empty( $this->object ) ) {
			$this->object_json = preg_replace( '/,\s*"[^"]+":null|"[^"]+":null,?/', '', \wp_json_encode( $this->object ) );
			$this->headers     = array_merge( $this->headers, [ 'Content-Type' => 'application/json' ] );
		}

	}

	/**
	 * GET
	 *
	 * @throws \Exception Call returned error or responded with an error code.
	 *
	 * @return array|\WP_Error
	 */
	private function get() {

		$args = [ 'headers' => $this->headers ];

		$r = \wp_remote_get( $this->url, $args );
		if ( \is_wp_error( $r ) ) {
			throw new Exception( sprintf( 'Error received: %s', $r->get_error_message() ) );
		}
		$response = $r['response'];
		if ( 200 !== $response['code'] ) {
			throw new Exception( sprintf( 'Received response code %u %s', $response['code'], $response['message'] ) );
		}

		return $r;
	}

	/**
	 * POST
	 *
	 * @param string $method Optional. The POST method. Defaults to 'POST'.
	 *
	 * @return array|\WP_Error
	 */
	private function post( $method = 'POST' ) {

		$args = [
			'headers' => $this->headers,
			'method'  => $method,
		];

		if ( 'DELETE' !== $method && ! empty( $this->object_json ) ) {
			$args['body'] = $this->object_json;
		}

		$env = wp_get_environment_type();
		if ( 'production' !== $env ) {
			return [
				'body'     => 'I\'m a teapot.',
				'response' => [
					'code'    => 418,
					'message' => 'I\'m a teapot.',
				],
			];
		}

		return \wp_remote_post( $this->url, $args );
	}

	/**
	 * Create Knack record
	 *
	 * @param string $key The Knack object id of the object being created.
	 * @param object $object The Knack object being created.
	 *
	 * @return array|\WP_Error
	 */
	public static function create( $key, $object ) {

		$api = new API( $object, sprintf( '/objects/%s/records', $key ) );

		return $api->post();
	}

	/**
	 * Read Knack record
	 *
	 * @param string $key The Knack object key of the records to retrieve.
	 * @param string $record_id Optional. The Knack record id to retrieve.
	 *
	 * @return array|\WP_Error
	 */
	public static function read( $key, $record_id = null ) {

		$url = sprintf( '/objects/%s/records', $key );
		if ( ! empty( $record_id ) ) {
			$url .= '/' . $record_id;
		}
		$api = new API( null, $url );

		return $api->get();
	}

	/**
	 * Update Knack record
	 *
	 * @param string $key The Knack object key.
	 * @param object $object The Knack object updates.
	 * @param string $record_id Optional. The Knack record id to update.
	 *
	 * @throws \Exception Not Implemented.
	 *
	 * @return array|\WP_Error
	 */
	public static function update( $key, $object, $record_id ) {

		throw new \Exception( 'UPDATE Not Implememted' );

		$api = new API( $object, sprintf( '/objects/%s/records/%s', $key, $record_id ) );

		return $api->post( 'PUT' );
	}

	/**
	 * Delete Knack record
	 *
	 * @param string $key Knack object key.
	 * @param string $record_id Knack record id to delete.
	 *
	 * @throws \Exception Not Implemented.
	 *
	 * @return array|\WP_Error
	 */
	public static function delete( $key, $record_id ) {

		throw new \Exception( 'DELETE Not Implemented' );

		$api = new API( null, sprintf( '/objects/%s/records/%s', $key, $record_id ) );

		return $api->post( 'DELETE' );
	}

	/**
	 * Filter Knack record
	 *
	 * @see https://docs.knack.com/docs/constructing-filters
	 *
	 * @param string $key The Knack object key of the records to retrieve.
	 * @param string $filters Optional. Filtering Knack records retrived.
	 *
	 * @return array|\WP_Error
	 */
	public static function filter( $key, $filters = null ) {

		$url = sprintf( '/objects/%s/records', $key );
		if ( ! empty( $filters ) ) {
			$url .= '?filters=' . rawurlencode( \wp_json_encode( $filters ) );
		}
		$api = new API( null, $url );

		return $api->get();
	}

}
