
			<?php $eut_sticky_footer = eut_visibility( 'sticky_footer' ) ? 'yes' : 'no'; ?>

			<footer id="eut-footer" data-sticky-footer="<?php echo esc_attr( $eut_sticky_footer ); ?>">

				<div class="eut-container">

				<?php eut_print_footer_widgets(); ?>
				<?php eut_print_footer_bar(); ?>

				</div>
				<?php eut_print_title_bg_image_container( 'footer_background' ); ?>
			</footer>

		</div> <!-- end #eut-theme-wrapper -->
		<?php do_action( 'eut_theme_wrapper_after' ); ?>

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>