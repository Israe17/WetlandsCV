<?php
/*************************************************
* WooCommerce Custom Hook                        *
**************************************************/

/*** Shop - Category ***/

/* Remove hook */
function cozycorner_woocommerce_remove_shop_loop_default_hooks(){
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

	remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

	remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

	remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
	remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);
	
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
}

cozycorner_woocommerce_remove_shop_loop_default_hooks();

add_action('load-post.php', 'cozycorner_woocommerce_remove_shop_loop_default_hooks', 20); /* Elementor editor */
/* Add new hook */
add_action('woocommerce_before_shop_loop_item_title', 'cozycorner_template_loop_product_thumbnail', 10);
add_action('woocommerce_after_shop_loop_item_title', 'cozycorner_template_loop_product_label', 1);

add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_brands', 10);
add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_product_title', 20);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 25);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 30);
add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_product_sku', 5);
add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_categories', 15);
add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_short_description', 40);
add_action('woocommerce_after_shop_loop_item_2', 'woocommerce_template_loop_price', 5);

add_action('woocommerce_before_shop_loop', 'cozycorner_add_filter_button', 11);
add_action('woocommerce_before_shop_loop', 'cozycorner_product_on_sale_form', 25);
add_action('woocommerce_before_shop_loop', 'cozycorner_product_per_page_form', 35);
add_action('woocommerce_before_shop_loop', 'cozycorner_product_columns_selector', 15);
add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 10);

add_filter('loop_shop_per_page', 'cozycorner_change_products_per_page_shop'); 

add_filter('loop_shop_post_in', 'cozycorner_show_only_products_on_sales');

add_action('woocommerce_after_shop_loop', 'cozycorner_shop_load_more_html', 20);

add_filter('woocommerce_get_stock_html', 'cozycorner_empty_woocommerce_stock_html', 10, 2);

function cozycorner_shop_top_product_categories(){
	if( 'both' === woocommerce_get_loop_display_mode() ){
		$theme_options = cozycorner_get_theme_options();
		$columns = $theme_options['ts_top_cat_columns'];
		$is_slider = $theme_options['ts_top_cat_slider'];
		$data_attr = array();
		
		if( $is_slider ){
			$product_categories = woocommerce_get_product_subcategories( is_product_category() ? get_queried_object_id() : 0 );
			
			if( is_array( $product_categories ) && count( $product_categories ) < $columns ){
				$is_slider = false;
			}
		}
		$before = '<div class="list-categories"><div class="container">';
		$before .= '<div class="ts-product-category-wrapper ts-product ts-shortcode woocommerce style-default-bg direction-horizontal columns-'.esc_attr($columns).' ts-slider" style="--ts-product-columns: '.esc_attr($columns).'" data-dots="'.(int)$theme_options['ts_slider_dots'].'" data-autoplay="'.(int)$theme_options['ts_slider_autoplay'].'" data-loop="'.(int)$theme_options['ts_slider_loop'].'" data-columns="'.esc_attr($columns).'"><div class="content-wrapper '. esc_attr( $is_slider ? 'loading' : '' ) .'"><div class="products">';
		
		$after = '</div></div></div>';
		$after .= '</div></div>';
		
		woocommerce_output_product_categories(
			array(
				'before' => $before
				,'after' => $after
				,'parent_id' => is_product_category() ? get_queried_object_id() : 0
			)
		);
		
		remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );
	}
}

add_filter('woocommerce_pagination_args', 'cozycorner_woocommerce_pagination_args');
function cozycorner_woocommerce_pagination_args( $args ){
	$args['prev_text'] = esc_html__('Previous page', 'cozycorner');
	$args['next_text'] = esc_html__('Next page', 'cozycorner');
	$args['end_size'] = 1;
	$args['mid_size'] = 1;
	$args['type'] = 'plain';
	return $args;
}

add_action('init', 'cozycorner_check_product_lazy_load');
function cozycorner_check_product_lazy_load(){
	if( wp_doing_ajax() || ( isset($_GET['action']) && $_GET['action'] == 'elementor' ) ){
		cozycorner_change_theme_options('ts_prod_lazy_load', 0);
	}
}

function cozycorner_get_product_on_sale_display( $product, $type = 'number' ){
	if( $product->get_type() == 'variable' ){
		$regular_price = $product->get_variation_regular_price('max');
		$sale_price = $product->get_variation_sale_price('min');
	}
	else{
		$regular_price = $product->get_regular_price();
		$sale_price = $product->get_price();
	}
	
	if( !$regular_price || !$sale_price ){
		return '';
	}
	
	if( $type == 'number' ){
		$_off_price = round($regular_price - $sale_price, wc_get_price_decimals());
		$display = '-' . sprintf(get_woocommerce_price_format(), get_woocommerce_currency_symbol(), $_off_price);
	}
	else{ /* Percent */
		$display = '-' . cozycorner_calc_discount_percent($regular_price, $sale_price) . '%';
	}
	
	return $display;
}

function cozycorner_template_loop_product_label(){
	global $product;
	$theme_options = cozycorner_get_theme_options();
	?>
	<div class="product-label">
	<?php 
	if( $product->is_in_stock() ){

		/* New label */
		if( $theme_options['ts_product_show_new_label'] ){
			$now = current_time( 'timestamp', true );
			$post_date = get_post_time('U', true);
			$num_day = (int)( ( $now - $post_date ) / ( 3600*24 ) );
			$num_day_setting = absint( $theme_options['ts_product_show_new_label_time'] );
			if( $num_day <= $num_day_setting ){
				echo '<span class="new"><span>'.esc_html($theme_options['ts_product_new_label_text']).'</span></span>';
			}
		}

		/* Sale label */
		if( $product->is_on_sale() ){
			if( $theme_options['ts_show_sale_label_as'] != 'text' ){
				$onsale_display = cozycorner_get_product_on_sale_display( $product, $theme_options['ts_show_sale_label_as'] );
				if( $onsale_display ){
					echo '<span class="onsale numeric" data-original="'.$onsale_display.'"><span>'.$onsale_display.'</span></span>';
				}
			}
			else{
				echo '<span class="onsale"><span>'.esc_html($theme_options['ts_product_sale_label_text']).'</span></span>';
			}
		}
		
		/* Hot label */
		if( $product->is_featured() ){
			echo '<span class="featured"><span>'.esc_html($theme_options['ts_product_feature_label_text']).'</span></span>';
		}

	}
	else{ /* Out of stock */
		echo '<span class="out-of-stock"><span>'.esc_html($theme_options['ts_product_out_of_stock_label_text']).'</span></span>';
	}
	?>
	</div>
	<?php
}

