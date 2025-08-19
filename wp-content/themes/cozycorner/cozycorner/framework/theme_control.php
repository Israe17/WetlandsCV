<?php 
/*** Template Redirect ***/
add_action('template_redirect', 'cozycorner_template_redirect');
function cozycorner_template_redirect(){
	global $wp_query, $post;

	/* Get Page Options */
	if( is_page() || is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( is_page() ){
			$page_id = $post->ID;
		}
		if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
			$page_id = get_option('woocommerce_shop_page_id', 0);
		}
		$page_options = cozycorner_set_global_page_options( $page_id );
		
		if( $page_options['ts_layout_fullwidth'] != 'default' ){
			cozycorner_change_theme_options('ts_layout_fullwidth', $page_options['ts_layout_fullwidth']);
			if( $page_options['ts_layout_fullwidth'] ){
				cozycorner_change_theme_options('ts_header_layout_fullwidth', $page_options['ts_header_layout_fullwidth']);
				cozycorner_change_theme_options('ts_main_content_layout_fullwidth', $page_options['ts_main_content_layout_fullwidth']);
				cozycorner_change_theme_options('ts_footer_layout_fullwidth', $page_options['ts_footer_layout_fullwidth']);
			}
		}

		if( $page_options['ts_layout_style'] != 'default' ){
			cozycorner_change_theme_options('ts_layout_style', $page_options['ts_layout_style']);
		}
		
		if( $page_options['ts_header_layout'] != 'default' ){
			cozycorner_change_theme_options('ts_header_layout', $page_options['ts_header_layout']);
		}
		
		if( $page_options['ts_breadcrumb_layout'] != 'default' ){
			cozycorner_change_theme_options('ts_breadcrumb_layout', $page_options['ts_breadcrumb_layout']);
		}
		
		if( $page_options['ts_breadcrumb_bg_parallax'] != 'default' ){
			cozycorner_change_theme_options('ts_breadcrumb_bg_parallax', $page_options['ts_breadcrumb_bg_parallax']);
		}
		
		if( trim($page_options['ts_bg_breadcrumbs']) != '' ){
			cozycorner_change_theme_options('ts_bg_breadcrumbs', $page_options['ts_bg_breadcrumbs']);
		}
		
		if( trim($page_options['ts_logo']) != '' ){
			cozycorner_change_theme_options('ts_logo', $page_options['ts_logo']);
		}
		
		if( trim($page_options['ts_logo_mobile']) != '' ){
			cozycorner_change_theme_options('ts_logo_mobile', $page_options['ts_logo_mobile']);
		}
		
		if( trim($page_options['ts_logo_sticky']) != '' ){
			cozycorner_change_theme_options('ts_logo_sticky', $page_options['ts_logo_sticky']);
		}
		
		if( $page_options['ts_menu_id'] ){
			add_filter('wp_nav_menu_args', 'cozycorner_filter_wp_nav_menu_args');
		}
		
		if( $page_options['ts_footer_block'] ){
			cozycorner_change_theme_options('ts_footer_block', $page_options['ts_footer_block']);
		}
		
		if( $page_options['ts_header_transparent'] ){
			add_filter('body_class', function($classes) use ($page_options){
				$classes[] = 'header-transparent header-text-' . $page_options['ts_header_text_color'];
				return $classes;
			});
		}
	}
	
	/* Archive - Category product */
	if( is_tax( get_object_taxonomies('product') ) || is_post_type_archive('product') || (function_exists('dokan_is_store_page') && dokan_is_store_page()) ){
		cozycorner_set_header_breadcrumb_layout_woocommerce_page( 'shop' );
		
		add_action('woocommerce_before_main_content', 'cozycorner_remove_hooks_from_shop_loop');
		
		if( is_tax( get_object_taxonomies('product') ) || is_post_type_archive('product') ){
			add_action('woocommerce_before_main_content', 'cozycorner_add_extra_content_shop_list_view');
		}
		
		/* Update product category layout */
		if( is_tax('product_cat') ){
			$term = $wp_query->queried_object;
			if( !empty($term->term_id) ){
				$logo_id = get_term_meta($term->term_id, 'logo_id', true);
				$mobile_logo_id = get_term_meta($term->term_id, 'mobile_logo_id', true);
				$sticky_logo_id = get_term_meta($term->term_id, 'sticky_logo_id', true);
				$bg_breadcrumbs_id = get_term_meta($term->term_id, 'bg_breadcrumbs_id', true);
				$layout = get_term_meta($term->term_id, 'layout', true);
				$left_sidebar = get_term_meta($term->term_id, 'left_sidebar', true);
				$right_sidebar = get_term_meta($term->term_id, 'right_sidebar', true);
				
				if( $bg_breadcrumbs_id != '' ){
					$bg_breadcrumbs_src = wp_get_attachment_url( $bg_breadcrumbs_id );
					if( $bg_breadcrumbs_src !== false ){
						cozycorner_change_theme_options('ts_bg_breadcrumbs', $bg_breadcrumbs_src);
					}
				}
				if( $layout != '' ){
					cozycorner_change_theme_options('ts_prod_cat_layout', $layout);
				}
				if( $left_sidebar != '' ){
					cozycorner_change_theme_options('ts_prod_cat_left_sidebar', $left_sidebar);
				}
				if( $right_sidebar != '' ){
					cozycorner_change_theme_options('ts_prod_cat_right_sidebar', $right_sidebar);
				}
				
				if( $logo_id ){
					$logo_src = wp_get_attachment_image_url( $logo_id, 'full' );
					if( $logo_src ){
						cozycorner_change_theme_options('ts_logo', $logo_src);
					}
				}
				
				if( $mobile_logo_id ){
					$logo_src = wp_get_attachment_image_url( $mobile_logo_id, 'full' );
					if( $logo_src ){
						cozycorner_change_theme_options('ts_logo_mobile', $logo_src);
					}
				}
				
				if( $sticky_logo_id ){
					$logo_src = wp_get_attachment_image_url( $sticky_logo_id, 'full' );
					if( $logo_src ){
						cozycorner_change_theme_options('ts_logo_sticky', $logo_src);
					}
				}
			}
		}
	}
	
	/* Single post */
	if( is_singular('post') ){
		/* Remove hooks on Related and Featured products */
		cozycorner_remove_hooks_from_shop_loop();
		
		$post_data = array();
		$post_custom = get_post_custom();
		foreach( $post_custom as $key => $value ){
			if( isset($value[0]) ){
				$post_data[$key] = $value[0];
			}
		}
		
		if( isset($post_data['ts_post_layout']) && $post_data['ts_post_layout'] != '0' ){
			cozycorner_change_theme_options('ts_blog_details_layout', $post_data['ts_post_layout']);
		}
		if( isset($post_data['ts_post_left_sidebar']) && $post_data['ts_post_left_sidebar'] != '0' ){
			cozycorner_change_theme_options('ts_blog_details_left_sidebar', $post_data['ts_post_left_sidebar']);
		}
		if( isset($post_data['ts_post_right_sidebar']) && $post_data['ts_post_right_sidebar'] != '0' ){
			cozycorner_change_theme_options('ts_blog_details_right_sidebar', $post_data['ts_post_right_sidebar']);
		}
		if( isset($post_data['ts_bg_breadcrumbs']) && $post_data['ts_bg_breadcrumbs'] != '' ){
			cozycorner_change_theme_options('ts_bg_breadcrumbs', $post_data['ts_bg_breadcrumbs']);
		}
	}
	
	/* Single product */
	if( is_singular('product') ){
		/* Remove hooks on Related and Up-Sell products */
		add_action('woocommerce_before_main_content', 'cozycorner_remove_hooks_from_shop_loop'); 

		$theme_options = cozycorner_get_theme_options();
		
		/* Product Layout Fullwidth */
		if( $theme_options['ts_prod_layout_fullwidth'] != 'default' ){
			cozycorner_change_theme_options('ts_layout_fullwidth', $theme_options['ts_prod_layout_fullwidth']);
			if( $theme_options['ts_prod_layout_fullwidth'] ){
				cozycorner_change_theme_options('ts_header_layout_fullwidth', $theme_options['ts_prod_header_layout_fullwidth']);
				cozycorner_change_theme_options('ts_main_content_layout_fullwidth', $theme_options['ts_prod_main_content_layout_fullwidth']);
				cozycorner_change_theme_options('ts_footer_layout_fullwidth', $theme_options['ts_prod_footer_layout_fullwidth']);
			}
		}
	
		$prod_data = array();
		$post_custom = get_post_custom();
		foreach( $post_custom as $key => $value ){
			if( isset($value[0]) ){
				$prod_data[$key] = $value[0];
			}
		}
		if( isset($prod_data['ts_prod_layout']) && $prod_data['ts_prod_layout'] != '0' ){
			cozycorner_change_theme_options('ts_prod_layout', $prod_data['ts_prod_layout']);
		}
		if( isset($prod_data['ts_prod_left_sidebar']) && $prod_data['ts_prod_left_sidebar'] != '0' ){
			cozycorner_change_theme_options('ts_prod_left_sidebar', $prod_data['ts_prod_left_sidebar']);
		}
		if( isset($prod_data['ts_prod_right_sidebar']) && $prod_data['ts_prod_right_sidebar'] != '0' ){
			cozycorner_change_theme_options('ts_prod_right_sidebar', $prod_data['ts_prod_right_sidebar']);
		}
		
		if( !$theme_options['ts_prod_thumbnail'] ){
			remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
		}
		
		if( $theme_options['ts_prod_title'] && $theme_options['ts_prod_title_in_content'] ){
			cozycorner_change_theme_options('ts_prod_title', 0); /* remove title above breadcrumb */
			add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
		}
		
		if( !$theme_options['ts_prod_label'] ){
			remove_action('woocommerce_product_thumbnails', 'cozycorner_template_loop_product_label', 99);
		}
		
		if( !$theme_options['ts_prod_brand'] ){
			remove_action('woocommerce_single_product_summary', 'cozycorner_template_brands', 5);
		}
		
		if( !$theme_options['ts_prod_rating'] ){
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);
		}
		
		if( !$theme_options['ts_prod_price'] ){
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
		}

		if( !$theme_options['ts_prod_add_to_cart'] || $theme_options['ts_enable_catalog_mode'] ){
			$terms        = get_the_terms( $post->ID, 'product_type' );
			$product_type = ! empty( $terms ) ? sanitize_title( current( $terms )->name ) : 'simple';
			if( $product_type != 'variable' ){
				remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
			}
			else{
				remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
			}
		}
		
		if( !$theme_options['ts_prod_short_desc'] ){
			remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 25);
		}
		
		/* Related - Upsell Products */
		add_action('woocommerce_after_single_product', 'cozycorner_wrap_related_upsell_crosssell_product', 4);
		add_action('woocommerce_after_single_product', 'cozycorner_unwrap_related_upsell_crosssell_product', 11);
		
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
		if( $theme_options['ts_prod_upsells'] ){
			add_action('woocommerce_after_single_product', 'woocommerce_upsell_display', 5);
		}

		if( $theme_options['ts_prod_related'] ){
			add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 10);
		}
		
		/* Breadcrumb */
		if( isset($prod_data['ts_bg_breadcrumbs']) && $prod_data['ts_bg_breadcrumbs'] != '' ){
			cozycorner_change_theme_options('ts_bg_breadcrumbs', $prod_data['ts_bg_breadcrumbs']);
		}

		if( $theme_options['ts_prod_tabs_position'] == 'inside_summary' ){
			remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
			add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 78);
		}
		
		/* Add extra classes to post */
		add_action('woocommerce_before_single_product', 'cozycorner_woocommerce_before_single_product');

		add_filter( 'woocommerce_comment_pagination_args', function($args){
			$args['prev_text']	= esc_html__( 'Prev', 'cozycorner' );
			$args['next_text']	= esc_html__( 'Next' , 'cozycorner' );
			return $args;
		});
		
		add_filter( 'woocommerce_review_gravatar_size', function() { return 150; } );
	}

	/* 404 template */
	if( is_404() ){
		$page_id = cozycorner_get_theme_options('ts_404_page');

		if( $page_id ){
			wp_redirect(get_permalink($page_id));
		}
	}

	/* WooCommerce - Other pages */
	if( class_exists('WooCommerce') ){
		if( is_cart() ){
			cozycorner_set_header_breadcrumb_layout_woocommerce_page( 'cart' );
			
			add_action('woocommerce_before_cart', 'cozycorner_remove_hooks_from_shop_loop');
			
			add_action('woocommerce_after_cart', 'cozycorner_wrap_related_upsell_crosssell_product', 9);
			add_action('woocommerce_after_cart', 'cozycorner_unwrap_related_upsell_crosssell_product', 11);
		}
		
		if( is_checkout() ){
			cozycorner_set_header_breadcrumb_layout_woocommerce_page( 'checkout' );
		}
		
		if( is_account_page() ){
			cozycorner_set_header_breadcrumb_layout_woocommerce_page( 'myaccount' );
		}
	}

	/* Header Cart - Wishlist */
	if( !class_exists('WooCommerce') ){
		cozycorner_change_theme_options('ts_enable_tiny_shopping_cart', 0);
	}
	
	if( !class_exists('WooCommerce') || !class_exists('TS_Wishlist') ){
		cozycorner_change_theme_options('ts_enable_tiny_wishlist', 0);
	}
	
	/* Right to left */
	if( is_rtl() ){
		cozycorner_change_theme_options('ts_enable_rtl', 1);
	}
}

