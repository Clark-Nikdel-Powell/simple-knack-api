<?php
/**
 * Loader
 *
 * Load Knack Classes.
 *
 * This loads dependant Knack classes.
 *
 * @package knack-api
 */

// Load API.
require_once 'API/class-api.php';

// Load Fields.
require_once 'Fields/class-address.php';
require_once 'Fields/class-addressinternational.php';
require_once 'Fields/class-coordinates.php';
require_once 'Fields/class-date.php';
require_once 'Fields/class-time.php';
require_once 'Fields/class-datetime.php';
require_once 'Fields/class-fromtodate.php';
require_once 'Fields/class-fromtodatetime.php';
require_once 'Fields/class-email.php';
require_once 'Fields/class-link.php';
require_once 'Fields/class-name.php';
require_once 'Fields/class-timer.php';
