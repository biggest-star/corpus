<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<div class="eut-woo-message eut-bg-green" role="alert"><?php echo wp_kses_post( $message ); ?></div>
<?php endforeach;
	
//Omit closing PHP tag to avoid accidental whitespace output errors.
