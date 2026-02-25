<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$product_get_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="eut-single-post-meta sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="eut-h6 sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<div class="eut-single-post-meta eut-categories">
	 <?php
			echo '<ul class="eut-small-text">';
			if ( function_exists( 'wc_get_product_category_list' ) ) {
				echo wc_get_product_category_list( $product_get_id, '</li><li>', '<li>', '</li>' );
			} else {
				echo wp_kses_post( $product->get_categories( '</li><li>', '<li>', '</li>' ) );
			}
			echo '</ul>';

	?>
	</div>
	<div class="eut-single-post-meta eut-tags">
	 <?php
			echo '<ul class="eut-small-text">';
			if ( function_exists( 'wc_get_product_tag_list' ) ) {
				echo wc_get_product_tag_list ( $product_get_id,'</li><li>','<li>', '</li>' );
			} else {
				echo wp_kses_post( $product->get_tags( '</li><li>', '<li>', '</li>' ) );
			}
			echo '</ul>';
	?>
	</div>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
