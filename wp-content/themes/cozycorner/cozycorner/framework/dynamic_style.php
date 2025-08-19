<?php
if( !isset($data) ){
	$data = cozycorner_get_theme_options();
}

$default_options = array(
				'ts_layout_fullwidth'			=> 0
				,'ts_logo_width'				=> "190"
				,'ts_device_logo_width'			=> "133"
				,'ts_mobile_logo_width'			=> "133"
				,'ts_body_padding'				=> "0"
				,'ts_body_padding_md'			=> "0"
				,'ts_body_padding_xs'			=> "0"
				,'ts_content_padding'			=> "70"
				,'ts_content_padding_md'		=> "40"
				,'ts_content_padding_sm'		=> "30"
				,'ts_content_padding_xs'		=> "15"
				,'ts_prod_title_truncate' 		=> 1
				,'ts_prod_title_truncate_row' 	=> 2
				,'ts_custom_font_ttf'			=> array( 'url' => '' )
		);
		
foreach( $default_options as $option_name => $value ){
	if( isset($data[$option_name]) ){
		$default_options[$option_name] = $data[$option_name];
	}
}

extract($default_options);
		
$default_colors = array(
				'ts_body_bg'									=>	'#ffffff'
				,'ts_primary_color'								=>	'#169C5C'
				,'ts_text_color_in_bg_primary'					=>	'#ffffff'
				,'ts_text_color'								=>	'#000000'
				,'ts_heading_color'								=>	'#000000'
				,'ts_gray_color'								=>	'#848484'
				,'ts_blogs_text_color'							=>	'#0D0D0D'
				,'ts_related_post_bg'							=>	'#ffffff'
				,'ts_highlight_color'							=>	'#BB0925'
				,'ts_dropdown_bg_color'							=>	'#ffffff'
				,'ts_dropdown_color'							=>	'#000000'
				,'ts_dropdown_color_hover'						=>	'#169C5C'
				,'ts_dropdown_border_color'						=>	'#000000'
				,'ts_link_color'								=>	'#DE1010'
				,'ts_link_color_hover'							=>	'#2DA66C'
				,'ts_border_color'								=>	'#E5E5E5'
				
				,'ts_input_color'								=>	'#000000'
				,'ts_input_bg'									=>	'#EBEEF0'
				,'ts_input_border'								=>	'#EBEEF0'
				
				,'ts_btn_color'									=>	'#ffffff'
				,'ts_btn_bg'									=>	'#169C5C'
				,'ts_btn_border'								=>	'#169C5C'
				,'ts_btn_hover_color'							=>	'#169C5C'
				,'ts_btn_hover_bg'								=>	'transparent'
				,'ts_btn_hover_border'							=>	'#169C5C'
				
				,'ts_btn_special_color'							=>	'#ffffff'
				,'ts_btn_special_bg'							=>	'#169C5C'
				,'ts_btn_special_border'						=>	'#169C5C'
				,'ts_btn_special_hover_color'					=>	'#169C5C'
				,'ts_btn_special_hover_bg'						=>	'#transparent'
				,'ts_btn_special_hover_border'					=>	'#169C5C'
				
				,'ts_btn_thumb_color'							=>	'#000000'
				,'ts_btn_thumb_bg'								=>	'#ffffff'
				,'ts_btn_thumb_border'							=>	'#ffffff'
				
				,'ts_product_bg'								=>	'#f5f5f5'
				,'ts_product_border'							=>	'#f5f5f5'
				,'ts_rating_color'								=>	'#D9D9D9'
				,'ts_rated_color'								=>	'#169C5C'
				,'ts_product_color' 							=>  '#0D0D0D'
				,'ts_price_color'								=>	'#000000'
				,'ts_regular_price_color'						=>	'#8C8C8C'
				,'ts_sale_price_color'							=>	'#BB0925'
				
				,'ts_product_sale_label_text_color'				=>	'#ffffff'
				,'ts_product_sale_label_background_color'		=>	'#BB0925'
				,'ts_product_new_label_text_color'				=>	'#ffffff'
				,'ts_product_new_label_background_color'		=>	'#000000'
				,'ts_product_feature_label_text_color'			=>	'#ffffff'
				,'ts_product_feature_label_background_color'	=>	'#169C5C'
				,'ts_product_outstock_label_text_color'			=>	'#ffffff'
				,'ts_product_outstock_label_background_color'	=>	'#919191'
				
				,'ts_breadcrumb_background_color'				=>	'#ffffff'
				,'ts_breadcrumb_text_color'						=>	'#818388'
				,'ts_breadcrumb_link_color'						=>	'#000000'
				,'ts_breadcrumb_bg_text_color'					=>	'#ffffff'
				
				,'ts_header_cart_count_background_color' 		=>	'#169C5C'
				,'ts_header_cart_count_text_color' 				=>	'#ffffff'
				
				,'ts_header_top_background_color' 				=>	'#ffffff'
				,'ts_header_top_text_color' 					=>	'#000000'
				,'ts_header_top_border_color' 					=>	'#E6E6E6'
				,'ts_header_top_link_hover_color'				=>	'#169C5C'
				
				,'ts_header_middle_background_color' 			=>	'#ffffff'
				,'ts_header_middle_text_color' 					=>	'#000000'
				,'ts_header_middle_border_color' 				=>	'#ffffff'
				,'ts_header_middle_link_hover_color' 			=>	'#169C5C'
				
				,'ts_header_bottom_background_color' 			=>	'#ffffff'
				,'ts_header_bottom_text_color' 					=>	'#000000'
				,'ts_header_bottom_border_color' 				=>	'#E6E6E6'
				,'ts_header_bottom_link_hover_color' 			=>	'#169C5C'
				
				,'ts_main_menu_color' 							=>	'#666666'
				,'ts_main_menu_hover_color' 					=>	'#000000'
				,'ts_2nd_menu_color' 							=>	'#000000'
				,'ts_2nd_menu_hover_color' 						=>	'#BB0925'
				
				,'ts_header_search_color' 						=>	'#000000'
				,'ts_header_search_bg' 							=>	'#ffffff'
				,'ts_header_search_border' 						=>	'#D9D9D9'
				
				,'ts_footer_background_color' 					=>	'#ffffff'
				,'ts_footer_text_color' 						=>	'#000000'
				,'ts_footer_heading_color' 						=>	'#000000'
				,'ts_footer_link_color' 						=>	'#000000'
				,'ts_footer_link_hover_color'					=>	'#169C5C'
				
				,'ts_mobile_bg_color' 							=>	'#ffffff'
				,'ts_mobile_text_color' 						=>	'#000000'
);

