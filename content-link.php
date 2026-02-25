<?php
/**
 * The Link Post Type Template
 */
?>

<?php

$eut_link = get_post_meta( get_the_ID(), 'eut_post_link_url', true );
$new_window = get_post_meta( get_the_ID(), 'eut_post_link_new_window', true );

if( empty( $eut_link ) ) {
	$eut_link = get_permalink();
}

$eut_target = '_self';
if( !empty( $new_window ) ) {
	$eut_target = '_blank';
}

if ( is_singular() ) {
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'eut-single-post' ); ?> itemscope itemType="http://schema.org/BlogPosting">
		<div id="eut-post-content">
			<?php eut_print_post_header_title( 'content' ); ?>
			<?php eut_print_post_meta(); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<div itemprop="articleBody">
				<?php the_content(); ?>
				<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>" rel="bookmark"><?php echo esc_url( $eut_link ); ?></a>
			</div>
		</div>
	</article>

<?php
} else {

	$eut_post_class = eut_get_post_class( 'eut-label-post' );

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $eut_post_class ); ?> itemscope itemType="http://schema.org/BlogPosting">
		<?php do_action( 'eut_inner_post_loop_item_before' ); ?>
		<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>" rel="bookmark">
			<?php the_title( '<h4 class="eut-post-title" itemprop="name headline">', '</h4>' ); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<p itemprop="articleBody">
			<?php
				global $allowedposttags;
				$mytags = $allowedposttags;
				unset($mytags['a']);
				unset($mytags['img']);
				unset($mytags['p']);
			?>
			<?php echo wp_kses( get_the_content(), $mytags ); ?>
			</p>
			<div class="eut-subtitle">
				<?php echo esc_url( $eut_link ); ?>
			</div>
		</a>
		<?php do_action( 'eut_inner_post_loop_item_after' ); ?>
	</article>

<?php

}

//Omit closing PHP tag to avoid accidental whitespace output errors.
