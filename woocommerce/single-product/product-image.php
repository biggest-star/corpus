<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 10);

$product_gallery_classes = array( 'eut-product-images', 'images' );
if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
	$lighbox_enabled = get_option( 'woocommerce_enable_lightbox', '' );
} else {
	$lighbox_enabled = 'no';
}

if ( 'yes' != $lighbox_enabled && 'popup' == eut_option( 'product_gallery_mode', 'popup' ) ) {
	$product_gallery_classes[] = 'eut-gallery-popup';
}
$product_gallery_class_string = implode( ' ', $product_gallery_classes );

if ( version_compare( WC_VERSION, '3.3', '<' ) ) {
	$shop_single_size = 'shop_single' ;
} else {
	$shop_single_size = 'woocommerce_single' ;
}

?>
<div class="<?php echo esc_attr( $product_gallery_class_string ); ?>">
	<div class="eut-product-image woocommerce-product-gallery__image">
	<?php
		if ( has_post_thumbnail() ) {

			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', $shop_single_size ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			if ( method_exists( $product, 'get_gallery_image_ids' ) ) {
				$attachment_ids = $product->get_gallery_image_ids();
			} else {
				$attachment_ids = $product->get_gallery_attachment_ids();
			}
			$attachment_count = count( $attachment_ids );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_attr__( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	?>
	</div>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
