<?php 
	$cozycorner_theme_options = cozycorner_get_theme_options();
	$enable_menu_tab = $cozycorner_theme_options['ts_header_layout'] == 'v1' && has_nav_menu( 'secondary' );
?>

</div><!-- #main .wrapper -->
	<?php if( !is_page_template('page-templates/blank-page-template.php') && $cozycorner_theme_options['ts_footer_block'] ): ?>
	<footer id="colophon" class="footer-container footer-area loading <?php echo esc_attr( $cozycorner_theme_options['ts_footer_layout_fullwidth'] ? 'footer-fullwidth' : '' ) ?>">
		<?php cozycorner_get_footer_content( $cozycorner_theme_options['ts_footer_block'] ); ?>
	</footer>
	<?php endif; ?>
</div><!-- #page -->

<?php if( !is_page_template('page-templates/blank-page-template.php') ): ?>

	<!-- Group Header Button -->
	<div id="group-icon-header" class="ts-floating-sidebar">
		<div class="ts-sidebar-content <?php echo esc_attr($enable_menu_tab?'':'no-tab'); ?>">
		
			<div class="sidebar-content">
				<ul class="tab-mobile-menu">
					<li class="active" data-tab="#tab-main-menu"><span><?php echo esc_html( wp_get_nav_menu_name('primary') ? wp_get_nav_menu_name('primary') : __('Menu', 'cozycorner') ); ?></span></li>
					<?php if( $enable_menu_tab ): ?>
					<li data-tab="#tab-secondary-menu"><span><?php echo esc_html( wp_get_nav_menu_name('secondary') ? wp_get_nav_menu_name('secondary') : __('Categories', 'cozycorner') ); ?></span></li>
					<?php endif; ?>
				</ul>
				
				<h6 class="menu-title"><span><?php esc_html_e('Menu', 'cozycorner'); ?></span></h6>
				
				<div class="mobile-menu-wrapper ts-menu ts-mobile-menu-tab" id="tab-main-menu">
					<div class="menu-main-mobile">
						<?php 
						if( has_nav_menu( 'mobile' ) ){
							wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'mobile', 'walker' => new CozyCorner_Walker_Nav_Menu() ) );
						}else{
							if( has_nav_menu( 'primary' ) ){
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'primary', 'walker' => new CozyCorner_Walker_Nav_Menu() ) );
							}else{
								wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu' ) );
							}
						}
						?>
					</div>
					<?php cozycorner_top_header_menu(); ?>
				</div>
				
				<?php if( $enable_menu_tab ): ?>
				<div class="mobile-menu-wrapper ts-menu ts-mobile-menu-tab" id="tab-secondary-menu" style="display: none">
					<div class="secondary-menu-mobile">
						<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'secondary-menu pc-menu ts-mega-menu-wrapper','theme_location' => 'secondary','walker' => new CozyCorner_Walker_Nav_Menu() ) ); ?>
					</div>
				</div>
				<?php endif; ?>
				
				<div class="group-button-header">
				
					<?php if( class_exists('TS_Wishlist') && $cozycorner_theme_options['ts_enable_tiny_wishlist'] ): ?>
						<div class="my-wishlist-wrapper"><?php echo cozycorner_tini_wishlist(); ?></div>
					<?php endif; ?>
					
					<?php if( $cozycorner_theme_options['ts_header_language'] || $cozycorner_theme_options['ts_header_currency'] ): ?>
					<div class="meta-bottom">
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
	</div>
		
<?php endif; ?>

<!-- Search Sidebar -->
<?php if( $cozycorner_theme_options['ts_enable_search'] ): ?>
	<div id="ts-search-sidebar" class="ts-floating-sidebar">
		<div class="overlay"></div>
		<div class="ts-sidebar-content">
			<span class="close"></span>
			<?php cozycorner_get_search_form_by_category(); ?>
		</div>
	</div>
<?php endif; ?>

<!-- Shopping Cart Floating Sidebar -->
<?php if( class_exists('WooCommerce') && $cozycorner_theme_options['ts_enable_tiny_shopping_cart'] && $cozycorner_theme_options['ts_shopping_cart_sidebar'] && !is_cart() && !is_checkout() ): ?>
<div id="ts-shopping-cart-sidebar" class="ts-floating-sidebar">
	<div class="overlay"></div>
	<div class="ts-sidebar-content">
		<span class="close"></span>
		<div class="ts-tiny-cart-wrapper"></div>
	</div>
</div>
<?php endif; ?>

<?php 
if( ( !wp_is_mobile() && $cozycorner_theme_options['ts_back_to_top_button'] ) || ( wp_is_mobile() && $cozycorner_theme_options['ts_back_to_top_button_on_mobile'] ) ): 
?>
<div id="to-top" class="scroll-button">
	<a class="scroll-button" href="javascript:void(0)" title="<?php esc_attr_e('Back to Top', 'cozycorner'); ?>"><?php esc_html_e('Back to Top', 'cozycorner'); ?></a>
</div>
<?php endif; ?>

<?php 
wp_footer(); ?>
</body>
</html>