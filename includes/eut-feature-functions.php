<?php

/*
*	Feature Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/


/**
 * Get Header Feature Section Data
 */

function eut_get_feature_data() {
	global $post;

	$feature_data_fullscreen = 'no';
	$feature_data_overlap = 'no';
	$feature_data_header_position = 'above-feature';
	$feature_header_style = 'default';

	$feature_size = '';

	if ( is_singular() ) {

		$post_id = $post->ID;
		$post_id = apply_filters( 'eut_post_meta_id', $post_id );
		$post_type = get_post_type( $post_id );

		if (( $post_type == 'page' && is_singular( 'page' ) ) ||
			( $post_type == 'portfolio' && is_singular( 'portfolio' ) ) ||
			( $post_type == 'post' && is_singular( 'post' ) ) ) {

			$feature_element = get_post_meta( $post_id, 'eut_page_feature_element', true );
			if ( !empty( $feature_element ) ) {
				$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
				$feature_header_position = get_post_meta( $post_id, 'eut_page_feature_header_position', true );
				if ( 'below' == $feature_header_position ) {
					$feature_data_header_position = 'below-feature';
				}
				$feature_header_integration = get_post_meta( $post_id, 'eut_page_feature_header_integration', true );
				if ( empty($feature_size) ) {
					$feature_data_fullscreen = 'yes';
				}
				$feature_data_overlap = !empty( $feature_header_integration ) ? $feature_header_integration : 'no';
				if ( 'slider' == $feature_element ) {
					$slider_items = get_post_meta( $post_id, 'eut_page_slider_items', true );
					if ( !empty( $slider_items ) ) {
						$feature_header_style = isset( $slider_items[0]['header_style'] ) && 'yes' == $feature_data_overlap ? $slider_items[0]['header_style'] : 'default';
					}
				} else {
					$feature_header_style = get_post_meta( $post_id, 'eut_page_feature_header_style', true );
					if ( empty( $feature_header_style ) ) {
						$feature_header_style = 'default';
					}
				}
			}
		}
	}

	$header_styles = array( 'default', 'dark', 'light' );
	if ( !in_array( $feature_header_style, $header_styles ) ) {
		$feature_header_style = 'default';
	}

	return array(
		'data_fullscreen' => $feature_data_fullscreen,
		'data_overlap' => $feature_data_overlap,
		'data_header_position' => $feature_data_header_position,
		'header_style' => 'eut-' . $feature_header_style,
	);

}

/**
 * Prints Header Feature Section Page/Post/Portfolio
 */
function eut_print_header_feature() {
	global $post;


	if ( is_singular() ) {


		$post_id = $post->ID;
		$post_id = apply_filters( 'eut_post_meta_id', $post_id );
		$post_type = get_post_type( $post_id );

		if (( $post_type == 'page' && is_singular( 'page' ) ) ||
			( $post_type == 'portfolio' && is_singular( 'portfolio' ) ) ||
			( $post_type == 'post' && is_singular( 'post' ) ) ) {

			$feature_element = get_post_meta( $post_id, 'eut_page_feature_element', true );
			if ( !empty( $feature_element ) ) {

				switch( $feature_element ) {

					case 'image':
						$image_item = get_post_meta( $post_id, 'eut_page_image_item', true );
						if ( !empty( $image_item ) ) {
							eut_print_header_feature_image( $post_id, $image_item );
						}
						break;
					case 'video':
						$video_item = get_post_meta( $post_id, 'eut_page_video_item', true );
						if ( !empty( $video_item ) ) {
							eut_print_header_feature_video( $post_id, $video_item );
						}
						break;
					case 'slider':
						$slider_items = get_post_meta( $post_id, 'eut_page_slider_items', true );
						if ( !empty( $slider_items ) ) {
							eut_print_header_feature_slider( $post_id, $slider_items );
						}
						break;
					case 'revslider':
						$revslider_alias = get_post_meta( $post_id, 'eut_page_feature_revslider', true );
						if ( !empty( $revslider_alias ) ) {
							eut_print_header_feature_revslider( $post_id, $revslider_alias );
						}
						break;
					case 'title':
						$title_item = get_post_meta( $post_id, 'eut_page_title_item', true );
						if ( !empty( $title_item ) ) {
							eut_print_header_feature_title( $post_id, $title_item );
						}
						break;
					case 'map':
						$map_items = get_post_meta( $post_id, 'eut_page_map_items', true );
						if ( !empty( $map_items ) ) {
							eut_print_header_feature_map( $post_id, $map_items );
						}
						break;
					default:
						break;

				}
			}
		}
	}
}

