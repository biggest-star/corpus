<?php

/*
*	Layout Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Function to fetch sidebar class
 */
function eut_sidebar_class( $sidebar_view = '' ) {

	if( is_search() ) {
		return '';
	}
	$eut_sidebar_class = "";
	$eut_sidebar_extra_content = false;

	if ( 'forum' == $sidebar_view ) {
		$eut_sidebar_id = eut_option( 'forum_sidebar' );
		$eut_sidebar_layout = eut_option( 'forum_layout', 'none' ); 
	}  else if ( 'shop' == $sidebar_view && corpus_eutf_woo_enabled() ) {
		if ( is_shop() ) {
			$eut_sidebar_id = corpus_eutf_post_meta_shop( 'eut_page_sidebar', eut_option( 'page_sidebar' ) );
			$eut_sidebar_layout = corpus_eutf_post_meta_shop( 'eut_page_layout', eut_option( 'page_layout', 'none' ) );
		} else if( is_product() ) {
			$eut_sidebar_id = eut_post_meta( 'eut_product_sidebar', eut_option( 'product_sidebar' ) );
			$eut_sidebar_layout = eut_post_meta( 'eut_product_layout', eut_option( 'product_layout', 'none' ) );
		} else {
			$eut_sidebar_id = eut_option( 'product_tax_sidebar' );
			$eut_sidebar_layout = eut_option( 'product_tax_layout', 'none' );
		}
	} else {
		if ( is_singular( 'post' ) ) {
			$eut_sidebar_id = eut_post_meta( 'eut_post_sidebar', eut_option( 'post_sidebar' ) );
			$eut_sidebar_layout = eut_post_meta( 'eut_post_layout', eut_option( 'post_layout', 'none' ) );
		} else if ( is_singular( 'page' ) ) {
			$eut_sidebar_id = eut_post_meta( 'eut_page_sidebar', eut_option( 'page_sidebar' ) );
			$eut_sidebar_layout = eut_post_meta( 'eut_page_layout', eut_option( 'page_layout', 'none' ) );
		} else if ( is_singular( 'portfolio' ) ) {
			$eut_sidebar_id = eut_post_meta( 'eut_portfolio_sidebar', eut_option( 'portfolio_sidebar' ) );
			$eut_sidebar_layout = eut_post_meta( 'eut_portfolio_layout', eut_option( 'portfolio_layout', 'none' ) );
			$eut_sidebar_extra_content = eut_check_portfolio_details();
			if( $eut_sidebar_extra_content && 'none' == $eut_sidebar_layout ) {
				$eut_sidebar_layout = 'right';
			}
		} else {
			$eut_sidebar_id = eut_option( 'blog_sidebar' );
			$eut_sidebar_layout = eut_option( 'blog_layout', 'none' );
		}
	}
	if ( 'none' != $eut_sidebar_layout && ( is_active_sidebar( $eut_sidebar_id ) || $eut_sidebar_extra_content ) ) {

		if ( 'right' == $eut_sidebar_layout ) {
			$eut_sidebar_class = 'eut-right-sidebar';
		} else if ( 'left' == $eut_sidebar_layout ) {
			$eut_sidebar_class = 'eut-left-sidebar';
		}
		
	}
	
	return $eut_sidebar_class;

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
