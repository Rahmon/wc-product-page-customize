<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Rahmon
 * @since      1.0.0
 *
 * @package    Wc_Product_Page_Customize
 * @subpackage Wc_Product_Page_Customize/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Product_Page_Customize
 * @subpackage Wc_Product_Page_Customize/public
 * @author     Rahmohn <https://github.com/Rahmon>
 */
class Wc_Product_Page_Customize_Public {

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
	 * @param      string    $text_domain    The text-domain of this plugin.
	 */
	public function __construct( $plugin_name, $version, $text_domain ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->text_domain = $text_domain;

	}

	public function customize_product_page() {
		/**
		 * woocommerce_single_product_summary hook.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		 $new_title_priority = get_option( 'wc_product_page_customize_settings_title' );
		 $new_rating_priority = get_option( 'wc_product_page_customize_settings_rating' );
		 $new_price_priority = get_option( 'wc_product_page_customize_settings_price' );
		 $new_excerpt_priority = get_option( 'wc_product_page_customize_settings_excerpt' );
		 $new_single_add_to_cart_priority = get_option( 'wc_product_page_customize_settings_add_to_cart' );
		 $new_meta_priority = get_option( 'wc_product_page_customize_settings_meta' );
		 $new_sharing_priority = get_option( 'wc_product_page_customize_settings_sharing' );

		 $itens = array(
			 array(
				 'name' => 'woocommerce_template_single_title',
				 'default_priority' => 5,
				 'new_priority' => $new_title_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_rating',
				 'default_priority' => 10,
				 'new_priority' => $new_rating_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_price',
				 'default_priority' => 10,
				 'new_priority' => $new_price_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_excerpt',
				 'default_priority' => 20,
				 'new_priority' => $new_excerpt_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_add_to_cart',
				 'default_priority' => 30,
				 'new_priority' => $new_single_add_to_cart_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_meta',
				 'default_priority' => 40,
				 'new_priority' => $new_meta_priority,
			 ),
			 array(
				 'name' => 'woocommerce_template_single_sharing',
				 'default_priority' => 50,
				 'new_priority' => $new_sharing_priority,
			 ),
		 );

		foreach ( $itens as $item ) {
			$name = $item['name'];
			$default_priority = $item['default_priority'];
			$new_priority = $item['new_priority'];

			if ( $default_priority !== $new_priority ) {
				remove_action( 'woocommerce_single_product_summary', $name, $default_priority );
				add_action( 'woocommerce_single_product_summary', $name, $new_priority );
			}
		}
	}

}