function cozycorner_template_loop_product_thumbnail(){
	global $product;
	$lazy_load = cozycorner_get_theme_options('ts_prod_lazy_load');
	$placeholder_img_src = cozycorner_get_theme_options('ts_prod_placeholder_img')['url'];
	
	$prod_galleries = $product->get_gallery_image_ids();
	
	$image_size = apply_filters('cozycorner_loop_product_thumbnail', 'woocommerce_thumbnail');
	
	$dimensions = wc_get_image_size( $image_size );
	
	$has_back_image = cozycorner_get_theme_options('ts_effect_product');
	
	if( !is_array($prod_galleries) || ( is_array($prod_galleries) && count($prod_galleries) == 0 ) ){
		$has_back_image = false;
	}
	 
	if( wp_is_mobile() ){
		$has_back_image = false;
	}
	
	echo '<figure class="' . ($has_back_image?'has-back-image':'no-back-image') . '">';
		if( !$lazy_load ){
			echo woocommerce_get_product_thumbnail( $image_size );
			
			if( $has_back_image ){
				echo wp_get_attachment_image( $prod_galleries[0], $image_size, 0, array('class' => 'product-image-back') );
			}
		}
		else{
			$front_img_src = '';
			$alt = '';
			if( has_post_thumbnail( $product->get_id() ) ){
				$post_thumbnail_id = get_post_thumbnail_id($product->get_id());
				$image_obj = wp_get_attachment_image_src($post_thumbnail_id, $image_size, 0);
				if( isset($image_obj[0]) ){
					$front_img_src = $image_obj[0];
				}
				$alt = trim(strip_tags( get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true) ));
			}
			else{
				$front_img_src = wc_placeholder_img_src();
			}
			
			echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($front_img_src).'" class="attachment-shop_catalog wp-post-image ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
		
			if( $has_back_image ){
				$back_img_src = '';
				$alt = '';
				$image_obj = wp_get_attachment_image_src($prod_galleries[0], $image_size, 0);
				if( isset($image_obj[0]) ){
					$back_img_src = $image_obj[0];
					$alt = trim(strip_tags( get_post_meta($prod_galleries[0], '_wp_attachment_image_alt', true) ));
				}
				else{
					$back_img_src = wc_placeholder_img_src();
				}
				
				echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($back_img_src).'" class="product-image-back ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
			}
		}
	echo '</figure>';
}

function cozycorner_template_loop_product_variable_color(){
	global $product;
	if( $product->get_type() == 'variable' ){
		$attribute_color = wc_attribute_taxonomy_name( 'color' ); // pa_color
		$attribute_color_name = wc_variation_attribute_name( $attribute_color ); // attribute_pa_color
		
		$color_terms = wc_get_product_terms( $product->get_id(), $attribute_color, array( 'fields' => 'all' ) );
		if( empty($color_terms) || is_wp_error($color_terms) ){
			return;
		}
		$color_term_ids = wp_list_pluck( $color_terms, 'term_id' );
		$color_term_slugs = wp_list_pluck( $color_terms, 'slug' );
		
		$color_html = array();
		$price_html = array();
		
		$added_colors = array();
		$count = 0;
		$number = apply_filters('cozycorner_loop_product_variable_color_number', 3);
		$use_variation_thumbnail = cozycorner_get_theme_options('ts_prod_cat_color_swatch_variation_thumbnail');
		
		$children = $product->get_children();
		if( is_array($children) && count($children) > 0 ){
			foreach( $children as $children_id ){
				$variation_attributes = wc_get_product_variation_attributes( $children_id );
				foreach( $variation_attributes as $attribute_name => $attribute_value ){
					if( $attribute_name == $attribute_color_name ){
						if( in_array($attribute_value, $added_colors) ){
							break;
						}
						
						$term_id = 0;
						$found_slug = array_search($attribute_value, $color_term_slugs);
						if( $found_slug !== false ){
							$term_id = $color_term_ids[ $found_slug ];
						}
						
						if( $term_id !== false && absint( $term_id ) > 0 ){
							$variation = wc_get_product( $children_id );
							$thumbnail_id = $variation->get_image_id();
							$thumbnail_url = '';
							
							if( $thumbnail_id ){
								$thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'woocommerce_thumbnail');
							}
							
							if( !$thumbnail_url ){
								$thumbnail_url = wc_placeholder_img_src();
							}
							
							if( !$use_variation_thumbnail ){
								$color_datas = get_term_meta( $term_id, 'ts_product_color_config', true );
								if( $color_datas ){
									$color_datas = unserialize( $color_datas );	
								}else{
									$color_datas = array('ts_color_color' => '#ffffff', 'ts_color_image' => 0);
								}
								$color_datas['ts_color_image'] = absint($color_datas['ts_color_image']);
								if( $color_datas['ts_color_image'] ){
									$color_html[] = '<div class="color-image" data-thumb="'.esc_url($thumbnail_url).'" data-term_id="'.esc_attr($term_id).'"><span>'.wp_get_attachment_image( $color_datas['ts_color_image'], 'ts_prod_color_thumb', true, array('alt' => $attribute_value) ).'</span></div>';
								}
								else{
									$style = 'background-color:'. $color_datas['ts_color_color'] .';';
									if( $color_datas['ts_color_color'] == '#ffffff' ){
										$style .= ' outline: 1px solid #e5e5e5;';
									}
									$color_html[] = '<div class="color" data-thumb="'.esc_url($thumbnail_url).'" data-term_id="'.esc_attr($term_id).'"><span style="'. esc_attr($style) .'"></span></div>';
								}
							}
							else{ /* Use variation thumbnail */
								$color_html[] = '<div class="variation-thumbnail" data-thumb="'.esc_url($thumbnail_url).'" data-term_id="'.esc_attr($term_id).'"><span>' . wp_kses( $variation->get_image(), 'cozycorner_product_image' ) . '</span></div>';
							}
							
							$price_html[] = '<span data-term_id="'.esc_attr($term_id).'">' . wp_kses( $variation->get_price_html(), 'cozycorner_product_price' ) . '</span>';
							$count++;
						}
						
						$added_colors[] = $attribute_value;
						break;
					}
				}
				
				if( $count == $number ){
					break;
				}
			}
		}
		
		if( $color_html ){
			echo '<div class="color-swatch">'. implode('', $color_html) . '</div>';
			echo '<span class="variable-prices hidden">' . implode('', $price_html) . '</span>';
		}
	}
}

function cozycorner_template_loop_product_title(){
	global $product;
	echo '<h3 class="heading-title product-name">';
	echo '<a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_title()) . '</a>';
	echo '</h3>';
}

function cozycorner_template_loop_add_to_cart(){
	if( cozycorner_get_theme_options('ts_enable_catalog_mode') ){
		return;
	}
	
	echo '<div class="loop-add-to-cart">';
	woocommerce_template_loop_add_to_cart();
	echo '</div>';
}

function cozycorner_template_loop_product_sku(){
	global $product;
	echo '<div class="product-sku">' . esc_html($product->get_sku()) . '</div>';
}

function cozycorner_template_loop_short_description(){
	global $product;
	if( !$product->get_short_description() ){
		return;
	}
	
	$limit_words = (int) cozycorner_get_theme_options('ts_prod_cat_desc_words');
	?>
	<div class="short-description grid">
		<?php cozycorner_the_excerpt_max_words($limit_words, '', false, '', true); ?>
	</div>
	<?php
}

function cozycorner_template_loop_short_description_list_view(){
	global $product;
	if( !$product->get_short_description() ){
		return;
	}
	
	$limit_words = (int) cozycorner_get_theme_options('ts_prod_cat_list_desc_words');
	?>
	<div class="meta-wrapper meta-wrapper-3">
		<div class="short-description list">
			<?php cozycorner_the_excerpt_max_words($limit_words, '', false, '', true); ?>
		</div>
	</div>
	<?php
}

function cozycorner_template_loop_brands(){
	global $product;
	if( taxonomy_exists('ts_product_brand') ){
		echo get_the_term_list($product->get_id(), 'ts_product_brand', '<div class="product-brands"><span class="brand-links">', ', ', '</span></div>');
	}
}

function cozycorner_template_brands(){
	global $product;
	if( taxonomy_exists('ts_product_brand') ){
		echo get_the_term_list($product->get_id(), 'ts_product_brand', '<div class="product-brands"><span class="brand-links">', ', ', '</span></div>');
	}
}

