<?php
/**
 *  Dynamic css style
 * 	@author		Euthemians Team
 * 	@URI		http://Euthemians.eu
 */

$css = "";

/**
* Header
* ----------------------------------------------------------------------------
*/

/* Popup Overlays */
$eut_popup_background_color = eut_option( 'popup_background_color', '#ffffff' );
$css .= "

.eut-body-overlay,
.mfp-bg {
	background-color: rgba(" . eut_hex2rgb( $eut_popup_background_color ) . "," . eut_option( 'popup_background_color_opacity', '1') . ");
}


";

/* Top Bar Settings */

$css .= "
#eut-top-bar {
	line-height: " . eut_option( 'top_bar_height', 40 ) . "px;
	background-color: " . eut_option( 'top_bar_bg_color' ) . ";
	color: " . eut_option( 'top_bar_font_color' ) . ";
}

#eut-top-bar a {
	color: " . eut_option( 'top_bar_link_color' ) . ";
}

#eut-top-bar a:hover {
	color: " . eut_option( 'top_bar_hover_color' ) . ";
}

#eut-top-bar .eut-language ul li a {
	background-color: " . eut_option( 'submenu_bg_color' ) . ";
	color: " . eut_option( 'submenu_text_color' ) . ";
}

#eut-top-bar .eut-language ul li a:hover {
	background-color: " . eut_option( 'submenu_active_bg_color' ) . ";
	color: " . eut_option( 'submenu_text_hover_color' ) . ";
}

#eut-header[data-overlap='yes'][data-header-position='above-feature'][data-topbar='yes'] #eut-header-wrapper {
	top: " . eut_option( 'top_bar_height', 40 ) . "px;
}

#eut-top-bar,
#eut-top-bar ul li.eut-topbar-item ul li a,
#eut-top-bar ul.eut-bar-content,
#eut-top-bar ul.eut-bar-content > li {
	border-color: " . eut_option( 'top_bar_border_color' ) . " !important;
}


";

/* Header Height */
$css .= "

#eut-header #eut-inner-header {
	height: " . eut_option( 'header_height', 70 ) . "px;
	line-height: " . eut_option( 'header_height', 70 ) . "px;
}

#eut-header #eut-header-wrapper,
#eut-header[data-menu-align='center'] #eut-main-menu {
	height: " . eut_option( 'header_height', 70 ) . "px;
}

#eut-header .eut-menu-options-wrapper {
	min-width: " . intval( eut_option( 'header_height', 70 ) - 15 ) . "px;
}

#eut-header .eut-menu-options {
	height: " . eut_option( 'header_height', 70 ) . "px;
	line-height: " . eut_option( 'header_height', 70 ) . "px;
}

";

/* Logo Height */
$css .= "

#eut-header .eut-logo {
	height: " . eut_option( 'header_height', 70 ) . "px;
}

#eut-header .eut-logo .eut-logo-wrapper a {
	height: " . eut_option( 'logo_height', 30 ) . "px;
}

";

/* Fix Feature Content Position */
$css .= "

#eut-header[data-overlap='yes'][data-header-position='above-feature'] .eut-feature-content {
	padding-top: " . intval( eut_option( 'header_height', 70 ) / 2 ) . "px;
}

#eut-header[data-overlap='yes'][data-header-position='above-feature'] .eut-feature-content.eut-align-left-top,
#eut-header[data-overlap='yes'][data-header-position='above-feature'] .eut-feature-content.eut-align-center-top,
#eut-header[data-overlap='yes'][data-header-position='above-feature'] .eut-feature-content.eut-align-right-top {
	padding-top: " . intval( eut_option( 'header_height', 70 ) + 40 ) . "px;
}

#eut-header[data-overlap='yes'][data-header-position='below-feature'] .eut-feature-content.eut-align-left-bottom,
#eut-header[data-overlap='yes'][data-header-position='below-feature'] .eut-feature-content.eut-align-center-bottom,
#eut-header[data-overlap='yes'][data-header-position='below-feature'] .eut-feature-content.eut-align-right-bottom {
	padding-bottom: " . intval( eut_option( 'header_height', 70 ) + 40 )  . "px;
}

";

/* Responsive Menu --------------------------------------------------------------------------------------- */
$eut_responsive_background_color = eut_option( 'header_background_color', '#ffffff' );
$css .= "

#eut-main-menu-responsive {
	color: " . eut_option( 'menu_text_color' ) . ";
	background-color: rgba(" . eut_hex2rgb( $eut_responsive_background_color ) . "," . eut_option( 'header_background_color_opacity', '1') . ");
}

#eut-main-menu-responsive li a,
#eut-main-menu-responsive ul.eut-menu-options a {
	color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-main-menu-responsive li a:hover,
#eut-main-menu-responsive ul.eut-menu-options a:hover {
	color: " . eut_option( 'menu_text_hover_color' ) . ";
}

#eut-main-menu-responsive ul li.current-menu-item > a,
#eut-main-menu-responsive ul li.current-menu-parent > a,
#eut-main-menu-responsive ul li.current_page_item > a,
#eut-main-menu-responsive ul li.current_page_ancestor > a {
	color: " . eut_option( 'menu_text_hover_color' ) . ";
}

.eut-side-area .eut-close-menu-button:after,
.eut-side-area .eut-close-menu-button:before,
#eut-main-menu-responsive ul.eut-menu li .eut-arrow:after,
#eut-main-menu-responsive ul.eut-menu li .eut-arrow:before {
	background-color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-main-menu-responsive .eut-menu-options a {
	color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-main-menu-responsive ul li a .label {
	color: " . eut_option( 'submenu_text_hover_color' ) . ";
	background-color: " . eut_option( 'submenu_active_bg_color' ) . ";
}

";

/* Header Default Colors --------------------------------------------------------------------------------------- */

$eut_header_background_color = eut_option( 'header_background_color', '#ffffff' );
$eut_header_border_color = eut_option( 'header_border_color', '#e0e0e0' );
$css .= "

#eut-header.eut-default #eut-inner-header,
#eut-header.eut-default[data-sticky-header='shrink'] {
	background-color: rgba(" . eut_hex2rgb( $eut_header_background_color ) . "," . eut_option( 'header_background_color_opacity', '1') . ");
}

#eut-header #eut-inner-header,
#eut-header[data-menu-options='right'] .eut-menu-options-wrapper,
#eut-header[data-menu-options='left'] .eut-menu-options-wrapper {
	border-color: rgba(" . eut_hex2rgb( $eut_header_border_color ) . "," . eut_option( 'header_border_color_opacity', '1') . ");
}

";

/* Menu Default Colors --------------------------------------------------------------------------------------- */

$css .= "

#eut-header.eut-default #eut-main-menu > ul > li > a,
#eut-header.eut-default .eut-menu-options a,
#eut-header.eut-default .eut-logo.eut-logo-text a,
#eut-header.eut-default .eut-responsive-menu-text {
	color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-header.eut-default .eut-menu-button-line {
	background-color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-header.eut-default .eut-button-icon .eut-line-icon,
#eut-header.eut-default .eut-button-icon .eut-line-icon:after,
#eut-header.eut-default .eut-button-icon .eut-line-icon:before {
	background-color: " . eut_option( 'menu_text_color' ) . ";
}

#eut-header.eut-default .eut-button-icon:hover .eut-line-icon,
#eut-header.eut-default .eut-button-icon:hover .eut-line-icon:after,
#eut-header.eut-default .eut-button-icon:hover .eut-line-icon:before {
	background-color: " . eut_option( 'menu_text_hover_color' ) . ";
}