/**
 * Prints Overlay Container
 */
function eut_print_overlay_container( $pattern_overlay, $color_overlay, $opacity_overlay  ) {

	$overlay_classes = array();

	if ( !empty ( $pattern_overlay ) ) {
		array_push( $overlay_classes, 'eut-pattern');
	}
	if ( !empty ( $color_overlay ) ) {
		array_push( $overlay_classes, 'eut-' . $color_overlay . '-overlay');
	}
	if ( !empty ( $opacity_overlay ) ) {
		array_push( $overlay_classes, 'eut-overlay-' . $opacity_overlay );
	}

	$overlay_string = implode( ' ', $overlay_classes );
	if ( !empty ( $overlay_string ) ) {
		echo '<div class="' . esc_attr( $overlay_string ) . '"></div>';
	}
}

/**
 * Prints Background Image Container
 */
if ( !function_exists('eut_print_bg_image_container') ) {
	function eut_print_bg_image_container( $media_id, $bg_position = 'center-center' ) {

		$full_src = wp_get_attachment_image_src( $media_id, 'eut-image-fullscreen' );
		$image_url = esc_url( $full_src[0] );

		echo '<div class="eut-bg-image eut-bg-position-' . esc_attr( $bg_position ) . '" style="background-image: url(' . $image_url . ');"></div>';

	}
}


/**
 * Prints Background Video Container
 */
function eut_print_bg_video_container( $video_item ) {

	$video_webm = eut_array_value( $video_item, 'video_webm' );
	$video_mp4 = eut_array_value( $video_item, 'video_mp4' );
	$video_ogv = eut_array_value( $video_item, 'video_ogv' );
	$video_bg_image = eut_array_value( $video_item, 'video_bg_image' );
	$video_loop = eut_array_value( $video_item, 'video_loop', 'yes' );
	$video_muted = eut_array_value( $video_item, 'video_muted', 'yes' );
	$video_poster = eut_array_value( $video_item, 'video_poster', 'no' );

	$video_attr = $poster = '';

	if ( !empty( $video_bg_image ) ) {

		echo '<div class="eut-bg-image" style="background-image: url(' . esc_url( $video_bg_image ) . ');"></div>';
		if ( 'yes' == $video_poster ) {
			$poster = $video_bg_image;
		}
	}

	$video_settings = array(
		'controls' => 'no',
		'preload' => 'auto',
		'autoplay' => 'yes',
		'poster' => $poster,
		'loop' => $video_loop,
		'muted' => $video_muted,
	);

	$video_settings = apply_filters( 'eut_feature_video_settings', $video_settings );
	$video_attr = eut_print_media_video_settings( $video_settings );


	if ( !empty ( $video_webm ) || !empty ( $video_mp4 ) || !empty ( $video_ogv ) ) {
?>
		<div class="eut-bg-video">
			<video <?php echo eut_print_media_video_settings( $video_settings );?>>
			<?php if ( !empty ( $video_webm ) ) { ?>
				<source src="<?php echo esc_url( $video_webm ); ?>" type="video/webm">
			<?php } ?>
			<?php if ( !empty ( $video_mp4 ) ) { ?>
				<source src="<?php echo esc_url( $video_mp4 ); ?>" type="video/mp4">
			<?php } ?>
			<?php if ( !empty ( $video_ogv ) ) { ?>
				<source src="<?php echo esc_url( $video_ogv ); ?>" type="video/ogg">
			<?php } ?>
			</video>
		</div>
<?php

	}

}

