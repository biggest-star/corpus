<?php

/*
*	Portfolio Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Print portfolio sidebar class
 */
function eut_portfolio_sidebar_class() {

	$eut_sidebar_class = "";
	$eut_sidebar_layout = eut_post_meta( 'eut_portfolio_layout', 'none' );

	if ( 'none' != $eut_sidebar_layout ) {
		$eut_sidebar_class = 'eut-right-sidebar';
	}

	return $eut_sidebar_class;

}

/**
 * Prints Portfolio socials if used
 */
function eut_print_portfolio_media() {

	if ( post_password_required() ) {
		return;
	}
	
	global $post;
	$post_id = $post->ID;

	$portfolio_media = get_post_meta( $post_id, 'eut_portfolio_media_selection', true );
	$portfolio_image_mode = eut_post_meta( 'eut_portfolio_media_image_mode' );
	$image_size_slider = 'eut-image-large-rect-horizontal';
	if ( 'resize' == $portfolio_image_mode ) {
		$image_size_slider = 'eut-image-fullscreen';
	}

	switch( $portfolio_media ) {

		case 'slider':
		case 'feature-slider':
			$slider_items = get_post_meta( $post_id, 'eut_portfolio_slider_items', true );
			eut_print_gallery_slider( 'slider', $slider_items, $image_size_slider );
			break;
		case 'gallery':
			$slider_items = get_post_meta( $post_id, 'eut_portfolio_slider_items', true );
			eut_print_gallery_slider( 'gallery', $slider_items, '', 'eut-classic-style' );
			break;
		case 'gallery-vertical':
			$slider_items = get_post_meta( $post_id, 'eut_portfolio_slider_items', true );
			eut_print_gallery_slider( 'gallery-vertical', $slider_items, $image_size_slider, 'eut-vertical-style' );
			break;
		case 'video':
			eut_print_portfolio_video();
			break;
		case 'video-html5':
			eut_print_portfolio_video( 'html5' );
			break;
		case 'none':
			break;
		default:
			eut_print_portfolio_feature_image();
			break;

	}
}

/**
 * Prints portfolio feature image
 */
function eut_print_portfolio_feature_image() {

	if ( has_post_thumbnail() ) {
		$image_size = 'eut-image-fullscreen';
?>
		<div class="eut-media clearfix">
			<?php the_post_thumbnail( $image_size ); ?>
		</div>
<?php

	}

}


/**
 * Prints video of the portfolio media
 */
function eut_print_portfolio_video( $video_mode = '' ) {

	$video_webm = eut_post_meta( 'eut_portfolio_video_webm' );
	$video_mp4 = eut_post_meta( 'eut_portfolio_video_mp4' );
	$video_ogv = eut_post_meta( 'eut_portfolio_video_ogv' );
	$video_poster = eut_post_meta( 'eut_portfolio_video_poster' );
	$video_embed = eut_post_meta( 'eut_portfolio_video_embed' );

	eut_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $video_poster );
}

/**
 * Prints Portfolio socials if used
 */
if ( !function_exists( 'eut_print_portfolio_social' ) ) {

	function eut_print_portfolio_social() {

		global $post;
		$post_id = $post->ID;

		if ( eut_portfolio_social_visibility() ) {

			$eut_permalink = get_permalink( $post_id );
			$eut_title = get_the_title( $post_id );
			$portfolio_facebook = eut_option( 'portfolio_social', '', 'facebook' );
			$portfolio_twitter = eut_option( 'portfolio_social', '', 'twitter' );
			$portfolio_linkedin = eut_option( 'portfolio_social', '', 'linkedin' );
			$portfolio_pinterest= eut_option( 'portfolio_social', '', 'pinterest' );
			$portfolio_googleplus= eut_option( 'portfolio_social', '', 'google-plus' );
			$portfolio_likes = eut_option( 'portfolio_social', '', 'eut-likes' );

?>
		<div id="eut-social-share">

			<ul>

				<?php if ( !empty( $portfolio_facebook  ) ) { ?>
				<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
				<?php } ?>
				<?php if ( !empty( $portfolio_twitter  ) ) { ?>
				<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
				<?php } ?>
				<?php if ( !empty( $portfolio_linkedin  ) ) { ?>
				<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-linkedin"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
				<?php } ?>
				<?php if ( !empty( $portfolio_googleplus  ) ) { ?>
				<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-googleplus"><i class="fa fa-google-plus"></i><span>Google+</span></a></li>
				<?php } ?>
				<?php if ( !empty( $portfolio_pinterest  ) ) { ?>
				<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" data-pin-img="<?php eut_print_portfolio_image( 'eut-image-small-square', 'link' ); ?>" class="eut-social-share-pinterest"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
				<?php } ?>
				<?php if ( !empty( $portfolio_likes  ) ) { ?>
				<li><a href="#" class="eut-like-counter-link" data-post-id="<?php echo esc_attr( $post_id ); ?>"><i class="fa fa-heart"></i><span class="eut-like-counter"><?php echo eut_likes( $post_id ); ?></span></a></li>
				<?php } ?>

			</ul>

		</div>
<?php
		}
	}
}

 /**
 * Prints portfolio like counter
 */
function eut_print_portfolio_like_counter() {

	$post_likes = eut_option( 'portfolio_social', '', 'eut-likes' );
	if ( !empty( $post_likes  ) ) {
		global $post;
		$post_id = $post->ID;
		$likes_count = eut_likes( $post_id );
		if ( 0 == $likes_count ) {
			$likes_count = '';
		}
?>
		<div class="eut-like-counter"><i class="eut-icon eut-icon-heart"></i><span><?php echo esc_html( $likes_count ); ?></span></div>
<?php
	}

}


/**
 * Check Portfolio details if used
 */

