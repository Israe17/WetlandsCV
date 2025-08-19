<?php
$redux_url = '';
if( class_exists('ReduxFramework') ){
	$redux_url = ReduxFramework::$_url;
}

$logo_url 					= get_template_directory_uri() . '/images/logo.png'; 
$favicon_url 				= get_template_directory_uri() . '/images/favicon.ico';

$color_image_folder = get_template_directory_uri() . '/admin/assets/images/colors/';
$list_colors = array('default','brown','brown-2','brown-3','brown-4','brown-5','brown-6','brown-7','black','black-2','black-3','yellow','yellow-2');
$preset_colors_options = array();
foreach( $list_colors as $color ){
	$preset_colors_options[$color] = array(
					'alt'      => $color
					,'img'     => $color_image_folder . $color . '.jpg'
					,'presets' => cozycorner_get_preset_color_options( $color )
	);
}

$font_image_folder = get_template_directory_uri() . '/admin/assets/images/fonts/';
$list_fonts = array('Albert-Sans', 'Cormorant-Garamond','Plus-Jakarta-Sans','Poppins');
$preset_fonts_options = array();
foreach( $list_fonts as $font ){
	$preset_fonts_options[$font] = array(
					'alt'      => $font
					,'img'     => $font_image_folder . $font . '.jpg'
					,'presets' => cozycorner_get_preset_font_options( $font )
	);
}

$family_fonts = array(
	"Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif"
	,"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif"
	,"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif"
	,"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive"
	,"Courier, monospace"                                   => "Courier, monospace"
	,"Garamond, serif"                                      => "Garamond, serif"
	,"Georgia, serif"                                       => "Georgia, serif"
	,"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif"
	,"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace"
	,"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"
	,"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif"
	,"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif"
	,"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif"
	,"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif"
	,"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif"
	,"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif"
	,"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif"
	,"CustomFont"                          					=> "CustomFont"
);

$header_layout_options = array();
$header_image_folder = get_template_directory_uri() . '/admin/assets/images/headers/';
for( $i = 1; $i <= 8; $i++ ){
	$header_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Header Layout %s', 'cozycorner'), $i)
		,'img' => $header_image_folder . 'header_v'.$i.'.jpg'
	);
}

$products_labels_options = array();
$products_labels_image_folder = get_template_directory_uri() . '/admin/assets/images/labels/';
for( $i = 1; $i <= 6; $i++ ){
	$products_labels_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Product Labels %s', 'cozycorner'), $i)
		,'img' => $products_labels_image_folder . 'label_v'.$i.'.jpg'
	);
}

$widget_hover_style_options = array();
$widget_hover_style_image_folder = get_template_directory_uri() . '/admin/assets/images/widget-hover-styles/';
for( $i = 1; $i <= 2; $i++ ){
	$widget_hover_style_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Widget Hover Style %s', 'cozycorner'), $i)
		,'img' => $widget_hover_style_image_folder . 'style_v'.$i.'.jpg'
	);
}

$pagination_style_options = array();
$pagination_style_image_folder = get_template_directory_uri() . '/admin/assets/images/paginations/';
for( $i = 1; $i <= 6; $i++ ){
	$pagination_style_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Pagination Style %s', 'cozycorner'), $i)
		,'img' => $pagination_style_image_folder . 'style_v'.$i.'.jpg'
	);
}

$product_style_options = array();
$product_style_image_folder = get_template_directory_uri() . '/admin/assets/images/product-styles/';
for( $i = 1; $i <= 6; $i++ ){
	$product_style_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Product Style %s', 'cozycorner'), $i)
		,'img' => $product_style_image_folder . 'style_v'.$i.'.jpg'
	);
}

$loading_screen_options = array();
$loading_image_folder = get_template_directory_uri() . '/images/loading/';
for( $i = 1; $i <= 10; $i++ ){
	$loading_screen_options[$i] = array(
		'alt'  => sprintf(esc_html__('Loading Image %s', 'cozycorner'), $i)
		,'img' => $loading_image_folder . 'loading_'.$i.'.svg'
	);
}

$footer_block_options = cozycorner_get_footer_block_options();

$custom_block_options = cozycorner_get_custom_block_options();

$breadcrumb_layout_options = array();
$breadcrumb_image_folder = get_template_directory_uri() . '/admin/assets/images/breadcrumbs/';
for( $i = 1; $i <= 4; $i++ ){
	$breadcrumb_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Breadcrumb Layout %s', 'cozycorner'), $i)
		,'img' => $breadcrumb_image_folder . 'breadcrumb_v'.$i.'.jpg'
	);
}

$sidebar_options = array();
$default_sidebars = cozycorner_get_list_sidebars();
if( is_array($default_sidebars) ){
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}
}

$product_loading_image = get_template_directory_uri() . '/images/prod_loading.gif';

$mailchimp_forms = array();
$args = array(
	'post_type'			=> 'mc4wp-form'
	,'post_status'		=> 'publish'
	,'posts_per_page'	=> -1
);
$forms = new WP_Query( $args );
if( !empty( $forms->posts ) && is_array( $forms->posts ) ) {
	foreach( $forms->posts as $p ) {
		$mailchimp_forms[$p->ID] = $p->post_title;
	}
}

$option_fields = array();

