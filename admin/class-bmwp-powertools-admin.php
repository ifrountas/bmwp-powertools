<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bakemywp.com/
 * @since      1.0.0
 *
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bmwp_Powertools
 * @subpackage Bmwp_Powertools/admin
 * @author     Bake My WP Team <hello@bakemywp.com>
 */
class Bmwp_Powertools_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_bar_menu', array( $this, 'noindex_adminbar_notification' ), 100 );
		add_action( 'admin_bar_menu', array( $this, 'remove_adminbar_search' ), 10000 );

	}

	/**
	 * Register the stylesheets for the admin area.
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
			array('id'=> 'bmwp-powertools-public',  'path'=> 'assets/css/bmwp-powertools-admin.css', 'loads'=> true ),
			array('id'=> 'bmwp-powertools-index',   'path'=> 'assets/css/bmwp-powertools-index.css', 'loads'=> is_user_logged_in() && is_admin_bar_showing() ),
		);
		 
		foreach ( $csss as $css ) {
			if ( $css['loads'] === true ) {
				wp_enqueue_style( $css['id'], plugin_dir_url( __FILE__ ) . $css['path'], array(), filemtime( plugin_dir_path( __FILE__ ) . $css['path'] ), 'all' );
			}
		}

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/bmwp-powertools-admin.js', array( 'jquery' ), $this->version, false );

	}



	public function noindex_adminbar_notification($wp_admin_bar) {

		if (!is_admin_bar_showing()) {
			return; // Exit if the admin bar is not showing
		}

		if (get_option('blog_public') === '0') {
			$args = array(
				'id' => 'noindex-alert',
				'title' => 'noindex',
				'href' => admin_url('options-reading.php'),
				'meta' => array(
					'class' => 'noindex-alert-item '
				),
				'parent' => 'top-secondary', // Place it under the top-secondary menu
				'priority' => 1 // High priority to ensure it appears at the top
			);
			$wp_admin_bar->add_node($args);
		}
	}


	public function remove_adminbar_search($wp_admin_bar) {
		$wp_admin_bar->remove_node('search');
	}

}