function cozycorner_template_loop_categories(){
	global $product;
	echo wc_get_product_category_list($product->get_id(), ', ', '<div class="product-categories">', '</div>');
}

function cozycorner_change_products_per_page_shop(){
    if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( isset($_GET['per_page']) && absint($_GET['per_page']) > 0 ){
			return absint($_GET['per_page']);
		}
		$per_page = absint( cozycorner_get_theme_options('ts_prod_cat_per_page') );
        if( $per_page ){
            return $per_page;
        }
    }
}

function cozycorner_product_per_page_form(){
	if( !cozycorner_get_theme_options('ts_prod_cat_per_page_dropdown') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$per_page = absint( cozycorner_get_theme_options('ts_prod_cat_per_page') );
	if( !$per_page ){
		return;
	}
	
	$options = array();
	for( $i = 1; $i <= 3; $i++ ){
		$options[] = $per_page * $i;
	}
	$selected = isset($_GET['per_page'])?absint($_GET['per_page']):$per_page;
	
	$action = '';
	$cat 	= get_queried_object();
	if( isset( $cat->term_id ) && isset( $cat->taxonomy ) ){
		$action = get_term_link( $cat->term_id, $cat->taxonomy );
	}
	else{
		$action = wc_get_page_permalink('shop');
	}
?>
	<form method="get" action="<?php echo esc_url($action) ?>" class="product-per-page-form">
		<select name="per_page" class="perpage">
			<?php foreach( $options as $option ): ?>
			<option value="<?php echo esc_attr($option) ?>" <?php selected($selected, $option) ?>><?php echo esc_html($option) ?></option>
			<?php endforeach; ?>
		</select>
		<span><?php esc_html_e('Show', 'cozycorner'); ?></span>
		<ul class="perpage">
			<li>
				<span class="perpage-current"><?php echo esc_html($selected) ?></span>
				<ul class="dropdown">
					<?php foreach( $options as $option ): ?>
					<li>
						<a href="#" data-perpage="<?php echo esc_attr($option) ?>" class="<?php echo esc_attr($option == $selected?'current':''); ?>">
							<span><?php echo esc_html($option) ?></span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
		<?php wc_query_string_form_fields( null, array( 'per_page', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
<?php
}

function cozycorner_show_only_products_on_sales( $array ){
	if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( isset($_GET['onsale']) && 'yes' == $_GET['onsale'] ){
			return array_merge($array, wc_get_product_ids_on_sale());
		}
	}
	return $array;
}

function cozycorner_product_on_sale_form(){
	if( !cozycorner_get_theme_options('ts_prod_cat_onsale_checkbox') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$checked = isset($_GET['onsale']) && 'yes' == $_GET['onsale'] ? true : false;
	
	$action = '';
	$cat 	= get_queried_object();
	if( isset( $cat->term_id ) && isset( $cat->taxonomy ) ){
		$action = get_term_link( $cat->term_id, $cat->taxonomy );
	}
	else{
		$action = wc_get_page_permalink('shop');
	}
	?>
	<form method="get" action="<?php echo esc_url($action); ?>" class="product-on-sale-form <?php echo esc_attr( $checked?'checked':'' ); ?>">
		<label>
			<input type="checkbox" name="onsale" value="yes" <?php echo esc_attr( $checked?'checked':'' ); ?> />
			<?php esc_html_e('Show only products on sale', 'cozycorner'); ?>
		</label>
		<?php wc_query_string_form_fields( null, array( 'onsale', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
	<?php
}

function cozycorner_is_active_filter_area(){
	return is_active_sidebar('filter-widget-area') && cozycorner_get_theme_options('ts_filter_widget_area') && woocommerce_products_will_display();
}

function cozycorner_add_filter_button(){	
	if( cozycorner_is_active_filter_area() || cozycorner_get_theme_options('ts_prod_cat_layout') != '0-1-0' ){
		?>
		<div class="filter-widget-area-button">
			<a href="#"><?php esc_html_e('Filters', 'cozycorner'); ?></a>
		</div>
		<?php
		if( cozycorner_get_theme_options('ts_prod_cat_layout') != '0-1-0' ){
			echo '<div class="overlay"></div>';
		}
	}
	cozycorner_filter_widget_area( array('top', 'dropdown') );
}

function cozycorner_filter_widget_area( $showed_in_styles = array() ){
	$filter_style = cozycorner_get_theme_options('ts_filter_style');
	$show_area = false;
	if( in_array($filter_style, $showed_in_styles) ){
		$show_area = true;
	}
	
	if( $show_area && cozycorner_is_active_filter_area() ){
	?>
		<div id="ts-filter-widget-area" class="ts-floating-sidebar">
			<div class="overlay"></div>
			<div class="ts-sidebar-content">
				<div class="ts-heading">
					<h6><?php esc_html_e('Filters', 'cozycorner'); ?></h6>
					<span class="close"></span>
				</div>
				
				<?php cozycorner_product_on_sale_form(); ?>
				
				<aside class="filter-widget-area">
					<?php dynamic_sidebar( 'filter-widget-area' ); ?>
				</aside>
			</div>
		</div>
	<?php
	}
}

function cozycorner_reset_filter_button(){
	if( function_exists('is_filtered') && !is_filtered() ){
		return;
	}
	
	$link = '';
	if( defined( 'SHOP_IS_ON_FRONT' ) ){
		$link = home_url();
	}elseif( is_shop() ){
		$link = get_permalink( wc_get_page_id( 'shop' ) );
	}elseif( is_product_category() ){
		$link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
	}elseif( is_product_tag() ){
		$link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
	}else{
		$queried_object = get_queried_object();
		$link           = get_term_link( $queried_object->slug, $queried_object->taxonomy );
	}
	
	if( $link ){
		echo '<a href="' . esc_url($link) . '" class="button-text">' . esc_html__('Clear all filters', 'cozycorner') . '</a>';
	}
}

function cozycorner_widget_layered_nav_filters(){
	if( !class_exists('WC_Widget_Layered_Nav_Filters') || !cozycorner_is_active_filter_area() ){
		return;
	}
	
	echo '<div class="ts-active-filters">';
	the_widget('WC_Widget_Layered_Nav_Filters', array('title' => esc_html__('Selected filters', 'cozycorner')));
	cozycorner_reset_filter_button();
	echo '</div>';
}

function cozycorner_product_columns_selector(){
	$theme_options = cozycorner_get_theme_options();
	if( !$theme_options['ts_prod_cat_columns_selector'] ){
		return;
	}
	
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$default_column = $theme_options['ts_prod_cat_columns'];
	
	$columns = array(
		'1' 	=> 'columns-1'
		,'1-1' 	=> 'columns-1-1'
		,'2' 	=> 'columns-2'
		,'3' 	=> 'columns-3'
		,'4' 	=> 'columns-4'
		,'5' 	=> 'columns-5'
		);
	?>
	<div class="ts-product-columns-selector">
		<span class="columns-<?php echo esc_attr($default_column); ?> current-selector"></span>
		<ul>
			<?php foreach( $columns as $column => $class ){	?>
			<li class="<?php echo esc_attr($class); ?> <?php echo esc_attr($default_column == $column?'selected':''); ?>" data-columns="<?php echo esc_attr($column == '1-1'?1:$column); ?>" data-class="<?php echo esc_attr($class); ?>"></li>
			<?php } ?>
		</ul>
	</div>
	<?php
}

function cozycorner_shop_load_more_html(){
	if( wc_get_loop_prop( 'total_pages' ) == 1 || !woocommerce_products_will_display() ){
		return;
	}
	$loading_type = cozycorner_get_theme_options('ts_prod_cat_loading_type');
	if( in_array($loading_type, array('infinity-scroll', 'load-more-button')) ){
		$total = wc_get_loop_prop( 'total' );
		$per_page = wc_get_loop_prop( 'per_page' );
		$current = wc_get_loop_prop( 'current_page' );
		$showing = min($current * $per_page, $total);
	?>
	<div class="ts-shop-result-count">
		<?php 
		if( $showing < $total ){
			printf( esc_html__('Showing %s of %s results', 'cozycorner'), $showing, $total );
		}
		else{
			echo esc_html__('Showing all', 'cozycorner');
		}
		?>
	</div>
	<div class="ts-shop-load-more">
		<a class="load-more button"><?php esc_html_e('View more', 'cozycorner'); ?></a>
	</div>
	<?php
	}
}

function cozycorner_empty_woocommerce_stock_html( $html, $product ){
	if( $product->get_type() == 'simple' ){
		return '';
	}
	return $html;
}

/* Shop Ads Banner */
function cozycorner_shop_ads_banner(){
	$theme_options = cozycorner_get_theme_options();
	
	if( !$theme_options['ts_prod_cat_ads_banner'] ){
		return;
	}
	
	if( is_tax('product_cat') ){
		if( $term_id = get_queried_object_id() ){
			$ads_banner_content = get_term_meta($term_id, 'ads_banner_content', true);
			if( $ads_banner_content ){
				$theme_options['ts_prod_cat_ads_banner_content'] = $ads_banner_content;
			}
		}
	}
	
	if( !$theme_options['ts_prod_cat_ads_banner_content'] ){
		return;
	}
	
	$display_on = $theme_options['ts_prod_cat_ads_banner_display_on'];
	if( ( $display_on == 'shop' && is_post_type_archive('product') ) || 
		( $display_on == 'shop-category' && ( is_post_type_archive('product') || is_tax('product_cat') ) ) ||
		( $display_on == 'shop-all-taxonomies' && ( is_post_type_archive('product') || is_tax( get_object_taxonomies('product') ) ) ) ){
			echo '<div class="ads-banner shop-ads-banner ts-custom-block-content hidden">';
			cozycorner_get_custom_block_content( $theme_options['ts_prod_cat_ads_banner_content'] );
			echo '</div>';
		}
}
/*** End Shop - Category ***/

/*** Single Product ***/

/* Remove hook */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

/* Add hook */
add_action('woocommerce_product_thumbnails', 'cozycorner_template_loop_product_label', 99);
add_action('woocommerce_product_thumbnails', 'cozycorner_template_single_product_video_360_buttons', 99);

add_action('woocommerce_single_product_summary', 'cozycorner_template_brands', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 25);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
add_action('woocommerce_single_product_summary', 'cozycorner_template_single_variation_price', 21);
add_action('woocommerce_single_product_summary', 'cozycorner_single_product_calc_discount', 19);
add_action('woocommerce_single_product_summary', 'cozycorner_template_single_countdown', 28);

add_action('woocommerce_single_product_summary', 'cozycorner_product_summary_custom_content', 60);

add_action('woocommerce_after_add_to_cart_button', 'cozycorner_single_product_buy_now_button', 1);

add_action('woocommerce_before_add_to_cart_form', 'cozycorner_single_group_product_add_heading', 10);

add_action('woocommerce_single_product_summary', 'cozycorner_single_product_buttons_sharing_start', 31);
add_action('woocommerce_single_product_summary', 'cozycorner_single_product_buttons_sharing_end', 41);

add_action('woocommerce_single_product_summary', 'cozycorner_template_single_meta', 77);

add_action('woocommerce_after_single_product_summary', 'cozycorner_product_ads_banner', 8);

add_action('woocommerce_after_single_product', 'cozycorner_product_reviews_tab_content', 1);

add_action('woocommerce_after_single_product', 'cozycorner_product_bottom_content', 30);

if( function_exists('ts_template_social_sharing') ){
	add_action('woocommerce_share', 'ts_template_social_sharing', 10);
}

add_action('woocommerce_product_additional_information', 'cozycorner_woocommerce_product_additional_information_before', 5);
add_action('woocommerce_product_additional_information', 'cozycorner_woocommerce_product_additional_information_after', 15);

add_filter('woocommerce_grouped_product_columns', 'cozycorner_woocommerce_grouped_product_columns');
add_action( 'woocommerce_grouped_product_list_before_label', 'cozycorner_woocommerce_grouped_product_thumbnail' );

add_filter('woocommerce_output_related_products_args', 'cozycorner_output_related_products_args_filter');

add_filter('woocommerce_single_product_image_gallery_classes', 'cozycorner_add_classes_to_single_product_thumbnail');
add_filter('woocommerce_gallery_thumbnail_size', 'cozycorner_product_gallery_thumbnail_size');

add_filter('woocommerce_dropdown_variation_attribute_options_args', 'cozycorner_variation_attribute_options_args');
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'cozycorner_variation_attribute_options_html', 10, 2);

add_filter('woocommerce_add_to_cart_redirect', 'cozycorner_product_buy_now_redirect');

add_filter('woocommerce_available_variation', 'cozycorner_add_discount_number_to_variation', 10, 3);

if( !is_admin() ){ /* Fix for WooCommerce Tab Manager plugin */
	add_filter( 'woocommerce_product_tabs', 'cozycorner_product_remove_tabs', 999 );
	add_filter( 'woocommerce_product_tabs', 'cozycorner_add_product_custom_tab', 90 );
}

function cozycorner_calc_discount_percent($regular_price, $sale_price){
	return ( 1 - round($sale_price / $regular_price, 2) ) * 100;
}

add_action('wp_ajax_cozycorner_load_product_video', 'cozycorner_load_product_video_callback' );
add_action('wp_ajax_nopriv_cozycorner_load_product_video', 'cozycorner_load_product_video_callback' );
/*** End Product ***/

function cozycorner_woocommerce_product_additional_information_before(){
	echo '<div>';
}

function cozycorner_woocommerce_product_additional_information_after(){
	echo '</div>';
}

function cozycorner_template_single_product_video_360_buttons(){
	if( !is_singular('product') ){
		return;
	}
	
	global $product;
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		echo '<a class="ts-product-video-button" href="#" data-product_id="'.$product->get_id().'">'.esc_html__('Video', 'cozycorner').'</a>';
		add_action('wp_footer', 'cozycorner_add_product_video_popup_modal', 999);
	}
	
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$galleries = array_map('trim', explode(',', $gallery_360));
		$image_array = array();
		foreach($galleries as $gallery ){
			$image_src = wp_get_attachment_image_url($gallery, 'woocommerce_single');
			if( $image_src ){
				$image_array[] = "'" . $image_src . "'";
			}
		}
		wp_enqueue_script('threesixty');
		wp_add_inline_script('threesixty', 'var _ts_product_360_image_array = ['.implode(',', $image_array).'];');
		
		echo '<a class="ts-product-360-button" href="#">'.esc_html__('360 View', 'cozycorner').'</a>';
		add_action('wp_footer', 'cozycorner_add_product_360_popup_modal', 999);
	}
}

function cozycorner_add_product_video_popup_modal(){
	?>
	<div id="ts-product-video-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-video-container popup-container">
			<span class="close"><?php esc_html_e('Close ', 'cozycorner'); ?></span>
			<div class="product-video-content"></div>
		</div>
	</div>
	<?php
}

function cozycorner_add_product_360_popup_modal(){
	?>
	<div id="ts-product-360-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-360-container popup-container">
			<span class="close"><?php esc_html_e('Close ', 'cozycorner'); ?></span>
			<div class="product-360-content"><?php cozycorner_load_product_360(); ?></div>
		</div>
	</div>
	<?php
}

function cozycorner_add_product_size_chart_popup_modal(){
	?>
	<div id="ts-product-size-chart-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-size-chart-container popup-container">
			<span class="close"><?php esc_html_e('Close ', 'cozycorner'); ?></span>
			<div class="product-size-chart-content">
				<?php cozycorner_product_size_chart_content(); ?>
			</div>
		</div>
	</div>
	<?php
}

function cozycorner_add_classes_to_single_product_thumbnail( $classes ){
	global $product;
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		$classes[] = 'has-video';
	}
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$classes[] = 'has-360-gallery';
	}
	
	return $classes;
}