/**
 * Get Feature Section Data/Style
 */

function eut_get_feature_data_style( $feature_size, $feature_height , $bg_color = '' ) {

	$feature_data_style = '';

	if ( !empty($feature_size) ) {
		if ( empty( $feature_height ) ) {
			$feature_height = "550";
		}
		if ( !empty($bg_color) ) {
			$feature_data_style = 'data-height="' . esc_attr( $feature_height ) . '" style="height:' . esc_attr( $feature_height ) . 'px; background-color: ' . esc_attr( $bg_color ) . ';"';
		} else {
			$feature_data_style = 'data-height="' . esc_attr( $feature_height ) . '" style="height:' . esc_attr( $feature_height ) . 'px;"';
		}
	} else {
		if ( !empty($bg_color) ) {
			$feature_data_style = 'style="background-color: ' . esc_attr( $bg_color ) . ';"';
		}
	}

	return $feature_data_style;
}

/**
 * Get Feature Section Style
 */
function eut_get_feature_style( $feature_size, $feature_height ) {

	$feature_style = '';

	if ( !empty($feature_size) ) {
		$feature_style = 'style="height:' . esc_attr( $feature_height ) . 'px;"';
	}
	return $feature_style;
}

/**
 * Prints Simple Header Feature Revolution Slider ( Post/Portfolio )
 */
function eut_print_header_feature_revslider( $post_id, $revslider_alias ) {

	$feature_header_style = get_post_meta( $post_id, 'eut_page_feature_header_style', true );
	$feature_go_to_section = get_post_meta( $post_id, 'eut_page_feature_go_to_section', true );
?>
	<div id="eut-feature-section">
		<div class="eut-feature-section-inner" data-item="revslider">
			<div class="eut-feature-element eut-revslider">
				<?php echo do_shortcode( '[rev_slider ' . $revslider_alias . ']' ); ?>
				<?php eut_print_feature_go_to_section( 'revslider', $feature_go_to_section, $feature_header_style, 'center' ); ?>
			</div>
		</div>
	</div>
<?php

}

/**
 * Prints Header Section Feature content
 */
function eut_print_header_feature_content( $item  ) {

	$title = eut_array_value( $item, 'title' );
	$caption = eut_array_value( $item, 'caption' );
	$title_color = eut_array_value( $item, 'title_color', 'dark' );
	$caption_color = eut_array_value( $item, 'caption_color', 'dark' );
	$title_tag = eut_array_value( $item, 'title_tag', 'h1' );
	$caption_tag = eut_array_value( $item, 'caption_tag', 'div' );
?>
	<?php if ( !empty( $title ) ) { ?>
	<<?php echo esc_attr( $title_tag ); ?> class="eut-title eut-<?php echo esc_attr( $title_color ); ?>"><span><?php echo wp_kses_post( $title ); ?></span></<?php echo esc_attr( $title_tag ); ?>>
	<?php } ?>
	<?php if ( !empty( $caption ) ) { ?>
	<<?php echo esc_attr( $caption_tag ); ?> class="eut-description eut-<?php echo esc_attr( $caption_color ); ?>"><?php echo wp_kses_post( $caption ); ?></<?php echo esc_attr( $caption_tag ); ?>>
	<?php } ?>
<?php
}


/**
 * Prints Header Section Feature Image
 */
