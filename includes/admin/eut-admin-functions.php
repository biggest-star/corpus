<?php

/*
*	Admin functions and definitions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Default hidden metaboxes for portfolio
 */
function eut_change_default_hidden( $hidden, $screen ) {
    if ( 'portfolio' == $screen->id ) {
        $hidden = array_flip( $hidden );
        unset( $hidden['portfolio_categorydiv'] ); //show portfolio category box
        $hidden = array_flip( $hidden );
        $hidden[] = 'postexcerpt';
		$hidden[] = 'postcustom';
		$hidden[] = 'commentstatusdiv';
		$hidden[] = 'commentsdiv';
		$hidden[] = 'authordiv';
    }
    return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'eut_change_default_hidden', 10, 2 );


/**
 * Enqueue scripts and styles for the back end.
 */
function eut_backend_scripts( $hook ) {
	global $post;

	wp_register_style( 'eut-page-feature-section', get_template_directory_uri() . '/includes/css/eut-page-feature-section.css', array(), '1.0.2' );
	wp_register_style( 'eut-admin-meta', get_template_directory_uri() . '/includes/css/eut-admin-meta.css', array(), '1.0' );
	wp_register_style( 'eut-custom-sidebars', get_template_directory_uri() . '/includes/css/eut-custom-sidebars.css' );


	$eut_upload_slider_texts = array(
		'modal_title' => __( 'Insert Images', 'corpus' ),
		'modal_button_title' => __( 'Insert Images', 'corpus' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	$eut_upload_image_replace_texts = array(
		'modal_title' => __( 'Replace Image', 'corpus' ),
		'modal_button_title' => __( 'Replace Image', 'corpus' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	$eut_upload_media_texts = array(
		'modal_title' => __( 'Insert Media', 'corpus' ),
		'modal_button_title' => __( 'Insert Media', 'corpus' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	$eut_upload_image_texts = array(
		'modal_title' => __( 'Insert Image', 'corpus' ),
		'modal_button_title' => __( 'Insert Image', 'corpus' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	$eut_feature_section_texts = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	$eut_custom_sidebar_texts = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	wp_register_script( 'eut-custom-sidebars', get_template_directory_uri() . '/includes/js/eut-custom-sidebars.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-custom-sidebars', 'eut_custom_sidebar_texts', $eut_custom_sidebar_texts );

	wp_register_script( 'eut-upload-slider-script', get_template_directory_uri() . '/includes/js/eut-upload-slider.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-upload-slider-script', 'eut_upload_slider_texts', $eut_upload_slider_texts );

	wp_register_script( 'eut-upload-feature-slider-script', get_template_directory_uri() . '/includes/js/eut-upload-feature-slider.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-upload-feature-slider-script', 'eut_upload_feature_slider_texts', $eut_upload_slider_texts );

	wp_register_script( 'eut-upload-image-replace-script', get_template_directory_uri() . '/includes/js/eut-upload-image-replace.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-upload-image-replace-script', 'eut_upload_image_replace_texts', $eut_upload_image_replace_texts );

	wp_register_script( 'eut-upload-simple-media-script', get_template_directory_uri() . '/includes/js/eut-upload-simple.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-upload-simple-media-script', 'eut_upload_media_texts', $eut_upload_media_texts );

	wp_register_script( 'eut-upload-image-script', get_template_directory_uri() . '/includes/js/eut-upload-image.js', array( 'jquery'), false, '2.0.0' );
	wp_localize_script( 'eut-upload-image-script', 'eut_upload_image_texts', $eut_upload_image_texts );

	wp_register_script( 'eut-page-feature-section-script', get_template_directory_uri() . '/includes/js/eut-page-feature-section.js', array( 'jquery', 'wp-color-picker' ), false, '2.9.2' );
	wp_localize_script( 'eut-page-feature-section-script', 'eut_feature_section_texts', $eut_feature_section_texts );

	wp_register_script( 'eut-post-options-script', get_template_directory_uri() . '/includes/js/eut-post-options.js', array( 'jquery'), false, '2.0.0' );
	wp_register_script( 'eut-portfolio-options-script', get_template_directory_uri() . '/includes/js/eut-portfolio-options.js', array( 'jquery'), false, '2.0.0' );



	if ( $hook == 'post-new.php' || $hook == 'post.php' ) {

        if ( 'post' === $post->post_type ) {

			wp_enqueue_style( 'eut-admin-meta' );
            wp_enqueue_style( 'eut-page-feature-section' );

			wp_enqueue_script( 'eut-upload-simple-media-script' );
			wp_enqueue_script( 'eut-upload-image-script' );
			wp_enqueue_script( 'eut-upload-slider-script' );
			wp_enqueue_script( 'eut-upload-feature-slider-script' );
			wp_enqueue_script( 'eut-upload-image-replace-script' );
			wp_enqueue_script( 'eut-page-feature-section-script' );
			wp_enqueue_script( 'eut-post-options-script' );

        } else if ( 'page' === $post->post_type || 'portfolio' === $post->post_type) {

			wp_enqueue_style( 'eut-admin-meta' );
			wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'eut-page-feature-section' );

			wp_enqueue_script( 'eut-upload-simple-media-script' );
			wp_enqueue_script( 'eut-upload-image-script' );
			wp_enqueue_script( 'eut-upload-slider-script' );
			wp_enqueue_script( 'eut-upload-feature-slider-script' );
			wp_enqueue_script( 'eut-upload-image-replace-script' );
			wp_enqueue_script( 'eut-page-feature-section-script' );
			if ( 'portfolio' === $post->post_type) {
				wp_enqueue_script( 'eut-portfolio-options-script' );
			}

        } else if ( 'testimonial' === $post->post_type || 'product' === $post->post_type) {

			wp_enqueue_style( 'eut-admin-meta' );

        }
    }


	if ( isset( $_GET['page'] ) && ( 'eut-custom-sidebar-settings' == $_GET['page'] ) ) {

		wp_enqueue_style( 'eut-custom-sidebars' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'eut-custom-sidebars' );
	}

	wp_register_style(
		'redux-custom-css',
		get_template_directory_uri() . '/includes/css/eut-redux-panel.css',
		array(),
		time(),
		'all'
	);
	wp_enqueue_style( 'redux-custom-css' );

}
add_action( 'admin_enqueue_scripts', 'eut_backend_scripts', 10, 1 );

/**
 * Helper function to get custom fields with fallback
 */
function eut_post_meta( $id, $fallback = false ) {
	global $post;
	$post_id = $post->ID;
	$post_id = apply_filters( 'eut_post_meta_id', $post_id );
	if ( $fallback == false ) $fallback = '';
	$post_meta = get_post_meta( $post_id, $id, true );
	$output = ( $post_meta !== '' ) ? $post_meta : $fallback;
	return $output;
}

function eut_admin_post_meta( $post_id, $id, $fallback = false ) {
	if ( $fallback == false ) $fallback = '';
	$post_meta = get_post_meta( $post_id, $id, true );
	$output = ( $post_meta !== '' ) ? $post_meta : $fallback;
	return $output;
}

/**
 * Helper function to get theme options with fallback
 */
function eut_option( $id, $fallback = false, $param = false ) {
	global $eut_corpus_options;
	if ( $fallback == false ) $fallback = '';
	$output = ( isset($eut_corpus_options[$id]) && $eut_corpus_options[$id] !== '' ) ? $eut_corpus_options[$id] : $fallback;
	if ( !empty($eut_corpus_options[$id]) && $param ) {
		$output = ( isset($eut_corpus_options[$id][$param]) && $eut_corpus_options[$id][$param] !== '' ) ? $eut_corpus_options[$id][$param] : $fallback;
		if ( 'font-family' == $param ) {
			$output = urldecode( $output );
			if ( strpos($output, ' ') && !strpos($output, ',') ) {
				$output = '"' . $output . '"';
			}
		}
	}
	return $output;
}

/**
 * Helper function to print css code if not empty
 */
function eut_css_option( $id, $fallback = false, $param = false ) {
	$option = eut_option( $id, $fallback, $param );
	if ( !empty( $option ) && 0 != $option && $param ) {
		return $param . ': ' . $option . ';';
	}
}

/**
 * Helper function to get array value with fallback
 */
function eut_array_value( $input_array, $id, $fallback = false, $param = false ) {

	if ( $fallback == false ) $fallback = '';
	$output = ( isset($input_array[$id]) && $input_array[$id] !== '' ) ? $input_array[$id] : $fallback;
	if ( !empty($input_array[$id]) && $param ) {
		$output = ( isset($input_array[$id][$param]) && $input_array[$id][$param] !== '' ) ? $input_array[$id][$param] : $fallback;
	}
	return $output;
}

/**
 * Helper function to return trimmed css code
 */
function eut_get_css_output( $css ) {
	/* Trim css for speed */
	$css_trim =  preg_replace( '/\s+/', ' ', $css );

	/* Add stylesheet Tag */
	return "<!-- Dynamic css -->\n<style type=\"text/css\">\n" . $css_trim . "\n</style>";
}

/**
 * Helper functions to set/get current template
 */
function eut_set_current_view( $id ) {
	global $eut_corpus_options;
	$eut_corpus_options['current_view'] = $id;
}
function eut_get_current_view( $fallback = '' ) {
	global $eut_corpus_options;
	if ( $fallback == false ) $fallback = '';
	$output = ( isset($eut_corpus_options['current_view']) && $eut_corpus_options['current_view'] !== '' ) ? $eut_corpus_options['current_view'] : $fallback;
	return $output;
}

/**
 * Helper function for strings
 */
function eut_starts_with( $haystack, $needle ) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

/**
 * Helper function convert hex to rgb
 */
function eut_hex2rgb( $hex ) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1) );
		$g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1) );
		$b = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1) );
	} else {
		$r = hexdec( substr( $hex, 0, 2) );
		$g = hexdec( substr( $hex, 2, 2) );
		$b = hexdec( substr( $hex, 4, 2) );
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb);
}