function cozycorner_product_gallery_thumbnail_size(){
	return 'woocommerce_thumbnail';
}

/* Single Product Video - Register ajax */
function cozycorner_load_product_video_callback(){
	check_ajax_referer( 'cozycorner-product-video-nonce', 'security' );
	
	if( empty($_POST['product_id']) ){
		die( esc_html__('Invalid Product', 'cozycorner') );
	}
	
	$prod_id = absint($_POST['product_id']);

	if( $prod_id <= 0 ){
		die( esc_html__('Invalid Product', 'cozycorner') );
	}
	
	$video_url = get_post_meta($prod_id, 'ts_prod_video_url', true);
	ob_start();
	if( !empty($video_url) ){
		echo do_shortcode('[ts_video src='.esc_url($video_url).']');
	}
	die( ob_get_clean() );
}

function cozycorner_load_product_360(){
	?>
	<div class="threesixty ts-product-360">
		<div class="spinner">
			<span>0%</span>
		</div>
		<ol class="threesixty_images"></ol>
	</div>
	<?php
}

function cozycorner_template_single_countdown(){
	if( cozycorner_get_theme_options('ts_prod_count_down') && function_exists('ts_template_loop_time_deals') ){
		?>
		<div class="product-counter">
			<?php ts_template_loop_time_deals(); ?>
			<span><?php esc_html_e('Sale ends in', 'cozycorner'); ?></span>
		</div>
		<?php
	}
}

