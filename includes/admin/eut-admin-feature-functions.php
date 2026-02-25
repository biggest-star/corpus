<?php
/*
*	Collection of functions for admin feature section
*
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/


/**
 * Get Feature Single Image with ajax
 */
function eut_get_image_media() {


	if( isset( $_POST['attachment_id'] ) ) {

		$media_id  = $_POST['attachment_id'];

		if( !empty( $media_id  ) ) {

			$image_item = array (
				'id' => $media_id,
			);

			eut_print_admin_feature_image_item( $image_item, "new" );

		}
	}

	if( isset( $_POST['attachment_id'] ) ) { die(); }
}
add_action( 'wp_ajax_eut_get_image_media', 'eut_get_image_media' );

/**
 * Get Replaced Image with ajax
 */
function eut_get_replaced_image() {


	if( isset( $_POST['attachment_id'] ) ) {

		if ( isset( $_POST['attachment_mode'] ) && !empty( $_POST['attachment_mode'] ) ) {
			$mode = $_POST['attachment_mode'];
			switch( $mode ) {
				case 'image':
					$input_name = 'eut_image_item_id';
				break;
				case 'full-slider':
				default:
					$input_name = 'eut_slider_item_id[]';
				break;
			}
		} else {
			$input_name = 'eut_slider_item_id[]';
		}

		$media_id  = $_POST['attachment_id'];
		$thumb_src = wp_get_attachment_image_src( $media_id, 'thumbnail' );
		$thumbnail_url = $thumb_src[0];
		$alt = get_post_meta( $media_id, '_wp_attachment_image_alt', true );
?>
		<input type="hidden" value="<?php echo esc_attr( $media_id ); ?>" name="<?php echo esc_attr( $input_name ); ?>">
		<?php echo '<img class="eut-thumb" src="' . esc_url( $thumbnail_url ) . '" attid="' . esc_attr( $media_id ) . '" alt="' . esc_attr( $alt ) . '" width="120" height="120"/>'; ?>
<?php

	}

	if( isset( $_POST['attachment_id'] ) ) { die(); }
}
add_action( 'wp_ajax_eut_get_replaced_image', 'eut_get_replaced_image' );

/**
 * Get Single Feature Slider Media with ajax
 */
function eut_get_admin_feature_slider_media() {


	if( isset( $_POST['attachment_ids'] ) ) {

		$attachment_ids = $_POST['attachment_ids'];

		if( !empty( $attachment_ids ) ) {

			$media_ids = explode(",", $attachment_ids);

			foreach ( $media_ids as $media_id ) {
				$slider_item = array (
					'id' => $media_id,
				);

				eut_print_admin_feature_slider_item( $slider_item, "new" );
			}
		}
	}

	if( isset( $_POST['attachment_ids'] ) ) { die(); }
}
add_action( 'wp_ajax_eut_get_admin_feature_slider_media', 'eut_get_admin_feature_slider_media' );

/**
 * Get Single Feature Map Point with ajax
 */
function eut_get_map_point() {
	if( isset( $_POST['map_mode'] ) ) {
		$mode = $_POST['map_mode'];
		eut_print_admin_feature_map_point( array(), $mode );
	}
	if( isset( $_POST['map_mode'] ) ) { die(); }
}
add_action( 'wp_ajax_eut_get_map_point', 'eut_get_map_point' );

/**
 * Prints Feature Map Points
 */
function eut_print_admin_feature_map_items( $map_items ) {

	if( !empty($map_items) ) {
		foreach ( $map_items as $map_item ) {
			eut_print_admin_feature_map_point( $map_item );
		}
	}

}

/**
 * Prints Admin Feature Setting
 */
function eut_print_admin_feature_setting( $item_type, $item_label, $item_name = '', $item_value = '' ) {

	$setting_class = 'eut-setting';
	if ( 'label' == $item_type ) {
		$setting_class = 'eut-setting eut-setting-label';
	}
?>
	<li>
		<div class="<?php echo esc_attr( $setting_class ); ?>">
			<label><?php echo esc_html( $item_label ); ?></label>
			<?php if ( 'textfield' == $item_type ) { ?>

			<input type="text" name="<?php echo esc_attr( $item_name ); ?>" value="<?php echo esc_attr( $item_value ); ?>"/>

			<?php } elseif ( 'select-color' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_color_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-tag' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_tag_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-style' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_style_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-header-style' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_header_style_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-align' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_align_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-text-animation' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_text_animation_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-button-target' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_button_target_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-button-color' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_button_color_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-button-size' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_button_size_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-button-shape' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_button_shape_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-button-type' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_button_type_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-pattern-overlay' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_pattern_overlay_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-color-overlay' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_color_overlay_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-opacity-overlay' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_opacity_overlay_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-bg-position' == $item_type || 'select-align-position' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_bg_position_selection( $item_value ); ?>
				</select>

			<?php } elseif ( 'select-bg-effect' == $item_type ) { ?>

				<select name="<?php echo esc_attr( $item_name ); ?>" class="eut-modal-select">
					<?php eut_print_media_bg_effect_selection( $item_value ); ?>
				</select>

			<?php } ?>
		</div>
	</li>
<?php
}

/**
 * Prints Feature Single Map Point
 */
function eut_print_admin_feature_map_point( $map_item, $mode = '' ) {


	$map_item_id = uniqid('eut_map_point_');
	$map_id = eut_array_value( $map_item, 'id', $map_item_id );

	$map_lat = eut_array_value( $map_item, 'lat', '51.516221' );
	$map_lng = eut_array_value( $map_item, 'lng', '-0.136986' );
	$map_marker = eut_array_value( $map_item, 'marker' );

	$map_title = eut_array_value( $map_item, 'title' );
	$map_infotext = eut_array_value( $map_item, 'info_text','' );

	$button_text = eut_array_value( $map_item, 'button_text' );
	$button_url = eut_array_value( $map_item, 'button_url' );
	$button_target = eut_array_value( $map_item, 'button_target', '_self' );
	$button_class = eut_array_value( $map_item, 'button_class' );

	$eut_closed_class = 'closed';

	$eut_item_new = '';
	if( "new" == $mode ) {
		$eut_item_new = " eut-item-new";
		$eut_closed_class = 'eut-item-new';
	}

?>
	<div class="eut-map-item postbox <?php echo esc_attr( $eut_closed_class ); ?>">
		<button class="handlediv button-link" type="button">
			<span class="screen-reader-text"><?php esc_html_e( 'Click to toggle', 'corpus' ); ?></span>
			<span class="toggle-indicator"></span>
		</button>
		<input class="eut-map-item-delete-button button<?php echo esc_attr( $eut_item_new ); ?>" type="button" value="<?php esc_attr_e( 'Delete', 'corpus' ); ?>">
		<span class="eut-button-spacer">&nbsp;</span>
		<span class="eut-modal-spinner"></span>
		<h3 class="eut-title">
			<span><?php esc_html_e( 'Map Point', 'corpus' ); ?><?php if ( !empty ($map_title) ) { echo ': ' . esc_html( $map_title ); } ?></span>
		</h3>
		<div class="inside">
			<input type="hidden" name="eut_map_item_point_id[]" value="<?php echo esc_attr( $map_id ); ?>"/>
			<ul class="eut-map-setting">
				<li>
					<div class="eut-setting">
						<label><?php esc_html_e( 'Latitude', 'corpus' ); ?></label>
						<input type="text" name="eut_map_item_point_lat[]" value="<?php echo esc_attr( $map_lat ); ?>"/>
					</div>
				</li>
				<li>
					<div class="eut-setting">
						<label><?php esc_html_e( 'Longitude', 'corpus' ); ?></label>
						<input type="text" name="eut_map_item_point_lng[]" value="<?php echo esc_attr( $map_lng ); ?>"/>
					</div>
				</li>
				<li>
					<div class="eut-setting">
						<label><?php esc_html_e( 'Marker', 'corpus' ); ?></label>
						<input type="text" name="eut_map_item_point_marker[]" class="eut-upload-simple-media-field" value="<?php echo esc_attr( $map_marker ); ?>"/>
						<label></label>
						<input type="button" data-media-type="image" class="eut-upload-simple-media-button button-primary<?php echo esc_attr( $eut_item_new ); ?>" value="<?php esc_attr_e( 'Insert Marker', 'corpus' ); ?>"/>
						<input type="button" class="eut-remove-simple-media-button button<?php echo esc_attr( $eut_item_new ); ?>" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
					</div>
				</li>
				<?php

					eut_print_admin_feature_setting( 'label', __( 'Title / Info Text', 'corpus' ) );
					eut_print_admin_feature_setting( 'textfield', __( 'Title', 'corpus' ), 'eut_map_item_point_title[]', $map_title );
					eut_print_admin_feature_setting( 'textfield', __( 'Info Text', 'corpus' ), 'eut_map_item_point_infotext[]', $map_infotext );
					eut_print_admin_feature_setting( 'label', __( 'Link', 'corpus' ) );
					eut_print_admin_feature_setting( 'textfield', __( 'Link Text', 'corpus' ), 'eut_map_item_point_button_text[]', $button_text );
					eut_print_admin_feature_setting( 'textfield', __( 'Link URL', 'corpus' ), 'eut_map_item_point_button_url[]', $button_url );
					eut_print_admin_feature_setting( 'select-button-target', __( 'Link Target', 'corpus' ), 'eut_map_item_point_button_target[]', $button_target );
					eut_print_admin_feature_setting( 'textfield', __( 'Link Class', 'corpus' ), 'eut_map_item_point_button_class[]', $button_class );

				?>
			</ul>
		</div>
	</div>
<?php
}

