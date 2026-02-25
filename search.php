<?php get_header(); ?>

<div id="eut-main-content">

	<?php eut_print_header_title(); ?>

	<div class="eut-container">
		<!-- Content -->
		<div id="eut-content-area">
			<div class="eut-section" data-section-type="in-container" data-parallax="no">
				<div class="eut-row">
					<div class="eut-column eut-column-1">

					<?php
						if ( have_posts() ) :

					?>
						<div class="eut-element eut-blog eut-large-media">
							<div class="eut-standard-container">
							<?php

								// Start the Loop.
								while ( have_posts() ) : the_post();
									//Get post template
									get_template_part( 'templates/search', 'large' );

								endwhile;
							?>
							</div>
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
					<!-- End Content -->
				</div>
			</div>
		</div>

	</div>
</div>
<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.
