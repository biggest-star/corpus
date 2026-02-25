<?php get_header(); ?>

<?php the_post(); ?>

	<div id="eut-main-content" class="eut-single-portfolio-content">

		<?php eut_print_portfolio_header_title(); ?>

		<?php
			$eut_disable_portfolio_fields_bar = eut_post_meta( 'eut_disable_portfolio_fields_bar' );
			$eut_disable_social_bar = eut_post_meta( 'eut_disable_social_bar' );
			$eut_disable_portfolio_recent = eut_post_meta( 'eut_disable_portfolio_recent' );
			$eut_disable_comments = eut_post_meta( 'eut_disable_comments' );
			$eut_sidebar_layout = eut_post_meta( 'eut_portfolio_layout', eut_option( 'portfolio_layout', 'none' ) );
			$eut_sidebar_extra_content = eut_check_portfolio_details();
			$eut_portfolio_details_sidebar = false;
			if( $eut_sidebar_extra_content && 'none' == $eut_sidebar_layout ) {
				$eut_portfolio_details_sidebar = true;
			}
		?>


		<div class="eut-container <?php echo eut_sidebar_class(); ?>">

			<?php
				if ( $eut_portfolio_details_sidebar ) {
			?>
				<div id="eut-single-media">
					<?php eut_print_portfolio_media(); ?>
				</div>
			<?php
				}
			?>

			<div id="eut-content-area">
				<article id="post-<?php the_ID(); ?>" <?php post_class('eut-single-porfolio'); ?>>

					<?php
						if ( !$eut_portfolio_details_sidebar ) {
					?>
						<div id="eut-single-media">
							<?php eut_print_portfolio_media(); ?>
						</div>
					<?php
						}
					?>
					<div id="eut-post-content">
						<?php the_content(); ?>
					</div>

				</article>

				<?php if ( $eut_sidebar_extra_content ) { ?>
					<div id="eut-portfolio-info-responsive">
						<?php eut_print_portfolio_details(); ?>
					</div>
				<?php } ?>

				<?php

					//Portfolio Social
					if ( 'yes' != $eut_disable_social_bar ) {
						eut_print_portfolio_social();
					}

				?>

			</div>
			<?php
				if ( $eut_portfolio_details_sidebar ) {
			?>
				<aside id="eut-sidebar">
					<?php eut_print_portfolio_details(); ?>
				</aside>
			<?php
				} else {
					eut_set_current_view( 'portfolio' );
					get_sidebar();
				}
			?>
			<div class="clear"></div>

			<?php

				//Portfolio Navigation
				if ( eut_visibility( 'portfolio_nav_visibility', '1' ) ) {
					eut_print_portfolio_navigation();
				}

				//Portfolio Recent Items
				if ( eut_visibility( 'portfolio_recents_visibility' ) && 'yes' != $eut_disable_portfolio_recent ) {
					eut_print_recent_portfolio_items();
				}

				//Portfolio Comments
				if ( eut_visibility( 'portfolio_comments_visibility' ) && 'yes' != $eut_disable_comments ) {
					comments_template();
				}

			?>


		</div>

	</div>
	<!-- End Content -->

<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.