/**
 * Prints Feature Single Image Item
 */
function eut_print_admin_feature_image_item( $image_item, $mode = "" ) {

	global $eut_media_color_overlay_selection;

	$media_id = $image_item['id'];

	$title = eut_array_value( $image_item, 'title' );
	$caption = eut_array_value( $image_item, 'caption' );
	$text_align = eut_array_value( $image_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $image_item, 'text_animation', 'fade-in' );
	$title_color = eut_array_value( $image_item, 'title_color', 'dark' );
	$caption_color = eut_array_value( $image_item, 'caption_color', 'dark' );
	$title_tag = eut_array_value( $image_item, 'title_tag', 'h1' );
	$caption_tag = eut_array_value( $image_item, 'caption_tag', 'div' );

	$bg_position = eut_array_value( $image_item, 'bg_position', 'center-center' );
	$bg_effect = eut_array_value( $image_item, 'bg_effect', 'none' );
	$style = eut_array_value( $image_item, 'style', 'default' );

	$arrow_color = eut_array_value( $image_item, 'arrow_color', 'dark' );
	$arrow_align = eut_array_value( $image_item, 'arrow_align', 'left' );
	$el_class = eut_array_value( $image_item, 'el_class' );

	$pattern_overlay = eut_array_value( $image_item, 'pattern_overlay' );
	$color_overlay = eut_array_value( $image_item, 'color_overlay' );
	$opacity_overlay = eut_array_value( $image_item, 'opacity_overlay', '10' );

	$button_text = eut_array_value( $image_item, 'button_text' );
	$button_url = eut_array_value( $image_item, 'button_url' );
	$button_type = eut_array_value( $image_item, 'button_type', '' );
	$button_size = eut_array_value( $image_item, 'button_size', 'medium' );
	$button_color = eut_array_value( $image_item, 'button_color', 'primary-1' );
	$button_shape = eut_array_value( $image_item, 'button_shape', 'square' );
	$button_target = eut_array_value( $image_item, 'button_target', '_self' );
	$button_class = eut_array_value( $image_item, 'button_class' );

	$button_text2 = eut_array_value( $image_item, 'button_text2' );
	$button_url2 = eut_array_value( $image_item, 'button_url2' );
	$button_type2 = eut_array_value( $image_item, 'button_type2', '' );
	$button_size2 = eut_array_value( $image_item, 'button_size2', 'medium' );
	$button_color2 = eut_array_value( $image_item, 'button_color2', 'primary-1' );
	$button_shape2 = eut_array_value( $image_item, 'button_shape2', 'square' );
	$button_target2 = eut_array_value( $image_item, 'button_target2', '_self' );
	$button_class2 = eut_array_value( $image_item, 'button_class2' );

	$thumb_src = wp_get_attachment_image_src( $media_id, 'thumbnail' );
	$thumbnail_url = $thumb_src[0];
	$alt = get_post_meta( $media_id, '_wp_attachment_image_alt', true );

	$eut_button_class = "eut-image-item-delete-button";
	$eut_open_modal_class = "eut-open-image-modal";
	$eut_replace_image_class = "eut-upload-replace-image";
	if( "new" == $mode ) {
		$eut_button_class = "eut-image-item-delete-button eut-item-new";
		$eut_replace_image_class = "eut-upload-replace-image eut-item-new";
		$eut_open_modal_class = "eut-open-image-modal eut-item-new";
	}
	$image_item_id = uniqid('_');
?>

	<div class="eut-image-item postbox">
		<input class="<?php echo esc_attr( $eut_button_class ); ?> button" type="button" value="<?php esc_attr_e( 'Delete', 'corpus' ); ?>">
		<span class="eut-button-spacer">&nbsp;</span>
		<span class="eut-modal-spinner"></span>
		<h3 class="eut-title">
			<span><?php esc_html_e( 'Image', 'corpus' ); ?></span>
		</h3>
		<div class="inside">
			<div class="eut-thumb-container" data-mode="image">
				<input type="hidden" value="<?php echo esc_attr( $media_id ); ?>" name="eut_image_item_id">
				<?php echo '<img class="eut-thumb" src="' . esc_url( $thumbnail_url ) . '" title="' . esc_attr( $title ) . '" attid="' . esc_attr( $media_id ) . '" alt="' . esc_attr( $alt ) . '" width="120" height="120"/>'; ?>
			</div>
			<div class="<?php echo esc_attr( $eut_replace_image_class ); ?>"></div>
			<div class="eut-image-settings"></div>
			<div class="clear"></div>
				<ul class="eut-image-setting">
			<?php
				eut_print_admin_feature_setting( 'label', __( 'Title / Caption', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Title', 'corpus' ), 'eut_image_item_title', $title );
				eut_print_admin_feature_setting( 'textfield', __( 'Caption', 'corpus' ), 'eut_image_item_caption', $caption );
				eut_print_admin_feature_setting( 'select-color', __( 'Title Color', 'corpus' ), 'eut_image_item_title_color', $title_color );
				eut_print_admin_feature_setting( 'select-color', __( 'Caption Color', 'corpus' ), 'eut_image_item_caption_color', $caption_color );
				eut_print_admin_feature_setting( 'select-tag', __( 'Title Tag', 'corpus' ), 'eut_image_item_title_tag', $title_tag );
				eut_print_admin_feature_setting( 'select-tag', __( 'Caption Tag', 'corpus' ), 'eut_image_item_caption_tag', $caption_tag );
				eut_print_admin_feature_setting( 'select-style', __( 'Title / Caption Style', 'corpus' ), 'eut_image_item_style', $style );
				eut_print_admin_feature_setting( 'select-align-position', __( 'Alignment', 'corpus' ), 'eut_image_item_text_align', $text_align );
				eut_print_admin_feature_setting( 'select-text-animation', __( 'Animation', 'corpus' ), 'eut_image_item_text_animation', $text_animation );

				eut_print_admin_feature_setting( 'label', __( 'Background', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-bg-position', __( 'Background Position', 'corpus' ), 'eut_image_item_bg_position', $bg_position );

				eut_print_admin_feature_setting( 'label', __( 'Overlay', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-pattern-overlay', __( 'Pattern Overlay', 'corpus' ), 'eut_image_item_pattern_overlay', $pattern_overlay );
				eut_print_admin_feature_setting( 'select-color-overlay', __( 'Color Overlay', 'corpus' ), 'eut_image_item_color_overlay', $color_overlay );
				eut_print_admin_feature_setting( 'select-opacity-overlay', __( 'Opacity Overlay', 'corpus' ), 'eut_image_item_opacity_overlay', $opacity_overlay );

				eut_print_admin_feature_setting( 'label', __( 'First Button', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_image_item_button_text', $button_text );
				eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_image_item_button_url', $button_url );
				eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_image_item_button_target', $button_target );
				eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_image_item_button_color', $button_color );
				eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_image_item_button_size', $button_size );
				eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_image_item_button_shape', $button_shape );
				eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_image_item_button_type', $button_type );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_image_item_button_class', $button_class );

				eut_print_admin_feature_setting( 'label', __( 'Second Button', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_image_item_button2_text', $button_text2 );
				eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_image_item_button2_url', $button_url2 );
				eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_image_item_button2_target', $button_target2 );
				eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_image_item_button2_color', $button_color2 );
				eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_image_item_button2_size', $button_size2 );
				eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_image_item_button2_shape', $button_shape2 );
				eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_image_item_button2_type', $button_type2 );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_image_item_button2_class', $button_class );

				eut_print_admin_feature_setting( 'label', __( 'Extras', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-color', __( 'Bottom Arrow Color', 'corpus' ), 'eut_image_item_arrow_color', $arrow_color );
				eut_print_admin_feature_setting( 'select-align', __( 'Bottom Arrow Alignment', 'corpus' ), 'eut_image_item_arrow_align', $arrow_align );
				eut_print_admin_feature_setting( 'textfield', __( 'Extra Class', 'corpus' ), 'eut_image_item_el_class', $el_class );
			?>
				</ul>
		</div>

	</div>
<?php
}

/**
 * Prints Section Slider items
 */
function eut_print_admin_feature_slider_items( $slider_items ) {

	foreach ( $slider_items as $slider_item ) {
		eut_print_admin_feature_slider_item( $slider_item, '' );
	}

}

/**
* Prints Single Feature Slider Item
*/
function eut_print_admin_feature_slider_item( $slider_item, $new = "" ) {

	$media_id = $slider_item['id'];

	$title = eut_array_value( $slider_item, 'title' );
	$caption = eut_array_value( $slider_item, 'caption' );
	$text_align = eut_array_value( $slider_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $slider_item, 'text_animation', 'fade-in' );
	$title_color = eut_array_value( $slider_item, 'title_color', 'dark' );
	$caption_color = eut_array_value( $slider_item, 'caption_color', 'dark' );
	$title_tag = eut_array_value( $slider_item, 'title_tag', 'h1' );
	$caption_tag = eut_array_value( $slider_item, 'caption_tag', 'div' );

	$bg_position = eut_array_value( $slider_item, 'bg_position', 'center-center' );
	$style = eut_array_value( $slider_item, 'style', 'default' );
	$header_style = eut_array_value( $slider_item, 'header_style', 'default' );

	$arrow_color = eut_array_value( $slider_item, 'arrow_color', 'dark' );
	$arrow_align = eut_array_value( $slider_item, 'arrow_align', 'left' );

	$el_class = eut_array_value( $slider_item, 'el_class' );

	$pattern_overlay = eut_array_value( $slider_item, 'pattern_overlay' );
	$color_overlay = eut_array_value( $slider_item, 'color_overlay' );
	$opacity_overlay = eut_array_value( $slider_item, 'opacity_overlay', '10' );

	$button_text = eut_array_value( $slider_item, 'button_text' );
	$button_url = eut_array_value( $slider_item, 'button_url' );
	$button_type = eut_array_value( $slider_item, 'button_type', '' );
	$button_size = eut_array_value( $slider_item, 'button_size', 'medium' );
	$button_color = eut_array_value( $slider_item, 'button_color', 'primary-1' );
	$button_shape = eut_array_value( $slider_item, 'button_shape', 'square' );
	$button_target = eut_array_value( $slider_item, 'button_target', '_self' );
	$button_class = eut_array_value( $slider_item, 'button_class' );

	$button_text2 = eut_array_value( $slider_item, 'button_text2' );
	$button_url2 = eut_array_value( $slider_item, 'button_url2' );
	$button_type2 = eut_array_value( $slider_item, 'button_type2', '' );
	$button_size2 = eut_array_value( $slider_item, 'button_size2', 'medium' );
	$button_color2 = eut_array_value( $slider_item, 'button_color2', 'primary-1' );
	$button_shape2 = eut_array_value( $slider_item, 'button_shape2', 'square' );
	$button_target2 = eut_array_value( $slider_item, 'button_target2', '_self' );
	$button_class2 = eut_array_value( $slider_item, 'button_class2' );


	$thumb_src = wp_get_attachment_image_src( $media_id, 'thumbnail' );
	$thumbnail_url = $thumb_src[0];
	$alt = get_post_meta( $media_id, '_wp_attachment_image_alt', true );

	$eut_button_class = "eut-feature-slider-item-delete-button";
	$eut_replace_image_class = "eut-upload-replace-image";
	$eut_open_modal_class = "eut-open-slider-modal";

	$eut_closed_class = 'closed';

	if( "new" == $new ) {
		$eut_button_class = "eut-feature-slider-item-delete-button eut-item-new";
		$eut_replace_image_class = "eut-upload-replace-image eut-item-new";
		$eut_open_modal_class = "eut-open-slider-modal eut-item-new";
		$eut_closed_class = 'eut-item-new';
	}

	$slider_item_id = uniqid('_');

?>

	<div class="eut-slider-item postbox <?php echo esc_attr( $eut_closed_class ); ?>">
		<button class="handlediv button-link" type="button">
			<span class="screen-reader-text"><?php esc_html_e( 'Click to toggle', 'corpus' ); ?></span>
			<span class="toggle-indicator"></span>
		</button>
		<input class="<?php echo esc_attr( $eut_button_class ); ?> button" type="button" value="<?php esc_attr_e( 'Delete', 'corpus' ); ?>">
		<span class="eut-button-spacer">&nbsp;</span>
		<span class="eut-modal-spinner"></span>
		<h3 class="hndle eut-title">
			<span><?php esc_html_e( 'Slide', 'corpus' ); ?> <?php if ( !empty ($title) ) { echo ': ' . esc_html( $title ); } ?></span>
		</h3>
		<div class="inside">
			<div class="eut-thumb-container" data-mode="slider-full">
				<input type="hidden" value="<?php echo esc_attr( $media_id ); ?>" name="eut_slider_item_id[]">
				<?php echo '<img class="eut-thumb" src="' . esc_url( $thumbnail_url ) . '" title="' . esc_attr( $title ) . '" attid="' . esc_attr( $media_id ) . '" alt="' . esc_attr( $alt ) . '" width="120" height="120"/>'; ?>
			</div>
			<div class="<?php echo esc_attr( $eut_replace_image_class ); ?>"></div>
			<div class="eut-slider-settings"></div>
			<div class="clear"></div>
				<ul class="eut-slide-setting">
			<?php
				eut_print_admin_feature_setting( 'label', __( 'Title / Caption', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Title', 'corpus' ), 'eut_slider_item_title[]', $title );
				eut_print_admin_feature_setting( 'textfield', __( 'Caption', 'corpus' ), 'eut_slider_item_caption[]', $caption );
				eut_print_admin_feature_setting( 'select-color', __( 'Title Color', 'corpus' ), 'eut_slider_item_title_color[]', $title_color );
				eut_print_admin_feature_setting( 'select-color', __( 'Caption Color', 'corpus' ), 'eut_slider_item_caption_color[]', $caption_color );
				eut_print_admin_feature_setting( 'select-tag', __( 'Title Tag', 'corpus' ), 'eut_slider_item_title_tag[]', $title_tag );
				eut_print_admin_feature_setting( 'select-tag', __( 'Caption Tag', 'corpus' ), 'eut_slider_item_caption_tag[]', $caption_tag );
				eut_print_admin_feature_setting( 'select-style', __( 'Title / Caption Style', 'corpus' ), 'eut_slider_item_style[]', $style );
				eut_print_admin_feature_setting( 'select-align-position', __( 'Alignment', 'corpus' ), 'eut_slider_item_text_align[]', $text_align );
				eut_print_admin_feature_setting( 'select-text-animation', __( 'Animation', 'corpus' ), 'eut_slider_item_text_animation[]', $text_animation );

				eut_print_admin_feature_setting( 'label', __( 'Header / Background Position', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-bg-position', __( 'Background Position', 'corpus' ), 'eut_slider_item_bg_position[]', $bg_position );
				eut_print_admin_feature_setting( 'select-header-style', __( 'Header Style', 'corpus' ), 'eut_slider_item_header_style[]', $header_style );

				eut_print_admin_feature_setting( 'label', __( 'Overlay', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-pattern-overlay', __( 'Pattern Overlay', 'corpus' ), 'eut_slider_item_pattern_overlay[]', $pattern_overlay );
				eut_print_admin_feature_setting( 'select-color-overlay', __( 'Color Overlay', 'corpus' ), 'eut_slider_item_color_overlay[]', $color_overlay );
				eut_print_admin_feature_setting( 'select-opacity-overlay', __( 'Opacity Overlay', 'corpus' ), 'eut_slider_item_opacity_overlay[]', $opacity_overlay );

				eut_print_admin_feature_setting( 'label', __( 'First Button', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_slider_item_button_text[]', $button_text );
				eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_slider_item_button_url[]', $button_url );
				eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_slider_item_button_target[]', $button_target );
				eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_slider_item_button_color[]', $button_color );
				eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_slider_item_button_size[]', $button_size );
				eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_slider_item_button_shape[]', $button_shape );
				eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_slider_item_button_type[]', $button_type );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_slider_item_button_class[]', $button_class );

				eut_print_admin_feature_setting( 'label', __( 'Second Button', 'corpus' ) );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_slider_item_button2_text[]', $button_text2 );
				eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_slider_item_button2_url[]', $button_url2 );
				eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_slider_item_button2_target[]', $button_target2 );
				eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_slider_item_button2_color[]', $button_color2 );
				eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_slider_item_button2_size[]', $button_size2 );
				eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_slider_item_button2_shape[]', $button_shape2 );
				eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_slider_item_button2_type[]', $button_type2 );
				eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_slider_item_button2_class[]', $button_class2 );

				eut_print_admin_feature_setting( 'label', __( 'Extras', 'corpus' ) );
				eut_print_admin_feature_setting( 'select-color', __( 'Bottom Arrow Color', 'corpus' ), 'eut_slider_item_arrow_color[]', $arrow_color );
				eut_print_admin_feature_setting( 'select-align', __( 'Bottom Arrow Alignment', 'corpus' ), 'eut_slider_item_arrow_align[]', $arrow_align );
				eut_print_admin_feature_setting( 'textfield', __( 'Extra Class', 'corpus' ), 'eut_slider_item_el_class[]', $el_class );
			?>
				</ul>
		</div>

	</div>
<?php

}

/**
* Prints Single Feature Viedo Item
*/
function eut_print_admin_feature_video_item( $video_item ) {

	$video_item_id = uniqid('_');

	$title = eut_array_value( $video_item, 'title' );
	$caption = eut_array_value( $video_item, 'caption' );
	$text_align = eut_array_value( $video_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $video_item, 'text_animation', 'fade-in' );

	$title_color = eut_array_value( $video_item, 'title_color', 'dark' );
	$caption_color = eut_array_value( $video_item, 'caption_color', 'dark' );
	$title_tag = eut_array_value( $video_item, 'title_tag', 'h1' );
	$caption_tag = eut_array_value( $video_item, 'caption_tag', 'div' );

	$style = eut_array_value( $video_item, 'style', 'default' );

	$arrow_color = eut_array_value( $video_item, 'arrow_color' );
	$arrow_align = eut_array_value( $video_item, 'arrow_align', 'left' );
	$el_class = eut_array_value( $video_item, 'el_class' );

	$pattern_overlay = eut_array_value( $video_item, 'pattern_overlay' );
	$color_overlay = eut_array_value( $video_item, 'color_overlay' );
	$opacity_overlay = eut_array_value( $video_item, 'opacity_overlay', '10' );

	$button_text = eut_array_value( $video_item, 'button_text' );
	$button_url = eut_array_value( $video_item, 'button_url' );
	$button_type = eut_array_value( $video_item, 'button_type', '' );
	$button_size = eut_array_value( $video_item, 'button_size', 'medium' );
	$button_color = eut_array_value( $video_item, 'button_color', 'primary-1' );
	$button_shape = eut_array_value( $video_item, 'button_shape', 'square' );
	$button_target = eut_array_value( $video_item, 'button_target', '_self' );
	$button_class = eut_array_value( $video_item, 'button_class' );

	$button_text2 = eut_array_value( $video_item, 'button_text2' );
	$button_url2 = eut_array_value( $video_item, 'button_url2' );
	$button_type2 = eut_array_value( $video_item, 'button_type2', '' );
	$button_size2 = eut_array_value( $video_item, 'button_size2', 'medium' );
	$button_color2 = eut_array_value( $video_item, 'button_color2', 'primary-1' );
	$button_shape2 = eut_array_value( $video_item, 'button_shape2', 'square' );
	$button_target2 = eut_array_value( $video_item, 'button_target2', '_self' );
	$button_class2 = eut_array_value( $video_item, 'button_class2' );

?>
	<ul class="eut-video-setting">
<?php
		eut_print_admin_feature_setting( 'label', __( 'Title / Caption', 'corpus' ) );
		eut_print_admin_feature_setting( 'textfield', __( 'Title', 'corpus' ), 'eut_video_item_title', $title );
		eut_print_admin_feature_setting( 'textfield', __( 'Caption', 'corpus' ), 'eut_video_item_caption', $caption );
		eut_print_admin_feature_setting( 'select-color', __( 'Title Color', 'corpus' ), 'eut_video_item_title_color', $title_color );
		eut_print_admin_feature_setting( 'select-color', __( 'Caption Color', 'corpus' ), 'eut_video_item_caption_color', $caption_color );
		eut_print_admin_feature_setting( 'select-tag', __( 'Title Tag', 'corpus' ), 'eut_video_item_title_tag', $title_tag );
		eut_print_admin_feature_setting( 'select-tag', __( 'Caption Tag', 'corpus' ), 'eut_video_item_caption_tag', $caption_tag );
		eut_print_admin_feature_setting( 'select-style', __( 'Title / Caption Style', 'corpus' ), 'eut_video_item_style', $style );
		eut_print_admin_feature_setting( 'select-align-position', __( 'Alignment', 'corpus' ), 'eut_video_item_text_align', $text_align );
		eut_print_admin_feature_setting( 'select-text-animation', __( 'Animation', 'corpus' ), 'eut_video_item_text_animation', $text_animation );

		eut_print_admin_feature_setting( 'label', __( 'Overlay', 'corpus' ) );
		eut_print_admin_feature_setting( 'select-pattern-overlay', __( 'Pattern Overlay', 'corpus' ), 'eut_video_item_pattern_overlay', $pattern_overlay );
		eut_print_admin_feature_setting( 'select-color-overlay', __( 'Color Overlay', 'corpus' ), 'eut_video_item_color_overlay', $color_overlay );
		eut_print_admin_feature_setting( 'select-opacity-overlay', __( 'Opacity Overlay', 'corpus' ), 'eut_video_item_opacity_overlay', $opacity_overlay );

		eut_print_admin_feature_setting( 'label', __( 'First Button', 'corpus' ) );
		eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_video_item_button_text', $button_text );
		eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_video_item_button_url', $button_url );
		eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_video_item_button_target', $button_target );
		eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_video_item_button_color', $button_color );
		eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_video_item_button_size', $button_size );
		eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_video_item_button_shape', $button_shape );
		eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_video_item_button_type', $button_type );
		eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_video_item_button_class', $button_class );

		eut_print_admin_feature_setting( 'label', __( 'Second Button', 'corpus' ) );
		eut_print_admin_feature_setting( 'textfield', __( 'Button Text', 'corpus' ), 'eut_video_item_button2_text', $button_text2 );
		eut_print_admin_feature_setting( 'textfield', __( 'Button URL', 'corpus' ), 'eut_video_item_button2_url', $button_url2 );
		eut_print_admin_feature_setting( 'select-button-target', __( 'Button Target', 'corpus' ), 'eut_video_item_button2_target', $button_target2 );
		eut_print_admin_feature_setting( 'select-button-color', __( 'Button Color', 'corpus' ), 'eut_video_item_button2_color', $button_color2 );
		eut_print_admin_feature_setting( 'select-button-size', __( 'Button Size', 'corpus' ), 'eut_video_item_button2_size', $button_size2 );
		eut_print_admin_feature_setting( 'select-button-shape', __( 'Button Shape', 'corpus' ), 'eut_video_item_button2_shape', $button_shape2 );
		eut_print_admin_feature_setting( 'select-button-type', __( 'Button Type', 'corpus' ), 'eut_video_item_button2_type', $button_type2 );
		eut_print_admin_feature_setting( 'textfield', __( 'Button Class', 'corpus' ), 'eut_video_item_button2_class', $button_class2 );

		eut_print_admin_feature_setting( 'label', __( 'Extras', 'corpus' ) );
		eut_print_admin_feature_setting( 'select-color', __( 'Bottom Arrow Color', 'corpus' ), 'eut_video_item_arrow_color', $arrow_color );
		eut_print_admin_feature_setting( 'select-align', __( 'Bottom Arrow Alignment', 'corpus' ), 'eut_video_item_arrow_align', $arrow_align );
		eut_print_admin_feature_setting( 'textfield', __( 'Extra Class', 'corpus' ), 'eut_video_item_el_class', $el_class );

?>
	</ul>
<?php

}

/**
 * Function to print revolution selector
 */
function eut_print_revolution_selection( $revslider_alias, $id, $name ) {

	if ( eut_is_revslider_active() ) {
	?>
		<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" class="eut-feature-section-item">
	<?php
		global $wpdb;
		$rs = $wpdb->get_results( "SELECT id, title, alias FROM " . $wpdb->prefix . "revslider_sliders ORDER BY id ASC LIMIT 999" );
		if ( $rs ) {
	?>
			<option value="" <?php selected( '', $revslider_alias ); ?>>
				<?php echo esc_html__( 'None', 'corpus' ); ?>
			</option>
	<?php
			foreach ( $rs as $revslider ) {
	?>
			<option value="<?php echo esc_attr( $revslider->alias ); ?>" <?php selected( $revslider->alias, $revslider_alias ); ?>>
				<?php echo esc_html( $revslider->title ); ?>
			</option>
	<?php
			}
		} else {
	?>
			<option value="" <?php selected( '', $revslider_alias ); ?>>
				<?php echo esc_html__( 'No sliders found', 'corpus' ); ?>
			</option>
	<?php
		}
	?>
		</select>
	<?php
	} else{
	?>
		<span id="<?php echo esc_attr( $id ); ?>" class="eut-feature-section-item">
			<?php echo esc_html__( 'Revolution Slider is not activated!', 'corpus' ); ?>
			<input type="hidden" name="<?php echo esc_attr( $name ); ?>" value=""/>
		</span>
	<?php
	}

}

function eut_admin_get_feature_section( $post_id ) {

	//Feature Settings
	$feature_element = eut_admin_post_meta( $post_id, 'eut_page_feature_element' );
	$feature_size = eut_admin_post_meta( $post_id, 'eut_page_feature_size' );
	$feature_height = eut_admin_post_meta( $post_id, 'eut_page_feature_height', '550' );
	$feature_header_position = eut_admin_post_meta( $post_id, 'eut_page_feature_header_position', 'above' );
	$feature_header_integration = eut_admin_post_meta( $post_id, 'eut_page_feature_header_integration', 'no' );
	$feature_effect = eut_admin_post_meta( $post_id, 'eut_page_feature_effect' );
	$feature_go_to_section = eut_admin_post_meta( $post_id, 'eut_page_feature_go_to_section' );

	$feature_header_style = eut_admin_post_meta( $post_id, 'eut_page_feature_header_style', 'default' );

	//Image Item
	$image_item = get_post_meta( $post_id, 'eut_page_image_item', true );

	//Title Item
	$title_item = get_post_meta( $post_id, 'eut_page_title_item', true );

	//Slider Item
	$slider_items = get_post_meta( $post_id, 'eut_page_slider_items', true );
	$slider_settings = get_post_meta( $post_id, 'eut_page_slider_settings', true );
	$slider_speed = eut_array_value( $slider_settings, 'slideshow_speed', '3500' );
	$slider_pause = eut_array_value( $slider_settings, 'slider_pause', 'no' );
	$slider_dir_nav = eut_array_value( $slider_settings, 'direction_nav', '1' );
	$slider_dir_nav_color = eut_array_value( $slider_settings, 'direction_nav_color', 'light' );
	$slider_transition = eut_array_value( $slider_settings, 'transition', 'slide' );

	//Revolution Slider Item
	$revslider_alias = get_post_meta( $post_id, 'eut_page_feature_revslider', true );

	//Map Item
	$map_items = get_post_meta( $post_id, 'eut_page_map_items', true );
	$map_settings = get_post_meta( $post_id, 'eut_page_map_settings', true );
	$map_zoom = eut_array_value( $map_settings, 'zoom', 14 );
	$map_marker = eut_array_value( $map_settings, 'marker' );


	//Video Item
	$video_item = get_post_meta( $post_id, 'eut_page_video_item', true );
	$video_webm = eut_array_value( $video_item, 'video_webm' );
	$video_mp4 = eut_array_value( $video_item, 'video_mp4' );
	$video_ogv = eut_array_value( $video_item, 'video_ogv' );
	$video_bg_image = eut_array_value( $video_item, 'video_bg_image' );
	$video_poster = eut_array_value( $video_item, 'video_poster', 'no' );
	$video_loop = eut_array_value( $video_item, 'video_loop', 'yes' );
	$video_muted = eut_array_value( $video_item, 'video_muted', 'yes' );

?>
		<table class="form-table eut-metabox">
			<tbody>
				<tr class="eut-border-bottom">
					<th>
						<label for="eut-page-feature-element">
							<strong><?php esc_html_e( 'Feature Element', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'Select feature section element.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-page-feature-element" name="eut_page_feature_element">
							<option value="" <?php selected( "", $feature_element ); ?>><?php esc_html_e( 'None', 'corpus' ); ?></option>
							<option value="title" <?php selected( "title", $feature_element ); ?>><?php esc_html_e( 'Title', 'corpus' ); ?></option>
							<option value="image" <?php selected( "image", $feature_element ); ?>><?php esc_html_e( 'Image', 'corpus' ); ?></option>
							<option value="video" <?php selected( "video", $feature_element ); ?>><?php esc_html_e( 'Video', 'corpus' ); ?></option>
							<option value="slider" <?php selected( "slider", $feature_element ); ?>><?php esc_html_e( 'Slider', 'corpus' ); ?></option>
							<option value="revslider" <?php selected( "revslider", $feature_element ); ?>><?php esc_html_e( 'Revolution Slider', 'corpus' ); ?></option>
							<option value="map" <?php selected( "map", $feature_element ); ?>><?php esc_html_e( 'Map', 'corpus' ); ?></option>
						</select>
						<?php eut_print_revolution_selection( $revslider_alias, 'eut-page-feature-revslider', 'eut_page_feature_revslider' ); ?>
					</td>
				</tr>
				<tr id="eut-feature-section-slider-speed" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-slider-speed">
							<strong><?php esc_html_e( 'Slideshow Speed', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<input type="text" id="eut-page-slider-speed" name="eut_page_slider_settings_speed" value="<?php echo esc_attr( $slider_speed ); ?>" /> ms
					</td>
				</tr>
				<tr id="eut-feature-section-slider-pause" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-slider-pause">
							<strong><?php esc_html_e( 'Pause On Hover', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<select name="eut_page_slider_settings_pause" id="eut-page-slider-pause">
							<option value="no" <?php selected( "no", $slider_pause ); ?>><?php esc_html_e( 'No', 'corpus' ); ?></option>
							<option value="yes" <?php selected( "yes", $slider_pause ); ?>><?php esc_html_e( 'Yes', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-slider-direction-nav" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-slider-direction-nav">
							<strong><?php esc_html_e( 'Navigation Buttons', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<select name="eut_page_slider_settings_direction_nav" id="eut-page-slider-direction-nav">
							<option value="1" <?php selected( "1", $slider_dir_nav ); ?>><?php esc_html_e( 'Style 1', 'corpus' ); ?></option>
							<option value="2" <?php selected( "2", $slider_dir_nav ); ?>><?php esc_html_e( 'Style 2', 'corpus' ); ?></option>
							<option value="3" <?php selected( "3", $slider_dir_nav ); ?>><?php esc_html_e( 'Style 3', 'corpus' ); ?></option>
							<option value="4" <?php selected( "4", $slider_dir_nav ); ?>><?php esc_html_e( 'Style 4', 'corpus' ); ?></option>
							<option value="0" <?php selected( "0", $slider_dir_nav ); ?>><?php esc_html_e( 'No Navigation', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-slider-direction-nav-color" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-slider-direction-nav-color">
							<strong><?php esc_html_e( 'Navigation color', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<select name="eut_page_slider_settings_direction_nav_color" id="eut-page-slider-direction-nav-color">
							<option value="light" <?php selected( "light", $slider_dir_nav_color ); ?>><?php esc_html_e( 'Light', 'corpus' ); ?></option>
							<option value="dark" <?php selected( "dark", $slider_dir_nav_color ); ?>><?php esc_html_e( 'Dark', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-slider-transition" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-slider-transition">
							<strong><?php esc_html_e( 'Transition', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<select name="eut_page_slider_settings_transition">
							<option value="slide" <?php selected( "slide", $slider_transition ); ?>><?php esc_html_e( 'Slide', 'corpus' ); ?></option>
							<option value="fade" <?php selected( "fade", $slider_transition ); ?>><?php esc_html_e( 'Fade', 'corpus' ); ?></option>
							<option value="backSlide" <?php selected( "backSlide", $slider_transition ); ?>><?php esc_html_e( 'Back Slide', 'corpus' ); ?></option>
							<option value="goDown" <?php selected( "goDown", $slider_transition ); ?>><?php esc_html_e( 'Go Down', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-size" class="eut-feature-section-item" <?php if ( "" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-size">
							<strong><?php esc_html_e( 'Feature Size', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'With Custom Size option you can select the feature height.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select id="eut-page-feature-size" name="eut_page_feature_size">
							<option value="" <?php selected( "", $feature_size ); ?>><?php esc_html_e( 'Full Screen', 'corpus' ); ?></option>
							<option value="custom" <?php selected( "custom", $feature_size ); ?>><?php esc_html_e( 'Custom Size', 'corpus' ); ?></option>
						</select>
						<span id="eut-feature-section-height" class="eut-inner-field" <?php if ( "" == $feature_size ) { ?> style="display:none;" <?php } ?>>
							<label><?php esc_html_e( 'Height', 'corpus' ); ?></label>
							<input type="text" id="eut-page-feature-height" name="eut_page_feature_height" value="<?php echo esc_attr( $feature_height ); ?>" class="small-text" /> px
						</span>
						<span id="eut-feature-section-height-rev" class="eut-inner-field" style="display:none;">
							<label><?php esc_html_e( 'Height is configured from Revolution Slider Settings', 'corpus' ); ?></label>
						</span>
					</td>
				</tr>
				<tr id="eut-feature-section-header-position" class="eut-feature-section-item" <?php if ( "" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-header-position">
							<strong><?php esc_html_e( 'Feature/Header Position', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'With this option header will be shown above or below feature section.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select name="eut_page_feature_header_position" id="eut-page-feature-header-position">
							<option value="above" <?php selected( "above", $feature_header_position ); ?>><?php esc_html_e( 'Header above Feature', 'corpus' ); ?></option>
							<option value="below" <?php selected( "below", $feature_header_position ); ?>><?php esc_html_e( 'Header below Feature', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-header-integration" class="eut-feature-section-item" <?php if ( "" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-header-integration">
							<strong><?php esc_html_e( 'Header Integration', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'With this option feature section will be integrated into the header.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select name="eut_page_feature_header_integration" id="eut-page-feature-header-integration">
							<option value="no" <?php selected( "no", $feature_header_integration ); ?>><?php esc_html_e( 'No', 'corpus' ); ?></option>
							<option value="yes" <?php selected( "yes", $feature_header_integration ); ?>><?php esc_html_e( 'Yes', 'corpus' ); ?></option>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-header-style" class="eut-feature-section-item" <?php if ( "" == $feature_element || "slider" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-header-integration">
							<strong><?php esc_html_e( 'Header Style', 'corpus' ); ?></strong>
							<span>
								<?php esc_html_e( 'With this option you can change the coloring of your header.', 'corpus' ); ?>
							</span>
						</label>
					</th>
					<td>
						<select name="eut_page_feature_header_style" id="eut-page-feature-header-style">
							<?php eut_print_media_header_style_selection($feature_header_style); ?>
						</select>
					</td>
				</tr>
				<tr id="eut-feature-section-effect" class="eut-feature-section-item" <?php if ( "" == $feature_element || "map" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-effect">
							<strong><?php esc_html_e( 'Enable Parallax Effect', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-page-feature-effect" name="eut_page_feature_effect" value="parallax" <?php checked( $feature_effect, 'parallax' ); ?>/>
					</td>
				</tr>
				<tr id="eut-feature-section-go-to-section" class="eut-feature-section-item" <?php if ( "" == $feature_element || "map" == $feature_element || "slider" == $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="eut-page-feature-go-to-section">
							<strong><?php esc_html_e( 'Enable Bottom Arrow', 'corpus' ); ?></strong>
						</label>
					</th>
					<td>
						<input type="checkbox" id="eut-page-feature-go-to-section" name="eut_page_feature_go_to_section" value="yes" <?php checked( $feature_go_to_section, 'yes' ); ?>/>
					</td>
				</tr>

				<tr id="eut-feature-section-image" class="eut-feature-section-item" <?php if ( "image" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label><?php esc_html_e( 'Feature Image', 'corpus' ); ?></label>
					</th>
					<td>

						<?php if( empty( $image_item ) ) { ?>
						<input type="button" class="eut-upload-image-button button-primary" value="<?php esc_attr_e( 'Insert Image', 'corpus' ); ?>"/>
						<?php } else { ?>
						<input type="button" <?php disabled( true ); ?> class="eut-upload-image-button button-primary disabled" value="<?php esc_attr_e( 'Insert Image', 'corpus' ); ?>"/>
						<?php } ?>
						<span id="eut-upload-image-button-spinner" class="eut-action-spinner"></span>
					</td>
				</tr>
				<tr id="eut-feature-section-slider" class="eut-feature-section-item" <?php if ( "slider" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label><?php esc_html_e( 'Feature Slider', 'corpus' ); ?></label>
					</th>
					<td>
						<input type="button" class="eut-upload-feature-slider-button button-primary" value="<?php esc_attr_e( 'Insert Images to Slider', 'corpus' ); ?>"/>
						<span id="eut-upload-feature-slider-button-spinner" class="eut-action-spinner"></span>
					</td>
				</tr>
				<tr id="eut-feature-section-video" class="eut-feature-section-item" <?php if ( "video" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label><?php esc_html_e( 'Feature Video', 'corpus' ); ?></label>
					</th>
					<td>
					</td>
				</tr>
				<tr id="eut-feature-section-map" class="eut-feature-section-item" <?php if ( "map" != $feature_element ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label><?php esc_html_e( 'Feature Map', 'corpus' ); ?></label>
					</th>
					<td>
						<input type="button" id="eut-upload-multi-map-point" class="eut-upload-multi-map-point button-primary" value="<?php esc_attr_e( 'Insert Point to Map', 'corpus' ); ?>"/>
						<span id="eut-upload-multi-map-button-spinner" class="eut-action-spinner"></span>
					</td>
				</tr>
			</tbody>
		</table>
		<div id="eut-feature-image-container" data-mode="image" class="eut-feature-section-item" <?php if ( 'image' != $feature_element ) { ?> style="display:none;" <?php } ?>>
			<?php
				if( !empty( $image_item ) ) {
					eut_print_admin_feature_image_item( $image_item );
				}
			?>
		</div>
		<div id="eut-feature-slider-container" data-mode="slider-full" class="eut-feature-section-item" <?php if ( 'slider' != $feature_element ) { ?> style="display:none;" <?php } ?>>
			<?php
				if( !empty( $slider_items ) ) {
					eut_print_admin_feature_slider_items( $slider_items );
				}
			?>
		</div>

		<div id="eut-feature-title-container" class="eut-feature-section-item" <?php if ( 'title' != $feature_element ) { ?> style="display:none;" <?php } ?>>
			<div class="eut-title-item postbox">
				<h3 class="eut-title">
					<span><?php esc_html_e( 'Title', 'corpus' ); ?></span>
				</h3>
				<div class="inside">
					<ul class="eut-title-setting">
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Title', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_title" value="<?php echo esc_attr( eut_array_value( $title_item, 'title' ) ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Caption', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_caption" value="<?php echo esc_attr( eut_array_value( $title_item, 'caption' ) ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Title Color', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_title_color" class="wp-color-picker-field" value="<?php echo eut_array_value( $title_item, 'title_color',"#000000" ); ?>" data-default-color="#000000"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Caption Color', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_caption_color" class="wp-color-picker-field" value="<?php echo eut_array_value( $title_item, 'caption_color',"#000000" ); ?>" data-default-color="#000000"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Title Tag', 'corpus' ); ?></label>
								<select name="eut_title_item_title_tag">
									<?php
										$title_tag = eut_array_value( $title_item, 'title_tag', 'h1' );
										eut_print_media_tag_selection( $title_tag );
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Caption Tag', 'corpus' ); ?></label>
								<select name="eut_title_item_caption_tag">
									<?php
										$caption_tag = eut_array_value( $title_item, 'caption_tag', 'div' );
										eut_print_media_tag_selection( $caption_tag );
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Background Color', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_bg_color" class="wp-color-picker-field" value="<?php echo eut_array_value( $title_item, 'bg_color',"#f3f3f3" ); ?>" data-default-color="#f3f3f3"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Style', 'corpus' ); ?></label>
								<select name="eut_title_item_style">
									<?php
										$title_style = eut_array_value( $title_item, 'style', '' );
										eut_print_media_style_selection($title_style);
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Alignment', 'corpus' ); ?></label>
								<select name="eut_title_item_text_align">
									<?php
										$title_text_align = eut_array_value( $title_item, 'text_align', 'left-center' );
										eut_print_media_bg_position_selection( $title_text_align );
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Animation', 'corpus' ); ?></label>
								<select name="eut_title_item_text_animation">
									<?php
										$title_text_animation = eut_array_value( $title_item, 'text_animation', 'fade-in' );
										eut_print_media_text_animation_selection($title_text_animation);
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Bottom Arrow Color', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_arrow_color" class="wp-color-picker-field" value="<?php echo eut_array_value( $title_item, 'arrow_color',"#000000" ); ?>" data-default-color="#000000"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Bottom Arrow Alignment', 'corpus' ); ?></label>
								<select name="eut_title_item_arrow_align">
									<?php
										$arrow_align = eut_array_value( $title_item, 'arrow_align', 'left' );
										eut_print_media_align_selection( $arrow_align );
									?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Extra Class', 'corpus' ); ?></label>
								<input type="text" name="eut_title_item_el_class" value="<?php echo eut_array_value( $title_item, 'el_class' ); ?>"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div id="eut-feature-map-container" class="eut-feature-section-item" <?php if ( 'map' != $feature_element ) { ?> style="display:none;" <?php } ?>>
			<div class="eut-map-item postbox">
				<h3 class="eut-title">
					<span><?php esc_html_e( 'Map', 'corpus' ); ?></span>
				</h3>
				<div class="inside">
					<ul class="eut-map-setting">
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Single Point Zoom', 'corpus' ); ?></label>
								<select id="eut-page-feature-map-zoom" name="eut_page_feature_map_zoom">
									<?php for ( $i=1; $i < 20; $i++ ) { ?>
										<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $i, $map_zoom ); ?>><?php echo esc_html( $i ); ?></option>
									<?php } ?>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Global Marker', 'corpus' ); ?></label>
								<input type="text" class="eut-upload-simple-media-field" id="eut-page-feature-map-marker" name="eut_page_feature_map_marker" value="<?php echo esc_attr( $map_marker ); ?>"/>
								<label></label>
								<input type="button" data-media-type="image" class="eut-upload-simple-media-button button-primary" value="<?php esc_attr_e( 'Insert Marker', 'corpus' ); ?>"/>
								<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<?php eut_print_admin_feature_map_items( $map_items ); ?>
		</div>
		<div id="eut-feature-video-container" class="eut-feature-section-item" <?php if ( 'video' != $feature_element ) { ?> style="display:none;" <?php } ?>>
			<div class="eut-video-item postbox">
				<span class="eut-modal-spinner"></span>
				<h3 class="eut-title">
					<span><?php esc_html_e( 'Video', 'corpus' ); ?></span>
				</h3>
				<div class="inside">
					<ul class="eut-video-setting">
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'WebM File URL', 'corpus' ); ?></label>
								<input type="text" id="eut-page-feature-video-webm" class="eut-upload-simple-media-field eut-meta-text" name="eut_video_item_webm" value="<?php echo esc_attr( $video_webm ); ?>"/>
								<label></label>
								<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
								<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'MP4 File URL', 'corpus' ); ?></label>
								<input type="text" id="eut-page-feature-video-mp4" class="eut-upload-simple-media-field eut-meta-text" name="eut_video_item_mp4" value="<?php echo esc_attr( $video_mp4 ); ?>"/>
								<label></label>
								<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
								<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'OGV File URL', 'corpus' ); ?></label>
								<input type="text" id="eut-page-feature-video-ogv" class="eut-upload-simple-media-field eut-meta-text" name="eut_video_item_ogv" value="<?php echo esc_attr( $video_ogv ); ?>"/>
								<label></label>
								<input type="button" data-media-type="video" class="eut-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'corpus' ); ?>"/>
								<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label>
									<?php esc_html_e( 'Fallback Image', 'corpus' ); ?>
									<span>
										<?php esc_html_e( 'Use same resolution as video.', 'corpus' ); ?>
									</span>
								</label>
								<input type="text" id="eut-page-feature-video-bg-image" class="eut-upload-simple-media-field"  name="eut_video_item_bg_image" value="<?php echo esc_attr( $video_bg_image ); ?>"/>
								<label></label>
								<input type="button" data-media-type="image" class="eut-upload-simple-media-button button-primary" value="<?php esc_attr_e( 'Upload Image', 'corpus' ); ?>"/>
								<input type="button" class="eut-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'corpus' ); ?>"/>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Use Fallback Image as Poster', 'corpus' ); ?></label>
								<select name="eut_video_item_poster">
									<option value="yes" <?php selected( 'yes', $video_poster ); ?>><?php esc_html_e( 'Yes', 'corpus' ); ?></option>
									<option value="no" <?php selected( 'no', $video_poster ); ?>><?php esc_html_e( 'No', 'corpus' ); ?></option>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Loop', 'corpus' ); ?></label>
								<select name="eut_video_item_loop">
									<option value="yes" <?php selected( 'yes', $video_loop ); ?>><?php esc_html_e( 'Yes', 'corpus' ); ?></option>
									<option value="no" <?php selected( 'no', $video_loop ); ?>><?php esc_html_e( 'No', 'corpus' ); ?></option>
								</select>
							</div>
						</li>
						<li>
							<div class="eut-setting">
								<label><?php esc_html_e( 'Muted', 'corpus' ); ?></label>
								<select name="eut_video_item_muted">
									<option value="yes" <?php selected( 'yes', $video_muted ); ?>><?php esc_html_e( 'Yes', 'corpus' ); ?></option>
									<option value="no" <?php selected( 'no', $video_muted ); ?>><?php esc_html_e( 'No', 'corpus' ); ?></option>
								</select>
							</div>
						</li>
					</ul>
					<?php eut_print_admin_feature_video_item( $video_item ); ?>
				</div>
			</div>
		</div>

<?php
}

function eut_admin_save_feature_section( $post_id ) {

	//Feature Slider Items
	$slider_items = array();
	if ( isset( $_POST['eut_slider_item_id'] ) ) {

		$num_of_images = sizeof( $_POST['eut_slider_item_id'] );
		for ( $i=0; $i < $num_of_images; $i++ ) {

			$this_image = array (
				'id' => $_POST['eut_slider_item_id'][ $i ],
				'title' => $_POST['eut_slider_item_title'][ $i ],
				'caption' => $_POST['eut_slider_item_caption'][ $i ],
				'text_align' => $_POST['eut_slider_item_text_align'][ $i ],
				'text_animation' => $_POST['eut_slider_item_text_animation'][ $i ],
				'bg_position' => $_POST['eut_slider_item_bg_position'][ $i ],
				'style' => $_POST['eut_slider_item_style'][ $i ],
				'title_color' => $_POST['eut_slider_item_title_color'][ $i ],
				'caption_color' => $_POST['eut_slider_item_caption_color'][ $i ],
				'title_tag' => $_POST['eut_slider_item_title_tag'][ $i ],
				'caption_tag' => $_POST['eut_slider_item_caption_tag'][ $i ],
				'pattern_overlay' => $_POST['eut_slider_item_pattern_overlay'][ $i ],
				'color_overlay' => $_POST['eut_slider_item_color_overlay'][ $i ],
				'opacity_overlay' => $_POST['eut_slider_item_opacity_overlay'][ $i ],
				'header_style' => $_POST['eut_slider_item_header_style'][ $i ],
				'arrow_color' => $_POST['eut_slider_item_arrow_color'][ $i ],
				'arrow_align' => $_POST['eut_slider_item_arrow_align'][ $i ],
				'el_class' => $_POST['eut_slider_item_el_class'][ $i ],
				'button_text' => $_POST['eut_slider_item_button_text'][ $i ],
				'button_url' => $_POST['eut_slider_item_button_url'][ $i ],
				'button_target' => $_POST['eut_slider_item_button_target'][ $i ],
				'button_color' => $_POST['eut_slider_item_button_color'][ $i ],
				'button_size' => $_POST['eut_slider_item_button_size'][ $i ],
				'button_shape' => $_POST['eut_slider_item_button_shape'][ $i ],
				'button_type' => $_POST['eut_slider_item_button_type'][ $i ],
				'button_class' => $_POST['eut_slider_item_button_class'][ $i ],
				'button_text2' => $_POST['eut_slider_item_button2_text'][ $i ],
				'button_url2' => $_POST['eut_slider_item_button2_url'][ $i ],
				'button_target2' => $_POST['eut_slider_item_button2_target'][ $i ],
				'button_color2' => $_POST['eut_slider_item_button2_color'][ $i ],
				'button_size2' => $_POST['eut_slider_item_button2_size'][ $i ],
				'button_shape2' => $_POST['eut_slider_item_button2_shape'][ $i ],
				'button_type2' => $_POST['eut_slider_item_button2_type'][ $i ],
				'button_class2' => $_POST['eut_slider_item_button2_class'][ $i ],
			);
			array_push( $slider_items, $this_image );
		}

	}

	if( empty( $slider_items ) ) {
		delete_post_meta( $post_id, 'eut_page_slider_items' );
		delete_post_meta( $post_id, 'eut_page_slider_settings' );
	} else{
		update_post_meta( $post_id, 'eut_page_slider_items', $slider_items );

		$slider_settings = array (
			'slideshow_speed' => $_POST['eut_page_slider_settings_speed'],
			'direction_nav' => $_POST['eut_page_slider_settings_direction_nav'],
			'direction_nav_color' => $_POST['eut_page_slider_settings_direction_nav_color'],
			'slider_pause' => $_POST['eut_page_slider_settings_pause'],
			'transition' => $_POST['eut_page_slider_settings_transition'],
		);
		update_post_meta( $post_id, 'eut_page_slider_settings', $slider_settings );
	}

	//Feature Map Items
	$map_items = array();
	if ( isset( $_POST['eut_map_item_point_id'] ) ) {

		$num_of_map_points = sizeof( $_POST['eut_map_item_point_id'] );
		for ( $i=0; $i < $num_of_map_points; $i++ ) {

			$this_point = array (
				'id' => $_POST['eut_map_item_point_id'][ $i ],
				'lat' => $_POST['eut_map_item_point_lat'][ $i ],
				'lng' => $_POST['eut_map_item_point_lng'][ $i ],
				'marker' => $_POST['eut_map_item_point_marker'][ $i ],
				'title' => $_POST['eut_map_item_point_title'][ $i ],
				'info_text' => $_POST['eut_map_item_point_infotext'][ $i ],
				'button_text' => $_POST['eut_map_item_point_button_text'][ $i ],
				'button_url' => $_POST['eut_map_item_point_button_url'][ $i ],
				'button_target' => $_POST['eut_map_item_point_button_target'][ $i ],
				'button_class' => $_POST['eut_map_item_point_button_class'][ $i ],
			);
			array_push( $map_items, $this_point );
		}

	}

	if( empty( $map_items ) ) {
		delete_post_meta( $post_id, 'eut_page_map_items' );
		delete_post_meta( $post_id, 'eut_page_map_settings' );
	} else{
		update_post_meta( $post_id, 'eut_page_map_items', $map_items );
		$map_settings = array (
			'zoom' => $_POST['eut_page_feature_map_zoom'],
			'marker' => $_POST['eut_page_feature_map_marker'],
		);
		update_post_meta( $post_id, 'eut_page_map_settings', $map_settings );
	}


	//Feature Image Item
	if ( isset( $_POST['eut_image_item_id'] ) ) {

		$image_item = array (
			'id' => $_POST['eut_image_item_id'],
			'title' => $_POST['eut_image_item_title'],
			'caption' => $_POST['eut_image_item_caption'],
			'text_align' => $_POST['eut_image_item_text_align'],
			'text_animation' => $_POST['eut_image_item_text_animation'],
			'bg_position' => $_POST['eut_image_item_bg_position'],
			'style' => $_POST['eut_image_item_style'],
			'title_color' => $_POST['eut_image_item_title_color'],
			'caption_color' => $_POST['eut_image_item_caption_color'],
			'title_tag' => $_POST['eut_image_item_title_tag'],
			'caption_tag' => $_POST['eut_image_item_caption_tag'],
			'pattern_overlay' => $_POST['eut_image_item_pattern_overlay'],
			'color_overlay' => $_POST['eut_image_item_color_overlay'],
			'opacity_overlay' => $_POST['eut_image_item_opacity_overlay'],
			'arrow_color' => $_POST['eut_image_item_arrow_color'],
			'arrow_align' => $_POST['eut_image_item_arrow_align'],
			'el_class' => $_POST['eut_image_item_el_class'],
			'button_text' => $_POST['eut_image_item_button_text'],
			'button_url' => $_POST['eut_image_item_button_url'],
			'button_target' => $_POST['eut_image_item_button_target'],
			'button_color' => $_POST['eut_image_item_button_color'],
			'button_size' => $_POST['eut_image_item_button_size'],
			'button_shape' => $_POST['eut_image_item_button_shape'],
			'button_type' => $_POST['eut_image_item_button_type'],
			'button_class' => $_POST['eut_image_item_button_class'],
			'button_text2' => $_POST['eut_image_item_button2_text'],
			'button_url2' => $_POST['eut_image_item_button2_url'],
			'button_target2' => $_POST['eut_image_item_button2_target'],
			'button_color2' => $_POST['eut_image_item_button2_color'],
			'button_size2' => $_POST['eut_image_item_button2_size'],
			'button_shape2' => $_POST['eut_image_item_button2_shape'],
			'button_type2' => $_POST['eut_image_item_button2_type'],
			'button_class2' => $_POST['eut_image_item_button2_class'],
		);
		update_post_meta( $post_id, 'eut_page_image_item', $image_item );

	} else {
		delete_post_meta( $post_id, 'eut_page_image_item' );
	}

	//Feature Title Item
	if ( isset( $_POST['eut_title_item_title'] ) ) {

		$text_item = array (
			'title' => $_POST['eut_title_item_title'],
			'caption' => $_POST['eut_title_item_caption'],
			'style' => $_POST['eut_title_item_style'],
			'text_align' => $_POST['eut_title_item_text_align'],
			'text_animation' => $_POST['eut_title_item_text_animation'],
			'bg_color' => $_POST['eut_title_item_bg_color'],
			'title_color' => $_POST['eut_title_item_title_color'],
			'caption_color' => $_POST['eut_title_item_caption_color'],
			'title_tag' => $_POST['eut_title_item_title_tag'],
			'caption_tag' => $_POST['eut_title_item_caption_tag'],
			'arrow_color' => $_POST['eut_title_item_arrow_color'],
			'arrow_align' => $_POST['eut_title_item_arrow_align'],
			'el_class' => $_POST['eut_title_item_el_class'],
		);
		update_post_meta( $post_id, 'eut_page_title_item', $text_item );

	} else {
		delete_post_meta( $post_id, 'eut_page_title_item' );
	}

	//Feature Video Item
	if ( isset( $_POST['eut_video_item_title'] ) ) {

		$video_item = array (
			'title' => $_POST['eut_video_item_title'],
			'caption' => $_POST['eut_video_item_caption'],
			'text_align' => $_POST['eut_video_item_text_align'],
			'text_animation' => $_POST['eut_video_item_text_animation'],
			'style' => $_POST['eut_video_item_style'],
			'title_color' => $_POST['eut_video_item_title_color'],
			'caption_color' => $_POST['eut_video_item_caption_color'],
			'title_tag' => $_POST['eut_video_item_title_tag'],
			'caption_tag' => $_POST['eut_video_item_caption_tag'],
			'pattern_overlay' => $_POST['eut_video_item_pattern_overlay'],
			'color_overlay' => $_POST['eut_video_item_color_overlay'],
			'opacity_overlay' => $_POST['eut_video_item_opacity_overlay'],
			'video_webm' => $_POST['eut_video_item_webm'],
			'video_mp4' => $_POST['eut_video_item_mp4'],
			'video_ogv' => $_POST['eut_video_item_ogv'],
			'video_bg_image' => $_POST['eut_video_item_bg_image'],
			'video_poster' => $_POST['eut_video_item_poster'],
			'video_loop' => $_POST['eut_video_item_loop'],
			'video_muted' => $_POST['eut_video_item_muted'],
			'arrow_color' => $_POST['eut_video_item_arrow_color'],
			'arrow_align' => $_POST['eut_video_item_arrow_align'],
			'el_class' => $_POST['eut_video_item_el_class'],
			'button_text' => $_POST['eut_video_item_button_text'],
			'button_url' => $_POST['eut_video_item_button_url'],
			'button_target' => $_POST['eut_video_item_button_target'],
			'button_color' => $_POST['eut_video_item_button_color'],
			'button_size' => $_POST['eut_video_item_button_size'],
			'button_shape' => $_POST['eut_video_item_button_shape'],
			'button_type' => $_POST['eut_video_item_button_type'],
			'button_class' => $_POST['eut_video_item_button_class'],
			'button_text2' => $_POST['eut_video_item_button2_text'],
			'button_url2' => $_POST['eut_video_item_button2_url'],
			'button_target2' => $_POST['eut_video_item_button2_target'],
			'button_color2' => $_POST['eut_video_item_button2_color'],
			'button_size2' => $_POST['eut_video_item_button2_size'],
			'button_shape2' => $_POST['eut_video_item_button2_shape'],
			'button_type2' => $_POST['eut_video_item_button2_type'],
			'button_class2' => $_POST['eut_video_item_button2_class'],
		);
		update_post_meta( $post_id, 'eut_page_video_item', $video_item );

	} else {
		delete_post_meta( $post_id, 'eut_page_video_item' );
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
