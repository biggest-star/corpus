<?php

/*
*	Header Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

 /**
 * Print Logo
 */
if ( !function_exists( 'eut_print_logo' ) ) {
	function eut_print_logo() {

		if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_logo' ) ) {
			return;
		} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_logo' ) ) {
			return;
		}
		if ( eut_visibility( 'logo_as_text_enabled' ) ) {
?>
		<div class="eut-logo eut-logo-text">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
		</div>
<?php
		} else {
?>
		<div class="eut-logo">
			<div class="eut-logo-wrapper">
<?php
			$eut_default_logo = eut_option( 'logo','','url' );
			if ( !empty( $eut_default_logo ) ) {
				$eut_logo = eut_get_logo_data( 'logo' );
				$eut_logo_dark = eut_get_logo_data( 'logo_dark', $eut_logo['url'], $eut_logo['data'] );
				$eut_logo_light = eut_get_logo_data( 'logo_light', $eut_logo['url'], $eut_logo['data'] );
				$eut_logo_sticky = eut_get_logo_data( 'logo_sticky', $eut_logo['url'], $eut_logo['data'] );

				$eut_logo = apply_filters( 'eut_header_logo', $eut_logo );
				$eut_logo_dark = apply_filters( 'eut_header_logo_dark', $eut_logo_dark );
				$eut_logo_light = apply_filters( 'eut_header_logo_light', $eut_logo_light );
				$eut_logo_sticky = apply_filters( 'eut_header_logo_sticky', $eut_logo_sticky );

?>
			<a class="eut-default" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $eut_logo['url'] ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" <?php echo implode( ' ', $eut_logo['data'] ); ?>></a>
			<a class="eut-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $eut_logo_dark['url'] ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" <?php echo implode( ' ', $eut_logo_dark['data'] ); ?>></a>
			<a class="eut-light" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $eut_logo_light['url'] ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" <?php echo implode( ' ', $eut_logo_light['data'] ); ?>></a>
			<a class="eut-sticky" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $eut_logo_sticky['url'] ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" <?php echo implode( ' ', $eut_logo_sticky['data'] ); ?>></a>
<?php
			}
?>
				<span><?php bloginfo('name'); ?></span>
			</div>
		</div>
<?php
		}
	}
}

 /**
 * Get Logo Data
 */
function eut_get_logo_data( $logo_id, $fallback_logo_url = '', $fallback_logo_attributes = array() ) {

	$logo_url = eut_option( $logo_id, '', 'url' );
	$logo_url = str_replace( array( 'http:', 'https:' ), '', $logo_url );
	$logo_attributes = array();

	if ( empty( $logo_url ) ) {
		$logo_url = $fallback_logo_url;
		$logo_attributes = $fallback_logo_attributes;
	} else {
		$logo_attributes[] = 'data-no-retina=""';
		$logo_width = eut_option( $logo_id, '', 'width' );
		$logo_height = eut_option( $logo_id, '', 'height' );
		if ( !empty( $logo_width ) && !empty( $logo_height ) ) {
			$logo_attributes[] = 'width="' . esc_attr( $logo_width ) . '"';
			$logo_attributes[] = 'height="' . esc_attr( $logo_height ) . '"';
		}
	}

	return array(
		'url' => $logo_url,
		'data' => $logo_attributes,
	);

}

 /**
 * Prints correct title/subtitle for all cases
 */
