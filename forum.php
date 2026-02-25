<?php get_header(); ?>
<?php the_post(); ?>
<div id="eut-main-content">

	<?php eut_print_header_title( 'forum' ); ?>
	<div class="eut-container <?php echo eut_sidebar_class( 'forum' ); ?>">
		<!-- Content -->
		<div id="eut-content-area">
		
			<!-- Content -->
			<div id="eut-forum-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</div>
			<!-- End Content -->

		</div>
		<!-- End Content -->
		<?php eut_set_current_view( 'forum' ); ?>
		<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();

//Omit closing PHP tag to avoid accidental whitespace output errors.