$data = apply_filters('cozycorner_custom_style_data', $data);

foreach( $default_colors as $option_name => $default_color ){
	if( isset($data[$option_name]['rgba']) ){
		$default_colors[$option_name] = $data[$option_name]['rgba'];
	}
	else if( isset($data[$option_name]['color']) ){
		$default_colors[$option_name] = $data[$option_name]['color'];
	}
}

extract( $default_colors );

/* Parse font option. Ex: if option name is ts_body_font, we will have variables below:
* ts_body_font (font-family)
* ts_body_font_weight
* ts_body_font_style
* ts_body_font_size
* ts_body_font_line_height
* ts_body_font_letter_spacing
*/
$font_option_names = array(
							'ts_body_font',
							'ts_heading_font',
							'ts_menu_font',
							'ts_menu_font_2',
							'ts_mobile_menu_font',
							'ts_product_font',
							'ts_product_price_font',
							'ts_single_product_title_font',
							'ts_button_font',
							'ts_blogs_font',
							);
$font_size_option_names = array( 
							'ts_h1_font', 
							'ts_h2_font', 
							'ts_h3_font', 
							'ts_h4_font', 
							'ts_h5_font', 
							'ts_h6_font',
							'ts_h1_font_device', 
							'ts_h2_font_device', 
							'ts_h3_font_device', 
							'ts_h4_font_device', 
							'ts_h5_font_device', 
							'ts_h6_font_device', 
							'ts_body_font_device', 
							'ts_menu_font_device',
							'ts_menu_font_2_device',
							'ts_product_font_device', 
							'ts_product_price_font_device',
							'ts_single_product_title_font_device',							
							'ts_button_font_device',
							'ts_blogs_font_device',
							);
