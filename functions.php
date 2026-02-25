<?php

/*
*	Main theme functions and definitions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Theme Definitions
 * Please leave these settings unchanged
 */

define( 'EUT_THEME_SHORT_NAME', 'corpus' );
define( 'EUT_THEME_NAME', 'Corpus' );
define( 'EUT_THEME_MAJOR_VERSION', 2 );
define( 'EUT_THEME_MINOR_VERSION', 13 );
define( 'EUT_THEME_HOTFIX_VERSION', 0 );
define( 'EUT_REDUX_CUSTOM_PANEL', false );

/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1080;
}

/**
 * Include Global helper files
 */
require_once get_template_directory() . '/includes/eut-global.php';
require_once get_template_directory() . '/includes/eut-meta-tags.php';
require_once get_template_directory() . '/includes/eut-privacy-functions.php';

/**
 * Include WooCommerce helper files
 */
require_once get_template_directory() . '/includes/eut-woocommerce-functions.php';

/**
 * Include bbPress helper files
 */
require_once get_template_directory() . '/includes/eut-bbpress-functions.php';

/**
 * Register Plugins Libraries
 */
if ( is_admin() ) {
	require_once get_template_directory() . '/includes/plugins/tgm-plugin-activation/register-plugins.php';
	require_once get_template_directory() . '/includes/plugins/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php';
}

/**
 * ReduxFramework
 */
require_once get_template_directory() . '/includes/admin/eut-redux-extension-loader.php';
if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/includes/framework/framework.php' ) ) {
    require_once get_template_directory() . '/includes/framework/framework.php';
}

if ( !isset( $redux_demo ) ) {
	require_once get_template_directory() . '/includes/admin/eut-redux-framework-config.php';
}

function eut_remove_redux_demo_link() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'eut_remove_redux_demo_link');

/**
 * Visual Composer Extentions
 */
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

	function eut_add_vc_extentions() {
		require_once get_template_directory() . '/vc_extend/eut-shortcodes-vc-helper.php';
		require_once get_template_directory() . '/vc_extend/eut-shortcodes-vc-remove.php';
		require_once get_template_directory() . '/vc_extend/eut-shortcodes-vc-add.php';
	}
	add_action( 'init', 'eut_add_vc_extentions', 5 );

}

/**
 * Include admin helper files
 */
require_once get_template_directory() . '/includes/admin/eut-admin-functions.php';
require_once get_template_directory() . '/includes/admin/eut-admin-custom-sidebars.php';
require_once get_template_directory() . '/includes/admin/eut-admin-media-functions.php';
require_once get_template_directory() . '/includes/admin/eut-admin-feature-functions.php';
if ( !defined('ENVATO_HOSTED_SITE') ) {
	require_once get_template_directory() . '/includes/admin/eut-update-functions.php';
}
require_once get_template_directory() . '/includes/admin/eut-meta-functions.php';
require_once get_template_directory() . '/includes/admin/eut-page-meta.php';
require_once get_template_directory() . '/includes/admin/eut-post-meta.php';
require_once get_template_directory() . '/includes/admin/eut-product-meta.php';

require_once get_template_directory() . '/includes/admin/eut-portfolio-meta.php';
require_once get_template_directory() . '/includes/admin/eut-testimonial-meta.php';
require_once get_template_directory() . '/includes/eut-wp-gallery.php';

/**
 * Include Dynamic css
 */
require_once get_template_directory() . '/includes/eut-dynamic-css-loader.php';

/**
 * Include helper files
 */
require_once get_template_directory() . '/includes/eut-excerpt.php';
require_once get_template_directory() . '/includes/eut-vce-functions.php';
require_once get_template_directory() . '/includes/eut-header-functions.php';
require_once get_template_directory() . '/includes/eut-feature-functions.php';
require_once get_template_directory() . '/includes/eut-layout-functions.php';
require_once get_template_directory() . '/includes/eut-blog-functions.php';
require_once get_template_directory() . '/includes/eut-media-functions.php';
require_once get_template_directory() . '/includes/eut-portfolio-functions.php';
require_once get_template_directory() . '/includes/eut-footer-functions.php';

/**
 * Include Theme Widgets
 */
