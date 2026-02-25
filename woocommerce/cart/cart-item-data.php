<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="eut-variation eut-align-center">
	<?php foreach ( $item_data as $data ) : ?>
		<div class="eut-small-text"><?php echo wp_kses_post( $data['key'] ); ?> : <?php echo wp_kses_post( $data['display'] ); ?></div>
		<div class="clear"></div>
	<?php endforeach; ?>
</div>
