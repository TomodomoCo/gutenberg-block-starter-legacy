<?php
/**
 * Plugin Name: Tomodomo › Gutenberg › Starter Block
 * Plugin URI: https://tomodomo.co/
 * Description: A template for building a new Gutenberg block
 * Author: Tomodomo
 * Author URI: https://tomodomo.co/
 * Version: 1.0.0
 * Requires at least: 4.9.8
 * Requires PHP: 7.0
 * License: MIT
 */

// If this file is called directly, abort
if (!defined('WPINC')) {
	die;
}

// Plugin folder path
if (!defined('TOMODOMO_BLOCK_STARTER_PLUGIN_DIR')) {
	define('TOMODOMO_BLOCK_STARTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Plugin folder URL
if (!defined('TOMODOMO_BLOCK_STARTER_PLUGIN_URL')) {
	define('TOMODOMO_BLOCK_STARTER_PLUGIN_URL', plugin_dir_url(__FILE__));
}

// Initialise the block
if (!class_exists('\Tomodomo\Gutenberg\Block\Starter')) {
	require 'lib/Starter.php';

	$block = new \Tomodomo\Gutenberg\Block\Starter();
	$block->init();
}
