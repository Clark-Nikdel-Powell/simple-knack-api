<?php
/**
 * Link Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Link Class
 */
class Link {

	/**
	 * URL
	 *
	 * @var string
	 */
	public $url;

	/**
	 * Label
	 *
	 * @var string
	 */
	public $label;

	/**
	 * Link constructor
	 *
	 * @param string $url URL.
	 * @param string $label Label.
	 */
	public function __construct( $url, $label ) {

		$this->url   = $url;
		$this->label = $label;

	}
}