function cozycorner_template_single_variation_price(){
	if( cozycorner_get_theme_options('ts_prod_price') ){
		echo '<div class="ts-variation-price hidden"></div>';
	}
}

function cozycorner_variation_attribute_options_args( $args ){
	if( !cozycorner_get_theme_options('ts_prod_attr_dropdown') ){
		$args['class'] = 'hidden hidden-1';
	}
	return $args;
}

function cozycorner_get_color_variation_thumbnails(){
	global $product;
	$color_variation_thumbnails = array();
	
	$attribute_name = wc_attribute_taxonomy_name( 'color' );
	$variation_attribute_name = wc_variation_attribute_name( $attribute_name );
	
	$children = $product->get_children();
	if( is_array($children) && count($children) > 0 ){
		foreach( $children as $children_id ){
			$variation_attributes = wc_get_product_variation_attributes( $children_id );
			foreach( $variation_attributes as $attr_name => $attr_value ){
				if( $attr_name == $variation_attribute_name ){
					if( !$attr_value ){ /* Any */
						break;
					}
					if( in_array( $attr_value, array_keys($color_variation_thumbnails) ) ){
						break;
					}
					
					$variation = wc_get_product( $children_id );
					$color_variation_thumbnails[$attr_value] = $variation->get_image();
					
					break;
				}
			}
		}
	}
	
	return $color_variation_thumbnails;
}

function cozycorner_variation_attribute_options_html( $html, $args ){
	$theme_options = cozycorner_get_theme_options();
	
	if( $theme_options['ts_prod_attr_dropdown'] ){
		return $html;
	}
	
	global $product;
	
	$attr_color_text = $theme_options['ts_prod_attr_color_text'];
	$use_variation_thumbnail = $theme_options['ts_prod_attr_color_variation_thumbnail'];
	
	$options = $args['options'];
	$attribute_name = $args['attribute'];
	
	ob_start();
	
	if( $theme_options['ts_prod_size_chart'] && is_singular('product') ){
		if( strpos( sanitize_title( $attribute_name ), 'size' ) !== false && cozycorner_get_product_size_chart_id() ){
			echo '<a class="ts-product-size-chart-button" href="#"><span>' . esc_html__('Size Chart', 'cozycorner') . '</span></a>';
			add_action('wp_footer', 'cozycorner_add_product_size_chart_popup_modal', 999);
			wp_cache_set('ts_size_chart_is_showed', true);
		}
	}
	
	if( is_array( $options ) ){
	?>
		<div class="ts-product-attribute">
		<?php 
		$selected_key = 'attribute_' . sanitize_title( $attribute_name );
		
		$selected_value = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $product->get_variation_default_attribute( $attribute_name );
		
		// Get terms if this is a taxonomy - ordered
		if( taxonomy_exists( $attribute_name ) ){
			
			$class = 'option';
			$is_attr_color = false;
			$attribute_color = wc_sanitize_taxonomy_name( 'color' );
			if( $attribute_name == wc_attribute_taxonomy_name( $attribute_color ) ){
				if( !$attr_color_text ){
					$is_attr_color = true;
					$class .= ' color';
					
					if( $use_variation_thumbnail ){
						$color_variation_thumbnails = cozycorner_get_color_variation_thumbnails();
					}
				}
				else{
					$class .= ' text';
				}
			}
			$terms = wc_get_product_terms( $product->get_id(), $attribute_name, array( 'fields' => 'all' ) );

			foreach ( $terms as $term ) {
				if ( ! in_array( $term->slug, $options ) ) {
					continue;
				}
				$term_name = apply_filters( 'woocommerce_variation_option_name', $term->name );
				
				if( $is_attr_color && !$use_variation_thumbnail ){
					$datas = get_term_meta( $term->term_id, 'ts_product_color_config', true );
					if( $datas ){
						$datas = unserialize( $datas );	
					}else{
						$datas = array(
									'ts_color_color' 				=> "#ffffff"
									,'ts_color_image' 				=> 0
								);
					}
				}
				
				$selected_class = sanitize_title( $selected_value ) == sanitize_title( $term->slug ) ? 'selected' : '';
				
				echo '<div data-value="' . esc_attr( $term->slug ) . '" class="'. $class .' '. $selected_class .'">';
				
				if( $is_attr_color ){
					if( $use_variation_thumbnail ){
						if( isset($color_variation_thumbnails[$term->slug]) ){
							echo '<a href="#">' . $color_variation_thumbnails[$term->slug] . '<span class="ts-tooltip button-tooltip">' . esc_html( $term_name ) . '</span></a>';
						}
					}
					else{
						if( absint($datas['ts_color_image']) > 0 ){
							echo '<a href="#">' . wp_get_attachment_image( absint($datas['ts_color_image']), 'ts_prod_color_thumb', true, array('title' => $term_name, 'alt' => $term_name) ) . '<span class="ts-tooltip button-tooltip">' . esc_html( $term_name ) . '</span></a>';
						}
						else{
							echo '<a href="#"><span style="background-color:' . $datas['ts_color_color'] . '"></span><span class="ts-tooltip button-tooltip">' . esc_html( $term_name ) . '</span></a>';
						}
					}
				}
				else{
					echo '<a href="#">' . esc_html( $term_name ) . '</a>';
				}
				
				echo '</div>';
			}

		} else {
			foreach( $options as $option ){
				$class = 'option';
				$class .= sanitize_title( $selected_value ) == sanitize_title( $option ) ? ' selected' : '';
				echo '<div data-value="' . esc_attr( $option ) . '" class="' . $class . '"><a href="#">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</a></div>';
			}
		}
		?>
	</div>
	<?php
	}
	
	return ob_get_clean() . $html;
}

