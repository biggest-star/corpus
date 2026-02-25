<?php

/*
 *	Blog Helper functions
 *
 * 	@version	1.0
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */


 /**
 * Prints excerpt
 */
function eut_print_post_excerpt() {


	$excerpt_more = eut_option( 'blog_excerpt_more' );

	if ( 'large-media' != eut_option( 'blog_style', 'large-media' ) ) {
		$excerpt_length = eut_option( 'blog_excerpt_length_small' );
		$excerpt_auto = '1';
	} else {
		$excerpt_length = eut_option( 'blog_excerpt_length' );
		$excerpt_auto = eut_option( 'blog_auto_excerpt' );
	}

	if ( '1' == $excerpt_auto ) {
		echo eut_excerpt( $excerpt_length, $excerpt_more  );
	} else {
		if ( '1' == $excerpt_more ) {
			the_content( esc_html__( 'read more', 'corpus' ) );
		} else {
			the_content( '' );
		}
	}

}

/**
 * Wrapper Functions for inner loop
 */
function eut_isotope_inner_before() {
	$blog_style = eut_option( 'blog_style', 'large-media' );
	if ( 'large-media' != $blog_style && 'small-media' != $blog_style ) {
		echo '<div class="eut-isotope-item-inner">';
	}
}
function eut_isotope_inner_after() {
	$blog_style = eut_option( 'blog_style', 'large-media' );
	if ( 'large-media' != $blog_style && 'small-media' != $blog_style ) {
		echo '</div>';
	}
}
add_action( 'eut_inner_post_loop_item_before', 'eut_isotope_inner_before' );
add_action( 'eut_inner_post_loop_item_after', 'eut_isotope_inner_after' );

function eut_get_loop_title_heading_tag() {
	$blog_style = eut_option( 'blog_style', 'large-media' );

	$title_tag = 'h6';
	if( 'large-media' == $blog_style || 'small-media' == $blog_style  ) {
		$title_tag = 'h5';
	}
	return $title_tag;
}
function eut_loop_post_title() {
	$title_tag = eut_get_loop_title_heading_tag();
	the_title( '<' . tag_escape( $title_tag ) . ' class="eut-post-title" itemprop="name headline">', '</' . tag_escape( $title_tag ) . '>' );
}
function eut_loop_post_title_link() {
	$title_tag = eut_get_loop_title_heading_tag();
	the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><' . tag_escape( $title_tag ) . ' class="eut-post-title" itemprop="name headline">', '</' . tag_escape( $title_tag ) . '></a>' );
}
function eut_loop_post_title_hidden() {
	$title_tag = eut_get_loop_title_heading_tag();
	the_title( '<' . tag_escape( $title_tag ) . ' class="eut-hidden" itemprop="name headline">', '</' . tag_escape( $title_tag ) . '>' );
}

add_action( 'eut_inner_post_loop_item_title', 'eut_loop_post_title' );
add_action( 'eut_inner_post_loop_item_title_link', 'eut_loop_post_title_link', 1 );
add_action( 'eut_inner_post_loop_item_title_hidden', 'eut_loop_post_title_hidden' );

/**
 * Gets post class
 */
function eut_get_post_class( $extra_class = '' ) {

	$blog_style = eut_option( 'blog_style', 'large-media' );

	$post_classes = array( 'eut-blog-item' );
	if ( !empty( $extra_class ) ){
		array_push( $post_classes, $extra_class );
	}

	switch( $blog_style ) {

		case 'large-media':
			array_push( $post_classes, 'eut-big-post' );
			array_push( $post_classes, 'eut-non-isotope-item' );
			break;

		case 'small-media':
			array_push( $post_classes, 'eut-small-post' );
			array_push( $post_classes, 'eut-non-isotope-item' );
			break;

		case 'masonry':
		case 'grid':
			array_push( $post_classes, 'eut-isotope-item' );
			break;

		default:
			break;

	}

	return implode( ' ', $post_classes );

}

 /**
 * Prints blog class depending on the blog style
 */
