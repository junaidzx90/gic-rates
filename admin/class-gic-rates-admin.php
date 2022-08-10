<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Gic_Rates
 * @subpackage Gic_Rates/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gic_Rates
 * @subpackage Gic_Rates/admin
 * @author     Developer Junayed <admin@easeare.com>
 */
class Gic_Rates_Admin {

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
		 * defined in Gic_Rates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gic_Rates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gic-rates-admin.css', array(), $this->version, 'all' );
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
		 * defined in Gic_Rates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gic_Rates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gic-rates-admin.js', array( 'jquery' ), $this->version, false );

	}

	function admin_menu(){
		add_menu_page( "GIC Rates", "GIC Rates", "manage_options", "gic-rates", [$this, "gic_rates_menu"], "dashicons-info-outline", 45 );
		add_settings_section( 'gic_rates_setting_section', '', '', 'gic_rates_setting_page' );

		add_settings_field( 'gic_shortcode', 'Shortcode', [$this, 'gic_shortcode_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );

		add_settings_field( 'gic_title', 'Title', [$this, 'gic_title_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'gic_title' );

		add_settings_field( 'first_year_link', '1st Year Link', [$this, 'first_year_link_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'first_year_link' );

		add_settings_field( 'second_year_link', '2nd Year Link', [$this, 'second_year_link_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'second_year_link' );

		add_settings_field( 'third_year_link', '3rd Year Link', [$this, 'third_year_link_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'third_year_link' );

		add_settings_field( 'fourth_year_link', '4th Year Link', [$this, 'fourth_year_link_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'fourth_year_link' );

		add_settings_field( 'fifth_year_link', '5th Year Link', [$this, 'fifth_year_link_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'fifth_year_link' );

		add_settings_field( 'gic_background_color', 'Background color', [$this, 'gic_background_color_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'gic_background_color' );

		add_settings_field( 'gic_general_color', 'General Color', [$this, 'gic_general_color_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'gic_general_color' );

		add_settings_field( 'gic_secondary_color', 'Secondary Color', [$this, 'gic_secondary_color_cb'], 'gic_rates_setting_page','gic_rates_setting_section' );
		register_setting( 'gic_rates_setting_section', 'gic_secondary_color' );
	}

	function gic_rates_menu(){
		?>
		<h3>GIC Rates</h3>
		<hr>
		<div class="gic-rates-settings">
            <form style="width: 75%;" method="post" action="options.php">
                <?php
                settings_fields( 'gic_rates_setting_section' );
                do_settings_sections('gic_rates_setting_page');
                echo get_submit_button( 'Save Changes', 'secondary', 'save-setting' );
                ?>
            </form>
        </div>
		<?php
	}

	function gic_shortcode_cb(){
		echo '<input type="text" readonly value="[gic_rates]">';
	}

	function gic_title_cb(){
		echo '<input class="widefat" type="text" name="gic_title" placeholder="Today\'s Top GIC Rates" value="'.get_option('gic_title').'">';
	}
	function first_year_link_cb(){
		echo '<input class="widefat" type="url" name="first_year_link" value="'.get_option('first_year_link').'">';
	}
	function second_year_link_cb(){
		echo '<input class="widefat" type="url" name="second_year_link" value="'.get_option('second_year_link').'">';
	}
	function third_year_link_cb(){
		echo '<input class="widefat" type="url" name="third_year_link" value="'.get_option('third_year_link').'">';
	}
	function fourth_year_link_cb(){
		echo '<input class="widefat" type="url" name="fourth_year_link" value="'.get_option('fourth_year_link').'">';
	}
	function fifth_year_link_cb(){
		echo '<input class="widefat" type="url" name="fifth_year_link" value="'.get_option('fifth_year_link').'">';
	}

	function gic_background_color_cb(){
		echo '<input class="widefat" type="text" name="gic_background_color" id="gic_background_color" data-default-color="#022c46" value="'.((get_option('gic_background_color')) ? get_option('gic_background_color') : '#022c46').'">';
	}
	function gic_general_color_cb(){
		echo '<input class="widefat" type="text" name="gic_general_color" id="gic_general_color" data-default-color="#99cc33" value="'.((get_option('gic_general_color')) ? get_option('gic_general_color') : '#99cc33').'">';
	}
	function gic_secondary_color_cb(){
		echo '<input class="widefat" type="text" name="gic_secondary_color" id="gic_secondary_color" data-default-color="#ffffff" value="'.((get_option('gic_secondary_color')) ? get_option('gic_secondary_color') : '#ffffff').'">';
	}
}
