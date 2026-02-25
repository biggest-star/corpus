<!doctype html>

<!--[if lt IE 10]>
<html class="ie9 no-js eut-responsive" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js eut-responsive" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
		<!-- allow pinned sites -->
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php } ?>
		<?php wp_head(); ?>
	</head>

	<body id="eut-body" <?php body_class(); ?>>
		<?php if ( eut_visibility( 'theme_loader' ) ) { ?>
		<!-- LOADER -->
		<div id="eut-loader-overflow">
			<div id="eut-loader"></div>
		</div>
		<?php } ?>

		<?php
			$eut_logo_align = eut_option( 'logo_align', 'left' );
			$eut_menu_align = eut_option( 'menu_align', 'right' );

			$eut_header_menu_options_align = eut_option( 'header_menu_options_align', 'right' );
			$eut_header_menu_options = eut_visibility( 'header_menu_options_enabled' ) ? $eut_header_menu_options_align : 'no';

			if( 'no' != $eut_header_menu_options ) {
				if ( !eut_header_menu_options_visibility() ) {
					$eut_header_menu_options = 'no';
				}
			}

			$eut_menu_type = eut_option( 'menu_type', 'simply' );
			$eut_sticky_header_type = eut_option( 'header_sticky_type', 'simply');
			$eut_disable_sticky = '';
			if ( is_singular( 'page' ) || is_singular( 'portfolio' ) ) {
				$eut_menu_type = eut_post_meta( 'eut_main_navigation_menu_type', $eut_menu_type );
				$eut_disable_sticky = eut_post_meta( 'eut_disable_sticky', $eut_disable_sticky );
				$eut_sticky_header_type = eut_post_meta( 'eut_sticky_header_type', $eut_sticky_header_type );
			} else if ( corpus_eutf_is_woo_shop() ) {
				$eut_menu_type = corpus_eutf_post_meta_shop( 'eut_main_navigation_menu_type', $eut_menu_type );
				$eut_disable_sticky = corpus_eutf_post_meta_shop( 'eut_disable_sticky', $eut_disable_sticky );
				$eut_sticky_header_type = corpus_eutf_post_meta_shop( 'eut_sticky_header_type', $eut_sticky_header_type );
			}

			if ( empty( $eut_menu_type ) ) {
				$eut_menu_type = eut_option( 'menu_type', 'simply' );
			}
			if ( empty( $eut_sticky_header_type ) ) {
				$eut_sticky_header_type = eut_option( 'header_sticky_type', 'simply');
			}

			$eut_sticky_header = eut_visibility( 'header_sticky_enabled' ) ? $eut_sticky_header_type : 'none';
			if ( 'none' != $eut_sticky_header && 'yes' == $eut_disable_sticky ) {
				$eut_sticky_header = 'none';
			}

			$eut_device_sticky_header = eut_visibility( 'header_device_sticky_enabled' ) ? 'yes' : 'no';

			$eut_top_bar = eut_visibility( 'top_bar_enabled' ) ? 'yes' : 'no';

			if( 'no' != $eut_top_bar ) {
				if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_top_bar' ) ) {
					$eut_top_bar = 'no';
				} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_top_bar' ) ) {
					$eut_top_bar = 'no';
				}
			}

			$eut_back_to_top = eut_visibility( 'back_to_top_enabled' ) ? 'yes' : 'no';
			$eut_main_menu = eut_get_header_nav();

			$eut_header_fullwidth = eut_option( 'header_fullwidth' );

			$eut_feature_data = eut_get_feature_data();

			//Header Classes
			$eut_header_classes = array();
			$eut_header_classes[] = $eut_feature_data['header_style'];
			$eut_header_class_string = implode( ' ', $eut_header_classes );


			//Inner Header Classes
			$eut_inner_header_classes = array();
			if ( 1 == $eut_header_fullwidth ) {
				$eut_inner_header_classes[] = 'eut-fullwidth';
			}
			$eut_inner_header_class_string = implode( ' ', $eut_inner_header_classes );
		?>

		<?php
			if ( $eut_main_menu != 'disabled' ) {
		?>

		<!-- Responsive Menu -->
		<nav id="eut-main-menu-responsive" class="eut-side-area">
			<div class="eut-menu-wrapper">
				<div class="eut-area-content">
					<div class="eut-close-button-wrapper">
						<a class="eut-close-menu-button" href="#"></a>
					</div>
					<div class="eut-scroller">
						<?php eut_header_nav( $eut_main_menu ); ?>
						<?php eut_print_header_menu_options( 'responsive' ); ?>
					</div>
				</div>
			</div>
		</nav>
		<!-- End Responsive Menu -->

		<?php

			}

			$eut_sidearea_visibility = false;
			if( eut_visibility( 'sidearea_enabled' ) && is_active_sidebar( 'eut-sidearea-sidebar' ) ) {
				$eut_sidearea_visibility = true;
				if ( is_singular() && 'yes' == eut_post_meta( 'eut_disable_sidearea' ) ) {
					$eut_sidearea_visibility = false;
				} else if ( corpus_eutf_is_woo_shop() && 'yes' == corpus_eutf_post_meta_shop( 'eut_disable_sidearea' ) ) {
					$eut_sidearea_visibility = false;
				}
			}

			if ( $eut_sidearea_visibility ) {
		?>

		<!-- Side Area -->
		<nav id="eut-side-area" class="eut-side-area">
			<div class="eut-menu-wrapper">
				<div class="eut-area-content">
					<div class="eut-close-button-wrapper">
						<a class="eut-close-menu-button" href="#"></a>
					</div>
					<div class="eut-scroller">
						<?php dynamic_sidebar( 'eut-sidearea-sidebar' ); ?>
					</div>
				</div>
			</div>
		</nav>
		<!-- End Side Area -->

		<?php
			}
		?>
		<!-- Theme Wrapper -->
		<?php do_action( 'eut_theme_wrapper_before' ); ?>
		<?php
			if ( 'boxed' == eut_option('theme_layout') ) {
				$eut_layout_class = 'eut-boxed';
			} else {
				$eut_layout_class = 'eut-stretched';
			}
		?>
		<div id="eut-theme-wrapper" class="<?php echo esc_attr( $eut_layout_class ); ?>">

			<header id="eut-header" class="<?php echo esc_attr( $eut_header_class_string ); ?>" data-fullscreen="<?php echo esc_attr( $eut_feature_data['data_fullscreen'] ); ?>" data-overlap="<?php echo esc_attr( $eut_feature_data['data_overlap'] ); ?>" data-sticky-header="<?php echo esc_attr( $eut_sticky_header ); ?>" data-device-sticky-header="<?php echo esc_attr( $eut_device_sticky_header ); ?>" data-logo-align="<?php echo esc_attr( $eut_logo_align ); ?>" data-menu-align="<?php echo esc_attr( $eut_menu_align ); ?>" data-menu-type="<?php echo esc_attr( $eut_menu_type ); ?>" data-topbar="<?php echo esc_attr( $eut_top_bar ); ?>" data-menu-options="<?php echo esc_attr( $eut_header_menu_options ); ?>" data-header-position="<?php echo esc_attr( $eut_feature_data['data_header_position'] ); ?>" data-backtotop="<?php echo esc_attr( $eut_back_to_top ); ?>">
				<?php eut_print_header_top_bar(); ?>
				<?php
					if ( 'below-feature' == $eut_feature_data['data_header_position'] ) {
						eut_print_header_feature();
					}
				?>
				<!-- Logo, Main Navigation, Header Options -->
				<div id="eut-header-wrapper">
					<div id="eut-inner-header" class="<?php echo esc_attr( $eut_inner_header_class_string ); ?>">

						<div class="eut-container">

						<?php eut_print_logo(); ?>
						<?php
							if ( eut_header_menu_options_visibility() ) {
						?>
							<div class="eut-menu-options-wrapper">
								<?php eut_print_header_menu_options(); ?>
								<?php
									if ( corpus_eutf_woo_enabled() ) {

										$header_menu_options = eut_option('header_menu_options');
										$cart_visibility = eut_array_value( $header_menu_options , 'cart' );
										if ( $cart_visibility ) {
											global $woocommerce;

											if ( function_exists( 'wc_get_cart_url' ) ) {
												$get_cart_url = wc_get_cart_url();
											} else {
												$get_cart_url = WC()->cart->get_cart_url();
											}
								?>
											<div class="eut-cart-button eut-menu-options">
												<div class="eut-cart-button-wrapper">
													<a href="<?php echo esc_url( $get_cart_url ); ?>" class="fa fa-shopping-bag"><span class="eut-purchased-items"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span></a>
												</div>
											</div>
								<?php
										}
									}
								?>
							</div>
						<?php
							}
						?>

						<?php
							if ( $eut_main_menu != 'disabled' ) {
						?>

							<!-- Main Menu -->
							<?php $eut_submenu_animation = eut_option( 'submenu_animation', 'none' ); ?>
							<?php $eut_submenu_pointer = eut_option( 'submenu_pointer', 'none' ); ?>
							<?php $eut_responsive_menu_selection = eut_option( 'menu_responsive_toggle_selection', 'icon' ); ?>
							<?php $eut_responsive_menu_text = eut_option( 'menu_responsive_toggle_text'); ?>

							<?php if ( 'icon' == $eut_responsive_menu_selection ) { ?>
								<div class="eut-responsive-menu-button eut-toggle-responsive-menu">
									<div class="eut-button-icon">
										<div class="eut-line-icon"></div>
									</div>
								</div>
							<?php } else {?>
								<div class="eut-responsive-menu-text eut-toggle-responsive-menu">
									<?php echo esc_html( $eut_responsive_menu_text ); ?>
								</div>
							<?php } ?>
							<div class="eut-advanced-menu-button">
								<div class="eut-button-icon">
									<div class="eut-line-icon"></div>
								</div>
							</div>
							<nav id="eut-main-menu" class="eut-menu-pointer-<?php echo esc_attr( $eut_submenu_pointer ); ?>" data-animation-style="<?php echo esc_attr( $eut_submenu_animation ); ?>">
								<?php eut_header_nav( $eut_main_menu ); ?>
							</nav>
							<!-- End Main Menu -->
						<?php
							} else {

								do_action( 'eut_header_container_custom_menu_integration' );
							}
						?>

						</div>
						<?php
							do_action( 'eut_header_inner_custom_menu_integration' );
							if ( class_exists('UberMenu') && 'ubermenu' == eut_option( 'menu_header_integration', 'default' )) {
								uberMenu_direct( 'eut_header_nav' );
							}
						?>

					</div>
				</div>
				<div class="clear"></div>

				<!-- End Logo, Main Navigation, Header Options -->

				<?php
					if ( 'above-feature' == $eut_feature_data['data_header_position'] ) {
						eut_print_header_feature();
					}
				?>
				<!-- End Feature Section -->


				<?php do_action( 'eut_header_modal_container' ); ?>

			</header>

			<?php if ( $eut_sidearea_visibility ) {	?>
			<div class="eut-side-area-button eut-toggle-sidearea">
				<div class="eut-button-icon">
					<div class="eut-dot-icon"></div>
				</div>
			</div>
			<?php } ?>

<?php 		eut_print_header_search_modal();

//Omit closing PHP tag to avoid accidental whitespace output errors.
