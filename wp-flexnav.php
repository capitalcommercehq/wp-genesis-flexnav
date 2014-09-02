<?php
/**
 * WP Flexnav
 *
 * Based on Jason Weaver's Flexnav jQuery plugin: https://github.com/indyplanets/flexnav
 *
 * @package   WP_Flexnav
 * @author    Travis Northcutt <travis@brightagency.net>
 * @license   GPL-2.0+
 * @link      http://brightagency.net
 * @copyright 2014 The Bright Agency
 *
 * @wordpress-plugin
 * Plugin Name: WP Flexnav
 * Plugin URI:  https://github.com/tnorthcutt/wp-flexnav
 * Description: 
 * Version:     1.0.0
 * Author:      Travis Northcutt
 * Author URI:  http://brightagency.net/
 * Text Domain: wp-flexnav
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-wp-flexnav.php' );

// Register hooks that are fired when the plugin is activated or deactivated.
// When the plugin is deleted, the uninstall.php file is loaded.
register_activation_hook( __FILE__, array( 'WP_Flexnav', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Flexnav', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_Flexnav', 'get_instance' ) );