function eut_header_title() {
	global $post;
	$page_title = $page_description = $page_reversed = '';

	//Main Pages
	if ( is_front_page() && is_home() ) {
		// Default homepage
		$page_title = get_bloginfo( 'name' );
		$page_description = get_bloginfo( 'description' );
	} else if ( is_front_page() ) {
		// static homepage
		$page_title = get_bloginfo( 'name' );
		$page_description = get_bloginfo( 'description' );
	} else if ( is_home() ) {
		// blog page
		$page_title = get_bloginfo( 'name' );
		$page_description = get_bloginfo( 'description' );
	} else if( is_search() ) {
		$page_description = __( 'Search Results for :', 'corpus' );
		$page_title = esc_attr( get_search_query() );
		$page_reversed = 'reversed';
	} else if ( is_singular() ) {
		$post_id = $post->ID;
		$post_type = get_post_type( $post_id );
		//Single Post
		if ( $post_type == 'page' && is_singular( 'page' ) ) {
			$page_title = get_the_title();
			$page_description = get_post_meta( $post_id, 'eut_page_description', true );
		} else if ( $post_type == 'portfolio' && is_singular( 'portfolio' ) ) {
			$page_title = get_the_title();
			$page_description = get_post_meta( $post_id, 'eut_portfolio_description', true );
		} else {
			$page_title = get_the_title();
		}


	} else if ( is_archive() ) {
		//Post Categories
		if ( is_category() ) {
			$page_title = single_cat_title("", false);
			$page_description = category_description();
		} else if ( is_tag() ) {
			$page_title = single_tag_title("", false);
			$page_description = tag_description();
		} else if ( is_tax() ) {
			$page_title = single_term_title("", false);
			$page_description = term_description();
		} else if ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			$page_description = __( "Posts By :", 'corpus' );
			$page_title = $userdata->display_name;
			$page_reversed = 'reversed';
		} else if ( is_day() ) {
			$page_description = __( "Daily Archives :", 'corpus' );
			$page_title = get_the_time( 'l, F j, Y' );
			$page_reversed = 'reversed';
		} else if ( is_month() ) {
			$page_description = __( "Monthly Archives :", 'corpus' );
			$page_title = get_the_time( 'F Y' );
			$page_reversed = 'reversed';
		} else if ( is_year() ) {
			$page_description = __( "Yearly Archives :", 'corpus' );
			$page_title = get_the_time( 'Y' );
			$page_reversed = 'reversed';
		} else {
			$page_title = __( "Archives", 'corpus' );
		}
	} else {
		$page_title = get_bloginfo( 'name' );
		$page_description = get_bloginfo( 'description' );
	}

	return array(
		'title' => $page_title,
		'description' => $page_description,
		'reversed' => $page_reversed,
	);


}

 /**
 * Check title visibility
 */
function eut_check_title_visibility() {

	$blog_title = eut_option( 'blog_title', 'sitetitle' );

	if ( is_front_page() && is_home() ) {
		// Default homepage
		if ( 'none' == $blog_title ) {
			return false;
		}
	} elseif ( is_front_page() ) {
		// static homepage
		if ( 'yes' == eut_post_meta( 'eut_disable_title' ) ) {
			return false;
		}
	} elseif ( is_home() ) {
		// blog page
		if ( 'none' == $blog_title ) {
			return false;
		}
	} else {
		if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_title' ) ) {
			return false;
		}
	}

	return true;

}

/**
 * Prints Title Background Image Container
 */
function eut_print_title_bg_image_container( $bg_image, $eut_custom_bg = array() ) {

	$bg_mode = eut_array_value( $eut_custom_bg, 'mode' );
	if ( !empty( $bg_mode ) ) {
		$bg_position = eut_array_value( $eut_custom_bg, 'position', 'center-center' );
		$bg_image = eut_array_value( $eut_custom_bg, 'image' );
	}
	if ( 'featured' == $bg_mode && has_post_thumbnail() ) {
		$media_id = get_post_thumbnail_id();
		$full_src = wp_get_attachment_image_src( $media_id, 'eut-image-fullscreen' );
		$image_url = esc_url( $full_src[0] );
	} else if ( 'custom' == $bg_mode && !empty( $bg_image ) ) {
		$image_url = $bg_image;
	} else {
		$media = eut_option( $bg_image, '', 'media' );
		if( isset( $media['id'] ) && !empty( $media['id'] ) ) {
			$media_id = $media['id'];
			$bg_position = eut_option( $bg_image, 'center center', 'background-position' );
			$bg_position = str_replace( " ", "-", $bg_position );
			$full_src = wp_get_attachment_image_src( $media_id, 'eut-image-fullscreen' );
			$image_url = esc_url( $full_src[0] );
		}
	}

	if( !empty( $image_url ) ) {
		echo '<div class="eut-bg-wrapper">';
		echo '  <div class="eut-bg-image eut-bg-position-' . esc_attr( $bg_position ) . '" style="background-image: url(' . $image_url . ');"></div>';
		echo '</div>';
	}

}

 /**
 * Prints title/subtitle ( Page )
 */
