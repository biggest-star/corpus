<?php
/**
 * Theme Options Config File
 * @version	1.0
 * @author		Euthemians Team
 * @URI		http://euthemians.com
 * */

if ( !class_exists( "ReduxFramework" ) ) {
	return;
}

function eut_redux_dimensions_validation( $field, $value, $existing_value ) {
	$error = false;

	if ( empty( $value['width'] ) || !is_numeric( $value['width'] ) ) {
		$error = true;
	}
	if ( empty( $value['height'] ) || !is_numeric( $value['height'] ) ) {
		$error = true;
	}

	if ( $error == true ) {
		$value = $existing_value;
		$field['msg'] = esc_html__( 'You must provide a numerical value for both options.', 'corpus' );
	}

	$return['value'] = $value;
	if ( $error == true ) {
		$return['error'] = $field;
	}
	return $return;

}

if (!class_exists("EUT_Redux_Framework_config")) {

	class EUT_Redux_Framework_config {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {
			// Set the default arguments
			$this->setArguments();

			// Create the sections and fields
			$this->setSections();

			// No errors please
			if ( !isset( $this->args['opt_name'] ) ) {
				return;
			}
			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
		}

		public function eut_redux_customizer_visibility() {
			$visibility = apply_filters( 'eut_redux_customizer_visibility', false );
			return $visibility;
		}

		public function setSections() {

			/**
			 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
			 * */

			global $eut_social_list;
			$eut_social_options = $eut_social_list;

			$eut_portfolio_social_options = array(
				'twitter' => 'Twitter',
				'facebook' => 'Facebook',
				'linkedin' => 'LinkedIn',
				'google-plus' => 'Google Plus',
				'pinterest' => 'Pinterest',
				'eut-likes' => '(Euthemians) Likes',
			);

			$eut_blog_social_options = array(
				'twitter' => 'Twitter',
				'facebook' => 'Facebook',
				'linkedin' => 'LinkedIn',
				'google-plus' => 'Google Plus',
				'eut-likes' => '(Euthemians) Likes',
			);

			$eut_theme_layout_selection = array(
				'stretched' => __( 'Stretched', 'corpus' ),
				'boxed' => __( 'Boxed', 'corpus' ),
			);

			$eut_enable_selection = array(
				'no' => __( 'No', 'corpus' ),
				'yes' => __( 'Yes', 'corpus' ),
			);

			$eut_blog_style_selection = array(
				'large-media' => __( 'Large Media', 'corpus' ),
				'small-media' => __( 'Small Media', 'corpus' ),
				'masonry' => __( 'Masonry' , 'corpus' ),
				'grid' => __( 'Grid' , 'corpus' ),
			);

			$eut_blog_image_mode_selection = array(
				'auto' => __( 'Auto Crop', 'corpus' ),
				'resize' => __( 'Resize', 'corpus' ),
				'large' => __( 'Resize ( Large )', 'corpus' ),
				'medium_large' => __( 'Resize ( Medium Large )', 'corpus' ),
				'medium' => __( 'Resize ( Medium )', 'corpus' ),
			);

			$eut_blog_masonry_image_mode_selection = array(
				'large' => __( 'Resize ( Large )', 'corpus' ),
				'medium_large' => __( 'Resize ( Medium Large )', 'corpus' ),
				'medium' => __( 'Resize ( Medium )', 'corpus' ),
			);

			$eut_blog_columns_selection = array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			);
			$eut_blog_columns_selection_mobile = array(
				'1' => '1',
				'2' => '2',
			);

			$eut_layout_selection = array(
				'none' => array('alt' => __( 'Full Width', 'corpus' ), 'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
				'left' => array('alt' => __( 'Left Sidebar', 'corpus' ), 'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
				'right' => array('alt' => __( 'Right Sidebar', 'corpus' ), 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
			);

			$eut_align_selection = array(
				'left' => __( 'Left', 'corpus' ),
				'right' => __( 'Right', 'corpus' ),
			);

			$eut_align_selection_extra = array(
				'left' => __( 'Left', 'corpus' ),
				'center' => __( 'Center', 'corpus' ),
				'right' => __( 'Right', 'corpus' ),
			);

			$eut_background_type = array(
				'transparent' => __( 'None', 'corpus' ),
				'colored' => __( 'Background', 'corpus' ),
				'advanced' => __( 'Stretched Background', 'corpus' ),
			);

			$eut_header_menu_options = array(
				'search' => __( 'Search', 'corpus' ),
				'cart' => esc_html__( 'Shopping Cart (WooCommerce Required)', 'corpus' ),
				'language' => __( 'Language selector (WPML or Polylang Required)', 'corpus' ),
			);

			$eut_header_menu_selection = array(
				'default' => __( 'Default', 'corpus' ),
				'ubermenu' => __( 'UberMenu Direct', 'corpus' ),
				'disabled' => __( 'Disabled', 'corpus' ),
			);

			$eut_headings_tag_selection = array(
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h3'  => 'h3',
				'h4'  => 'h4',
				'h5'  => 'h5',
				'h6'  => 'h6',
				'div'  => 'div',
			);

			$eut_retina_support_selection = array(
				'default' => __( 'Theme Defined Images Only', 'corpus' ),
				'full' => __( 'Full', 'corpus' ),
				'disabled' => __( 'Disabled', 'corpus' ),
			);

			$eut_top_bar_options = array(
				'search' => __( 'Search', 'corpus' ),
				'language' => __( 'Language selector (WPML or Polylang Required)', 'corpus' ),
			);

			$eut_menu_animations = array(
				'none' => __( 'None', 'corpus' ),
				'fade-in' => __( 'Fade in', 'corpus' ),
				'fade-in-up' => __( 'Fade in Up', 'corpus' ),
				'fade-in-down' => __( 'Fade in Down', 'corpus' ),
				'fade-in-left' => __( 'Fade in Left', 'corpus' ),
				'fade-in-right' => __( 'Fade in Right', 'corpus' ),
			);
			$eut_menu_pointers = array(
				'none' => __( 'None', 'corpus' ),
				'arrow' => __( 'Arrow', 'corpus' ),
			);

			$eut_color_selection = array(
				'dark' => __( 'Dark', 'corpus' ),
				'light' => __( 'Light', 'corpus' ),
				'primary-1' => __( 'Primary 1', 'corpus' ),
				'primary-2' => __( 'Primary 2', 'corpus' ),
				'primary-3' => __( 'Primary 3', 'corpus' ),
				'primary-4' => __( 'Primary 4', 'corpus' ),
				'primary-5' => __( 'Primary 5', 'corpus' ),
			);

			$eut_bg_color_selection = array(
				'none' => __( 'None', 'corpus' ),
				'dark' => __( 'Dark', 'corpus' ),
				'light' => __( 'Light', 'corpus' ),
				'primary-1' => __( 'Primary 1', 'corpus' ),
				'primary-2' => __( 'Primary 2', 'corpus' ),
				'primary-3' => __( 'Primary 3', 'corpus' ),
				'primary-4' => __( 'Primary 4', 'corpus' ),
				'primary-5' => __( 'Primary 5', 'corpus' ),
			);

			$eut_sidebar_style_selection = array(
				'simple' => __( 'Simple', 'corpus' ),
				'box' => __( 'Box', 'corpus' ),
			);

			$eut_menu_responsibe_style_selection = array(
				'1' => __( 'Style 1', 'corpus' ),
				'2' => __( 'Style 2', 'corpus' ),
			);

			$eut_menu_responsibe_toggle_selection = array(
				'icon' => __( 'Icon', 'corpus' ),
				'text' => __( 'Text', 'corpus' ),
			);

			$eut_footer_column_selection = array(
				'footer-1' => array('alt' => __( 'Footer 1', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-1.png' ),
				'footer-2' => array('alt' => __( 'Footer 2', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-2.png' ),
				'footer-3' => array('alt' => __( 'Footer 3', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-3.png' ),
				'footer-4' => array('alt' => __( 'Footer 4', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-4.png' ),
				'footer-5' => array('alt' => __( 'Footer 5', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-5.png' ),
				'footer-6' => array('alt' => __( 'Footer 6', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-6.png' ),
				'footer-7' => array('alt' => __( 'Footer 7', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-7.png' ),
				'footer-8' => array('alt' => __( 'Footer 8', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-8.png' ),
				'footer-9' => array('alt' => __( 'Footer 9', 'corpus' ), 'img' => get_template_directory_uri() . '/includes/images/footer/footer-9.png' ),
			);

			$eut_opacity_selection = array(
				'0'    => '0%',
				'0.05' => '5%',
				'0.10' => '10%',
				'0.15' => '15%',
				'0.20' => '20%',
				'0.25' => '25%',
				'0.30' => '30%',
				'0.35' => '35%',
				'0.40' => '40%',
				'0.45' => '45%',
				'0.50' => '50%',
				'0.55' => '55%',
				'0.60' => '60%',
				'0.65' => '65%',
				'0.70' => '70%',
				'0.75' => '75%',
				'0.80' => '80%',
				'0.85' => '85%',
				'0.90' => '90%',
				'0.95' => '95%',
				'1'    => '100%',
			);

			//Skin Presets
			$eut_skin_palette_1 = '{"top_bar_bg_color":"#303030","top_bar_font_color":"#c9c9c9","top_bar_link_color":"#c9c9c9","top_bar_hover_color":"#FA4949","top_bar_border_color":"#4f4f4f","header_background_color":"#ffffff","header_background_color_opacity":"1","header_border_color":"#e0e0e0","header_border_color_opacity":"1","menu_text_color":"#757575","menu_text_hover_color":"#bdbdbd","menu_line_color":"#FA4949","submenu_bg_color":"#1c1c1c","submenu_text_color":"#8e8e8e","submenu_text_hover_color":"#e0e0e0","submenu_title_color":"#ffffff","submenu_active_bg_color":"#151515","submenu_border_color":"#383838","header_sticky_background_color":"#ffffff","header_sticky_background_color_opacity":"0.95","header_sticky_border_color":"#000000","header_sticky_border_color_opacity":"0.10","sticky_menu_text_color":"#757575","sticky_menu_text_hover_color":"#bdbdbd","sticky_menu_line_color":"#FA4949","light_menu_text_color":"#e0e0e0","light_menu_text_hover_color":"#ffffff","light_menu_line_color":"#FA4949","header_light_border_color":"#ffffff","header_light_border_color_opacity":"0.30","dark_menu_text_color":"#212121","dark_menu_text_hover_color":"#000000","dark_menu_line_color":"#FA4949","header_dark_border_color":"#000000","header_dark_border_color_opacity":"0.10","theme_body_background_color":"#ffffff","body_heading_color":"#000000","body_text_color":"#676767","body_text_link_color":"#999999","body_text_link_hover_color":"#666666","body_border_color":"#E6E6E6","body_primary_1_color":"#FA4949","body_primary_1_hover_color":"#da2929","body_primary_2_color":"#039be5","body_primary_2_hover_color":"#0278dc","body_primary_3_color":"#00bfa5","body_primary_3_hover_color":"#00a986","body_primary_4_color":"#ff9800","body_primary_4_hover_color":"#ff7400","body_primary_5_color":"#ad1457","body_primary_5_hover_color":"#900d39","footer_widgets_bg_color":"#1c1c1c","footer_widgets_headings_color":"#616161","footer_widgets_font_color":"#bababa","footer_widgets_link_color":"#bababa","footer_widgets_hover_color":"#FA4949","footer_widgets_border_color":"#383838","footer_bar_bg_color":"#151515","footer_bar_bg_color_opacity":"1","footer_bar_font_color":"#5c5c5c","footer_bar_link_color":"#5c5c5c","footer_bar_hover_color":"#FA4949","blog_title_background_color":"#f1f1f1","blog_title_color":"dark","blog_description_color":"dark","page_title_background_color":"#f1f1f1","page_title_color":"dark","page_description_color":"dark","page_anchor_menu_background_color":"#efefef","page_anchor_menu_text_color":"#6e6e6e","page_anchor_menu_text_hover_color":"#FA4949","page_anchor_menu_background_hover_color":"#efefef","page_anchor_menu_border_color":"#e5e5e5","portfolio_title_background_color":"#f1f1f1","portfolio_title_color":"dark","portfolio_description_color":"dark"}';
			$eut_skin_palette_2 = '{"top_bar_bg_color":"#303030","top_bar_font_color":"#c9c9c9","top_bar_link_color":"#c9c9c9","top_bar_hover_color":"#039be5","top_bar_border_color":"#4f4f4f","header_background_color":"#ffffff","header_background_color_opacity":"1","header_border_color":"#e0e0e0","header_border_color_opacity":"1","menu_text_color":"#757575","menu_text_hover_color":"#bdbdbd","menu_line_color":"#039be5","submenu_bg_color":"#1c1c1c","submenu_text_color":"#8e8e8e","submenu_text_hover_color":"#e0e0e0","submenu_title_color":"#ffffff","submenu_active_bg_color":"#151515","submenu_border_color":"#383838","header_sticky_background_color":"#ffffff","header_sticky_background_color_opacity":"0.95","header_sticky_border_color":"#000000","header_sticky_border_color_opacity":"0.10","sticky_menu_text_color":"#757575","sticky_menu_text_hover_color":"#bdbdbd","sticky_menu_line_color":"#039be5","light_menu_text_color":"#e0e0e0","light_menu_text_hover_color":"#ffffff","light_menu_line_color":"#039be5","header_light_border_color":"#ffffff","header_light_border_color_opacity":"0.30","dark_menu_text_color":"#212121","dark_menu_text_hover_color":"#000000","dark_menu_line_color":"#039be5","header_dark_border_color":"#000000","header_dark_border_color_opacity":"0.10","theme_body_background_color":"#ffffff","body_heading_color":"#000000","body_text_color":"#676767","body_text_link_color":"#999999","body_text_link_hover_color":"#666666","body_border_color":"#E6E6E6","body_primary_1_color":"#039be5","body_primary_1_hover_color":"#0278dc","body_primary_2_color":"#FA4949","body_primary_2_hover_color":"#da2929","body_primary_3_color":"#00bfa5","body_primary_3_hover_color":"#00a986","body_primary_4_color":"#ff9800","body_primary_4_hover_color":"#ff7400","body_primary_5_color":"#ad1457","body_primary_5_hover_color":"#900d39","footer_widgets_bg_color":"#1c1c1c","footer_widgets_headings_color":"#616161","footer_widgets_font_color":"#bababa","footer_widgets_link_color":"#bababa","footer_widgets_hover_color":"#039be5","footer_widgets_border_color":"#383838","footer_bar_bg_color":"#151515","footer_bar_bg_color_opacity":"1","footer_bar_font_color":"#5c5c5c","footer_bar_link_color":"#5c5c5c","footer_bar_hover_color":"#039be5","blog_title_background_color":"#f1f1f1","blog_title_color":"dark","blog_description_color":"dark","page_title_background_color":"#f1f1f1","page_title_color":"dark","page_description_color":"dark","page_anchor_menu_background_color":"#efefef","page_anchor_menu_text_color":"#6e6e6e","page_anchor_menu_text_hover_color":"#039be5","page_anchor_menu_background_hover_color":"#efefef","page_anchor_menu_border_color":"#e5e5e5","portfolio_title_background_color":"#f1f1f1","portfolio_title_color":"dark","portfolio_description_color":"dark"}';
			$eut_skin_palette_3 = '{"top_bar_bg_color":"#303030","top_bar_font_color":"#c9c9c9","top_bar_link_color":"#c9c9c9","top_bar_hover_color":"#00bfa5","top_bar_border_color":"#4f4f4f","header_background_color":"#ffffff","header_background_color_opacity":"1","header_border_color":"#e0e0e0","header_border_color_opacity":"1","menu_text_color":"#757575","menu_text_hover_color":"#bdbdbd","menu_line_color":"#00bfa5","submenu_bg_color":"#1c1c1c","submenu_text_color":"#8e8e8e","submenu_text_hover_color":"#e0e0e0","submenu_title_color":"#ffffff","submenu_active_bg_color":"#151515","submenu_border_color":"#383838","header_sticky_background_color":"#ffffff","header_sticky_background_color_opacity":"0.95","header_sticky_border_color":"#000000","header_sticky_border_color_opacity":"0.10","sticky_menu_text_color":"#757575","sticky_menu_text_hover_color":"#bdbdbd","sticky_menu_line_color":"#00bfa5","light_menu_text_color":"#e0e0e0","light_menu_text_hover_color":"#ffffff","light_menu_line_color":"#00bfa5","header_light_border_color":"#ffffff","header_light_border_color_opacity":"0.30","dark_menu_text_color":"#212121","dark_menu_text_hover_color":"#000000","dark_menu_line_color":"#00bfa5","header_dark_border_color":"#000000","header_dark_border_color_opacity":"0.10","theme_body_background_color":"#ffffff","body_heading_color":"#000000","body_text_color":"#676767","body_text_link_color":"#999999","body_text_link_hover_color":"#666666","body_border_color":"#E6E6E6","body_primary_1_color":"#00bfa5","body_primary_1_hover_color":"#00a986","body_primary_2_color":"#039be5","body_primary_2_hover_color":"#0278dc","body_primary_3_color":"#FA4949","body_primary_3_hover_color":"#da2929","body_primary_4_color":"#ff9800","body_primary_4_hover_color":"#ff7400","body_primary_5_color":"#ad1457","body_primary_5_hover_color":"#900d39","footer_widgets_bg_color":"#1c1c1c","footer_widgets_headings_color":"#616161","footer_widgets_font_color":"#bababa","footer_widgets_link_color":"#bababa","footer_widgets_hover_color":"#00bfa5","footer_widgets_border_color":"#383838","footer_bar_bg_color":"#151515","footer_bar_bg_color_opacity":"1","footer_bar_font_color":"#5c5c5c","footer_bar_link_color":"#5c5c5c","footer_bar_hover_color":"#00bfa5","blog_title_background_color":"#f1f1f1","blog_title_color":"dark","blog_description_color":"dark","page_title_background_color":"#f1f1f1","page_title_color":"dark","page_description_color":"dark","page_anchor_menu_background_color":"#efefef","page_anchor_menu_text_color":"#6e6e6e","page_anchor_menu_text_hover_color":"#00bfa5","page_anchor_menu_background_hover_color":"#efefef","page_anchor_menu_border_color":"#e5e5e5","portfolio_title_background_color":"#f1f1f1","portfolio_title_color":"dark","portfolio_description_color":"dark"}';
			$eut_skin_palette_4 = '{"top_bar_bg_color":"#303030","top_bar_font_color":"#c9c9c9","top_bar_link_color":"#c9c9c9","top_bar_hover_color":"#ff9800","top_bar_border_color":"#4f4f4f","header_background_color":"#ffffff","header_background_color_opacity":"1","header_border_color":"#e0e0e0","header_border_color_opacity":"1","menu_text_color":"#757575","menu_text_hover_color":"#bdbdbd","menu_line_color":"#ff9800","submenu_bg_color":"#1c1c1c","submenu_text_color":"#8e8e8e","submenu_text_hover_color":"#e0e0e0","submenu_title_color":"#ffffff","submenu_active_bg_color":"#151515","submenu_border_color":"#383838","header_sticky_background_color":"#ffffff","header_sticky_background_color_opacity":"0.95","header_sticky_border_color":"#000000","header_sticky_border_color_opacity":"0.10","sticky_menu_text_color":"#757575","sticky_menu_text_hover_color":"#bdbdbd","sticky_menu_line_color":"#ff9800","light_menu_text_color":"#e0e0e0","light_menu_text_hover_color":"#ffffff","light_menu_line_color":"#ff9800","header_light_border_color":"#ffffff","header_light_border_color_opacity":"0.30","dark_menu_text_color":"#212121","dark_menu_text_hover_color":"#000000","dark_menu_line_color":"#ff9800","header_dark_border_color":"#000000","header_dark_border_color_opacity":"0.10","theme_body_background_color":"#ffffff","body_heading_color":"#000000","body_text_color":"#676767","body_text_link_color":"#999999","body_text_link_hover_color":"#666666","body_border_color":"#E6E6E6","body_primary_1_color":"#ff9800","body_primary_1_hover_color":"#ff7400","body_primary_2_color":"#039be5","body_primary_2_hover_color":"#0278dc","body_primary_3_color":"#00bfa5","body_primary_3_hover_color":"#00a986","body_primary_4_color":"#FA4949","body_primary_4_hover_color":"#da2929","body_primary_5_color":"#ad1457","body_primary_5_hover_color":"#900d39","footer_widgets_bg_color":"#1c1c1c","footer_widgets_headings_color":"#616161","footer_widgets_font_color":"#bababa","footer_widgets_link_color":"#bababa","footer_widgets_hover_color":"#ff9800","footer_widgets_border_color":"#383838","footer_bar_bg_color":"#151515","footer_bar_bg_color_opacity":"1","footer_bar_font_color":"#5c5c5c","footer_bar_link_color":"#5c5c5c","footer_bar_hover_color":"#ff9800","blog_title_background_color":"#f1f1f1","blog_title_color":"dark","blog_description_color":"dark","page_title_background_color":"#f1f1f1","page_title_color":"dark","page_description_color":"dark","page_anchor_menu_background_color":"#efefef","page_anchor_menu_text_color":"#6e6e6e","page_anchor_menu_text_hover_color":"#ff9800","page_anchor_menu_background_hover_color":"#efefef","page_anchor_menu_border_color":"#e5e5e5","portfolio_title_background_color":"#f1f1f1","portfolio_title_color":"dark","portfolio_description_color":"dark"}';
			$eut_skin_palette_5 = '{"top_bar_bg_color":"#303030","top_bar_font_color":"#c9c9c9","top_bar_link_color":"#c9c9c9","top_bar_hover_color":"#ad1457","top_bar_border_color":"#4f4f4f","header_background_color":"#ffffff","header_background_color_opacity":"1","header_border_color":"#e0e0e0","header_border_color_opacity":"1","menu_text_color":"#757575","menu_text_hover_color":"#bdbdbd","menu_line_color":"#ad1457","submenu_bg_color":"#1c1c1c","submenu_text_color":"#8e8e8e","submenu_text_hover_color":"#e0e0e0","submenu_title_color":"#ffffff","submenu_active_bg_color":"#151515","submenu_border_color":"#383838","header_sticky_background_color":"#ffffff","header_sticky_background_color_opacity":"0.95","header_sticky_border_color":"#000000","header_sticky_border_color_opacity":"0.10","sticky_menu_text_color":"#757575","sticky_menu_text_hover_color":"#bdbdbd","sticky_menu_line_color":"#ad1457","light_menu_text_color":"#e0e0e0","light_menu_text_hover_color":"#ffffff","light_menu_line_color":"#ad1457","header_light_border_color":"#ffffff","header_light_border_color_opacity":"0.30","dark_menu_text_color":"#212121","dark_menu_text_hover_color":"#000000","dark_menu_line_color":"#ad1457","header_dark_border_color":"#000000","header_dark_border_color_opacity":"0.10","theme_body_background_color":"#ffffff","body_heading_color":"#000000","body_text_color":"#676767","body_text_link_color":"#999999","body_text_link_hover_color":"#666666","body_border_color":"#E6E6E6","body_primary_1_color":"#ad1457","body_primary_1_hover_color":"#900d39","body_primary_2_color":"#039be5","body_primary_2_hover_color":"#0278dc","body_primary_3_color":"#00bfa5","body_primary_3_hover_color":"#00a986","body_primary_4_color":"#ff9800","body_primary_4_hover_color":"#ff7400","body_primary_5_color":"#FA4949","body_primary_5_hover_color":"#da2929","footer_widgets_bg_color":"#1c1c1c","footer_widgets_headings_color":"#616161","footer_widgets_font_color":"#bababa","footer_widgets_link_color":"#bababa","footer_widgets_hover_color":"#ad1457","footer_widgets_border_color":"#383838","footer_bar_bg_color":"#151515","footer_bar_bg_color_opacity":"1","footer_bar_font_color":"#5c5c5c","footer_bar_link_color":"#5c5c5c","footer_bar_hover_color":"#ad1457","blog_title_background_color":"#f1f1f1","blog_title_color":"dark","blog_description_color":"dark","page_title_background_color":"#f1f1f1","page_title_color":"dark","page_description_color":"dark","page_anchor_menu_background_color":"#efefef","page_anchor_menu_text_color":"#6e6e6e","page_anchor_menu_text_hover_color":"#ad1457","page_anchor_menu_background_hover_color":"#efefef","page_anchor_menu_border_color":"#e5e5e5","portfolio_title_background_color":"#f1f1f1","portfolio_title_color":"dark","portfolio_description_color":"dark"}';


			//Standard Fonts
			$eut_std_fonts = array(
				"Arial, Helvetica, sans-serif"                         => "Arial, Helvetica, sans-serif",
				"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif",
				"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif",
				"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive",
				"Courier, monospace"                                   => "Courier, monospace",
				"Garamond, serif"                                      => "Garamond, serif",
				"Georgia, serif"                                       => "Georgia, serif",
				"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif",
				"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace",
				"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
				"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif",
				"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif",
				"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
				"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif",
				"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif",
				"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif",
				"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif",
			);
			$eut_std_fonts = apply_filters( 'eut_std_fonts', $eut_std_fonts );

			$gmap_api_key_link = '<a href="//developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">' . esc_html__( 'Generate Google Map API Key', 'corpus' ) . '</a>';
			$regenerate_link = '<a href="//wordpress.org/plugins/regenerate-thumbnails/" target="_blank">' . esc_html__( 'regenerate your thumbnails', 'corpus' ) . '</a>';

			// ACTUAL DECLARATION OF SECTIONS

			$this->sections[] = array(
				'icon' => 'el-icon-cogs',
				'title' => __( 'General Settings', 'corpus' ),
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'theme_layout',
						'type' => 'select',
						'title' => __( 'Theme Layout', 'corpus' ),
						'subtitle' => __( 'Select the theme layout.', 'corpus' ),
						'options' => $eut_theme_layout_selection,
						'default' => 'stretched',
						'validate' => 'not_empty',
					),
					array(
						'id'       => 'content_background',
						'type'     => 'background',
						'title'    => __( 'Theme Background', 'corpus' ),
						'subtitle' => __( 'Select a background for the theme.', 'corpus' ),
						'transparent' => false,
						'background-color' => true,
						'background-repeat' => true,
						'background-attachment' => true,
						'background-clip' => false,
						'background-size' => true,
						'output'    => '#eut-body',
						'default' => array (
							'background-color' => '#ffffff',
						),
					),
					array(
						'id'=>'theme_loader',
						'type' => 'switch',
						'title' => __( 'Theme Loader', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable Theme Loader.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'back_to_top_enabled',
						'type' => 'switch',
						'title' => __( 'Back to Top', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable the Back to Top button.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'sidearea_enabled',
						'type' => 'switch',
						'title' => __( 'Smart Button Side Area', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable Side Area.', 'corpus' ),
						'subtitle'=> __( 'Content is configured under: Appearance - Widgets - Side Area Sidebar.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'replace_admin_logo',
						'type' => 'checkbox',
						'title' => __( 'Replace Admin Logo', 'corpus' ),
						'subtitle'=> __( 'Select if you want to replace admin logo with company logo.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id'       => 'admin_logo',
						'type'     => 'media',
						'title' => __( 'Admin Logo', 'corpus' ),
						'subtitle' => __( 'Select the image for your company logo. ( If empty, Logo Default will be used instead )', 'corpus' ),
						'required' => array( 'replace_admin_logo', 'equals', '1' ),
					),
					array(
						'id' => 'admin_logo_height',
						'type' => 'text',
						'default' => '84',
						'title' => __( 'Admin Logo Height', 'corpus' ),
						'subtitle' => __( 'Enter the company logo height in px (Default is 84).', 'corpus' ),
						'validate' => 'numeric',
						'required' => array( 'replace_admin_logo', 'equals', '1' ),
					),
					array(
						'id' => 'tracking_code',
						'type' => 'text',
						'title' => __( 'Tracking ID', 'corpus' ),
						'subtitle' => __( 'Type your Google Analytics Tracking ID e.g: UA-XXXXXXXX-X.', 'corpus' ),
						'default' => ''
					),
					array(
						'id'=>'tracking_analytics',
						'type' => 'button_set',
						'title' => __( 'Analytics Web Tracking', 'corpus' ),
						'subtitle'=> __( 'Select your Google Analytics Web Tracking Library.', 'corpus' ),
						'options' => array(
							'classic' => __( 'Classic', 'corpus' ),
							'universal' => __( 'Universal', 'corpus' ),
						),
						'default' => 'classic',
					),
					array(
						'id' => 'tracking_code_custom',
						'type' => 'ace_editor',
						'mode' => 'html',
						'theme' => 'chrome',
						'title' => esc_html__( 'Tracking Code', 'corpus' ),
						'subtitle' => esc_html__( 'Copy and paste your tracking code here.', 'corpus' ),
						'desc' => '',
						'default' => ''
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Top Bar Options', 'corpus' ),
				'header' => '',
				'desc' => '',
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-arrow-up',
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'=>'top_bar_enabled',
						'type' => 'switch',
						'title' => __( 'Top Bar Area', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable TopBar Area to show above your header.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'top_bar_height',
						'type' => 'text',
						'default' => '40',
						'title' => __( 'Top Bar Height', 'corpus' ),
						'subtitle' => __( 'Enter the Top Bar height in px (Default is 50).', 'corpus' ),
						'validate' => 'numeric',
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'top_bar_section_type',
						'type' => 'select',
						'title' => __( 'Top Bar Full Width', 'corpus' ),
						'subtitle'=> __( 'Select if you like a full-width Top Bar Area.', 'corpus' ),
						'options' => array(
							'fullwidth-background' => __( 'No', 'corpus' ),
							'fullwidth-element' => __( 'Yes', 'corpus' ),
						),
						'default' => 'fullwidth-background',
						'validate' => 'not_empty',
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id'   => 'info_top_bar_left',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Left Top Bar Area', 'corpus' ),
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'top_bar_left_enabled',
						'type' => 'switch',
						'title' => __( 'Left Area', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable the Left TopBar Area.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'top_bar_left_options',
						'type' => 'checkbox',
						'title' => __( 'Left Area Elements', 'corpus' ),
						'subtitle' => __( 'Enable / Disable the elements you like to show in the Left TopBar Area.', 'corpus' ),
						'options' => $eut_top_bar_options,
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_left_enabled', 'equals', '1' ),
						),
					),
					array(
						'id' => 'top_bar_left_text',
						'type' => 'text',
						'title' => __( 'Left Area Text', 'corpus' ),
						'subtitle' => __( 'Place the text you wish for your Left TopBar Area.', 'corpus' ),
						'default' => '',
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_left_enabled', 'equals', '1' ),
						),
					),
					array(
						'id'=>'top_bar_left_social_visibility',
						'type' => 'switch',
						'title' => __( 'Left Area Social Icons Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable and add social icons for the Left TopBar Area.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_left_enabled', 'equals', '1' ),
						),
					),
					array(
						'id' => 'top_bar_left_social_options',
						'type' => 'checkbox',
						'title' => __( 'Left Area Social Icons', 'corpus' ),
						'subtitle' => __( 'Select your social icons.', 'corpus' ),
						'desc' => '',
						'label' => true,
						'options' => $eut_social_options,
						'class' => 'eut-redux-columns',
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_left_enabled', 'equals', '1' ),
							array( 'top_bar_left_social_visibility', 'equals', '1' ),
						),
					),
					array(
						'id'   => 'info_top_bar_right',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Right Top Bar Area', 'corpus' ),
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'top_bar_right_enabled',
						'type' => 'switch',
						'title' => __( 'Right Area', 'corpus' ),
						'subtitle'=> __( 'Enable or Disable the Right TopBar Area.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array( 'top_bar_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'top_bar_right_options',
						'type' => 'checkbox',
						'title' => __( 'Right Area Elements', 'corpus' ),
						'subtitle' => __( 'Enable / Disable the elements you like to show in the Right TopBar Area.', 'corpus' ),
						'options' => $eut_top_bar_options,
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_right_enabled', 'equals', '1' ),
						),
					),
					array(
						'id' => 'top_bar_right_text',
						'type' => 'text',
						'title' => __( 'Right Area Text', 'corpus' ),
						'subtitle' => __( 'Place the text you wish for your Right TopBar Area.', 'corpus' ),
						'default' => '',
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_right_enabled', 'equals', '1' ),
						),
					),
					array(
						'id'=>'top_bar_right_social_visibility',
						'type' => 'switch',
						'title' => __( 'Right Area Social Icons Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable and add social icons for the Right TopBar Area.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_right_enabled', 'equals', '1' ),
						),
					),
					array(
						'id' => 'top_bar_right_social_options',
						'type' => 'checkbox',
						'title' => __( 'Right Area Social Icons', 'corpus' ),
						'subtitle' => __( 'Select your social icons.', 'corpus' ),
						'desc' => '',
						'label' => true,
						'options' => $eut_social_options,
						'class' => 'eut-redux-columns',
						'required' => array(
							array( 'top_bar_enabled', 'equals', '1' ),
							array( 'top_bar_right_enabled', 'equals', '1' ),
							array( 'top_bar_right_social_visibility', 'equals', '1' ),
						),
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Header Options', 'corpus' ),
				'header' => '',
				'desc' => '',
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-screen',
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'header_fullwidth',
						'type' => 'checkbox',
						'title' => __( 'Full Width', 'corpus' ),
						'subtitle'=> __( 'Select if you want to show your header full width or inside the container.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id' => 'header_height',
						'type' => 'text',
						'default' => '80',
						'title' => __( 'Header Height', 'corpus' ),
						'subtitle' => __( 'Enter Header height in px (Default is 90).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id'   => 'info_default_logo_options',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Logo options for the Default Header', 'corpus' ),
					),
					array(
						'id' => 'logo',
						'url' => true,
						'type' => 'media',
						'title' => __( 'Logo', 'corpus' ),
						'read-only' => false,
						'default' => array( 'url' => get_template_directory_uri() .'/images/logos/logo-default.png', 'width' => '280', 'height' => '70' ),
						'subtitle' => __( 'Upload your logo here.', 'corpus' ),
					),
					array(
						'id' => 'logo_height',
						'type' => 'text',
						'default' => '30',
						'title' => __( 'Logo Height', 'corpus' ),
						'subtitle' => __( 'Enter logo height in px (Default is 30).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id' => 'logo_align',
						'type' => 'select',
						'title' => __( 'Logo Alignment', 'corpus' ),
						'subtitle' => __( 'Select the position of your logo.', 'corpus' ),
						'options' => $eut_align_selection,
						'default' => 'left',
						'validate' => 'not_empty',
					),
					array(
						'id'   => 'info_menu_options',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Menu options for the Default Header', 'corpus' ),
					),
					array(
						'id' => 'menu_type',
						'type' => 'select',
						'title' => __( 'Menu Type', 'corpus' ),
						'subtitle'=> __( 'Select the type of the default Menu.', 'corpus' ),
						'options' => array(
							'simply' => __( 'Simple', 'corpus' ),
							'hidden' => __( 'Hidden', 'corpus' ),
						),
						'default' => 'simply',
					),
					array(
						'id' => 'menu_align',
						'type' => 'select',
						'title' => __( 'Menu Alignment', 'corpus' ),
						'subtitle' => __( 'Select the position of your menu.', 'corpus' ),
						'options' => $eut_align_selection_extra,
						'default' => 'right',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'submenu_pointer',
						'type' => 'select',
						'title' => __( 'Sub Menu Pointer', 'corpus' ),
						'subtitle'=> __( 'Choose pointer for the submenu.', 'corpus' ),
						'options' => $eut_menu_pointers,
						'default' => 'none',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'submenu_animation',
						'type' => 'select',
						'title' => __( 'Sub Menu Animation', 'corpus' ),
						'subtitle'=> __( 'Choose animation effect for the submenu.', 'corpus' ),
						'options' => $eut_menu_animations,
						'default' => 'none',
						'validate' => 'not_empty',
					),
					array(
						'id'   => 'info_menu_elements',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Menu Elements options for the Default Header', 'corpus' ),
					),
					array(
						'id'=>'header_menu_options_enabled',
						'type' => 'switch',
						'title' => __( 'Menu Elements', 'corpus' ),
						'subtitle'=> __( 'Enable or disable the use of various elements in your header like socials, search, language selector.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'header_menu_options',
						'type' => 'checkbox',
						'title' => __( 'Menu Elements Options', 'corpus' ),
						'subtitle' => __( 'Enable / Disable various menu elements options.', 'corpus' ),
						'options' => $eut_header_menu_options,
						'required' => array( 'header_menu_options_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'header_menu_social_visibility',
						'type' => 'switch',
						'title' => __( 'Menu Social Icons Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable and add social icons in your header.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array( 'header_menu_options_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'header_menu_social_options',
						'type' => 'checkbox',
						'title' => __( 'Menu Social Icons', 'corpus' ),
						'subtitle' => __( 'Select the social icons.', 'corpus' ),
						'desc' => '',
						'label' => true,
						'options' => $eut_social_options,
						'class' => 'eut-redux-columns',
						'required' => array(
							array( 'header_menu_options_enabled', 'equals', '1' ),
							array( 'header_menu_social_visibility', 'equals', '1' ),
						),
					),
					array(
						'id' => 'header_menu_options_align',
						'type' => 'select',
						'title' => __( 'Various Elements Alignment', 'corpus' ),
						'subtitle' => __( 'Set the alignment of your header elements.', 'corpus' ),
						'options' => $eut_align_selection,
						'default' => 'right',
						'validate' => 'not_empty',
						'required' => array( 'header_menu_options_enabled', 'equals', '1' ),
					),
					array(
						'id'   => 'info_responsive_menu_options',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Responsive Menu options for the Default Header', 'corpus' ),
					),
					array(
						'id' => 'menu_responsive_toggle_selection',
						'type' => 'select',
						'title' => __( 'Responsive Menu Toggle Button Selection', 'corpus' ),
						'subtitle' => __( 'Select the toggle button content for your responsive menu.', 'corpus' ),
						'options' => $eut_menu_responsibe_toggle_selection,
						'default' => 'icon',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'menu_responsive_toggle_text',
						'type' => 'text',
						'title' => __( 'Responsive Menu Text', 'corpus' ),
						'subtitle' => __( 'Enter the text for your responsive menu.', 'corpus' ),
						'default' => 'Menu',
						'required' => array( 'menu_responsive_toggle_selection', 'equals', 'text' ),
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Sticky Header Options', 'corpus' ),
				'header' => '',
				'desc' => '',
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-screen',
				'submenu' => true,
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id'=>'header_sticky_enabled',
						'type' => 'switch',
						'title' => __( 'Sticky Header', 'corpus' ),
						'subtitle'=> __( 'Enable the Sticky Header when scrolling down the page.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'header_sticky_type',
						'type' => 'select',
						'title' => __( 'Sticky Header Type', 'corpus' ),
						'subtitle'=> __( 'Select the type for the Sticky Header.', 'corpus' ),
						'options' => array(
							'simply' => __( 'Simple', 'corpus' ),
							'advanced' => __( 'Advanced', 'corpus' ),
							'shrink' => __( 'Shrink', 'corpus' ),
						),
						'default' => 'simply',
						'validate' => 'not_empty',
						'required' => array( 'header_sticky_enabled', 'equals', '1' ),
					),
					array(
						'id'   => 'info_logo_sticky',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Logo Settings for the Sticky Header', 'corpus' ),
						'required' => array( 'header_sticky_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'logo_sticky',
						'url'=> true,
						'type' => 'media',
						'title' => __( 'Logo Sticky Header', 'corpus' ),
						'read-only' => false,
						'default' => array( 'url' => get_template_directory_uri() .'/images/logos/logo-sticky.png', 'width' => '280', 'height' => '70' ),
						'subtitle' => __( 'Upload your logo for the Sticky Header.', 'corpus' ),
						'required' => array( 'header_sticky_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'header_device_sticky_enabled',
						'type' => 'switch',
						'title' => __( 'Devices Sticky Header', 'corpus' ),
						'subtitle'=> __( 'Enable the Sticky Header on small devices ( Tablet Portrait and Mobiles ).', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Light Header Options', 'corpus' ),
				'header' => '',
				'desc' => __( 'Notice that, there is no need to use the Light Header if you do not intend to integrate the Feature Section with the Header in pages and single portfolio items (where Corpus provides the Feature Section).', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-screen',
				'submenu' => true,
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id'   => 'info_logo_light',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Logo Settings for the Light Header', 'corpus' ),
					),
					array(
						'id' => 'logo_light',
						'url'=> true,
						'type' => 'media',
						'title' => __( 'Logo', 'corpus' ),
						'read-only' => false,
						'default' => array( 'url' => get_template_directory_uri() .'/images/logos/logo-light.png', 'width' => '280', 'height' => '70' ),
						'subtitle' => __( 'Upload your logo for the Light Header.', 'corpus' ),
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Dark Header Options', 'corpus' ),
				'header' => '',
				'desc' =>  __( 'Notice that, there is no need to use the Dark Header if you do not intend to integrate the Feature Section with the Header in pages and single portfolio items (where Corpus provides the Feature Section).', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-screen',
				'submenu' => true,
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id'   => 'info_logo_dark',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Logo Settings for the Dark Header', 'corpus' ),
					),
					array(
						'id' => 'logo_dark',
						'url' => true,
						'type' => 'media',
						'title' => __( 'Logo', 'corpus' ),
						'read-only' => false,
						'default' => array( 'url' => get_template_directory_uri() .'/images/logos/logo-dark.png', 'width' => '280', 'height' => '70' ),
						'subtitle' => __( 'Upload your logo for the Dark Header.', 'corpus' ),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-arrow-down',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Footer Options', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'sticky_footer',
						'type' => 'checkbox',
						'title' => __( 'Sticky Footer', 'corpus' ),
						'subtitle'=> __( 'Select if you want a sticky footer.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id'       => 'footer_background',
						'type'     => 'background',
						'title'    => __( 'Footer Background Image', 'corpus' ),
						'subtitle' => __( 'Select a background image for the footer.', 'corpus' ),
						'background-color' => false,
						'background-repeat' => false,
						'background-attachment' => false,
						'background-clip' => false,
						'background-size' => false,
						'default'  => array(
							'background-position' => 'center center',
						),
					),
					array(
						'id'   => 'info_footer_widgets',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Footer Widgets Settings', 'corpus' ),
					),
					array(
						'id'=>'footer_widgets_visibility',
						'type' => 'switch',
						'title' => __( 'Footer Widgets Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable the Footer Area to show the widget areas of the footer.', 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'footer_widgets_layout',
						'type' => 'image_select',
						'title' => __( 'Footer Column Layout', 'corpus' ),
						'subtitle' => __( 'Select Footer column layout.', 'corpus' ),
						'options' => $eut_footer_column_selection,
						'default' => 'footer-1',
						'required' => array( 'footer_widgets_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'footer_section_type',
						'type' => 'select',
						'title' => __( 'Footer Full Width', 'corpus' ),
						'subtitle'=> __( 'Select Yes if you like a full-width Footer Area.', 'corpus' ),
						'options' => array(
							'fullwidth-background' => __( 'No', 'corpus' ),
							'fullwidth-element' => __( 'Yes', 'corpus' ),
						),
						'default' => 'fullwidth-background',
						'validate' => 'not_empty',
						'required' => array( 'footer_widgets_visibility', 'equals', '1' ),
					),
					array(
						'id'             => 'footer_widgets_spacing',
						'type'           => 'spacing',
						'output'         => array('#eut-footer-area'),
						'mode'           => 'padding',
						'units'          => 'px',
						'units_extended' => 'false',
						'left'           => 'false',
						'right'          => 'false',
						'title'          => __( 'Spacing', 'corpus' ),
						'subtitle'       => __( 'Set the spacing of Footer Area.', 'corpus' ),
						'desc'           => __( 'Set spacing Top, Bottom in px.', 'corpus'),
						'default'        => array(
							'padding-top'     => '100px',
							'padding-bottom'  => '100px',
							'units'           => 'px',
						),
						'required' => array( 'footer_widgets_visibility', 'equals', '1' ),
					),
					array(
						'id'   => 'info_footer_bar',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Footer Bar Settings', 'corpus' ),
					),
					array(
						'id'=>'footer_bar_visibility',
						'type' => 'switch',
						'title' => __( 'Footer Bar Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable the Footer Bar Area for the copyright, bottom menu and socials.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'footer_bar_section_type',
						'type' => 'select',
						'title' => __( 'Footer Bar Full Width', 'corpus' ),
						'subtitle'=> __( 'Select Yes if you like a full-width Footer Bar Area.', 'corpus' ),
						'options' => array(
							'fullwidth-background' => __( 'No', 'corpus' ),
							'fullwidth-element' => __( 'Yes', 'corpus' ),
						),
						'default' => 'fullwidth-background',
						'validate' => 'not_empty',
						'required' => array( 'footer_bar_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'footer_bar_align_center',
						'type' => 'select',
						'title' => __( 'Footer Bar Center', 'corpus' ),
						'subtitle'=> __( 'Select if the Footer Bar elements will be centered.', 'corpus' ),
						'options' => array(
							'no' => __( 'No', 'corpus' ),
							'yes' => __( 'Yes', 'corpus' ),
						),
						'default' => 'yes',
						'validate' => 'not_empty',
						'required' => array( 'footer_bar_visibility', 'equals', '1' ),
					),
					array(
						'id'             => 'footer_bar_spacing',
						'type'           => 'spacing',
						'output'         => array('#eut-footer-bar'),
						'mode'           => 'padding',
						'units'          => 'px',
						'units_extended' => 'false',
						'left'           => 'false',
						'right'          => 'false',
						'title'          => __( 'Spacing', 'corpus' ),
						'subtitle'       => __( 'Set the spacing of Footer Bar Area.', 'corpus' ),
						'desc'           => __( 'Set spacing Top, Bottom in px.', 'corpus'),
						'default'        => array(
							'padding-top'     => '20px',
							'padding-bottom'  => '20px',
							'units'           => 'px',
						),
						'required' => array( 'footer_bar_visibility', 'equals', '1' ),
					),
					array(
						'id'=>'footer_copyright_visibility',
						'type' => 'switch',
						'title' => __( 'Footer Copyright Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable the Footer Copyright Area. Edit it as you wish.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array( 'footer_bar_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'footer_copyright_text',
						'type' => 'editor',
						'title' => __( 'Copyright Text', 'corpus' ),
						'subtitle' => __( 'Type your copyright text or anything else you want.', 'corpus' ),
						'default' => 'With <i class="eut-color-primary-1 fa fa-heart-o"></i> for WordPress',
						'required' => array(
							array( 'footer_bar_visibility', 'equals', '1' ),
							array( 'footer_copyright_visibility', 'equals', '1' ),
						),
					),
					array(
						'id'=>'second_area_visibility',
						'type' => 'button_set',
						'title' => __( 'Second Footer Area', 'corpus' ),
						'subtitle'=> __( 'This is the second position in the Footer Bar Area. You can easily add the Bottom Menu or socials.', 'corpus' ),
						'options' => array(
							'1' => __( 'Hide', 'corpus' ),
							'2' => __( 'Menu', 'corpus' ),
							'3' => __( 'Socials', 'corpus' ),
						),
						'default' => '1',
						'required' => array( 'footer_bar_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'footer_social_display',
						'type' => 'select',
						'title' => __( 'Footer Social Display', 'corpus' ),
						'subtitle'=> __( 'Select how you want to display your social items.', 'corpus' ),
						'options' => array(
							'text' => __( 'Text', 'corpus' ),
							'icon' => __( 'Icons', 'corpus' ),
						),
						'default' => 'text',
						'validate' => 'not_empty',
						'required' => array(
							array( 'footer_bar_visibility', 'equals', '1' ),
							array( 'second_area_visibility', 'equals', '3' ),
						),
					),
					array(
						'id' => 'footer_social_options',
						'type' => 'checkbox',
						'title' => __( 'Footer Social items', 'corpus' ),
						'subtitle' => __( 'Select your social icons.', 'corpus' ),
						'desc' => '',
						'label' => true,
						'options' => $eut_social_options,
						'class' => 'eut-redux-columns',
						'required' => array(
							array( 'footer_bar_visibility', 'equals', '1' ),
							array( 'second_area_visibility', 'equals', '3' ),
						),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-edit',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Blog Options', 'corpus' ),
				'desc' => __( 'Changes here will affect the settings for the assigned blog page in case you have set a Static Page as blog page in Settings > Reading > Front Page Displays. Also these settings also affect Archives / Categories / Tags overview pages.', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'blog_layout',
						'type' => 'image_select',
						'title' => __( 'Blog Layout', 'corpus' ),
						'subtitle' => __( 'Select the layout for the assigned blog page. Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'right',
					),
					array(
						'id' => 'blog_sidebar',
						'type' => 'select',
						'title' => __( 'Blog Sidebar', 'corpus' ),
						'subtitle' => __( 'Select the sidebar for the assigned blog page.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'blog_sidebar_style',
						'type' => 'select',
						'title' => __( 'Blog Sidebar Style', 'corpus' ),
						'subtitle' => __( 'Select the style for the sidebar of the assigned blog page.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id'=>'blog_title',
						'type' => 'select',
						'title' => __( 'Blog Title', 'corpus' ),
						'subtitle'=> __( 'Select if you want to use the site name and tagline as blog title or hide it.', 'corpus' ),
						'options' => array(
							'sitetitle' => __( 'Site Title / Tagline', 'corpus' ),
							'none' => __( 'None', 'corpus' ),
						),
						'default' => 'sitetitle',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'blog_title_height',
						'type' => 'text',
						'default' => '200',
						'title' => __( 'Blog Title Height', 'corpus' ),
						'subtitle' => __( 'Enter blog title height in px (Default is 200).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id' => 'blog_title_alignment',
						'type' => 'select',
						'title' => __( 'Blog Title Alignment', 'corpus' ),
						'subtitle'=> __( 'Select your alignment for the blog title.', 'corpus' ),
						'options' => array(
							'left' => __( 'Left', 'corpus' ),
							'right' => __( 'Right', 'corpus' ),
							'center' => __( 'Center', 'corpus' ),
						),
						'default' => 'left',
						'validate' => 'not_empty',
					),
					array(
						'id'       => 'blog_title_background',
						'type'     => 'background',
						'title'    => __( 'Blog Title Background Image', 'corpus' ),
						'subtitle' => __( 'Select a background image for the blog title.', 'corpus' ),
						'background-color' => false,
						'background-repeat' => false,
						'background-attachment' => false,
						'background-clip' => false,
						'background-size' => false,
						'default'  => array(
							'background-position' => 'center center',
						),
					),
					array(
						'id'   => 'info_style_blog_settings',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Blog Style and Basic Blog Settings', 'corpus' ),
						'subtitle'=> __( 'Set the style and basic settings for the default blog.', 'corpus' ),
					),
 					array(
						'id' => 'blog_style',
						'type' => 'select',
						'title' => __( 'Blog Style', 'corpus' ),
						'subtitle' => __( 'Select blog style.', 'corpus' ),
						'options' => $eut_blog_style_selection,
						'default' => 'large-media',
					),
					array(
						'id' => 'blog_mode',
						'type' => 'select',
						'title' => __( 'Blog Mode', 'corpus' ),
						'subtitle' => __( 'Select the Blog Mode', 'corpus' ),
						'options' =>array(
							'no-shadow-mode' => __( 'Without Shadow', 'corpus' ),
							'shadow-mode' => __( 'With Shadow', 'corpus' ),
						),
						'default' => 'no-shadow-mode',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_item_spinner',
						'type' => 'select',
						'title' => __( 'Enable Loader', 'corpus' ),
						'subtitle'=> __( 'If selected, this will enable a graphic spinner before load.', 'corpus' ),
						'options' => array(
							'no' => __( 'No', 'corpus' ),
							'yes' => __( 'Yes', 'corpus' ),
						),
						'default' => 'no',
						'validate' => 'not_empty',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_image_mode',
						'type' => 'select',
						'title' => __( 'Blog Image Mode', 'corpus' ),
						'subtitle' => __( 'Select your Blog Image Mode', 'corpus' ),
						'options' => $eut_blog_image_mode_selection,
						'default' => 'auto',
						'required' => array( 'blog_style','!=', 'masonry' ),
					),
					array(
						'id' => 'blog_masonry_image_mode',
						'type' => 'select',
						'title' => __( 'Blog Masonry Image Mode', 'corpus' ),
						'subtitle' => __( 'Select your Blog Masonry Image Mode', 'corpus' ),
						'options' => $eut_blog_masonry_image_mode_selection,
						'default' => 'large',
						'required' => array( 'blog_style','equals', 'masonry' ),
					),
					array(
						'id' => 'blog_image_prio',
						'type' => 'select',
						'title' => __( 'Blog Featured Image Priority', 'corpus' ),
						'subtitle' => __( 'If enabled, Featured image is displayed instead of media element', 'corpus' ),
						'options' => $eut_enable_selection,
						'default' => 'no',
					),
					array(
						'id' => 'blog_columns',
						'type' => 'select',
						'title' => __( 'Blog Columns', 'corpus' ),
						'subtitle' => __( 'Select the Blog Columns', 'corpus' ),
						'options' => $eut_blog_columns_selection,
						'default' => '4',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_columns_tablet_landscape',
						'type' => 'select',
						'title' => __( 'Blog Tablet Landscape Columns', 'corpus' ),
						'subtitle' => __( 'Select responsive column on tablet devices, landscape orientation.', 'corpus' ),
						'options' => $eut_blog_columns_selection,
						'default' => '4',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_columns_tablet_portrait',
						'type' => 'select',
						'title' => __( 'Blog Tablet Portrait Columns', 'corpus' ),
						'subtitle' => __( 'Select responsive column on tablet devices, portrait orientation.', 'corpus' ),
						'options' => $eut_blog_columns_selection,
						'default' => '2',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_columns_mobile',
						'type' => 'select',
						'title' => __( 'Blog Mobile Columns', 'corpus' ),
						'subtitle' => __( 'Select responsive column on mobile devices.', 'corpus' ),
						'options' => $eut_blog_columns_selection_mobile,
						'default' => '1',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_auto_excerpt',
						'type' => 'switch',
						'title' => __( 'Auto Excerpt', 'corpus' ),
						'subtitle'=> __( "Adds automatic excerpt to all posts. If auto excerpt is off, blog will show all content, a desired 'cut-off' can be inserted in each post with more quicktag.", 'corpus' ),
						'default' => '0',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
						'required' => array( 'blog_style', 'equals', 'large-media' ),
					),
					array(
						'id'=>'blog_excerpt_length',
						'type' => 'text',
						'default' => '55',
						'title' => __( 'Excerpt Length', 'corpus' ),
						'subtitle' => __( 'Type how many words you want to display in your post excerpts (Default is 55).', 'corpus' ),
						'validate' => 'numeric',
						'required' => array(
							array( 'blog_auto_excerpt', 'equals', '1' ),
							array( 'blog_style', 'equals', 'large-media' ),
						),
					),
					array(
						'id'=>'blog_excerpt_length_small',
						'type' => 'text',
						'default' => '30',
						'title' => __( 'Excerpt Length', 'corpus' ),
						'subtitle' => __( 'Type how many words you want to display in your post excerpts (Default is 30).', 'corpus' ),
						'validate' => 'numeric',
						'required' => array(
							array( 'blog_style','!=', 'large-media' ),
							array( 'blog_style','!=', 'small-media' ),
						),
					),
					array(
						'id' => 'blog_excerpt_more',
						'type' => 'switch',
						'title' => __( 'Read More', 'corpus' ),
						'subtitle'=> __( "Adds a read more button after the excerpt or more quicktag.", 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'blog_comments_visibility',
						'type' => 'switch',
						'title' => __( 'Comments Visibility', 'corpus' ),
						'subtitle'=> __( 'Easily disable the comments of your blog.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'blog_date_visibility',
						'type' => 'switch',
						'title' => __( 'Date Field Visibility', 'corpus' ),
						'subtitle'=> __( 'Easily disable the date field of your blog.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'blog_author_visibility',
						'type' => 'switch',
						'title' => __( 'Author Field Visibility', 'corpus' ),
						'subtitle'=> __( 'Easily disable the author field of your blog.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Single Post Settings', 'corpus' ),
				'header' => '',
				'desc' => '',
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-edit',
				'submenu' => true,
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id' => 'post_layout',
						'type' => 'image_select',
						'title' => __( 'Post Layout', 'corpus' ),
						'subtitle' => __( 'Select the layout for the single post format. Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'right',
					),
					array(
						'id' => 'post_sidebar',
						'type' => 'select',
						'title' => __( 'Post Sidebar', 'corpus' ),
						'subtitle' => __( 'Select the sidebar for the single posts.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'post_sidebar_style',
						'type' => 'select',
						'title' => __( 'Post Sidebar Style', 'corpus' ),
						'subtitle' => __( 'Select style of your sidebar in single posts.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'blog_social',
						'type' => 'checkbox',
						'title' => __( 'Social Share', 'corpus' ),
						'subtitle' => __( 'Enable / Disable post social shares for the single posts.', 'corpus' ),
						'options' => $eut_blog_social_options,
						'default' => 0,
					),
					array(
						'id' => 'post_feature_image_visibility',
						'type' => 'switch',
						'title' => __( 'Featured Image Visibility (Standard Post)', 'corpus' ),
						'subtitle'=> __( 'Toggle Featured Image on or off.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'post_tag_visibility',
						'type' => 'switch',
						'title' => __( 'Post Tags Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the post tags.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'post_category_visibility',
						'type' => 'switch',
						'title' => __( 'Post Categories Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the post categories.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'post_author_visibility',
						'type' => 'switch',
						'title' => __( 'Author Info Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the Author Info field.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'post_related_visibility',
						'type' => 'switch',
						'title' => __( 'Related Posts Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the visibility of the related posts.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'post_nav_visibility',
						'type' => 'switch',
						'title' => __( 'Posts Navigation Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the visibility of the posts navigation.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'post_nav_same_term',
						'type' => 'checkbox',
						'title' => __( 'Post Navigation Same Term', 'corpus' ),
						'subtitle'=> __( 'If selected, only navigation items from the current taxonomy term will be displayed.', 'corpus' ),
						'default' => 0,
						'required' => array( 'post_nav_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'post_backlink',
						'type' => 'select',
						'title' => __( 'Post Backlink', 'corpus' ),
						'subtitle' => __( 'Select the overview page for your post backlink.', 'corpus' ),
						'data' => 'page',
						'default' => '',
						'required' => array( 'post_nav_visibility', 'equals', '1' ),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-pencil',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Page Options', 'corpus'),
				'subtitle' => __( 'You can find the basic settings for the pages here.', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'page_layout',
						'type' => 'image_select',
						'title' => __( 'Page Layout', 'corpus' ),
						'subtitle' => __( 'Select the layout for the pages. Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'none',
					),
					array(
						'id' => 'page_sidebar',
						'type' => 'select',
						'title' => __( 'Page Sidebar', 'corpus' ),
						'subtitle' => __( 'Select the default sidebar for the pages in case you do not use full width layout.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'page_sidebar_style',
						'type' => 'select',
						'title' => __( 'Page Sidebar Style', 'corpus' ),
						'subtitle' => __( 'Select the style for your sidebar in pages.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id'   => 'info_style_page_title',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Page Title Settings', 'corpus' ),
						'subtitle'=> __( 'Set the style for the default page title.', 'corpus' ),
					),
					array(
						'id' => 'page_title_height',
						'type' => 'text',
						'default' => '200',
						'title' => __( 'Page Title Height', 'corpus' ),
						'subtitle' => __( 'Enter Page title height in px (Default is 200).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id' => 'page_title_alignment',
						'type' => 'select',
						'title' => __( 'Page Title Alignment', 'corpus' ),
						'subtitle'=> __( 'Select your alignment for the default page title.', 'corpus' ),
						'options' => array(
							'left' => __( 'Left', 'corpus' ),
							'right' => __( 'Right', 'corpus' ),
							'center' => __( 'Center', 'corpus' ),
						),
						'default' => 'left',
						'validate' => 'not_empty',
					),
					array(
						'id'       => 'page_title_background',
						'type'     => 'background',
						'title' => __( 'Page Title Background Image', 'corpus' ),
						'subtitle' => __( 'Select a background image for the default page title.', 'corpus' ),
						'background-color' => false,
						'background-repeat' => false,
						'background-attachment' => false,
						'background-clip' => false,
						'background-size' => false,
						'default'  => array(
							'background-position' => 'center center',
						),
					),
					array(
						'id'   => 'info_style_page_anchor_menu',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Anchor Menu Bar Settings', 'corpus' ),
						'subtitle'=> __( 'Define your preferences for the Anchor Menu Bar where you can place a custom sticky menu per page.', 'corpus' ),
					),
					array(
						'id' => 'page_anchor_menu_height',
						'type' => 'text',
						'default' => '70',
						'title' => __( 'Anchor Menu Height', 'corpus' ),
						'subtitle' => __( 'Enter Anchor Menu height in px (Default is 70).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id' => 'page_anchor_menu_highlight_current',
						'type' => 'checkbox',
						'title' => __( 'Highlight current anchor menu', 'corpus' ),
						'subtitle'=> __( 'Select if you want to highlight current anchor menu.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id' => 'page_anchor_menu_incontainer',
						'type' => 'checkbox',
						'title' => __( 'In Container', 'corpus' ),
						'subtitle'=> __( 'Select if you want to show your anchor menu inside the container instead of full width.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id' => 'page_anchor_menu_center',
						'type' => 'checkbox',
						'title' => __( 'Center', 'corpus' ),
						'subtitle'=> __( 'Select if you want to show your anchor menu centered.', 'corpus' ),
						'default' => 0,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-briefcase',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Portfolio Options', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'=>'portfolio_slug',
						'type' => 'text',
						'default' => 'portfolio',
						'title' => __( 'Slug', 'corpus' ),
						'subtitle' => __( "Enter Portfolio Slug (Default is 'portfolio'). If you change it, go to Settings - Permalinks and click on Save Changes.", 'corpus' ),
						'desc' => __( "Slug must not be used anywhere else (e.g: category, page, post).", 'corpus' ),
						'validate' => 'not_empty',
					),
					array(
						'id' => 'portfolio_layout',
						'type' => 'image_select',
						'title' => __( 'Portfolio Layout', 'corpus' ),
						'subtitle' => __( 'Select the default layout for the Portfolio (single portfolio items). Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'none',
					),
					array(
						'id' => 'portfolio_sidebar',
						'type' => 'select',
						'title' => __( 'Portfolio Sidebar', 'corpus' ),
						'subtitle' => __( 'Select the default sidebar for the single portfolio items.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'portfolio_sidebar_style',
						'type' => 'select',
						'title' => __( 'Portfolio Sidebar Style', 'corpus' ),
						'subtitle' => __( 'Select the style for the sidebar in portfolio items.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'portfolio_social',
						'type' => 'checkbox',
						'title' => __( 'Social Share', 'corpus' ),
						'subtitle' => __( 'Enable / Disable the social shares you like in the single portfolio items.', 'corpus' ),
						'options' => $eut_portfolio_social_options,
						'default' => 0,
					),
					array(
						'id' => 'portfolio_details_text',
						'type' => 'text',
						'title' => __( 'Portfolio Details Title', 'corpus' ),
						'subtitle' => __( 'Type text for the Portfolio Details Title.', 'corpus' ),
						'default' => 'Project Details',
					),
					array(
						'id'=>'portfolio_nav_visibility',
						'type' => 'switch',
						'title' => __( 'Portfolio Navigation Visibility', 'corpus' ),
						'subtitle'=> __( 'Enable / Disable the visibility of the portfolio navigation.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id' => 'portfolio_backlink',
						'type' => 'select',
						'title' => __( 'Portfolio Backlink', 'corpus' ),
						'subtitle' => __( 'Select the overview page for your portfolio backlink.', 'corpus' ),
						'data' => 'page',
						'default' => '',
						'required' => array( 'portfolio_nav_visibility', 'equals', '1' ),
					),
					array(
						'id' => 'portfolio_nav_same_term',
						'type' => 'checkbox',
						'title' => __( 'Portfolio Navigation Same Term', 'corpus' ),
						'subtitle'=> __( 'If selected, only navigation items from the current taxonomy term will be displayed.', 'corpus' ),
						'default' => 0,
						'required' => array( 'portfolio_nav_visibility', 'equals', '1' ),
					),
					array(
						'id'=>'portfolio_recents_visibility',
						'type' => 'switch',
						'title' => __( 'Recent Items Visibility', 'corpus' ),
						'subtitle'=> __( 'Easily disable the recent items carousel.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'=>'portfolio_comments_visibility',
						'type' => 'switch',
						'title' => __( 'Comments Visibility', 'corpus' ),
						'subtitle'=> __( 'Easily disable the comments of your portfolio.', 'corpus' ),
						'default' => '1',
						'on' => __( 'On', 'corpus' ),
						'off' => __( 'Off', 'corpus' ),
					),
					array(
						'id'   => 'info_style_portfolio_title',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Portfolio Title Settings', 'corpus' ),
						'subtitle'=> __( 'Set the style for the single default portfolio title.', 'corpus' ),
					),
					array(
						'id' => 'portfolio_title_height',
						'type' => 'text',
						'default' => '200',
						'title' => __( 'Portfolio Title Height', 'corpus' ),
						'subtitle' => __( 'Enter Portfolio title height in px (Default is 200).', 'corpus' ),
						'validate' => 'numeric',
					),
					array(
						'id' => 'portfolio_title_alignment',
						'type' => 'select',
						'title' => __( 'Portfolio Title Alignment', 'corpus' ),
						'subtitle'=> __( 'Select the alignment for the title.', 'corpus' ),
						'options' => array(
							'left' => __( 'Left', 'corpus' ),
							'right' => __( 'Right', 'corpus' ),
							'center' => __( 'Center', 'corpus' ),
						),
						'default' => 'left',
						'validate' => 'not_empty',
					),
					array(
						'id'       => 'portfolio_title_background',
						'type'     => 'background',
						'title'    => __( 'Portfolio Title Background Image', 'corpus' ),
						'subtitle' => __( 'Select a background image for the portfolio title.', 'corpus' ),
						'background-color' => false,
						'background-repeat' => false,
						'background-attachment' => false,
						'background-clip' => false,
						'background-size' => false,
						'default'  => array(
							'background-position' => 'center center',
						),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-shopping-cart',
				'icon_class' => 'el-icon-large',
				'title' => esc_html__( 'WooCommerce Options', 'corpus'),
				'subtitle' => esc_html__( 'You can find the Theme settings for the WooCommerce here.', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'product_tax_layout',
						'type' => 'image_select',
						'compiler' => true,
						'title' => esc_html__( 'Product Taxonomy Layout', 'corpus' ),
						'subtitle' => esc_html__( 'Select the default layout for the Product Taxonomy. Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'none',
					),
					array(
						'id' => 'product_tax_sidebar',
						'type' => 'select',
						'title' => esc_html__( 'Product Taxonomy Sidebar', 'corpus' ),
						'subtitle' => esc_html__( 'Select the default sidebar for the single Product Taxonomy.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'product_tax_sidebar_style',
						'type' => 'select',
						'title' => esc_html__( 'Product Taxonomy Sidebar Style', 'corpus' ),
						'subtitle' => esc_html__( 'Select the style for the sidebar in Product Taxonomy.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id'   => 'info_style_product_overview',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => esc_html__( 'Shop Overview Settings', 'corpus' ),
						'subtitle'=> esc_html__( 'Set the style for the shop overview.', 'corpus' ),
					),
					array(
						'id' => 'product_loop_columns',
						'type' => 'select',
						'options' => array(
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
						),
						'default' => '4',
						'title' => esc_html__( 'Loop Columns', 'corpus' ),
						'subtitle' => esc_html__( 'Select the number of columns (Default is 4).', 'corpus' ),
					),
					array(
						'id' => 'product_loop_shop_per_page',
						'type' => 'text',
						'default' => '12',
						'title' => esc_html__( 'Loop Products per Page', 'corpus' ),
						'subtitle' => esc_html__( 'Select how many products per page you want to show (Default is 12).', 'corpus' ),
						'validate' => 'numeric',
					),
				)
			);

			$this->sections[] = array(
				'title' => esc_html__( 'Single Product Settings', 'corpus' ),
				'header' => '',
				'desc' => esc_html__( 'Define your preferences for the Single Products. Notice that most of them can be overridden when you create a single product.', 'corpus' ),
				'submenu' => true,
				'icon' => 'el-icon-shopping-cart',
				'icon_class' => 'el-icon-large',
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id' => 'product_layout',
						'type' => 'image_select',
						'compiler' => true,
						'title' => esc_html__( 'Product Layout', 'corpus' ),
						'subtitle' => esc_html__( 'Select the layout for the Single Products. Choose among Full Width, Left Sidebar or Right Sidebar.', 'corpus' ),
						'options' => $eut_layout_selection,
						'default' => 'right',
					),
					array(
						'id' => 'product_sidebar',
						'type' => 'select',
						'title' => esc_html__( 'Product Sidebar', 'corpus' ),
						'subtitle' => esc_html__( 'Select the sidebar for the Single Products.', 'corpus' ),
						'data' => 'sidebar',
						'default' => 'eut-default-sidebar',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'product_sidebar_style',
						'type' => 'select',
						'title' => esc_html__( 'Product Sidebar Style', 'corpus' ),
						'subtitle' => esc_html__( 'Select the style for the sidebar in Single Products.', 'corpus' ),
						'options' => $eut_sidebar_style_selection,
						'default' => 'simple',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'product_gallery_mode',
						'type' => 'select',
						'title' => esc_html__( 'Product Gallery Mode', 'corpus' ),
						'subtitle'=> esc_html__( 'Select the mode for the single product gallery', 'corpus' ),
						'options' => array(
							'none' => esc_html__( 'None', 'corpus' ),
							'popup' => esc_html__( 'Magnific Popup', 'corpus' ),
						),
						'default' => 'popup',
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Typography Options', 'corpus' ),
				'header' => '',
				'desc' => '',
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-font',
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'   => 'info_body_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Main Body Fonts', 'corpus' ),
					),
					array(
						'id' => 'body_font',
						'type' => 'typography',
						'title' => __( 'Body Font', 'corpus' ),
						'subtitle' => __( 'Specify the body font properties.', 'corpus' ),
						'google' => true,
						'line-height'=> true,
						'text-align'=> false,
						'letter-spacing' => true,
						'color'=> false,
						'default' => array(
							'font-size' => '16px',
							'font-family' => 'Open Sans',
							'font-weight' => '400',
							'letter-spacing' => '',
							'line-height' => '30px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_logo_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Logo as text Fonts', 'corpus' ),
					),
					array(
						'id' => 'logo_font',
						'type' => 'typography',
						'title' => __( 'Logo Font', 'corpus' ),
						'subtitle' => __( 'Specify the logo font properties.', 'corpus' ),
						'google' => true,
						'line-height'=> false,
						'text-align'=> false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-size' => '18px',
							'font-family' => 'Lato',
							'font-weight' => '700',
							'text-transform' => 'uppercase',
							'letter-spacing' => '',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_menu_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Main Menu Fonts', 'corpus' ),
					),
					array(
						'id' => 'main_menu_font',
						'type' => 'typography',
						'title' => __( 'Menu Font', 'corpus' ),
						'subtitle' => __( 'Specify the menu font properties.', 'corpus' ),
						'google' => true,
						'line-height' => false,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '16px',
							'font-weight' => '700',
							'text-transform' => 'capitalize',
							'letter-spacing' => '1px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'sub_menu_font',
						'type' => 'typography',
						'title' => __( 'Submenu Font', 'corpus' ),
						'subtitle' => __( 'Specify the submenu font properties.', 'corpus' ),
						'google' => true,
						'line-height' => false,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '14px',
							'font-weight' => '700',
							'text-transform' => 'capitalize',
							'letter-spacing' => '',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_headers_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Headers Fonts', 'corpus' ),
					),
					array(
						'id' => 'h1_font',
						'type' => 'typography',
						'title' => __( 'H1 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H1 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '40px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '53px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'h2_font',
						'type' => 'typography',
						'title' => __( 'H2 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H2 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '36px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '46px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'h3_font',
						'type' => 'typography',
						'title' => __( 'H3 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H3 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '30px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '40px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'h4_font',
						'type' => 'typography',
						'title' => __( 'H4 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H4 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '24px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '32px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'h5_font',
						'type' => 'typography',
						'title' => __( 'H5 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H5 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '20px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '26px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'h6_font',
						'type' => 'typography',
						'title' => __( 'H6 Font', 'corpus' ),
						'subtitle' => __( 'Specify the H6 font.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '18px',
							'font-weight' => '700',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '24px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_page_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Page/Blog Typography', 'corpus' ),
					),
					array(
						'id' => 'page_title',
						'type' => 'typography',
						'title' => __( 'Page Title', 'corpus' ),
						'subtitle' => __( 'Specify the font for the default page titles.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '30px',
							'font-weight' => '900',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '40px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'page_description',
						'type' => 'typography',
						'title' => __( 'Page Description', 'corpus' ),
						'subtitle' => __( 'Specify font for the page description.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '20px',
							'font-weight' => '400',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '26px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_post_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Single Post Typography', 'corpus' ),
					),
					array(
						'id' => 'post_title',
						'type' => 'typography',
						'title' => __( 'Single Post Title', 'corpus' ),
						'subtitle' => __( 'Specify the font for the single post titles.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '30px',
							'font-weight' => '900',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '40px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_portfolio_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Portfolio Typography', 'corpus' ),
					),
					array(
						'id' => 'portfolio_title',
						'type' => 'typography',
						'title' => __( 'Portfolio Title', 'corpus' ),
						'subtitle' => __( 'Specify the font for the default single portfolio titles.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '30px',
							'font-weight' => '900',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '40px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'portfolio_description',
						'type' => 'typography',
						'title' => __( 'Portfolio Description', 'corpus' ),
						'subtitle' => __( 'Specify the font for the default single portfolio description.', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '20px',
							'font-weight' => '400',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '26px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_feature_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Feature Section Typography', 'corpus' ),
					),
					array(
						'id' => 'custom_title',
						'type' => 'typography',
						'title' => __( 'Custom Title', 'corpus' ),
						'subtitle' => __( 'Specify the font for the custom title in the feature section. (Custom Title, Custom Size Slider Title)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '64px',
							'font-weight' => '900',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '72px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'custom_description',
						'type' => 'typography',
						'title' => __( 'Custom Description', 'corpus' ),
						'subtitle' => __( 'Specify the font for the custom description in the feature section. (Custom Description, Custom Size Slider Description)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '36px',
							'font-weight' => '400',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '40px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'fullscreen_custom_title',
						'type' => 'typography',
						'title' => __( 'Custom Title for Fullscreen Section', 'corpus' ),
						'subtitle' => __( 'Specify the font for the custom title in the feature section in case you use full screen mode. (Custom Title, Custom Size Slider Title)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '90px',
							'font-weight' => '900',
							'text-transform' => 'none',
							'letter-spacing' => '',
							'line-height' => '96px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'fullscreen_custom_description',
						'type' => 'typography',
						'title' => __( 'Custom Description for Fullscreen Section', 'corpus' ),
						'subtitle' => __( 'Specify the font for the custom description in the feature section in case you use full screen mode. (Custom Description, Custom Size Slider Description)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '40px',
							'font-weight' => '400',
							'text-transform' => 'none',
							'font-style' => '',
							'letter-spacing' => '',
							'line-height' => '46px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id'   => 'info_special_typography',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Special Text Typography', 'corpus' ),
					),
					array(
						'id' => 'leader_text',
						'type' => 'typography',
						'title' => __( 'Leader Text', 'corpus' ),
						'subtitle' => __( 'Specify the style for the leader text.  This is used in various elements (Text block, Testimonial...)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Open Sans',
							'font-size' => '24px',
							'font-weight' => '300',
							'text-transform' => '',
							'letter-spacing' => '',
							'line-height' => '38px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'subtitle_text',
						'type' => 'typography',
						'title' => __( 'Subtitle Text', 'corpus' ),
						'subtitle' => __( 'Specify the style for the subtitle text.  This is used in various elements (Slogan Subtitle...)', 'corpus' ),
						'google' => true,
						'line-height' => true,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Lato',
							'font-size' => '14px',
							'font-weight' => '400',
							'text-transform' => '',
							'letter-spacing' => '0.5px',
							'line-height' => '24px',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'small_text',
						'type' => 'typography',
						'title' => __( 'Small Text', 'corpus' ),
						'subtitle' => __( 'Specify the style for the small text. This is used in various elements (Tags, Post Meta...)', 'corpus' ),
						'google' => true,
						'line-height' => false,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Open Sans',
							'font-size' => '13px',
							'font-weight' => '400',
							'text-transform' => '',
							'letter-spacing' => '',
						),
						'fonts' => $eut_std_fonts,
					),
					array(
						'id' => 'link_text',
						'type' => 'typography',
						'title' => __( 'Link Text', 'corpus' ),
						'subtitle' => __( 'Specify the style for the link text. This is used in various elements (Buttons, Read More...)', 'corpus' ),
						'google' => true,
						'line-height' => false,
						'text-align' => false,
						'letter-spacing' => true,
						'color'=> false,
						'text-transform' => true,
						'default' => array(
							'font-family' => 'Open Sans',
							'font-size' => '13px',
							'font-weight' => '600',
							'text-transform' => 'uppercase',
							'letter-spacing' => '0.5px',
						),
						'fonts' => $eut_std_fonts,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-file-edit',
				'icon_class' => 'el-icon-large',
				'title' => __( 'CSS / JS Options', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'   => 'info_style_css_code',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'CSS', 'corpus' ),
					),
					array(
						'id' => 'css_code',
						'type' => 'ace_editor',
						'title' => __( 'CSS Code', 'corpus' ),
						'subtitle' => __( 'Paste your CSS code here.', 'corpus' ),
						'mode' => 'css',
						'theme' => 'monokai',
						'desc' => '',
						'default' => ''
					),
					array(
						'id'   => 'info_style_js_code',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'JS', 'corpus' ),
					),
					array(
						'id' => 'custom_js',
						'type' => 'ace_editor',
						'mode' => 'javascript',
						'theme' => 'chrome',
						'title' => __( 'JS Code', 'corpus' ),
						'subtitle' => __( 'Add your custom JavaScript code here. Please do not include any script tags.', 'corpus' ),
						'desc' => '',
						'default' => ''
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Style Options', 'corpus' ),
				'desc' => sprintf( __('To customize the color scheme, please use the <a href="%s">Live Color Customizer</a>.', 'corpus'), admin_url('/customize.php') ),
				'customizer' => false,
				'fields' => array(
					array(
						'id'    => 'info_style_color_preset',
						'type'  => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'Skin Presets', 'corpus' ),
					),
					array(
						'id'        => 'skin_preset',
						'type'      => 'image_select',
						'presets'   => true,
						'title'     => __( 'Select your Skin', 'corpus' ),
						'default'   => 0,
						'subtitle'  => __( 'The presets are created based on the content of the demos. However, you can use them as you wish in order to customize your color scheme.', 'corpus' ),
						'options'   => array(
							'palette-1'  => array('img' => get_template_directory_uri() . '/includes/images/skins/palette-1.png', 'presets' => $eut_skin_palette_1 ),
							'palette-2'  => array('img' => get_template_directory_uri() . '/includes/images/skins/palette-2.png', 'presets' => $eut_skin_palette_2 ),
							'palette-3'  => array('img' => get_template_directory_uri() . '/includes/images/skins/palette-3.png', 'presets' => $eut_skin_palette_3 ),
							'palette-4'  => array('img' => get_template_directory_uri() . '/includes/images/skins/palette-4.png', 'presets' => $eut_skin_palette_4 ),
							'palette-5'  => array('img' => get_template_directory_uri() . '/includes/images/skins/palette-5.png', 'presets' => $eut_skin_palette_5 ),
						),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Colors - Top Bar', 'corpus' ),
				'desc' => __( 'Set your color preferences for the TopBar (you will see the changes in the live preview only if TopBar is enabled).', 'corpus' ),
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Top Bar Color Settings
					array(
						'id'          => 'top_bar_bg_color',
						'type'        => 'color',
						'title'       => __( 'Top Bar Background Color', 'corpus' ),
						'subtitle'    => __( 'Background color for your Top Bar.', 'corpus' ),
						'default'     => '#303030',
						'transparent' => false,
					),
					array(
						'id'          => 'top_bar_font_color',
						'type'        => 'color',
						'title'       => __( 'Top Bar Font Color', 'corpus' ),
						'subtitle'    => __( 'Font color for your Top Bar.', 'corpus' ),
						'default'     => '#c9c9c9',
						'transparent' => false,
					),
					array(
						'id'          => 'top_bar_link_color',
						'type'        => 'color',
						'title'       => __( 'Top Bar Link Color', 'corpus' ),
						'subtitle'    => __( 'Link color for your Top Bar.', 'corpus' ),
						'default'     => '#c9c9c9',
						'transparent' => false,
					),
					array(
						'id'          => 'top_bar_hover_color',
						'type'        => 'color',
						'title'       => __( 'Top Bar Hover Color', 'corpus' ),
						'subtitle'    => __( 'Hover color for your Top Bar.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'          => 'top_bar_border_color',
						'type'        => 'color',
						'title'       => __( 'Border Color', 'corpus' ),
						'subtitle'    => __( 'Border color for your Top Bar.', 'corpus' ),
						'default'     => '#4f4f4f',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Colors - Default Header', 'corpus' ),
				'desc' => __( 'Set your color preferences for the Default Header. Keep in mind that the basic settings for the Default Header are in Theme Options > Header Options.', 'corpus' ),
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Default Header Color Settings
					array(
						'id'       => 'header_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle' => __( 'Pick a background color for the header.', 'corpus' ),
						'default'  => '#ffffff',
						'transparent' => false,
					),
					array(
						'id' => 'header_background_color_opacity',
						'type' => 'select',
						'title' => __('Background Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the background of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '1',
					),
					array(
						'id'          => 'header_border_color',
						'type'        => 'color',
						'title'       => __( 'Header Border Color', 'corpus' ),
						'subtitle'    => __( 'Pick a border color for the header.', 'corpus' ),
						'default'     => '#e0e0e0',
						'transparent' => false,
					),
					array(
						'id' => 'header_border_color_opacity',
						'type' => 'select',
						'title' => __('Border Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the border of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '1',
					),
					//Menu Color Settings
					array(
						'id'          => 'menu_text_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu text.', 'corpus' ),
						'default'     => '#757575',
						'transparent' => false,
					),
					array(
						'id'          => 'menu_text_hover_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Hover Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the hover menu text.', 'corpus' ),
						'default'     => '#bdbdbd',
						'transparent' => false,
					),
					array(
						'id'          => 'menu_line_color',
						'type'        => 'color',
						'title'       => __( 'Menu Line Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu line.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_bg_color',
						'type'        => 'color',
						'title'       => __( 'Sub Menu Background Color', 'corpus' ),
						'subtitle'    => __( 'Pick a background color for the sub menu.', 'corpus' ),
						'default'     => '#1c1c1c',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_text_color',
						'type'        => 'color',
						'title'       => __( 'Sub Menu Text Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the sub menu text.', 'corpus' ),
						'default'     => '#8e8e8e',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_text_hover_color',
						'type'        => 'color',
						'title'       => __( 'Sub Menu Text Hover Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the hover sub menu text.', 'corpus' ),
						'default'     => '#e0e0e0',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_title_color',
						'type'        => 'color',
						'title'       => __( 'Title Color for Mega Menu', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the titles of the mega menu columns.', 'corpus' ),
						'default'     => '#ffffff',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_active_bg_color',
						'type'        => 'color',
						'title'       => __( 'Sub Menu Active Background Color', 'corpus' ),
						'subtitle'    => __( 'Pick a background color for the active sub menu.', 'corpus' ),
						'default'     => '#151515',
						'transparent' => false,
					),
					array(
						'id'          => 'submenu_border_color',
						'type'        => 'color',
						'title'       => __( 'Sub Menu Border Color', 'corpus' ),
						'subtitle'    => __( 'Pick a border color for the sub menu.', 'corpus' ),
						'default'     => '#383838',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Colors - Sticky Header', 'corpus' ),
				'desc' => __( 'Set your color preferences for the Sticky Header. You can enable/disable, select the type and logo for the sticky header in Theme Options > Header Options > Sticky Header Options.', 'corpus' ),
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Sticky Header Color Settings
					array(
						'id'       => 'header_sticky_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle'    => __( 'Pick a background color for the header.', 'corpus' ),
						'default'  => '#ffffff',
						'transparent' => false,
					),
					array(
						'id' => 'header_sticky_background_color_opacity',
						'type' => 'select',
						'title' => __('Background Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the background of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '0.95',
					),
					array(
						'id'          => 'header_sticky_border_color',
						'type'        => 'color',
						'title'       => __( 'Header Border Color', 'corpus' ),
						'subtitle'    => __( 'Pick a border color for the header.', 'corpus' ),
						'default'     => '#000000',
						'transparent' => false,
					),
					array(
						'id' => 'header_sticky_border_color_opacity',
						'type' => 'select',
						'title' => __('Border Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the border of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '0.10',
					),
					//Menu Color Settings
					array(
						'id'          => 'sticky_menu_text_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu text.', 'corpus' ),
						'default'     => '#757575',
						'transparent' => false,
					),
					array(
						'id'          => 'sticky_menu_text_hover_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Hover Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the hover menu text.', 'corpus' ),
						'default'     => '#bdbdbd',
						'transparent' => false,
					),
					array(
						'id'          => 'sticky_menu_line_color',
						'type'        => 'color',
						'title'       => __( 'Menu Line Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu line.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Colors - Light Header', 'corpus' ),
				'desc' => __( 'Notice that, there is no need to style the Light Header if you do not intend to integrate the Feature Section with the Header in pages and single portfolio items (where Corpus provides the Feature Section). Upload logo for the Light Header in Theme Options > Header Options > Light Header Options.', 'corpus' ),
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Menu Color Settings
					array(
						'id'          => 'light_menu_text_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu text.', 'corpus' ),
						'default'     => '#e0e0e0',
						'transparent' => false,
					),
					array(
						'id'          => 'light_menu_text_hover_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Hover Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the hover menu text.', 'corpus' ),
						'default'     => '#ffffff',
						'transparent' => false,
					),
					array(
						'id'          => 'light_menu_line_color',
						'type'        => 'color',
						'title'       => __( 'Menu Line Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu line.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'          => 'header_light_border_color',
						'type'        => 'color',
						'title'       => __( 'Header Border Color', 'corpus' ),
						'subtitle'    => __( 'Pick a border color for the header.', 'corpus' ),
						'default'     => '#ffffff',
						'transparent' => false,
					),
					array(
						'id' => 'header_light_border_color_opacity',
						'type' => 'select',
						'title' => __('Border Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the border of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '0.30',
					),
				)
			);
			$this->sections[] = array(
				'icon' => 'el-icon-brush',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Colors - Dark Header', 'corpus' ),
				'desc' => __( 'Notice that, there is no need to style the Dark Header if you do not intend to integrate the Feature Section with the Header in pages and single portfolio items (where Corpus provides the Feature Section). Upload logo for the Dark Header in Theme Options > Header Options > Dark Header Options.', 'corpus' ),
				'submenu' => false,
				'eut_colors' => true,
				'panel' => false,
				'subsection' => false,
				'fields' => array(
					//Menu Color Settings
					array(
						'id'          => 'dark_menu_text_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu text.', 'corpus' ),
						'default'     => '#212121',
						'transparent' => false,
					),
					array(
						'id'          => 'dark_menu_text_hover_color',
						'type'        => 'color',
						'title'       => __( 'Menu Text Hover Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the hover menu text.', 'corpus' ),
						'default'     => '#000000',
						'transparent' => false,
					),
					array(
						'id'          => 'dark_menu_line_color',
						'type'        => 'color',
						'title'       => __( 'Menu Line Color', 'corpus' ),
						'subtitle'    => __( 'Pick a color for the menu line.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'          => 'header_dark_border_color',
						'type'        => 'color',
						'title'       => __( 'Header Border Color', 'corpus' ),
						'subtitle'    => __( 'Pick a border color for the header.', 'corpus' ),
						'default'     => '#000000',
						'transparent' => false,
					),
					array(
						'id' => 'header_dark_border_color_opacity',
						'type' => 'select',
						'title' => __('Border Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for the border of the header.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '0.10',
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Main Content', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set your color preferences for the main content area of your site.', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					array(
						'id'       => 'theme_body_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle'    => __( 'Pick a background color.', 'corpus' ),
						'default'  => '#ffffff',
						'transparent' => false,
					),
					array(
						'id'       => 'body_heading_color',
						'type'     => 'color',
						'title'    => __( 'Headings Text Color (h1-h6)', 'corpus' ),
						'subtitle'    => __( 'Pick a color for headings text.', 'corpus' ),
						'default'  => '#000000',
						'transparent' => false,
					),
					array(
						'id'       => 'body_text_color',
						'type'     => 'color',
						'title'    => __( 'Text Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for the text.', 'corpus' ),
						'default'  => '#676767',
						'transparent' => false,
					),
					array(
						'id'       => 'body_text_link_color',
						'type'     => 'color',
						'title'    => __( 'Link Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for the links.', 'corpus' ),
						'default'  => '#999999',
						'transparent' => false,
					),
					array(
						'id'       => 'body_text_link_hover_color',
						'type'     => 'color',
						'title'    => __( 'Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for hover text.', 'corpus' ),
						'default'  => '#666666',
						'transparent' => false,
					),
					array(
						'id'       => 'body_border_color',
						'type'     => 'color',
						'title'    => __( 'Border Color', 'corpus' ),
						'subtitle' => __( 'Pick a border color.', 'corpus' ),
						'default'  => '#E6E6E6',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_1_color',
						'type'     => 'color',
						'title'    => __( 'Primary 1 Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 1.', 'corpus' ),
						'default'  => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_1_hover_color',
						'type'     => 'color',
						'title'    => __( 'Primary 1 Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 1 hover.', 'corpus' ),
						'default'  => '#da2929',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_2_color',
						'type'     => 'color',
						'title'    => __( 'Primary 2 Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 2.', 'corpus' ),
						'default'  => '#039be5',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_2_hover_color',
						'type'     => 'color',
						'title'    => __( 'Primary 2 Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 2 hover.', 'corpus' ),
						'default'  => '#0278dc',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_3_color',
						'type'     => 'color',
						'title'    => __( 'Primary 3 Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 3.', 'corpus' ),
						'default'  => '#00bfa5',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_3_hover_color',
						'type'     => 'color',
						'title'    => __( 'Primary 3 Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 3 hover.', 'corpus' ),
						'default'  => '#00a986',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_4_color',
						'type'     => 'color',
						'title'    => __( 'Primary 4 Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 4.', 'corpus' ),
						'default'  => '#ff9800',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_4_hover_color',
						'type'     => 'color',
						'title'    => __( 'Primary 4 Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 4 hover.', 'corpus' ),
						'default'  => '#ff7400',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_5_color',
						'type'     => 'color',
						'title'    => __( 'Primary 5 Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 5.', 'corpus' ),
						'default'  => '#ad1457',
						'transparent' => false,
					),
					array(
						'id'       => 'body_primary_5_hover_color',
						'type'     => 'color',
						'title'    => __( 'Primary 5 Hover Color', 'corpus' ),
						'subtitle' => __( 'Pick a color for primary 5 hover.', 'corpus' ),
						'default'  => '#900d39',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Footer Area', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set your color preferences for the Footer Area. Define the Footer Area in Theme Options > Footer Options.', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Footer Area Color Settings
					array(
						'id'          => 'footer_widgets_bg_color',
						'type'        => 'color',
						'title'       => __( 'Background Color', 'corpus' ),
						'subtitle'    => __( 'Background color for your Footer Area.', 'corpus' ),
						'default'     => '#1c1c1c',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_widgets_headings_color',
						'type'        => 'color',
						'title'       => __( 'Headings Color', 'corpus' ),
						'subtitle'    => __( 'Headings color for your Footer Area.', 'corpus' ),
						'default'     => '#616161',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_widgets_font_color',
						'type'        => 'color',
						'title'       => __( 'Font Color', 'corpus' ),
						'subtitle'    => __( 'Font color for your Footer Area.', 'corpus' ),
						'default'     => '#bababa',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_widgets_link_color',
						'type'        => 'color',
						'title'       => __( 'Link Color', 'corpus' ),
						'subtitle'    => __( 'Link color for your Footer Area.', 'corpus' ),
						'default'     => '#bababa',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_widgets_hover_color',
						'type'        => 'color',
						'title'       => __( 'Hover Color', 'corpus' ),
						'subtitle'    => __( 'Hover color for your Footer Area.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_widgets_border_color',
						'type'        => 'color',
						'title'       => __( 'Border Color', 'corpus' ),
						'subtitle'    => __( 'Border color for your Footer Area.', 'corpus' ),
						'default'     => '#383838',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Footer Bar Area', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set your color preferences for the Footer Bar Area(copyright area). Define the Footer Bar Area in Theme Options > Footer Options.', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					//Footer Bar Color Settings
					array(
						'id'          => 'footer_bar_bg_color',
						'type'        => 'color',
						'title'       => __( 'Background Color', 'corpus' ),
						'subtitle'    => __( 'Background color for your Footer Bar Area.', 'corpus' ),
						'default'     => '#151515',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_bar_bg_color_opacity',
						'type'        => 'select',
						'title'       => __('Background Opacity', 'corpus' ),
						'subtitle'    => __( 'Select opacity for your Footer Bar Area.', 'corpus' ),
						'options'     => $eut_opacity_selection,
						"default"     => '1',
					),
					array(
						'id'          => 'footer_bar_font_color',
						'type'        => 'color',
						'title'       => __( 'Font Color', 'corpus' ),
						'subtitle'    => __( 'Font color for your Footer Bar Area.', 'corpus' ),
						'default'     => '#5c5c5c',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_bar_link_color',
						'type'        => 'color',
						'title'       => __( 'Link Color', 'corpus' ),
						'subtitle'    => __( 'Link color for your Footer Bar Area.', 'corpus' ),
						'default'     => '#5c5c5c',
						'transparent' => false,
					),
					array(
						'id'          => 'footer_bar_hover_color',
						'type'        => 'color',
						'title'       => __( 'Hover Color', 'corpus' ),
						'subtitle'    => __( 'Hover color for your Footer Bar Area.', 'corpus' ),
						'default'     => '#FA4949',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Blog Title', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set the background color for the blog title area and the color of the blog title.', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					array(
						'id'       => 'blog_title_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle'    => __( 'Background color for your blog title.', 'corpus' ),
						'transparent' => false,
						'default'  => '#f1f1f1',
					),
					array(
						'id' => 'blog_title_color',
						'type' => 'select',
						'title' => __( 'Title Color', 'corpus' ),
						'subtitle'    => __( 'Color for your blog title.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
					array(
						'id' => 'blog_description_color',
						'type' => 'select',
						'title' => __( 'Description Color', 'corpus' ),
						'subtitle'    => __( 'Color for your blog description.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Page Title', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set the background color for the predefined page title area and the color of the page title. Notice that you can disable it and create custom page title (via feature section).', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					array(
						'id'       => 'page_title_background_color',
						'type'     => 'color',
						'title'    => __( 'Background', 'corpus' ),
						'subtitle'    => __( 'Background color for your page title.', 'corpus' ),
						'transparent' => false,
						'default'  => '#f1f1f1',
					),
					array(
						'id' => 'page_title_color',
						'type' => 'select',
						'title' => __( 'Title Color', 'corpus' ),
						'subtitle'    => __( 'Color for your page title.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
					array(
						'id' => 'page_description_color',
						'type' => 'select',
						'title' => __( 'Description Color', 'corpus' ),
						'subtitle'    => __( 'Color for your page description.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Page Anchor Menu', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set your color preferences for the Page Anchor Menu in case you use one in any of your pages.', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					array(
						'id'       => 'page_anchor_menu_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle' => __( 'Background color for your Page Anchor Menu.', 'corpus' ),
						'default'  => '#efefef',
						'transparent' => false,
					),
					array(
						'id'       => 'page_anchor_menu_text_color',
						'type'     => 'color',
						'title'    => __( 'Font Color', 'corpus' ),
						'subtitle' => __( 'Font color for your Page Anchor Menu.', 'corpus' ),
						'default'  => '#6e6e6e',
						'transparent' => false,
					),
					array(
						'id'       => 'page_anchor_menu_text_hover_color',
						'type'     => 'color',
						'title'    => __( 'Hover Text Color', 'corpus' ),
						'subtitle' => __( 'Hover color for your Page Anchor Menu.', 'corpus' ),
						'default'  => '#FA4949',
						'transparent' => false,
					),
					array(
						'id'       => 'page_anchor_menu_background_hover_color',
						'type'     => 'color',
						'title'    => __( 'Hover Background Color', 'corpus' ),
						'subtitle' => __( 'Hover background color for your Page Anchor Menu.', 'corpus' ),
						'default'  => '#efefef',
						'transparent' => false,
					),
					array(
						'id'       => 'page_anchor_menu_border_color',
						'type'     => 'color',
						'title'    => __( 'Border Color', 'corpus' ),
						'subtitle' => __( 'Border color for your Page Anchor Menu.', 'corpus' ),
						'default'  => '#e5e5e5',
						'transparent' => false,
					),
				)
			);

			$this->sections[] = array(
				'title' => __( 'Colors - Portfolio Title', 'corpus' ),
				'header' => '',
				'desc' => __( 'Set the background color for the single portfolio title area and the color of the portfolio title and description. Notice that you can disable it and create custom portfolio title (via feature section).', 'corpus' ),
				'icon_class' => 'el-icon-large',
				'icon' => 'el-icon-brush',
				'submenu' => false,
				'panel' => false,
				'eut_colors' => true,
				'subsection' => false,
				'fields' => array(
					array(
						'id'       => 'portfolio_title_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle' => __( 'Background color for your portfolio title.', 'corpus' ),
						'default'  => '#f1f1f1',
						'transparent' => false,
					),
					array(
						'id' => 'portfolio_title_color',
						'type' => 'select',
						'title' => __( 'Title Color', 'corpus' ),
						'subtitle' => __( 'Color for your portfolio title.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
					array(
						'id' => 'portfolio_description_color',
						'type' => 'select',
						'title' => __( 'Description Color', 'corpus' ),
						'subtitle' => __( 'Color for your portfolio description.', 'corpus' ),
						'options' => $eut_color_selection,
						'default' => 'dark',
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-cloud',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Social Media', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'social_options',
						'type' => 'sortable',
						'title' => __( 'Social URLs', 'corpus' ),
						'subtitle' => __( 'Define and reorder your social URLs. Clear the input field for any social link you do not wish to display.', 'corpus' ),
						'desc' => '',
						'label' => true,
						'options' => $eut_social_options,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-map-marker',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Map Options', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'=>'map_api_mode',
						'type' => 'button_set',
						'title' => esc_html__( 'Map API', 'corpus' ),
						'subtitle'=> esc_html__( 'Select the map API', 'corpus' ),
						'options' => array(
							'google-maps' => esc_html__( 'Google Maps', 'corpus' ),
							'openstreetmap' => esc_html__( 'OpenStreetMap', 'corpus' ),
						),
						'default' => 'google-maps',
					),
					array(
						'id'=>'map_tile_url',
						'type' => 'text',
						'title' => esc_html__( 'Tile Layer URL', 'corpus' ),
						'subtitle' => esc_html__( 'Define the Tile Layer. Used to load and display tile layers on the map.', 'corpus' ),
						'desc' => sprintf( '%1$s: <a href="//wiki.openstreetmap.org/wiki/Tile_servers" target="_blank"> %2$s </a>', esc_html__('See more tile servers', 'corpus'), esc_html__('here', 'corpus') ),
						"default" => 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
						'required' => array( 'map_api_mode', 'equals', 'openstreetmap' ),
					),
					array(
						'id'=>'map_tile_url_subdomains',
						'type' => 'text',
						'title' => esc_html__( 'Tile Layer Subdomains', 'corpus' ),
						'subtitle'=> esc_html__( 'Define the Tile Layer subdomains.', 'corpus' ),
						"default" => "abc",
						'required' => array( 'map_api_mode', 'equals', 'openstreetmap' ),
					),
					array(
						'id'=>'map_tile_attribution',
						'type' => 'text',
						'title' => esc_html__( 'Tile Layer Attribution', 'corpus' ),
						'subtitle' => esc_html__( 'Enter the Tile Layer attribution', 'corpus' ),
						"default" => '&copy; <a href="//www.openstreetmap.org/copyright">OpenStreetMap</a>',
						'required' => array( 'map_api_mode', 'equals', 'openstreetmap' ),
					),
					array(
						'id'       => 'gmap_api_key',
						'type'     => 'text',
						'title'    => esc_html__( 'Google API Key', 'corpus' ),
						'subtitle' => $gmap_api_key_link,
						'default'  => '',
						'required' => array( 'map_api_mode', 'equals', 'google-maps' ),
					),
					array(
						'id' => 'gmap_hue_enabled',
						'type' => 'checkbox',
						'title' => __( 'Enable Hue', 'corpus' ),
						'subtitle'=> __( 'Select if hue is used.', 'corpus' ),
						'default' => 0,
						'required' => array( 'map_api_mode', 'equals', 'google-maps' ),
					),
					array(
						'id'       => 'gmap_hue',
						'type'     => 'color',
						'title'    => __( 'Hue color', 'corpus' ),
						'subtitle' => __( 'Pick a color as Hue', 'corpus' ),
						'default'  => '#ffffff',
						'transparent' => false,
						'validate' => 'color',
						'required' => array( 'gmap_hue_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'gmap_saturation',
						'type' => 'slider',
						'title' => __('Saturation', 'corpus' ),
						'subtitle' => __('Saturation of map.', 'corpus' ),
						'desc' => __('Min: -100, max: 100, default value: 0', 'corpus' ),
						'default' => 0,
						"min" => -100,
						"step" => 1,
						"max" => 100,
						'resolution' => 1,
						'display_value' => 'text',
						'required' => array( 'map_api_mode', 'equals', 'google-maps' ),
					),
					array(
						'id' => 'gmap_lightness',
						'type' => 'slider',
						'title' => __('Lightness', 'corpus' ),
						'subtitle' => __('Lightness of map.', 'corpus' ),
						'desc' => __('Min: -100, max: 100, default value: 0', 'corpus' ),
						'default' => 0,
						"min" => -100,
						"step" => 1,
						"max" => 100,
						'resolution' => 1,
						'display_value' => 'text',
						'required' => array( 'map_api_mode', 'equals', 'google-maps' ),
					),
					array(
						'id' => 'gmap_gamma',
						'type' => 'slider',
						'title' => __('Gamma', 'corpus' ),
						'subtitle' => __('Gamma of map.', 'corpus' ),
						'desc' => __('Min: -100, max: 100, default value: 1.0', 'corpus' ),
						'default' => 1.0,
						"min" => 0.01,
						"step" => 0.01,
						"max" => 10.0,
						'resolution' => 0.01,
						'display_value' => 'text',
						'required' => array( 'map_api_mode', 'equals', 'google-maps' ),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-error',
				'icon_class' => 'el-icon-large',
				'title' => __( '404 Page', 'corpus'),
				'subtitle' => __( 'You can find the settings for the 404 page here.', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id' => 'page_404_content',
						'type' => 'editor',
						'title' => __( 'Page 404 Content', 'corpus' ),
						'subtitle' => __( 'Type the content of your 404 page, you can use also shortcodes.', 'corpus' ),
						'default' => "<small>404 ERROR</small><h2>Hey There! This Is Not The Page You Are Looking For...</h2><p class='eut-subtitle'>Sorry for the inconvenience!</p>",
					),
					array(
						'id' => 'page_404_search',
						'type' => 'checkbox',
						'title' => __( 'Show Search Box', 'corpus' ),
						'subtitle'=> __( 'Select if you want to show a search box.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id' => 'page_404_home_button',
						'type' => 'checkbox',
						'title' => __( 'Show Back to home Button', 'corpus' ),
						'subtitle'=> __( 'Select if you want to show a back to home button.', 'corpus' ),
						'default' => 1,
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-cog',
				'icon_class' => 'el-icon-large',
				'title' => __( 'Miscellaneous', 'corpus' ),
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'       => 'popup_background_color',
						'type'     => 'color',
						'title'    => __( 'Background Color', 'corpus' ),
						'subtitle' => __( 'Pick a background color for the popup overlays.', 'corpus' ),
						'default'  => '#000000',
						'transparent' => false,
					),
					array(
						'id' => 'popup_background_color_opacity',
						'type' => 'select',
						'title' => __('Background Opacity', 'corpus' ),
						'subtitle'    => __( 'Select the opacity for the popup background overlays.', 'corpus' ),
						'options' => $eut_opacity_selection,
						'default' => '0.85',
					),
					array(
						'id'=>'wp_gallery_popup',
						'type' => 'switch',
						'title' => __( 'Lightbox for WordPress Gallery', 'corpus' ),
						'subtitle'=> __( 'Toggle lightbox for native WordPress Gallery on or off.', 'corpus' ),
						'default' => '0',
						'on' => __('On', 'corpus' ),
						'off' => __('Off', 'corpus' ),
					),
					array(
						'id'=>'logo_as_text_enabled',
						'type' => 'switch',
						'title' => __( 'Logo as text', 'corpus' ),
						'subtitle'=> __( 'Toggle logo as text on or off. When on, all logo images will be replaced with site name.', 'corpus' ),
						'default' => '0',
						'on' => __('On', 'corpus' ),
						'off' => __('Off', 'corpus' ),
					),
					array(
						'id' => 'retina_support',
						'type' => 'select',
						'title' => __( 'Retina Support', 'corpus' ),
						'subtitle' => __( 'Select the retina suppport of your site.', 'corpus' ),
						'options' => $eut_retina_support_selection,
						'default' => 'default',
						'validate' => 'not_empty',
					),
					array(
						'id'=>'menu_header_integration',
						'type' => 'select',
						'title' => __( 'Main Menu Integration', 'corpus' ),
						'subtitle' => __( 'Select the main menu integration method. Selection available for custom menu integration.', 'corpus' ),
						'options' => $eut_header_menu_selection,
						'default' => 'default',
						'validate' => 'not_empty',
					),
					array(
						'id'=>'sidebar_heading_tag',
						'type' => 'select',
						'title' => esc_html__( 'Sidebar Headings Tag', 'corpus' ),
						'subtitle' => esc_html__( 'Select the headings tag for your Sidebar Titles.', 'corpus' ),
						'options' => $eut_headings_tag_selection,
						'default' => 'h3',
						'validate' => 'not_empty',
					),
					array(
						'id'=>'footer_heading_tag',
						'type' => 'select',
						'title' => esc_html__( 'Footer Sidebar Headings Tag', 'corpus' ),
						'subtitle' => esc_html__( 'Select the headings tag for your Footer Sidebar Titles.', 'corpus' ),
						'options' => $eut_headings_tag_selection,
						'default' => 'h3',
						'validate' => 'not_empty',
					),
					array(
						'id' => 'disable_seo_page_analysis',
						'type' => 'checkbox',
						'title' => __( 'Disable WordPress SEO Page Analysis', 'corpus' ),
						'subtitle'=> __( 'Select if you want to disable WordPress SEO page analysis.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id'   => 'info_settings_vc',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => esc_html__( 'Page Builder Visibility', 'corpus' ),
						'subtitle'=> esc_html__( 'Enable/Disable default Page Builder elements.', 'corpus' ),
					),
					array(
						'id'=>'vc_grid_visibility',
						'type' => 'switch',
						'title' => esc_html__( 'Page Builder Grid Elements', 'corpus' ),
						'subtitle'=> esc_html__( 'Toggle Page Builder Grid elements on or off.', 'corpus' ),
						"default" => '0',
						'on' => esc_html__('On', 'corpus' ),
						'off' => esc_html__('Off', 'corpus' ),
					),
					array(
						'id'=>'vc_charts_visibility',
						'type' => 'switch',
						'title' => esc_html__( 'Page Builder Charts Elements', 'corpus' ),
						'subtitle'=> esc_html__( 'Toggle Page Builder Charts elements on or off.', 'corpus' ),
						"default" => '0',
						'on' => esc_html__('On', 'corpus' ),
						'off' => esc_html__('Off', 'corpus' ),
					),
					array(
						'id'=>'vc_auto_updater',
						'type' => 'switch',
						'title' => esc_html__( 'Page Builder Auto Updater', 'corpus' ),
						'subtitle'=> esc_html__( 'Enable/Disable Page Builder Auto Updater ( Activation Required ).', 'corpus' ),
						"default" => '0',
						'on' => esc_html__('On', 'corpus' ),
						'off' => esc_html__('Off', 'corpus' ),
					),
					array(
						'id'   => 'info_settings_wpml_polylang',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => __( 'WPML/Polylang Settings', 'corpus' ),
						'subtitle'=> __( 'Configure Theme language switcher settings.', 'corpus' ),
					),
					array(
						'id'=>'language_switcher_skip_missing',
						'type' => 'checkbox',
						'title' => __( 'Hide languages with no translation', 'corpus' ),
						'subtitle'=> __( 'Select if you want to skip language in case translation is missing.', 'corpus' ),
						"default" => '0',
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-cog',
				'icon_class' => 'el-icon-large',
				'title' => esc_html__( 'Meta Tags', 'corpus' ),
				'desc'=> esc_html__( 'Configure your site meta tags.', 'corpus' ),
				'id' => 'eut_redux_section_meta_tags',
				'submenu' => true,
				'customizer' => false,
				'subsection' => true,
				'fields' => array(
					array(
						'id'=>'meta_viewport_responsive',
						'type' => 'switch',
						'title' => esc_html__( 'Responsive Viewport Meta', 'corpus' ),
						'subtitle'=> esc_html__( 'Enable or Disable Responsive Viewport.', 'corpus' ),
						"default" => '1',
						'on' => esc_html__( 'On', 'corpus' ),
						'off' => esc_html__( 'Off', 'corpus' ),
					),
					array(
						'id'=>'meta_opengraph',
						'type' => 'switch',
						'title' => esc_html__( 'Open Graph Meta', 'corpus' ),
						'subtitle'=> esc_html__( 'Generate open graph meta tags for social sharing ( e.g: Facebook, Google+, LinkedIn etc )', 'corpus' ),
						"default" => '0',
						'on' => esc_html__( 'On', 'corpus' ),
						'off' => esc_html__( 'Off', 'corpus' ),
					),
					array(
						'id'=>'meta_twitter',
						'type' => 'switch',
						'title' => esc_html__( 'Twitter Card Meta', 'corpus' ),
						'subtitle'=> esc_html__( 'Generate meta tags for Twitter', 'corpus' ),
						"default" => '0',
						'on' => esc_html__( 'On', 'corpus' ),
						'off' => esc_html__( 'Off', 'corpus' ),
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-resize-small',
				'icon_class' => 'el-icon-large',
				'title' => esc_html__( 'Media Sizes', 'corpus' ),
				'desc' => esc_html__( 'These settings affect the display and dimensions of images in the Theme. After changing these settings you may need to', 'corpus' ) . " "  . $regenerate_link . ".",
				'submenu' => true,
				'customizer' => false,
				'fields' => array(
					array(
						'id'       => 'size_large_landscape_wide',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Landscape Wide Large', 'corpus'),
						'subtitle'=> esc_html__( 'Default 1170x658 - 16:9 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '1170',
							'height'  => '658'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_small_landscape_wide',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Landscape Wide', 'corpus'),
						'subtitle'=> esc_html__( 'Default 800x450 - 16:9 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '800',
							'height'  => '450'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_small_landscape',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Landscape', 'corpus'),
						'subtitle'=> esc_html__( 'Default 800x600 - 4:3 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '800',
							'height'  => '600'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_small_portrait',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Portrait', 'corpus'),
						'subtitle'=> esc_html__( 'Default 600x800 - 3:4 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '600',
							'height'  => '800'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_small_square',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Square', 'corpus'),
						'subtitle'=> esc_html__( 'Default 600x600 - 1:1 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '600',
							'height'  => '600'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_medium_portrait',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Portrait Large', 'corpus'),
						'subtitle'=> esc_html__( 'Default 560x1120 - 1:2 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '560',
							'height'  => '1120'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_medium_square',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Square Large', 'corpus'),
						'subtitle'=> esc_html__( 'Default 1120x1120 - 1:1 ratio (Cropped)', 'corpus' ),
						'default'  => array(
							'width'   => '1120',
							'height'  => '1120'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
					array(
						'id'       => 'size_fullscreen',
						'type'     => 'dimensions',
						'units'    => false,
						'title'    => __('Fullscreen', 'corpus'),
						'subtitle'=> esc_html__( 'Default 1920x1920 (Resize)', 'corpus' ),
						'default'  => array(
							'width'   => '1920',
							'height'  => '1920'
						),
						'validate_callback' => 'eut_redux_dimensions_validation',
					),
				)
			);

			$this->sections[] = array(
				'icon' => 'el-icon-lock',
				'icon_class' => 'el-icon-large',
				'title' => esc_html__( 'Privacy / Cookies', 'corpus' ),
				'desc' => esc_html__( 'The following shortcodes will allow your users to change certain behavior of your website regarding privacy.', 'corpus' ) . '<br>' .
					'<ul>' .
					'<li><strong>eut_privacy_required</strong> - ' . esc_html__( 'displays a required content for your site e.g: Cloudlflare, CDN etc.', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_gtracking</strong> - ' . esc_html__( 'allows a user to enable/disable Google Analytics tracking code in the user\'s browser', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_gfonts</strong> - ' . esc_html__( 'allows a user to enable/disable the use of Google Fonts in the user\'s browser', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_gmaps</strong> - ' . esc_html__( 'allows a user to enable/disable the use of Google Maps in the user\'s browser', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_video_embeds</strong> - ' . esc_html__( 'allows a user to enable/disable video embeds in the user\'s browser', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_policy_page_link</strong> - ' . esc_html__( 'displays a link to the privacy policy page set from the WordPress admin panel', 'corpus' ) . '</li>' .
					'<li><strong>eut_privacy_preferences_link</strong> - ' . esc_html__( 'displays a link to the privacy preferences as defined in the Privacy Consent Info Bar', 'corpus' ) . '</li>' .
					'</ul>' .
					esc_html__( 'You can use any of them in your privacy policy or in any text area that allows shortcodes.', 'corpus' ) . '<br><br>' .
					'<strong>[eut_privacy_required value="required"]For performance and security reasons we use Cloudflare[/eut_privacy_required]</strong><br>' .
					'<strong>[eut_privacy_gtracking]</strong><br>' .
					'<strong>[eut_privacy_gfonts]</strong><br>' .
					'<strong>[eut_privacy_gmaps]</strong><br>' .
					'<strong>[eut_privacy_video_embeds]</strong><br>' .
					'<strong>[eut_privacy_policy_page_link]</strong><br>' .
					'<strong>[eut_privacy_preferences_link]</strong><br><br>' .
					esc_html__( 'Note: To change the default text add your text inside the shortcode tags [shortcode]Your text[/shortcode]', 'corpus' ),
				'id' => 'eut_redux_section_privacy_cookies',
				'submenu' => true,
				'customizer' => false,
				'class' => 'eut-redux-desc-full',
				'fields' => array(
					array(
						'id'   => 'info_style_blocking_content',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => esc_html__( 'Privacy Content Blocking Settings', 'corpus' ),
						'subtitle'=> esc_html__( 'Configure the privacy content blocking settings.', 'corpus' ) . '<br>' . esc_html__( 'Note: The usage of the Blocking content feature is not recommended if you have added caching plugins or page rules to cache static HTML content (aggressive cache). If you use this feature you might need to disable such type of caching.', 'corpus' ),
					),
					array(
						'id' => 'privacy_content_blocking_enabled',
						'type' => 'switch',
						'title' => esc_html__( 'Privacy Content Blocking', 'corpus' ),
						'subtitle'=> esc_html__( 'Select if you want to enable/disable privacy content blocking.', 'corpus' ) .'<br><br>' . esc_html__( 'Note: if you disable content blocking certain privacy shortcodes will be automatically disabled.', 'corpus' ),
						'default' => 1,
					),
					array(
						'id'      => 'privacy_initial_state',
						'type'    => 'checkbox',
						'title'   => esc_html__( 'Privacy Initial Blocking State', 'corpus' ),
						'subtitle'    => esc_html__( 'Check if you want to block the content when the page loads.', 'corpus' ),
						'options'  => array(
							'gtracking'     => 'Google Tracking',
							'gfonts' => 'Google Fonts',
							'gmaps' => 'Google Maps',
							'video-embeds'   => 'Embed Videos'
						),
						'default' => array(
							'gtracking'     => '0',
							'gfonts' => '0',
							'gmaps' => '0',
							'video-embeds'   => '0'
						),
						'required' => array( 'privacy_content_blocking_enabled', 'equals', '1' ),
					),
					array(
						'id'   => 'info_style_fallback_content',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => esc_html__( 'Privacy Fallback Settings', 'corpus' ),
						'subtitle'=> esc_html__( 'Configure the privacy fallback info box.', 'corpus' ),
						'required' => array( 'privacy_content_blocking_enabled', 'equals', '1' ),
					),
					array(
						'id' => 'privacy_fallback_content',
						'type' => 'textarea',
						'rows' => '2',
						'title' => esc_html__( 'Privacy Fallback Content', 'corpus' ),
						'subtitle' => esc_html__( 'Type the fallback text when the content is blocked.', 'corpus' ),
						'default' => 'This content is blocked. Please review your Privacy Preferences.',
						'required' => array( 'privacy_content_blocking_enabled', 'equals', '1' ),
					),
					array(
						'id'       => 'privacy_fallback_preferences_link_visibility',
						'type'     => 'checkbox',
						'title'    => esc_html__('Display Privacy Preferences link', 'corpus'),
						'subtitle' => esc_html__('Select if you want to display the Privacy Preferences link ( if defined in the privacy consent bar ).', 'corpus'),
						'default'  => '1',
						'required' => array( 'privacy_content_blocking_enabled', 'equals', '1' ),
					),
					array(
						'id'       => 'privacy_fallback_content_link_visibility',
						'type'     => 'checkbox',
						'title'    => esc_html__('Display redirect link of the blocked content', 'corpus'),
						'subtitle' => esc_html__('Select if you want to display a redirect link of the blocked content ( blocked content will open in a new tab e.g: YouTube website ).', 'corpus'),
						'default'  => '1',
						'required' => array( 'privacy_content_blocking_enabled', 'equals', '1' ),
					),
					array(
						'id'   => 'info_style_consent_bar',
						'type' => 'info',
						'class' => 'eut-redux-sub-info',
						'title' => esc_html__( 'Privacy Consent Info Bar Settings', 'corpus' ),
						'subtitle'=> esc_html__( 'Configure the consent info bar.', 'corpus' ),
					),
					array(
						'id' => 'privacy_consent_bar_enabled',
						'type' => 'switch',
						'title' => esc_html__( 'Privacy Consent Info Bar', 'corpus' ),
						'subtitle'=> esc_html__( 'Select if you want to show a privacy consent info bar.', 'corpus' ),
						'default' => 0,
					),
					array(
						'id' => 'privacy_consent_bar_content',
						'type' => 'textarea',
						'rows' => '2',
						'title' => esc_html__( 'Privacy Info Bar Content', 'corpus' ),
						'subtitle' => esc_html__( 'Type the content of your consent info bar.', 'corpus' ),
						'default' => 'Our website uses cookies, mainly from 3rd party services. Define your Privacy Preferences and/or agree to our use of cookies.',
						'required' => array( 'privacy_consent_bar_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'privacy_agreement_button_label',
						'type' => 'text',
						'title' => esc_html__( 'Privacy Agreement Button Label', 'corpus' ),
						'subtitle'=> esc_html__( 'Define the label for your privacy agreement button. Leave empty to remove.', 'corpus' ),
						'required' => array( 'privacy_consent_bar_enabled', 'equals', '1' ),
						"default" => 'I Agree',
					),
					array(
						'id'=>'privacy_preferences_button_label',
						'type' => 'text',
						'title' => esc_html__( 'Privacy Preferences Button Label', 'corpus' ),
						'subtitle'=> esc_html__( 'Define the label for your privacy preferences button. Leave empty to remove.', 'corpus' ),
						'required' => array( 'privacy_consent_bar_enabled', 'equals', '1' ),
						"default" => 'Privacy Preferences',
					),
					array(
						'id' => 'privacy_preferences_button_link',
						'type' => 'select',
						'compiler' => true,
						'title' => esc_html__( 'Privacy Preferences Button Link Mode', 'corpus' ),
						'subtitle' => esc_html__( 'Select the preferences button link mode: modal, privacy policy page or custom url.', 'corpus' ),
						'options' => array(
							'modal' => esc_html__( 'Modal', 'corpus' ),
							'privacy_page' => esc_html__( 'Privacy Policy Page', 'corpus' ),
							'custom_url' => esc_html__( 'Custom URL', 'corpus' ),
						),
						'default' => 'modal',
						'validate' => 'not_empty',
						'required' => array( 'privacy_consent_bar_enabled', 'equals', '1' ),
					),
					array(
						'id'=>'privacy_preferences_link_url',
						'type' => 'text',
						'title' => esc_html__( 'Privacy Preferences Custom Link URL', 'corpus' ),
						'subtitle'=> esc_html__( 'Define a custom URL link for your privacy preferences button.', 'corpus' ),
						'required' => array(
							array( 'privacy_consent_bar_enabled', 'equals', '1' ),
							array( 'privacy_preferences_button_link', 'equals', 'custom_url' ),
						),
						"default" => '',
					),
					array(
						'id'=>'privacy_preferences_link_target',
						'type' => 'select',
						'title' => esc_html__( 'Privacy Preferences Custom Link Target', 'corpus' ),
						'subtitle'=> esc_html__( 'Define the target for your custom url, same or new page.', 'corpus' ),
						'options' => array(
							'_self' => esc_html__( 'Same Page', 'corpus' ),
							'_blank' => esc_html__( 'New page', 'corpus' ),
						),
						'required' => array(
							array( 'privacy_consent_bar_enabled', 'equals', '1' ),
							array( 'privacy_preferences_button_link', 'equals', 'custom_url' ),
						),
						"default" => '_self',
					),
					array(
						'id' => 'privacy_consent_modal_content',
						'type' => 'editor',
						'args' => array ( 'wpautop' => false ),
						'title' => esc_html__( 'Privacy Modal Content', 'corpus' ),
						'subtitle' => esc_html__( 'Type the content of your modal consent dialog.', 'corpus' ),
						'default' => '<h5>Privacy Preferences</h5><p>When you visit our website, it may store information through your browser from specific services, usually in the form of cookies. Here you can change your Privacy preferences. It is worth noting that blocking some types of cookies may impact your experience on our website and the services we are able to offer.</p><div>[eut_privacy_gtracking][eut_privacy_gfonts][eut_privacy_gmaps][eut_privacy_video_embeds]</div>',
						'required' => array(
							array( 'privacy_consent_bar_enabled', 'equals', '1' ),
							array( 'privacy_preferences_button_link', 'equals', 'modal' ),
						),
					),
					array(
						'id'=>'privacy_refresh_button_label',
						'type' => 'text',
						'title' => esc_html__( 'Privacy Refresh Button Label', 'corpus' ),
						'subtitle'=> esc_html__( 'Define the label for your privacy refresh button. Leave empty to remove.', 'corpus' ),
						'required' => array(
							array( 'privacy_consent_bar_enabled', 'equals', '1' ),
							array( 'privacy_preferences_button_link', 'equals', 'modal' ),
						),
						"default" => 'Save Preferences',
					),
				)
			);

			if ( !defined('ENVATO_HOSTED_SITE') ) {
				$this->sections[] = array(
					'icon' => 'el-icon-repeat',
					'icon_class' => 'el-icon-large',
					'title' => __( 'Theme Update', 'corpus' ),
					'submenu' => true,
					'customizer' => false,
					'fields' => array(
						array(
							'id'=>'update_enabled',
							'type' => 'switch',
							'title' => __( 'Enable Theme Update', 'corpus' ),
							'subtitle'=> __( 'Toggle Theme update on or off.', 'corpus' ),
							'default' => '0',
							'on' => __( 'On', 'corpus' ),
							'off' => __( 'Off', 'corpus' ),
						),
						array(
							'id' => 'update_user_name',
							'type' => 'text',
							'title' => __( 'Themeforest username', 'corpus' ),
							'subtitle' => __( 'Enter your Themeforest username here', 'corpus' ),
							'default' => '',
							'required' => array( 'update_enabled', 'equals', '1' ),
						),
						array(
							'id' => 'update_api_key',
							'type' => 'text',
							'title' => __( 'Secret API Key', 'corpus' ),
							'subtitle' => __( 'Enter your API Key here', 'corpus' ),
							'default' => '',
							'required' => array( 'update_enabled', 'equals', '1' ),
						),
					)
				);
			}

			//Show Sections available only in customizer
			if ( ( defined( 'EUT_REDUX_CUSTOM_PANEL' ) &&  true === EUT_REDUX_CUSTOM_PANEL ) || $this->eut_redux_customizer_visibility() ) {
				foreach ( $this->sections as $k => $section ) {
					if ( isset( $section['eut_colors'] ) && isset( $section['panel'] ) ) {
						unset($this->sections[$k]['panel']);
						$this->sections[$k]['subsection'] = true;
					}
				}
			}

		}


		public function setArguments() {

			$theme = wp_get_theme();
			$theme_version = $theme->get('Version');
			if( is_child_theme() ) {
				$parent_theme = wp_get_theme( get_template() );
				$theme_version .= ' ( ' . $parent_theme->get('Name') .': ' . $parent_theme->get('Version') . ' )';
			}

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire
				'opt_name' => 'eut_corpus_options', // This is where your data is stored in the database and also becomes your global variable name.
				'display_name' => ' ', // Name that appears at the top of your panel
				'display_version' => $theme_version, // Version that appears at the top of your panel
				'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu' => true, // Show the sections below the admin menu item or not
				'menu_title' => __( 'Theme Options', 'corpus' ),
				'page' => __( 'Theme Options', 'corpus' ),
				'google_api_key' => 'AIzaSyBBgve_JGMTPX8CWMxeoG1KrfmUF6WN4NE', // Must be defined to add google fonts to the typography module
				'admin_bar' => true, // Show the panel pages on the admin bar
				'global_variable' => '', // Set a different name for your global variable other than the opt_name
				'dev_mode' => false, // Show the time the page took to load, etc
				'customizer' => true, // Enable basic customizer support
				'ajax_save' => true,
				'templates_path' => get_template_directory() . '/includes/admin/templates/panel/', //Redux Template files

				// OPTIONAL -> Give you extra features
				'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
				'menu_icon' => get_template_directory_uri() .'/includes/images/adminmenu/theme.png', // Specify a custom URL to an icon
				'last_tab' => '', // Force your panel to always open to a specific tab (by id)
				'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
				'page_slug' => 'eut_options', // Page slug used to denote the panel
				'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
				'default_show' => false, // If true, shows the default value next to each field that is not the default value.
				'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *

				// CAREFUL -> These options are for advanced use only
				'use_cdn' => false,
				'transient_time' => 60 * MINUTE_IN_SECONDS,
				'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				//'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
				//'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.

				// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
				'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'show_import_export' => true,
				'disable_tracking' => true,
				//'system_info' => false, // REMOVE
				'help_tabs' => array(),
				'help_sidebar' => '', // __( '', $this->args['domain'] );
			);

			// Panel Intro text -> before the form
			$this->args['intro_text'] ='';

			// Add content after the form.
			$this->args['footer_text'] = '';
		}

	}

	global $eutReduxFramework;
	$eutReduxFramework = new EUT_Redux_Framework_config();
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
