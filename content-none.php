<?php
/*
*	Template Content None
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/
?>
<article <?php post_class(); ?>>
	<div class="eut-post-content">
		<h2 class="eut-align-center">
			<?php esc_html_e( "Hey There! This Is Not The Page You Are Looking For...", 'corpus' ); ?>
		</h2>
		<p class="eut-leader-text eut-align-center">
			<?php esc_html_e( "Check again your spelling and rewrite the content you are seeking for in the search field.", 'corpus' ); ?>
		</p>
		<div class="eut-widget">
			<?php get_search_form(); ?>
		</div>
	</div>
</article>