function cozycorner_single_product_calc_discount(){
	if( !cozycorner_get_theme_options('ts_prod_price') || !cozycorner_get_theme_options('ts_prod_discount_number') ){
		return;
	}
	
	global $product;
	if( !$product->is_on_sale() ){
		return;
	}
	
	if( $product->get_type() == 'variable' ){
		$number = '-1'; /* add html but hide */
	}
	else{
		$number = cozycorner_get_product_on_sale_display( $product, 'percent' );
	}
	
	if( $number ){
		echo '<span class="ts-discount-number '.($number == '-1' ? 'hidden': '').'">' . $number . '</span>';
	}
}

function cozycorner_add_discount_number_to_variation( $attributes, $variable, $variation ){
	if( $variation->is_on_sale() ){
		$theme_options = cozycorner_get_theme_options();
		if( $theme_options['ts_prod_price'] && $theme_options['ts_prod_discount_number'] ){
			$attributes['discount_number'] = cozycorner_get_product_on_sale_display( $variation, 'percent' );
		}
		if( in_array( $theme_options['ts_show_sale_label_as'], array('number', 'percent') ) ){
			$attributes['sale_label_display'] = cozycorner_get_product_on_sale_display( $variation, $theme_options['ts_show_sale_label_as'] );
		}
	}
	return $attributes;
}

function cozycorner_single_group_product_add_heading(){
	global $product;
	$heading = cozycorner_get_theme_options('ts_prod_group_heading');
	if( $heading && $product->get_type() == 'grouped' ){
		echo '<h4 class="group-product-heading">' . esc_html($heading) . '</h4>';
	}
}

function cozycorner_woocommerce_grouped_product_thumbnail( $product_child ){
    ?>
    <td class="woocommerce-grouped-product-list-item__thumbnail">
        <?php echo wp_kses( $product_child->get_image(), 'cozycorner_product_image' ); ?>
    </td>
    <?php
}

function cozycorner_single_product_buy_now_button(){
	if( cozycorner_get_theme_options('ts_enable_catalog_mode') ){
		return;
	}

	global $product;
	if( cozycorner_get_theme_options('ts_prod_buy_now') && in_array( $product->get_type(), array('simple', 'variable') ) && $product->is_purchasable() && $product->is_in_stock() ){
	?>
		<a href="#" class="button ts-buy-now-button"><?php esc_html_e('Buy now', 'cozycorner'); ?></a>
	<?php
	}
}

function cozycorner_product_buy_now_redirect( $url ){
	if( isset($_REQUEST['ts_buy_now']) && $_REQUEST['ts_buy_now'] == 1 ){
		return apply_filters( 'cozycorner_product_buy_now_redirect_url', wc_get_checkout_url() );
	}
	return $url;
}

function cozycorner_template_single_sku(){
	global $product;
	if( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ){
		echo '<div class="sku-wrapper product_meta"><span>' . esc_html__( 'Product code', 'cozycorner' ) . '</span><span class="sku">' . (( $sku = $product->get_sku()) ? $sku : esc_html__( 'N/A', 'cozycorner' )) . '</span></div>';
	}
}

function cozycorner_template_single_categories(){
	global $product;
	
	if( cozycorner_get_theme_options('ts_prod_cat') ){
		echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="cats-link"><span>' . esc_html__('Categories', 'cozycorner') . '</span><span class="cat-links">', '</span></div>' );
	}
}

function cozycorner_template_single_availability(){
	global $product;
	$product_stock = $product->get_availability();
	$availability_text = empty($product_stock['availability'])?__('In stock', 'cozycorner'):$product_stock['availability'];
	?>
		<div class="availability stock <?php echo esc_attr($product_stock['class']); ?>" data-original="<?php echo esc_attr( $availability_text ); ?>" data-class="<?php echo esc_attr($product_stock['class']) ?>">
			<span><?php esc_html_e( 'Availability ', 'cozycorner' ); ?></span>
			<span class="availability-text"><?php echo esc_html($availability_text); ?></span>
		</div>
	<?php
}

function cozycorner_template_single_meta(){
	global $product;
	$theme_options = cozycorner_get_theme_options();
	
	echo '<div class="meta-content">';
		do_action( 'woocommerce_product_meta_start' );
		
		if( $theme_options['ts_prod_sku'] ){
			cozycorner_template_single_sku();
		}
		
		if( $theme_options['ts_prod_availability'] ){
			cozycorner_template_single_availability();
		}
		
		cozycorner_template_single_categories();
		
		if( $theme_options['ts_prod_tag'] ){
			echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tags-link"><span>' . esc_html__( 'Product tags', 'cozycorner' ) . '</span><span class="tag-links">', '</span></div>' );	
		}

		do_action( 'woocommerce_product_meta_end' );
	echo '</div>';
	
	if( $theme_options['ts_prod_sharing'] ){
		woocommerce_template_single_sharing();
	}
}

/************************************* 
* Group single product buttons sharing 
* Start div 31
* Wishlist 31
* Compare 35
* Close div buttons 41
*************************************/
function cozycorner_single_product_buttons_sharing_start(){
	?>
	<div class="single-product-buttons">
	<?php
}

function cozycorner_single_product_buttons_sharing_end(){
	?>
	</div>
	<?php
}

function cozycorner_mysql_version_greater_8(){
	if( function_exists('wc_get_server_database_version') ){
		$database_version = wc_get_server_database_version();
		$number = isset($database_version['number']) ? $database_version['number'] : '';
		if( $number ){
			if( version_compare( $number, '8.0.0', '>=' ) ){
				return true;
			}
		}
	}
	return false;
}

/*** Product size chart ***/
function cozycorner_get_product_size_chart_id(){
	global $product;
	$product_id = $product->get_id();
	$cache_key = 'cozycorner_size_chart_id_of_' . $product_id;
	$size_chart_id = wp_cache_get($cache_key);
	if( false !== $size_chart_id ){
		return $size_chart_id;
	}
	$size_chart_id = get_post_meta($product_id, 'ts_prod_size_chart', true);
	if( $size_chart_id ){
		wp_cache_set($cache_key, $size_chart_id);
		return $size_chart_id;
	}
	$product_cats = wc_get_product_term_ids( $product_id, 'product_cat' );
	if( !empty($product_cats) && is_array($product_cats) ){
		$args = array(
                    'posts_per_page'         => 1,
                    'order'                  => 'DESC',
                    'post_type'              => 'ts_size_chart',
                    'post_status'            => 'publish',
                    'no_found_rows'          => true,
                    'update_post_term_cache' => false,
                    'fields'                 => 'ids',
                );
				
		if( count( $product_cats ) > 1 ){
			$args['meta_query']['relation'] = 'OR';
		}
		
		foreach( $product_cats as $product_cat ){
			$args['meta_query'][] = array(
				'key'     => 'ts_chart_categories',
				'value'   => cozycorner_mysql_version_greater_8() ? "\\b{$product_cat}\\b" : "[[:<:]]{$product_cat}[[:>:]]",
				'compare' => 'RLIKE',
			);
		}
		
		$size_charts = new WP_Query( $args );
		if( $size_charts->have_posts() ){
			foreach( $size_charts->posts as $id ){
				$size_chart_id = $id;
			}
		}
		wp_reset_postdata();
	}
	wp_cache_set($cache_key, $size_chart_id);
	
	return $size_chart_id;
}