function eut_get_blog_class() {

	$blog_style = eut_option( 'blog_style', 'large-media' );
	$blog_mode = eut_option( 'blog_mode', 'no-shadow-mode' );

	switch( $blog_style ) {

		case 'small-media':
			$eut_blog_style_class = 'eut-blog eut-small-media eut-non-isotope';
			break;
		case 'masonry':
			$eut_blog_style_class = 'eut-blog eut-blog-masonry eut-isotope eut-with-gap';
			break;
		case 'grid':
			$eut_blog_style_class = 'eut-blog eut-blog-grid eut-isotope eut-with-gap';
			break;
		default:
			$eut_blog_style_class = 'eut-blog eut-large-media eut-non-isotope';
			break;

	}

	if ( 'shadow-mode' == $blog_mode && ( 'masonry' == $blog_style || 'grid' == $blog_style ) ) {
		$eut_blog_style_class .= ' eut-shadow-mode';
	} else {
		$eut_blog_style_class .= ' eut-without-shadow';
	}

	return $eut_blog_style_class;

}

/**
 * Prints post item data
 */
function eut_print_blog_data() {

	$blog_style = eut_option( 'blog_style', 'large-media' );
	$columns = eut_option( 'blog_columns', '4' );
	$columns_tablet_landscape  = eut_option( 'blog_columns_tablet_landscape', '4' );
	$columns_tablet_portrait  = eut_option( 'blog_columns_tablet_portrait', '2' );
	$columns_mobile  = eut_option( 'blog_columns_mobile', '1' );
	$item_spinner  = eut_option( 'blog_item_spinner', '1' );


	switch( $blog_style ) {

		case 'masonry':
			echo 'data-columns="' . esc_attr( $columns ) . '" data-columns-tablet-landscape="' . esc_attr( $columns_tablet_landscape ) . '" data-columns-tablet-portrait="' . esc_attr( $columns_tablet_portrait ) . '" data-columns-mobile="' . esc_attr( $columns_mobile ) . '" data-layout="masonry" data-spinner="' . esc_attr( $item_spinner ) . '"';
			break;
		case 'grid':
			echo 'data-columns="' . esc_attr( $columns ) . '" data-columns-tablet-landscape="' . esc_attr( $columns_tablet_landscape ) . '" data-columns-tablet-portrait="' . esc_attr( $columns_tablet_portrait ) . '" data-columns-mobile="' . esc_attr( $columns_mobile ) . '" data-layout="fitRows" data-spinner="' . esc_attr( $item_spinner ) . '"';
			break;
		default:
			break;
	}

}


 /**
 * Prints post loop feature media
 */
function eut_print_post_feature_media( $post_type = 'image' ) {

	$eut_blog_style = eut_option( 'blog_style' );
	$blog_image_mode = eut_option( 'blog_image_mode' );
	$blog_image_prio = eut_option( 'blog_image_prio', 'no' );

	if ( 'yes' == $blog_image_prio && has_post_thumbnail() ) {
		eut_print_post_feature_image();
	} else {

		switch( $post_type ) {
			case 'audio':
				eut_print_post_audio();
				break;
			case 'video':
				eut_print_post_video();
				break;
			case 'gallery':
				$slider_items = eut_post_meta( 'eut_post_slider_items' );
				$gallery_mode = eut_post_meta( 'eut_post_type_gallery_mode', 'gallery' );
				$gallery_image_mode = eut_post_meta( 'eut_post_type_gallery_image_mode' );

				if ( !empty( $slider_items ) ) {
					switch( $eut_blog_style ) {
						case 'large-media':
							$image_size = 'eut-image-large-rect-horizontal';
						break;
						case 'masonry' :
							$image_size = 'eut-image-small-rect-horizontal';
						break;
						default:
							$image_size = 'eut-image-small-rect-horizontal-wide';
						break;
					}
					eut_print_gallery_slider( $gallery_mode, $slider_items, $image_size  );
				}
				break;
			default:
				eut_print_post_feature_image();
				break;
		}
	}

}

 /**
 * Prints post loop feature image
 */
function eut_print_post_feature_image() {

	if ( has_post_thumbnail() ) {

		$eut_blog_style = eut_option( 'blog_style' );
		$blog_image_mode = eut_option( 'blog_image_mode', 'auto' );
		$blog_masonry_image_mode = eut_option( 'blog_masonry_image_mode', 'large' );

		if ( 'masonry' == $eut_blog_style) {
			$blog_image_mode = $blog_masonry_image_mode;
		}

		if ( 'resize' == $blog_image_mode ) {
			switch( $eut_blog_style ) {
				case 'large-media':
					$image_size = 'eut-image-fullscreen';
				break;
				default:
					$image_size = 'large';
				break;
			}
		} elseif ( 'large' == $blog_image_mode  ) {
			$image_size = 'large';
		} elseif( 'medium_large' == $blog_image_mode ) {
			$image_size = 'medium_large';
		} elseif( 'medium' == $blog_image_mode ) {
			$image_size = 'medium';
		} else {
			switch( $eut_blog_style ) {
				case 'large-media':
					$image_size = 'eut-image-large-rect-horizontal';
				break;
				case 'small-media':
				case 'grid':
				default:
					$image_size = 'eut-image-small-rect-horizontal-wide';
					break;
			}
		}

		$image_href = get_permalink();
?>
		<div class="eut-media">
			<a href="<?php echo esc_url( $image_href ); ?>"><?php the_post_thumbnail( $image_size ); ?></a>
		</div>
<?php

	}

}

 /**
 * Prints post author by
 */
