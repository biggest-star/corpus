<?php
/**
 * The Gallery Post Type Template
 */
?>

<?php
if ( is_singular() ) {
	$eut_disable_media = eut_post_meta( 'eut_disable_media' );
	$slider_items = eut_post_meta( 'eut_post_slider_items' );
	$gallery_mode = eut_post_meta( 'eut_post_type_gallery_mode', 'gallery' );
	$gallery_image_mode = eut_post_meta( 'eut_post_type_gallery_image_mode' );
	$image_size_slider = 'eut-image-large-rect-horizontal';
	if ( 'resize' == $gallery_image_mode ) {
		$image_size_slider = 'large';
	}
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('eut-single-post'); ?> itemscope itemType="http://schema.org/BlogPosting">
		
<?php
		if ( !empty( $slider_items ) && 'yes' != $eut_disable_media && !post_password_required() ) {
?>
			<div id="eut-single-media">
				<?php eut_print_gallery_slider( $gallery_mode, $slider_items, $image_size_slider  ); ?>
			</div>
<?php
		}
?>
		<div id="eut-post-content">
			<?php eut_print_post_header_title( 'content' ); ?>
			<?php eut_print_post_meta(); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<div itemprop="articleBody">
				<?php the_content(); ?>
			</div>
		</div>

	</article>

<?php
} else {
	$eut_post_class = eut_get_post_class();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $eut_post_class ); ?> itemscope itemType="http://schema.org/BlogPosting">
		<?php do_action( 'eut_inner_post_loop_item_before' ); ?>
		<?php eut_print_post_feature_media( 'gallery' ); ?>
		<div class="eut-post-content">
			<?php do_action( 'eut_inner_post_loop_item_title_link' ); ?>
			<?php corpus_eutf_print_post_structured_data(); ?>
			<div class="eut-small-text eut-post-meta">
				<?php eut_print_post_author_by(); ?>
				<?php eut_print_post_date(); ?>
				<?php eut_print_like_counter(); ?>
			</div>
			<div itemprop="articleBody">
				<?php eut_print_post_excerpt(); ?>
			</div>
		</div>
		<?php do_action( 'eut_inner_post_loop_item_after' ); ?>
	</article>

<?php
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