#eut-header.eut-default #eut-main-menu > ul > li > a span.eut-item:after {
	background-color: " . eut_option( 'menu_line_color' ) . ";
}

";

/* Simply Menu Type */

$css .= "

#eut-header.eut-default #eut-main-menu > ul > li.current-menu-item > a,
#eut-header.eut-default #eut-main-menu > ul > li.current-menu-parent > a,
#eut-header.eut-default #eut-main-menu > ul > li.current_page_item > a,
#eut-header.eut-default #eut-main-menu > ul > li.current_page_ancestor > a,
#eut-header.eut-default #eut-main-menu > ul > li:hover > a,
#eut-header.eut-default #eut-main-menu > ul > li.current-menu-ancestor > a,
#eut-header.eut-default #eut-main-menu > ul > li.active > a,
#eut-header.eut-default .eut-menu-options a:hover ,
#eut-main-menu-responsive ul.eut-menu > li.open > a {
	color: " . eut_option( 'menu_text_hover_color' ) . ";
}

";

/* Submenu Colors */

$css .= "

#eut-header #eut-main-menu ul li ul a,
#eut-header #eut-main-menu ul li a:hover .label,
#eut-header #eut-main-menu > ul > li.megamenu > ul {
	color: " . eut_option( 'submenu_text_color' ) . ";
	background-color: " . eut_option( 'submenu_bg_color' ) . ";
}

#eut-header #eut-main-menu ul li.current-menu-item > a {
	color: " . eut_option( 'submenu_text_hover_color' ) . ";
}

#eut-header #eut-main-menu ul li ul a:hover {
	color: " . eut_option( 'submenu_text_hover_color' ) . ";
	background-color: " . eut_option( 'submenu_active_bg_color' ) . ";
}

#eut-header #eut-main-menu > ul > li.megamenu > ul > li {
	border-color: " . eut_option( 'submenu_border_color' ) . ";
}

#eut-header #eut-main-menu > ul > li.megamenu > ul > li > a {
	color: " . eut_option( 'submenu_title_color' ) . ";
	background-color: transparent;
}

";



/* Header Light Colors --------------------------------------------------------------------------------------- */

$eut_header_light_background_color = eut_option( 'header_light_background_color', '#323232' );
$eut_header_light_border_color = eut_option( 'header_light_border_color', '#ffffff' );
$css .= "

#eut-header.eut-light #eut-inner-header,
#eut-header.eut-light[data-menu-options='right'] .eut-menu-options-wrapper,
#eut-header.eut-light[data-menu-options='left'] .eut-menu-options-wrapper {
	border-color: rgba(" . eut_hex2rgb( $eut_header_light_border_color ) . "," . eut_option( 'header_light_border_color_opacity', '0') . ");
}

";


/* Menu Light Colors --------------------------------------------------------------------------------------- */

$css .= "

#eut-header.eut-light #eut-main-menu > ul > li > a,
#eut-header.eut-light .eut-menu-options a,
#eut-header.eut-light .eut-logo.eut-logo-text a,
#eut-header.eut-light .eut-responsive-menu-text {
	color: " . eut_option( 'light_menu_text_color' ) . ";
}

#eut-header.eut-light .eut-menu-button-line {
	background-color: " . eut_option( 'light_menu_text_color' ) . ";
}

#eut-header.eut-light .eut-button-icon .eut-line-icon,
#eut-header.eut-light .eut-button-icon .eut-line-icon:after,
#eut-header.eut-light .eut-button-icon .eut-line-icon:before {
	background-color: " . eut_option( 'light_menu_text_color' ) . ";
}

#eut-header.eut-light .eut-button-icon:hover .eut-line-icon,
#eut-header.eut-light .eut-button-icon:hover .eut-line-icon:after,
#eut-header.eut-light .eut-button-icon:hover .eut-line-icon:before {
	background-color: " . eut_option( 'light_menu_text_hover_color' ) . ";
}

#eut-header.eut-light #eut-main-menu > ul > li > a span.eut-item:after {
	background-color: " . eut_option( 'light_menu_line_color' ) . ";
}

";

/* Simply Menu Type */

$css .= "

#eut-header.eut-light #eut-main-menu > ul > li.current-menu-item > a,
#eut-header.eut-light #eut-main-menu > ul > li.current-menu-parent > a,
#eut-header.eut-light #eut-main-menu > ul > li.current_page_item > a,
#eut-header.eut-light #eut-main-menu > ul > li.current_page_ancestor > a,
#eut-header.eut-light #eut-main-menu > ul > li.active > a,
#eut-header.eut-light #eut-main-menu > ul > li:hover > a,
#eut-header.eut-light #eut-main-menu > ul > li.current-menu-ancestor > a,
#eut-header.eut-light .eut-menu-options a:hover {
	color: " . eut_option( 'light_menu_text_hover_color' ) . ";
}

";


/* Header Dark Colors --------------------------------------------------------------------------------------- */

$eut_header_dark_background_color = eut_option( 'header_dark_background_color', '#ffffff' );
$eut_header_dark_border_color = eut_option( 'header_dark_border_color', '#ffffff' );
$css .= "

#eut-header.eut-dark #eut-inner-header,
#eut-header.eut-dark[data-menu-options='right'] .eut-menu-options-wrapper,
#eut-header.eut-dark[data-menu-options='left'] .eut-menu-options-wrapper {
	border-color: rgba(" . eut_hex2rgb( $eut_header_dark_border_color ) . "," . eut_option( 'header_dark_border_color_opacity', '0') . ");
}

";

/* Menu Dark Colors --------------------------------------------------------------------------------------- */

$css .= "

#eut-header.eut-dark #eut-main-menu > ul > li > a,
#eut-header.eut-dark .eut-menu-options a,
#eut-header.eut-dark .eut-logo.eut-logo-text a,
#eut-header.eut-dark .eut-responsive-menu-text {
	color: " . eut_option( 'dark_menu_text_color' ) . ";
}

#eut-header.eut-dark .eut-menu-button-line {
	background-color: " . eut_option( 'dark_menu_text_color' ) . ";
}

#eut-header.eut-dark .eut-button-icon .eut-line-icon,
#eut-header.eut-dark .eut-button-icon .eut-line-icon:after,
#eut-header.eut-dark .eut-button-icon .eut-line-icon:before {
	background-color: " . eut_option( 'dark_menu_text_color' ) . ";
}

#eut-header.eut-dark .eut-button-icon:hover .eut-line-icon,
#eut-header.eut-dark .eut-button-icon:hover .eut-line-icon:after,
#eut-header.eut-dark .eut-button-icon:hover .eut-line-icon:before {
	background-color: " . eut_option( 'dark_menu_text_hover_color' ) . ";
}

#eut-header.eut-dark #eut-main-menu > ul > li > a span.eut-item:after {
	background-color: " . eut_option( 'dark_menu_line_color' ) . ";
}

";

/* Simply Menu Type */

$css .= "

#eut-header.eut-dark #eut-main-menu > ul > li.current-menu-item > a,
#eut-header.eut-dark #eut-main-menu > ul > li.current-menu-parent > a,
#eut-header.eut-dark #eut-main-menu > ul > li.current_page_item > a,
#eut-header.eut-dark #eut-main-menu > ul > li.current_page_ancestor > a,
#eut-header.eut-dark #eut-main-menu > ul > li.active > a,
#eut-header.eut-dark #eut-main-menu > ul > li:hover > a,
#eut-header.eut-dark #eut-main-menu > ul > li.current-menu-ancestor > a,
#eut-header.eut-dark .eut-menu-options a:hover {
	color: " . eut_option( 'dark_menu_text_hover_color' ) . ";
}

