<?php
/**
 *  Dynamic typography css style
 * 	@author		Euthemians Team
 * 	@URI		http://Euthemians.eu
 */

$typo_css = "";

/**
 * Typography
 * ----------------------------------------------------------------------------
 */

/* Main */
$typo_css .= "

body,
#eut-theme-wrapper #eut-search-modal input[type='text'] {
	font-size: " . eut_option( 'body_font', '14px', 'font-size'  ) . ";
	font-family: " . eut_option( 'body_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'body_font', 'normal', 'font-weight'  ) . ";
	line-height: " . eut_option( 'body_font', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'body_font', '', 'letter-spacing'  ) . "
}

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
select {
	font-family: " . eut_option( 'body_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
}

";

/* Logo as text */
$typo_css .= "

#eut-header .eut-logo.eut-logo-text a {
	font-family: " . eut_option( 'logo_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'logo_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'logo_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'logo_font', '11px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'logo_font', 'uppercase', 'text-transform'  ) . ";
	" . eut_css_option( 'logo_font', '', 'letter-spacing'  ) . "
}

";

/* Main Menu  */
$typo_css .= "

#eut-header #eut-main-menu ul li ul li a,
#eut-main-menu-responsive ul.eut-menu li a {
	font-family: " . eut_option( 'sub_menu_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'sub_menu_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'sub_menu_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'sub_menu_font', '11px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'sub_menu_font', 'uppercase', 'text-transform'  ) . ";
	" . eut_css_option( 'sub_menu_font', '', 'letter-spacing'  ) . "
}

#eut-header #eut-main-menu > ul > li > a,
#eut-main-menu-responsive ul.eut-menu > li > a,
#eut-header .eut-responsive-menu-text {
	font-family: " . eut_option( 'main_menu_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'main_menu_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'main_menu_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'main_menu_font', '11px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'main_menu_font', 'uppercase', 'text-transform'  ) . ";
	" . eut_css_option( 'main_menu_font', '', 'letter-spacing'  ) . "
}


";

/* Headings */
$typo_css .= "

h1,
.eut-h1 {
	font-family: " . eut_option( 'h1_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h1_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h1_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h1_font', '56px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h1_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h1_font', '60px', 'line-height'  ) . ";
	" . eut_css_option( 'h1_font', '', 'letter-spacing'  ) . "
}

h2,
.eut-h2 {
	font-family: " . eut_option( 'h2_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h2_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h2_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h2_font', '50px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h2_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h2_font', '54px', 'line-height'  ) . ";
	" . eut_css_option( 'h2_font', '', 'letter-spacing'  ) . "
}

h3,
.eut-h3 {
	font-family: " . eut_option( 'h3_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h3_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h3_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h3_font', '34px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h3_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h3_font', '54px', 'line-height'  ) . ";
	" . eut_css_option( 'h3_font', '', 'letter-spacing'  ) . "
}

h4,
.eut-h4 {
	font-family: " . eut_option( 'h4_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h4_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h4_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h4_font', '25px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h4_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h4_font', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'h4_font', '', 'letter-spacing'  ) . "
}

h5,
.eut-h5,
#reply-title,
.vc_tta.vc_general .vc_tta-panel-title {
	font-family: " . eut_option( 'h5_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h5_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h5_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h5_font', '18px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h5_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h5_font', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'h5_font', '', 'letter-spacing'  ) . "
}

h6,
.eut-h6,
.mfp-title {
	font-family: " . eut_option( 'h6_font', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'h6_font', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'h6_font', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'h6_font', '14px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'h6_font', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'h6_font', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'h6_font', '', 'letter-spacing'  ) . "
}

";

/* Page Title */
$typo_css .= "

#eut-page-title .eut-title {
	font-family: " . eut_option( 'page_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'page_title', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'page_title', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'page_title', '60px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'page_title', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'page_title', '60px', 'line-height'  ) . ";
	" . eut_css_option( 'page_title', '', 'letter-spacing'  ) . "
}

#eut-page-title .eut-description {
	font-family: " . eut_option( 'page_description', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'page_description', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'page_description', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'page_description', '24px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'page_description', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'page_description', '60px', 'line-height'  ) . ";
	" . eut_css_option( 'page_description', '', 'letter-spacing'  ) . "
}

";

/* Portfolio Title */
$typo_css .= "

#eut-portfolio-title .eut-title {
	font-family: " . eut_option( 'portfolio_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'portfolio_title', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'portfolio_title', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'portfolio_title', '60px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'portfolio_title', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'portfolio_title', '60px', 'line-height'  ) . ";
	" . eut_css_option( 'portfolio_title', '', 'letter-spacing'  ) . "
}

#eut-portfolio-title .eut-description {
	font-family: " . eut_option( 'portfolio_description', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'portfolio_description', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'portfolio_description', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'portfolio_description', '24px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'portfolio_description', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'portfolio_description', '60px', 'line-height'  ) . ";
	" . eut_css_option( 'portfolio_description', '', 'letter-spacing'  ) . "
}

";

/* Post Title */
$typo_css .= "