function eut_print_header_feature_title( $post_id, $title_item  ) {

	$title_item = apply_filters( 'eut_feature_title_item', $title_item );

	$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
	$feature_height = get_post_meta( $post_id, 'eut_page_feature_height', true );
	$text_align = eut_array_value( $title_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $title_item, 'text_animation', 'fade-in' );
	$title = eut_array_value( $title_item, 'title' );
	$caption = eut_array_value( $title_item, 'caption' );
	$title_color = eut_array_value( $title_item, 'title_color', '#000000' );
	$caption_color = eut_array_value( $title_item, 'caption_color', '#000000' );
	$title_tag = eut_array_value( $title_item, 'title_tag', 'h1' );
	$caption_tag = eut_array_value( $title_item, 'caption_tag', 'div' );
	$bg_color = eut_array_value( $title_item, 'bg_color', '#f3f3f3' );

	$style = eut_array_value( $title_item, 'style', 'default' );
	$arrow_color = eut_array_value( $title_item, 'arrow_color', '#000000' );
	$arrow_align = eut_array_value( $title_item, 'arrow_align', 'left' );
	$el_class = eut_array_value( $title_item, 'el_class' );

	$feature_go_to_section = get_post_meta( $post_id, 'eut_page_feature_go_to_section', true );
	$feature_effect = get_post_meta( $post_id, 'eut_page_feature_effect', true );
	if ( empty( $feature_effect ) ) {
		$feature_effect = "none";
	}
?>
	<div id="eut-feature-section" class="<?php echo esc_attr( $el_class ); ?>" data-effect="<?php echo esc_attr( $feature_effect ); ?>" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?>>

		<div class="eut-feature-section-inner" data-item="title" <?php echo eut_get_feature_data_style( $feature_size, $feature_height , $bg_color ); ?>>

			<!-- Custom Title -->
			<div id="eut-feature-title" class="eut-feature-content eut-align-<?php echo esc_attr( $text_align ); ?> eut-style-<?php echo esc_attr( $style ); ?> eut-<?php echo esc_attr( $text_animation ); ?>">
				<div class="eut-container">
					<?php if ( !empty( $title ) ) { ?>
					<<?php echo esc_attr( $title_tag ); ?> class="eut-title" style="color:<?php echo esc_attr( $title_color ); ?>"><span><?php echo wp_kses_post( $title ); ?></span></<?php echo esc_attr( $title_tag ); ?>>
					<?php } ?>
					<?php if ( !empty( $caption ) ) { ?>
					<<?php echo esc_attr( $caption_tag ); ?> class="eut-description" style="color:<?php echo esc_attr( $caption_color ); ?>"><?php echo wp_kses_post( $caption ); ?></<?php echo esc_attr( $caption_tag ); ?>>
					<?php } ?>
				</div>
			</div>
			<!-- End Custom Title -->
			<?php eut_print_feature_go_to_section( 'title', $feature_go_to_section, $arrow_color, $arrow_align ); ?>
		</div>

	</div>
<?php
}

/**
 * Prints Header Section Feature Video
 */