";


/* Sticky Header */
$eut_header_sticky_background_color = eut_option( 'header_sticky_background_color', '#ffffff' );
$eut_header_sticky_border_color = eut_option( 'header_sticky_border_color', '#ffffff' );

$css .= "
#eut-header.eut-default.eut-header-sticky #eut-inner-header,
#eut-header.eut-light.eut-header-sticky #eut-inner-header,
#eut-header.eut-dark.eut-header-sticky #eut-inner-header,
#eut-header[data-sticky-header='advanced'] #eut-inner-header:before {
	background-color: rgba(" . eut_hex2rgb( $eut_header_sticky_background_color ) . "," . eut_option( 'header_sticky_background_color_opacity', '1') . ");
}

#eut-header.eut-header-sticky #eut-inner-header,
#eut-header.eut-header-sticky[data-menu-options='right'] .eut-menu-options-wrapper,
#eut-header.eut-header-sticky[data-menu-options='left'] .eut-menu-options-wrapper {
	border-color: rgba(" . eut_hex2rgb( $eut_header_sticky_border_color ) . "," . eut_option( 'header_sticky_border_color_opacity', '1') . ");
}

";

/* Shrink Logo */
$eut_header_sticky_type = eut_option( 'header_sticky_type', 'simply' );
if ( 'shrink' == $eut_header_sticky_type ) {
	$eut_header_shrink_height = intval( eut_option( 'header_height', 70 ) / 2 );
	$eut_logo_height = eut_option( 'logo_height', 30 );
	$eut_logo_shrink_height = intval( $eut_header_shrink_height - 15 );
	if( $eut_logo_shrink_height > $eut_logo_height ){
		$eut_logo_shrink_height = $eut_logo_height;
	}

	$css .= "
	#eut-header.eut-header-sticky .eut-logo .eut-logo-wrapper a {
	    height: " . $eut_logo_shrink_height . "px;
	}
	";
}

/* Sticky Menu Colors */

$css .= "

#eut-header.eut-header-sticky #eut-main-menu > ul > li > a,
#eut-header.eut-header-sticky .eut-menu-options a,
#eut-header.eut-header-sticky .eut-logo.eut-logo-text a,
#eut-header.eut-header-sticky .eut-responsive-menu-text {
	color: " . eut_option( 'sticky_menu_text_color' ) . ";
}

#eut-header.eut-header-sticky #eut-main-menu > ul > li.current-menu-item > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li.current-menu-parent > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li.current_page_item > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li.current_page_ancestor > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li.active > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li:hover > a,
#eut-header.eut-header-sticky #eut-main-menu > ul > li.current-menu-ancestor > a,
#eut-header.eut-header-sticky .eut-menu-options a:hover {
	color: " . eut_option( 'sticky_menu_text_hover_color' ) . ";
}

#eut-header.eut-header-sticky #eut-main-menu > ul > li > a span.eut-item:after {
	background-color: " . eut_option( 'sticky_menu_line_color' ) . ";
}

";

/* Menu Buttons Icon */
$css .= "

#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon .eut-line-icon,
#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon .eut-line-icon:after,
#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon .eut-line-icon:before {
	background-color: " . eut_option( 'sticky_menu_text_color' ) . ";
}

#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon:hover .eut-line-icon,
#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon:hover .eut-line-icon:after,
#eut-header.eut-header-sticky .eut-advanced-menu-button .eut-button-icon:hover .eut-line-icon:before {
	background-color: " . eut_option( 'sticky_menu_text_hover_color' ) . ";
}

#eut-header.eut-header-sticky .eut-button-icon .eut-line-icon,
#eut-header.eut-header-sticky .eut-button-icon .eut-line-icon:after,
#eut-header.eut-header-sticky .eut-button-icon .eut-line-icon:before {
	background-color: " . eut_option( 'sticky_menu_text_color' ) . ";
}

#eut-header.eut-header-sticky .eut-button-icon:hover .eut-line-icon,
#eut-header.eut-header-sticky .eut-button-icon:hover .eut-line-icon:after,
#eut-header.eut-header-sticky .eut-button-icon:hover .eut-line-icon:before {
	background-color: " . eut_option( 'sticky_menu_text_hover_color' ) . ";
}

";

/* Page Title Colors */

$css .= "

#eut-page-title,
#eut-main-content.eut-error-404 {
	background-color: " . eut_option( 'page_title_background_color' ) . ";
}

";

/**
 * Portfolio Title & Portfolio Description
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-portfolio-title {
	background-color: " . eut_option( 'portfolio_title_background_color' ) . ";
}

";

/**
 * Blog Title
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-page-title.eut-blog-title {
	background-color: " . eut_option( 'blog_title_background_color' ) . ";
}

";

/**
 * Single Post Title
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-post-title {
	background-color: " . eut_option( 'post_title_background_color' ) . ";
}

";


/* Page Anchor Menu */

$css .= "
#eut-anchor-menu {
	height: " . eut_option( 'page_anchor_menu_height', 70 ) . "px;
	line-height: " . eut_option( 'page_anchor_menu_height', 70 ) . "px;
}

#eut-anchor-menu-wrapper {
	height: " . eut_option( 'page_anchor_menu_height', 70 ) . "px;
}

#eut-anchor-menu,
#eut-anchor-menu.eut-responsive-bar ul li,
#eut-anchor-menu ul li ul {
	background-color: " . eut_option( 'page_anchor_menu_background_color' ) . ";

}

#eut-anchor-menu ul li a {
	color: " . eut_option( 'page_anchor_menu_text_color' ) . ";
	background-color: " . eut_option( 'page_anchor_menu_background_color' ) . ";
}

#eut-anchor-menu .eut-menu-button .eut-menu-button-line {
	background-color: " . eut_option( 'page_anchor_menu_text_color' ) . ";
}

#eut-anchor-menu ul li.current-menu-item a,
#eut-anchor-menu ul li a:hover,
#eut-anchor-menu ul li.primary-button a,
#eut-anchor-menu ul li.current > a,
#eut-anchor-menu.eut-current-link ul li.active > a {
	color: " . eut_option( 'page_anchor_menu_text_hover_color' ) . ";
	background-color: " . eut_option( 'page_anchor_menu_background_hover_color' ) . ";
}

#eut-anchor-menu ul li,
#eut-anchor-menu ul li ul li,
#eut-anchor-menu.eut-responsive-bar ul li,
#eut-anchor-menu.eut-responsive-bar ul li ul,
#eut-anchor-menu.eut-incontainer > ul > li:first-child {
	border-color: " . eut_option( 'page_anchor_menu_border_color' ) . ";
}

";


/* Main Content Colors */
$css .= "
#eut-main-content {
	background-color: " . eut_option( 'theme_body_background_color' ) . ";
}

";

/* Main Content Link Colors */
$css .= "
a {
	color: " . eut_option( 'body_text_link_color' ) . ";
}

a:hover {
	color: " . eut_option( 'body_text_link_hover_color' ) . ";
}

";


/* Footer */

$css .= "

#eut-footer-area {
	background-color: " . eut_option( 'footer_widgets_bg_color' ) . ";
}

