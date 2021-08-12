<?php
/**
 * Email Class
 *
 * @see https://www.knack.com/developer-documentation/#the-api
 *
 * @package knack-api
 */

namespace Knack\Fields;

/**
 * Email Class
 */
class Email {
	/**
	 * Email address
	 *
	 * @var string
	 */
	public $email;

	/**
	 * Label
	 *
	 * @var string
	 */
	public $label;

	/**
	 * Name constructor
	 *
	 * @param string $email Email address.
	 * @param string $label Optional. Email address label. Defaults to 'Email'.
	 */
	public function __construct( $email, $label = 'Email' ) {

		$this->email = $email;
		$this->label = $label;

	}

}
