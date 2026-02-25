<?php
/**
 *  Add Dynamic css to header
 *  @version	1.0
 *  @author		Euthemians Team
 *  @URI		http://euthemians.com
 */


add_action('wp_head', 'eut_load_dynamic_css');

if ( !function_exists( 'eut_load_dynamic_css' ) ) {

	function eut_load_dynamic_css() {
		include_once get_template_directory() . '/includes/eut-dynamic-typography-css.php';
		include_once get_template_directory() . '/includes/eut-dynamic-css.php';
		if ( eut_bbpress_enabled() ) {
			include_once get_template_directory() . '/includes/eut-dynamic-bbpress-css.php';
		}
		if ( corpus_eutf_woo_enabled() ) {
			include_once get_template_directory() . '/includes/eut-dynamic-woo-css.php';
		}
		$custom_css_code = eut_option( 'css_code' );
		if ( !empty( $custom_css_code ) ) {		
			echo eut_get_css_output( $custom_css_code );
		}
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