/* Widget Title Color */
#eut-footer-area h1,
#eut-footer-area h2,
#eut-footer-area h3,
#eut-footer-area h4,
#eut-footer-area h5,
#eut-footer-area h6,
#eut-footer-area .eut-widget-title,
#eut-footer-area .widget.widget_recent_entries li span.post-date,
#eut-footer-area .widget.widget_rss .eut-widget-title a {
	color: " . eut_option( 'footer_widgets_headings_color' ) . ";
}

/* Footer Text Color */
#eut-footer-area,
#eut-footer-area .widget.widget_tag_cloud a{
	color: " . eut_option( 'footer_widgets_font_color' ) . ";
}

#eut-footer-area .widget li a,
#eut-footer-area a {
	color: " . eut_option( 'footer_widgets_link_color' ) . ";
}


/* Footer Text Hover Color */
#eut-footer-area .widget li a:hover,
#eut-footer-area a:hover {
	color: " . eut_option( 'footer_widgets_hover_color' ) . ";
}

#eut-footer-area input,
#eut-footer-area input[type='text'],
#eut-footer-area input[type='input'],
#eut-footer-area input[type='password'],
#eut-footer-area input[type='email'],
#eut-footer-area input[type='number'],
#eut-footer-area input[type='date'],
#eut-footer-area input[type='url'],
#eut-footer-area input[type='tel'],
#eut-footer-area input[type='search'],
#eut-footer-area .eut-search button[type='submit'],
#eut-footer-area textarea,
#eut-footer-area select,
#eut-footer-area .widget.widget_calendar table th,
#eut-footer-area .eut-widget.eut-social li a,
#eut-footer-area .widget li,
#eut-footer-area .widget li ul  {
	border-color: " . eut_option( 'footer_widgets_border_color' ) . ";
}

";

/* Footer Bar */
$eut_footer_bar_bg_color = eut_option( 'footer_bar_bg_color', '#ffffff' );
$css .= "

#eut-footer-bar {
	background-color: rgba(" . eut_hex2rgb( $eut_footer_bar_bg_color ) . "," . eut_option( 'footer_bar_bg_color_opacity', '1') . ");
	color: " . eut_option( 'footer_bar_font_color' ) . ";
}

#eut-footer-bar #eut-second-menu li a,
#eut-footer-bar .eut-social li a,
#eut-footer-bar .eut-social li:after,
#eut-footer-bar a {
	color: " . eut_option( 'footer_bar_link_color' ) . ";
}

#eut-footer-bar #eut-second-menu li a:hover,
#eut-footer-bar .eut-social li a:hover,
#eut-footer-bar a:hover {
	color: " . eut_option( 'footer_bar_hover_color' ) . ";
}

";

/**
* Overlays
* ----------------------------------------------------------------------------
*/
/* Black */
$css .= "

.eut-dark-overlay:before {
	background-color: #000000;
}

";

/* White */
$css .= "

.eut-light-overlay:before {
	background-color: #ffffff;
}

";

/* Primary Colors */
$css .= "

.eut-primary-1-overlay:before {
	background-color: " . eut_option( 'body_primary_1_color' ) . ";
}

.eut-primary-2-overlay:before {
	background-color: " . eut_option( 'body_primary_2_color' ) . ";
}

.eut-primary-3-overlay:before {
	background-color: " . eut_option( 'body_primary_3_color' ) . ";
}

.eut-primary-4-overlay:before {
	background-color: " . eut_option( 'body_primary_4_color' ) . ";
}

.eut-primary-5-overlay:before {
	background-color: " . eut_option( 'body_primary_5_color' ) . ";
}


";

/**
 * Typography Colors
 * ----------------------------------------------------------------------------
 */

/* Text Color */
$css .= "

#eut-main-content,
.eut-bg-light,
#eut-main-content .eut-sidebar-colored.eut-bg-light a,
#eut-anchor-menu,
#eut-main-content .widget.widget_categories li a,
#eut-main-content .widget.widget_pages li a,
#eut-main-content .widget.widget_archive li a,
#eut-main-content .widget.widget_nav_menu li a,
#eut-main-content .widget.widget_tag_cloud a,
#eut-main-content .widget.widget_meta a,
#eut-main-content .widget.widget_recent_entries a,
#eut-main-content .widget.widget_recent_comments a.url,
#eut-main-content .eut-widget.eut-comments a.url,
#eut-main-content .eut-widget.eut-social li a,
#eut-side-area .widget.widget_categories li a,
#eut-side-area .widget.widget_pages li a,
#eut-side-area .widget.widget_archive li a,
#eut-side-area .widget.widget_nav_menu li a,
#eut-side-area .widget.widget_tag_cloud a,
#eut-side-area .widget.widget_meta a,
#eut-side-area .widget.widget_recent_entries a,
#eut-side-area .widget.widget_recent_comments a.url,
#eut-side-area .eut-widget.eut-comments a.url,
#eut-side-area .eut-widget.eut-latest-news a,
#eut-side-area .eut-widget.eut-social li a,
#eut-comments .eut-comment-item .eut-comment-date a:hover,
.eut-pagination ul li a,
input[type='text'],
input[type='input'],
input[type='password'],
input[type='email'],
input[type='number'],
input[type='date'],
input[type='url'],
input[type='tel'],
input[type='search'],
textarea,
select,
.eut-map-infotext p,
#eut-main-content .eut-portfolio .eut-light.eut-caption,
#eut-main-content .eut-eut-gallery .eut-light.eut-caption,
.eut-team .eut-team-social li a,
.eut-comment-nav ul li a,
.eut-pagination ul li:after,
.eut-search button[type='submit'] .fa.fa-search,
#eut-social-share li a,
.eut-blog-item.format-link a:not(.eut-read-more),
.eut-blog .eut-label-post.format-quote a,
.vc_tta-panel .vc_tta-controls-icon,
#eut-main-menu span.eut-no-assigned-menu,
.eut-read-more:hover,
#eut-main-content .more-link:hover,
.eut-testimonial-grid.eut-shadow-mode .eut-testimonial-element {
	color: " . eut_option( 'body_text_color' ) . ";
}

";

/* Headings Color */
$css .= "

#eut-main-content h1,
#eut-main-content h2,
#eut-main-content h3,
#eut-main-content h4,
#eut-main-content h5,
#eut-main-content h6,
#eut-main-content .eut-h1,
#eut-main-content .eut-h2,
#eut-main-content .eut-h3,
#eut-main-content .eut-h4,
#eut-main-content .eut-h5,
#eut-main-content .eut-h6,
#eut-main-content .eut-post-title,
#eut-main-content .more-link,
#eut-main-content .widget.widget_rss cite,
#eut-main-content .widget.widget_rss .eut-widget-title a,
#eut-main-content .widget.widget_recent_comments a:hover,
#eut-main-content .eut-widget.eut-comments a:hover,
#eut-main-content .widget.widget_recent_entries li span.post-date,
#eut-main-content .eut-widget.eut-comments .eut-comment-date,
#eut-side-area .widget.widget_rss cite,
#eut-side-area .widget.widget_rss .eut-widget-title a,
#eut-side-area .widget.widget_recent_comments a:hover,
#eut-side-area .eut-widget.eut-comments a:hover,
#eut-side-area .widget.widget_recent_entries li span.post-date,
#eut-side-area .eut-widget.eut-comments .eut-comment-date,
#eut-side-area .eut-widget.eut-latest-news .eut-latest-news-date,
#eut-main-content .eut-widget.eut-latest-news a,
.widget.widget_calendar table th,
#eut-comments .comment-reply-link:hover,
#eut-comments .eut-comment-item .eut-author a,
#eut-comments .comment-edit-link,
#respond .comment-reply-title small a:hover,
#respond .comment-notes,
#eut-main-content .more-link:hover,
.eut-label-post.format-quote .eut-post-meta .eut-like-counter span,
.eut-toggle .eut-title.active,
input[type='text']:hover,
input[type='input']:hover,
input[type='password']:hover,
input[type='email']:hover,
input[type='number']:hover,
input[type='date']:hover,
input[type='url']:hover,
input[type='tel']:hover,
input[type='search']:hover,
textarea:hover,
select:hover,
input[type='text']:focus,
input[type='password']:focus,
input[type='email']:focus,
input[type='number']:focus,
input[type='date']:focus,
input[type='url']:focus,
input[type='tel']:focus,
input[type='search']:focus,
textarea:focus,
#eut-main-content .eut-portfolio .eut-light.eut-title,
#eut-main-content .eut-eut-gallery .eut-light.eut-title,
.eut-related-wrapper small,
.vc_tta-tabs .vc_tta-title-text,
.eut-tabs-title li.active,
.widget.widget_tag_cloud a:before,
#eut-nav-bar .eut-nav-item a.eut-backlink {
	color: " . eut_option( 'body_heading_color' ) . ";
}

