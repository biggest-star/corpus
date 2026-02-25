<?php
/**
 * Plugin Name: Euthemians Latest Posts
 * Description: A widget that displays latest posts.
 * @author		Euthemians Team
 * @URI			http://euthemians.com
 */

add_action( 'widgets_init', 'eut_widget_latest_posts' );

function eut_widget_latest_posts() {
	register_widget( 'EUT_Widget_Latest_Posts' );
}

class EUT_Widget_Latest_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'eut-latest-news',
			'description' => esc_html__( 'A widget that displays latest posts', 'corpus'),
		);
		$control_ops = array(
			'width' => 300,
			'height' => 400,
			'id_base' => 'eut-widget-latest-posts',
		);
		parent::__construct( 'eut-widget-latest-posts', '(Euthemians) ' . esc_html__( 'Latest Posts', 'corpus' ), $widget_ops, $control_ops );
	}

	function EUT_Widget_Latest_Posts() {
		$this->__construct();
	}

	function widget( $args, $instance ) {
		$image_size = 'thumbnail';

		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$num_of_posts = $instance['num_of_posts'];
		$show_image = $instance['show_image'];

		if( empty( $num_of_posts ) ) {
			$num_of_posts = 5;
		}

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array(
			'post_type' => 'post',
			'post_status'=>'publish',
			'paged' => 1,
			'posts_per_page' => $num_of_posts,
		);
		//Loop posts
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
		?>
			<ul>
		<?php
		while ( $query->have_posts() ) : $query->the_post();

			$eut_link = get_permalink();
			$eut_target = '_self';

			if ( 'link' == get_post_format() ) {
				$eut_link = get_post_meta( get_the_ID(), 'eut_post_link_url', true );
				$new_window = get_post_meta( get_the_ID(), 'eut_post_link_new_window', true );
				if( empty( $eut_link ) ) {
					$eut_link = get_permalink();
				}

				if( !empty( $new_window ) ) {
					$eut_target = '_blank';
				}
			}

		?>

				<li <?php post_class(); ?>>
					<?php if( $show_image && '1' == $show_image ) { ?>
						<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>" title="<?php the_title_attribute(); ?>" class="eut-post-thumb">
						<?php
							if ( has_post_thumbnail() ) {
								$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$attachment_src = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
								$image_url = $attachment_src[0];
						?>
							<div class="eut-bg-wrapper eut-small-square">
								<div class="eut-bg-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
							</div>
							<?php the_post_thumbnail( $image_size ); ?>
						<?php
							} else {
								$image_url = get_template_directory_uri() . '/images/empty/thumbnail.jpg';
						?>
							<div class="eut-bg-wrapper eut-small-square">
								<div class="eut-bg-image" style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
							</div>
							<img width="150" height="150" src="<?php echo esc_url( $image_url ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
						<?php
							}
						?>
						</a>
					<?php } ?>
					<div class="eut-news-content">
						<a href="<?php echo esc_url( $eut_link ); ?>" target="<?php echo esc_attr( $eut_target ); ?>" class="eut-title" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<?php if ( eut_visibility( 'blog_date_visibility', '1' ) ) { ?>
						<div class="eut-latest-news-date"><?php echo esc_html( get_the_date() ); ?></div>
						<?php } ?>
					</div>
				</li>

		<?php
		endwhile;
		?>
			</ul>
		<?php
		else :
		?>

				<?php esc_html_e( 'No Posts Found!', 'corpus' ); ?>

		<?php
		endif;

		wp_reset_postdata();
		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_of_posts'] = strip_tags( $new_instance['num_of_posts'] );
		$instance['show_image'] = strip_tags( $new_instance['show_image'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'num_of_posts' => '5',
			'show_image' => '0',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_of_posts' ) ); ?>"><?php echo esc_html__( 'Number of Posts:', 'corpus' ); ?></label>
			<select  name="<?php echo esc_attr( $this->get_field_name( 'num_of_posts' ) ); ?>" style="width:100%;">
				<?php
				for ( $i = 1; $i <= 20; $i++ ) {
				?>
				    <option value="<?php echo esc_attr( $i ); ?>" <?php selected( $instance['num_of_posts'], $i ); ?>><?php echo esc_html( $i ); ?></option>
				<?php
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php echo esc_html__( 'Show Featured Image:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id('show_image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_image') ); ?>" type="checkbox" value="1" <?php checked( $instance['show_image'], 1 ); ?> />
		</p>

	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
