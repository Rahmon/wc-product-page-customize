<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Rahmon
 * @since      1.0.0
 *
 * @package    Wc_Product_Page_Customize
 * @subpackage Wc_Product_Page_Customize/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Product_Page_Customize
 * @subpackage Wc_Product_Page_Customize/admin
 * @author     Rahmohn <https://github.com/Rahmon>
 */
class Wc_Product_Page_Customize_Admin {

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
	 * The text-domain of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $text_domain    The text-domain of this plugin.
	 */
	private $text_domain;

	/**
	 * The options name of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $text_domain    The text-domain of this plugin.
	 */
	private $option_name = 'wc_product_page_customize_settings';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $text_domain ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->text_domain = $text_domain;

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
		 * defined in Wc_Product_Page_Customize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Product_Page_Customize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-product-page-customize-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wc_Product_Page_Customize_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Product_Page_Customize_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-product-page-customize-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an option page
	 *
	 * @since 1.0.0
	 */
	public function register_settings_page() {

		 add_submenu_page( 'edit.php?post_type=product', __( 'Product Page Customize', $this->text_domain ), __( 'Product Page Customize', $this->text_domain ), 'manage_options', 'wc-product-page-customize', array( $this, 'display_settings_page' ) );

	}

	 /**
 * Display the settings page content for the page we have created.
 *
 * @since    1.0.0
 */
	public function display_settings_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wc-product-page-customize-admin-display.php';

	}

	/**
	 * Add an option page
	 *
	 * @since 1.0.0
	 */
	public function register_settings() {
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', $this->text_domain ),
			array( $this, $this->option_name . '_general' ),
			$this->plugin_name
		);

		add_settings_field(
			$this->option_name . '_title',
			__( 'Title', $this->text_domain ),
			array( $this, $this->option_name . '_title' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array(
				'label_for' => $this->option_name . '_title'
			)
		);

		register_setting( $this->plugin_name, $this->option_name . '_title', 'strval' );
	}
	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function wc_product_page_customize_settings_general() {
		echo '<p>' . __( 'Please change the settings accordingly.', $this->text_domain ) . '</p>';
	}

	/**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function wc_product_page_customize_settings_title() {
		echo '<input type="text" name="' . $this->option_name . '_title' . '" id="' . $this->option_name . '_title' . '">';
	}

}
