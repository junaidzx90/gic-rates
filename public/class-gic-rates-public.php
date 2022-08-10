<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Gic_Rates
 * @subpackage Gic_Rates/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gic_Rates
 * @subpackage Gic_Rates/public
 * @author     Developer Junayed <admin@easeare.com>
 */
class Gic_Rates_Public {

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

		add_shortcode( "gic_rates", [$this, "gic_rates_callback"] );
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
		 * defined in Gic_Rates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gic_Rates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gic-rates-public.css', array(), $this->version, 'all' );

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
		 * defined in Gic_Rates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gic_Rates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gic-rates-public.js', array( 'jquery' ), $this->version, false );

	}

	function head(){
		?>
		<style>
			:root{
				--gicbg: <?php echo ((get_option('gic_background_color')) ? get_option('gic_background_color') : '#022c46') ?>;
				--gicgeneral: <?php echo ((get_option('gic_general_color')) ? get_option('gic_general_color') : '#99cc33') ?>;
				--gicsecondary: <?php echo ((get_option('gic_secondary_color')) ? get_option('gic_secondary_color') : '#ffffff') ?>;
			}
		</style>
		<?php
	}

	function gic_rates_callback(){
		ob_start();
		require_once plugin_dir_path( __FILE__ )."partials/gic-rates-public-display.php";
		return ob_get_clean();
	}
}
