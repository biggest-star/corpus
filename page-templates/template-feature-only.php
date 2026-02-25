<?php
/*
Template Name: Feature Section Only
*/
?>
<!doctype html>

<!--[if lt IE 10]>
<html class="ie9 no-js eut-responsive" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js eut-responsive" <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- allow pinned sites -->
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />

		<?php
		$eut_favicon = eut_option('favicon','','url');
		if ( ! empty( $eut_favicon ) ) {
		?>
		<link href="<?php echo esc_url( $eut_favicon ); ?>" rel="icon" type="image/x-icon">
		<?php
		}
		?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<body id="eut-body" <?php body_class(); ?>>

		<?php
			if ( 'boxed' == eut_option('theme_layout') ) {
				$eut_layout_class = 'eut-boxed';
			} else {
				$eut_layout_class = 'eut-stretched';
			}
		?>

		<?php do_action( 'eut_theme_wrapper_before' ); ?>
		<div id="eut-theme-wrapper" class="<?php echo esc_attr( $eut_layout_class ); ?>">

			<header id="eut-header" data-fullscreen="yes">
				<?php eut_print_header_feature(); ?>
			</header>

			<?php the_post(); ?>

		</div>
		<?php do_action( 'eut_theme_wrapper_after' ); ?>

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>