function eut_print_header_title( $mode = '') {

	if ( eut_check_title_visibility() ) {

		$page_title_extra_class = '';
		$header_data = eut_header_title();

		if ( 'blog' == $mode ) {
			$page_title_height = eut_option( 'blog_title_height', '350' );
			$page_title_alignment = eut_option( 'blog_title_alignment', 'center' );
			$page_title_color = eut_option( 'blog_title_color', 'light' );
			$page_description_color = eut_option( 'blog_description_color', 'light' );
			$page_title_extra_class = 'eut-blog-title';
			$bg_image = 'blog_title_background';

		} elseif ( 'forum' == $mode ) {
			$page_title_height = eut_option( 'forum_title_height', '350' );
			$page_title_alignment = eut_option( 'forum_title_alignment', 'center' );
			$page_title_color = eut_option( 'forum_title_color', 'light' );
			$page_description_color = eut_option( 'forum_description_color', 'light' );
			$page_title_extra_class = 'eut-forum-title';
			$bg_image = 'forum_title_background';
			$header_data['description'] = '';
			if ( !is_singular() ) {
				$header_data['title'] = __( 'Forums' , 'corpus' );
			}
			if ( function_exists('bbp_is_single_user_edit') && (bbp_is_single_user_edit() || bbp_is_single_user() ) ) {
				$user_info = get_userdata( bbp_get_displayed_user_id() );
				$header_data['title'] = __("Profile for User:", 'corpus' ) . " " . $user_info->display_name;
				if ( bbp_is_single_user_edit() ) {
					$header_data['title'] = __("Edit profile for User:", 'corpus' ) . " " . $user_info->display_name;
				}
			}
		} else {
			$page_title_height = eut_option( 'page_title_height', '350' );
			$page_title_alignment = eut_option( 'page_title_alignment', 'center' );
			$page_title_color = eut_option( 'page_title_color', 'light' );
			$page_description_color = eut_option( 'page_description_color', 'light' );
			$bg_image = 'page_title_background';
		}


		$header_title = isset( $header_data['title'] ) ? $header_data['title'] : '';
		$header_description = isset( $header_data['description'] ) ? $header_data['description'] : '';
		$header_reversed = isset( $header_data['reversed'] ) ? $header_data['reversed'] : '';

		$title_tag = apply_filters( 'eut_header_title_tag', 'h1' );
		$description_tag = apply_filters( 'eut_header_description_tag', 'div' );

?>
	<!-- Page Title -->
	<div id="eut-page-title" class="eut-align-<?php echo esc_attr( $page_title_alignment ); ?> <?php echo esc_attr( $page_title_extra_class ); ?>" style="height:<?php echo esc_attr( $page_title_height ); ?>px;">
		<div id="eut-page-title-content" data-height="<?php echo esc_attr( $page_title_height ); ?>">
			<?php do_action( 'eut_page_title_top' ); ?>
			<div class="eut-container">
				<?php if ( empty( $header_reversed ) ) { ?>
					<<?php echo tag_escape( $title_tag ); ?> class="eut-title eut-<?php echo esc_attr( $page_title_color ); ?>"><span><?php echo esc_html( $header_title ); ?></span></<?php echo tag_escape( $title_tag ); ?>>
					<?php if ( !empty( $header_description ) ) { ?>
					<<?php echo tag_escape( $description_tag ); ?> class="eut-description eut-<?php echo esc_attr( $page_description_color ); ?>"><?php echo wp_kses_post( $header_description ); ?></<?php echo tag_escape( $description_tag ); ?>>
					<?php } ?>
				<?php } else { ?>
					<?php if ( !empty( $header_description ) ) { ?>
					<<?php echo tag_escape( $description_tag ); ?> class="eut-description eut-<?php echo esc_attr( $page_description_color ); ?>"><?php echo wp_kses_post( $header_description ); ?></<?php echo tag_escape( $description_tag ); ?>>
					<?php } ?>
					<<?php echo tag_escape( $title_tag ); ?> class="eut-title eut-<?php echo esc_attr( $page_title_color ); ?>"><span><?php echo esc_html( $header_title ); ?></span></<?php echo tag_escape( $title_tag ); ?>>
				<?php } ?>
			</div>
			<?php do_action( 'eut_page_title_bottom' ); ?>
		</div>
		<?php eut_print_title_bg_image_container( $bg_image ); ?>
	</div>
	<!-- End Page Title -->
<?php
	}
}

 /**
 * Prints title/subtitle ( Portfolio )
 */