function eut_print_header_feature_video( $post_id, $video_item  ) {

	$video_item = apply_filters( 'eut_feature_video_item', $video_item );

	$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
	$feature_height = get_post_meta( $post_id, 'eut_page_feature_height', true );

	$text_align = eut_array_value( $video_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $video_item, 'text_animation', 'fade-in' );
	$title_color = eut_array_value( $video_item, 'title_color', 'dark' );
	$arrow_color = eut_array_value( $video_item, 'arrow_color', 'dark' );
	$arrow_align = eut_array_value( $video_item, 'arrow_align', 'left' );

	$style = eut_array_value( $video_item, 'style', 'default' );
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

	$feature_go_to_section = get_post_meta( $post_id, 'eut_page_feature_go_to_section', true );
	$feature_effect = get_post_meta( $post_id, 'eut_page_feature_effect', true );
	if ( empty( $feature_effect ) ) {
		$feature_effect = "none";
	}
?>
	<div id="eut-feature-section" class="<?php echo esc_attr( $el_class ); ?>" data-effect="<?php echo esc_attr( $feature_effect ); ?>" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?>>

		<div class="eut-feature-section-inner" data-item="video" <?php echo eut_get_feature_data_style( $feature_size, $feature_height ); ?>>
			<!-- Custom Title -->
			<div id="eut-feature-title" class="eut-feature-content eut-align-<?php echo esc_attr( $text_align ); ?> eut-style-<?php echo esc_attr( $style ); ?> eut-<?php echo esc_attr( $text_animation ); ?>">
				<div class="eut-container">
					<?php eut_print_header_feature_content( $video_item  ); ?>
					<?php if( !empty( $button_text ) || !empty( $button_text2 ) ) { ?>
					<div class="eut-button-wrapper">
						<?php eut_print_feature_button( $button_text, $button_url, $button_type, $button_size, $button_color, $button_shape, $button_target, $button_class ); ?>
						<?php eut_print_feature_button( $button_text2, $button_url2, $button_type2, $button_size2, $button_color2, $button_shape2, $button_target2, $button_class2 ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="eut-bg-wrapper">
				<?php
					eut_print_overlay_container( $pattern_overlay, $color_overlay, $opacity_overlay  );
					eut_print_bg_video_container( $video_item );
				?>
			</div>
			<?php eut_print_feature_go_to_section( 'video', $feature_go_to_section, $arrow_color, $arrow_align ); ?>
		</div>

	</div>
<?php
}

/**
 * Prints Header Section Feature Image ( Page / Portfolio )
 */
function eut_print_header_feature_image( $post_id, $image_item ) {

	$image_item = apply_filters( 'eut_feature_image_item', $image_item );

	$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
	$feature_height = get_post_meta( $post_id, 'eut_page_feature_height', true );


	$media_id = $image_item['id'];

	$text_align = eut_array_value( $image_item, 'text_align', 'left-center' );
	$text_animation = eut_array_value( $image_item, 'text_animation', 'fade-in' );
	$title_color = eut_array_value( $image_item, 'title_color', 'dark' );
	$arrow_color = eut_array_value( $image_item, 'arrow_color', 'dark' );
	$arrow_align = eut_array_value( $image_item, 'arrow_align', 'left' );

	$bg_position = eut_array_value( $image_item, 'bg_position', 'center-center' );
	$style = eut_array_value( $image_item, 'style', 'default' );
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

	$feature_go_to_section = get_post_meta( $post_id, 'eut_page_feature_go_to_section', true );
	$feature_effect = get_post_meta( $post_id, 'eut_page_feature_effect', true );
	if ( empty( $feature_effect ) ) {
		$feature_effect = "none";
	}
?>
	<div id="eut-feature-section" class="<?php echo esc_attr( $el_class ); ?>" data-effect="<?php echo esc_attr( $feature_effect ); ?>" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?>>

		<div class="eut-feature-section-inner" data-item="image" <?php echo eut_get_feature_data_style( $feature_size, $feature_height ); ?>>
			<!-- Custom Title -->
			<div id="eut-feature-title" class="eut-feature-content eut-align-<?php echo esc_attr( $text_align ); ?> eut-style-<?php echo esc_attr( $style ); ?> eut-<?php echo esc_attr( $text_animation ); ?>">
				<div class="eut-container">
					<?php eut_print_header_feature_content( $image_item  ); ?>
					<?php if( !empty( $button_text ) || !empty( $button_text2 ) ) { ?>
					<div class="eut-button-wrapper">
						<?php eut_print_feature_button( $button_text, $button_url, $button_type, $button_size, $button_color, $button_shape, $button_target, $button_class ); ?>
						<?php eut_print_feature_button( $button_text2, $button_url2, $button_type2, $button_size2, $button_color2, $button_shape2, $button_target2, $button_class2 ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- End Custom Title -->
			<div class="eut-bg-wrapper">
			<?php
				eut_print_overlay_container( $pattern_overlay, $color_overlay, $opacity_overlay  );
				eut_print_bg_image_container( $media_id, $bg_position );
			?>
			</div>
			<?php eut_print_feature_go_to_section( 'image', $feature_go_to_section, $arrow_color, $arrow_align ); ?>
		</div>

	</div>
<?php
}

/**
 * Get slider settings data ( Page / Portfolio )
 */
function eut_get_slider_settings_data( $slider_settings ) {
	$slider_data = '';

	if ( !empty( $slider_settings ) ) {

		$slider_speed = eut_array_value( $slider_settings, 'slideshow_speed', '3500' );
		$slider_pause = eut_array_value( $slider_settings, 'slider_pause', 'no' );
		$slider_transition = eut_array_value( $slider_settings, 'transition', 'slide' );

		$slider_data .= ' data-slider-speed="' . esc_attr( $slider_speed ) . '"';
		$slider_data .= ' data-slider-pause="' . esc_attr( $slider_pause ) . '"';
		$slider_data .= ' data-slider-transition="' . esc_attr( $slider_transition ) . '"';

	}
	return $slider_data;
}

/**
 * Prints Advanced Header Feature Slider ( Page / Portfolio / Post )
 */
function eut_print_header_feature_slider( $post_id, $slider_items ) {

	$slider_items = apply_filters( 'eut_feature_slider_items', $slider_items );

	$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
	$feature_height = get_post_meta( $post_id, 'eut_page_feature_height', true );
	$slider_settings = get_post_meta( $post_id, 'eut_page_slider_settings', true );

	$slider_dir_nav = eut_array_value( $slider_settings, 'direction_nav', '1' );
	$slider_dir_nav_color = eut_array_value( $slider_settings, 'direction_nav_color', 'light' );
	$slider_nav_advanced = eut_array_value( $slider_settings, 'nav_advanced' );

	$feature_go_to_section = get_post_meta( $post_id, 'eut_page_feature_go_to_section', true );
	$feature_effect = get_post_meta( $post_id, 'eut_page_feature_effect', true );
	if ( empty( $feature_effect ) ) {
		$feature_effect = "none";
	}

?>
	<div id="eut-feature-section" data-effect="<?php echo esc_attr( $feature_effect ); ?>" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?>>
		<div class="eut-feature-section-inner eut-carousel-wrapper" <?php echo eut_get_feature_data_style( $feature_size, $feature_height ); ?> data-item="slider">

<?php
		if ( 0 != $slider_dir_nav ) {
?>
			<div class="eut-carousel-navigation eut-<?php echo esc_attr( $slider_dir_nav_color ); ?>" data-navigation-type="<?php echo esc_attr( $slider_dir_nav ); ?>">
				<div class="eut-carousel-buttons">
					<div class="eut-carousel-prev eut-icon-nav-left"></div>
					<div class="eut-carousel-next eut-icon-nav-right"></div>
				</div>
			</div>
<?php
		}
?>
			<div id="eut-feature-slider" class="eut-slider" <?php echo eut_get_slider_settings_data( $slider_settings ); ?>>

<?php
			$index = 0;
			$first_slide_arrow_color = "dark";
			$first_slide_arrow_align = "left";

			foreach ( $slider_items as $slider_item ) {
				$media_id = $slider_item['id'];

				$text_align = eut_array_value( $slider_item, 'text_align', 'left-center' );
				$text_animation = eut_array_value( $slider_item, 'text_animation', 'fade-in' );
				$arrow_color = eut_array_value( $slider_item, 'arrow_color', 'dark' );
				$arrow_align = eut_array_value( $slider_item, 'arrow_align', 'left' );
				if ( 0 == $index ) {
					$first_slide_arrow_color = $arrow_color;
					$first_slide_arrow_align = $arrow_align;
				}
				$index++;

				$bg_position = eut_array_value( $slider_item, 'bg_position', 'center-center' );
				$style = eut_array_value( $slider_item, 'style', 'default' );
				$header_style = eut_array_value( $slider_item, 'header_style', 'default' );
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

				$header_styles = array( 'default', 'dark', 'light' );
				if ( !in_array( $header_style, $header_styles ) ) {
					$header_style = 'default';
				}

?>
				<div class="eut-slider-item <?php echo esc_attr( $el_class ); ?>" data-style="<?php echo esc_attr( $header_style ); ?>" data-arrow-color="<?php echo esc_attr( $arrow_color ); ?>" data-arrow-align="<?php echo esc_attr( $arrow_align ); ?>">
					<div class="eut-feature-content eut-align-<?php echo esc_attr( $text_align ); ?> eut-style-<?php echo esc_attr( $style ); ?> eut-<?php echo esc_attr( $text_animation ); ?>">
						<div class="eut-container">
							<?php eut_print_header_feature_content( $slider_item  ); ?>
							<?php if( !empty( $button_text ) || !empty( $button_text2 ) ) { ?>
							<div class="eut-button-wrapper">
								<?php eut_print_feature_button( $button_text, $button_url, $button_type, $button_size, $button_color, $button_shape, $button_target, $button_class ); ?>
								<?php eut_print_feature_button( $button_text2, $button_url2, $button_type2, $button_size2, $button_color2, $button_shape2, $button_target2, $button_class2 ); ?>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="eut-bg-wrapper">
					<?php
						eut_print_overlay_container( $pattern_overlay, $color_overlay, $opacity_overlay  );
						eut_print_bg_image_container( $media_id, $bg_position );
					?>
					</div>
				</div>
<?php
			}
?>

			</div>

		</div>
		<?php eut_print_feature_go_to_section( 'slider', $feature_go_to_section, $first_slide_arrow_color, $first_slide_arrow_align ); ?>
	</div>
<?php

}

/**
 * Prints Header Feature Map ( Page / Portfolio )
 */
function eut_print_header_feature_map( $post_id, $map_items ) {

	$map_items = apply_filters( 'eut_feature_map_items', $map_items );

	wp_enqueue_script( 'eut-googleapi-script');
	wp_enqueue_script( 'eut-maps-script');

	$feature_size = get_post_meta( $post_id, 'eut_page_feature_size', true );
	$feature_height = get_post_meta( $post_id, 'eut_page_feature_height', true );

	$map_settings = get_post_meta( $post_id, 'eut_page_map_settings', true );
	$map_marker = eut_array_value( $map_settings, 'marker', get_template_directory_uri() . '/images/markers/markers.png' );
	$map_zoom = eut_array_value( $map_settings, 'zoom', 14 );

	$map_lat = eut_array_value( $map_items[0], 'lat', '51.516221' );
	$map_lng = eut_array_value( $map_items[0], 'lng', '-0.136986' );

?>
	<div id="eut-feature-section" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?>>
		<div class="eut-feature-section-inner" data-item="map" <?php echo eut_get_feature_data_style( $feature_size, $feature_height ); ?>>
			<div class="eut-map" <?php echo eut_get_feature_style( $feature_size, $feature_height ); ?> data-lat="<?php echo esc_attr( $map_lat ); ?>" data-lng="<?php echo esc_attr( $map_lng ); ?>" data-zoom="<?php echo esc_attr( $map_zoom ); ?>"><?php echo apply_filters( 'eut_privacy_gmap_fallback', '', $map_lat, $map_lng ); ?></div>
			<?php
				foreach ( $map_items as $map_item ) {
					eut_print_feature_map_point( $map_item, $map_marker );
				}
			?>
			</div>
	</div>
<?php
}

function eut_print_feature_map_point( $map_item, $default_marker ) {

	$map_lat = eut_array_value( $map_item, 'lat', '51.516221' );
	$map_lng = eut_array_value( $map_item, 'lng', '-0.136986' );
	$map_marker = eut_array_value( $map_item, 'marker', $default_marker );

	$map_title = eut_array_value( $map_item, 'title' );
	$map_infotext = eut_array_value( $map_item, 'info_text','' );

	$button_text = eut_array_value( $map_item, 'button_text' );
	$button_url = eut_array_value( $map_item, 'button_url' );
	$button_target = eut_array_value( $map_item, 'button_target', '_self' );
	$button_class = eut_array_value( $map_item, 'button_class' );

?>
	<div style="display:none" class="eut-map-point" data-point-lat="<?php echo esc_attr( $map_lat ); ?>" data-point-lng="<?php echo esc_attr( $map_lng ); ?>" data-point-marker="<?php echo esc_attr( $map_marker ); ?>" data-point-title="<?php echo esc_attr( $map_title ); ?>">
		<?php if ( !empty( $map_title ) || !empty( $map_infotext ) || !empty( $button_text ) ) { ?>
		<div class="eut-map-infotext">
			<?php if ( !empty( $map_title ) ) { ?>
			<h6 class="eut-infotext-title"><?php echo esc_html( $map_title ); ?></h6>
			<?php } ?>
			<?php if ( !empty( $map_infotext ) ) { ?>
			<p class="eut-infotext-description"><?php echo wp_kses_post( $map_infotext ); ?></p>
			<?php } ?>
			<?php if ( !empty( $button_text ) ) { ?>
			<a class="eut-infotext-link <?php echo esc_attr( $button_class ); ?>" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_text ); ?></a>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
<?php

}

/**
 * Prints Header Feature Go to Section ( Bottom Arrow )
 */
function eut_print_feature_go_to_section( $item_type, $feature_go_to_section, $arrow_color, $arrow_align = 'left' ) {

	if( !empty( $feature_go_to_section ) ) {
		if ( 'title' == $item_type ) {
?>
		<div id="eut-goto-section-wrapper" class="eut-align-<?php echo esc_attr( $arrow_align ); ?>">
			<div class="eut-container">
				<i class="eut-goto-section eut-icon-nav-down eut-custom-color" style="color: <?php echo esc_attr( $arrow_color ); ?>;"></i>
			</div>
		</div>

<?php
		} else {
?>
		<div id="eut-goto-section-wrapper" class="eut-align-<?php echo esc_attr( $arrow_align ); ?>">
			<div class="eut-container">
				<i class="eut-goto-section eut-icon-nav-down eut-<?php echo esc_attr( $arrow_color ); ?>"></i>
			</div>
		</div>
<?php
		}
	}

}

/**
 * Prints Header Feature Button
 */
function eut_print_feature_button( $button_text, $button_url, $button_type, $button_size, $button_color, $button_shape, $button_target, $button_class ) {

	$button = "";

	if ( !empty( $button_text ) ) {
		$button_classes = array( 'eut-btn' );

		array_push( $button_classes, 'eut-btn-' . $button_size );
		array_push( $button_classes, 'eut-' . $button_shape );

		if ( eut_starts_with( $button_color, 'primary' ) ) {
			array_push( $button_classes, 'eut-bg-' . $button_color );
		} else {
			array_push( $button_classes, 'eut-' . $button_color . '-color' );
		}

		if ( 'outline' == $button_type ) {
			array_push( $button_classes, 'eut-btn-line' );
		}
		if ( !empty( $button_class ) ) {
			array_push( $button_classes, $button_class );
		}

		$button_class_string = implode( ' ', $button_classes );

		if ( !empty( $button_url ) ) {
			$url = $button_url;
			$target = $button_target;
		} else {
			$url = "#";
			$target= "_self";
		}
?>
		<a class="<?php echo esc_attr( $button_class_string ); ?>" href="<?php echo esc_url( $url ); ?>"  target="<?php echo esc_attr( $target ); ?>">
			<span><?php echo esc_html( $button_text ); ?></span>
		</a>
<?php
	}

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