function cozycorner_product_size_chart_content(){
	$chart_id = cozycorner_get_product_size_chart_id();
	$chart_content = get_the_content( null, false, $chart_id );
	$chart_label = get_post_meta( $chart_id, 'ts_chart_label', true );
	$chart_image = get_post_meta( $chart_id, 'ts_chart_image', true );
	$chart_table = get_post_meta( $chart_id, 'ts_chart_table', true );
	
	if( $chart_table ){
		$chart_table = json_decode( $chart_table, true );
		if( is_array($chart_table) ){
			$chart_table = array_filter($chart_table, function($v, $k){
				return is_array($v) && array_filter($v);
			}, ARRAY_FILTER_USE_BOTH);
		}
	}
	
	$classes = array();
	if( $chart_image ){
		$classes[] = 'has-image';
	}
	
	if( !empty($chart_table) && is_array($chart_table) ){
		$classes[] = 'has-table';
	}
	?>
	<h2><?php echo esc_html__('Size guide', 'cozycorner'); ?></h2>
	<div class="ts-size-chart-content <?php echo implode(' ', $classes); ?>">
		<?php
		if( $chart_label ){
			echo '<h5 class="chart-label">'.esc_html($chart_label).'</h5>';
		}
		
		if( $chart_content ){
			echo '<div class="chart-content">';
				echo wp_kses_post( $chart_content ); /* Allowed html as post content */
			echo '</div>';
		}
		
		if( $chart_image ){
			echo '<div class="chart-image">';
				echo '<img src="'.esc_url($chart_image).'" alt="'.esc_attr($chart_label).'" />';
			echo '</div>';
		}
		
		if( !empty($chart_table) && is_array($chart_table) ){
			echo '<table class="chart-table"><tbody>';
			foreach( $chart_table as $row ){
				echo '<tr>';
				foreach( $row as $col ){
					echo '<td>'.esc_html($col).'</td>';
				}
				echo '</tr>';
			}
			echo '</tbody></table>';
		}
		?>
	</div>
	<?php
}

/* Summary Custom Content */
function cozycorner_product_summary_custom_content(){
	global $product;
	
	$title = get_post_meta( $product->get_id(), 'ts_prod_summary_custom_content_title', true );
	if( !$title ){
		$title = cozycorner_get_theme_options('ts_prod_summary_custom_content_title');
	}
	
	$content = get_post_meta( $product->get_id(), 'ts_prod_summary_custom_content', true );
	if( !$content ){
		$content = cozycorner_get_theme_options('ts_prod_summary_custom_content');
	}
	
	if( $content ){
		if( $title ){
			echo '<h3 class="summary-custom-content-title">' . esc_html($title) . '</h3>';
		}
		
		echo '<div class="ts-summary-custom-content">';
		echo do_shortcode( $content );
		echo '</div>';
	}
}

/*** Product tab ***/
function cozycorner_product_remove_tabs( $tabs = array() ){
	if( !cozycorner_get_theme_options('ts_prod_tabs') ){
		return array();
	}
	if( cozycorner_get_theme_options('ts_prod_separate_reviews_tab') ){
		unset( $tabs['reviews'] );
	}
	return $tabs;
}

function cozycorner_product_reviews_tab_content(){
	if( cozycorner_get_theme_options('ts_prod_separate_reviews_tab') ){
		comments_template();
	}
}

function cozycorner_add_product_custom_tab( $tabs = array() ){
	global $post;
	$theme_options = cozycorner_get_theme_options();
	$override_custom_tab = get_post_meta( $post->ID, 'ts_prod_custom_tab', true );
	
	if( $theme_options['ts_prod_custom_tab'] || $override_custom_tab ){
		if( $override_custom_tab ){
			$custom_tab_title = get_post_meta( $post->ID, 'ts_prod_custom_tab_title', true );
			$custom_tab_content = get_post_meta( $post->ID, 'ts_prod_custom_tab_content', true );
		}
		else{
			$custom_tab_title = $theme_options['ts_prod_custom_tab_title'];
			$custom_tab_content = $theme_options['ts_prod_custom_tab_content'];
		}

		if( $custom_tab_content ){
			add_filter('cozycorner_woocommerce_custom_tab_content', function($arg) use ($custom_tab_content) {
				return $custom_tab_content;
			});
		}

		if( $custom_tab_title || $custom_tab_content ){
			$tabs['ts_custom'] = array(
				'title'					=> esc_html( $custom_tab_title ) 
				,'priority' 			=> 25
				,'callback' 			=> 'cozycorner_product_custom_tab_content'
				,'callback_parameters' 	=> $custom_tab_title
			);
		}
	}
	
	if( $theme_options['ts_prod_size_chart'] && cozycorner_get_product_size_chart_id() && wp_cache_get('ts_size_chart_is_showed') === false ){
		$tabs['ts_size_chart'] = array(
				'title'					=> esc_html__('Size guide', 'cozycorner')
				,'priority' 			=> 28
				,'callback' 			=> 'cozycorner_product_size_chart_content'
			);
	}
	
	$dimensions = get_post_meta( $post->ID, 'ts_prod_dimensions', true );
	if( $dimensions ){
		$dimensions = json_decode( $dimensions, true );
		if( is_array($dimensions) ){
			$dimensions = array_filter($dimensions, function($v, $k){
				return is_array($v) && array_filter($v);
			}, ARRAY_FILTER_USE_BOTH);
			
			if( !empty($dimensions) ){
				$tabs['ts_dimensions'] = array(
					'title'					=> esc_html__('Specifications', 'cozycorner')
					,'priority' 			=> 15
					,'callback' 			=> 'cozycorner_product_dimensions_content'
					,'dimensions' 			=> $dimensions
				);
			}
		}
	}

	return $tabs;
}

function cozycorner_product_dimensions_content( $name, $tab ){
	echo '<h2>' . esc_html__('Specifications', 'cozycorner') . '</h2>';
	echo '<div class="ts-dimensions-content">';
		echo '<ul>';
		foreach( $tab['dimensions'] as $row ){
			echo '<li>';
			foreach( $row as $col ){
				echo '<span>' . esc_html($col) . '</span>';
			}
			echo '</li>';
		}
		echo '</ul>';
	echo '</div>';
}

function cozycorner_product_custom_tab_content($name, $tab){
	$custom_tab_content = apply_filters( 'cozycorner_woocommerce_custom_tab_content', '' );

	if( $tab['callback_parameters'] ){
		echo '<h2>' . esc_html( $tab['callback_parameters'] ) . '</h2>';
	}
	
	if( $custom_tab_content ){
		echo '<div class="custom-tab-content">'. do_shortcode( $custom_tab_content ) .'</div>';
	}
}

/* Ads Banner */
function cozycorner_product_ads_banner(){
	if( cozycorner_get_theme_options('ts_prod_ads_banner') ){
		global $product;
		$content = get_post_meta( $product->get_id(), 'ts_prod_ads_banner_content', true );
		if( !$content ){
			$content = cozycorner_get_theme_options('ts_prod_ads_banner_content');
		}
		
		if( $content ){
			echo '<div class="ads-banner ts-custom-block-content hidden">';
			cozycorner_get_custom_block_content( $content );
			echo '</div>';
		}
	}
}

