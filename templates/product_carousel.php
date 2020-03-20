<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$shortcode_name=$data['type'];
$atts=array(
	'columns'=>1,
	'limit'=> $data['limit'],
	'orderby'      => $data['orderby'],
	'order'        => $data['limit'],
	'category'     => $data['category'],
	'cat_operator' => $data['cat_operator'],
);
// Product Query
$shortcode = new WC_Shortcode_Products( $atts, $shortcode_name);
$post_query = new WP_Query( $shortcode->get_query_args() );

if ( $post_query ->have_posts() ) :
	?>
	<div class="woocommerce owl-theme">
		<ul class="niz_woopc-products-carousel products columns-1 owl-carousel"
			data-item-lg="<?php echo esc_attr( $data['show_item'] ); ?>"
			data-item-md="<?php echo esc_attr( $data['show_item_tablet'] ); ?>"
			data-item-sm="<?php echo esc_attr( $data['show_item_mobile'] ); ?>"
			data-autoplay="<?php echo esc_attr( $data['autoplay'] ); ?>"
			data-pause="<?php echo esc_attr( $data['pause'] ); ?>"
			data-nav="<?php echo esc_attr( $data['nav'] ); ?>"
			data-dots="<?php echo esc_attr( $data['dots'] ); ?>"
			data-mouse-drag="<?php echo esc_attr( $data['mouse_drag'] ); ?>"
			data-touch-drag="<?php echo esc_attr( $data['touch_drag'] ); ?>"
			data-loop="<?php echo esc_attr( $data['loop'] ); ?>"
			data-speed="<?php echo esc_attr( $data['speed'] ); ?>"
			data-delay="<?php echo esc_attr( $data['delay'] ); ?>"
			>
			<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div>
	<?php
else:
	?>
		<h3><?php _e('No Product found', 'niz-woopc'); ?></h3>
	<?php
endif;