function eut_print_portfolio_header_title() {

	if ( eut_check_title_visibility() ) {

		$page_title_height = eut_option( 'portfolio_title_height', '350' );
		$page_title_alignment = eut_option( 'portfolio_title_alignment', 'left' );
		$page_title_color = eut_option( 'portfolio_title_color', 'light' );
		$page_description_color = eut_option( 'portfolio_description_color', 'light' );
		$bg_image = 'portfolio_title_background';

		$header_data = eut_header_title();
		$header_title = isset( $header_data['title'] ) ? $header_data['title'] : '';
		$header_description = isset( $header_data['description'] ) ? $header_data['description'] : '';
?>
		<!-- Portfolio Title -->
		<div id="eut-portfolio-title" class="eut-align-<?php echo esc_attr( $page_title_alignment ); ?>" style="height:<?php echo esc_attr( $page_title_height ); ?>px;">
			<div id="eut-portfolio-title-content" data-height="<?php echo esc_attr( $page_title_height ); ?>">
				<?php do_action( 'eut_portfolio_title_top' ); ?>
				<div class="eut-container">
					<h1 class="eut-title eut-<?php echo esc_attr( $page_title_color ); ?>"><span><?php echo esc_html( $header_title ); ?></span></h1>
					<?php if ( !empty( $header_description ) ) { ?>
					<div class="eut-description eut-<?php echo esc_attr( $page_description_color ); ?>"><?php echo wp_kses_post( $header_description ); ?></div>
					<?php } ?>
				</div>
				<?php do_action( 'eut_portfolio_title_bottom' ); ?>
			</div>
			<?php eut_print_title_bg_image_container( $bg_image ); ?>
		</div>
		<!-- End Portfolio Title -->
<?php
	} else {
?>
	<h2 class="eut-hidden"><span><?php the_title(); ?></span></h2>
<?php
	}
}

 /**
 * Prints title/subtitle ( Post )
 */
function eut_print_post_header_title( $position = 'top' ) {

	if ( eut_check_title_visibility() ) {
?>
		<!-- Post Title -->
		<h1 class="eut-single-post-title" itemprop="name headline"><span><?php the_title(); ?></span></h1>
		<!-- End Post Title -->
<?php
	} else {
?>
		<h2 class="eut-hidden" itemprop="name headline"><span><?php the_title(); ?></span></h2>
<?php
	}
}

/**
 * Prints header top bar text
 */
function eut_print_header_top_bar_text( $text ) {
	if ( !empty( $text ) ) {
?>
		<li class="eut-topbar-item"><p><?php echo do_shortcode( $text ); ?></p></li>
<?php
	}
}

/**
 * Prints header top bar options
 */
function eut_print_header_top_bar_options( $options ) {

	if ( !empty( $options ) ) {

?>
		<li class="eut-topbar-item">
			<ul class="eut-options">
				<?php if ( isset( $options['search'] ) && 1 == $options['search'] ) { ?>
				<li><a href="#eut-search-modal" class="fa fa-search eut-toggle-search-modal"></a></li>
				<?php } ?>
			</ul>
		</li>
<?php
	}

}
/**
 * Prints header top bar socials
 */
function eut_print_header_top_bar_socials( $options ) {

	$social_options = eut_option('social_options');
	if ( !empty( $options ) && !empty( $social_options ) ) {
		?>
			<li class="eut-topbar-item">
				<ul class="eut-social">
		<?php
		foreach ( $social_options as $key => $value ) {
			if ( isset( $options[$key] ) && 1 == $options[$key] && $value ) {
				if ( 'skype' == $key ) {
					echo '<li><a href="' . esc_url( $value, array( 'skype', 'http', 'https' ) ) . '" class="fa fa-' . esc_attr( $key ) . '"></a></li>';
				} else {
					echo '<li><a href="' . esc_url( $value ) . '" target="_blank" class="fa fa-' . esc_attr( $key ) . '"></a></li>';
				}
			}
		}
		?>
				</ul>
			</li>
		<?php
	}

}

