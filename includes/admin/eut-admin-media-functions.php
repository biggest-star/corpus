<?php
/*
*	Collection of functions for the media items
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

$eut_media_align_selection = array(
	'left' => __( 'Left', 'corpus' ),
	'right' => __( 'Right', 'corpus' ),
	'center' => __( 'Center', 'corpus' ),
);

$eut_media_color_selection = array(
	'dark' => __( 'Dark', 'corpus' ),
	'light' => __( 'Light', 'corpus' ),
	'primary-1' => __( 'Primary 1', 'corpus' ),
	'primary-2' => __( 'Primary 2', 'corpus' ),
	'primary-3' => __( 'Primary 3', 'corpus' ),
	'primary-4' => __( 'Primary 4', 'corpus' ),
	'primary-5' => __( 'Primary 5', 'corpus' ),
);

$eut_media_header_style_selection = array(
	'default' => __( 'Default', 'corpus' ),
	'dark' => __( 'Dark', 'corpus' ),
	'light' => __( 'Light', 'corpus' ),
);

$eut_media_color_overlay_selection = array(
	'' => __( 'None', 'corpus' ),
	'dark' => __( 'Dark', 'corpus' ),
	'light' => __( 'Light', 'corpus' ),
	'primary-1' => __( 'Primary 1', 'corpus' ),
	'primary-2' => __( 'Primary 2', 'corpus' ),
	'primary-3' => __( 'Primary 3', 'corpus' ),
	'primary-4' => __( 'Primary 4', 'corpus' ),
	'primary-5' => __( 'Primary 5', 'corpus' ),
);

$eut_media_style_selection = array(
	'default' => __( 'Default', 'corpus' ),
	'1' => __( 'Style 1', 'corpus' ),
	'2' => __( 'Style 2', 'corpus' ),
	'3' => __( 'Style 3', 'corpus' ),
	'4' => __( 'Style 4', 'corpus' ),
);

$eut_media_pattern_overlay_selection = array(
	'' => __( 'No', 'corpus' ),
	'default' => __( 'Yes', 'corpus' ),
);

$eut_media_text_animation_selection = array(
	'fade-in' => __( 'Default', 'corpus' ),
	'fade-in-up' => __( 'Fade In Up', 'corpus' ),
	'fade-in-down' => __( 'Fade In Down', 'corpus' ),
	'fade-in-left' => __( 'Fade In Left', 'corpus' ),
	'fade-in-right' => __( 'Fade In Right', 'corpus' ),
);

$eut_media_button_color_selection = array(
	'primary-1' => __( 'Primary 1', 'corpus' ),
	'primary-2' => __( 'Primary 2', 'corpus' ),
	'primary-3' => __( 'Primary 3', 'corpus' ),
	'primary-4' => __( 'Primary 4', 'corpus' ),
	'primary-5' => __( 'Primary 5', 'corpus' ),
	'green' => __( 'Green', 'corpus' ),
	'orange' => __( 'Orange', 'corpus' ),
	'red' => __( 'Red', 'corpus' ),
	'blue' => __( 'Blue', 'corpus' ),
	'aqua' => __( 'Aqua', 'corpus' ),
	'purple' => __( 'Purple', 'corpus' ),
	'black' => __( 'Black', 'corpus' ),
	'grey' => __( 'Grey', 'corpus' ),
	'white' => __( 'White', 'corpus' ),
);

$eut_media_button_size_selection = array(
	'extrasmall' => __( 'Extra Small', 'corpus' ),
	'small' => __( 'Small', 'corpus' ),
	'medium' => __( 'Medium', 'corpus' ),
	'large' => __( 'Large', 'corpus' ),
	'extralarge' => __( 'Extra Large', 'corpus' ),
);

$eut_media_button_shape_selection = array(
	'square' => __( 'Square', 'corpus' ),
	'round' => __( 'Round', 'corpus' ),
	'extra-round' => __( 'Extra Round', 'corpus' ),
);

$eut_media_button_type_selection = array(
	'' => __( 'Default', 'corpus' ),
	'outline' => __( 'Outline', 'corpus' ),
);

$eut_media_button_target_selection = array(
	'_self' => __( 'Same Page', 'corpus' ),
	'_blank' => __( 'New page', 'corpus' ),
);

$eut_media_bg_position_selection = array(
	'left-top' => __( 'Left Top', 'corpus' ),
	'left-center' => __( 'Left Center', 'corpus' ),
	'left-bottom' => __( 'Left Bottom', 'corpus' ),
	'center-top' => __( 'Center Top', 'corpus' ),
	'center-center' => __( 'Center Center', 'corpus' ),
	'center-bottom' => __( 'Center Bottom', 'corpus' ),
	'right-top' => __( 'Right Top', 'corpus' ),
	'right-center' => __( 'Right Center', 'corpus' ),
	'right-bottom' => __( 'Right Bottom', 'corpus' ),
);

$eut_media_bg_effect_selection = array(
	'none' => __( 'None', 'corpus' ),
	'zoom' => __( 'Zoom', 'corpus' ),
);

$eut_media_tag_selection = array(
	'div' => __( 'div', 'corpus' ),
	'h1' => __( 'h1', 'corpus' ),
	'h2' => __( 'h2', 'corpus' ),
	'h3' => __( 'h3', 'corpus' ),
	'h4' => __( 'h4', 'corpus' ),
	'h5' => __( 'h5', 'corpus' ),
	'h6' => __( 'h6', 'corpus' ),
);


/**
 * Print Media Selector Functions
 */
