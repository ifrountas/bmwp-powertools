<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bakemywp.com/
 * @since             1.0.0
 * @package           Bmwp_Powertools
 *
 * @wordpress-plugin
 * Plugin Name:       Bake My WP PowerTools
 * Plugin URI:        https://bakemywp.com/powertools/
 * Description:       Delivers essential tweaks and fixes to optimize your WordPress dashboard for a smoother workflow and enhanced performance. Exclusively available to our premium clients.
 * Version:           1.0.1
 * Author:            Bake My WP Team
 * Author URI:        https://bakemywp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bmwp-powertools
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
define( 'BMWP_POWERTOOLS_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bmwp-powertools-activator.php
 */
function activate_bmwp_powertools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bmwp-powertools-activator.php';
	Bmwp_Powertools_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bmwp-powertools-deactivator.php
 */
function deactivate_bmwp_powertools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bmwp-powertools-deactivator.php';
	Bmwp_Powertools_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bmwp_powertools' );
register_deactivation_hook( __FILE__, 'deactivate_bmwp_powertools' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bmwp-powertools.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bmwp_powertools() {

	$plugin = new Bmwp_Powertools();
	$plugin->run();

}
run_bmwp_powertools();