/**
 * Prints header top bar language selector
 */
function eut_print_header_top_bar_language_selector() {

	//start language selector output buffer
    ob_start();

	$languages = '';
	$skip_missing = eut_option('language_switcher_skip_missing', '0' );
	$skip_missing = intval( $skip_missing );

	//Polylang
	if( function_exists( 'pll_the_languages' ) ) {
		$languages = pll_the_languages( array( 'raw'=>1, 'hide_if_no_translation' => $skip_missing ) );

		$lang_option_current = $lang_options = '';

		foreach ( $languages as $l ) {

			if ( !$l['current_lang'] ) {
				$lang_options .= '<li>';
				$lang_options .= '<a href="' . esc_url( $l['url'] ) . '" class="eut-language-item">';
				$lang_options .= '<img src="' . esc_url( $l['flag'] ) . '" alt="' . esc_attr( $l['name'] ) . '"/>';
				$lang_options .= esc_html( $l['name'] );
				$lang_options .= '</a>';
				$lang_options .= '</li>';
			} else {
				$lang_option_current .= '<a href="#" class="eut-language-item">';
				$lang_option_current .= '<img src="' . esc_url( $l['flag'] ) . '" alt="' . esc_attr( $l['name'] ) . '"/>';
				$lang_option_current .= esc_html( $l['name'] );
				$lang_option_current .= '</a>';
			}
		}

	}

	//WPML
	if ( defined( 'ICL_SITEPRESS_VERSION' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {

		$languages = icl_get_languages( 'skip_missing=' . $skip_missing );
		if ( ! empty( $languages ) ) {

			$lang_option_current = $lang_options = '';

			foreach ( $languages as $l ) {

				if ( !$l['active'] ) {
					$lang_options .= '<li>';
					$lang_options .= '<a href="' . esc_url( $l['url'] ) . '" class="eut-language-item">';
					$lang_options .= '<img src="' . esc_url( $l['country_flag_url'] ) . '" alt="' . esc_attr( $l['language_code'] ) . '"/>';
					$lang_options .= esc_html( $l['native_name'] );
					$lang_options .= '</a>';
					$lang_options .= '</li>';
				} else {
					$lang_option_current .= '<a href="#" class="eut-language-item">';
					$lang_option_current .= '<img src="' . esc_url( $l['country_flag_url'] ) . '" alt="' . esc_attr( $l['language_code'] ) . '"/>';
					$lang_option_current .= esc_html( $l['native_name'] );
					$lang_option_current .= '</a>';
				}
			}
		}
	}
	if ( ! empty( $languages ) ) {

?>
	<li class=" eut-topbar-item">
		<ul class="eut-language">
			<li>
				<?php echo $lang_option_current; ?>
				<ul>
					<?php echo $lang_options; ?>
				</ul>
			</li>
		</ul>
	</li>
<?php
	}
	//store the language selector buffer and clean
	$eut_lang_selector_out = ob_get_clean();
	echo apply_filters( 'eut_header_top_bar_language_selector', $eut_lang_selector_out );
}


/**
 * Prints header top bar
 */
function eut_print_header_top_bar() {

	if ( eut_visibility( 'top_bar_enabled' ) ) {
		if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_top_bar' ) ) {
			return;
		} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_top_bar' ) ) {
			return;
		}
		$eut_fullwidth = eut_option( 'top_bar_section_type' );
		$eut_top_bar_class = '';

		if ( 'fullwidth-element' == $eut_fullwidth ) {
			$eut_top_bar_class = 'eut-fullwidth';
		}
?>
		<!-- Top Bar -->
		<div id="eut-top-bar" class="<?php echo esc_attr( $eut_top_bar_class ); ?>">

			<div class="eut-container">

				<?php
				if ( eut_visibility( 'top_bar_left_enabled' ) ) {
				?>
				<ul class="eut-bar-content eut-left-side">
					<?php

						//Top Left First Item Hook
						do_action( 'eut_header_top_bar_left_first_item' );

						//Top Left Text
						$eut_left_text = eut_option('top_bar_left_text');
						eut_print_header_top_bar_text( $eut_left_text );

						//Top Left Options
						$top_bar_left_options = eut_option('top_bar_left_options');
						eut_print_header_top_bar_options( $top_bar_left_options );

						//Top Left Language selector
						if ( isset( $top_bar_left_options['language'] ) && 1 == $top_bar_left_options['language'] ) {
							eut_print_header_top_bar_language_selector();
						}

						//Top Left Social
						if ( eut_visibility( 'top_bar_left_social_visibility' ) ) {
							$top_bar_left_social_options = eut_option('top_bar_left_social_options');
							eut_print_header_top_bar_socials( $top_bar_left_social_options );
						}

						//Top Left Last Item Hook
						do_action( 'eut_header_top_bar_left_last_item' );

					?>
				</ul>
				<?php
					}
				?>

				<?php
				if ( eut_visibility( 'top_bar_right_enabled' ) ) {
				?>
				<ul class="eut-bar-content eut-right-side">
					<?php

						//Top Right First Item Hook
						do_action( 'eut_header_top_bar_right_first_item' );

						//Top Right Text
						$eut_right_text = eut_option('top_bar_right_text');
						eut_print_header_top_bar_text( $eut_right_text );

						//Top Right Options
						$top_bar_right_options = eut_option('top_bar_right_options');
						eut_print_header_top_bar_options( $top_bar_right_options );

						//Top Right Language selector
						if ( isset( $top_bar_right_options['language'] ) && 1 == $top_bar_right_options['language'] ) {
							eut_print_header_top_bar_language_selector();
						}
						//Top Right Social
						if ( eut_visibility( 'top_bar_right_social_visibility' ) ) {
							$top_bar_right_social_options = eut_option('top_bar_right_social_options');
							eut_print_header_top_bar_socials( $top_bar_right_social_options );
						}

						//Top Right Last Item Hook
						do_action( 'eut_header_top_bar_right_last_item' );

					?>


				</ul>
				<?php
					}
				?>
			</div>

		</div>
		<!-- End Top Bar -->
<?php

	}
}

