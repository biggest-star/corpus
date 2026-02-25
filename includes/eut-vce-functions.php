<?php

/*
*	Corpus Euthemians Visual Composer Extension Plugin Hooks
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

/**
 * Translation function returning the theme translations
 */

/* All */
function eut_theme_vce_get_string_all() {
    return __( 'All', 'corpus' );
}
/* Read more */
function eut_theme_vce_get_string_read_more() {
    return __( 'read more', 'corpus' );
}
/* In Categories */
function eut_theme_vce_get_string_categories_in() {
    return __( 'in', 'corpus' );
}
/* No comments */
function eut_theme_vce_get_string_no_comments() {
    return __( 'no comments', 'corpus' );
}
/* One comment */
function eut_theme_vce_get_string_one_comment() {
    return __( '1 comment', 'corpus' );
}
/* Comments */
function eut_theme_vce_get_string_comments() {
    return __( 'comments', 'corpus' );
}
/* Author By */
function eut_theme_vce_get_string_by_author() {
    return __( 'By:', 'corpus' );
}

/**
 * Hooks for portfolio translations
 */

add_filter( 'eut_vce_portfolio_string_all_categories', 'eut_theme_vce_get_string_all' );

 /**
 * Hooks for blog translations
 */

add_filter( 'eut_vce_string_read_more', 'eut_theme_vce_get_string_read_more' );
add_filter( 'eut_vce_blog_string_all_categories', 'eut_theme_vce_get_string_all' );
add_filter( 'eut_vce_blog_string_categories_in', 'eut_theme_vce_get_string_categories_in' );
add_filter( 'eut_vce_blog_string_no_comments', 'eut_theme_vce_get_string_no_comments' );
add_filter( 'eut_vce_blog_string_one_comment', 'eut_theme_vce_get_string_one_comment' );
add_filter( 'eut_vce_blog_string_comments', 'eut_theme_vce_get_string_comments' );
add_filter( 'eut_vce_blog_string_by_author', 'eut_theme_vce_get_string_by_author' );

//Omit closing PHP tag to avoid accidental whitespace output errors.