$font_option_names = array_merge($font_option_names, $font_size_option_names);
foreach( $font_option_names as $option_name ){
	$default = array(
		$option_name 						=> 'inherit'
		,$option_name . '_weight' 			=> 'normal'
		,$option_name . '_style' 			=> 'normal'
		,$option_name . '_size' 			=> 'inherit'
		,$option_name . '_line_height' 		=> 'inherit'
		,$option_name . '_letter_spacing' 	=> 'inherit'
	);
	if( is_array($data[$option_name]) ){
		if( !empty($data[$option_name]['font-family']) ){
			$default[$option_name] = $data[$option_name]['font-family'];
		}
		if( !empty($data[$option_name]['font-weight']) ){
			$default[$option_name . '_weight'] = $data[$option_name]['font-weight'];
		}
		if( !empty($data[$option_name]['font-style']) ){
			$default[$option_name . '_style'] = $data[$option_name]['font-style'];
		}
		if( !empty($data[$option_name]['font-size']) ){
			$default[$option_name . '_size'] = $data[$option_name]['font-size'];
		}
		if( !empty($data[$option_name]['line-height']) ){
			$default[$option_name . '_line_height'] = $data[$option_name]['line-height'];
		}
		if( !empty($data[$option_name]['letter-spacing']) ){
			$default[$option_name . '_letter_spacing'] = $data[$option_name]['letter-spacing'];
		}
	}
	extract( $default );
}
?>

