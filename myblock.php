<?php
/**
 * Plugin Name: Custom gutenberg block
 * Plugin URI: https://www.mindful.org/
 * Description: Custom gutenberg block
 * Author: Tomodomo
 * Author URI: https://tomodomo.co/
 * Version: 1.0.0
 * Text Domain: myblock
 * Requires at least: 4.9
 * Requires PHP: 7.0
 * License: proprietary
 *
 * @package TomodomoCo_Myblock
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Bootstrap plugin
if ( ! class_exists( 'TomodomoCo_Myblock' ) ) {
	include 'class-plugin.php';
	TomodomoCo_Myblock::get_instance();
}

// Add: Plugin logic
