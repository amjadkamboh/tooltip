<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://www.linkedin.com/in/amjad-kamboh/
 * @since      1.0.0
 *
 * @package    Wptooltip
 * @subpackage Wptooltip/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wptooltip
 * @subpackage Wptooltip/includes
 * @author     Amjad Kamboh <amjadkambohwp@gmail.com>
 */
class Wptooltip_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wptooltip',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
