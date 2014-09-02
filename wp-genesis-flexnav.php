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
 * Version:     0.1
 * Author:      Travis Northcutt
 * Author URI:  http://brightagency.net/
 * Text Domain: wp-genesis-flexnav
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * GitHub Plugin URI: https://github.com/tnorthcutt/wp-genesis-flexnav
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-wp-genesis-flexnav.php' );

// Register hooks that are fired when the plugin is activated or deactivated.
// When the plugin is deleted, the uninstall.php file is loaded.
register_activation_hook( __FILE__, array( 'WP_Genesis_Flexnav', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Genesis_Flexnav', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_Genesis_Flexnav', 'get_instance' ) );
