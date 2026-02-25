<?php
/**
 *  Dynamic css style for WooCommerce
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */

$css = "";

/* Text Color */
$css .= "

.eut-single-price del .amount,
.woocommerce ul.products li.product .price,
.eut-product-item .eut-add-to-cart-btn a.eut-product-btn:hover,
.eut-single-post-meta.eut-categories ul li a,
.eut-review-link,
.eut-woo-tabs ul.tabs li a {
	color: " . eut_option( 'body_text_color' ) . ";
}

";

/* Heading Color */
$css .= "

.eut-single-post-meta.eut-tags ul li a:hover,
.eut-single-post-meta.eut-categories ul li a:hover,
.eut-review-link:hover,
a.eut-reset-var:hover  {
	color: " . eut_option( 'body_heading_color' ) . ";
}

";

/* Primary 1 Color */
$css .= "

.eut-single-price .amount,
.woocommerce form .form-row .required,
.eut-product-item .eut-add-to-cart-btn a.eut-product-btn,
.eut-woo-tabs ul.tabs li.active a,
.woocommerce a.added_to_cart,
a.eut-reset-var,
.woocommerce .star-rating span:before,
.stars a:after,
.woocommerce-MyAccount-navigation ul li a:hover {
	color: " . eut_option( 'body_primary_1_color' ) . ";
}

";

/* Border Color */
$css .= "

.eut-entry-summary .eut-description p,
.woocommerce div.product .woocommerce-product-rating,
.eut-single-post-meta.eut-categories ul li,
.eut-add-to-cart-btn,
.widget.woocommerce.widget_product_categories ul li a,
.woocommerce-MyAccount-navigation ul li {
	border-color: " . eut_option( 'body_border_color' ) . ";
}

";

/* Primary Bg */
$css .= "
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: " . eut_option( 'body_primary_1_color' ) . ";
}

";


/* No Product Icon */
$css .= "

#eut-bag path {
	fill: " . eut_option( 'body_heading_color' ) . ";
}

#eut-empty path {
	fill: " . eut_option( 'body_primary_1_color' ) . ";
}

";


echo eut_get_css_output( $css );

//Omit closing PHP tag to avoid accidental whitespace output errors.