require_once get_template_directory() . '/includes/widgets/eut-widget-social.php';
require_once get_template_directory() . '/includes/widgets/eut-widget-latest-posts.php';
require_once get_template_directory() . '/includes/widgets/eut-widget-latest-comments.php';
require_once get_template_directory() . '/includes/widgets/eut-widget-latest-portfolio.php';
require_once get_template_directory() . '/includes/widgets/eut-widget-contact-info.php';

//Add shortcodes to widget text
add_filter( 'widget_text' , 'do_shortcode' );

add_action( "after_switch_theme", "eut_theme_activate" );
add_action( 'after_setup_theme', 'eut_theme_setup' );
add_action( 'widgets_init', 'eut_register_sidebars' );

/**
 * Theme activation function
 * Used whe activating the theme
 */
function eut_theme_activate() {

	$eut_version = array (
		"major" => EUT_THEME_MAJOR_VERSION,
		"minor" => EUT_THEME_MINOR_VERSION,
		"hotfix" => EUT_THEME_HOTFIX_VERSION,
	);
	update_option( 'eut_theme_' . EUT_THEME_SHORT_NAME . '_version', $eut_version );
	flush_rewrite_rules();
}

/**
 * Theme setup function
 * Theme translations and support
 */
function eut_theme_setup() {

	load_theme_textdomain( 'corpus', get_template_directory() . '/languages' );

	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
	add_theme_support( 'title-tag' );

	$size_large_landscape_wide = eut_option( 'size_large_landscape_wide', array( 'width'   => '1170', 'height'  => '658') );
	$size_small_landscape_wide = eut_option( 'size_small_landscape_wide', array( 'width'   => '800', 'height'  => '450') );
	$size_small_landscape = eut_option( 'size_small_landscape', array( 'width'   => '800', 'height'  => '600') );
	$size_small_portrait = eut_option( 'size_small_portrait', array( 'width'   => '600', 'height'  => '800') );
	$size_small_square = eut_option( 'size_small_square', array( 'width'   => '600', 'height'  => '600') );
	$size_medium_portrait = eut_option( 'size_medium_portrait', array( 'width'   => '560', 'height'  => '1120') );
	$size_medium_square = eut_option( 'size_medium_square', array( 'width'   => '1120', 'height'  => '1120') );
	$size_fullscreen = eut_option( 'size_fullscreen', array( 'width'   => '1920', 'height'  => '1920') );

	add_image_size( 'eut-image-large-rect-horizontal', $size_large_landscape_wide['width'], $size_large_landscape_wide['height'], true );
	add_image_size( 'eut-image-small-square', $size_small_square['width'], $size_small_square['height'], true );
	add_image_size( 'eut-image-small-rect-horizontal', $size_small_landscape['width'], $size_small_landscape['height'], true );
	add_image_size( 'eut-image-small-rect-horizontal-wide', $size_small_landscape_wide['width'], $size_small_landscape_wide['height'], true );
	add_image_size( 'eut-image-small-rect-vertical', $size_small_portrait['width'], $size_small_portrait['height'], true );
	add_image_size( 'eut-image-medium-rect-vertical', $size_medium_portrait['width'], $size_medium_portrait['height'], true );
	add_image_size( 'eut-image-medium-square', $size_medium_square['width'], $size_medium_square['height'], true );
	add_image_size( 'eut-image-fullscreen', $size_fullscreen['width'], $size_fullscreen['height'], false );

	register_nav_menus(
		array(
			'eut_header_nav' => esc_html__( 'Header Menu', 'corpus' ),
			'eut_footer_nav' => esc_html__( 'Footer Menu', 'corpus' ),
		)
	);

}

/**
 * Navigation Menus
 */
function eut_get_header_nav() {

	$eut_main_menu = '';

	if ( 'default' == eut_option( 'menu_header_integration', 'default' ) ) {

		if ( is_singular() ) {
			if ( 'yes' == eut_post_meta( 'eut_disable_menu' ) ) {
				return 'disabled';
			} else {
				$eut_main_menu	= eut_post_meta( 'eut_main_navigation_menu' );
			}
		} else if ( corpus_eutf_is_woo_shop() ) {
			if ( 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_menu' ) ) {
				return 'disabled';
			} else {
				$eut_main_menu = corpus_eutf_post_meta_shop( 'eut_main_navigation_menu' );
			}
		}
	} else {
		$eut_main_menu = 'disabled';
	}

	return $eut_main_menu;
}