function cozycorner_product_bottom_content(){
	global $product;
	$content = get_post_meta( $product->get_id(), 'ts_prod_bottom_content', true );
	if( !$content ){
		$content = cozycorner_get_theme_options('ts_prod_bottom_content');
	}
	
	if( $content ){
		echo '<div class="product-bottom-content ts-custom-block-content hidden">';
		cozycorner_get_custom_block_content( $content );
		echo '</div>';
	}
}

/* Related Products */
function cozycorner_output_related_products_args_filter( $args ){
	$args['posts_per_page'] = 6;
	$args['columns'] = 5;
	return $args;
}

/* Change grouped product columns */
function cozycorner_woocommerce_grouped_product_columns( $columns ){
	$columns = array('label', 'price', 'quantity');
	return $columns;
}


/*** General hook ***/

/*************************************************************
* Custom group button on product (quickshop, wishlist, compare) 
* Begin tag: 	10000
* Wishlist: 	10001
* Compare:   	10003 
* Quickshop:  	10002
* Add To Cart: 	10004
* End tag:   	10005
**************************************************************/
function cozycorner_product_group_button_start(){	
	echo '<div class="product-group-button">';
}

function cozycorner_product_group_button_end(){
	echo '</div>';
}

add_action('init', 'cozycorner_wrap_product_group_button', 20);
function cozycorner_wrap_product_group_button(){
	add_action('woocommerce_after_shop_loop_item_title', 'cozycorner_product_group_button_start', 10000);
	add_action('woocommerce_after_shop_loop_item_title', 'cozycorner_product_group_button_end', 10005);
	
	add_action( 'woocommerce_after_shop_loop_item_title', 'cozycorner_template_loop_add_to_cart', 10004 );
	if( cozycorner_get_theme_options('ts_product_style') == 'v4' ){
		add_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_add_to_cart', 20);
	}
}

/*************************************************************
* Group button on product meta (add to cart, wishlist, compare) 
* Begin tag: 59
* Add to cart: 60
* End tag: 70
*************************************************************/
add_action('woocommerce_after_shop_loop_item_2', 'cozycorner_product_group_button_meta_start', 10);
add_action('woocommerce_after_shop_loop_item_2', 'cozycorner_product_group_button_meta_end', 60);
function cozycorner_product_group_button_meta_start(){
	echo '<div class="product-group-button-meta">';
}

function cozycorner_product_group_button_meta_end(){
	echo '</div>';
}
/*** End General hook ***/

/*** Quantity Input hooks ***/
add_action('woocommerce_before_quantity_input_field', 'cozycorner_before_quantity_input_field', 1);
function cozycorner_before_quantity_input_field(){
	global $product;
	?>
	<label class="ts-screen-reader-text"><?php esc_html_e('Quantity', 'cozycorner'); ?></label>
	<div class="number-button">
		<input type="button" value="-" class="minus" />
	<?php
}

add_action('woocommerce_after_quantity_input_field', 'cozycorner_after_quantity_input_field', 99);
function cozycorner_after_quantity_input_field(){
	?>
		<input type="button" value="+" class="plus" />
	</div>
	<?php
}

/*** Cart - Checkout hooks ***/
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

add_action('woocommerce_cart_actions', 'cozycorner_empty_cart_button');
function cozycorner_empty_cart_button(){
?>
	<button type="submit" class="button empty-cart-button" name="ts_empty_cart" value="<?php esc_attr_e('Empty cart', 'cozycorner'); ?>"><?php esc_html_e('Empty cart', 'cozycorner'); ?></button>
<?php
}

add_action('init', 'cozycorner_empty_woocommerce_cart');
function cozycorner_empty_woocommerce_cart(){
	if( isset($_POST['ts_empty_cart']) ){
		WC()->cart->empty_cart();
	}
}

add_action('woocommerce_before_checkout_form', 'cozycorner_before_checkout_form_start', 1);
add_action('woocommerce_before_checkout_form', 'cozycorner_before_checkout_form_end', 999);
function cozycorner_before_checkout_form_start(){
	echo '<div class="checkout-login-coupon-wrapper">';
}
function cozycorner_before_checkout_form_end(){
	echo '</div>';
}

remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
add_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 20);

remove_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10);
add_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 1000);

if( !( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) ){
	add_action('woocommerce_before_checkout_form', function(){
		echo '<div class="checkout-login-wrapper">';
	}, 9);
	add_action('woocommerce_before_checkout_form', function(){
		echo '</div>';
	}, 11);
}

if( function_exists('wc_coupons_enabled') && wc_coupons_enabled() ){
	add_action('woocommerce_before_checkout_form', function(){
		echo '<div class="checkout-coupon-wrapper">';
	}, 19);
	add_action('woocommerce_before_checkout_form', function(){
		echo '</div>';
	}, 21);
}

add_filter( 'woocommerce_catalog_orderby', 'cozycorner_woocommerce_catalog_orderby_filter' );
function cozycorner_woocommerce_catalog_orderby_filter( $array ){
	$array['menu_order'] 	= __('Default', 'cozycorner');
	$array['popularity'] 	= __('Popularity', 'cozycorner');
	$array['rating'] 		= __('Average Rating', 'cozycorner');
	$array['date'] 			= __('Latest', 'cozycorner');
	$array['price'] 		= __('Price - Low to high', 'cozycorner');
	$array['price-desc'] 	= __('Price - High to low', 'cozycorner');
	return $array;
}

add_filter( 'woocommerce_gallery_image_size', 'cozycorner_woocommerce_gallery_image_size' );
function cozycorner_woocommerce_gallery_image_size( $size ){
	if( cozycorner_get_theme_options('ts_prod_gallery_layout') == 'grid' ){
		$size = 'woocommerce_single';
	}
	return $size;
}

add_action( 'woocommerce_no_products_found', 'cozycorner_woocommerce_no_products_found', 1 );
function cozycorner_woocommerce_no_products_found(){
	if( is_search() ){
		echo '<div class="search-no-results-wrapper">';
			echo '<p>'. esc_html__('No products were found matching your selection. Check the spelling or use a different word or phrase.', 'cozycorner'). '</p>';
			echo '<div class="search--form">';
				get_search_form();
			echo '</div>';
		echo '</div>';
		
		remove_action( 'woocommerce_no_products_found', 'wc_no_products_found' );
	}
}

add_filter( 'woocommerce_single_product_carousel_options', 'cozycorner_woocommerce_single_product_carousel_options' );
add_filter( 'cozycorner_quickshop_product_carousel_options', 'cozycorner_woocommerce_single_product_carousel_options' );
function cozycorner_woocommerce_single_product_carousel_options( $options ){
	$options['animation'] = 'fade';
	$options['animationSpeed'] = 250;
	return $options;
}

add_filter( 'woocommerce_single_product_carousel_options', 'cozycorner_woocommerce_single_product_carousel_options_2', 20 );
function cozycorner_woocommerce_single_product_carousel_options_2( $options ){
	if( cozycorner_get_theme_options('ts_prod_gallery_layout') == 'slider-2-col' ){
		$options['animation'] = 'slide';
		$options['animationSpeed'] = 500;
		$options['itemWidth'] = 664;
		$options['itemMargin'] = 10;
		$options['minItems'] = 2;
		$options['maxItems'] = 2;
		$options['move'] = 1;
		$options['directionNav'] = true;
	}
	return $options;
}