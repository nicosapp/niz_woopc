<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$woo_shortcodes=array(
	'product',
	'product_page',
	'product_category',
	'product_categories',
	'add_to_cart',
	'add_to_cart_url',
	'products',
	'recent_products',
	'sale_products',
	'best_selling_products',
	'top_rated_products',
	'featured_products',
	'product_attribute',
	'related_products'
);
$woo_orderby=array(
	'date',
	'id',
	'menu_order',
	'popularity',
	'rand',
	'rating',
	'title'
);

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<h1>Niz Woocommerce Product Carousel</h1>
<h2><?php _e('Shortcode Generator','niz-woopc'); ?></h2>

<div class="niz-panel-wrapper" style="display:flex;">
	<div class="niz-panel left" style="margin-right:2em;">
		<h3><?php _e('Shortcode Parameters','niz-woopc'); ?></h3>
		<table class="form-table" role="niz-shortcode">
			<tr>
				<th scope="row">
					<label><?php _e('Woocommerce Products Shortcode','niz-woopc'); ?></label>
				</th>
				<td>
					<select class="woo-shortcode niz-atts" name="type">
						<?php foreach($woo_shortcodes as $item) :
							printf("<option name='%s'>%s</option>", $item, $item);
							endforeach; ?>
					</select>
					<p class="description" id="tagline-description"><?php _e('Select the woocommerce shortcode you want to use.','niz-woopc'); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Limit','niz-woopc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="number" name="limit" value="4"/>
					<p class="description" id="tagline-description"><?php _e('Number of products to display.','niz-woopc'); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Order By','niz-woopc'); ?></label>
				</th>
				<td>
					<select  class="niz-atts" name="orderby">
						<?php foreach($woo_orderby as $item) :
							printf("<option name='%s'>%s</option>",  $item, $item);
							endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Order','niz-woopc'); ?></label>
				</th>
				<td>
					<form>
						<input  class="niz-atts" type="radio" name="order" value="asc">ASC
						<input  class="niz-atts" type="radio" name="order" value="desc" checked>DESC
					</form>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Categories','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="text" name="limit" value=""/>
					<p class="description" id="tagline-description"><?php _e('Comma-separated list of category slugs.','niz-woopc'); ?></p>
				</td>
			</tr>
		</table>
	</div>
	<div class="niz-panel right">
		<h3><?php _e('Carousel Parameters','niz-woopc'); ?></h3>
		<table class="form-table" role="niz-shortcode">
			<tr>
				<th scope="row">
					<label><?php _e('Show Products','niz-woopc'); ?></label>
					<p class="description" id="tagline-description"><?php _e('Number of products visible in Carousel.','niz-woopc'); ?></p>
				</th>
				<td>
					<div>
						<input  class="niz-atts" type="number" value="3" name="show_item"/>
						<p class="description" id="tagline-description"><?php _e('On computer.','niz-woopc'); ?></p>
					</div>
					<div>
						<input  class="niz-atts" type="number" value="2" name="show_item_tablet"/>
						<p class="description" id="tagline-description"><?php _e('On tablet.','niz-woopc'); ?></p>
					</div>
					<div>
						<input  class="niz-atts" type="number" value="1" name="show_item_mobile"/>
						<p class="description" id="tagline-description"><?php _e('On mobile.','niz-woopc'); ?></p>
					</div>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Autoplay','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="autoplay" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Pause','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="pause" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Navigation buttons','niz-woopc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="checkbox" name="nav"/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Dots buttons','niz-woopc'); ?></label>
				</th>
				<td>
					<input class="niz-atts" type="checkbox" name="dots"/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Loop','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="checkbox" name="loop" checked/>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Carousel speed','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="number" name="speed" value="300"/>
					<p class="description" id="tagline-description"><?php _e('Time in millisecond.','niz-woopc'); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label><?php _e('Carousel delay time','niz-woopc'); ?></label>
				</th>
				<td>
					<input  class="niz-atts" type="number" name="delay" value="1000"/>
					<p class="description" id="tagline-description"><?php _e('Time in millisecond.','niz-woopc'); ?></p>
				</td>
			</tr>
		</table>
	</div>
</div>
<p class="shortcode-generated">
	<h2><?php _e('Generated Shortcode','niz-woopc'); ?></h2>
	<p><?php _e('Click on the button below to generate your shortcode. Then copy page the generated shortcode wherever you want!','niz-woopc'); ?></p>
	<p id="shortcode-generated-value"></p>
</p>
<p class="submit">
	<input type="button" id="niz-button-shortcode-generator" name="generate" class="button button-primary" value="<?php _e('Generate','niz-woopc');?>">
</p>