function eut_check_portfolio_details() {
	global $post;
	$post_id = $post->ID;

	$eut_portfolio_details = eut_post_meta( 'eut_portfolio_details', '' );
	$portfolio_fields = get_the_terms( $post_id, 'portfolio_field' );
	if ( !empty( $eut_portfolio_details ) || ! empty( $portfolio_fields ) ) {
		return true;
	}
	return false;

}

/**
 * Prints Portfolio details
 */
 if ( !function_exists('eut_print_portfolio_details') ) {
	function eut_print_portfolio_details() {
	
		if ( post_password_required() ) {
			return;
		}
	
		global $post;
		$post_id = $post->ID;

		$eut_portfolio_details_title = eut_post_meta( 'eut_portfolio_details_title', eut_option( 'portfolio_details_text' ) );
		$eut_portfolio_details = eut_post_meta( 'eut_portfolio_details', '' );
		$portfolio_fields = get_the_terms( $post_id, 'portfolio_field' );

	?>
		<div class="eut-portfolio-info">

			<?php
			if ( !empty( $eut_portfolio_details ) ) {
			?>

				<!-- Portfolio Description -->
				<div class="eut-portfolio-description">
					<div class="eut-h5"><?php echo wp_kses_post( $eut_portfolio_details_title ); ?></div>
					<p><?php echo do_shortcode( wp_kses_post( $eut_portfolio_details ) ); ?></p>
				</div>
				<!-- End Portfolio Description -->

			<?php
			}
			?>

			<?php
			if ( ! empty( $portfolio_fields ) ) {
			?>

				<!-- Fields -->
				<ul class="eut-fields">
				<?php
					foreach( $portfolio_fields as $field ) {
						echo '<li class="eut-fields-title eut-small-text">' . esc_html( $field->name ) . '</li>';
					}
				?>
				</ul>
				<!-- End Fields -->

			<?php
			}
			?>

		</div>
	<?php

	}
}

/**
 * Checks if portfolio has socials
 */

function eut_portfolio_social_visibility() {

	$social_options = eut_option('portfolio_social');
	if ( !empty( $social_options ) ) {
		foreach ( $social_options as $key => $value ) {
			if ( $value ) {
				return true;
			}
		}
	}
	return false;
}

/**
 * Prints Portfolio Navigation
 */
if ( !function_exists('eut_print_portfolio_navigation') ) {

	function eut_print_portfolio_navigation() {

		$eut_in_same_term = eut_visibility( 'portfolio_nav_same_term', '0' );
		$prev_post = get_adjacent_post( $eut_in_same_term, '', true, 'portfolio_category');
		$next_post = get_adjacent_post( $eut_in_same_term, '', false, 'portfolio_category');
		$eut_backlink = eut_option( 'portfolio_backlink' );

		if ( is_a( $prev_post, 'WP_Post' ) || is_a( $next_post, 'WP_Post' ) ) {
?>
			<!-- NAVIGATION BAR -->
			<div id="eut-nav-bar" class="clearfix">
				<div class="eut-nav-item eut-prev eut-align-left">
					<?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="eut-h6"><i class="eut-icon eut-icon-nav-left"></i><span><?php echo get_the_title( $prev_post->ID ); ?></span></a>
					<?php } ?>
				</div>
				<div class="eut-nav-item eut-backlink eut-align-center">
				<?php
					if ( !empty( $eut_backlink ) ) {
						$portfolio_backlink_url = get_permalink( $eut_backlink );
					?>
						<a href="<?php echo esc_url( $portfolio_backlink_url ); ?>" class="eut-backlink"><i class="eut-icon eut-icon-th-large"></i></a>
					<?php
					}
				?>
				</div>
				<div class="eut-nav-item eut-next eut-align-right">
					<?php if ( is_a( $next_post, 'WP_Post' ) ) { ?>
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="eut-h6"><span><?php echo get_the_title( $next_post->ID ); ?></span><i class="eut-icon eut-icon-nav-right"></i></a>
					<?php } ?>
				</div>
			</div>
			<!-- END NAVIGATION BAR -->
<?php
		}
	}
}

/**
 * Prints Portfolio Recents items. ( Used in Single Portfolio )
 */
function eut_print_recent_portfolio_items() {

	$exclude_ids = array( get_the_ID() );
	$args = array(
		'post_type' => 'portfolio',
		'post_status'=>'publish',
		'post__not_in' => $exclude_ids ,
		'posts_per_page' => 3,
		'paged' => 1,
	);


	$query = new WP_Query( $args );

	if ( $query->have_posts()  && $query->found_posts > 1 ) {
?>
	<div class="eut-related-post">
		<h5 class="eut-related-title"><?php esc_html_e( 'Recent Entries', 'corpus' ); ?></h5>
		<ul>

<?php

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			echo '<li>';
			get_template_part( 'templates/portfolio', 'recent' );
			echo '</li>';
		endwhile;
		else :
		endif;
?>
		</ul>
	</div>
<?php
		wp_reset_postdata();
	}
}

/**
 * Prints Portfolio Feature Image
 */
function eut_print_portfolio_image( $image_size = 'eut-image-small-square', $link = '' ) {
	if ( has_post_thumbnail() ) {
		$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		$attachment_src = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
		$image_src = $attachment_src[0];
		if ( $link ){
			echo esc_url( $image_src );
		} else {
			echo wp_get_attachment_image( $post_thumbnail_id, $image_size );
		}
	} else {
		$image_src = get_template_directory_uri() . '/images/empty/' . $image_size . '.jpg';
		if ( $link ){
			echo esc_url( $image_src );
		} else {
?>
		<img src="<?php echo esc_url( $image_src ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"/>
<?php
		}
	}

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
