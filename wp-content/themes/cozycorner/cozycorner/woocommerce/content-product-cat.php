<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_cat_title = isset($show_title)?$show_title:true;
$show_cat_product_count = isset($show_product_count)?$show_product_count:true;
$style = isset($style)?$style:'default';

$term_link = get_term_link( $category, 'product_cat' );
?>
<section <?php wc_product_cat_class('product-category product', $category); ?>>
	
	<div class="product-category-wrapper">

		<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
		
		<?php  if( $style != 'big-text' ): ?>
		<a href="<?php echo esc_url($term_link) ?>">
			<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			?>
		</a>
		<?php endif; ?>
		
		<h4 class="heading-title category-name">
			<?php if( $show_cat_title ): ?>
			<a href="<?php echo esc_url($term_link) ?>">
				<?php echo esc_html($category->name); ?>
			</a>
			<?php endif; ?>
			
			<?php  if( $show_cat_product_count && $style != 'big-text' ): ?>
				<?php echo apply_filters( 'woocommerce_subcategory_count_html', '<span class="count">('. $category->count .')</span>', $category ); ?>
			<?php endif; ?>
		</h4>
		
		<?php  if( $style == 'big-text' ): ?>
		<a href="<?php echo esc_url($term_link) ?>" class="meta-btn">
			<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			
			if( $show_cat_product_count ):
				echo apply_filters( 'woocommerce_subcategory_count_html', '<span class="count">'. sprintf( _n( '%s product', '%s products', $category->count, 'cozycorner' ), $category->count ) .'</span>', $category );
			endif;
			?>
			<i class="icon-arrow-long-right"></i>
		</a>
		<?php endif; ?>
		
		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
		
	</div>

</section>