function eut_header_nav( $eut_main_menu = '') {

	if ( empty( $eut_main_menu ) ) {
		wp_nav_menu(
			array(
				'menu_class' => 'eut-menu', /* menu class */
				'theme_location' => 'eut_header_nav', /* where in the theme it's assigned */
				'container' => false,
				'fallback_cb' => 'eut_fallback_menu',
				'link_before' => '<span class="eut-item">',
				'link_after' => '</span>',
			)
		);
	} else {
		//Custom Alternative Menu
		wp_nav_menu(
			array(
				'menu_class' => 'eut-menu', /* menu class */
				'menu' => $eut_main_menu, /* menu name */
				'container' => false,
				'fallback_cb' => 'eut_fallback_menu',
				'link_before' => '<span class="eut-item">',
				'link_after' => '</span>',
			)
		);
	}
}

function eut_footer_nav() {

	wp_nav_menu(
		array(
			'theme_location' => 'eut_footer_nav',
			'container' => false, /* no container */
			'depth' => '1',
			'fallback_cb' => false,
		)
	);

}

/**
 * Main Navigation FallBack Menu
 */
if ( ! function_exists( 'eut_fallback_menu' ) ) {
	function eut_fallback_menu(){

		if( current_user_can( 'administrator' ) ) {
			echo '<span class="eut-no-assigned-menu">';
			echo esc_html__( 'Header Menu is not assigned!', 'corpus'  ) . " " .
			"<a href='" . admin_url() . "nav-menus.php?action=locations' target='_blank'>" . esc_html__( "Manage Locations", 'corpus' ) . "</a>";
			echo '</span>';
		}
	}
}

/**
 * Sidebars & Widgetized Areas
 */