:root {
	--ts-logo-width: <?php echo absint($ts_logo_width); ?>px;
	--ts-body-padding: <?php echo absint($ts_body_padding_xs); ?>px;
	--ts-content-padding: <?php echo absint($ts_content_padding_xs); ?>px;
	
	--ts-font-family: <?php echo esc_html($ts_body_font); ?>;
	--ts-font-style: <?php echo esc_html($ts_body_font_style); ?>;
	--ts-font-weight: <?php echo esc_html($ts_body_font_weight); ?>;
	--ts-letter-spacing: <?php echo esc_html($ts_body_font_letter_spacing); ?>;
	--ts-body-font-size: <?php echo esc_html($ts_body_font_size); ?>;
	--ts-line-height: <?php echo esc_html($ts_body_font_line_height); ?>;
	
	--ts-heading-font-family: <?php echo esc_html($ts_heading_font); ?>;
	--ts-heading-font-style: <?php echo esc_html($ts_heading_font_style); ?>;
	--ts-heading-font-weight: <?php echo esc_html($ts_heading_font_weight); ?>;
	--ts-heading-letter-spacing: <?php echo esc_html($ts_heading_font_letter_spacing); ?>;
	--ts-h1-font-size: <?php echo esc_html($ts_h1_font_size); ?>;
	--ts-h1-line-height: <?php echo esc_html($ts_h1_font_line_height); ?>;
	--ts-h2-font-size: <?php echo esc_html($ts_h2_font_size); ?>;
	--ts-h2-line-height: <?php echo esc_html($ts_h2_font_line_height); ?>;
	--ts-h3-font-size: <?php echo esc_html($ts_h3_font_size); ?>;
	--ts-h3-line-height: <?php echo esc_html($ts_h3_font_line_height); ?>;
	--ts-h4-font-size: <?php echo esc_html($ts_h4_font_size); ?>;
	--ts-h4-line-height: <?php echo esc_html($ts_h4_font_line_height); ?>;
	--ts-h5-font-size: <?php echo esc_html($ts_h5_font_size); ?>;
	--ts-h5-line-height: <?php echo esc_html($ts_h5_font_line_height); ?>;
	--ts-h6-font-size: <?php echo esc_html($ts_h6_font_size); ?>;
	--ts-h6-line-height: <?php echo esc_html($ts_h6_font_line_height); ?>;
	
	--ts-product-font-family: <?php echo esc_html($ts_product_font); ?>;
	--ts-product-font-style: <?php echo esc_html($ts_product_font_style); ?>;
	--ts-product-font-weight: <?php echo esc_html($ts_product_font_weight); ?>;
	--ts-product-letter-spacing: <?php echo esc_html($ts_product_font_letter_spacing); ?>;
	--ts-product-font-size: <?php echo esc_html($ts_product_font_size); ?>;
	--ts-product-line-height: <?php echo esc_html($ts_product_font_line_height); ?>;
	
	--ts-product-price-font-family: <?php echo esc_html($ts_product_price_font); ?>;
	--ts-product-price-font-style: <?php echo esc_html($ts_product_price_font_style); ?>;
	--ts-product-price-font-weight: <?php echo esc_html($ts_product_price_font_weight); ?>;
	--ts-product-price-font-size: <?php echo esc_html($ts_product_price_font_size); ?>;
	--ts-product-price-line-height: <?php echo esc_html($ts_product_price_font_line_height); ?>;
	
	--ts-single-product-font-size: <?php echo esc_html($ts_single_product_title_font_size); ?>;
	--ts-single-product-line-height: <?php echo esc_html($ts_single_product_title_font_line_height); ?>;
	
	--ts-btn-font-family: <?php echo esc_html($ts_button_font); ?>;
	--ts-btn-font-style: <?php echo esc_html($ts_button_font_style); ?>;
	--ts-btn-font-weight: <?php echo esc_html($ts_button_font_weight); ?>;
	--ts-btn-letter-spacing: <?php echo esc_html($ts_button_font_letter_spacing); ?>;
	--ts-btn-font-size: <?php echo esc_html($ts_button_font_size); ?>;
	--ts-btn-line-height: <?php echo esc_html($ts_button_font_line_height); ?>;
	
	--ts-blogs-font-size: <?php echo esc_html($ts_blogs_font_size); ?>;
	
	--ts-menu-font-family: <?php echo esc_html($ts_menu_font); ?>;
	--ts-menu-font-weight: <?php echo esc_html($ts_menu_font_weight); ?>;
	--ts-menu-font-size: <?php echo esc_html($ts_menu_font_size); ?>;
	--ts-menu-letter-spacing: <?php echo esc_html($ts_menu_font_letter_spacing); ?>;
	
	--ts-menu-2-font-family: <?php echo esc_html($ts_menu_font_2); ?>;
	--ts-menu-2-font-weight: <?php echo esc_html($ts_menu_font_2_weight); ?>;
	--ts-menu-2-font-size: <?php echo esc_html($ts_menu_font_2_size); ?>;
	--ts-menu-2-letter-spacing: <?php echo esc_html($ts_menu_font_2_letter_spacing); ?>;
	
	--ts-mb-menu-font-family: <?php echo esc_html($ts_mobile_menu_font); ?>;
	--ts-mb-menu-font-weight: <?php echo esc_html($ts_mobile_menu_font_weight); ?>;
	--ts-mb-menu-font-size: <?php echo esc_html($ts_mobile_menu_font_size); ?>;
	--ts-mb-menu-line-height: <?php echo esc_html($ts_mobile_menu_font_line_height); ?>;

	--ts-body-bg: <?php echo esc_html($ts_body_bg); ?>;
	--ts-primary-color: <?php echo esc_html($ts_primary_color); ?>;
	--ts-text-in-primary-color: <?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	--ts-text-color: <?php echo esc_html($ts_text_color); ?>;
	--ts-heading-color: <?php echo esc_html($ts_heading_color); ?>;
	--ts-gray-color: <?php echo esc_html($ts_gray_color); ?>;
	--ts-blogs-text-color: <?php echo esc_html($ts_blogs_text_color); ?>;
	--ts-related-post-bg: <?php echo esc_html($ts_related_post_bg); ?>;
	--ts-highlight: <?php echo esc_html($ts_highlight_color); ?>;
	--ts-dropdown-color: <?php echo esc_html($ts_dropdown_color); ?>;
	--ts-dropdown-hover-color: <?php echo esc_html($ts_dropdown_color_hover); ?>;
	--ts-dropdown-bg: <?php echo esc_html($ts_dropdown_bg_color); ?>;
	--ts-dropdown-border: <?php echo esc_html($ts_dropdown_border_color); ?>;
	--ts-link-color: <?php echo esc_html($ts_link_color); ?>;
	--ts-link-hover-color: <?php echo esc_html($ts_link_color_hover); ?>;
	--ts-border: <?php echo esc_html($ts_border_color); ?>;

	--ts-input-color: <?php echo esc_html($ts_input_color); ?>;
	--ts-input-background-color: <?php echo esc_html($ts_input_bg); ?>;
	--ts-input-border: <?php echo esc_html($ts_input_border); ?>;

	--ts-btn-color: <?php echo esc_html($ts_btn_color); ?>;
	--ts-btn-bg: <?php echo esc_html($ts_btn_bg); ?>;
	--ts-btn-border: <?php echo esc_html($ts_btn_border); ?>;
	--ts-btn-hover-color: <?php echo esc_html($ts_btn_hover_color); ?>;
	--ts-btn-hover-bg: <?php echo esc_html($ts_btn_hover_bg); ?>;
	--ts-btn-hover-border: <?php echo esc_html($ts_btn_hover_border); ?>;
	
	--ts-btn-addtocart-color: <?php echo esc_html($ts_btn_special_color); ?>;
	--ts-btn-addtocart-bg: <?php echo esc_html($ts_btn_special_bg); ?>;
	--ts-btn-addtocart-border: <?php echo esc_html($ts_btn_special_border); ?>;
	--ts-btn-addtocart-hover-color: <?php echo esc_html($ts_btn_special_hover_color); ?>;
	--ts-btn-addtocart-hover-bg: <?php echo esc_html($ts_btn_special_hover_bg); ?>;
	--ts-btn-addtocart-hover-border: <?php echo esc_html($ts_btn_special_hover_border); ?>;
	
	--ts-btn-thumbnail-color: <?php echo esc_html($ts_btn_thumb_color); ?>;
	--ts-btn-thumbnail-bg: <?php echo esc_html($ts_btn_thumb_bg); ?>;
	--ts-btn-thumbnail-border: <?php echo esc_html($ts_btn_thumb_border); ?>;
	
	--ts-product-color: <?php echo esc_html($ts_product_color); ?>;
	--ts-product-bg: <?php echo esc_html($ts_product_bg); ?>;
	--ts-product-border: <?php echo esc_html($ts_product_border); ?>;
	--ts-rating-color: <?php echo esc_html($ts_rating_color); ?>;
	--ts-rated-color: <?php echo esc_html($ts_rated_color); ?>;
	--ts-product-price-color: <?php echo esc_html($ts_price_color); ?>;
	--ts-product-regular-price-color: <?php echo esc_html($ts_regular_price_color); ?>;
	--ts-product-sale-price-color: <?php echo esc_html($ts_sale_price_color); ?>;
	
	--ts-sale-label-color: <?php echo esc_html($ts_product_sale_label_text_color); ?>;
	--ts-sale-label-bg: <?php echo esc_html($ts_product_sale_label_background_color); ?>;
	--ts-new-label-color: <?php echo esc_html($ts_product_new_label_text_color); ?>;
	--ts-new-label-bg: <?php echo esc_html($ts_product_new_label_background_color); ?>;
	--ts-hot-label-color: <?php echo esc_html($ts_product_feature_label_text_color); ?>;
	--ts-hot-label-bg: <?php echo esc_html($ts_product_feature_label_background_color); ?>;
	--ts-soldout-label-color: <?php echo esc_html($ts_product_outstock_label_text_color); ?>;
	--ts-soldout-label-bg: <?php echo esc_html($ts_product_outstock_label_background_color); ?>;
	
	--ts-breadcrumb-bg: <?php echo esc_html($ts_breadcrumb_background_color); ?>;
	--ts-breadcrumb-color: <?php echo esc_html($ts_breadcrumb_text_color); ?>;
	--ts-breadcrumb-2-color: <?php echo esc_html($ts_breadcrumb_bg_text_color); ?>;
	--ts-breadcrumb-link-color: <?php echo esc_html($ts_breadcrumb_link_color); ?>;
	
	--ts-hd-search-bg: <?php echo esc_html($ts_header_search_bg); ?>;
	--ts-hd-search-color: <?php echo esc_html($ts_header_search_color); ?>;
	--ts-hd-search-border: <?php echo esc_html($ts_header_search_border); ?>;
	
	--ts-mobile-menu-bg: <?php echo esc_html($ts_mobile_bg_color); ?>;
	--ts-mobile-menu-color: <?php echo esc_html($ts_mobile_text_color); ?>;
}

