<?php

/*
 *	Media functions
 *
 * 	@version	1.0
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */


/**
 * Generic function that prints a slider or gallery
 */
function eut_print_gallery_slider( $gallery_mode, $slider_items , $image_size_slider = 'eut-image-large-rect-horizontal', $extra_class = "") {

	if ( empty( $slider_items ) ) {
		return;
	}
	$image_size_gallery_thumb = 'eut-image-small-rect-horizontal';
	if( 'gallery-vertical' == $gallery_mode ) {
		$image_size_gallery_thumb = $image_size_slider;
	}

	$start_block = $end_block = $item_class = '';


	if ( 'gallery' == $gallery_mode || '' == $gallery_mode || 'gallery-vertical' == $gallery_mode ) {

		$gallery_index = 0;

?>
		<div class="eut-media">
			<ul class="eut-post-gallery eut-post-gallery-popup <?php echo esc_attr( $extra_class ); ?>">
<?php

		foreach ( $slider_items as $slider_item ) {

			$media_id = $slider_item['id'];
			$full_src = wp_get_attachment_image_src( $media_id, 'eut-image-fullscreen' );
			$image_full_url = $full_src[0];

			$caption = get_post_field( 'post_excerpt', $media_id );
			
			echo '<li class="eut-image-hover">';
			echo '<a title="' . esc_attr( $caption ) . '" href="' . esc_url( $image_full_url ) . '">';
			echo wp_get_attachment_image( $media_id, $image_size_gallery_thumb );
			echo '</a>';
			echo '</li>';
			
		}
?>
			</ul>
		</div>
<?php

	} else {

		$slider_settings = array();
		if ( is_singular( 'post' ) || is_singular( 'portfolio' ) ) {
			if ( is_singular( 'post' ) ) {
				$slider_settings = eut_post_meta( 'eut_post_slider_settings' );
			} else {
				$slider_settings = eut_post_meta( 'eut_portfolio_slider_settings' );
			}
		}
		$slider_speed = eut_array_value( $slider_settings, 'slideshow_speed', '2500' );
		$slider_dir_nav = eut_array_value( $slider_settings, 'direction_nav', '2' );
?>
		<div class="eut-media">
			<div class="eut-carousel-wrapper">
				<div class="eut-carousel-navigation eut-dark" data-navigation-type="<?php echo esc_attr( $slider_dir_nav ); ?>">
					<div class="eut-carousel-buttons">
						<div class="eut-carousel-prev eut-icon-nav-left"></div>
						<div class="eut-carousel-next eut-icon-nav-right"></div>
					</div>
				</div>
				<div class="eut-slider eut-carousel-element " data-slider-speed="<?php echo esc_attr( $slider_speed ); ?>" data-slider-pause="yes" data-slider-autoheight="no">
<?php
				foreach ( $slider_items as $slider_item ) {
					$media_id = $slider_item['id'];
					echo '<div class="eut-slider-item">';
					echo wp_get_attachment_image( $media_id, $image_size_slider );
					echo '</div>';
				}
?>
				</div>
			</div>
		</div>
<?php
	}
}

/**
 * Generic function that prints video settings ( HTML5 )
 */

if ( !function_exists( 'eut_print_media_video_settings' ) ) {
	function eut_print_media_video_settings( $video_settings ) {
		$video_attr = '';

		if ( !empty( $video_settings ) ) {

			$video_poster = eut_array_value( $video_settings, 'poster' );
			$video_preload = eut_array_value( $video_settings, 'preload', 'metadata' );

			if( 'yes' == eut_array_value( $video_settings, 'controls' ) ) {
				$video_attr .= ' controls';
			}
			if( 'yes' == eut_array_value( $video_settings, 'loop' ) ) {
				$video_attr .= ' loop="loop"';
			}
			if( 'yes' ==  eut_array_value( $video_settings, 'muted' ) ) {
				$video_attr .= ' muted="muted"';
			}
			if( 'yes' == eut_array_value( $video_settings, 'autoplay' ) ) {
				$video_attr .= ' autoplay="autoplay"';
			}
			if( !empty( $video_poster ) ) {
				$video_attr .= ' poster="' . esc_url( $video_poster ) . '"';
			}
			$video_attr .= ' preload="' . $video_preload . '"';

		}
		return $video_attr;
	}
}

/**
 * Generic function that prints a video ( Embed or HTML5 )
 */
function eut_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $video_poster = '' ) {
	global $wp_embed;

	if( empty( $video_mode ) && !empty( $video_embed ) ) {
		echo '<div class="eut-media">';
		echo $wp_embed->run_shortcode( '[embed]' . $video_embed . '[/embed]' );
		echo '</div>';
	} else {

		if ( !empty( $video_webm ) || !empty( $video_mp4 ) || !empty( $video_ogv ) ) {

			$video_settings = array(
				'controls' => 'yes',
				'poster' => $video_poster,
			);
			$video_settings = apply_filters( 'eut_media_video_settings', $video_settings );

?>			
			<div class="eut-media">
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

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
