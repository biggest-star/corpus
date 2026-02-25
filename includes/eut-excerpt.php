<?php

/*
 *	Excerpt functions
 *
 * 	@version	1.0
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */


 /**
 * Custom excerpt
 */
if ( !function_exists('eut_excerpt') ) {
	function eut_excerpt( $limit, $more = '0' ) {
		global $post;
		$post_id = $post->ID;

		if ( has_excerpt( $post_id ) ) {
			$excerpt = apply_filters( 'the_excerpt', $post->post_excerpt );
			if ( '1' == $more ) {
				$excerpt .= eut_read_more( $post_id );
			}
		} else {
			$content = get_the_content('');
			$content = do_shortcode( $content );
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			if ( '1' == $more ) {
				$excerpt = '<p>' . wp_trim_words( $content, $limit ) . '</p>';
				$excerpt .= eut_read_more( $post_id );
			} else{
				$excerpt = '<p>' . wp_trim_words( $content, $limit ) . '</p>';
			}
		}
		return	$excerpt;
	}
}

 /**
 * Custom more
 */
if ( !function_exists('eut_read_more') ) {
	function eut_read_more( $post_id = "" ) {
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		return '<a class="eut-read-more" href="' . get_permalink( $post_id ) . '"><span>' . esc_html__( 'read more', 'corpus' ) . '</span></a>';
	}
}

 /**
 * Add filters for excerpt length
 */

function eut_new_excerpt_more( $more ) {
	return eut_read_more();
}
//add_filter('excerpt_more', 'eut_new_excerpt_more');

//Omit closing PHP tag to avoid accidental whitespace output errors.
