<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

//Remove Actions
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' , 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' , 5 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );



?>
<?php if ( function_exists( 'wc_product_class' ) ) { ?>
<li <?php wc_product_class(); ?>>
<?php } else { ?>
<li <?php post_class(); ?>>
<?php }  ?>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="eut-product-item">

		<a href="<?php the_permalink(); ?>">
			<figure class="eut-image-hover eut-zoom-none eut-light">
				<div class="eut-media eut-light-overlay eut-opacity-70">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );

						/**
						 * woocommerce_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */
						do_action( 'woocommerce_shop_loop_item_title' );

						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</div>
			</figure>
		</a>
		<figcaption>
			<?php woocommerce_template_loop_product_title(); ?>
			<span class="eut-subtitle eut-caption"><?php woocommerce_template_loop_price(); ?></span>
			<div class="eut-add-to-cart-btn eut-small-text"><?php woocommerce_template_loop_add_to_cart(); ?><i class="eut-added-icon eut-icon-shop"></i></div>
		</figcaption>
	</div>
	<?php

		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );

	?>

</li>
