<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/Rahmon
 * @since      1.0.0
 *
 * @package    Wc_Product_Page_Customize
 * @subpackage Wc_Product_Page_Customize/admin/partials
 */

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
?>

<div class="wrap">
	    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	    <form action="options.php" method="post">
	        <?php
	            settings_fields( $this->plugin_name );
	            do_settings_sections( $this->plugin_name );
	            submit_button();
	        ?>
	    </form>
	</div>
