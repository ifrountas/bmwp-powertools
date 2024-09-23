<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bakemywp.com/
 * @since      1.0.0
 *
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/public
 * @author     Bake My WP Team <hello@bakemywp.com>
 */
class Bmwp_Powertools_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bmwp_Powertools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bmwp_Powertools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$csss = array(
			array('id'=> 'bmwp-powertools-public',  'path'=> '/public/assets/css/bmwp-powertools-public.css', 'loads'=> true ),
			array('id'=> 'bmwp-powertools-index',   'path'=> '/admin/assets/css/bmwp-powertools-index.css', 'loads'=> is_user_logged_in() && is_admin_bar_showing() ),
		);

		foreach ( $csss as $css ) {
			if ( $css['loads'] === true ) {
				wp_enqueue_style( $css['id'], plugins_url( $this->plugin_name . $css['path'] ), array(), filemtime( plugin_dir_path( dirname(__FILE__) ) . $css['path'] ), 'all' );
			}
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bmwp_Powertools_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bmwp_Powertools_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/bmwp-powertools-public.js', array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/bmwp-powertools-public.js' ), false );

	}

}
