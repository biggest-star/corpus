<?php

/*
*	Main sidebar area
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/


if( is_search() ) {
	return;
}

$fixed = "";
$eut_sidebar_style = 'none';
$eut_sidebar_extra_content = false;

if ( is_singular() ) {
	if ( 'yes' == eut_post_meta( 'eut_fixed_sidebar' ) ) {
		$fixed = " eut-fixed-sidebar";
	}
}

$eut_sidebar_view = eut_get_current_view();

if ( 'forum' == $eut_sidebar_view ) {
	$eut_sidebar_id = eut_option( 'forum_sidebar' );
	$eut_sidebar_layout = eut_option( 'forum_layout', 'none' );
	$eut_sidebar_style = eut_option( 'forum_sidebar_style', 'simple' );
}  else if ( 'shop' == $eut_sidebar_view && corpus_eutf_woo_enabled() ) {
		if ( is_shop() ) {
			$eut_sidebar_id = corpus_eutf_post_meta_shop( 'eut_page_sidebar', eut_option( 'page_sidebar' ) );
			$eut_sidebar_layout = corpus_eutf_post_meta_shop( 'eut_page_layout', eut_option( 'page_layout', 'none' ) );
			$eut_sidebar_style = corpus_eutf_post_meta_shop( 'eut_sidebar_style', eut_option( 'page_sidebar_style' ), 'simple' );
			if ( 'yes' == corpus_eutf_post_meta_shop( 'eut_fixed_sidebar' ) ) {
				$fixed = " eut-fixed-sidebar";
			}
		} else if( is_product() ) {
			$eut_sidebar_id = eut_post_meta( 'eut_product_sidebar', eut_option( 'product_sidebar' ) );
			$eut_sidebar_layout = eut_post_meta( 'eut_product_layout', eut_option( 'product_layout', 'none' ) );
			$eut_sidebar_style = eut_post_meta( 'eut_sidebar_style', eut_option( 'product_sidebar_style' ), 'simple' );
		} else {
			$eut_sidebar_id = eut_option( 'product_tax_sidebar' );
			$eut_sidebar_layout = eut_option( 'product_tax_layout', 'none' );
			$eut_sidebar_style = eut_option( 'product_tax_sidebar_style', 'simple' );
		}
} else {
	if ( is_singular( 'post' ) ) {
		$eut_sidebar_id = eut_post_meta( 'eut_post_sidebar', eut_option( 'post_sidebar' ) );
		$eut_sidebar_layout = eut_post_meta( 'eut_post_layout', eut_option( 'post_layout', 'none' ) );
		$eut_sidebar_style = eut_post_meta( 'eut_sidebar_style', eut_option( 'post_sidebar_style' ), 'simple' );
	} else if ( is_singular( 'page' ) ) {
		$eut_sidebar_id = eut_post_meta( 'eut_page_sidebar', eut_option( 'page_sidebar' ) );
		$eut_sidebar_layout = eut_post_meta( 'eut_page_layout', eut_option( 'page_layout', 'none' ) );
		$eut_sidebar_style = eut_post_meta( 'eut_sidebar_style', eut_option( 'page_sidebar_style' ), 'simple' );
	} else if ( is_singular( 'portfolio' ) ) {
		$eut_sidebar_id = eut_post_meta( 'eut_portfolio_sidebar', eut_option( 'portfolio_sidebar' ) );
		$eut_sidebar_layout = eut_post_meta( 'eut_portfolio_layout', eut_option( 'portfolio_layout', 'none' ) );
		$eut_sidebar_style = eut_post_meta( 'eut_sidebar_style', eut_option( 'portfolio_sidebar_style' ), 'simple' );
		$eut_sidebar_extra_content = eut_check_portfolio_details();
		if( $eut_sidebar_extra_content && 'none' == $eut_sidebar_layout ) {
			$eut_sidebar_layout = 'right';
		}
	} else {
		$eut_sidebar_id = eut_option( 'blog_sidebar' );
		$eut_sidebar_layout = eut_option( 'blog_layout', 'none' );
		$eut_sidebar_style = eut_option( 'blog_sidebar_style', 'simple' );
	}
}

if ( 'none' != $eut_sidebar_layout && ( is_active_sidebar( $eut_sidebar_id ) || $eut_sidebar_extra_content ) ) {
	if ( 'left' == $eut_sidebar_layout || 'right' == $eut_sidebar_layout ) {

		if ( 'simple' != $eut_sidebar_style ) {
			$eut_sidebar_style = ' eut-white-box';
		} else {
			$eut_sidebar_style = '';
		}
		$eut_sidebar_class = 'eut-sidebar' . $fixed . $eut_sidebar_style;
?>
		<!-- Sidebar -->
		<aside id="eut-sidebar" class="<?php echo esc_attr( $eut_sidebar_class ); ?>">
			<?php
				if ( $eut_sidebar_extra_content ) {
					eut_print_portfolio_details();
				}
			?>
			<?php dynamic_sidebar( $eut_sidebar_id ); ?>
		</aside>
		<!-- End Sidebar -->
<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