function cozycorner_filter_wp_nav_menu_args( $args ){
	global $post;

	if( is_page() && !is_admin() && !empty($args['theme_location']) ){
		if( $args['theme_location'] == 'primary' ){
			$menu = get_post_meta($post->ID, 'ts_menu_id', true);
			if( $menu ){
				$args['menu'] = $menu;
			}
		}
	}
	return $args;
}

function cozycorner_remove_hooks_from_shop_loop(){
	$theme_options = cozycorner_get_theme_options();

	if( ! $theme_options['ts_prod_cat_thumbnail'] ){
		remove_action('woocommerce_before_shop_loop_item_title', 'cozycorner_template_loop_product_thumbnail', 10);
	}
	
	if( ! $theme_options['ts_prod_cat_label'] ){
		remove_action('woocommerce_after_shop_loop_item_title', 'cozycorner_template_loop_product_label', 1);
	}
	
	if( ! $theme_options['ts_prod_cat_title'] ){
		remove_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_product_title', 20);
	}
	
	if( ! $theme_options['ts_prod_cat_price'] ){
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 25);
		remove_action('woocommerce_after_shop_loop_item_2', 'woocommerce_template_loop_price', 5);
	}
	
	if( ! $theme_options['ts_prod_cat_rating'] ){
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 30);
	}
	
	if( ! $theme_options['ts_prod_cat_sku'] ){
		remove_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_product_sku', 5);
	}
	
	if( ! $theme_options['ts_prod_cat_cat'] ){
		remove_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_categories', 15);
	}
	
	if( ! $theme_options['ts_prod_cat_brand'] ){
		remove_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_brands', 10);
	}
	
	if( ! $theme_options['ts_prod_cat_desc'] ){
		remove_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_short_description', 40);
	}
	
	if( ! $theme_options['ts_prod_cat_add_to_cart'] ){
		remove_action('woocommerce_after_shop_loop_item_title', 'cozycorner_template_loop_add_to_cart', 10004 );
		remove_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_add_to_cart', 20);
	}

	if( $theme_options['ts_prod_cat_color_swatch'] ){
		add_action('woocommerce_after_shop_loop_item', 'cozycorner_template_loop_product_variable_color', 35);
		$number_color_swatch = absint( $theme_options['ts_prod_cat_number_color_swatch'] );
		add_filter('cozycorner_loop_product_variable_color_number', function() use ($number_color_swatch){
			return $number_color_swatch;
		});
	}
	
	if( in_array( $theme_options['ts_prod_cat_loading_type'], array('infinity-scroll', 'load-more-button') ) ){
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		cozycorner_change_theme_options('ts_prod_cat_per_page_dropdown', 0);
	}
}

