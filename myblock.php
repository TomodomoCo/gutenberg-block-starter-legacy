<?php
/**
 * Contributors: TomodomoCo
 * Plugin Name: myblock
 * Plugin URI: https://www.myblock.com
 * Description: yourblock description
 * Author: author
 * Author URI: https://author.com
 * Version: 1.0.0
 * Text Domain: myblock
 * Domain Path: /languages
 * GitHub Plugin URI: https://github.com/TomodomoCo/myblock
 * Tags: gutenberg, block
 * Requires at least: 3.0.1
 * Tested up to:  4.9.4
 * Stable tag: 1.0.0
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package TomodomoCo_Myblock
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'TomodomoCo_Myblock' ) ) :
	/**
	 * TomodomoCo_Myblock Class.
	 *
	 * Main Class.
	 *
	 * @since 1.0.0
	 */
	class TomodomoCo_Myblock {
		/**
		 * Instance.
		 *
		 * @since
		 * @access private
		 * @var TomodomoCo_Myblock
		 */
		static private $instance;

		/**
		 * Singleton pattern.
		 *
		 * @since
		 * @access private
		 */
		private function __construct() {
			$this->setup_constants();
			$this->init_hooks();
		}

		/**
		 * Get instance.
		 *
		 * @since
		 * @access public
		 * @return TomodomoCo_Myblock
		 */
		public static function get_instance() {
			if ( null === static::$instance ) {
				self::$instance = new static();
			}

			return self::$instance;
		}

		/**
		 * Hook into actions and filters.
		 *
		 * @since  1.0.0
		 */
		private function init_hooks() {
			// Set up localization on init Hook.
			add_action( 'init', array( $this, 'load_textdomain' ), 0 );
			add_action( 'init', array( $this, 'register_myblock' ) );
		}

		/**
		 * Throw error on object clone
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object, therefore we don't want the object to be cloned.
		 *
		 * @since  1.0.0
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			myblock_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'myblock' ), '1.0' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			myblock_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'myblock' ), '1.0' );
		}

		/**
		 * Setup plugin constants
		 *
		 * @since  1.0.0
		 * @access private
		 *
		 * @return void
		 */
		private function setup_constants() {
			// Plugin version
			if ( ! defined( 'MYBLOCK_VERSION' ) ) {
				define( 'MYBLOCK_VERSION', '1.0.0' );
			}
			// Plugin Root File
			if ( ! defined( 'MYBLOCK_PLUGIN_FILE' ) ) {
				define( 'MYBLOCK_PLUGIN_FILE', __FILE__ );
			}
			// Plugin Folder Path
			if ( ! defined( 'MYBLOCK_PLUGIN_DIR' ) ) {
				define( 'MYBLOCK_PLUGIN_DIR', plugin_dir_path( MYBLOCK_PLUGIN_FILE ) );
			}
			// Plugin Folder URL
			if ( ! defined( 'MYBLOCK_PLUGIN_URL' ) ) {
				define( 'MYBLOCK_PLUGIN_URL', plugin_dir_url( MYBLOCK_PLUGIN_FILE ) );
			}
			// Plugin Basename aka: "myblock/myblock.php"
			if ( ! defined( 'MYBLOCK_PLUGIN_BASENAME' ) ) {
				define( 'MYBLOCK_PLUGIN_BASENAME', plugin_basename( MYBLOCK_PLUGIN_FILE ) );
			}
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return void
		 */
		public function load_textdomain() {
			$locale = apply_filters( 'plugin_locale', get_locale(), 'myblock' );
			// wp-content/languages/plugin-name/plugin-name-en_EN.mo.
			load_textdomain( 'myblock', trailingslashit( WP_LANG_DIR ) . 'myblock' . '/' . 'myblock' . '-' . $locale . '.mo' );
			// wp-content/plugins/plugin-name/languages/plugin-name-en_EN.mo.
			load_plugin_textdomain( 'myblock', false, basename( MYBLOCK_PLUGIN_DIR ) . '/languages/' );
		}

		/**
		 * Registers block (scripts/style)
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return void
		 */
		public function register_myblock() {

			// Bailout.
			if( ! function_exists('register_block_type' ) ) {
				return;
			}

			$block_js   = 'build/script.js';
			$block_css  = 'build/style.css';
			$editor_css = 'build/editor.css';

			// Block Script
			wp_register_script(
				'myblock-js',
				MYBLOCK_PLUGIN_URL . $block_js,
				array(
					'wp-i18n',
					'wp-blocks',
					'wp-element',
				),
				filemtime( MYBLOCK_PLUGIN_DIR . $block_js )
			);

			// Common Style
			wp_register_style(
				'myblock',
				MYBLOCK_PLUGIN_URL . $block_css,
				array(
					'wp-blocks',
				),
				filemtime( MYBLOCK_PLUGIN_DIR . $block_css )
			);

			// Editor Style
			wp_register_style(
				'myblock-editor',
				MYBLOCK_PLUGIN_URL . $editor_css,
				array(
					'wp-blocks',
				),
				filemtime( MYBLOCK_PLUGIN_DIR . $editor_css )
			);

			register_block_type( 'tomodomoco/myblock', array(
				'style' => 'myblock',
				'editor_style' => 'myblock-editor',
				'script' => 'myblock-js',
			) );
		}
	}

endif;

TomodomoCo_Myblock::get_instance();

