<?php

	$output = $el_class = $el_id_string = '';

	extract(
		shortcode_atts(
			array(
				'el_class'        => '',
				'el_id'        => '',
				'css' => '',
			),
			$atts
		)
	);

	if ( !empty ( $el_id ) ) {
		$el_id_string = 'id="' . esc_attr( $el_id ) . '"';
	}


	$css_custom = eut_vc_shortcode_custom_css_class( $css, '' );
	$row_classes = array( 'eut-row' );
	if ( !empty( $css_custom ) ) {
		array_push( $row_classes, $css_custom );
	}
	if ( !empty ( $el_class ) ) {
		array_push( $row_classes, $el_class );
	}
	$row_css_string = implode( ' ', $row_classes );

	$output .= '<div ' . $el_id_string . ' class="' . esc_attr( $row_css_string ) . '">';
	$output	.= do_shortcode( $content );
	$output	.= '</div>';


	echo $output;

//Omit closing PHP tag to avoid accidental whitespace output errors.
	