";


/* Primary #1 Colors */
$css .= "

.eut-color-primary-1,
.eut-color-primary-1:before,
.eut-color-primary-1:after,
#eut-main-content .eut-primary-1 h1,
#eut-main-content .eut-primary-1 h2,
#eut-main-content .eut-primary-1 h3,
#eut-main-content .eut-primary-1 h4,
#eut-main-content .eut-primary-1 h5,
#eut-main-content .eut-primary-1 h6,
#eut-feature-section .eut-title.eut-primary-1,
#eut-page-title .eut-title.eut-primary-1,
#eut-post-title .eut-title.eut-primary-1,
#eut-portfolio-title .eut-title.eut-primary-1,
#eut-feature-section .eut-goto-section.eut-primary-1,
.widget.widget_calendar a,
#eut-main-content .eut-post-title:hover,
.eut-blog.eut-isotope[data-type='pint-blog'] .eut-isotope-item .eut-media-content .eut-post-icon,
#eut-main-content .widget.widget_categories li a:hover,
#eut-main-content .widget.widget_archive li a:hover,
#eut-main-content .widget.widget_pages li a:hover,
#eut-main-content .widget.widget_nav_menu li a:hover,
#eut-main-content .widget.widget_nav_menu li.current-menu-item a,
#eut-main-content .widget li .rsswidget,
#eut-main-content .widget.widget_recent_comments a.url:hover,
#eut-main-content .widget.widget_recent_comments a,
#eut-main-content .eut-widget.eut-comments a.url:hover,
#eut-main-content .eut-widget.eut-comments a,
#eut-main-content .widget.widget_meta a:hover,
#eut-main-content .widget.widget_recent_entries a:hover,
#eut-main-content .widget.eut-contact-info a,
#eut-main-content .eut-widget.eut-latest-news a:hover,
#eut-side-area .widget.widget_categories li a:hover,
#eut-side-area .widget.widget_archive li a:hover,
#eut-side-area .widget.widget_pages li a:hover,
#eut-side-area .widget.widget_nav_menu li a:hover,
#eut-side-area .widget.widget_nav_menu li.current-menu-item a,
#eut-side-area .widget li .rsswidget,
#eut-side-area .widget.widget_recent_comments a.url:hover,
#eut-side-area .widget.widget_recent_comments a,
#eut-side-area .eut-widget.eut-comments a.url:hover,
#eut-side-area .eut-widget.eut-comments a,
#eut-side-area .widget.widget_meta a:hover,
#eut-side-area .widget.widget_recent_entries a:hover,
#eut-side-area .widget.eut-contact-info a,
#eut-side-area .eut-widget.eut-latest-news a:hover,
.eut-tags li a:hover,
.eut-categories li a:hover,
#eut-main-content .more-link,
#eut-comments .comment-reply-link,
#eut-comments .eut-comment-item .eut-author a:hover,
#eut-comments .eut-comment-item .eut-comment-date a,
#eut-comments .comment-edit-link:hover,
#respond .comment-reply-title small a,
.eut-blog .eut-like-counter span,
.eut-pagination ul li a.current,
.eut-pagination ul li a:hover,
.eut-toggle .eut-title.active:before,
.eut-portfolio-item .eut-portfolio-btns li a:hover,
#eut-main-content .eut-team-social li a:hover,
.eut-hr .eut-divider-backtotop:after,
.eut-list li:before,
#eut-feature-section .eut-description.eut-primary-1,
#eut-page-title .eut-description.eut-primary-1,
#eut-portfolio-title .eut-description.eut-primary-1,
.eut-carousel-wrapper .eut-custom-title-content.eut-primary-1 .eut-caption,
.eut-comment-nav ul li a:hover,
.eut-pagination ul li .current,
.eut-search button[type='submit']:hover .fa.fa-search,
blockquote:before,
#eut-social-share li a:hover i,
.eut-portfolio .eut-hover-style-1 .eut-like-counter,
.eut-portfolio .eut-hover-style-1 .eut-portfolio-btns,
.eut-portfolio .eut-hover-style-2.eut-light .eut-media:after,
.eut-filter ul li:hover:not(.selected) span,
#eut-theme-wrapper #eut-search-modal .eut-search button[type='submit'] .fa.fa-search,
#eut-main-content .eut-widget.eut-social li a:not(.eut-simple):not(.eut-outline):hover,
#eut-side-area .eut-widget.eut-social li a:not(.eut-simple):not(.eut-outline):hover,
#eut-footer-area .eut-widget.eut-social li a:not(.eut-simple):not(.eut-outline):hover,
#eut-main-content a:hover .eut-team-name,
#eut-nav-bar .eut-nav-item a:hover span,
.eut-blog .eut-label-post.format-quote a:before,
ul.eut-fields li:before,
.vc_tta-panel.vc_active .vc_tta-controls-icon,
#eut-theme-wrapper #eut-search-modal .eut-close-search:hover,
#eut-main-content .widget.widget_tag_cloud a:hover,
#eutside-area  .widget.widget_tag_cloud a:hover,
#eut-footer-area .widget.widget_tag_cloud a:hover,
#eut-nav-bar .eut-nav-item a.eut-backlink:hover,
.eut-top-btn:hover,
.eut-testimonial-name:before,
.eut-read-more,
#eut-main-content .more-link {
	color: " . eut_option( 'body_primary_1_color' ) . ";
}

";


/* Primary #2 Colors */
$css .= "

.eut-color-primary-2,
.eut-color-primary-2:before,
.eut-color-primary-2:after,
#eut-main-content .eut-primary-2 h1,
#eut-main-content .eut-primary-2 h2,
#eut-main-content .eut-primary-2 h3,
#eut-main-content .eut-primary-2 h4,
#eut-main-content .eut-primary-2 h5,
#eut-main-content .eut-primary-2 h6,
#eut-feature-section .eut-title.eut-primary-2,
#eut-feature-section .eut-goto-section.eut-primary-2,
#eut-page-title .eut-title.eut-primary-2,
#eut-post-title .eut-title.eut-primary-2,
#eut-portfolio-title .eut-title.eut-primary-2,
#eut-feature-section .eut-description.eut-primary-2,
#eut-page-title .eut-description.eut-primary-2,
#eut-portfolio-title .eut-description.eut-primary-2,
.eut-carousel-wrapper .eut-custom-title-content.eut-primary-2 .eut-caption {
	color: " . eut_option( 'body_primary_2_color' ) . ";
}

