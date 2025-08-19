<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$review_count = $product->get_review_count();
?>
<div class="woocommerce-product-rating">
<?php
	if( $product->get_rating_count() ){
		echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
	}
	else{
	?>
		<div class="star-rating empty-rating" role="img" aria-label="<?php esc_attr_e('No rating', 'cozycorner'); ?>"><?php echo wc_get_star_rating_html( 0, 0 ); ?></div>
	<?php
	}
	?>
	<span class="review-count">
		<?php echo sprintf( _n( '%s Review', '%s Reviews', $review_count, 'cozycorner' ), $review_count ); ?>
	</span>
</div>