function eut_print_post_author_by() {

	if ( eut_visibility( 'blog_author_visibility', '1' ) ) {
?>
	<div class="eut-post-author">
		<span><?php echo esc_html__( 'By:', 'corpus' ) . ' '; ?></span><span><?php the_author_posts_link(); ?></span>
	</div>
<?php
	}
}

 /**
 * Prints like counter
 */
function eut_print_like_counter() {

	$post_likes = eut_option( 'blog_social', '', 'eut-likes' );
	if ( !empty( $post_likes  ) ) {
		global $post;
		$post_id = $post->ID;
?>
		<div class="eut-like-counter"><span class="fa fa-heart"></span><?php echo eut_likes( $post_id ); ?></div>
<?php
	}

}

/**
 * Prints post date
 */
function eut_print_post_date() {

	if ( eut_visibility( 'blog_date_visibility' ) ) {

		global $post;
		$post_id = $post->ID;
		$post_type = get_post_type( $post_id );

		if ( 'page' == $post_type || 'portfolio' == $post_type ) {
		 return;
		}

?>
	<time class="eut-post-date" datetime="<?php the_time('c'); ?>">
		<?php echo esc_html( get_the_date() ); ?>
	</time>
<?php
	}
}

/**
 * Prints author avatar
 */
function eut_print_post_author() {
	global $post;
	$post_id = $post->ID;
	$post_type = get_post_type( $post_id );

	if ( 'page' == $post_type ||  'portfolio' == $post_type  ) {
		return;
	}
?>
	<div class="eut-post-author">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
	</div>
<?php

}

/**
 * Prints post image meta
 */
function eut_print_post_image_meta() {
	//Microdata for image
	$feat_image_url = "";
	if ( has_post_thumbnail() ) {
		$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
	} else {
		$feat_image_url = get_template_directory_uri() . '/images/empty/thumbnail.jpg';
	}
?>
	<meta itemprop="image" content="<?php echo esc_url( $feat_image_url ); ?>"/>
<?php
}

/**
 * Prints audio shortcode of post format audio
 */
function eut_print_post_audio() {
	global $wp_embed;

	$audio_mode = eut_post_meta( 'eut_post_type_audio_mode' );
	$audio_mp3 = eut_post_meta( 'eut_post_audio_mp3' );
	$audio_ogg = eut_post_meta( 'eut_post_audio_ogg' );
	$audio_wav = eut_post_meta( 'eut_post_audio_wav' );
	$audio_embed = eut_post_meta( 'eut_post_audio_embed' );

	$audio_output = '';

	if( empty( $audio_mode ) && !empty( $audio_embed ) ) {
		echo '<div class="eut-media">' . $audio_embed . '</div>';
	} else {
		if ( !empty( $audio_mp3 ) || !empty( $audio_ogg ) || !empty( $audio_wav ) ) {

			$audio_output .= '[audio ';

			if ( !empty( $audio_mp3 ) ) {
				$audio_output .= 'mp3="'. esc_url( $audio_mp3 ) .'" ';
			}
			if ( !empty( $audio_ogg ) ) {
				$audio_output .= 'ogg="'. esc_url( $audio_ogg ) .'" ';
			}
			if ( !empty( $audio_wav ) ) {
				$audio_output .= 'wav="'. esc_url( $audio_wav ) .'" ';
			}

			$audio_output .= ']';

			echo '<div class="eut-media">';
			echo  do_shortcode( $audio_output );
			echo '</div>';
		}
	}

}

/**
 * Prints video of the video post format
 */
function eut_print_post_video() {

	$video_mode = eut_post_meta( 'eut_post_type_video_mode' );
	$video_webm = eut_post_meta( 'eut_post_video_webm' );
	$video_mp4 = eut_post_meta( 'eut_post_video_mp4' );
	$video_ogv = eut_post_meta( 'eut_post_video_ogv' );
	$video_poster = eut_post_meta( 'eut_post_video_poster' );
	$video_embed = eut_post_meta( 'eut_post_video_embed' );

	eut_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $video_poster );
}

