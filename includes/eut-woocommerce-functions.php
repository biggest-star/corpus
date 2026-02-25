<?php

/*
*	Woocommerce helper functions and configuration
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Helper function to check if woocommerce is enabled
 */
function corpus_eutf_woo_enabled() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}

function corpus_eutf_is_woo_shop() {
	if ( corpus_eutf_woo_enabled() && is_shop() && !is_search() ) {
		return true;
	}
	return false;
}

function corpus_eutf_is_woo_tax() {
	if ( corpus_eutf_woo_enabled() && is_product_taxonomy() ) {
		return true;
	}
	return false;
}

function corpus_eutf_is_woo_category() {
	if ( corpus_eutf_woo_enabled() && is_product_category() ) {
		return true;
	}
	return false;
}

//If woocomerce plugin is not enabled return
if ( !corpus_eutf_woo_enabled() ) {
	return false;
}

//Add Theme support for woocommerce
add_theme_support( 'woocommerce' );

/**
 * Helper function to get shop custom fields with fallback
 */
function corpus_eutf_post_meta_shop( $id, $fallback = false ) {
	$post_id = wc_get_page_id( 'shop' );
	if ( $fallback == false ) $fallback = '';
	$post_meta = get_post_meta( $post_id, $id, true );
	$output = ( $post_meta !== '' ) ? $post_meta : $fallback;
	return $output;
}

/**
 * Helper function to notify about Shop Pages in Admin Pages
 */
function corpus_eutf_woo_admin_notice() {
	global $post;

	$woo_page_found = false;
	$notify_out = '';

	$woo_page_ids = array(
		'shop' => wc_get_page_id( 'shop' ),
		'cart' => wc_get_page_id( 'cart' ),
		'checkout' => wc_get_page_id( 'checkout' ),
		'myaccount' => wc_get_page_id( 'myaccount' ),
	);

	if ( isset( $post->ID ) ) {
		$current_page_id = $post->ID;
		$woo_page_found = in_array( $current_page_id, $woo_page_ids );
	}

	if ( $woo_page_found  ) {
		$notify_out .= '<div class="updated">';
		$notify_out .= '  <p>';

		if ( $current_page_id == $woo_page_ids['shop'] ) {
			$notify_out .= esc_html__( 'This page is assigned from WooCommerce: Product Archive / Shop Page', 'corpus' );
		} else if ( $current_page_id == $woo_page_ids['cart'] ) {
			$notify_out .= esc_html__( 'This page is assigned from WooCommerce: Cart Page', 'corpus' );
		} else if ( $current_page_id == $woo_page_ids['checkout'] ) {
			$notify_out .= esc_html__( 'This page is assigned from WooCommerce: Checkout Page', 'corpus' );
		} else if ( $current_page_id == $woo_page_ids['myaccount'] ) {
			$notify_out .= esc_html__( 'This page is assigned from WooCommerce: My Account Page', 'corpus' );
		}

		$notify_out .= '  </p>';
		$notify_out .= '</div>';
	}

	echo wp_kses_post( $notify_out );
}
add_action( 'admin_notices', 'corpus_eutf_woo_admin_notice' );


/**
 * Function to add before main woocommerce content
 */
function corpus_eutf_woo_before_main_content() {

?>
	<div id="eut-main-content">
		<div class="eut-container <?php echo eut_sidebar_class( 'shop' ); ?>">
			<div id="eut-content-area">
<?php
}

/**
 * Function to add after main woocommerce content
 */
function corpus_eutf_woo_after_main_content() {
?>
			</div>
			<?php eut_set_current_view( 'shop' ); ?>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
}

function corpus_eutf_woo_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
?>
	<span class="eut-purchased-items"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
<?php
	$fragments['span.eut-purchased-items'] = ob_get_clean();

	return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'corpus_eutf_woo_header_add_to_cart_fragment');

/**
 * Functions to add content wrapper
 */
function corpus_eutf_woo_before_container() {
?>
	<div class="eut-container">
<?php
}
function corpus_eutf_woo_after_container() {
?>
	</div>
<?php
}

function corpus_eutf_woo_add_to_cart_class( $product ) {

	$product_get_type = method_exists( $product, 'get_type' ) ? $product->get_type() : $product->product_type;
	return implode( ' ', array_filter( array(
			'eut-product-btn',
			'product_type_' . $product_get_type,
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
	) ) );

}

function corpus_eutf_woo_loop_add_to_cart_args( $args, $product ) {

	$ajax_add = '';
	if ( method_exists( 'WC_Product', 'supports' ) ) {
		$ajax_add = $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '';
	}
	$product_get_type = method_exists( $product, 'get_type' ) ? $product->get_type() : $product->product_type;
	$args['class'] = implode( ' ', array_filter( array(
			'eut-product-btn',
			'product_type_' . $product_get_type,
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$ajax_add
	) ) );
	return $args;

}
add_filter( 'woocommerce_loop_add_to_cart_args', 'corpus_eutf_woo_loop_add_to_cart_args', 10, 2 );


/**
 * Helper function for Product Search
 */
function corpus_eutf_woo_product_search( $form ) {
	$new_custom_id = uniqid( 'corpus-eutf-product-search-' );
	$form =  '<form class="eut-search" method="get" action="' . esc_url( home_url( '/' ) ) . '" >';
	$form .= '  <button type="submit" class="eut-search-btn"><i class="fa fa-search"></i></button>';
	$form .= '  <input type="text" class="eut-search-textfield" id="' . esc_attr( $new_custom_id ) . '" value="' . get_search_query() . '" name="s" placeholder="' . esc_attr__( 'Search for ...', 'corpus' ) . '" autocomplete="off"/>';
	$form .= '  <input type="hidden" name="post_type" value="product" />';
	$form .= '</form>';
	return $form;
}


/**
 * WooCommerce loop actions and filters
 */
function corpus_eutf_woo_loop_columns( $columns ) {
	$columns = eut_option( 'product_loop_columns', '4' );
	return $columns;
}
add_filter('loop_shop_columns', 'corpus_eutf_woo_loop_columns');


function corpus_eutf_woo_loop_shop_per_page( $items ) {
	$items = eut_option( 'product_loop_shop_per_page', '12' );
	return $items;
}
add_filter( 'loop_shop_per_page', 'corpus_eutf_woo_loop_shop_per_page', 20 );


function corpus_eutf_woo_before_shop_loop() {
	$columns = eut_option( 'product_loop_columns', '4' );
	echo '<div class="woocommerce columns-' . esc_attr( $columns ) . '">';
}
add_action( 'woocommerce_before_shop_loop', 'corpus_eutf_woo_before_shop_loop', 99 );

function corpus_eutf_woo_after_shop_loop() {
	echo '</div>';
}
add_action( 'woocommerce_after_shop_loop', 'corpus_eutf_woo_after_shop_loop', 5 );

/**
 * Unhook WooCommerce actions
 */

add_filter( 'get_product_search_form', 'corpus_eutf_woo_product_search' );

//Remove Content Wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);


/**
 * Overwrite the WooCommerce actions and filters
 */
add_action('woocommerce_before_main_content', 'corpus_eutf_woo_before_main_content', 10);
add_action('woocommerce_after_main_content', 'corpus_eutf_woo_after_main_content', 10);


//Omit closing PHP tag to avoid accidental whitespace output errors.