.ts-header {
	--ts-hd-top-bg: <?php echo esc_html($ts_header_top_background_color); ?>;
	--ts-hd-top-color: <?php echo esc_html($ts_header_top_text_color); ?>;
	--ts-hd-top-border: <?php echo esc_html($ts_header_top_border_color); ?>;
	--ts-hd-top-link-hover: <?php echo esc_html($ts_header_top_link_hover_color); ?>;
	
	--ts-hd-middle-bg: <?php echo esc_html($ts_header_middle_background_color); ?>;
	--ts-hd-middle-color: <?php echo esc_html($ts_header_middle_text_color); ?>;
	--ts-hd-middle-border: <?php echo esc_html($ts_header_middle_border_color); ?>;
	--ts-hd-middle-link-hover: <?php echo esc_html($ts_header_middle_link_hover_color); ?>;
	
	--ts-hd-bottom-bg: <?php echo esc_html($ts_header_bottom_background_color); ?>;
	--ts-hd-bottom-color: <?php echo esc_html($ts_header_bottom_text_color); ?>;
	--ts-hd-bottom-border: <?php echo esc_html($ts_header_bottom_border_color); ?>;
	--ts-hd-bottom-link-hover: <?php echo esc_html($ts_header_bottom_link_hover_color); ?>;
	
	--ts-cart-count-bg: <?php echo esc_html($ts_header_cart_count_background_color); ?>;
	--ts-cart-count-color: <?php echo esc_html($ts_header_cart_count_text_color); ?>;
	
	--ts-main-menu-color: <?php echo esc_html($ts_main_menu_color); ?>;
	--ts-main-menu-hover-color: <?php echo esc_html($ts_main_menu_hover_color); ?>;
	--ts-2nd-menu-color: <?php echo esc_html($ts_2nd_menu_color); ?>;
	--ts-2nd-menu-hover-color: <?php echo esc_html($ts_2nd_menu_hover_color); ?>;
}