/**
 * Check header menu options visibility
 */
function eut_header_menu_options_visibility() {

	if ( eut_visibility( 'header_menu_options_enabled' ) ) {

		if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_menu_items' ) ) {
			return false;
		} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_menu_items' ) ) {
			return false;
		}
		return true;
	}

	return false;

}

/**
 * Prints header menu options e.g: social, language selector, search
 */
function eut_print_header_menu_options( $mode = '') {

	if ( eut_header_menu_options_visibility() ) {

		$header_menu_options = eut_option('header_menu_options');
		if ( 'responsive' == $mode ) {
			$search_visibility = eut_array_value( $header_menu_options , 'search' );
			if ( 1 == $search_visibility ) {
			?>
				<div class="eut-widget">
					<?php get_search_form(); ?>
				</div>
			<?php
			}
		}

?>
		<!-- Menu Options -->
		<ul class="eut-menu-options">
<?php
			do_action( 'eut_header_menu_options_first_item' );

			if ( !empty( $header_menu_options ) ) {
				foreach ( $header_menu_options as $key => $value ) {
					if( 1 == $value ) {
						if ( 'search' == $key && '' == $mode) {
						?>
							<li><a href="#eut-search-modal" class="fa fa-search eut-toggle-search-modal"></a></li>
						<?php
						} else if ( 'language' == $key ) {
							eut_print_header_language_flags();
						}
					}
				}
			}

			if ( eut_visibility( 'header_menu_social_visibility' ) ) {
				$header_social_options = eut_option('header_menu_social_options');
				$social_options = eut_option('social_options');
				if ( !empty( $header_social_options ) && !empty( $social_options ) ) {

					foreach ( $social_options as $key => $value ) {
						if ( isset( $header_social_options[$key] ) && 1 == $header_social_options[$key] && $value ) {
							if ( 'skype' == $key ) {
								echo '<li><a href="' . esc_url( $value, array( 'skype', 'http', 'https' ) ) . '" class="fa fa-' . esc_attr( $key ) . '"></a></li>';
							} else {
								echo '<li><a href="' . esc_url( $value ) . '" target="_blank" class="fa fa-' . esc_attr( $key ) . '"></a></li>';
							}
						}
					}

				}
			}

			do_action( 'eut_header_menu_options_last_item' );
?>
		</ul>
		<!-- End Menu Options -->
<?php

	}

}

