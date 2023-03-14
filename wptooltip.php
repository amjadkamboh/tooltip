<?php

/**
 * @link              https://https://www.linkedin.com/in/amjad-kamboh/
 * @since             1.0.0
 * @package           Wptooltip
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Tooltip - Shortcodes & Gutenberg
 * Plugin URI:        https://https://www.linkedin.com/in/amjad-kamboh/
 * Description:       A simple and easy way to add WordPress Tooltips to display informative text when users hover over an element in Gutenberg and the classic editor.
 * Version:           1.0.0
 * Author:            Amjad Kamboh
 * Author URI:        https://https://www.linkedin.com/in/amjad-kamboh/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wptooltip
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
define( 'WPTOOLTIP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wptooltip-activator.php
 */
function activate_wptooltip() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wptooltip-activator.php';
	Wptooltip_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wptooltip-deactivator.php
 */
function deactivate_wptooltip() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wptooltip-deactivator.php';
	Wptooltip_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wptooltip' );
register_deactivation_hook( __FILE__, 'deactivate_wptooltip' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wptooltip.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wptooltip() {

	$plugin = new Wptooltip();
	$plugin->run();

}
run_wptooltip();