";


/* Primary #3 Colors */
$css .= "

.eut-color-primary-3,
.eut-color-primary-3:before,
.eut-color-primary-3:after,
#eut-main-content .eut-primary-3 h1,
#eut-main-content .eut-primary-3 h2,
#eut-main-content .eut-primary-3 h3,
#eut-main-content .eut-primary-3 h4,
#eut-main-content .eut-primary-3 h5,
#eut-main-content .eut-primary-3 h6,
#eut-feature-section .eut-title.eut-primary-3,
#eut-feature-section .eut-goto-section.eut-primary-3,
#eut-page-title .eut-title.eut-primary-3,
#eut-post-title .eut-title.eut-primary-3,
#eut-portfolio-title .eut-title.eut-primary-3,
#eut-feature-section .eut-description.eut-primary-3,
#eut-page-title .eut-description.eut-primary-3,
#eut-portfolio-title .eut-description.eut-primary-3,
.eut-carousel-wrapper .eut-custom-title-content.eut-primary-3 .eut-caption {
	color: " . eut_option( 'body_primary_3_color' ) . ";
}

";


/* Primary #4 Colors */
$css .= "

.eut-color-primary-4,
.eut-color-primary-4:before,
.eut-color-primary-4:after,
#eut-main-content .eut-primary-4 h1,
#eut-main-content .eut-primary-4 h2,
#eut-main-content .eut-primary-4 h3,
#eut-main-content .eut-primary-4 h4,
#eut-main-content .eut-primary-4 h5,
#eut-main-content .eut-primary-4 h6,
#eut-feature-section .eut-title.eut-primary-4,
#eut-feature-section .eut-goto-section.eut-primary-4,
#eut-page-title .eut-title.eut-primary-4,
#eut-post-title .eut-title.eut-primary-4,
#eut-portfolio-title .eut-title.eut-primary-4,
#eut-feature-section .eut-description.eut-primary-4,
#eut-page-title .eut-description.eut-primary-4,
#eut-portfolio-title .eut-description.eut-primary-4,
.eut-carousel-wrapper .eut-custom-title-content.eut-primary-4 .eut-caption {
	color: " . eut_option( 'body_primary_4_color' ) . ";
}

";


/* Primary #5 Colors */
$css .= "

.eut-color-primary-5,
.eut-color-primary-5:before,
.eut-color-primary-5:after,
#eut-main-content .eut-primary-5 h1,
#eut-main-content .eut-primary-5 h2,
#eut-main-content .eut-primary-5 h3,
#eut-main-content .eut-primary-5 h4,
#eut-main-content .eut-primary-5 h5,
#eut-main-content .eut-primary-5 h6,
#eut-feature-section .eut-title.eut-primary-5,
#eut-feature-section .eut-goto-section.eut-primary-5,
#eut-page-title .eut-title.eut-primary-5,
#eut-post-title .eut-title.eut-primary-5,
#eut-portfolio-title .eut-title.eut-primary-5,
#eut-feature-section .eut-description.eut-primary-5,
#eut-page-title .eut-description.eut-primary-5,
#eut-portfolio-title .eut-description.eut-primary-5,
.eut-carousel-wrapper .eut-custom-title-content.eut-primary-5 .eut-caption {
	color: " . eut_option( 'body_primary_5_color' ) . ";
}

";


/* Dark Colors */
$css .= "

#eut-main-content .eut-dark h1,
#eut-main-content .eut-dark h2,
#eut-main-content .eut-dark h3,
#eut-main-content .eut-dark h4,
#eut-main-content .eut-dark h5,
#eut-main-content .eut-dark h6,
.eut-carousel-wrapper .eut-custom-title-content.eut-dark .eut-caption {
	color: #000000;
}

";

/* Dark Colors */
$css .= "

#eut-main-content .eut-light h1,
#eut-main-content .eut-light h2,
#eut-main-content .eut-light h3,
#eut-main-content .eut-light h4,
#eut-main-content .eut-light h5,
#eut-main-content .eut-light h6,
.eut-carousel-wrapper .eut-custom-title-content.eut-light .eut-caption {
	color: #ffffff;
}

";

/* Grey Colors */
$css .= "

#eut-main-content .eut-grey h1,
#eut-main-content .eut-grey h2,
#eut-main-content .eut-grey h3,
#eut-main-content .eut-grey h4,
#eut-main-content .eut-grey h5,
#eut-main-content .eut-grey h6 {
	color: #cccccc;
}

";

/* Green Colors */
$css .= "

#eut-main-content .eut-green h1,
#eut-main-content .eut-green h2,
#eut-main-content .eut-green h3,
#eut-main-content .eut-green h4,
#eut-main-content .eut-green h5,
#eut-main-content .eut-green h6 {
	color: #83ad00;
}

";

/* Orange Colors */
$css .= "

#eut-main-content .eut-orange h1,
#eut-main-content .eut-orange h2,
#eut-main-content .eut-orange h3,
#eut-main-content .eut-orange h4,
#eut-main-content .eut-orange h5,
#eut-main-content .eut-orange h6 {
	color: #faa500;
}

";

/* Aqua Colors */
$css .= "

#eut-main-content .eut-aqua h1,
#eut-main-content .eut-aqua h2,
#eut-main-content .eut-aqua h3,
#eut-main-content .eut-aqua h4,
#eut-main-content .eut-aqua h5,
#eut-main-content .eut-aqua h6 {
	color: #23b893;
}

";

/* Blue Colors */
$css .= "

#eut-main-content .eut-blue h1,
#eut-main-content .eut-blue h2,
#eut-main-content .eut-blue h3,
#eut-main-content .eut-blue h4,
#eut-main-content .eut-blue h5,
#eut-main-content .eut-blue h6 {
	color: #23a5d1;
}

";

/* Red Colors */
$css .= "

#eut-main-content .eut-red h1,
#eut-main-content .eut-red h2,
#eut-main-content .eut-red h3,
#eut-main-content .eut-red h4,
#eut-main-content .eut-red h5,
#eut-main-content .eut-red h6 {
	color: #ff0042;
}

";

/* Purple Colors */
$css .= "

#eut-main-content .eut-purple h1,
#eut-main-content .eut-purple h2,
#eut-main-content .eut-purple h3,
#eut-main-content .eut-purple h4,
#eut-main-content .eut-purple h5,
#eut-main-content .eut-purple h6 {
	color: #940AE5;
}

";

/**
 * Main Body Borders
 * ----------------------------------------------------------------------------
 */
$css .= "

.eut-border,
#eut-about-author,
#eut-comments,
#eut-comments .eut-comment-item,
#eut-comments .children:before,
#eut-comments .children article.comment,
#eut-main-content .eut-widget.eut-social li a,

#eut-side-area .eut-widget.eut-social li a,

