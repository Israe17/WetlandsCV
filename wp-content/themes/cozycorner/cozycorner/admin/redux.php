<?php
if ( ! class_exists( 'Redux' ) ) {
	return;
}

add_action('after_setup_theme', 'cozycorner_register_redux', 9);
function cozycorner_register_redux(){
	// This is your option name where all the Redux data is stored.
	$opt_name = 'cozycorner_theme_options';

	/**
	 * ---> SET ARGUMENTS
	 * All the possible arguments for Redux.
	 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	 * */

	$theme = wp_get_theme(); // For use with some settings. Not necessary.

	$args = array(
		// TYPICAL -> Change these values as you need/desire
		'opt_name'             => $opt_name,
		// This is where your data is stored in the database and also becomes your global variable name.
		'display_name'         => $theme->get( 'Name' ),
		// Name that appears at the top of your panel
		'display_version'      => $theme->get( 'Version' ),
		// Version that appears at the top of your panel
		'menu_type'            => 'submenu',
		//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
		'allow_sub_menu'       => true,
		// Show the sections below the admin menu item or not
		'menu_title'           => esc_html__( 'Theme Options', 'cozycorner' ),
		'page_title'           => esc_html__( 'Theme Options', 'cozycorner' ),
		// You will need to generate a Google API key to use this feature.
		// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
		'google_api_key'       => '',
		// Set it you want google fonts to update weekly. A google_api_key value is required.
		'google_update_weekly' => false,
		// Must be defined to add google fonts to the typography module
		'async_typography'     => false,
		// Use a asynchronous font on the front end or font string
		'disable_google_fonts_link' => false,                    // Disable this in case you want to create your own google fonts loader
		'admin_bar'            => true,
		// Show the panel pages on the admin bar
		'admin_bar_icon'       => 'dashicons-portfolio',
		// Choose an icon for the admin bar menu
		'admin_bar_priority'   => 50,
		// Choose an priority for the admin bar menu
		'global_variable'      => 'cozycorner_theme_options',
		// Set a different name for your global variable other than the opt_name
		'show_options_object'  => false,
		'dev_mode'             => false,
		// Show the time the page took to load, etc
		'update_notice'        => true,
		// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'customizer'           => false,
		// Enable basic customizer support
		//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
		//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

		// OPTIONAL -> Give you extra features
		'page_priority'        => null,
		// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
		'page_parent'          => 'themes.php',
		// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
		'page_permissions'     => 'manage_options',
		// Permissions needed to access the options panel.
		'menu_icon'            => '',
		// Specify a custom URL to an icon
		'last_tab'             => '',
		// Force your panel to always open to a specific tab (by id)
		'page_icon'            => 'icon-themes',
		// Icon displayed in the admin panel next to your menu_title
		'page_slug'            => 'themeoptions',
		// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
		'save_defaults'        => true,
		// On load save the defaults to DB before user clicks save or not
		'default_show'         => false,
		// If true, shows the default value next to each field that is not the default value.
		'default_mark'         => '',
		// What to print by the field's title if the value shown is default. Suggested: *
		'show_import_export'   => true,
		// Shows the Import/Export panel when not used as a field.

		// CAREFUL -> These options are for advanced use only
		'transient_time'       => 60 * MINUTE_IN_SECONDS,
		'output'               => true,
		// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
		'output_tag'           => true,
		// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
		// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

		// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
		'database'             => '',
		// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
		'use_cdn'              => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

		// HINTS
		'hints'                => array(
			'icon'          => 'el el-question-sign',
			'icon_position' => 'right',
			'icon_color'    => 'lightgray',
			'icon_size'     => 'normal',
			'tip_style'     => array(
				'color'   => 'red',
				'shadow'  => true,
				'rounded' => false,
				'style'   => '',
			),
			'tip_position'  => array(
				'my' => 'top left',
				'at' => 'bottom right',
			),
			'tip_effect'    => array(
				'show' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'    => 'mouseover',
				),
				'hide' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'    => 'click mouseleave',
				),
			),
		)
	);

	// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
	$args['share_icons'][] = array(
		'url'   => 'https://www.facebook.com/wp.themesky/',
		'title' => 'Like us on Facebook',
		'icon'  => 'el el-facebook'
	);

	Redux::set_args( $opt_name, $args );

	/*
	 * ---> END ARGUMENTS
	 */

	/*
	 * ---> START SECTIONS
	 */

	include get_template_directory() . '/admin/options.php';

	/*** General Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'General', 'cozycorner' )
		,'id'               => 'general-tab'
		,'desc'             => ''
		,'icon'             => 'el el-home'
		,'fields'           => $option_fields['general']
	) );

	/*** Color Scheme Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Color Scheme', 'cozycorner' )
		,'id'               => 'color-scheme-tab'
		,'desc'             => ''
		,'icon'             => 'el el-brush'
		,'fields'           => $option_fields['color-scheme']
	) );

	/*** Typography Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Typography', 'cozycorner' )
		,'id'               => 'typography-tab'
		,'desc'             => ''
		,'icon'             => 'el el-font'
		,'fields'           => $option_fields['typography']
	) );

	/*** Header Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Header', 'cozycorner' )
		,'id'               => 'header-tab'
		,'desc'             => ''
		,'icon'             => 'el el-lines'
		,'fields'           => $option_fields['header']
	) );

	/*** Footer Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Footer', 'cozycorner' )
		,'id'               => 'footer-tab'
		,'desc'             => ''
		,'icon'             => 'el el-lines'
		,'fields'           => $option_fields['footer']
	) );

	/*** Menu Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Menu', 'cozycorner' )
		,'id'               => 'menu-tab'
		,'desc'             => ''
		,'icon'             => 'el el-th-list'
		,'fields'           => $option_fields['menu']
	) );

	/*** Blog Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Blog', 'cozycorner' )
		,'id'               => 'blog-tab'
		,'desc'             => ''
		,'icon'             => 'el el-blogger'
		,'fields'           => $option_fields['blog']
	) );

	/*** WooCommerce Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'WooCommerce', 'cozycorner' )
		,'id'               => 'woocommerce-tab'
		,'desc'             => ''
		,'icon'             => 'el el-shopping-cart'
		,'fields'           => $option_fields['woocommerce']
	) );

	/*** Shop/Product Category Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Shop/Product Category', 'cozycorner' )
		,'id'               => 'shop-product-category-tab'
		,'desc'             => ''
		,'icon'             => 'el el-th'
		,'fields'           => $option_fields['shop-product-category']
	) );

	/*** Product Details Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Product Details', 'cozycorner' )
		,'id'               => 'product-details-tab'
		,'desc'             => ''
		,'icon'             => 'el el-list-alt'
		,'fields'           => $option_fields['product-details']
	) );

	/*** Wishlist Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Wishlist', 'cozycorner' )
		,'id'               => 'wishlist-tab'
		,'desc'             => ''
		,'icon'             => 'el el-heart-alt'
		,'fields'           => $option_fields['wishlist']
	) );

	/*** Compare Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Compare', 'cozycorner' )
		,'id'               => 'compare-tab'
		,'desc'             => ''
		,'icon'             => 'el el-retweet'
		,'fields'           => $option_fields['compare']
	) );

	/*** Custom Code Tab ***/
	Redux::set_section( $opt_name, array(
		'title'             => esc_html__( 'Custom Code', 'cozycorner' )
		,'id'               => 'custom-code-tab'
		,'desc'             => ''
		,'icon'             => 'el el-edit'
		,'fields'           => $option_fields['custom-code']
	) );

	/*
	 * <--- END SECTIONS
	 */
}