<?php 
function cozycorner_get_list_sidebars(){
	$default_sidebars = array(
						array(
							'name' => esc_html__( 'Home Sidebar', 'cozycorner' ),
							'id' => 'home-sidebar',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Blog Sidebar', 'cozycorner' ),
							'id' => 'blog-sidebar',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Blog Detail Sidebar', 'cozycorner' ),
							'id' => 'blog-detail-sidebar',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Product Category Sidebar', 'cozycorner' ),
							'id' => 'product-category-sidebar',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Filter Widget Area', 'cozycorner' ),
							'id' => 'filter-widget-area',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Shop Top Area', 'cozycorner' ),
							'id' => 'shop-top-area',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
							'description'	=> esc_html__( 'Show content at the top of the shop/product taxonomy pages', 'cozycorner' )
						)
						,array(
							'name' => esc_html__( 'Product Detail Sidebar', 'cozycorner' ),
							'id' => 'product-detail-sidebar',
							'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</section>',
							'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
					);
					
	$custom_sidebars = cozycorner_get_custom_sidebars();
	if( is_array($custom_sidebars) && !empty($custom_sidebars) ){
		foreach( $custom_sidebars as $name ){
			$default_sidebars[] = array(
								'name' => ''.$name.'',
								'id' => sanitize_title($name),
								'description' => '',
								'class'			=> 'ts-custom-sidebar',
								'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
								'after_widget' => '</section>',
								'before_title' => '<div class="widget-title-wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
								'after_title' => '</h3></div>',
							);
		}
	}
	
	return $default_sidebars;
}

function cozycorner_register_widget_area(){
	$default_sidebars = cozycorner_get_list_sidebars();
	foreach( $default_sidebars as $sidebar ){
		register_sidebar($sidebar);
	}
}
add_action( 'widgets_init', 'cozycorner_register_widget_area' );

/* Custom Sidebar */
add_action( 'sidebar_admin_page', 'cozycorner_custom_sidebar_form' );
function cozycorner_custom_sidebar_form(){
?>
	<form action="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" method="post" id="ts-form-add-sidebar">
        <input type="text" name="sidebar_name" id="sidebar_name" placeholder="<?php esc_attr_e('Custom Sidebar Name', 'cozycorner'); ?>" />
		<input type="hidden" id="ts_custom_sidebar_nonce" value="<?php echo wp_create_nonce('ts-custom-sidebar'); ?>" />
        <button class="button-primary" id="ts-add-sidebar"><?php esc_html_e('Add Sidebar', 'cozycorner'); ?></button>
    </form>
<?php
}

function cozycorner_get_custom_sidebars(){
	$option_name = 'ts_custom_sidebars';
	$custom_sidebars = get_option($option_name);
    return is_array($custom_sidebars)?$custom_sidebars:array();
}

add_action('wp_ajax_cozycorner_add_custom_sidebar', 'cozycorner_add_custom_sidebar');
function cozycorner_add_custom_sidebar(){
	if( isset($_POST['sidebar_name']) ){
		check_ajax_referer('ts-custom-sidebar', 'sidebar_nonce');
		
		$option_name = 'ts_custom_sidebars';
		if( !get_option($option_name) || get_option($option_name) == '' ){
			delete_option($option_name);
		}
		
		$sidebar_name = sanitize_text_field($_POST['sidebar_name']);
		
		if( get_option($option_name) ){
			$custom_sidebars = cozycorner_get_custom_sidebars();
			if( !in_array($sidebar_name, $custom_sidebars) ){
				$custom_sidebars[] = $sidebar_name;
			}
			$result = update_option($option_name, $custom_sidebars);
		}
		else{
			$custom_sidebars = array();
			$custom_sidebars[] = $sidebar_name;
			$result = add_option($option_name, $custom_sidebars);
		}
		
		if( $result ){
			die( esc_html__('Successfully added the sidebar', 'cozycorner') );
		}
		else{
			die( esc_html__('Error! It seems that the sidebar exists. Please try again!', 'cozycorner') );
		}
	}
	die('');
}

add_action('wp_ajax_cozycorner_delete_custom_sidebar', 'cozycorner_delete_custom_sidebar');
function cozycorner_delete_custom_sidebar(){
	if( isset($_POST['sidebar_name']) ){
		check_ajax_referer('ts-custom-sidebar', 'sidebar_nonce');
		
		$option_name = 'ts_custom_sidebars';
		$del_sidebar = sanitize_text_field($_POST['sidebar_name']);
		$custom_sidebars = cozycorner_get_custom_sidebars();
		foreach( $custom_sidebars as $key => $value ){
			if( $value == $del_sidebar ){
				unset($custom_sidebars[$key]);
				break;
			}
		}
		$custom_sidebars = array_values($custom_sidebars);
		update_option($option_name, $custom_sidebars);
		die( esc_html__('Successfully deleted the sidebar', 'cozycorner') );
	}
	die('');
}
?>