#respond input[type='text'],
#respond textarea,
.eut-blog.eut-large-media .eut-blog-item,
.eut-blog.eut-small-media .eut-blog-item,
.eut-search input[type='text'],
.eut-toggle-wrapper li,
.eut-bar,
.eut-pricing-table,
.eut-pricing-table ul li,
#eut-main-content table,
#eut-main-content tr,
#eut-main-content td,
#eut-main-content th,
pre,
hr,
.eut-hr.eut-element div,
.eut-title-double-line span:before,
.eut-title-double-line span:after,
.eut-title-double-bottom-line span:after,
#eut-main-content input[type='text'],
#eut-main-content input[type='input'],
#eut-main-content input[type='password'],
#eut-main-content input[type='email'],
#eut-main-content input[type='number'],
#eut-main-content input[type='date'],
#eut-main-content input[type='url'],
#eut-main-content input[type='tel'],
#eut-main-content input[type='search'],
.eut-search button[type='submit'],
#eut-main-content textarea,
#eut-main-content select,
#eut-social-share + #eut-tags-categories,
#eut-social-share + #eut-nav-bar,
#eut-social-share + .eut-related-post,
#eut-social-share + #eut-comments,
.eut-related-post + #respond,
#eut-nav-bar + .eut-related-post,
#eut-main-content.eut-single-post-content article + #eut-tags-categories,
#eut-main-content.eut-single-post-content article + #eut-nav-bar,
#eut-main-content.eut-single-post-content article + .eut-related-post,
#eut-main-content.eut-single-post-content article + #eut-comments,
.eut-related-post + #eut-comments,
#eut-main-content #eut-content-area + #eut-tags-categories,
#eut-main-content #eut-content-area + #eut-nav-bar,
#eut-main-content #eut-content-area + .eut-related-post,
#eut-main-content #eut-content-area + #eut-comments,
#eut-main-content div.clear + #eut-tags-categories,
#eut-main-content div.clear + #eut-nav-bar,
#eut-main-content div.clear + .eut-related-post,
#eut-main-content div.clear + #eut-comments,
.eut-pagination ul,
.eut-pagination ul li,
ul.eut-fields li,
.eut-portfolio-description + ul.eut-fields,
.eut-portfolio-info + .widget,
.eut-team figure .eut-team-social ul,
#eut-main-content .widget li,
#eut-main-content .widget li ul,

#eut-side-area .widget li,
#eut-side-area .widget li ul,

#eut-main-menu-responsive ul.eut-menu li,
#eut-main-menu-responsive ul.eut-menu li ul,
.vc_tta-accordion .vc_tta-panel,
.vc_tta-tabs-position-top .vc_tta-tabs-list,
#eut-content-area .vc_tta.vc_tta-tabs-position-left.vc_general .vc_tta-tab > a,
.eut-tabs-title {
	border-color: " . eut_option( 'body_border_color' ) . ";
}

";

/**
* Primary Backgrounds Colors
* ----------------------------------------------------------------------------
*/

/* Dark Bg #1 Colors */
$css .= "

.eut-bg-dark {
	background-color: #000000;
	color: #ffffff;
}

";

/* Light Bg #1 Colors */
$css .= "

.eut-bg-light {
	background-color: #ffffff;
}

";


/* Primary Bg #1 Colors */
$css .= "

.eut-bg-primary-1,
.eut-bar-line.eut-primary-1-color,
#eut-header #eut-main-menu > ul > li.primary-button > a span,
#eut-feature-section .eut-style-4 .eut-title.eut-primary-1 span,
#eut-main-content .eut-widget.eut-social li a.eut-simple,
#eut-side-area .eut-widget.eut-social li a.eut-simple,
#eut-footer-area .eut-widget.eut-social li a.eut-simple,
#eut-main-content .eut-widget.eut-social li a.eut-outline:hover,
#eut-side-area .eut-widget.eut-social li a.eut-outline:hover,
#eut-footer-area .eut-widget.eut-social li a.eut-outline:hover,
#eut-feature-section .eut-style-1 .eut-title:after,
#eut-feature-section .eut-style-4 .eut-title:before,
#eut-feature-section .eut-style-4 .eut-title span:before,
#eut-feature-section .eut-style-4 .eut-title:after,
#eut-feature-section .eut-style-4 .eut-title span:after,
.widget.widget_calendar caption,
#eut-post-title #eut-social-share.eut-primary-1 ul li a,
.wpcf7-validation-errors,
.eut-title-line span:after,
.eut-blog.eut-isotope[data-type='pint-blog'] .eut-isotope-item .eut-media-content .eut-read-more:before,
.eut-blog.eut-isotope[data-type='pint-blog'] .eut-isotope-item .eut-media-content .more-link:before,
input[type='submit'],
input[type='reset'],
input[type='button'],
button,
.eut-slider-item .eut-slider-content span:after,
.eut-blog .eut-label-post.format-link a:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-1,
.eut-image-hover a.eut-no-image:before,
#eut-header #eut-main-menu ul li a .label,
#eut-header #eut-main-menu ul li ul a:hover .label,
button.mfp-arrow:hover,
#eut-content-area .vc_tta.vc_general .vc_tta-tab > a:after,
.eut-tabs-title li.active:after,
#eut-main-menu span.eut-no-assigned-menu a,
.eut-side-area-button .eut-button-icon:hover .eut-dot-icon,
.eut-side-area-button .eut-button-icon:hover .eut-dot-icon:before,
.eut-side-area-button .eut-button-icon:hover .eut-dot-icon:after,
#eut-header .eut-cart-button .eut-purchased-items,
.woocommerce #respond input#submit {
	background-color: " . eut_option( 'body_primary_1_color' ) . ";
	color: #ffffff;
}

.eut-btn.eut-btn-line.eut-bg-primary-1,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-1 {
	color: " . eut_option( 'body_primary_1_color' ) . ";
	border-color: " . eut_option( 'body_primary_1_color' ) . ";
}

#eut-main-content .eut-widget.eut-social li a:hover,
#eut-side-area .eut-widget.eut-social li a:hover,
#eut-footer-area .eut-widget.eut-social li a:hover {
	border-color: " . eut_option( 'body_primary_1_color' ) . ";
}

.eut-btn.eut-bg-primary-1:hover,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-1:hover,
#eut-header #eut-main-menu > ul > li.primary-button > a:hover span,
input[type='submit']:hover,
input[type='reset']:hover,
input[type='button']:hover,
button:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-1:hover,
#eut-post-title #eut-social-share.eut-primary-1 ul li a:hover,
#eut-main-content .eut-widget.eut-social li a.eut-simple:hover,
#eut-side-area .eut-widget.eut-social li a.eut-simple:hover,
#eut-footer-area .eut-widget.eut-social li a.eut-simple:hover,
#eut-main-menu span.eut-no-assigned-menu a:hover,
.woocommerce #respond input#submit:hover {
	background-color: " . eut_option( 'body_primary_1_hover_color' ) . ";
	border-color: " . eut_option( 'body_primary_1_hover_color' ) . ";
	color: #ffffff;
}

";

/* Loader Color */
$css .= "

@-webkit-keyframes loadanim {
	0%,
	80%,
	100% {
		box-shadow: 0 2.5em 0 -1.3em " . eut_option( 'body_border_color' ) . ";
	}
	40% {
		box-shadow: 0 2.5em 0 0 " . eut_option( 'body_border_color' ) . ";
	}
}
@keyframes loadanim {
	0%,
	80%,
	100% {
		box-shadow: 0 2.5em 0 -1.3em " . eut_option( 'body_border_color' ) . ";
	}
	40% {
		box-shadow: 0 2.5em 0 0 " . eut_option( 'body_border_color' ) . ";
	}
}

";

/* Primary Selection */
$css .= "

::-moz-selection {
    color: #ffffff;
    background: " . eut_option( 'body_primary_1_color' ) . ";
}

::selection {
    color: #ffffff;
    background: " . eut_option( 'body_primary_1_color' ) . ";
}

";

/* Primary Bg #2 Colors */
$css .= "

