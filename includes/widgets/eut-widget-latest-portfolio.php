<?php
/**
 * Plugin Name: Euthemians Latest Portfolio
 * Description: A widget that displays latest portfolio.
 * @author		Euthemians Team
 * @URI			http://euthemians.com
 */


add_action( 'widgets_init', 'eut_widget_latest_portfolio' );

function eut_widget_latest_portfolio() {
	register_widget( 'EUT_Widget_Latest_Portfolio' );
}

class EUT_Widget_Latest_Portfolio extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'eut-latest-portfolio',
			'description' => esc_html__( 'A widget that displays latest portfolio items.', 'corpus' ),
		);
		$control_ops = array(
			'width' => 300,
			'height' => 350,
			'id_base' => 'eut-widget-latest-portfolio',
		);
		parent::__construct( 'eut-widget-latest-portfolio', '(Euthemians) ' . esc_html__( 'Latest Portfolio', 'corpus' ), $widget_ops, $control_ops );
	}

	function EUT_Widget_Latest_Portfolio() {
		$this->__construct();
	}

	function widget( $args, $instance ) {

		$image_size = 'thumbnail';

		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$num_of_posts = $instance['num_of_posts'];
		$cats = '';
		if ( empty( $num_of_posts ) ) {
			$num_of_posts = 5;
		}

		echo $before_widget;

		// Display the widget title
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$portfolio_cat = "";
		if( ! empty( $categories ) ) {
			$portfolio_category_list = explode( ",", $categories );
			foreach ( $portfolio_category_list as $category_list ) {
				$category_term = get_term( $category_list, 'portfolio_category' );
				$portfolio_cat = $portfolio_cat.$category_term->slug . ', ';
			}
		}
		$args = array(
			'post_type' => 'portfolio',
			'post_status'=>'publish',
			'paged' => 1,
			'portfolio_category' => $portfolio_cat,
			'posts_per_page' => $num_of_posts,
		);

		$query = new WP_Query( $args );
		//Loop portfolio

		if ( $query->have_posts() ) :
		?>
			<ul>
		<?php

		while ( $query->have_posts() ) : $query->the_post();

		?>
				<li class="eut-image-hover">
					<a href="<?php the_permalink(); ?>">
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
				</li>

		<?php
		endwhile;
		?>
			</ul>
		<?php

		else :
		?>

			<?php esc_html_e( 'No Portfolio Items Found!', 'corpus' ); ?>

		<?php
		endif;
		wp_reset_postdata();

		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = implode(',',$new_instance['categories']);
		$instance['num_of_posts'] = strip_tags( $new_instance['num_of_posts'] );

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array(
			'title' => '',
			'categories' => '',
			'num_of_posts' => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'corpus' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_of_posts' ) ); ?>"><?php echo esc_html__( 'Number of Portfolio Items:', 'corpus' ); ?></label>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php echo esc_html__( 'Categories:', 'corpus' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>[]" multiple="multiple" style="width:100%;">
				<option value=""><?php echo esc_html__( 'Choose Categories ...', 'corpus' ) ?></option>
			<?php
				$categories = get_terms( 'portfolio_category' );
				foreach ( $categories as $category ) {
					$selected = '';
					$cats = explode( ',', $instance['categories'] );
					foreach ( $cats as $cat ) {
						if ( $cat == $category->term_id ){
							$selected = $cat;
							break;
						}
					}
				?>
				<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $category->term_id  ,$selected ); ?> >
					<?php echo esc_html( $category->name ); ?>
				</option>
			<?php
				}
			?>
			</select>
		</p>


	<?php
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