/**
 * Prints a bar with tags and categories ( Single Post Only )
 */
if ( !function_exists('eut_print_post_meta_bar') ) {
	function eut_print_post_meta_bar() {
		global $post;
		$post_id = $post->ID;
?>
	<?php if ( eut_visibility( 'post_tag_visibility', '1' ) || eut_visibility( 'post_category_visibility', '1' ) ) { ?>
	<div id="eut-tags-categories">



				<?php if ( eut_visibility( 'post_tag_visibility', '1' ) && has_tag() ) { ?>
				<div class="eut-tags">
					<?php the_tags('<ul class="eut-small-text"><li><span>' . esc_html__( 'Post Tags:', 'corpus' ) . '</span></li><li>','</li><li>','</li></ul>'); ?>
				</div>
				<?php } ?>


				<?php if ( eut_visibility( 'post_category_visibility', '1' ) ) { ?>
				<div class="eut-categories">
				 <?php
					$post_terms = wp_get_object_terms( $post_id, 'category', array( 'fields' => 'ids' ) );
					if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
						$term_ids = implode( ',' , $post_terms );
						echo '<ul class="eut-small-text">';
						echo '<li><span>' . esc_html__( 'Posted In:', 'corpus' ) . '</span></li>';
						echo  wp_list_categories( 'title_li=&style=list&echo=0&hierarchical=0&taxonomy=category&include=' . $term_ids );
						echo '</ul>';
					}
					?>
				</div>
				<?php } ?>


	</div>
	<?php } ?>

<?php
	}
}

/**
 * Prints related posts ( Single Post )
 */
function eut_print_related_posts() {

	$eut_tag_ids = array();
	$eut_max_related = 3;

	$eut_tags_list = get_the_tags();
	if ( ! empty( $eut_tags_list ) ) {

		foreach ( $eut_tags_list as $tag ) {
			array_push( $eut_tag_ids, $tag->term_id );
		}

	}

	$exclude_ids = array( get_the_ID() );
	$tag_found = false;

	$query = array();
	if ( ! empty( $eut_tag_ids ) ) {
		$args = array(
			'tag__in' => $eut_tag_ids,
			'post__not_in' => $exclude_ids,
			'posts_per_page' => $eut_max_related,
			'paged' => 1,
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			$tag_found = true;
		}
	}

	if ( $tag_found ) {
?>
	<!-- Related Posts -->
	<div class="eut-related-post">
		<h5 class="eut-related-title"><?php esc_html_e( 'You might also like', 'corpus' ); ?></h5>
		<ul>
			<?php eut_print_loop_related( $query ); ?>
		</ul>

	</div>
	<!-- End Related Posts -->
<?php
	}
}

/**
 * Prints single related item ( used in related posts )
 */
function eut_print_loop_related( $query, $filter = ''  ) {

	$image_size = 'eut-image-small-rect-horizontal';
	$image_src = get_template_directory_uri() . '/images/empty/' . $image_size . '.jpg';

	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

		$eut_link = get_permalink();
		$eut_target = '_self';

		if ( 'link' == get_post_format() ) {
			$eut_link = get_post_meta( get_the_ID(), 'eut_post_link_url', true );
			$new_window = get_post_meta( get_the_ID(), 'eut_post_link_new_window', true );
			if( empty( $eut_link ) ) {
				$eut_link = get_permalink();
			}

			if( !empty( $new_window ) ) {
				$eut_target = '_blank';
			}
		}


?>
		<li>
			<article id="eut-related-post-<?php the_ID(); ?>" <?php post_class( 'eut-related-item' ); ?> itemscope itemType="http://schema.org/BlogPosting">
				<div class="eut-media eut-image-hover">
					<?php
						if ( has_post_thumbnail() ) {
					?>
						<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>">
							<?php the_post_thumbnail( $image_size ); ?>
						</a>
					<?php
						} else {
					?>
						<a class="eut-no-image" href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>">
							<img src="<?php echo esc_url( $image_src ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
						</a>
					<?php
						}
					?>
				</div>
				<div class="eut-content">
					<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>">
						<h6 class="eut-title" itemprop="name headline"><?php the_title(); ?></h6>
						<?php corpus_eutf_print_post_structured_data(); ?>
					</a>
					<div class="eut-caption eut-small-text"><?php eut_print_post_date(); ?></div>
				</div>
			</article>
		</li>
<?php

	endwhile;
	else :
	endif;

	wp_reset_postdata();

}

