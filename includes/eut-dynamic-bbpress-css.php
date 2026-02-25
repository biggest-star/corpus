<?php
/**
 *  Dynamic css style for bbPress Forum
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */

$css = "";

/**
 * Forum Title
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-page-title.eut-forum-title {
	background-color: " . eut_option( 'forum_title_background_color' ) . ";
}

";


/**
 * Text Colors
 * ----------------------------------------------------------------------------
 */
$css .= "

#bbpress-forums #bbp-single-user-details #bbp-user-navigation a,
#bbpress-forums .status-closed, #bbpress-forums .status-closed a {
	color: " . eut_option( 'body_text_color' ) . ";
}

";

/**
 * Headings Colors
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-main-content .eut-widget.widget_display_topics li div,
#eut-main-content .eut-widget.widget_display_replies li div {
	color: " . eut_option( 'body_heading_color' ) . ";
}


#eut-footer-area .eut-widget.widget_display_topics li div,
#eut-footer-area .eut-widget.widget_display_replies li div {
	color: " . eut_option( 'footer_widgets_headings_color' ) . ";
}

";

/**
 * Primary #1 Colors
 * ----------------------------------------------------------------------------
 */
$css .= "

#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover,
#bbpress-forums #bbp-single-user-details #bbp-user-navigation .current a {
	color: " . eut_option( 'body_primary_1_color' ) . ";
}

";

/**
 * Main Border Colors
 * ----------------------------------------------------------------------------
 */
$css .= "

#eut-main-content #bbpress-forums #bbp-single-user-details,
#eut-main-content #bbpress-forums #bbp-your-profile fieldset span.description,
#bbpress-forums li.bbp-body ul.forum,
#bbpress-forums li.bbp-body ul.topic,
#bbpress-forums ul.bbp-lead-topic,
#bbpress-forums ul.bbp-topics,
#bbpress-forums ul.bbp-forums,
#bbpress-forums ul.bbp-replies,
#bbpress-forums ul.bbp-search-results,
#bbpress-forums .bbp-forums-list,
#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content,
.bbp-pagination-links a,
.bbp-pagination-links span.current,
#bbpress-forums div.bbp-forum-header,
#bbpress-forums div.bbp-topic-header,
#bbpress-forums div.bbp-reply-header,
#eut-main-content .eut-widget.widget_display_stats dd,
#eut-main-content .bbp_widget_login fieldset {
	border-color: " . eut_option( 'body_border_color' ) . ";
}

#eut-footer-area .eut-widget.widget_display_stats dd,
#eut-footer-area .bbp_widget_login fieldset {
	border-color: " . eut_option( 'footer_widgets_border_color' ) . ";
}

";

/**
 * Typography
 * ----------------------------------------------------------------------------
 */
$css .= "
.eut-widget.widget_display_topics li div,
.eut-widget.widget_display_replies li div {
	font-family: " . eut_option( 'small_text', 'Arial, Helvetica, sans-serif', 'font-family'  ) . ";
	font-weight: " . eut_option( 'small_text', 'normal', 'font-weight'  ) . ";
	font-style: " . eut_option( 'small_text', 'normal', 'font-style'  ) . ";
	font-size: " . eut_option( 'small_text', '10px', 'font-size'  ) . " !important;
	text-transform: " . eut_option( 'small_text', 'uppercase', 'text-transform'  ) . ";
	" . eut_css_option( 'small_text', '', 'letter-spacing'  ) . "
}

";

echo eut_get_css_output( $css );

//Omit closing PHP tag to avoid accidental whitespace output errors.
