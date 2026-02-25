<!doctype html>
<html class="no-js eut-responsive" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- allow pinned sites -->
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<body id="eut-body" <?php body_class(); ?>>

		<!-- Theme Wrapper -->
		<div id="eut-theme-wrapper">
			<?php
				$page_title_color = eut_option( 'page_title_color', 'dark' );
				$page_section_class = 'eut-section eut-' . $page_title_color;
			?>
			<div id="eut-main-content" class="eut-error-404">
				<div class="eut-container">
					<div class="<?php echo esc_attr( $page_section_class ); ?>" data-full-height="yes">
						<div class="eut-row">
							<div class="eut-column eut-column-1">

								<div class="eut-align-center">

									<div id="eut-content-area">
									<?php
										$eut_404_search_box = eut_option('page_404_search');
										$eut_404_home_button = eut_option('page_404_home_button');
										echo do_shortcode( eut_option( 'page_404_content' ) );
									?>
									</div>

									<?php if ( $eut_404_search_box ) { ?>
									<div class="eut-widget">
										<?php get_search_form(); ?>
									</div>

									<?php } ?>

									<?php if ( $eut_404_home_button ) { ?>
									<div class="eut-element">
										<a class="eut-btn eut-btn-medium eut-round eut-bg-primary-1" target="_self" href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<span><?php bloginfo('name'); ?></span>
										</a>
									</div>
									<?php } ?>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>


		</div> <!-- end #eut-theme-wrapper -->

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>