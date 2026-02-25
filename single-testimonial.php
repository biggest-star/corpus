<?php get_header(); ?>

	<div id="eut-main-content" class="eut-single-post-content">
		<?php
			the_post();
			$name =  eut_post_meta( 'eut_testimonial_name' );
			$identity =  eut_post_meta( 'eut_testimonial_identity' );
			if ( !empty( $name ) && !empty( $identity ) ) {
				$identity = ', ' . $identity;
			}
		?>

		<div class="eut-container">

			<div id="eut-content-area">
				<div class="eut-element eut-testimonial">
					<div class="eut-testimonial-element">
						<?php the_content(); ?>
						<?php if ( !empty( $name ) || !empty( $identity ) ) { ?>
						<div class="eut-testimonial-name"><?php echo esc_html( $name . $identity ); ?></div>
						<?php } ?>
					</div>
				</div>

				<?php wp_link_pages(); ?>

				<?php eut_print_post_navigation(); ?>

			</div>
		</div>
	</div>

<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.
