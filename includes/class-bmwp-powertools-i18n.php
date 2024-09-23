<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bakemywp.com/
 * @since      1.0.0
 *
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/includes
 * @author     Bake My WP Team <hello@bakemywp.com>
 */
class Bmwp_Powertools_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bmwp-powertools',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
