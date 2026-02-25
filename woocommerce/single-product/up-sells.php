<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( version_compare( WC_VERSION, '3.0', '<' ) ) {

	$upsells = $product->get_upsells();

	if ( sizeof( $upsells ) === 0 ) {
		return;
	}

	$meta_query = WC()->query->get_meta_query();

	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product->id ),
		'meta_query'          => $meta_query
	);

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<div class="upsells products eut-border eut-border-top">

			<h5><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h5>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>

	<?php endif;
} else {

	if ( $upsells ) : ?>

		<div class="upsells products eut-border eut-border-top">

			<h5><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h5>

			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $upsells as $upsell ) : ?>

					<?php
						$post_object = get_post( $upsell->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'product' ); ?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>

	<?php endif;
}

wp_reset_postdata();

//Omit closing PHP tag to avoid accidental whitespace output errors.

