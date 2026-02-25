<?php

/*
*	Footer Helper functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/


/**
 * Prints Footer Widgets
 */
function eut_print_footer_widgets() {

	if ( eut_visibility( 'footer_widgets_visibility' ) ) {

		if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_footer' ) ) {
			return;
		} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_footer' ) ) {
			return;
		}

		$eut_footer_columns = eut_option('footer_widgets_layout');

		switch( $eut_footer_columns ) {
			case 'footer-1':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-3-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-4-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
				);
			break;
			case 'footer-2':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-2',
						'tablet-column' => '1',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-3-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
				);
			break;
			case 'footer-3':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-3-sidebar',
						'column' => '1-2',
						'tablet-column' => '1',
					),
				);
			break;
			case 'footer-4':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-2',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-2',
						'tablet-column' => '1-2',
					),
				);
			break;
			case 'footer-5':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-3',
						'tablet-column' => '1-3',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-3',
						'tablet-column' => '1-3',
					),
					array(
						'sidebar-id' => 'eut-footer-3-sidebar',
						'column' => '1-3',
						'tablet-column' => '1-3',
					),
				);
			break;
			case 'footer-6':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '2-3',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-3',
						'tablet-column' => '1-2',
					),
				);
			break;
			case 'footer-7':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-3',
						'tablet-column' => '1-2',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '2-3',
						'tablet-column' => '1-2',
					),
				);
			break;
			case 'footer-8':
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-3',
					),
					array(
						'sidebar-id' => 'eut-footer-2-sidebar',
						'column' => '1-2',
						'tablet-column' => '1-3',
					),
					array(
						'sidebar-id' => 'eut-footer-3-sidebar',
						'column' => '1-4',
						'tablet-column' => '1-3',
					),
				);
			break;
			case 'footer-9':
			default:
				$footer_sidebars = array(
					array(
						'sidebar-id' => 'eut-footer-1-sidebar',
						'column' => '1',
						'tablet-column' => '1',
					),
				);
			break;
		}

		$section_type = eut_option( 'footer_section_type', 'fullwidth-background' );
?>
		<div id="eut-footer-area" class="eut-section" data-section-type="<?php echo esc_attr( $section_type ); ?>">
			<div class="eut-row">
<?php

			foreach ( $footer_sidebars as $footer_sidebar ) {
				echo '<div class="eut-column eut-column-' . $footer_sidebar['column'] . ' eut-tablet-column-' . $footer_sidebar['tablet-column'] . '">';
				dynamic_sidebar( $footer_sidebar['sidebar-id'] );
				echo '</div>';
			}
?>
			</div>
		</div>
<?php

	}
}

/**
 * Prints Footer Bar Area
 */
function eut_print_footer_bar() {

	if ( eut_visibility( 'footer_bar_visibility' ) ) {
		if ( eut_visibility( 'footer_copyright_visibility' ) ) {
			if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_copyright' ) ) {
				return;
			} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_copyright' ) ) {
				return;
			}
			$section_type = eut_option( 'footer_bar_section_type', 'fullwidth-background' );
			$align_center = eut_option( 'footer_bar_align_center', 'no' );
			$second_area = eut_option( 'second_area_visibility', '1' );
?>
			<div id="eut-footer-bar" class="eut-section" data-section-type="<?php echo esc_attr( $section_type ); ?>" data-align-center="<?php echo esc_attr( $align_center ); ?>">

				<div class="eut-row">
					<div class="eut-column eut-column-1-2">
						<div class="eut-copyright">
							<?php echo do_shortcode( eut_option( 'footer_copyright_text' ) ); ?>
						</div>
					</div>
					<?php if ( '2' == $second_area ) { ?>
					<div class="eut-column eut-column-1-2">
						<nav id="eut-second-menu">
							<?php eut_footer_nav(); ?>
						</nav>
					</div>
					<?php
					} else if ( '3' == $second_area ) { ?>
					<div class="eut-column eut-column-1-2">
						<?php
						global $eut_social_list;
						$options = eut_option('footer_social_options');
						$social_display = eut_option('footer_social_display', 'text');
						$social_options = eut_option('social_options');

						if ( !empty( $options ) && !empty( $social_options ) ) {
							if ( 'text' == $social_display ) {
								echo '<ul class="eut-element eut-social">';
								foreach ( $social_options as $key => $value ) {
									if ( isset( $options[$key] ) && isset( $eut_social_list[$key] ) && 1 == $options[$key] && $value ) {
										if ( 'skype' == $key ) {
											echo '<li><a href="' . esc_url( $value, array( 'skype', 'http', 'https' ) ) . '">' . $eut_social_list[$key] . '</a></li>';
										} else {
											echo '<li><a href="' . esc_url( $value ) . '" target="_blank">' . $eut_social_list[$key] . '</a></li>';
										}
									}
								}
								echo '</ul>';
							} else {
								echo '<ul class="eut-element eut-social eut-social-icons">';
								foreach ( $social_options as $key => $value ) {
									if ( isset( $options[$key] ) && 1 == $options[$key] && $value ) {
										if ( 'skype' == $key ) {
											echo '<li><a href="' . esc_url( $value, array( 'skype', 'http', 'https' ) ) . '" class="fa fa-' . $key . '"></a></li>';
										} else {
											echo '<li><a href="' . esc_url( $value ) . '" target="_blank" class="fa fa-' . $key . '"></a></li>';
										}
									}
								}
								echo '</ul>';
							}
						}
						?>
					</div>
					<?php
					}
					?>

				</div>
			</div>

<?php
		}
	}
}

/**
 * Prints Custom javascript code
 */
add_action( 'wp_footer', 'eut_print_custom_js_code', 100 );
if ( !function_exists('eut_print_custom_js_code') ) {

	function eut_print_custom_js_code() {
		$custom_js_code = eut_option( 'custom_js' );
		if ( !empty( $custom_js_code ) ) {
			echo "<script type='text/javascript'>". $custom_js_code . "</script>";
		}
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.