function cozycorner_add_extra_content_shop_list_view(){
	$theme_options = cozycorner_get_theme_options();
	
	if( !$theme_options['ts_prod_cat_columns_selector'] && !in_array( $theme_options['ts_prod_cat_columns'], array('1', '1-1', '2') ) ){
		return;
	}
	
	if( $theme_options['ts_prod_cat_quantity_input'] && $theme_options['ts_prod_cat_add_to_cart'] && !$theme_options['ts_enable_catalog_mode'] ){
		add_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_quantity', 15);
	}
	
	if( $theme_options['ts_prod_cat_list_desc'] ){
		add_action('woocommerce_after_shop_loop_item_3', 'cozycorner_template_loop_short_description_list_view', 10);
	}
	
	if( $theme_options['ts_prod_cat_add_to_cart'] && $theme_options['ts_product_style'] != 'v4' ){
		add_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_add_to_cart', 20);
	}
	
	add_action('woocommerce_after_main_content', function(){
		remove_action('woocommerce_after_shop_loop_item_3', 'cozycorner_template_loop_short_description_list_view', 10);
		remove_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_quantity', 15);
		if( cozycorner_get_theme_options('ts_product_style') != 'v4' ){
			remove_action('woocommerce_after_shop_loop_item_2', 'cozycorner_template_loop_add_to_cart', 20);
		}
	}, 1);
}

