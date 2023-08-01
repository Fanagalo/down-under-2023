<?php
/**
 * Functions for the basic WooCommerce implementation
 *
 * @package Carpress
 */


if ( is_woocommerce_active() ) {

	/**
	 * Theme compatibility
	 *
	 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



	/**
	 * Missing HTML markup before and after the shop items
	 */
	add_action('woocommerce_before_main_content', 'carpress_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'carpress_theme_wrapper_end', 10);

	function carpress_theme_wrapper_start() {
		get_template_part( 'titlearea' );

		?>

		<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="span3">
						<div class="left sidebar">
							<?php dynamic_sidebar( 'shop-sidebar' ); ?>
						</div>
					</div>
					<div class="span9">
		<?php
	}

	function carpress_theme_wrapper_end() {
		?>
					</div>
				</div><!-- / -->
			</div><!-- /container -->
		</div>
		<?php
	}


	// Display custom number of products per page
	function custom_number_of_products_per_page( $cols ) {
		return get_single_theme_mod( 'products_per_page', $cols );
	}
	add_filter( 'loop_shop_per_page', 'custom_number_of_products_per_page', 20 );

	// remove the title, because we show it elsewhere
	add_filter( 'woocommerce_show_page_title', '__return_false' );

	add_filter( 'woocommerce_get_sidebar', '__return_false' );

	/*
	 * Filter out the html in the add to cart message
	 * @param $message string
	 * @param $product_id int or array
	 */
	function carpress_custom_add_to_cart_message( $message, $product_id ) {
		$titles = array();

		if ( is_array( $product_id ) ) {
			foreach ( $product_id as $id ) {
				$titles[] = wp_strip_all_tags( get_the_title( $id ) );
			}
		} else {
			$titles[] = wp_strip_all_tags( get_the_title( $product_id ) );
		}

		$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'carpress_wp' ), wc_format_list_of_items( $titles ) );

		// Output success messages
		if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
			$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wp_get_referer() ? wp_get_referer() : home_url() );
			$message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue Shopping', 'carpress_wp' ), esc_html( $added_text ) );
		} else {
			$message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View Cart', 'carpress_wp' ), esc_html( $added_text ) );
		}

		return $message;
	}
	add_filter( 'wc_add_to_cart_message','carpress_custom_add_to_cart_message', 10, 2 );

}