/**
 * Helper function to get theme visibility options
 */
function eut_visibility( $id, $fallback = '' ) {
	$visibility = eut_option( $id, $fallback  );
	if ( '1' == $visibility ) {
		return true;
	}
	return false;
}

/**
 * Backend Theme Activation Actions
 */
function eut_backend_theme_activation() {
	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {

		$catalog = array(
			'width'   => '600',    // px
			'height'  => '800',    // px
			'crop'	  => 1,        // true
		);

		$single = array(
			'width'   => '600',    // px
			'height'  => '800',    // px
			'crop'    => 1,        // true
		);

		$thumbnail = array(
			'width'   => '180',    // px
			'height'  => '180',    // px
			'crop'    => 1,        // true
		);

		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );
		update_option( 'woocommerce_enable_lightbox', false );

		//Redirect to Theme Options
		header( 'Location: ' . admin_url() . 'admin.php?page=eut_options&tab=0' ) ;
	}
}

add_action('admin_init','eut_backend_theme_activation');

/**
 * Check if Revolution slider is active
 */
function eut_is_revslider_active() {

	if ( class_exists('RevSlider') ) {
		return true;
	}
	return false;
}

/**
 * Check if to replace Backend Logo
 */
function eut_admin_login_logo() {

	$replace_logo = eut_option( 'replace_admin_logo' );
	if ( $replace_logo ) {
		$admin_logo = eut_option( 'admin_logo','','url' );
		$admin_logo_height = eut_option( 'admin_logo_height','84');
		$admin_logo_height = preg_match('/(px|em|\%|pt|cm)$/', $admin_logo_height) ? $admin_logo_height : $admin_logo_height . 'px';
		if( empty( $admin_logo ) ) {
			$admin_logo = eut_option( 'logo','','url' );
		}
		if ( !empty( $admin_logo ) ) {
			$admin_logo = str_replace( array( 'http:', 'https:' ), '', $admin_logo );
			echo "
			<style>
			.login h1 a {
				background-image: url('" . esc_url( $admin_logo ) . "');
				width: 100%;
				max-width: 300px;
				background-size: auto " . esc_attr( $admin_logo_height ) . ";
				height: " . esc_attr( $admin_logo_height ) . ";
			}
			</style>
			";
		}
	}
}
add_action( 'login_head', 'eut_admin_login_logo' );

