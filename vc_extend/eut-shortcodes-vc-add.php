<?php
/*
 *	Euthemians Visual Composer Shortcode Extentions
 *
 * 	@author		Euthemians Team
 * 	@URI		http://euthemians.com
 */


if ( function_exists( 'vc_add_param' ) ) {

	//Generic css aniation for elements

	$eut_add_animation = array(
		"type" => "dropdown",
		"heading" => __("CSS Animation", 'corpus' ),
		"param_name" => "animation",
		"admin_label" => true,
		"value" => array(
			__( "No", 'corpus' ) => '',
			__( "Fade In", 'corpus' ) => "fadeIn",
			__( "Fade In Up", 'corpus' ) => "fadeInUp",
			__( "Fade In Down", 'corpus' ) => "fadeInDown",
			__( "Fade In Left", 'corpus' ) => "fadeInLeft",
			__( "Fade In Right", 'corpus' ) => "fadeInRight",
		),
		"description" => __("Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'corpus' ),
	);

	$eut_add_animation_delay = array(
		"type" => "textfield",
		"heading" => __( 'Css Animation Delay', 'corpus' ),
		"param_name" => "animation_delay",
		"value" => '200',
		"description" => __( "Add delay in milliseconds.", 'corpus' ),
	);

	$eut_add_margin_bottom = array(
		"type" => "textfield",
		"heading" => __( 'Bottom margin', 'corpus' ),
		"param_name" => "margin_bottom",
		"description" => __( "You can use px, em, %, etc. or enter just number and it will use pixels.", 'corpus' ),
	);

	$eut_add_el_class = array(
		"type" => "textfield",
		"heading" => __("Extra class name", 'corpus' ),
		"param_name" => "el_class",
		"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'corpus' ),
	);

	$eut_column_width_list = array(
		__('1 column - 1/12', 'corpus' ) => '1/12',
		__('2 columns - 1/6', 'corpus' ) => '1/6',
		__('3 columns - 1/4', 'corpus' ) => '1/4',
		__('4 columns - 1/3', 'corpus' ) => '1/3',
		__('5 columns - 5/12', 'corpus' ) => '5/12',
		__('6 columns - 1/2', 'corpus' ) => '1/2',
		__('7 columns - 7/12', 'corpus' ) => '7/12',
		__('8 columns - 2/3', 'corpus' ) => '2/3',
		__('9 columns - 3/4', 'corpus' ) => '3/4',
		__('10 columns - 5/6', 'corpus' ) => '5/6',
		__('11 columns - 11/12', 'corpus' ) => '11/12',
		__('12 columns - 1/1', 'corpus' ) => '1/1'
	);

	$eut_column_desktop_hide_list = array(
		__('Default value from width attribute', 'corpus') => '',
		__( 'Hide', 'corpus' ) => 'hide',
	);

	$eut_column_width_tablet_list = array(
		__('Default value from width attribute', 'corpus') => '',
		__( 'Hide', 'corpus' ) => 'hide',
		__( '1 column - 1/12', 'corpus' ) => '1-12',
		__( '2 columns - 1/6', 'corpus' ) => '1-6',
		__( '3 columns - 1/4', 'corpus' ) => '1-4',
		__( '4 columns - 1/3', 'corpus' ) => '1-3',
		__( '5 columns - 5/12', 'corpus' ) => '5-12',
		__( '6 columns - 1/2', 'corpus' ) => '1-2',
		__( '7 columns - 7/12', 'corpus' ) => '7-12',
		__( '8 columns - 2/3', 'corpus' ) => '2-3',
		__( '9 columns - 3/4', 'corpus' ) => '3-4',
		__( '10 columns - 5/6', 'corpus' ) => '5-6',
		__( '11 columns - 11/12', 'corpus' ) => '11-12',
		__( '12 columns - 1/1', 'corpus' ) => '1',
	);

	$eut_column_width_tablet_sm_list = array(
		__('Inherit from Tablet Landscape', 'corpus') => '',
		__( 'Hide', 'corpus' ) => 'hide',
		__( '1 column - 1/12', 'corpus' ) => '1-12',
		__( '2 columns - 1/6', 'corpus' ) => '1-6',
		__( '3 columns - 1/4', 'corpus' ) => '1-4',
		__( '4 columns - 1/3', 'corpus' ) => '1-3',
		__( '5 columns - 5/12', 'corpus' ) => '5-12',
		__( '6 columns - 1/2', 'corpus' ) => '1-2',
		__( '7 columns - 7/12', 'corpus' ) => '7-12',
		__( '8 columns - 2/3', 'corpus' ) => '2-3',
		__( '9 columns - 3/4', 'corpus' ) => '3-4',
		__( '10 columns - 5/6', 'corpus' ) => '5-6',
		__( '11 columns - 11/12', 'corpus' ) => '11-12',
		__( '12 columns - 1/1', 'corpus' ) => '1',
	);
	$eut_column_mobile_width_list = array(
		__( 'Default value 12 columns - 1/1', 'corpus' ) => '',
		__( 'Hide', 'corpus' ) => 'hide',
		__( '3 columns - 1/4', 'corpus' ) => '1-4',
		__( '4 columns - 1/3', 'corpus' ) => '1-3',
		__( '6 columns - 1/2', 'corpus' ) => '1-2',
		__( '12 columns - 1/1', 'corpus' ) => '1',
		__( 'Hide', 'corpus' ) => 'hide',
	);

	//Add additional column options for Page Builder 5.5
	if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '5.5', '>=' ) ) {
		$eut_extra_list = array(
			esc_html__( '20% - 1/5', 'corpus' ) => '1/5',
			esc_html__( '40% - 2/5', 'corpus' ) => '2/5',
			esc_html__( '60% - 3/5', 'corpus' ) => '3/5',
			esc_html__( '80% - 4/5', 'corpus' ) => '4/5',
		);
		$eut_column_width_list = array_merge( $eut_column_width_list, $eut_extra_list);

		$eut_extra_list_simplified = array(
			esc_html__( '20% - 1/5', 'corpus' ) => '1-5',
			esc_html__( '40% - 2/5', 'corpus' ) => '2-5',
			esc_html__( '60% - 3/5', 'corpus' ) => '3-5',
			esc_html__( '80% - 4/5', 'corpus' ) => '4-5',
		);
		$eut_column_width_tablet_list = array_merge( $eut_column_width_tablet_list, $eut_extra_list_simplified );
		$eut_column_width_tablet_sm_list = array_merge( $eut_column_width_tablet_sm_list, $eut_extra_list_simplified );
		$eut_column_mobile_width_list = array_merge( $eut_column_mobile_width_list, $eut_extra_list_simplified );
	}

	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __('Section ID', 'corpus' ),
			"param_name" => "section_id",
			"description" => __("If you wish you can type an id to use it as bookmark.", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "colorpicker",
			"heading" => __('Font Color', 'corpus' ),
			"param_name" => "font_color",
			"description" => __("Select font color", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Heading Color", 'corpus' ),
			"param_name" => "heading_color",
			"value" => array(
				__( "Default", 'corpus' ) => '',
				__( "Dark", 'corpus' ) => 'dark',
				__( "Light", 'corpus' ) => 'light',
				__( "Primary 1", 'corpus' ) => 'primary-1',
				__( "Primary 2", 'corpus' ) => 'primary-2',
				__( "Primary 3", 'corpus' ) => 'primary-3',
				__( "Primary 4", 'corpus' ) => 'primary-4',
				__( "Primary 5", 'corpus' ) => 'primary-5',
				__( "Green", 'corpus' ) => 'green',
				__( "Orange", 'corpus' ) => 'orange',
				__( "Red", 'corpus' ) => 'red',
				__( "Blue", 'corpus' ) => 'blue',
				__( "Aqua", 'corpus' ) => 'aqua',
				__( "Purple", 'corpus' ) => 'purple',
				__( "Grey", 'corpus' ) => 'grey',
			),
			"description" => __( "Select heading color", 'corpus' ),
		)
	);

	vc_add_param( "vc_row", $eut_add_el_class );


	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Section Type", 'corpus' ),
			"param_name" => "section_type",
			"value" => array(
				__( "Full Width Background", 'corpus' ) => 'fullwidth-background',
				__( "In Container", 'corpus' ) => 'in-container',
				__( "Full Width Element", 'corpus' ) => 'fullwidth-element',
			),
			"description" => __( "Select section type", 'corpus' ),
			"group" => __( "Section Options", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Section Window Height", 'corpus' ),
			"param_name" => "section_full_height",
			"value" => array(
				__( "No", 'corpus' ) => 'no',
				__( "Yes", 'corpus' ) => 'yes',
			),
			"description" => __( "Select if you want your section height to be equal with the window height", 'corpus' ),
			"group" => __( "Section Options", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => 'dropdown',
			"heading" => __( "Background Type", 'corpus' ),
			"param_name" => "bg_type",
			"description" => __( "Select Background type", 'corpus' ),
			"value" => array(
				__("None", 'corpus' ) => '',
				__("Color", 'corpus' ) => 'color',
				__("Image", 'corpus' ) => 'image',
				__("Hosted Video", 'corpus' ) => 'hosted_video',
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "colorpicker",
			"heading" => __( "Custom Background Color", 'corpus' ),
			"param_name" => "bg_color",
			"description" => __( "Select background color for your row", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'color' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "attach_image",
			"heading" => __('Background Image', 'corpus' ),
			"param_name" => "bg_image",
			"value" => '',
			"description" => __("Select background image for your row. Used also as fallback for video.", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'image', 'hosted_video' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Background Image Type", 'corpus' ),
			"param_name" => "bg_image_type",
			"value" => array(
				__("Default", 'corpus' ) => '',
				__("Parallax", 'corpus' ) => 'parallax',
				__("Animated", 'corpus' ) => 'animated'
			),
			"description" => __( "Select how a background image will be displayed", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'image' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __("WebM File URL", 'corpus'),
			"param_name" => "bg_video_webm",
			"description" => __( "Fill WebM and mp4 format for browser compatibility", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'hosted_video' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __( "MP4 File URL", 'corpus' ),
			"param_name" => "bg_video_mp4",
			"description" => __( "Fill mp4 format URL", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'hosted_video' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __( "OGV File URL", 'corpus' ),
			"param_name" => "bg_video_ogv",
			"description" => __( "Fill OGV format URL ( optional )", 'corpus' ),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'hosted_video' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Pattern overlay", 'corpus'),
			"param_name" => "pattern_overlay",
			"description" => __( "If selected, a pattern will be added.", 'corpus' ),
			"value" => Array( __( "Add pattern", 'corpus' ) => 'yes'),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'image', 'hosted_video' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Color overlay", 'corpus' ),
			"param_name" => "color_overlay",
			"value" => array(
				__( "None", 'corpus' ) => '',
				__( "Dark", 'corpus' ) => 'dark',
				__( "Light", 'corpus' ) => 'light',
				__( "Primary 1", 'corpus' ) => 'primary-1',
				__( "Primary 2", 'corpus' ) => 'primary-2',
				__( "Primary 3", 'corpus' ) => 'primary-3',
				__( "Primary 4", 'corpus' ) => 'primary-4',
				__( "Primary 5", 'corpus' ) => 'primary-5',
			),
			"dependency" => array(
				'element' => 'bg_type',
				'value' => array( 'image', 'hosted_video' )
			),
			"description" => __( "A color overlay for the media", 'corpus' ),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => __( "Opacity overlay", 'corpus' ),
			"param_name" => "opacity_overlay",
			"value" => array( '10', '20', '30' ,'40', '50', '60', '70', '80' ,'90' ),
			"description" => __( "Opacity of the overlay", 'corpus' ),
			"dependency" => array(
				'element' => 'color_overlay',
				'value_not_equal_to' => array( '' )
			),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __( "Top padding", 'corpus' ),
			"param_name" => "padding_top",
			"dependency" => array(
				'element' => 'section_full_height',
				'value' => array( 'no' )
			),
			"description" => __( "You can use px, em, %, etc. or enter just number and it will use pixels.", 'corpus' ),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => "textfield",
			"heading" => __( "Bottom padding", 'corpus' ),
			"param_name" => "padding_bottom",
			"dependency" => array(
				'element' => 'section_full_height',
				'value' => array( 'no' )
			),
			"description" => __( "You can use px, em, %, etc. or enter just number and it will use pixels.", 'corpus' ),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
		"type" => "textfield",
		"heading" => __( 'Bottom margin', 'corpus' ),
		"param_name" => "margin_bottom",
		"description" => __( "You can use px, em, %, etc. or enter just number and it will use pixels.", 'corpus' ),
		"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Header Section", 'corpus' ),
			"param_name" => "header_feature",
			"description" => __( "Use this option if first section ( no gap from header )", 'corpus' ),
			"value" => Array( __( "Header section", 'corpus' ) => 'yes'),
			"group" => __( "Section Options", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Footer Section", 'corpus' ),
			"param_name" => "footer_feature",
			"description" => __( "Use this option if last section ( no gap from footer )", 'corpus' ),
			"value" => Array( __( "Footer section", 'corpus' ) => 'yes'),
			"group" => __( "Section Options", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Equal Column Height", 'corpus'),
			"param_name" => "flex_height",
			"description" => __( "If selected columns will have equal height. Recommended for multiple columns with different background colors.", 'corpus' ),
			"value" => Array( __( "Equal column height", 'corpus' ) => 'yes'),
			"group" => __( "Inner Columns", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Equal Height Columns and Middle Content", 'corpus'),
			"param_name" => "middle_content",
			"description" => __( "If selected column content will have equal height and centered vertically.", 'corpus' ),
			"value" => Array(__( "Equal Height Columns and Middle Content", 'corpus' ) => 'yes'),
			"group" => __( "Inner Columns", 'corpus' ),
		)
	);

		vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Tablet Portrait Equal Column Height / Middle Content", 'corpus' ),
			"param_name" => "tablet_portrait_equal_columns",
			"value" => array(
				esc_html__( "None", 'corpus' ) => '',
				esc_html__( "Inherit from above", 'corpus' ) => 'inherit',
			),
			"description" => esc_html__( "Select if you wish to keep or disable the Equal Column Height / Middle Content.", 'corpus' ),
			"group" => esc_html__( "Inner Columns", 'corpus' ),
		)
	);

	vc_add_param( "vc_row",
		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Columns Gap", 'corpus' ),
			"param_name" => "column_gap",
			"value" => array(
				esc_html__( "Default", 'corpus' ) => '',
				esc_html__( '5px', 'corpus' ) => '5',
				esc_html__( '10px', 'corpus' ) => '10',
				esc_html__( '15px', 'corpus' ) => '15',
				esc_html__( '20px', 'corpus' ) => '20',
				esc_html__( '25px', 'corpus' ) => '25',
				esc_html__( '30px', 'corpus' ) => '30',
				esc_html__( '35px', 'corpus' ) => '35',
				esc_html__( '40px', 'corpus' ) => '40',
				esc_html__( '45px', 'corpus' ) => '45',
				esc_html__( '50px', 'corpus' ) => '50',
				esc_html__( '55px', 'corpus' ) => '55',
				esc_html__( '60px', 'corpus' ) => '60',
			),
			"description" => esc_html__( "Select gap between columns in row.", 'corpus' ),
			"group" => esc_html__( "Inner Columns", 'corpus' ),
		)
	);


	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Desktop Visibility", 'corpus'),
			"param_name" => "desktop_visibility",
			"description" => __( "If selected, row will be hidden on desktops/laptops.", 'corpus' ),
			"value" => Array( __( "Hide", 'corpus' ) => 'hide'),
			'group' => __( "Responsiveness", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Tablet Landscape Visibility", 'corpus'),
			"param_name" => "tablet_visibility",
			"description" => __( "If selected, row will be hidden on tablet devices with landscape orientation.", 'corpus' ),
			"value" => Array( __( "Hide", 'corpus' ) => 'hide'),
			'group' => __( "Responsiveness", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Tablet Portrait Visibility", 'corpus'),
			"param_name" => "tablet_sm_visibility",
			"description" => __( "If selected, row will be hidden on tablet devices with portrait orientation.", 'corpus' ),
			"value" => Array( __( "Hide", 'corpus' ) => 'hide'),
			'group' => __( "Responsiveness", 'corpus' ),
		)
	);
	vc_add_param( "vc_row",
		array(
			"type" => 'checkbox',
			"heading" => __( "Mobile Visibility", 'corpus'),
			"param_name" => "mobile_visibility",
			"description" => __( "If selected, row will be hidden on mobile devices.", 'corpus' ),
			"value" => Array( __( "Hide", 'corpus' ) => 'hide'),
			'group' => __( "Responsiveness", 'corpus' ),
		)
	);

	vc_add_param( "vc_column",
		array(
			'type' => 'dropdown',
			'heading' => __( "Width", 'corpus' ),
			'param_name' => 'width',
			'value' => $eut_column_width_list,
			'group' => __( "Width & Responsiveness", 'corpus' ),
			'description' => __( "Select column width.", 'corpus' ),
			'std' => '1/1'
		)
	);
	vc_add_param( "vc_column",
		array(
			"type" => "dropdown",
			"heading" => __( "Desktop", 'corpus' ),
			"param_name" => "desktop_hide",
			"value" => $eut_column_desktop_hide_list,
			"description" => __( "Responsive column on desktops/laptops.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column",
		array(
			"type" => "dropdown",
			"heading" => __( "Tablet Landscape", 'corpus' ),
			"param_name" => "tablet_width",
			"value" => $eut_column_width_tablet_list,
			"description" => __( "Responsive column on tablet devices with landscape orientation.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column",
		array(
			"type" => "dropdown",
			"heading" => __( "Tablet Portrait", 'corpus' ),
			"param_name" => "tablet_sm_width",
			"value" => $eut_column_width_tablet_sm_list,
			"description" => __( "Responsive column on tablet devices with portrait orientation.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column",
		array(
			"type" => "dropdown",
			"heading" => __( "Mobile", 'corpus' ),
			"param_name" => "mobile_width",
			"value" => $eut_column_mobile_width_list,
			"description" => __( "Responsive column on mobile devices.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);

	vc_add_param( "vc_column_inner",
		array(
			'type' => 'dropdown',
			'heading' => __( "Width", 'corpus' ),
			'param_name' => 'width',
			'value' => $eut_column_width_list,
			'group' => __( "Width & Responsiveness", 'corpus' ),
			'description' => __( "Select column width.", 'corpus' ),
			'std' => '1/1'
		)
	);
	vc_add_param( "vc_column_inner",
		array(
			"type" => "dropdown",
			"heading" => __( "Desktop", 'corpus' ),
			"param_name" => "desktop_hide",
			"value" => $eut_column_desktop_hide_list,
			"description" => __( "Responsive column on desktops/laptops.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column_inner",
		array(
			"type" => "dropdown",
			"heading" => __( "Tablet Landscape", 'corpus' ),
			"param_name" => "tablet_width",
			"value" => $eut_column_width_tablet_list,
			"description" => __( "Responsive column on tablet devices with landscape orientation.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column_inner",
		array(
			"type" => "dropdown",
			"heading" => __( "Tablet Portrait", 'corpus' ),
			"param_name" => "tablet_sm_width",
			"value" => $eut_column_width_tablet_sm_list,
			"description" => __( "Responsive column on tablet devices with portrait orientation.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);
	vc_add_param( "vc_column_inner",
		array(
			"type" => "dropdown",
			"heading" => __( "Mobile", 'corpus' ),
			"param_name" => "mobile_width",
			"value" => $eut_column_mobile_width_list,
			"description" => __( "Responsive column on mobile devices.", 'corpus' ),
			'group' => __( 'Width & Responsiveness', 'corpus' ),
		)
	);

	vc_add_param( "vc_tabs",
		array(
			"type" => "dropdown",
			"heading" => __( "Tab Type", 'corpus' ),
			"param_name" => "tab_type",
			"value" => array(
				__( "Horizontal", 'corpus' ) => 'horizontal',
				__( "Vertical", 'corpus' ) => 'vertical',
			),
			"description" => __( "Select tab type", 'corpus' ),
		)
	);

	vc_add_param( "vc_tabs", $eut_add_margin_bottom );

	vc_add_param( "vc_accordion",
		array(
			"type" => 'checkbox',
			"heading" => __( "Toggle", 'corpus'),
			"param_name" => "toggle",
			"description" => __( "If selected, accordion will be displayed as toggle.", 'corpus' ),
			"value" => Array( __( "Convert to toggle.", 'corpus' ) => 'yes'),
		)
	);

	vc_add_param( "vc_accordion",
		array(
			"type" => "dropdown",
			"heading" => __( "Initial State", 'corpus' ),
			"param_name" => "initial_state",
			"admin_label" => true,
			"value" => array(
				__( "First Open", 'corpus' ) => 'first',
				__( "All Closed", 'corpus' ) => 'none',
			),
			"description" => __( "Accordion Initial State", 'corpus' ),
		)
	);

	vc_add_param( "vc_accordion", $eut_add_margin_bottom );
	vc_add_param( "vc_accordion", $eut_add_el_class );

	vc_add_param( "vc_column_text",
		array(
			"type" => "dropdown",
			"heading" => __( "Text Style", 'corpus' ),
			"param_name" => "text_style",
			"value" => array(
				__( "None", 'corpus' ) => '',
				__( "Leader", 'corpus' ) => 'leader-text',
				__( "Subtitle", 'corpus' ) => 'subtitle',
			),
			"description" => __( "Select your text style", 'corpus' ),
		)
	);
	vc_add_param( "vc_column_text", $eut_add_animation );
	vc_add_param( "vc_column_text", $eut_add_animation_delay );

	vc_add_param( "vc_widget_sidebar",
		array(
			'type' => 'hidden',
			'param_name' => 'title',
			'value' => '',
		)
	);

	if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.6', '>=') ) {
		vc_add_param( "vc_tta_tabs",
			array(
				'type' => 'hidden',
				'param_name' => 'no_fill_content_area',
				'value' => '',
			)
		);

		vc_add_param( "vc_tta_tabs",
			array(
				'type' => 'hidden',
				'param_name' => 'tab_position',
				'value' => 'top',
			)
		);

		vc_add_param( "vc_tta_accordion",
			array(
				'type' => 'hidden',
				'param_name' => 'no_fill',
				'value' => '',
			)
		);

		vc_add_param( "vc_tta_tour",
			array(
				'type' => 'hidden',
				'param_name' => 'no_fill_content_area',
				'value' => '',
			)
		);
	}

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
