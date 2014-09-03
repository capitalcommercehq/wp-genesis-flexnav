<?php
/**
 * WP Genesis Flexnav
 *
 * Based on Jason Weaver's Flexnav jQuery plugin: https://github.com/indyplanets/flexnav
 *
 * @package   WP_Genesis_Flexnav
 * @author    Travis Northcutt <travis@brightagency.net>
 * @license   GPL-2.0+
 * @link      http://brightagency.net
 * @copyright 2014 The Bright Agency
 *
 * @wordpress-plugin
 * Plugin Name: WP Genesis Flexnav
 * Plugin URI:  https://github.com/tnorthcutt/wp-genesis-flexnav
 * Description: 
 * Version:     0.1.1
 * Author:      Travis Northcutt
 * Author URI:  http://brightagency.net/
 * Text Domain: wp-genesis-flexnav
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * GitHub Plugin URI: https://github.com/tnorthcutt/wp-genesis-flexnav
 * GitHub Branch:     master
 */

$wp_genesis_flexnav = new WP_Genesis_Flexnav;

class WP_Genesis_Flexnav {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   0.1.1
	 *
	 * @var     string
	 */
	const VERSION = '0.1.1';

	/**
	 * Initialize the plugin
	 *
	 * @since     0.1.1
	 */
	public function __construct() {

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'genesis_header', array( $this, 'wp_genesis_flexnav_menu_button' ), 9 );
		add_filter( 'wp_nav_menu_args', array( $this, 'flexnav_menu_args' ) );

	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    0.1.1
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'css/wp-genesis-flexnav.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    0.1.1
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'js/wp-genesis-flexnav.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		wp_enqueue_script( 'flexnav', plugins_url( 'js/jquery.flexnav.min.js', __FILE__ ), array('jquery'), self::VERSION );
	}

	public function wp_genesis_flexnav_menu_button() {
		echo '<div class="menu-button"></div>';
	}

	function flexnav_menu_args( $args ) {
		if( 'primary' == $args['theme_location'] ) {
			$args['menu_class'] .= ' flexnav';
		}
		return $args;
	}


}
