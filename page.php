<?php get_header(); ?>

<?php the_post(); ?>

<?php
	if ( 'yes' == eut_post_meta( 'eut_disable_content' ) ) {
		get_footer();
	} else {
?>

		<div id="eut-main-content">

			<?php eut_print_header_title(); ?>

			<?php
				$page_nav_menu = eut_post_meta( 'eut_page_navigation_menu' );



				if ( !empty($page_nav_menu) ) {
					$eut_anchor_current_link = eut_option('page_anchor_menu_highlight_current');
					$eut_anchor_incontainer = eut_option('page_anchor_menu_incontainer');
					$eut_anchor_center = eut_option('page_anchor_menu_center');
					$eut_anchor_class = 'eut-fields-bar';
					if ( '1' == $eut_anchor_current_link ) {
						$eut_anchor_class .= ' eut-current-link';
					}
					if ( '1' == $eut_anchor_incontainer ) {
						$eut_anchor_class .= ' eut-incontainer';
					}
					if ( '1' == $eut_anchor_center ) {
						$eut_anchor_class .= ' eut-center-anchor-menu';
					}
			?>
			<div id="eut-anchor-menu-wrapper">
				<div id="eut-anchor-menu" class="<?php echo esc_attr( $eut_anchor_class ); ?>">

						<div class="eut-menu-button">
							<div class="eut-menu-button-line"></div>
							<div class="eut-menu-button-line"></div>
							<div class="eut-menu-button-line"></div>
						</div>

						<?php
						wp_nav_menu(
							array(
								'menu' => $page_nav_menu, /* menu id */
								'container' => false, /* no container */
							)
						);
						?>
				</div>
			</div>
			<?php
				}
			?>
			<div class="eut-container <?php echo eut_sidebar_class(); ?>">

				<!-- Content Area -->
				<div id="eut-content-area">

					<!-- Content -->
					<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</div>
					<!-- End Content -->

					<?php comments_template(); ?>

				</div>
				<?php eut_set_current_view( 'page' ); ?>
				<?php get_sidebar(); ?>

			</div>

		</div>

	<?php get_footer(); ?>

<?php
	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
	