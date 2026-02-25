<?php get_header(); ?>

<div id="eut-main-content">

	<?php eut_print_header_title( 'blog' ); ?>

	<div class="eut-container <?php echo eut_sidebar_class(); ?>">
		<!-- Content -->
		<div id="eut-content-area">

			<div class="eut-section" data-section-type="in-container" data-parallax="no">
				<div class="eut-row">
					<div class="eut-column eut-column-1">

						<?php
							$blog_style = eut_option( 'blog_style' );
							$eut_blog_style_class = eut_get_blog_class();
						?>
						<div class="eut-element <?php echo esc_attr( $eut_blog_style_class ); ?>" <?php eut_print_blog_data(); ?>>

							<?php
							if ( have_posts() ) :
								if ( 'large-media' == $blog_style || 'small-media' == $blog_style ) {
							?>
							<div class="eut-standard-container">
							<?php
								} else {
							?>
							<div class="eut-isotope-container">
							<?php								
								}

							// Start the Loop.
							while ( have_posts() ) : the_post();
								//Get post template
								get_template_part( 'content', get_post_format() );
							endwhile;

							?>
							</div>
							<?php
								// Previous/next post navigation.
								eut_paginate_links();
							else :
								// If no content, include the "No posts found" template.
								get_template_part( 'content', 'none' );
							endif;
							?>

						</div>
						<!-- End Element Blog -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Content -->
		<?php
			eut_set_current_view( 'blog' );
			if ( is_front_page() ) {
				eut_set_current_view( 'frontpage' );
			}
		?>
		<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.
