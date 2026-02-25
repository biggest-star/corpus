<?php
/*
*	Template Portfolio Recent
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/
?>

<article id="portfolio-recent-<?php the_ID(); ?><?php echo uniqid('-'); ?>" <?php post_class( 'eut-portfolio' ); ?>>
	<div class="eut-media eut-image-hover">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php eut_print_portfolio_image( 'eut-image-small-rect-horizontal' ); ?>
		</a>
	</div>
	<div class="eut-content">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<h6 class="eut-title"><?php the_title(); ?></h6>
		</a>
		<?php
			$caption = eut_post_meta( 'eut_portfolio_description' );
			if ( !empty( $caption ) ) {
		?>
			<div class="eut-small-text eut-caption"><?php echo wp_kses_post( $caption ); ?></div>
		<?php
			}
		?>
	</div>

</article>