.eut-bg-primary-2,
.eut-bar-line.eut-primary-2-color,
#eut-feature-section .eut-style-4 .eut-title.eut-primary-2 span,
#eut-post-title #eut-social-share.eut-primary-2 ul li a,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-2 {
	background-color: " . eut_option( 'body_primary_2_color' ) . ";
	color: #ffffff;
}

.eut-btn.eut-btn-line.eut-bg-primary-2,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-2 {
	color: " . eut_option( 'body_primary_2_color' ) . ";
	border-color: " . eut_option( 'body_primary_2_color' ) . ";
}

.eut-btn.eut-bg-primary-2:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-2:hover,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-2:hover,
#eut-post-title #eut-social-share.eut-primary-2 ul li a:hover {
	background-color: " . eut_option( 'body_primary_2_hover_color' ) . ";
	border-color: " . eut_option( 'body_primary_2_hover_color' ) . ";
	color: #ffffff;
}

";

/* Primary Bg #3 Colors */
$css .= "

.eut-bg-primary-3,
.eut-bar-line.eut-primary-3-color,
#eut-feature-section .eut-style-4 .eut-title.eut-primary-3 span,
#eut-post-title #eut-social-share.eut-primary-3 ul li a,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-3 {
	background-color: " . eut_option( 'body_primary_3_color' ) . ";
	color: #ffffff;
}

.eut-btn.eut-btn-line.eut-bg-primary-3,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-3 {
	color: " . eut_option( 'body_primary_3_color' ) . ";
	border-color: " . eut_option( 'body_primary_3_color' ) . ";
}

.eut-btn.eut-bg-primary-3:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-3:hover,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-3:hover,
#eut-post-title #eut-social-share.eut-primary-3 ul li a:hover {
	background-color: " . eut_option( 'body_primary_3_hover_color' ) . ";
	border-color: " . eut_option( 'body_primary_3_hover_color' ) . ";
	color: #ffffff;
}

";

/* Primary Bg #4 Colors */
$css .= "

.eut-bg-primary-4,
.eut-bar-line.eut-primary-4-color,
#eut-feature-section .eut-style-4 .eut-title.eut-primary-4 span,
#eut-post-title #eut-social-share.eut-primary-4 ul li a,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-4 {
	background-color: " . eut_option( 'body_primary_4_color' ) . ";
	color: #ffffff;
}

.eut-btn.eut-btn-line.eut-bg-primary-4,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-4 {
	color: " . eut_option( 'body_primary_4_color' ) . ";
	border-color: " . eut_option( 'body_primary_4_color' ) . ";
}

.eut-btn.eut-bg-primary-4:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-4:hover,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-4:hover,
#eut-post-title #eut-social-share.eut-primary-4 ul li a:hover {
	background-color: " . eut_option( 'body_primary_4_hover_color' ) . ";
	border-color: " . eut_option( 'body_primary_4_hover_color' ) . ";
	color: #ffffff;
}
";

/* Primary Bg #5 Colors */
$css .= "

.eut-bg-primary-5,
.eut-bar-line.eut-primary-5-color,
#eut-feature-section .eut-style-4 .eut-title.eut-primary-5 span,
#eut-post-title #eut-social-share.eut-primary-5 ul li a,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-5 {
	background-color: " . eut_option( 'body_primary_5_color' ) . ";
	color: #ffffff;
}

.eut-btn.eut-btn-line.eut-bg-primary-5,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-5 {
	color: " . eut_option( 'body_primary_5_color' ) . ";
	border-color: " . eut_option( 'body_primary_5_color' ) . ";
}

.eut-btn.eut-bg-primary-5:hover,
.eut-element.eut-social ul li a.eut-simple.eut-bg-primary-5:hover,
.eut-element.eut-social ul li a.eut-outline.eut-bg-primary-5:hover,
#eut-post-title #eut-social-share.eut-primary-5 ul li a:hover {
	background-color: " . eut_option( 'body_primary_5_hover_color' ) . ";
	border-color: " . eut_option( 'body_primary_5_hover_color' ) . ";
	color: #ffffff;
}

";

/* Portfolio Hover Style 2 */
$css .= "

.eut-portfolio .eut-hover-style-2 .eut-like-counter {
	color: " . eut_option( 'body_text_color' ) . ";
}

.eut-portfolio .eut-hover-style-2 .eut-light-overlay .eut-portfolio-btns:hover,
.eut-portfolio .eut-hover-style-2 .eut-dark-overlay .eut-portfolio-btns:hover {
	background-color: " . eut_option( 'body_primary_1_color' ) . ";
	color: #ffffff;
}

";

/* Composer Front End Fix*/
$css .= "

.compose-mode .vc_element .eut-row {
    margin-top: 30px;
}

.compose-mode .vc_vc_column .wpb_column {
    width: 100% !important;
    margin-bottom: 40px;
    border: 1px dashed rgba(125, 125, 125, 0.4);
}

.compose-mode .vc_controls > .vc_controls-out-tl {
    left: 15px;
}

.compose-mode .vc_controls > .vc_controls-bc {
    bottom: 15px;
}

.compose-mode .vc_welcome .vc_buttons {
    margin-top: 60px;
}

.compose-mode .eut-image img {
    opacity: 1;
}

.compose-mode #eut-inner-header {
    top: 0 !important;
}
.compose-mode .vc_controls > div {
    z-index: 9;
}
.compose-mode .eut-bg-image {
    opacity: 1;
}

.compose-mode #eut-theme-wrapper .eut-section[data-section-type='fullwidth-background'],
.compose-mode #eut-theme-wrapper .eut-section[data-section-type='fullwidth-element'] {
	visibility: visible;
}

.compose-mode .eut-animated-item {
	opacity: 1;
}

";

$eut_gap_size = array (
	array(
		'gap' => '5',
	),
	array(
		'gap' => '10',
	),
	array(
		'gap' => '15',
	),
	array(
		'gap' => '20',
	),
	array(
		'gap' => '25',
	),
	array(
		'gap' => '30',
	),
	array(
		'gap' => '35',
	),
	array(
		'gap' => '40',
	),
	array(
		'gap' => '45',
	),
	array(
		'gap' => '50',
	),
	array(
		'gap' => '55',
	),
	array(
		'gap' => '60',
	),
);

function eut_print_gap_size( $eut_gap_size = array()) {

	$css = '';

	foreach ( $eut_gap_size as $size ) {

		$eut_gap_size = $size['gap'];
		$eut_gap_half_size = $size['gap'] * 0.5;

		$css .= "

			.eut-section.eut-column-gap-" . esc_attr( $size['gap'] ) . " .eut-row {
				margin-left: -" . esc_attr( $eut_gap_half_size ) . "px;
				margin-right: -" . esc_attr( $eut_gap_half_size ) . "px;
			}
			.eut-section.eut-column-gap-" . esc_attr( $size['gap'] ) . " .eut-column {
				padding-left: " . esc_attr( $eut_gap_half_size ) . "px;
				padding-right: " . esc_attr( $eut_gap_half_size ) . "px;
			}
			.eut-section.eut-section[data-section-type='fullwidth-element'].eut-column-gap-" . esc_attr( $size['gap'] ) . " .eut-row {
				padding-left: " . esc_attr( $eut_gap_half_size ) . "px;
				padding-right: " . esc_attr( $eut_gap_half_size ) . "px;
				margin-left: 0px;
				margin-right: 0px;
			}

		";

	}

	return $css;
}

$css .= eut_print_gap_size( $eut_gap_size );

echo eut_get_css_output( $css );

//Omit closing PHP tag to avoid accidental whitespace output errors.
