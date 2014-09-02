<?php
/**
 * Plugin Name.
 *
 * @package   WP_Genesis_Flexnav
 * @author    Travis Northcutt <travis@brightagency.net>
 * @license   GPL-2.0+
 * @link      http://brightagency.net
 * @copyright 2013 The Bright Agency
 */

/**
 * Plugin class.
 *
 *
 * @package WP_Genesis_Flexnav
 * @author  Travis Northcutt <travis@brightagency.net>
 */
class WP_Genesis_Flexnav {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'wp-genesis-flexnav';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'genesis_header', array( $this, 'wp_genesis_flexnav_menu_toggle' ), 9 );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'css/wp-genesis-flexnav.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'js/wp-genesis-flexnav.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		wp_enqueue_script( 'flexnav', plugins_url( 'js/jquery.flexnav.min.js', __FILE__ ), array('jquery'), self::VERSION );
	}

	public function wp_genesis_flexnav_menu_toggle() {
		echo '<div class="menu-toggle"><div class="menu-button">&#8801;</div></div>';
	}

}
