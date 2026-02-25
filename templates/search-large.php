<?php
/*
*	Template Search Masonry
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/
?>

<article id="eut-search-<?php the_ID(); ?><?php echo uniqid('-'); ?>" <?php post_class( 'eut-blog-item eut-big-post' ); ?>>
	<div class="eut-post-content">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><h2 class="eut-post-title"><?php the_title(); ?></h2></a>
		<?php echo eut_excerpt( '60', 1 ); ?>
	</div>
</article>