.footer-container {
	--ts-footer-bg: <?php echo esc_html($ts_footer_background_color); ?>;
	--ts-footer-color: <?php echo esc_html($ts_footer_text_color); ?>;
	--ts-footer-heading-color: <?php echo esc_html($ts_footer_heading_color); ?>;
	--ts-footer-link-color: <?php echo esc_html($ts_footer_link_color); ?>;
	--ts-footer-link-hover-color: <?php echo esc_html($ts_footer_link_hover_color); ?>;
}

.header-sticky.is-sticky {
	--ts-logo-width: <?php echo absint($ts_device_logo_width); ?>px;
}

@media (min-width: 768px){
	:root {
		--ts-content-padding: <?php echo absint($ts_content_padding_sm); ?>px;
		--ts-body-padding: <?php echo absint($ts_body_padding_md); ?>px;
	}
}
@media (min-width: 1201px){
	:root {
		--ts-content-padding: <?php echo absint($ts_content_padding_md); ?>px;
	}
}
@media (min-width: 1501px){
	:root {
		--ts-content-padding: <?php echo absint($ts_content_padding); ?>px;
		--ts-body-padding: <?php echo absint($ts_body_padding); ?>px;
	}
}
@media only screen and (min-width: 1201px) and (max-width: 1500px){
	body {
		--ts-product-font-size: <?php echo absint($ts_product_font_size) - 1; ?>px;
		--ts-product-line-height: <?php echo absint($ts_product_font_line_height) - 2; ?>px;
		--ts-product-price-font-size: <?php echo absint($ts_product_price_font_size) - 1; ?>px;
		--ts-product-price-line-height: <?php echo absint($ts_product_price_font_line_height) - 2; ?>px;
		
		--ts-menu-font-size: <?php echo absint($ts_menu_font_device_size) + 1; ?>px;
		--ts-menu-2-font-size: <?php echo absint($ts_menu_font_2_size) - 1; ?>px;
	}
	.product-style-v5 {
		--ts-menu-font-size: <?php echo esc_html($ts_menu_font_device_size); ?>;
		--ts-menu-2-font-size: <?php echo absint($ts_menu_font_2_size) - 1; ?>px;
	}
}
@media only screen and (max-width: 1200px) {
	:root {
		--ts-logo-width: <?php echo absint($ts_device_logo_width); ?>px;
		--ts-h1-font-size: <?php echo esc_html($ts_h1_font_device_size); ?>;
		--ts-h1-line-height: <?php echo esc_html($ts_h1_font_device_line_height); ?>;
		--ts-h2-font-size: <?php echo esc_html($ts_h2_font_device_size); ?>;
		--ts-h2-line-height: <?php echo esc_html($ts_h2_font_device_line_height); ?>;
		--ts-h3-font-size: <?php echo esc_html($ts_h3_font_device_size); ?>;
		--ts-h3-line-height: <?php echo esc_html($ts_h3_font_device_line_height); ?>;
		--ts-h4-font-size: <?php echo esc_html($ts_h4_font_device_size); ?>;
		--ts-h4-line-height: <?php echo esc_html($ts_h4_font_device_line_height); ?>;
		--ts-h5-font-size: <?php echo esc_html($ts_h5_font_device_size); ?>;
		--ts-h5-line-height: <?php echo esc_html($ts_h5_font_device_line_height); ?>;
		--ts-h6-font-size: <?php echo esc_html($ts_h6_font_device_size); ?>;
		--ts-h6-line-height: <?php echo esc_html($ts_h6_font_device_line_height); ?>;
		
		--ts-body-font-size: <?php echo esc_html($ts_body_font_device_size); ?>;
		--ts-line-height: <?php echo esc_html($ts_body_font_device_line_height); ?>;
		
		--ts-product-font-size: <?php echo esc_html($ts_product_font_device_size); ?>;
		--ts-product-line-height: <?php echo esc_html($ts_product_font_device_line_height); ?>;
		--ts-product-price-font-size: <?php echo esc_html($ts_product_price_font_device_size); ?>;
		--ts-product-price-line-height: <?php echo esc_html($ts_product_price_font_device_line_height); ?>;
		
		--ts-single-product-font-size: <?php echo esc_html($ts_single_product_title_font_device_size); ?>;
		--ts-single-product-line-height: <?php echo esc_html($ts_single_product_title_font_device_line_height); ?>;
		
		--ts-btn-font-size: <?php echo esc_html($ts_button_font_device_size); ?>;
		--ts-btn-line-height: <?php echo esc_html($ts_button_font_device_line_height); ?>;
		--ts-blogs-font-size: <?php echo esc_html($ts_blogs_font_device_size); ?>;
		--ts-menu-font-size: <?php echo esc_html($ts_menu_font_device_size); ?>;
		--ts-menu-2-font-size: <?php echo esc_html($ts_menu_font_2_device_size); ?>;
	}
}
@media only screen and (max-width: 991px) {
	:root {
		--ts-menu-font-size: <?php echo absint($ts_menu_font_device_size) - 1; ?>px;
		--ts-menu-2-font-size: <?php echo absint($ts_menu_font_2_device_size) - 1; ?>px;
	}
}
@media only screen and (max-width: 767px) {
	:root {
		--ts-logo-width: <?php echo absint($ts_mobile_logo_width); ?>px;
	}
	.header-sticky.is-sticky {
		--ts-logo-width: <?php echo absint($ts_mobile_logo_width); ?>px;
	}
}

<?php
/*** Custom Font ***/
if( isset($ts_custom_font_ttf) && $ts_custom_font_ttf['url'] ):
?>
@font-face {
	font-family: 'CustomFont';
	src:url('<?php echo esc_url($ts_custom_font_ttf['url']); ?>') format('truetype');
	font-weight: normal;
	font-style: normal;
}
<?php 
endif;	

/*** Truncate Product Title ***/
if( !empty($ts_prod_title_truncate) && isset($ts_prod_title_truncate_row) ):
?>
table.group_table .woocommerce-grouped-product-list-item__label a,
.ts-fbt-form .item .product-name, 
.woocommerce ul.cart_list li .product-name a, 
.woocommerce ul.product_list_widget li .product-name a,
.woocommerce ul.product_list_widget li .ts-wg-meta > a,
.woocommerce .products .product .product-name {
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: <?php echo absint($ts_prod_title_truncate_row); ?>;
	overflow: hidden;
}
<?php endif; ?>