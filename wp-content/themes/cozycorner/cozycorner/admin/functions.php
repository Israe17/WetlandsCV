<?php
add_action('init', 'cozycorner_get_default_theme_options');
function cozycorner_get_default_theme_options(){
	global $cozycorner_theme_options;
	if( empty( $cozycorner_theme_options ) ){
		include get_template_directory() . '/admin/options.php';
		foreach( $option_fields as $fields ){
			foreach( $fields as $field ){
				if( in_array($field['type'], array('section', 'info')) ){
					continue;
				}
				if( isset($field['default']) ){
					$cozycorner_theme_options[ $field['id'] ] = $field['default'];
				}
			}
		}
	}
}

function cozycorner_get_theme_options( $key = '', $default = '' ){
	global $cozycorner_theme_options;
	
	if( !$key ){
		return $cozycorner_theme_options;
	}
	else if( isset($cozycorner_theme_options[$key]) ){
		return $cozycorner_theme_options[$key];
	}
	else{
		return $default;
	}
}

function cozycorner_change_theme_options( $key, $value ){
	global $cozycorner_theme_options;
	if( isset( $cozycorner_theme_options[$key] ) ){
		$cozycorner_theme_options[$key] = $value;
	}
}

add_filter('redux/validate/cozycorner_theme_options/defaults', 'cozycorner_set_default_color_font_options_on_reset');
add_filter('redux/validate/cozycorner_theme_options/defaults_section', 'cozycorner_set_default_color_font_options_on_reset');
function cozycorner_set_default_color_font_options_on_reset( $options_defaults ){
	if( !isset($options_defaults['redux-section']) || ( isset($options_defaults['redux-section']) && $options_defaults['redux-section'] == 2 ) ){
		if( isset($options_defaults['ts_color_scheme']) ){
			$preset_colors = array();
			include get_template_directory() . '/admin/preset-colors/' . $options_defaults['ts_color_scheme'] . '.php';
			foreach( $preset_colors as $key => $value ){
				if( isset($options_defaults[$key]) ){
					$options_defaults[$key] = $value;
				}
			}
		}
	}
	
	if( !isset($options_defaults['redux-section']) || ( isset($options_defaults['redux-section']) && $options_defaults['redux-section'] == 3 ) ){
		if( isset($options_defaults['ts_preset_fonts']) ){
			$preset_fonts = array();
			include get_template_directory() . '/admin/preset-fonts/' . $options_defaults['ts_preset_fonts'] . '.php';
			foreach( $preset_fonts as $key => $value ){
				if( isset($options_defaults[$key]) ){
					$options_defaults[$key] = $value;
				}
			}
		}
	}
	
	return $options_defaults;
}

function cozycorner_get_preset_color_options( $color ){
	$preset_colors = array();
	include get_template_directory() . '/admin/preset-colors/' . $color . '.php';
	return $preset_colors;
}

function cozycorner_get_preset_font_options( $font ){
	$preset_fonts = array();
	include get_template_directory() . '/admin/preset-fonts/' . $font . '.php';
	return $preset_fonts;
}

add_action('add_option_cozycorner_theme_options', 'cozycorner_create_dynamic_css', 10, 2);
function cozycorner_create_dynamic_css( $option, $value ){
	cozycorner_update_dynamic_css($value, $value, $option);
}

add_action('update_option_cozycorner_theme_options', 'cozycorner_update_dynamic_css', 10, 3);
function cozycorner_update_dynamic_css( $old_value, $value, $option ){
	if( is_array($value) ){
		$data = $value;
		$upload_dir = wp_get_upload_dir();
		$filename_dir = trailingslashit($upload_dir['basedir']) . strtolower(str_replace(' ', '', wp_get_theme()->get('Name'))) . '.css';
		ob_start();
		include get_template_directory() . '/framework/dynamic_style.php';
		$dynamic_css = ob_get_contents();
		ob_end_clean();
		
		global $wp_filesystem;
		if( empty( $wp_filesystem ) ) {
			require_once ABSPATH .'/wp-admin/includes/file.php';
			WP_Filesystem();
		}
		
		$creds = request_filesystem_credentials($filename_dir, '', false, false, array());
		if( ! WP_Filesystem($creds) ){
			return false;
		}

		if( $wp_filesystem ) {
			$wp_filesystem->put_contents(
				$filename_dir,
				$dynamic_css,
				FS_CHMOD_FILE
			);
		}
	}
}

add_filter('redux/cozycorner_theme_options/localize', 'cozycorner_remove_redux_ads', 99);
function cozycorner_remove_redux_ads( $localize_data ){
	if( isset($localize_data['rAds']) ){
		$localize_data['rAds'] = '';
	}
	return $localize_data;
}

function cozycorner_get_footer_block_options(){
	$footer_blocks = array('0' => esc_html__('No Footer', 'cozycorner'));
	$args = array(
		'post_type'			=> 'ts_footer_block'
		,'post_status'	 	=> 'publish'
		,'posts_per_page' 	=> -1
	);

	$posts = new WP_Query($args);

	if( !empty( $posts->posts ) && is_array( $posts->posts ) ){
		foreach( $posts->posts as $p ){
			$footer_blocks[$p->ID] = $p->post_title;
		}
	}

	wp_reset_postdata();
	
	return $footer_blocks;
}

function cozycorner_get_custom_block_options(){
	$custom_blocks = array('0' => esc_html__('Select Custom Block', 'cozycorner'));
	$args = array(
		'post_type'			=> 'ts_custom_block'
		,'post_status'	 	=> 'publish'
		,'posts_per_page' 	=> -1
	);

	$posts = new WP_Query($args);

	if( !empty( $posts->posts ) && is_array( $posts->posts ) ){
		foreach( $posts->posts as $p ){
			$custom_blocks[$p->ID] = $p->post_title;
		}
	}

	wp_reset_postdata();
	
	return $custom_blocks;
}

function cozycorner_get_compare_fields(){
	if( !class_exists('WooCommerce') ){
		return array();
	}
	
	$fields = function_exists('TS_COMPARE') ? TS_COMPARE()->get_default_table_fields() : array();
	
	$attributes = wc_get_attribute_taxonomies();
	
	if( !empty($attributes) && is_array($attributes) ){
		foreach( $attributes as $attribute ){
			$fields[ wc_attribute_taxonomy_name( $attribute->attribute_name ) ] = $attribute->attribute_label;
		}
	}
	
	return $fields;
}