function eut_print_media_options( $selector_array, $current_value = "" ) {

	foreach ( $selector_array as $value=>$display_value ) {
	?>
		<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_value, $value ); ?>><?php echo esc_html( $display_value ); ?></option>
	<?php
	}

}

function eut_print_media_tag_selection( $current_value = "" ) {
	global $eut_media_tag_selection;
	eut_print_media_options( $eut_media_tag_selection, $current_value );
}

function eut_print_media_button_color_selection( $current_value = "" ) {
	global $eut_media_button_color_selection;
	eut_print_media_options( $eut_media_button_color_selection, $current_value );
}
function eut_print_media_button_size_selection( $current_value = "" ) {
	global $eut_media_button_size_selection;
	eut_print_media_options( $eut_media_button_size_selection, $current_value );
}
function eut_print_media_button_shape_selection( $current_value = "" ) {
	global $eut_media_button_shape_selection;
	eut_print_media_options( $eut_media_button_shape_selection, $current_value );
}
function eut_print_media_button_type_selection( $current_value = "" ) {
	global $eut_media_button_type_selection;
	eut_print_media_options( $eut_media_button_type_selection, $current_value );
}
function eut_print_media_button_target_selection( $current_value = "" ) {
	global $eut_media_button_target_selection;
	eut_print_media_options( $eut_media_button_target_selection, $current_value );
}

function eut_print_media_style_selection( $current_value = "" ) {
	global $eut_media_style_selection;
	eut_print_media_options( $eut_media_style_selection, $current_value );
}
function eut_print_media_color_selection( $current_value = "" ) {
	global $eut_media_color_selection;
	eut_print_media_options( $eut_media_color_selection, $current_value );
}
function eut_print_media_align_selection( $current_value = "" ) {
	global $eut_media_align_selection;
	eut_print_media_options( $eut_media_align_selection, $current_value );
}
function eut_print_media_header_style_selection( $current_value = "" ) {
	global $eut_media_header_style_selection;
	eut_print_media_options( $eut_media_header_style_selection, $current_value );
}

function eut_print_media_color_overlay_selection( $current_value = "" ) {
	global $eut_media_color_overlay_selection;
	eut_print_media_options( $eut_media_color_overlay_selection, $current_value );
}
function eut_print_media_pattern_overlay_selection( $current_value = "" ) {
	global $eut_media_pattern_overlay_selection;
	eut_print_media_options( $eut_media_pattern_overlay_selection, $current_value );
}
function eut_print_media_opacity_overlay_selection( $current_value = "" ) {

	for ( $i = 1; $i <= 9; $i++ ) {
		$value = $i*10 ;
?>
	<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_value, $value ); ?>>
		<?php echo esc_html( $value ); ?>
	</option>
<?php
	}
}

function eut_print_media_text_animation_selection( $current_value = "" ) {
	global $eut_media_text_animation_selection;
	eut_print_media_options( $eut_media_text_animation_selection, $current_value );
}

function eut_print_media_bg_position_selection( $current_value = "center-center" ) {
	global $eut_media_bg_position_selection;
	eut_print_media_options( $eut_media_bg_position_selection, $current_value );
}

function eut_print_media_bg_effect_selection( $current_value = "" ) {
	global $eut_media_bg_effect_selection;
	eut_print_media_options( $eut_media_bg_effect_selection, $current_value );
}



/**
 * Prints Media Slider items
 */
function eut_print_admin_media_slider_items( $slider_items ) {

	foreach ( $slider_items as $slider_item ) {
		eut_print_admin_media_slider_item( $slider_item, '' );
	}

}

/**
 * Get Single Slider Media with ajax
 */
function eut_get_slider_media() {

	if( isset( $_POST['attachment_ids'] ) ) {

		$attachment_ids = $_POST['attachment_ids'];

		if( !empty( $attachment_ids ) ) {

			$media_ids = explode(",", $attachment_ids);

			foreach ( $media_ids as $media_id ) {
				$slider_item = array (
					'id' => $media_id,
				);
				eut_print_admin_media_slider_item( $slider_item, "new" );
			}
		}
	}
	if( isset( $_POST['attachment_ids'] ) ) { die(); }
}
add_action( 'wp_ajax_eut_get_slider_media', 'eut_get_slider_media' );


/**
 * Prints Single Slider Media  Item
 */
function eut_print_admin_media_slider_item( $slider_item, $new = "" ) {
	$media_id = $slider_item['id'];

	$thumb_src = wp_get_attachment_image_src( $media_id, 'thumbnail' );
	$thumbnail_url = $thumb_src[0];
	$alt = get_post_meta( $media_id, '_wp_attachment_image_alt', true );

	$eut_button_class = "eut-slider-item-delete-button";

	if( $new = "new" ) {
		$eut_button_class = "eut-slider-item-delete-button eut-item-new";
	}

?>
	<div class="eut-slider-item-minimal">
		<input class="<?php echo esc_attr( $eut_button_class ); ?> button" type="button" value="<?php esc_attr_e( 'Delete', 'corpus' ); ?>">
		<h3 class="hndle eut-title">
			<span><?php esc_html_e( 'Image', 'corpus' ); ?></span>
		</h3>
		<div class="inside">
			<input type="hidden" value="<?php echo esc_attr( $media_id ); ?>" name="eut_media_slider_item_id[]">
			<?php echo '<img class="eut-thumb" src="' . esc_url( $thumbnail_url ) . '" attid="' . esc_attr( $media_id ) . '" alt="' . esc_attr( $alt ) . '" width="120" height="120"/>'; ?>
		</div>
	</div>
<?php

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
