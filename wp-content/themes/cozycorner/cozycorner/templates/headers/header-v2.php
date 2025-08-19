<?php
$cozycorner_theme_options = cozycorner_get_theme_options();

$header_classes = array();
if( $cozycorner_theme_options['ts_header_language'] ){
	$header_classes[] = 'has-language';
}
if( $cozycorner_theme_options['ts_header_currency'] ){
	$header_classes[] = 'has-currency';
}
if( $cozycorner_theme_options['ts_enable_hotline'] && $cozycorner_theme_options['ts_hotline_number'] ){
	$header_classes[] = 'has-hotline';
}
if( function_exists('ts_header_social_icons') && $cozycorner_theme_options['ts_enable_header_social_icons'] ){
	$header_classes[] = 'has-social';
}
if( $cozycorner_theme_options['ts_header_layout_fullwidth'] ){
	$header_classes[] = 'header-fullwidth';
}
?>

<header class="ts-header <?php echo esc_attr(implode(' ', $header_classes)); ?>">
	<div class="overlay"></div>
	
	<div class="header-top">
		<div class="container">
			<div class="header-left">
				<?php cozycorner_header_info(); ?>
			</div>
			<div class="header-right hidden-xs">
				<?php cozycorner_top_header_menu(); ?>
				
				<?php if( $cozycorner_theme_options['ts_header_language'] || $cozycorner_theme_options['ts_header_currency'] ): ?>
				<div class="header-language-currency">
					<?php if( $cozycorner_theme_options['ts_header_language'] ): ?>
					<div class="header-language"><?php cozycorner_wpml_language_selector(); ?></div>
					<?php endif; ?>
					
					<?php if( $cozycorner_theme_options['ts_header_currency'] ): ?>
					<div class="header-currency"><?php cozycorner_woocommerce_multilingual_currency_switcher(); ?></div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<div class="header-template header-sticky">
		<div class="header-middle">
			<div class="container">
				<div class="header-left">
					<div class="logo-wrapper"><?php cozycorner_theme_logo(); ?></div>
				</div>
				
				<div class="menu-wrapper hidden-xs">
					<div class="ipad-menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
					
					<div class="ts-menu">
					<?php 
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper','theme_location' => 'primary','walker' => new CozyCorner_Walker_Nav_Menu() ) );
						}
						else{
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper' ) );
						}
					?>
					</div>
				</div>
				
				<div class="header-right">
					<div class="ts-mobile-icon-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
				
					<?php if( $cozycorner_theme_options['ts_enable_search'] ): ?>
					<div class="search-button search-icon">
						<span class="icon"></span>
					</div>
					<?php endif; ?>
					
					<?php if( $cozycorner_theme_options['ts_enable_tiny_account'] ): ?>
					<div class="my-account-wrapper hidden-xs">							
						<?php echo cozycorner_tiny_account(); ?>
					</div>
					<?php endif; ?>
					
					<?php if( class_exists('TS_Wishlist') && $cozycorner_theme_options['ts_enable_tiny_wishlist'] ): ?>
						<div class="my-wishlist-wrapper"><?php echo cozycorner_tini_wishlist(); ?></div>
					<?php endif; ?>
					
					<?php if( $cozycorner_theme_options['ts_enable_tiny_shopping_cart'] ): ?>
					<div class="shopping-cart-wrapper">
						<?php echo cozycorner_tiny_cart(); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>