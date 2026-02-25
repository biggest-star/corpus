<?php get_header(); ?>

	<div id="eut-main-content" class="eut-single-post-content">
		<?php the_post(); ?>

		<div class="eut-container <?php echo eut_sidebar_class(); ?>">

			<div id="eut-content-area">

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php wp_link_pages(); ?>

				<?php

					//Post Social
					eut_print_post_social();

					//Post Meta Bar ( Categories / Tags )					
					eut_print_post_meta_bar();

					//Post About Author
					if ( eut_visibility( 'post_author_visibility' ) ) {
						eut_print_post_about_author();
					}

					//Post Navigation
					if ( eut_visibility( 'post_nav_visibility' ) ) {
						eut_print_post_navigation();
					}

					//Post Related Posts
					if ( eut_visibility( 'post_related_visibility' ) ) {
						eut_print_related_posts();
					}

					//Post Comments
					if ( eut_visibility( 'blog_comments_visibility' ) ) {
						comments_template();
					}

				?>

			</div>
			<?php eut_set_current_view( 'post' ); ?>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.