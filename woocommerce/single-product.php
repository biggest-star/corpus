<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


//Add Single Product Hooks
add_action( 'eut_woocommerce_after_single_product_summary_meta', 'woocommerce_template_single_meta', 10 );
add_action( 'eut_woocommerce_after_single_product_summary_related_products', 'woocommerce_output_related_products', 10 );


get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>



	<div class="eut-single-wrapper">

		<div id="eut-related-products" class="eut-singular-section eut-bookmark clearfix">
			<div class="eut-container eut-padding-top-md eut-padding-bottom-md eut-border eut-border-top">
				<div class="eut-wrapper">

					<?php
						/**
						 * eut_woocommerce_after_single_product_summary_related_products hook
						 *
						 * @hooked woocommerce_output_related_products - 10 (outputs related products)
						 */
						do_action( 'eut_woocommerce_after_single_product_summary_related_products' );
					?>

				</div>
			</div>
		</div>
	</div>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