/**
 * Likes ajax callback ( used in Single Post )
 */
function eut_likes_callback( $post_id ) {

	if ( isset( $_POST['eut_likes_id'] ) ) {
		$post_id = $_POST['eut_likes_id'];
		echo eut_likes( $post_id, 'update' );
	} else {
		echo 0;
	}
	exit;
}

add_action( 'wp_ajax_eut_likes_callback', 'eut_likes_callback' );
add_action( 'wp_ajax_nopriv_eut_likes_callback', 'eut_likes_callback' );

function eut_likes( $post_id, $action = 'get' ) {

	if( !is_numeric( $post_id ) ) return 0;

	$likes = get_post_meta( $post_id, 'eut_likes', true );

	if( !$likes || !is_numeric( $likes ) ) {
		$likes = 0;
	}

	if ( 'update' == $action ) {
		if ( isset( $_COOKIE['eut_likes_' . $post_id] ) ) {
			return $likes;
		}
		$likes++;
		update_post_meta( $post_id, 'eut_likes', $likes );
		setcookie('eut_likes_' . $post_id, $post_id, time()*20, '/');
	}

	return $likes;
}

/**
 * Prints Post Navigation ( Post )
 */
if ( !function_exists('eut_print_post_navigation') ) {

	function eut_print_post_navigation() {

		$eut_in_same_term = eut_visibility( 'post_nav_same_term', '0' );
		$prev_post = get_adjacent_post( $eut_in_same_term, '', true);
		$next_post = get_adjacent_post( $eut_in_same_term, '', false);
		$eut_backlink = eut_option( 'post_backlink' );

		if ( is_a( $prev_post, 'WP_Post' ) || is_a( $next_post, 'WP_Post' ) ) {
?>
			<!-- NAVIGATION BAR -->
			<div id="eut-nav-bar" class="clearfix">
				<div class="eut-nav-item eut-prev eut-align-left">
					<?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="eut-h6"><i class="eut-icon eut-icon-nav-left"></i><span><?php echo get_the_title( $prev_post->ID ); ?></span></a>
					<?php } ?>
				</div>
			<?php
				if ( !empty( $eut_backlink ) ) {
					$backlink_url = get_permalink( $eut_backlink );
					if ( !empty( $backlink_url ) ) {
				?>
				<div class="eut-nav-item eut-backlink eut-align-center">
					<a href="<?php echo esc_url( $backlink_url ); ?>" class="eut-backlink"><i class="eut-icon eut-icon-th-large"></i></a>
				</div>
				<?php
					}
				}
			?>
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
 * Prints social icons ( Post )
 */
 if ( !function_exists( 'eut_print_post_social' ) ) {
	function eut_print_post_social() {
		global $post;
		$post_id = $post->ID;

		$post_facebook = eut_option( 'blog_social', '', 'facebook' );
		$post_twitter = eut_option( 'blog_social', '', 'twitter' );
		$post_linkedin = eut_option( 'blog_social', '', 'linkedin' );
		$post_googleplus = eut_option( 'blog_social', '', 'google-plus' );
		$post_likes = eut_option( 'blog_social', '', 'eut-likes' );
		$eut_permalink = get_permalink( $post_id );
		$eut_title = get_the_title( $post_id );
?>
	<!-- Socials -->
	<div id="eut-social-share">
		<ul>

			<?php if ( !empty( $post_facebook  ) ) { ?>
			<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
			<?php } ?>
			<?php if ( !empty( $post_twitter  ) ) { ?>
			<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
			<?php } ?>
			<?php if ( !empty( $post_linkedin  ) ) { ?>
			<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-linkedin"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
			<?php } ?>
			<?php if ( !empty( $post_googleplus  ) ) { ?>
			<li><a href="<?php echo esc_url( $eut_permalink ); ?>" title="<?php echo esc_attr( $eut_title ); ?>" class="eut-social-share-googleplus"><i class="fa fa-google-plus"></i><span>Google+</span></a></li>
			<?php } ?>
			<?php if ( !empty( $post_likes  ) ) { ?>
			<li><a href="#" class="eut-like-counter-link" data-post-id="<?php echo esc_attr( $post_id ); ?>"><i class="fa fa-heart"></i><span class="eut-like-counter"><?php echo eut_likes( $post_id ); ?></span></a></li>
			<?php } ?>
		</ul>
	</div>
<?php
	}
}

 /**
 * Prints Meta fields ( Post )
 */
if ( !function_exists( 'eut_print_post_meta' ) ) {
	function eut_print_post_meta() {

		$eut_disable_meta_fields = eut_post_meta( 'eut_disable_meta_fields' );
		if ( 'yes' == $eut_disable_meta_fields ) {
			return;
		}
?>
		<div id="eut-single-post-meta">
			<ul class="eut-small-text eut-post-meta">
				<?php if ( eut_visibility( 'blog_date_visibility' ) ) { ?>
				<li class="eut-field-date"><time datetime="<?php the_time('c'); ?>"><?php echo esc_html( get_the_date() ); ?></time></li>
				<?php } ?>
				<?php if ( eut_visibility( 'post_author_visibility' ) ) { ?>
				<li><a href="#eut-about-author"><i><?php the_author(); ?></i></a></li>
				<?php } ?>
				<?php if ( eut_visibility( 'blog_comments_visibility' ) ) { ?>
				<li><a href="#eut-comments"><?php comments_number( esc_html__( 'no comments', 'corpus' ), esc_html__( '1 comment', 'corpus' ), '% ' . esc_html__( 'comments', 'corpus' ) ); ?></a></li>
				<?php } ?>
			</ul>
		</div>
<?php
	}
}


 /**
 * Prints Single Author Info ( Post )
 */
if ( !function_exists( 'eut_print_post_about_author' ) ) {
	function eut_print_post_about_author() {
?>
	<!-- About Author -->
	<div id="eut-about-author" class="eut-section eut-round">
		<div class="eut-author-image">
		<?php echo get_avatar( get_the_author_meta('ID'), 170 ); ?>
		</div>
		<div class="eut-author-info">
			<h6><?php the_author_link(); ?></h6>
			<p><?php echo get_the_author_meta( 'user_description' ); ?></p>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="eut-read-more"><?php echo esc_html__( 'All stories by:', 'corpus' ) . '  '; ?><?php the_author(); ?> </a>
		</div>
	</div>
	<!-- End About Author -->
<?php
	}
}

/**
 * Prints post structured data
 */
if ( !function_exists( 'corpus_eutf_print_post_structured_data' ) ) {
	function corpus_eutf_print_post_structured_data( $args = array() ) {
		global $post;

		if ( has_post_thumbnail() ) {
			$url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large') ;
			$image_url = $url[0];
			$image_width = $url[1];
			$image_height = $url[2];

		} else {
			$image_url = get_template_directory_uri() . '/images/empty/thumbnail.jpg';
			$image_width = 150;
			$image_height = 150;
		}
	?>
		<span class="eut-hidden">
			<span class="eut-structured-data entry-title"><?php the_title(); ?></span>
			<span class="eut-structured-data" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			   <span itemprop='url' ><?php echo esc_url( $image_url ); ?></span>
			   <span itemprop='height' ><?php echo esc_html( $image_width ); ?></span>
			   <span itemprop='width' ><?php echo esc_html( $image_height ); ?></span>
			</span>
			<?php if ( eut_visibility( 'blog_author_visibility', '1' ) ) { ?>
			<span class="eut-structured-data vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person">
				<span itemprop="name" class="fn"><?php the_author(); ?></span>
			</span>
			<span class="eut-structured-data" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
				<span itemprop='name'><?php the_author(); ?></span>
				<span itemprop='logo' itemscope itemtype='http://schema.org/ImageObject'>
					<span itemprop='url'><?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?></span>
				</span>
			</span>
			<?php } else { ?>
			<span class="eut-structured-data vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person">
				<span itemprop="name" class="fn"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
			</span>
			<span class="eut-structured-data" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
				<span itemprop='name'><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
				<span itemprop='logo' itemscope itemtype='http://schema.org/ImageObject'>
					<span itemprop='url'><?php echo esc_url( $image_url ); ?></span>
				</span>
			</span>
			<?php }?>
			<time class="eut-structured-data date published" itemprop="datePublished" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
			<time class="eut-structured-data date updated" itemprop="dateModified"  datetime="<?php echo get_the_modified_time('c'); ?>"><?php echo get_the_modified_date(); ?></time>
			<span class="eut-structured-data" itemprop="mainEntityOfPage" itemscope itemtype="http://schema.org/WebPage" itemid="<?php echo esc_url( get_permalink() ); ?>"></span>
		</span>
	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