function cozycorner_template_loop_quantity(){
	global $product;
	if( !$product->is_sold_individually() && $product->get_type() != 'variable' && $product->is_purchasable() && $product->is_in_stock() ){
		woocommerce_quantity_input(
							array(
								'max_value'     => $product->get_max_purchase_quantity()
								,'min_value'    => '1'
								,'product_name' => ''
							)
						);
	}
}

function cozycorner_set_header_breadcrumb_layout_woocommerce_page( $page = 'shop' ){
	/* Header Layout */
	$header_layout = get_post_meta(wc_get_page_id( $page ), 'ts_header_layout', true);
	if( $header_layout != 'default' && $header_layout != '' ){
		cozycorner_change_theme_options('ts_header_layout', $header_layout);
	}
	
	/* Breadcrumb Layout */
	$breadcrumb_layout = get_post_meta(wc_get_page_id( $page ), 'ts_breadcrumb_layout', true);
	if( $breadcrumb_layout != 'default' && $breadcrumb_layout != '' ){
		cozycorner_change_theme_options('ts_breadcrumb_layout', $breadcrumb_layout);
	}
}

function cozycorner_woocommerce_before_single_product(){
	add_filter('post_class', 'cozycorner_single_product_post_class_filter');
}

function cozycorner_single_product_post_class_filter( $classes ){
	global $product;
	
	$theme_options = cozycorner_get_theme_options();

	$classes[] = 'gallery-layout-' . $theme_options['ts_prod_gallery_layout'];
	
	if( !empty( $product->get_gallery_image_ids() ) ){
		$classes[] = 'has-gallery';
	}
	
	if( $theme_options['ts_prod_thumbnails_center'] && $theme_options['ts_prod_gallery_layout'] != 'grid' ){
		$classes[] = 'thumbnails-center';
	}
	
	if( $theme_options['ts_prod_summary_scrolling'] ){
		$classes[] = 'summary-scrolling';
	}
	
	if( $theme_options['ts_prod_tabs_position'] == 'inside_summary' ){
		$classes[] = 'tabs-in-summary';
	}
	
	if( $theme_options['ts_fbt_position'] == 'in-summary' && function_exists('TS_FBT') && !empty( TS_FBT()->get_product_ids($product) ) ){
		$classes[] = 'fbt-in-summary';
	}
	
	if( $theme_options['ts_prod_reviews_tab_styles'] == 'heading-left' ){
		$classes[] = 'reviews-tabs-heading-left';
	}
	
	if( $theme_options['ts_prod_attr_color_variation_thumbnail'] ){
		$classes[] = 'color-variation-thumbnail';
	}

	if( !$theme_options['ts_prod_add_to_cart'] ){
		$classes[] = 'no-add-to-cart';
	}
	
	if( $theme_options['ts_prod_attr_dropdown'] ){
		$classes[] = 'attr-dropdown';
	}
	
	if( $theme_options['ts_prod_buy_now'] ){
		$classes[] = 'has-buy-now-btn';
	}
	
	if( $theme_options['ts_prod_sharing'] && $theme_options['ts_prod_sharing_layout'] == 'vertical' ){
		$classes[] = 'social-icons-vertical';
	}
	
	if( $theme_options['ts_prod_tabs_show_content_default'] ){
		$classes[] = 'show-tabs-content-default';
	}
	else{
		if( $theme_options['ts_prod_tabs_heading_center'] ){
			$classes[] = 'centered-tab-headings';
		}
		
		if( $theme_options['ts_prod_tabs_accordion'] ){
			if( $theme_options['ts_prod_tabs_accordion'] == 'both' || 
				( $theme_options['ts_prod_tabs_accordion'] == 'desktop' && !wp_is_mobile() ) ||
				( $theme_options['ts_prod_tabs_accordion'] == 'mobile' && wp_is_mobile() )
			){
				$classes[] = 'tabs-accordion';
				cozycorner_change_theme_options('ts_prod_more_less_content', 0);
			}
		}
	}
	
	remove_filter('post_class', 'cozycorner_single_product_post_class_filter');
	return $classes;
}

function cozycorner_wrap_related_upsell_crosssell_product(){
	add_filter('woocommerce_product_loop_start', function( $loop_start ){
		return '<div class="content-wrapper">' . $loop_start;
	}, 999);
	
	add_filter('woocommerce_product_loop_end', function( $loop_end ){
		return $loop_end . '</div>';
	}, 999);
}

function cozycorner_unwrap_related_upsell_crosssell_product(){
	remove_all_filters('woocommerce_product_loop_start', 999);
	remove_all_filters('woocommerce_product_loop_end', 999);
}
?>