function eut_login_headerurl( $url ){
	$replace_logo = eut_option( 'replace_admin_logo' );
	if ( $replace_logo ) {
		return esc_url( home_url( '/' ) );
	}
	return esc_url( $url );
}
add_filter('login_headerurl', 'eut_login_headerurl');

function eut_login_headertitle( $title ) {
	$replace_logo = eut_option( 'replace_admin_logo' );
	if ( $replace_logo ) {
		return esc_attr( get_bloginfo( 'name' ) );
	}
	return esc_attr( $title );
}
add_filter('login_headertitle', 'eut_login_headertitle' );

/**
 * Disable SEO Page Analysis
 */
function eut_disable_page_analysis( $bool ) {
	if( '1' == eut_option( 'disable_seo_page_analysis', '0' ) ) {
		return false;
	}
	return $bool;
}
add_filter( 'wpseo_use_page_analysis', 'eut_disable_page_analysis' );

/**
 * Get Browser Platform
 */
function eut_browser_webkit_check() {

	if ( empty($_SERVER['HTTP_USER_AGENT'] ) ) {
		return false;
	}

	$u_agent = $_SERVER['HTTP_USER_AGENT'];

	if (
		( preg_match( '!linux!i', $u_agent ) || preg_match( '!windows|win32!i', $u_agent ) ) && preg_match( '!webkit!i', $u_agent )
	) {
		return true;
	}

	return false;
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
