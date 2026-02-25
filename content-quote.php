<?php
/**
 * The Quote Post Type Template
 */
?>

<?php
if ( is_singular() ) {
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'eut-single-post eut-post-quote' ); ?> itemscope itemType="http://schema.org/BlogPosting">
		<div id="eut-post-content">
			<?php eut_print_post_header_title( 'content' ); ?>
			<?php eut_print_post_meta(); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<p class="eut-leader-text" itemprop="articleBody">
			<?php
				global $allowedposttags;
				$mytags = $allowedposttags;
				unset($mytags['a']);
				unset($mytags['img']);
				unset($mytags['p']);
				unset($mytags['blockquote']);
			?>
			<?php echo wp_kses( get_the_content(), $mytags ); ?>
			</p>
		</div>
	</article>

<?php
} else {
	$eut_post_class = eut_get_post_class( 'eut-label-post' );
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $eut_post_class ); ?> itemscope itemType="http://schema.org/BlogPosting">
		<?php do_action( 'eut_inner_post_loop_item_before' ); ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_title( '<h4 class="eut-hidden" itemprop="name headline">', '</h4>' ); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<p class="eut-leader-text" itemprop="articleBody">
			<?php
				global $allowedposttags;
				$mytags = $allowedposttags;
				unset($mytags['a']);
				unset($mytags['img']);
				unset($mytags['p']);
				unset($mytags['blockquote']);
			?>
			<?php echo wp_kses( get_the_content(), $mytags ); ?>
			</p>
			<?php eut_print_post_date(); ?>
		</a>
		<?php do_action( 'eut_inner_post_loop_item_after' ); ?>
	</article>

<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