function eut_register_sidebars() {

	$sidebar_heading_tag = eut_option( 'sidebar_heading_tag', 'h3' );
	$footer_heading_tag = eut_option( 'footer_heading_tag', 'h3' );

	register_sidebar( array(
		'id' => 'eut-default-sidebar',
		'name' => esc_html__( 'Main Sidebar', 'corpus' ),
		'description' => esc_html__( 'Main Sidebar Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
	));

	register_sidebar( array(
		'id' => 'eut-sidearea-sidebar',
		'name' => esc_html__( 'Smart Button Side Area', 'corpus' ),
		'description' => esc_html__( 'Side Area Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
	));

	register_sidebar( array(
		'id' => 'eut-single-portfolio-sidebar',
		'name' => esc_html__( 'Single Portfolio', 'corpus' ),
		'description' => esc_html__( 'Single Portfolio Sidebar Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
	));

	register_sidebar( array(
		'id' => 'eut-footer-1-sidebar',
		'name' => esc_html__( 'Footer 1', 'corpus' ),
		'description' => esc_html__( 'Footer 1 Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'eut-footer-2-sidebar',
		'name' => esc_html__( 'Footer 2', 'corpus' ),
		'description' => esc_html__( 'Footer 2 Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'eut-footer-3-sidebar',
		'name' => esc_html__( 'Footer 3', 'corpus' ),
		'description' => esc_html__( 'Footer 3 Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));
	register_sidebar( array(
		'id' => 'eut-footer-4-sidebar',
		'name' => esc_html__( 'Footer 4', 'corpus' ),
		'description' => esc_html__( 'Footer 4 Widget Area', 'corpus' ),
		'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<' . tag_escape( $footer_heading_tag ) . ' class="eut-widget-title">',
		'after_title' => '</' . tag_escape( $footer_heading_tag ) . '>',
	));

	$eut_custom_sidebars = get_option( 'eut-corpus-custom-sidebars' );
	if ( ! empty( $eut_custom_sidebars ) ) {
		foreach ( $eut_custom_sidebars as $eut_custom_sidebar ) {
			register_sidebar( array(
				'id' => $eut_custom_sidebar['id'],
				'name' => esc_html__( 'Custom Sidebar', 'corpus' ) . ': ' . $eut_custom_sidebar['name'],
				'description' => '',
				'before_widget' => '<div id="%1$s" class="eut-widget widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<' . tag_escape( $sidebar_heading_tag ) . ' class="eut-widget-title">',
				'after_title' => '</' . tag_escape( $sidebar_heading_tag ) . '>',
			));
		}
	}

}

/**
 * Custom Search Forms
 */
 function eut_modal_wpsearch( $form ) {
	$new_custom_id = uniqid( 'eut_search_' );
	$form = '';
	$form .= '<div class="eut-h6 eut-close-search">' . esc_html__( 'Close', 'corpus' ) . '</div>';
	$form .= '<form class="eut-search" method="get" action="' . home_url( '/' ) . '" >';
	$form .= '  <div class="eut-search-placeholder eut-h1">' . wp_kses( __( 'Enter your<br>text here', 'corpus' ), array( 'br' => array() ) ) . '</div>';
	$form .= '  <input type="text" class="eut-search-textfield" id="' . esc_attr( $new_custom_id ) . '" value="' . get_search_query() . '" name="s" autocomplete="off"/>';
	$form .= '  <input type="submit" value="' . esc_attr__( 'Start Searching', 'corpus' ) . '">';
	$form .= '</form>';
	return $form;
}

function eut_wpsearch( $form ) {
	$new_custom_id = uniqid( 'eut_search_' );
	$form =  '<form class="eut-search" method="get" action="' . home_url( '/' ) . '" >';
	$form .= '  <button type="submit" class="eut-search-btn"><i class="fa fa-search"></i></button>';
	$form .= '  <input type="text" class="eut-search-textfield" id="' . esc_attr( $new_custom_id ) . '" value="' . get_search_query() . '" name="s" placeholder="' . esc_attr__( 'Search for ...', 'corpus' ) . '" autocomplete="off"/>';
	$form .= '</form>';
	return $form;
}
add_filter( 'get_search_form', 'eut_wpsearch' );

/**
 * Enqueue scripts and styles for the front end.
 */
function eut_frontend_scripts() {

	$template_dir_uri = get_template_directory_uri();
	$child_theme_dir_uri = get_stylesheet_directory_uri();
	$eut_version = EUT_THEME_MAJOR_VERSION . '.' . EUT_THEME_MINOR_VERSION . '.' . EUT_THEME_HOTFIX_VERSION;

	wp_register_style( 'eut-style', $child_theme_dir_uri."/style.css", array(), esc_attr( $eut_version ), 'all' );
	wp_enqueue_style( 'eut-awesome-fonts', $template_dir_uri . '/css/font-awesome.min.css', array(), '4.7.0' );


	wp_enqueue_style( 'eut-basic', $template_dir_uri . '/css/basic.css', array(), esc_attr( $eut_version ) );
	wp_enqueue_style( 'eut-grid', $template_dir_uri . '/css/grid.css', array(), esc_attr( $eut_version ) );
	wp_enqueue_style( 'eut-theme-style', $template_dir_uri . '/css/theme-style.css', array(), esc_attr( $eut_version ) );
	wp_enqueue_style( 'eut-elements', $template_dir_uri . '/css/elements.css', array(), esc_attr( $eut_version ) );

	if ( corpus_eutf_woo_enabled() ) {
		wp_enqueue_style( 'eut-woocommerce-custom', $template_dir_uri . '/css/woocommerce-custom.css', array(), esc_attr( $eut_version ), 'all' );
	}

	if ( 'openstreetmap' == eut_option( 'map_api_mode', 'google-maps' ) ) {
		wp_enqueue_style(  'leaflet', '//unpkg.com/leaflet@1.3.1/dist/leaflet.css', array(), '1.3.1', 'all' );
	}

	if ( $child_theme_dir_uri !=  $template_dir_uri ) {
		wp_enqueue_style( 'eut-style');
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'eut-responsive', $template_dir_uri . '/css/responsive.css', array(), esc_attr( $eut_version ) );

	$gmap_api_key = eut_option( 'gmap_api_key' );

	if ( !empty( $gmap_api_key ) ) {
		wp_register_script( 'eut-googleapi-script', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $gmap_api_key ), NULL, NULL, true );
	} else {
		wp_register_script( 'eut-googleapi-script', '//maps.googleapis.com/maps/api/js?v=3', NULL, NULL, true );
	}
	wp_register_script( 'leaflet-maps-api', '//unpkg.com/leaflet@1.3.1/dist/leaflet.js', array(), '1.3.1', true );

	if ( 'openstreetmap' == eut_option( 'map_api_mode', 'google-maps' ) ) {
		wp_register_script( 'eut-maps-script', get_template_directory_uri() . '/js/leaflet-maps.js', array( 'jquery', 'leaflet-maps-api' ), esc_attr( $eut_version ), true );
		$eut_maps_data = array(
			'map_tile_url' => eut_option( 'map_tile_url', 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png' ),
			'map_tile_url_subdomains' => eut_option( 'map_tile_url_subdomains', 'abc' ),
			'map_tile_attribution' => eut_option( 'map_tile_attribution' ),
		);
	} else {
		wp_register_script( 'eut-maps-script', $template_dir_uri . '/js/maps.js', array( 'jquery', 'eut-googleapi-script' ), esc_attr( $eut_version ), true );
		$eut_maps_data = array(
			'hue_enabled' => eut_option( 'gmap_hue_enabled', '0' ) ,
			'hue' => eut_option( 'gmap_hue', '#ffffff' ) ,
			'saturation' => eut_option( 'gmap_saturation', '0' ) ,
			'lightness' => eut_option( 'gmap_hue', '0' ) ,
			'gamma' => eut_option( 'gmap_gamma', '0.1' ) ,
		);
	}
	wp_localize_script( 'eut-maps-script', 'eut_maps_data', $eut_maps_data );
	wp_enqueue_script( 'eut-modernizr-script', $template_dir_uri . '/js/modernizr.custom.js', array( 'jquery' ), '2.8.3', false );

	if ( eut_browser_webkit_check() ) {
		wp_enqueue_script( 'eut-smoothscrolling-script', $template_dir_uri . '/js/smoothscrolling.js', array( 'jquery' ), '1.2.1', true );
	}

	wp_enqueue_script( 'eut-plugins', $template_dir_uri . '/js/plugins.js', array( 'jquery' ), esc_attr( $eut_version ), true );
	$eut_plugins_data = array(
		'retina_support' => eut_option( 'retina_support', 'default' ),
	);
	wp_localize_script( 'eut-plugins', 'eut_plugins_data', $eut_plugins_data );

	wp_enqueue_script( 'eut-afterresize-script', $template_dir_uri . '/js/afterresize.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'eut-isotope-script', $template_dir_uri . '/js/isotope.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'eut-main-script', $template_dir_uri . '/js/main.js', array( 'jquery' ), esc_attr( $eut_version ), true );

	$eut_main_data = array(
		'siteurl' => $template_dir_uri ,
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'eut_wp_gallery_popup' => eut_option( 'wp_gallery_popup', '0' ),
	);
	wp_localize_script( 'eut-main-script', 'eut_main_data', $eut_main_data );
	if ( function_exists( 'wp_add_inline_script' ) ) {
		wp_add_inline_script( 'eut-main-script', eut_get_privacy_cookie_script() );
	}

}
add_action( 'wp_enqueue_scripts', 'eut_frontend_scripts' );

function eut_remove_conflict_frontend_css() {

	//Deregister VC awesome fonts as it is already enqueued
	if ( wp_style_is( 'font-awesome', 'registered' ) ) {
		wp_deregister_style( 'font-awesome' );
	}

}
add_action( 'wp_head', 'eut_remove_conflict_frontend_css', 2000 );

/**
 * Pagination functions
 */
function eut_paginate_links() {
	global $wp_query;

	$paged = 1;
	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	}

	$total = $wp_query->max_num_pages;
	$big = 999999999; // need an unlikely integer
	if( $total > 1 )  {
		 echo '<div class="eut-pagination">';

		 if( get_option('permalink_structure') ) {
			 $format = 'page/%#%/';
		 } else {
			 $format = '&paged=%#%';
		 }
		 echo paginate_links(array(
			'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'		=> $format,
			'current'		=> max( 1, $paged ),
			'total'			=> $total,
			'mid_size'		=> 2,
			'type'			=> 'list',
			'prev_text'	=> '<i class="eut-icon-nav-left"></i>',
			'next_text'	=> '<i class="eut-icon-nav-right"></i>',
			'add_args' => false,
		 ));
		 echo '</div>';
	}
}

function eut_wp_link_pages() {
?>
	<?php
		$args = array(
			'before'           => '<p>',
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'nextpagelink'     => "<i class='eut-icon-nav-right'></i>",
			'previouspagelink' => "<i class='eut-icon-nav-left'></i>",
			'pagelink'         => '%',
			'echo'             => 1
		);
	?>
	<div class="eut-pagination">
	<?php wp_link_pages( $args ); ?>
	</div>
<?php
}

/**
 * Comments
 */
function eut_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li class="eut-comment-item">
		<!-- Comment -->
		<article id="comment-<?php comment_ID(); ?>"  <?php comment_class(); ?>>
			<?php echo get_avatar( $comment, 50 ); ?>
			<div class="eut-comment-content">

				<h6 class="eut-author">
					<a href="<?php comment_author_url( $comment->comment_ID ); ?>"><?php comment_author(); ?></a>
				</h6>
				<div class="eut-comment-date eut-small-text">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( ' %1$s ' . esc_html__( 'at', 'corpus' ) . ' %2$s', get_comment_date(),  get_comment_time() ); ?></a>
				</div>
				<div class="eut-comment-item-btn">
					<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__( 'REPLY', 'corpus' ) ) ) ); ?>
					<?php edit_comment_link( esc_html__( 'EDIT', 'corpus' ), '  ', '' ); ?>
				</div>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'corpus' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
		</article>

	<!-- </li> is added by WordPress automatically -->
<?php
}

/**
 * Navigation links for prev/next in comments
 */
function eut_replace_reply_link_class( $output ) {
	$class = 'eut-small-text eut-comment-reply';
	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $class, $output, 1 );
}
add_filter('comment_reply_link', 'eut_replace_reply_link_class');

function eut_replace_edit_link_class( $output ) {
	$class = 'eut-small-text eut-comment-edit';
	return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $class, $output, 1 );
}
add_filter('edit_comment_link', 'eut_replace_edit_link_class');

/**
 * Title Render Fallback before WordPress 4.1
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function eut_theme_render_title() {
?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'eut_theme_render_title' );
}

/**
 * Max srcset filter
 */
function eut_max_srcset_image_width($max_image_width, $size_array) {
	return 1920;
}
add_filter( 'max_srcset_image_width', 'eut_max_srcset_image_width', 10 , 2 );

/**
 * Theme identifier function
 * Used to get theme information
 */
function eut_theme_info() {

	$eut_info = array (
		"major_version" => EUT_THEME_MAJOR_VERSION,
		"minor_version" => EUT_THEME_MINOR_VERSION,
		"hotfix_version" => EUT_THEME_HOTFIX_VERSION,
		"short_name" => EUT_THEME_SHORT_NAME,
	);

	return $eut_info;
}

/**
 * VC Control Fix
 */
if ( ! function_exists( 'eut_vc_control_scripts' ) ) {
	function eut_vc_control_scripts() {
?>
	<script type="text/javascript">
	jQuery(document).on('click','.vc_ui-button[data-vc-ui-element="button-save"]', function(e){
		if ( vc !== undefined && vc.edit_form_callbacks !== undefined ) { vc.edit_form_callbacks=[]; }
	});
	jQuery(document).on('click','.vc_ui-button[data-vc-ui-element="button-close"]', function(e){
		if ( vc !== undefined && vc.edit_form_callbacks !== undefined ) { vc.edit_form_callbacks=[]; }
	});
	jQuery(document).on('click','.vc_ui-control-button[data-vc-ui-element="button-close"]', function(e){
		if ( vc !== undefined && vc.edit_form_callbacks !== undefined ) { vc.edit_form_callbacks=[]; }
	});
	</script>
<?php
	}
}
add_action('admin_print_footer_scripts', 'eut_vc_control_scripts');

//Omit closing PHP tag to avoid accidental whitespace output errors.