#eut-post-title .eut-title,
.eut-single-post-title,
.eut-large-media .eut-post-title {
	font-family: " . eut_option( 'post_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'post_title', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'post_title', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'post_title', '60px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'post_title', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'post_title', '48px', 'line-height'  ) . ";
	" . eut_css_option( 'post_title', '', 'letter-spacing'  ) . "
}

";

/* Feature Section */
$typo_css .= "

#eut-header[data-fullscreen='no'] #eut-feature-section .eut-title {
	font-family: " . eut_option( 'custom_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'custom_title', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'custom_title', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'custom_title', '60px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'custom_title', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'custom_title', '112px', 'line-height'  ) . ";
	" . eut_css_option( 'custom_title', '', 'letter-spacing'  ) . "
}

#eut-header[data-fullscreen='no'] #eut-feature-section .eut-description {
	font-family: " . eut_option( 'custom_description', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'custom_description', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'custom_description', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'custom_description', '24px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'custom_description', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'custom_description', '48px', 'line-height'  ) . ";
	" . eut_css_option( 'custom_description', '', 'letter-spacing'  ) . "
}

#eut-header[data-fullscreen='yes'] #eut-feature-section .eut-title {
	font-family: " . eut_option( 'fullscreen_custom_title', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'fullscreen_custom_title', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'fullscreen_custom_title', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'fullscreen_custom_title', '100px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'fullscreen_custom_title', 'uppercase', 'text-transform'  ) . ";
	line-height: " . eut_option( 'fullscreen_custom_title', '48px', 'line-height'  ) . ";
	" . eut_css_option( 'fullscreen_custom_title', '', 'letter-spacing'  ) . "
}

#eut-header[data-fullscreen='yes'] #eut-feature-section .eut-description {
	font-family: " . eut_option( 'fullscreen_custom_description', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'fullscreen_custom_description', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'fullscreen_custom_description', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'fullscreen_custom_description', '30px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'fullscreen_custom_description', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'fullscreen_custom_description', '48px', 'line-height'  ) . ";
	" . eut_css_option( 'fullscreen_custom_description', '', 'letter-spacing'  ) . "
}

";

/* Special Text */
$typo_css .= "

.eut-leader-text p,
p.eut-leader-text,
blockquote {
	font-family: " . eut_option( 'leader_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'leader_text', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'leader_text', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'leader_text', '34px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'leader_text', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'leader_text', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'leader_text', '', 'letter-spacing'  ) . "
}

.eut-subtitle p,
.eut-subtitle {
	font-family: " . eut_option( 'subtitle_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'subtitle_text', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'subtitle_text', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'subtitle_text', '18px', 'font-size'  ) . ";
	text-transform: " . eut_option( 'subtitle_text', 'none', 'text-transform'  ) . ";
	line-height: " . eut_option( 'subtitle_text', '36px', 'line-height'  ) . ";
	" . eut_css_option( 'subtitle_text', '', 'letter-spacing'  ) . "
}

.eut-small-text,
small,
#eut-anchor-menu a,
#eut-post-title #eut-social-share ul li .eut-like-counter,
.eut-pagination ul li,
#eut-header-options ul.eut-options a span,
.eut-pagination .eut-icon-nav-right,
.eut-pagination .eut-icon-nav-left,
#eut-footer-bar .eut-social li,
#eut-footer-bar .eut-copyright,
#eut-footer-bar #eut-second-menu,
#eut-share-modal .eut-social li a,
#eut-language-modal .eut-language li a,
.logged-in-as,
.widget.widget_recent_entries li span.post-date,
cite,
label,
.eut-slider-item .eut-slider-content span.eut-title,
.eut-gallery figure figcaption .eut-caption,
.widget.widget_calendar caption,
.widget .rss-date,
.widget.widget_tag_cloud a,
.eut-widget.eut-latest-news .eut-latest-news-date,
.eut-widget.eut-comments .eut-comment-date,
.wpcf7-form p,
.wpcf7-form .eut-one-third,
.wpcf7-form .eut-one-half,
.mfp-counter,
.eut-comment-nav ul li a,
.eut-portfolio .eut-like-counter span,
.eut-map-infotext p,
a.eut-infotext-link,
#eut-main-menu span.eut-no-assigned-menu {
	font-family: " . eut_option( 'small_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'small_text', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'small_text', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'small_text', '10px', 'font-size'  ) . " !important;
	text-transform: " . eut_option( 'small_text', 'none', 'text-transform'  ) . ";
	" . eut_css_option( 'small_text', '', 'letter-spacing'  ) . "
}


.eut-blog.eut-isotope[data-type='pint-blog'] .eut-isotope-item .eut-media-content .eut-read-more span,
.eut-search button[type='submit'],
.eut-btn,
input[type='submit'],
input[type='reset'],
input[type='button'],
button,
.woocommerce #respond input#submit,
.eut-portfolio .eut-portfolio-btns {
	font-family: " . eut_option( 'link_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'link_text', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'link_text', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'link_text', '11px', 'font-size'  ) . " !important;
	text-transform: " . eut_option( 'link_text', 'uppercase', 'text-transform'  ) . ";
	" . eut_css_option( 'link_text', '', 'letter-spacing'  ) . "
}

";

echo eut_get_css_output( $typo_css );

//Omit closing PHP tag to avoid accidental whitespace output errors.