/*** General Tab ***/
$option_fields['general'] = array(
	array(
		'id'        => 'section-logo-favicon'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Logo - Favicon', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_logo'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select an image file for the main logo', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => $logo_url )
	)
	,array(
		'id'        => 'ts_logo_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Mobile Logo', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on mobile', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_sticky'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Sticky Logo', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on sticky header', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Logo Width', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'cozycorner' )
		,'default'  => '190'
	)
	,array(
		'id'        => 'ts_device_logo_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Logo Width on Ipad', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'cozycorner' )
		,'default'  => '133'
	)
	,array(
		'id'        => 'ts_mobile_logo_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Logo Width on Mobile', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'cozycorner' )
		,'default'  => '133'
	)
	,array(
		'id'        => 'ts_text_logo'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Text Logo', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'CozyCorner'
	)

	,array(
		'id'        => 'section-layout-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Layout Style', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Main Content Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Footer Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'       	=> 'ts_layout_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout Style', 'cozycorner' )
		,'subtitle' => esc_html__( 'You can override this option for the individual page', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'boxed' 	=> 'Boxed'
			,'wide' 	=> 'Wide'
		)
		,'default'  => 'wide'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_layout_fullwidth', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_body_padding'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Body Padding', 'cozycorner' )
		,'desc'     => esc_html__( 'Large screen', 'cozycorner' )
		,'subtitle' => esc_html__( 'Body padding in pixels', 'cozycorner' )
		,'default'  => '0'
	)
	,array(
		'id'        => 'ts_body_padding_md'
		,'type'     => 'text'
		,'title'    => '&nbsp;'
		,'desc'     => esc_html__( 'Medium screen (laptops & tablets)', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => '0'
	)
	,array(
		'id'        => 'ts_body_padding_xs'
		,'type'     => 'text'
		,'title'    => '&nbsp;'
		,'desc'     => esc_html__( 'Small screen (mobiles)', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => '0'
	)
	,array(
		'id'        => 'ts_content_padding'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Content Padding', 'cozycorner' )
		,'desc'     => esc_html__( 'Large screen', 'cozycorner' )
		,'subtitle' => esc_html__( 'Content left/right padding in pixels', 'cozycorner' )
		,'default'  => '70'
	)
	,array(
		'id'        => 'ts_content_padding_md'
		,'type'     => 'text'
		,'title'    => '&nbsp;'
		,'desc'     => esc_html__( 'Medium screen (laptops & tablets)', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => '40'
	)
	,array(
		'id'        => 'ts_content_padding_sm'
		,'type'     => 'text'
		,'title'    => '&nbsp;'
		,'desc'     => esc_html__( 'Small screen (small tablets)', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => '20'
	)
	,array(
		'id'        => 'ts_content_padding_xs'
		,'type'     => 'text'
		,'title'    => '&nbsp;'
		,'desc'     => esc_html__( 'Extra small screen (mobiles)', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => '15'
	)
	,array(
		'id'        => 'ts_content_max_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Width', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Only available on large screen.', 'cozycorner' )
		,'default'  => '1400'
		,'required'	=> array( 'ts_layout_style', 'equals', 'wide' )
	)
	,array(
		'id'       	=> 'ts_maximum_scale'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Maximum Scale', 'cozycorner' )
		,'subtitle' => esc_html__( 'Allow users to zoom in/out on mobile device. Set 1 to disable', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			1 	=> 1
			,2 	=> 2
			,3 	=> 3
			,4 	=> 4
			,5 	=> 5
		)
		,'default'  => 1
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)

	,array(
		'id'        => 'section-rtl'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Right To Left', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_rtl'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Right To Left', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-smooth-scroll'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Smooth Scroll', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_smooth_scroll'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Smooth Scroll', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-back-to-top-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Back To Top Button', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_back_to_top_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_back_to_top_button_on_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button On Mobile', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'section-page-not-found'
		,'type'     => 'section'
		,'title'    => esc_html__( '404 Page', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_404_page_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( '404 Image', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Choose image background for 404 text', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array( 
		'id'       	=> 'ts_404_page' 
		,'type'     => 'select' 
		,'title'    => esc_html__( '404 Page', 'cozycorner' ) 
		,'subtitle' => esc_html__( 'Select the page which displays the 404 page', 'cozycorner' ) 
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'        => 'section-loading-screen'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Loading Screen', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_loading_screen'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Loading Screen', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_loading_image'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Loading Image', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $loading_screen_options
		,'default'  => '1'
	)
	,array(
		'id'        => 'ts_custom_loading_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Custom Loading Image', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_loading_image_width'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Loading Image Width', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => ''
		,'default'  => '120'
	)
	,array(
		'id'       	=> 'ts_display_loading_screen_in'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Display Loading Screen In', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'all-pages' 		=> esc_html__( 'All Pages', 'cozycorner' )
			,'homepage-only' 	=> esc_html__( 'Homepage Only', 'cozycorner' )
			,'specific-pages' 	=> esc_html__( 'Specific Pages', 'cozycorner' )
		)
		,'default'  => 'all-pages'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_loading_screen_exclude_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Exclude Pages', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'all-pages' )
	)
	,array(
		'id'       	=> 'ts_loading_screen_specific_pages'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Specific Pages', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'data'     => 'pages'
		,'multi'    => true
		,'default'	=> ''
		,'required'	=> array( 'ts_display_loading_screen_in', 'equals', 'specific-pages' )
	)
	
	,array(
		'id'        => 'section-widget-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Widget Style', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_widget_hover_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Widget Hover Style', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $widget_hover_style_options
		,'default'  => 'v1'
	)
	
	,array(
		'id'        => 'section-pagination-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Pagination Style', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_pagination_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Pagination Style', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $pagination_style_options
		,'default'  => 'v1'
	)
);

/*** Color Scheme Tab ***/
$option_fields['color-scheme'] = array(
	array(
		'id'          => 'ts_color_scheme'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Select Color Scheme of Theme', 'cozycorner' )
		,'subtitle'   => ''
		,'desc'       => ''
		,'options'    => $preset_colors_options
		,'default'    => 'default'
		,'class'      => ''
	)
	,array(
		'id'        => 'section-general-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Main Colors', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_primary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Primary Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_primary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color In Background Primary Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_body_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Body Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Heading Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_gray_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Gray Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#848484'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_blogs_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Blogs Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#0D0D0D'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_related_post_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Special Post Section Background Color', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available on some styles', 'cozycorner' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_highlight_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Highlight Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#BB0925'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_dropdown_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Dropdown/Sidebar Link Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#E5E5E5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#DE1010'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_link_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#2DA66C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-input-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Input', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_input_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_input_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#d9d9d9'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-buttons-color'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Default Button', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_btn_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_hover_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 0
		)
	)
	,array(
		'id'       => 'ts_btn_hover_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-special-button'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Add To Cart Button', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_btn_special_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_special_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_special_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_special_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_special_hover_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 0
		)
	)
	,array(
		'id'       => 'ts_btn_special_hover_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color Hover', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-button-thumbnails-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Buttons Icon On Product Thumbnail', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_btn_thumb_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_btn_thumb_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-product-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_product_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rated Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#0D0D0D'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f5f5f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f5f5f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_reviews_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Separate Reviews Tab Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#f5f5f5'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rating_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rating Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#D9D9D9'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_rated_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rated Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-price-color'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Price', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Price Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_regular_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Regular Price Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#8C8C8C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_sale_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Price Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#BB0925'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-product-label-color'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_sale_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_sale_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#BB0925'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_new_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#919191'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-breadcrumb-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Breadcrumbs Colors', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_breadcrumb_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#818388'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_bg_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text/Link Color Over Image', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only used for breadcrumbs which have background image', 'cozycorner' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-header-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'HEADER', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_header_cart_count_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart/Wishlist Count Number Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_cart_count_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Cart/Wishlist Count Number Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-top-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Top', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_top_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'cozycorner' )
		,'default'  => array(
			'color' 	=> '#E6E6E6'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_top_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-middle-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Middle', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_middle_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'cozycorner' )
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_middle_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-bottom-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Bottom', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_bottom_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available on some header layouts', 'cozycorner' )
		,'default'  => array(
			'color' 	=> '#E6E6E6'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_bottom_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_main_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Menu Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#666666'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_main_menu_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Menu Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_2nd_menu_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Secondary Menu Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_2nd_menu_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Secondary Menu Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#BB0925'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'      => 'info-hd-search-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Search', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_search_bg'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_search_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_header_search_border'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Border Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#D9D9D9'
			,'alpha'	=> 1
		)
	)
	
	,array(
		'id'        => 'section-footer-color'
		,'type'     => 'section'
		,'title'    => esc_html__( 'FOOTER', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)

	,array(
		'id'       => 'ts_footer_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Heading Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_footer_link_hover_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Hover Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#169C5C'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'        => 'section-footer-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Mobile Colors', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_mobile_bg_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu/Search Popup Background Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#ffffff'
			,'alpha'	=> 1
		)
	)
	,array(
		'id'       => 'ts_mobile_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu/Search Popup Text Color', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => array(
			'color' 	=> '#000000'
			,'alpha'	=> 1
		)
	)
);

/*** Typography Tab ***/
$option_fields['typography'] = array(
	array(
		'id'          => 'ts_preset_fonts'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Preset Fonts', 'cozycorner' )
		,'subtitle'   => esc_html__( 'Select preset fonts which are used for demos', 'cozycorner' )
		,'desc'       => ''
		,'options'    => $preset_fonts_options
		,'default'    => 'Albert Sans'
		,'class'      => ''
	)
	,array(
		'id'        => 'section-fonts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'BODY', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_body_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body Font', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'line-height' 		=> true
		,'letter-spacing' 	=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '15px'
			,'line-height' 		=> '22px'
			,'font-weight' 		=> '400'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_blogs_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Blog Detail Content Font Size', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '17px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-fonts-heading'
		,'type'     => 'section'
		,'title'    => esc_html__( 'HEADING', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_heading_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Heading Font', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> false
		,'line-height' 		=> false
		,'letter-spacing' 	=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-weight' 		=> '600'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_h1_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '50px'
			,'line-height'      => '56px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h2_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '40px'
			,'line-height'      => '46px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h3_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height'      => '36px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h4_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '25px'
			,'line-height'      => '30px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h5_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H5', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height'      => '26px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h6_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H6', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '18px'
			,'line-height'      => '22px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-fonts-menu'
		,'type'     => 'section'
		,'title'    => esc_html__( 'MENU', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Main Menu', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '17px'
			,'line-height' 		=> '22px'
			,'font-weight' 		=> '500'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_menu_font_2'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Secondary Menu', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'letter-spacing' 	=> true
		,'line-height' 		=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '18px'
			,'line-height' 		=> '22px'
			,'font-weight' 		=> '500'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_mobile_menu_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Mobile Menu', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '15px'
			,'line-height' 		=> '18px'
			,'font-weight' 		=> '500'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'        => 'section-fonts-product'
		,'type'     => 'section'
		,'title'    => esc_html__( 'PRODUCT', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_product_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name Font', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'line-height' 		=> true
		,'letter-spacing' 	=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '16px'
			,'line-height' 		=> '20px'
			,'font-weight' 		=> '500'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_product_price_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Price Font', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'line-height' 		=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '16px'
			,'line-height' 		=> '20px'
			,'font-weight' 		=> '500'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       			=> 'ts_single_product_title_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Single Product Title', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height'      => '32px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-fonts-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'BUTTON', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_button_font'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button Font', 'cozycorner' )
		,'subtitle' 		=> ''
		,'units'			=> 'px'
		,'google'   		=> true
		,'font-style'   	=> false
		,'text-align'   	=> false
		,'color'   			=> false
		,'font-size'  		=> true
		,'line-height' 		=> true
		,'letter-spacing' 	=> true
		,'all_styles'   	=> true
		,'preview'			=> array('always_display' => true)
		,'default'  		=> array(
			'font-family'  		=> 'Albert Sans'
			,'font-size' 		=> '16px'
			,'line-height' 		=> '20px'
			,'font-weight' 		=> '500'
			,'letter-spacing' 	=> '0'
			,'google'	   		=> true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'        => 'section-font-sizes-device'
		,'type'     => 'section'
		,'title'    => esc_html__( 'RESPONSIVE FONT SIZE', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       			=> 'ts_h1_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H1', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '40px'
			,'line-height'      => '46px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h2_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H2', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '30px'
			,'line-height'      => '36px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h3_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H3', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '24px'
			,'line-height'      => '28px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h4_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H4', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '20px'
			,'line-height'      => '26px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h5_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H5', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '17px'
			,'line-height'      => '22px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_h6_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'H6', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '16px'
			,'line-height'      => '22px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_body_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Body', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'line-height'      => '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_menu_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Menu', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'line-height'      => '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_menu_font_2_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Menu 2', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'line-height'      => '20px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_product_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Name', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '14px'
			,'line-height'      => '18px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_product_price_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Product Price', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '14px'
			,'line-height'      => '18px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_single_product_title_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Single Product Title', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '24px'
			,'line-height'      => '26px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_button_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Button', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> true
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '14px'
			,'line-height'      => '16px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'       			=> 'ts_blogs_font_device'
		,'type'     		=> 'typography'
		,'title'    		=> esc_html__( 'Blogs', 'cozycorner' )
		,'subtitle' 		=> ''
		,'class' 			=> 'typography-no-preview'
		,'google'   		=> false
		,'font-family'  	=> false
		,'font-weight'  	=> false
		,'font-style'   	=> false
		,'letter-spacing' 	=> false
		,'line-height' 		=> false
		,'text-align'  	 	=> false
		,'color'   			=> false
		,'preview'			=> array('always_display' => false)
		,'default'  		=> array(
			'font-family'  		=> ''
			,'font-weight' 		=> ''
			,'font-size'   		=> '15px'
			,'google'	   		=> false
		)
	)
	,array(
		'id'        => 'section-custom-font'
		,'type'     => 'section'
		,'title'    => esc_html__( 'CUSTOM FONT', 'cozycorner' )
		,'subtitle' => esc_html__( 'If you get the error message \'Sorry, this file type is not permitted for security reasons\', you can add this line define(\'ALLOW_UNFILTERED_UPLOADS\', true); to the wp-config.php file', 'cozycorner' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_font_ttf'
		,'type'     => 'media'
		,'url'      => true
		,'preview'  => false
		,'title'    => esc_html__( 'Custom Font ttf', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Upload the .ttf font file. To use it, you select CustomFont in the Standard Fonts group', 'cozycorner' )
		,'default'  => array( 'url' => '' )
		,'mode'		=> 'application'
	)
);

/*** Header Tab ***/
$option_fields['header'] = array(
	array(
		'id'        => 'section-header-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Options', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_header_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Header Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $header_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_sticky_header'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sticky Header', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'      => 'info-header-info'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Information', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_header_info'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Header Information', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_header_info'
		,'type'     => 'multi_text'
		,'title'    => esc_html__( 'Header Information', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => array('')
	)
	,array(
		'id'      => 'info-hotline'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Hotline', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_hotline'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Hotline', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_hotline_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_hotline', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_hotline_number'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Hotline Number', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_hotline', 'equals', '1' )
	)
	,array(
		'id'      => 'info-social-icons'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Social Icons', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_header_social_icons'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Social Icons', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available in some header layouts. For the others please contact our support team.', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_facebook_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_tiktok_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Tiktok URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'LinkedIn URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_pinterest_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Pinterest URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social URL', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_class'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Social Icon', 'cozycorner' )
		,'subtitle' => esc_html__( 'Put the class of icon. CozyCorner support our custom font with prefix icon-brand name. Ex: icon-brand-facebook. Or you can use Font Awesome 5 Free. Ex: fab fa-facebook-f', 'cozycorner' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'      => 'info-header-language-currency'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Language & Currency', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_header_currency'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Currency', 'cozycorner' )
		,'subtitle' => esc_html__( 'If you don\'t install WooCommerce Multilingual plugin, it may display demo html', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_header_language'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Language', 'cozycorner' )
		,'subtitle' => esc_html__( 'If you don\'t install WPML plugin, it may display demo html', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'      => 'info-header-other'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Search/Wishlist/Account', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_enable_tiny_wishlist'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_enable_tiny_account'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'My Account', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_tiny_account_custom_links'
		,'type'     => 'multi_text'
		,'title'    => esc_html__( 'My Account Custom Links', 'cozycorner' )
		,'subtitle' => esc_html__( 'Add custom links to dropdown after logged in. Format: title|link. Ex: Dashboard|https://mylink/', 'cozycorner' )
		,'default'  => array()
		,'add_text' => esc_html__( 'Add link', 'cozycorner' )
		,'required'	=> array( 'ts_enable_tiny_account', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_tiny_account_login_popup'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Login Popup', 'cozycorner' )
		,'subtitle' => esc_html__( 'Display Login Form on popup instead of dropdown', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
		,'required'	=> array( 'ts_enable_tiny_account', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_tiny_account_login_popup_banner'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Login Popup Banner', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Show this banner on popup, next to the login form', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
		,'required'	=> array( 'ts_tiny_account_login_popup', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_tiny_account_login_popup_banner_link'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Login Popup Banner Link', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_tiny_account_login_popup', 'equals', '1' )
	)
	,array(
		'id'      => 'info-header-cart'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Cart', 'cozycorner' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_tiny_shopping_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_shopping_cart_free_shipping_message_bar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Free Shipping Message Bar', 'cozycorner' )
		,'subtitle' => esc_html__( 'You need to add the Free Shipping method in WooCommerce settings page', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_shopping_cart_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Sidebar', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show shopping cart as sidebar instead of dropdown. You have to update cart after changing', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_show_shopping_cart_after_adding'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shopping Cart After Adding Product To Cart', 'cozycorner' )
		,'subtitle' => esc_html__( 'You have to enable Ajax add to cart in WooCommerce > Settings > Products', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
		,'required'	=> array( 'ts_shopping_cart_sidebar', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_add_to_cart_effect'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Add To Cart Effect', 'cozycorner' )
		,'subtitle' => esc_html__( 'You have to enable Ajax add to cart in WooCommerce > Settings > Products. If "Show Shopping Cart After Adding Product To Cart" is enabled, this option will be disabled', 'cozycorner' )
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'cozycorner' )
			,'fly_to_cart'	=> esc_html__( 'Fly To Cart', 'cozycorner' )
			,'show_popup'	=> esc_html__( 'Show Popup', 'cozycorner' )
		)
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-breadcrumb-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Breadcrumb Options', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_breadcrumb_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Breadcrumb Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $breadcrumb_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_breadcrumb_centered_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Breadcrumbs Centered Text', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_enable_breadcrumb_background_image'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Image', 'cozycorner' )
		,'subtitle' => esc_html__( 'You can set background color by going to Color Scheme tab > Breadcrumb Colors section', 'cozycorner' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_bg_breadcrumbs'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Breadcrumbs Background Image', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a new image to override the default background image', 'cozycorner' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_breadcrumb_bg_parallax'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Parallax', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
);

/*** Footer Tab ***/
$option_fields['footer'] = array(
	array(
		'id'       	=> 'ts_footer_block'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Footer Block', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_footer_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Menu Tab ***/
$option_fields['menu'] = array(
	array(
		'id'             => 'ts_menu_thumb_width'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Width', 'cozycorner' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 40', 'cozycorner' )
		,'default'       => 40
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_height'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Height', 'cozycorner' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 60, step: 1, default value: 40', 'cozycorner' )
		,'default'       => 40
		,'min'           => 5
		,'step'          => 1
		,'max'           => 60
		,'display_value' => 'text'
	)
	,array(
		'id'        => 'ts_enable_menu_overlay'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Menu Background Overlay', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'cozycorner' )
		,'off'		=> esc_html__( 'Disable', 'cozycorner' )
	)
);

/*** Blog Tab ***/
$option_fields['blog'] = array(
	array(
		'id'        => 'section-blog'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Layout', 'cozycorner' )
		,'subtitle' => esc_html__( 'This option is available when Front page displays the latest posts', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'cozycorner')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_item_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Item Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'layout-grid'	=> esc_html__( 'Grid', 'cozycorner' )
			,'layout-list'	=> esc_html__( 'List', 'cozycorner' )
		)
		,'default'  => 'layout-grid'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_thumbnail_size'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Thumbnail Size', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'cozycorner_blog_thumb'			=> esc_html__( 'Default (580x340)', 'cozycorner' )
			,'cozycorner_blog_thumb_small'	=> esc_html__( 'Small Thumbnail (460x190)', 'cozycorner' )
			,'thumbnail'					=> esc_html__( 'WordPress Thumbnail (300x300)', 'cozycorner' )
			,'full'							=> esc_html__( 'Full', 'cozycorner' )
		)
		,'default'  => 'full'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Columns', 'cozycorner' )
		,'subtitle' => esc_html__( 'If the Blog Item Layout is set to List, this option will automatically adjust the number of columns according to the Blog Thumbnail Size', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			1	=> 1
			,2	=> 2
			,3	=> 3
		)
		,'default'  => '1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_categories_filter'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories Filter', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show list of categories at the top of blog posts', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_read_more'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Read More Button', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_read_more_icon'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Read More As Icon', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_excerpt_strip_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt Strip All Tags', 'cozycorner' )
		,'subtitle' => esc_html__( 'Strip all html tags in Excerpt', 'cozycorner' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_blog_excerpt_max_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Excerpt Max Words', 'cozycorner' )
		,'subtitle' => esc_html__( 'Input -1 to show full excerpt', 'cozycorner' )
		,'desc'     => ''
		,'default'  => '-1'
	)

	,array(
		'id'        => 'section-blog-details'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog Details', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_details_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Details Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'cozycorner')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_details_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_details_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'       	=> 'ts_blog_details_thumbnail_pos'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Thumbnail Position', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default' 		=> esc_html__( 'Default', 'cozycorner' )
			,'right' 	=> esc_html__( 'Right Sidebar', 'cozycorner' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Content', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Tags', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing - Use ShareThis', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'cozycorner')
		,'default'  => false
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Sharing - ShareThis Key', 'cozycorner' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'cozycorner' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_author_box'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author Box', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Related Posts', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_blog_details_comment_form'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment Form', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
);

/*** WooCommerce Tab ***/
$option_fields['woocommerce'] = array(
	array(
		'id'        => 'section-product-label'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Label', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)	
	,array(
		'id'       	=> 'ts_product_label_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Label Style', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $products_labels_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_product_show_new_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product New Label', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_product_new_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'New'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_show_new_label_time'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Time', 'cozycorner' )
		,'subtitle' => esc_html__( 'Number of days which you want to show New label since product is published', 'cozycorner' )
		,'desc'     => ''
		,'default'  => '30'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_feature_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Feature Label Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Hot'
	)
	,array(
		'id'        => 'ts_product_out_of_stock_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Out Of Stock Label Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sold out'
	)
	,array(
		'id'       	=> 'ts_show_sale_label_as'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Show Sale Label As', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'text' 		=> esc_html__( 'Text', 'cozycorner' )
			,'number' 	=> esc_html__( 'Number', 'cozycorner' )
			,'percent' 	=> esc_html__( 'Percent', 'cozycorner' )
		)
		,'default'  => 'percent'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_product_sale_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sale'
		,'required'	=> array( 'ts_show_sale_label_as', 'equals', 'text' )
	)
	
	,array(
		'id'        => 'section-product-title'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Title In The Products List', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_title_truncate'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Truncate Product Title', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'       	=> 'ts_prod_title_truncate_row'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Rows', 'cozycorner' )
		,'subtitle' => esc_html__( 'Number of rows to show, the remains will be replaced with ...', 'cozycorner' )
		,'desc'     => ''
		,'default'  => '2'
		,'validate' => 'numeric'
		,'required'	=> array( 'ts_prod_title_truncate', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-product-hover'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Products Styles', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_style'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Style', 'cozycorner' )
		,'subtitle' => esc_html__( 'This option also changes some other elements and makes them match product style. Ex: border, text style, ...', 'cozycorner' )
		,'desc'     => ''
		,'options'  => $product_style_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_effect_product'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Back Product Image', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show another product image on hover. It will show an image from Product Gallery', 'cozycorner' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_product_tooltip'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tooltip', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show tooltip when hovering on buttons/icons on product', 'cozycorner' )
		,'default'  => true
	)
	,array(
		'id'        => 'section-lazy-load'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Lazy Load', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_lazy_load'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Lazy Load', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_placeholder_img'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Placeholder Image', 'cozycorner' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => $product_loading_image )
	)
	
	,array(
		'id'        => 'section-quickshop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Quickshop', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_quickshop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Quickshop', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)

	,array(
		'id'        => 'section-catalog-mode'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Catalog Mode', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_catalog_mode'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Catalog Mode', 'cozycorner' )
		,'subtitle' => esc_html__( 'Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off', 'cozycorner' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-ajax-search'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ajax Search', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_ajax_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Ajax Search', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_ajax_search_number_result'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Results', 'cozycorner' )
		,'subtitle' => esc_html__( 'Input -1 to show all results', 'cozycorner' )
		,'desc'     => ''
		,'default'  => '5'
	)
);

/*** Shop/Product Category Tab ***/
$option_fields['shop-product-category'] = array(
	array(
		'id'        => 'ts_prod_cat_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Shop/Product Category Layout', 'cozycorner' )
		,'subtitle' => esc_html__( 'Sidebar is only available if Filter Widget Area is disabled', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'cozycorner')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_cat_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-shop-top-categories'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Top Product Categories', 'cozycorner' )
		,'subtitle' => esc_html__( 'These options are only available if shop/product category page displays both categories and products', 'cozycorner' )
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_top_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Top Product Categories Columns', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'4'			=> '4'
			,'5'		=> '5'
			,'6'		=> '6'
			,'7'		=> '7'
		)
		,'default'  => '7'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_top_cat_slider'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Slider for Top Product Categories', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_slider_loop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Loop', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_top_cat_slider', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_slider_autoplay'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Autoplay', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_top_cat_slider', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_slider_dots'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Dots', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_top_cat_slider', 'equals', '1' )
	)
	,array(
		'id'        => 'section-shop-filters'
		,'type'     => 'section'
		,'title'    => esc_html__( 'SORT & FILTERS', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Filter Widget Area', 'cozycorner' )
		,'subtitle' => esc_html__( 'Display Filter Widget Area on the Shop/Product Category page. If enabled, sidebar will be removed', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'       	=> 'ts_filter_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Filter Style', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'top'			=> esc_html__( 'Top', 'cozycorner' )
			,'dropdown'		=> esc_html__( 'Top - Dropdown', 'cozycorner' )
			,'sidebar'		=> esc_html__( 'Sidebar', 'cozycorner' )
		)
		,'default'  => 'top'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_filter_widget_area', 'equals', '1' )
	)
	,array(
		'id'		=> 'ts_show_filter_widget_area_by_default'
		,'type'		=> 'switch'
		,'title'	=> esc_html__( 'Show Filter Widget Area By Default', 'cozycorner' )
		,'subtitle'	=> ''
		,'desc'		=> ''
		,'default'	=> true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
		,'required'	=> array( 'ts_filter_style', 'equals', array( 'top', 'sidebar' ) )
	)
	,array(
		'id'		=> 'ts_sticky_filter_mobile'
		,'type'		=> 'switch'
		,'title'	=> esc_html__( 'Sticky Filter On Mobile', 'cozycorner' )
		,'subtitle'	=> esc_html__( 'Display filter button/area at the bottom of screen on mobile', 'cozycorner' )
		,'desc'		=> ''
		,'default'	=> true
	)
	,array(
		'id'        => 'section-shop-products-layouts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'PRODUCTS LAYOUT', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_prod_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Columns', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'1'		=> esc_html__( '1 Column', 'cozycorner' )
			,'1-1'	=> esc_html__( '1 Column - Big Thumbnail', 'cozycorner' )
			,'2'	=> esc_html__( '2 Columns', 'cozycorner' )
			,'3'	=> esc_html__( '3 Columns', 'cozycorner' )
			,'4'	=> esc_html__( '4 Columns', 'cozycorner' )
			,'5'	=> esc_html__( '5 Columns', 'cozycorner' )
		)
		,'default'  => '5'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_columns_selector'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Columns Selector', 'cozycorner' )
		,'subtitle' => esc_html__( 'Allow users to select columns on frontend', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_per_page'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Products Per Page', 'cozycorner' )
		,'subtitle' => esc_html__( 'Number of products per page', 'cozycorner' )
		,'desc'     => ''
		,'default'  => '24'
	)
	,array(
		'id'        => 'ts_prod_cat_per_page_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products Per Page Dropdown', 'cozycorner' )
		,'subtitle' => esc_html__( 'Allow users to select number of products per page', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_onsale_checkbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products On Sale Checkbox', 'cozycorner' )
		,'subtitle' => esc_html__( 'Allow users to view only the discounted products', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_title_in_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shop Title In Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_cat_collapse_scroll_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Collapse And Scroll Widgets In Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_cat_loading_type'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Loading Type', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default'			=> esc_html__( 'Default', 'cozycorner' )
			,'infinity-scroll'	=> esc_html__( 'Infinity Scroll', 'cozycorner' )
			,'load-more-button'	=> esc_html__( 'Load More Button', 'cozycorner' )
			,'ajax-pagination'	=> esc_html__( 'Ajax Pagination', 'cozycorner' )
		)
		,'default'  => 'ajax-pagination'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-shop-product-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'SHOW/HIDE PRODUCT INFOS', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_cat_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - Limit Words', 'cozycorner' )
		,'subtitle' => esc_html__( 'Number of words to show product description on grid view. It is also used for product elements. To show all, input -1', 'cozycorner' )
		,'desc'     => esc_html__( 'HTML is allowed. So, if your description has html, make sure that this value is large enough. If not, your layout may be broken', 'cozycorner' )
		,'default'  => '-1'
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_number_color_swatch'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Number Of Color Swatches', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			2	=> 2
			,3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_color_swatch', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch_variation_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches - Variation Thumbnail', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use the variation thumbnail instead of color/color image. This option is also used for the Element widget', 'cozycorner' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-product-content-list-view'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Content - List View (One & Two Columns)', 'cozycorner' )
		,'subtitle' => esc_html__( 'The below options only available in layouts 1 Column, 1 Column - Big Thumbnail and 2 Columns', 'cozycorner' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_cat_quantity_input'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Quantity Input', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - List View', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show product description on list view', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - List View - Limit Words', 'cozycorner' )
		,'subtitle' => esc_html__( 'Number of words to show product description on list view. To show all, input -1', 'cozycorner' )
		,'desc'     => esc_html__( 'HTML is allowed. So, if your description has html, make sure that this value is large enough. If not, your layout may be broken', 'cozycorner' )
		,'default'  => '-1'
	)
	
	,array(
		'id'        => 'section-shop-ads-banner'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ads Banner', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_cat_ads_banner'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Ads Banner', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat_ads_banner_content'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Ads Banner Content', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $custom_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_custom_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_ads_banner_display_on'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Ads Banner Display On', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'shop'					=> esc_html__( 'Only Shop Page', 'cozycorner' )
			,'shop-category'		=> esc_html__( 'Shop & Product Category Pages', 'cozycorner' )
			,'shop-all-taxonomies'	=> esc_html__( 'Shop & All Product Taxonomies Pages', 'cozycorner' )
		)
		,'default'  => 'shop-category'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Product Details Tab ***/
$option_fields['product-details'] = array(
	array(
		'id'        => 'ts_prod_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'cozycorner')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'cozycorner')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_layout_fullwidth'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Layout Fullwidth', 'cozycorner' )
		,'subtitle' => esc_html__( 'Override the Layout Fullwidth option in the General tab', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'default'	=> esc_html__( 'Default', 'cozycorner' )
			,'0'		=> esc_html__( 'No', 'cozycorner' )
			,'1'		=> esc_html__( 'Yes', 'cozycorner' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_header_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Header Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_main_content_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Main Content Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_footer_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Footer Layout Fullwidth', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_layout_fullwidth', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Breadcrumb', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_cloudzoom'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Cloud Zoom', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_lightbox'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Lightbox', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Dropdown', 'cozycorner' )
		,'subtitle' => esc_html__( 'If you turn it off, the dropdown will be replaced by image or text label', 'cozycorner' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_color_text'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Text', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show text for the Color attribute instead of color/color image', 'cozycorner' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_attr_dropdown', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_attr_color_variation_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Attribute Variation Thumbnail', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use the variation thumbnail for the Color attribute. The Color slug has to be "color". You need to specify Color for variation (not any)', 'cozycorner' )
		,'default'  => true
		,'required'	=> array( 'ts_prod_attr_color_text', 'equals', '0' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_summary_scrolling'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Summary Scrolling', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_gallery_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Gallery Layout', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'vertical'		=> esc_html__( 'Vertical', 'cozycorner' )
			,'horizontal'	=> esc_html__( 'Horizontal', 'cozycorner' )
			,'grid'			=> esc_html__( 'Grid', 'cozycorner' )
			,'slider-2-col'	=> esc_html__( 'Slider 2 Columns', 'cozycorner' )
		)
		,'default'  => 'vertical'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_thumbnails_center'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Gallery Center', 'cozycorner' )
		,'subtitle' => esc_html__( 'Not available in Grid layout', 'cozycorner' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_group_heading'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Heading For Grouped Product', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show this heading above list of grouped products', 'cozycorner' )
		,'desc'     => ''
		,'default'  => 'What\'s in the box'
	)
	,array(
		'id'        => 'ts_prod_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_title_in_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title In Content', 'cozycorner' )
		,'subtitle' => esc_html__( 'Display the product title in the page content instead of above the breadcrumbs', 'cozycorner' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_availability'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Availability', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_short_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_count_down'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Count Down', 'cozycorner' )
		,'subtitle' => esc_html__( 'You have to activate ThemeSky plugin', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_discount_number'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Discount Number', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show discount number next to the price', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
		,'required'	=> array( 'ts_prod_price', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_ajax_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Ajax Add To Cart', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'required'	=> array( 'ts_prod_add_to_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_buy_now'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Buy Now Button', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only support the simple and variable products', 'cozycorner' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_tag'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tags', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_size_chart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Size Chart', 'cozycorner' )
		,'subtitle' => esc_html__( 'Size Chart Popup is only available if Attribute Dropdown is disabled and the slug of the Size attribute contain "size". Ex: taille-size', 'cozycorner' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_more_less_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product More/Less Content', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show more/less content in the Description tab', 'cozycorner' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'       	=> 'ts_prod_sharing_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Sharing Layout', 'cozycorner' )
		,'subtitle' => esc_html__( 'Layout Vertical is not available if Frequently Bought Together position is in summary or enable Product Summary Scrolling', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'vertical'		=> esc_html__( 'Vertical', 'cozycorner' )
			,'horizontal'	=> esc_html__( 'Horizontal', 'cozycorner' )
		)
		,'default'  => 'horizontal'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing - Use ShareThis', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'cozycorner' )
		,'default'  => false
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sharing - ShareThis Key', 'cozycorner' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'cozycorner' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_summary_custom_content_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Summary Custom Content Title', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_prod_summary_custom_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Summary Custom Content', 'cozycorner' )
		,'subtitle' => esc_html__( 'Add your custom content to summary area', 'cozycorner' )
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)

	,array(
		'id'        => 'section-product-tabs'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Tabs', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'       	=> 'ts_prod_tabs_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Position', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'after_summary'				=> esc_html__( 'After Summary', 'cozycorner' )
			,'inside_summary'			=> esc_html__( 'Inside Summary', 'cozycorner' )
		)
		,'default'  => 'after_summary'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_separate_reviews_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Separate Reviews Tab', 'cozycorner' )
		,'subtitle' => esc_html__( 'Remove Reviews tab in WooCommerce tabs and add it below', 'cozycorner' )
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_reviews_tab_styles'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Reviews Tabs Styles', 'cozycorner' )
		,'subtitle' => esc_html__( 'Only available in product style 5', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'default'				=> esc_html__( 'Default', 'cozycorner' )
			,'heading-left'			=> esc_html__( 'Heading Left', 'cozycorner' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_tabs_show_content_default'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Product Tabs Content By Default', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show the content of all tabs by default and hide the tab headings', 'cozycorner' )
		,'default'  => false
	)
	,array(
		'id'        => 'ts_prod_tabs_heading_center'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Centered Tab Headings', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'required'	=> array( 'ts_prod_tabs_show_content_default', '!=', '1' )
	)
	,array(
		'id'       	=> 'ts_prod_tabs_accordion'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Accordion', 'cozycorner' )
		,'subtitle' => esc_html__( 'Show tabs as accordion. If you add more custom tabs, please make sure that your tab content has heading (h2) at the top', 'cozycorner' )
		,'desc'     => ''
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'cozycorner' )
			,'desktop'		=> esc_html__( 'On Desktop', 'cozycorner' )
			,'mobile'		=> esc_html__( 'On Mobile', 'cozycorner' )
			,'both'			=> esc_html__( 'On All Screens', 'cozycorner' )
		)
		,'default'  => 'mobile'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_tabs_show_content_default', '!=', '1' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Custom Tab', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Custom Tab Title', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom tab'
	)
	,array(
		'id'        => 'ts_prod_custom_tab_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Custom Tab Content', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => esc_html__( 'Your custom content goes here. You can add the content for individual product', 'cozycorner' )
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => true
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => true
		)
	)
	
	,array(
		'id'        => 'section-ads-banner'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ads Banner', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_ads_banner'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Ads Banner', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_ads_banner_content'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Ads Banner Content', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $custom_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_custom_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-related-up-sell-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Related - Up-Sell', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_related'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Related Products', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_prod_upsells'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Up-Sell Products', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	
	,array(
		'id'        => 'section-frequently-bought-together'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Frequently Bought Together', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_fbt_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Position', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'after-summary'	=> esc_html__( 'After Summary', 'cozycorner' )
			,'in-summary'	=> esc_html__( 'In Summary', 'cozycorner' )
		)
		,'default'  => 'after-summary'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_fbt_heading'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Heading', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Frequently Bought Together'
	)
	,array(
		'id'        => 'ts_fbt_unselected_text'
		,'type'     => 'text'
		,'title'    => esc_html__( '"Unselected" Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Select'
	)
	,array(
		'id'        => 'ts_fbt_selected_text'
		,'type'     => 'text'
		,'title'    => esc_html__( '"Selected" Text', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Selected'
	)
	,array(
		'id'        => 'ts_fbt_total_label'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Total Label', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use "%s" to display number of selected products', 'cozycorner' )
		,'desc'     => ''
		,'default'  => 'Buy selected (%s)'
	)
	,array(
		'id'        => 'ts_fbt_discount_label'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Discount Label', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Save'
	)
	,array(
		'id'        => 'ts_fbt_add_to_cart_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Add To Cart Text', 'cozycorner' )
		,'subtitle' => esc_html__( 'Use "%s" to display number of selected products', 'cozycorner' )
		,'desc'     => ''
		,'default'  => 'Add selected (%s) to cart'
	)
	
	,array(
		'id'        => 'section-product-bottom-content'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Bottom Content', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_bottom_content'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Bottom Content', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $custom_block_options
		,'default'  => '0'
		,'class'    => 'ts-post-select post_type-ts_custom_block'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Wishlist Tab ***/
$option_fields['wishlist'] = array(
	array(
		'id'        => 'section-wishlist-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Wishlist Button', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_wishlist_show_in_loop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist in loop', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_wishlist_show_on_product_page'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist on product page', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_wishlist_show_link_after_added'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show wishlist page link after added', 'cozycorner' )
		,'subtitle' => esc_html__( 'If disabled, product will be removed from wishlist when clicking button again', 'cozycorner' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-wishlist-page'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Wishlist Page', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array( 
		'id'       	=> 'ts_wishlist_page'
		,'type'     => 'select' 
		,'title'    => esc_html__( 'Wishlist page', 'cozycorner' ) 
		,'subtitle' => esc_html__( 'To show wishlist, use the [ts_wishlist] shortcode or the TS Wishlist elementor widget', 'cozycorner' ) 
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'        => 'ts_wishlist_remove_after_added_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Remove product from wishlist after added to cart', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
	)
);

/*** Compare Tab ***/
$option_fields['compare'] = array(
	array(
		'id'        => 'section-compare-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Compare Button', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_compare_show_in_loop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Compare in loop', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	,array(
		'id'        => 'ts_compare_show_on_product_page'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Compare on product page', 'cozycorner' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'cozycorner' )
		,'off'		=> esc_html__( 'Hide', 'cozycorner' )
	)
	
	,array(
		'id'        => 'section-compare-page'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Compare Page', 'cozycorner' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array( 
		'id'       	=> 'ts_compare_page'
		,'type'     => 'select' 
		,'title'    => esc_html__( 'Compare page', 'cozycorner' ) 
		,'subtitle' => esc_html__( 'To show compare, use the [ts_compare] shortcode or the TS Compare elementor widget', 'cozycorner' ) 
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'       	=> 'ts_compare_table_fields'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Fields to show', 'cozycorner' )
		,'subtitle' => ''
		,'desc'     => ''
		,'multi'	=> true
		,'sortable'	=> true
		,'options'  => cozycorner_get_compare_fields()
		,'default'  => array('description', 'sku', 'stock', 'weight', 'dimensions')
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Custom Code Tab ***/
$option_fields['custom-code'] = array(
	array(
		'id'        => 'ts_custom_css_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom CSS Code', 'cozycorner' )
		,'subtitle' => ''
		,'mode'     => 'css'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_custom_javascript_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom Javascript Code', 'cozycorner' )
		,'subtitle' => ''
		,'mode'     => 'javascript'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
);