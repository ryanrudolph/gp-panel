<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://getphound.com
 * @since             1.0.0
 * @package           Gp_Panel
 *
 * @wordpress-plugin
 * Plugin Name:       GetPhound Panel
 * Plugin URI:        https://getphound.com
 * Description:       Internal plugin for restricting priviledges and adding GetPhound branding.
 * Version:           1.0.0
 * Author:            Ryan Rudolph
 * Author URI:        https://getphound.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gp-panel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gp-panel-activator.php
 */
function activate_gp_panel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gp-panel-activator.php';
	Gp_Panel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gp-panel-deactivator.php
 */
function deactivate_gp_panel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gp-panel-deactivator.php';
	Gp_Panel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gp_panel' );
register_deactivation_hook( __FILE__, 'deactivate_gp_panel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gp-panel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gp_panel() {

	$plugin = new Gp_Panel();
	$plugin->run();

}
run_gp_panel();
