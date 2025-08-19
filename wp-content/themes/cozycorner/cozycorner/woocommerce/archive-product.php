<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$extra_class = array();
$main_content_class = array();
$theme_options = cozycorner_get_theme_options();
$page_title = woocommerce_page_title(false);
$columns = $theme_options['ts_prod_cat_columns'];
$breadcrumb_layout = $theme_options['ts_breadcrumb_layout'];

$extra_class[] = 'columns-' . $columns;

if( is_search() && !woocommerce_products_will_display() ){
	$theme_options['ts_prod_cat_layout'] = '0-1-0';
}

if( $theme_options['ts_prod_cat_list_desc'] ){
	$extra_class[] = 'has-description-list';
}

if( cozycorner_is_active_filter_area() ){
	$theme_options['ts_prod_cat_layout'] = '0-1-0';
	$main_content_class[] = 'style-filter-' . $theme_options['ts_filter_style'];

	if( $theme_options['ts_show_filter_widget_area_by_default'] ){
		$main_content_class[] = 'show-filter-default';
	}
}

if( $theme_options['ts_sticky_filter_mobile'] ){
	$extra_class[] = 'mobile-sticky-filters';
}

if( $theme_options['ts_prod_cat_ads_banner'] ){
	$extra_class[] = 'has-ads-banner';
}

if( $theme_options['ts_prod_cat_collapse_scroll_sidebar'] && $theme_options['ts_prod_cat_layout'] != '0-1-0' ){
	$extra_class[] = 'collapse-scroll-sidebar';
}

$page_column_class = cozycorner_page_layout_columns_class($theme_options['ts_prod_cat_layout']);

cozycorner_shop_top_product_categories();

if( $custom_breadcrumb_layout = cozycorner_get_custom_breadcrumb_id_class() ){ /* custom breadcumb layout */
	cozycorner_custom_breadcrumb_content( $custom_breadcrumb_layout );
	$theme_options['ts_prod_cat_title_in_sidebar'] = false;
}
else{
	$show_breadcrumb = get_post_meta( wc_get_page_id( 'shop' ), 'ts_show_breadcrumb', true );
	$show_page_title = apply_filters( 'woocommerce_show_page_title', true ) && get_post_meta( wc_get_page_id( 'shop' ), 'ts_show_page_title', true );

	/* show page title in sidebar */
	$extra_class_title = '';
	if( $theme_options['ts_prod_cat_title_in_sidebar'] && $theme_options['ts_prod_cat_layout'] != '0-1-0' ){
		$extra_class[] = 'title-in-sidebar';
		$extra_class_title = 'visible-xs';
	}

	if( $show_breadcrumb || $show_page_title ){
		$extra_class[] = 'show_breadcrumb_' . $theme_options['ts_breadcrumb_layout'];
	}
	
	if( $show_page_title && in_array($breadcrumb_layout, array('v2', 'v3')) && is_tax( 'product_cat' ) ){
		$category = get_queried_object();
		if( is_object( $category ) ){
			$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
			if( $thumbnail_id ){
				$page_title .= '<span class="thumbnail">';
				
				$page_title .= wp_get_attachment_image($thumbnail_id, 'full');
				
				if( $breadcrumb_layout == 'v3' ){
					$page_title .= '<span class="count">'. sprintf( _n( '%s product', '%s products', $category->count, 'cozycorner' ), $category->count ) .'</span>';
				}
				
				$page_title .= '</span>';
			}
		}
	}

	cozycorner_breadcrumbs_title( $show_breadcrumb, $show_page_title, $page_title, $extra_class_title );
}

if( is_active_sidebar('shop-top-area') ){
	?>
	<div id="shop-top-area" class="ts-sidebar">
		<aside class="container">
			<?php dynamic_sidebar('shop-top-area'); ?>
		</aside>
	</div>
	<?php
}
?>

<div class="page-container <?php echo esc_attr(implode(' ', $extra_class)); ?> <?php echo esc_attr($page_column_class['main_class']); ?>">
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
	<div id="left-sidebar" class="ts-sidebar">
		<aside>
			<div class="ts-heading">
				<h6><?php esc_html_e('Filters', 'cozycorner'); ?></h6>
				<span class="close"></span>
			</div>
			
			<?php cozycorner_product_on_sale_form(); ?>
		
			<?php	
			if( $theme_options['ts_prod_cat_title_in_sidebar'] ){
			?>
				<section class="widget-container ts-category-title">
					<h3 class="widget-title heading-title"><?php echo esc_html( $page_title ); ?></h3>
				</section>
			<?php
				$page_title = ''; /* only show title on one sidebar */
			}
			
			if( is_active_sidebar($theme_options['ts_prod_cat_left_sidebar']) ){
				dynamic_sidebar( $theme_options['ts_prod_cat_left_sidebar'] );
			}
			?>
		</aside>
	</div>
	<?php endif; ?>
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div id="main-content" class="<?php echo esc_attr(implode(' ', $main_content_class)); ?>">
		<div id="primary" class="site-content">
		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( woocommerce_product_loop() ) : ?>
		
			<div class="before-loop-wrapper"><?php do_action( 'woocommerce_before_shop_loop' ); ?></div>

			<?php
			cozycorner_widget_layered_nav_filters();
			
			cozycorner_filter_widget_area( array('sidebar') );
			
			global $woocommerce_loop;
			$woocommerce_loop['columns'] = $columns != '1-1' ? absint($columns) : 1;
			?>
			<div class="woocommerce main-products" style="--ts-product-columns: <?php echo esc_attr($woocommerce_loop['columns']); ?>;">
			<?php
			woocommerce_product_loop_start();

			if( wc_get_loop_prop( 'total' ) ){
				while ( have_posts() ){
					the_post();

					do_action( 'woocommerce_shop_loop' );
				
					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();
			?>
			</div>
			
			<div class="after-loop-wrapper"><?php do_action( 'woocommerce_after_shop_loop' ); ?></div>
			
			<?php cozycorner_shop_ads_banner(); ?>
			
		<?php else: ?>

			<?php do_action( 'woocommerce_no_products_found' ); ?>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
		
		</div>
	</div>
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<div id="right-sidebar" class="ts-sidebar">
			<aside>
				<div class="ts-heading">
					<h6><?php esc_html_e('Filters', 'cozycorner'); ?></h6>
					<span class="close"></span>
				</div>
			
				<?php	
				if( $theme_options['ts_prod_cat_title_in_sidebar'] && $page_title ){
				?>
					<section class="widget-container ts-category-title">
						<h3 class="widget-title heading-title"><?php echo esc_html( $page_title ); ?></h3>
					</section>
				<?php
				}
				
				if( is_active_sidebar($theme_options['ts_prod_cat_right_sidebar']) ){
					dynamic_sidebar( $theme_options['ts_prod_cat_right_sidebar'] );
				}
			?>
			</aside>
		</div>
	<?php endif; ?>	
	
</div>
<?php

get_footer(); ?>