/**
 * Prints Header Search modal
 */
function eut_print_header_search_modal() {
		$form = '';
?>
		<div id="eut-search-modal" class="eut-modal">
			<div class="eut-modal-content">
				<?php echo eut_modal_wpsearch( $form ); ?>
			</div>
		</div>
<?php
}

/**
 * Prints header language selector
 * WPML is required
 * Can be used to add custom php code for other translation flags.
 */
function eut_print_header_language_flags() {

	$skip_missing = eut_option('language_switcher_skip_missing', '0' );
	$skip_missing = intval( $skip_missing );

	//start language selector output buffer
	ob_start();

	//Polylang
	if( function_exists( 'pll_the_languages' ) ) {
		$languages = pll_the_languages( array( 'raw'=>1, 'hide_if_no_translation' => $skip_missing ) );
		if ( ! empty( $languages ) ) {
			foreach ( $languages as $l ) {
				echo '<li>';
				if ( !$l['current_lang'] ) {
					echo '<a href="' . $l['url'] . '">';
					echo '<img src="' . esc_url( $l['flag'] ) . '" alt="' . esc_attr( $l['name'] ) . '"/>';
				} else {
					echo '<a href="#" class="active">';
					echo '<img src="' . esc_url( $l['flag'] ) . '" alt="' . esc_attr( $l['name'] ) . '"/>';
				}
				echo '</a></li>';
			}
		}
	}

	//WPML
	if ( defined( 'ICL_SITEPRESS_VERSION' ) && defined( 'ICL_LANGUAGE_CODE' ) ) {
		$languages = icl_get_languages( 'skip_missing=' . $skip_missing );
		if ( ! empty( $languages ) ) {
			foreach ( $languages as $l ) {
				echo '<li>';
				if ( !$l['active'] ) {
					echo '<a href="' . $l['url'] . '">';
					echo '<img src="' . esc_url( $l['country_flag_url'] ) . '" alt="' . esc_attr( $l['language_code'] ) . '"/>';
				} else {
					echo '<a href="#" class="active">';
					echo '<img src="' . esc_url( $l['country_flag_url'] ) . '" alt="' . esc_attr( $l['language_code'] ) . '"/>';
				}
				echo '</a></li>';
			}
		}
	}

	//store the language selector buffer and clean
	$eut_lang_selector_out = ob_get_clean();
	echo apply_filters( 'eut_header_language_flags', $eut_lang_selector_out );

}

function eut_print_item_nav_link( $post_id,  $direction, $title = '' ) {

	$icon_class = 'nav-right';
	if ( 'prev' == $direction ) {
		$icon_class = 'nav-left';
	}
?>
	<li><a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="eut-icon-<?php echo esc_attr( $icon_class ); ?>" title="<?php echo esc_attr( $title ); ?>"></a></li>
<?php
}

/**
 * Prints Tracking code for analytics e.g: Google Analytics
 */
add_action('wp_head', 'eut_print_tracking_code');
add_action('wp_head', 'eut_print_tracking_code_custom');

if ( !function_exists('eut_print_tracking_code_custom') ) {

	function eut_print_tracking_code_custom() {
		$tracking_code = eut_option( 'tracking_code_custom' );
		if ( !empty( $tracking_code ) ) {
			echo "" . $tracking_code;
		}
	}
}

if ( !function_exists('eut_print_tracking_code') ) {

	function eut_print_tracking_code() {

		$tracking_code = eut_option( 'tracking_code' );
		$tracking_analytics = eut_option( 'tracking_analytics', 'classic' );
		if ( !empty( $tracking_code ) ) {
			if ( 'universal' == $tracking_analytics ) {
?>
				<script>

				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo eut_option( 'tracking_code' ); ?>', 'auto');
				ga('send', 'pageview');

				</script>
<?php
			} else {
?>
				<script type='text/javascript'>

				  var _gaq = _gaq || [];
				  _gaq.push(['_setAccount', '<?php echo eut_option( 'tracking_code' );?>']);
				  _gaq.push(['_trackPageview']);

				  (function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				  })();

				</script>
<?php
			}
		}
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
