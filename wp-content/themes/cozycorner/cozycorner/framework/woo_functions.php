<?php 
/*** Tiny account ***/
if( !function_exists('cozycorner_tiny_account') ){
	function cozycorner_tiny_account( $show_dropdown = true ){
		$login_url 		= wp_login_url();
		$register_url 	= wp_registration_url();
		$profile_url 	= admin_url( 'profile.php' );
		$logout_url 	= wp_logout_url( get_permalink() );
		
		if( class_exists('WooCommerce') ){
			$myaccount_url = wc_get_page_permalink( 'myaccount', '#' );
			if( $myaccount_url != '#' ){
				$login_url 		= $myaccount_url;
				$register_url 	= $myaccount_url;
				$profile_url 	= $myaccount_url;
			}
			
			if( is_account_page() ){
				$show_dropdown = false;
				cozycorner_change_theme_options('ts_tiny_account_login_popup', 0);
			}
		}
		
		$_user_logged = is_user_logged_in();
		$current_user = wp_get_current_user();
		
		if( !$_user_logged && cozycorner_get_theme_options('ts_tiny_account_login_popup') ){
			$show_dropdown = false;
		}
		
		ob_start();
		
		?>
		<div class="ts-tiny-account-wrapper">
			<div class="account-control">
				<?php if( !$_user_logged ): ?>
					<a class="login" href="<?php echo esc_url($login_url); ?>"></a>
				<?php else:?>
					<a class="my-account" href="<?php echo esc_url($profile_url); ?>"></a>
				<?php endif; ?>
				
				<?php if( $show_dropdown ): ?>
				<div class="account-dropdown-form dropdown-container">
					<div class="form-content">
						<?php
						if( !$_user_logged ):
							cozycorner_login_form();
						else:
						?>
							<ul>
								<li><a class="my-account" href="<?php echo esc_url($profile_url); ?>"><?php esc_html_e('My account', 'cozycorner'); ?></a></li>
								<?php
								if( function_exists('wc_get_account_endpoint_url') ){
									?>
									<li><a class="orders" href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"><?php esc_html_e('Your orders', 'cozycorner'); ?></a></li>
									<?php
								}
								
								$custom_links = cozycorner_get_theme_options('ts_tiny_account_custom_links');
								if( !empty( $custom_links ) && is_array( $custom_links ) ){
									foreach( $custom_links as $custom_link ){
										$custom_link = explode('|', $custom_link);
										if( count($custom_link) == 2 ){
											$custom_link = array_map('trim', $custom_link);
										?>
											<li><a class="custom-link" href="<?php echo esc_url($custom_link[1]); ?>"><?php echo esc_html($custom_link[0]); ?></a></li>
										<?php
										}
									}
								}
								?>
								<li class="link-bottom">
									<a class="log-out" href="<?php echo esc_url($logout_url); ?>"><?php esc_html_e( 'Logout', 'cozycorner' ); ?></a>
								</li>
							</ul>
						<?php endif; ?>
						
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
		
		<?php
		return ob_get_clean();
	}
}

if( !function_exists('cozycorner_login_form') ){
	function cozycorner_login_form(){
		$register_url = wp_registration_url();
		if( class_exists('WooCommerce') ){
			$register_url = wc_get_page_permalink( 'myaccount', $register_url );
		}
		?>
		<?php
		add_filter('login_form_middle', 'cozycorner_forget_password_html');
		
		wp_login_form( array(
			'form_id' 			=> 'ts-login-form'
			,'label_username' 	=> 'E-mail address'
			,'label_password'	=> 'Password'
			,'label_log_in'		=> esc_html__( 'Log In', 'cozycorner' )
		) );
		
		remove_filter('login_form_middle', 'cozycorner_forget_password_html');
		?>
		
		<div class="create-account-wrapper">
			<span><?php esc_html_e('I’m new client.', 'cozycorner'); ?></span>
			<a class="create-account" href="<?php echo esc_url($register_url); ?>"><?php esc_html_e('Create an account', 'cozycorner'); ?></a>
		</div>
		<?php
	}
}

if( !function_exists('cozycorner_forget_password_html') ){
	function cozycorner_forget_password_html( $html = '' ){
		$html .= '<p class="login-forget-password"><a class="forget-password" href="'.esc_url(wp_lostpassword_url()).'">'.esc_html__('I forget the password', 'cozycorner').'</a></p>';
		return $html;
	}
}

add_action('wp_footer', 'cozycorner_login_form_popup');
if( !function_exists('cozycorner_login_form_popup') ){
	function cozycorner_login_form_popup(){
		$theme_options = cozycorner_get_theme_options();
		if( !$theme_options['ts_tiny_account_login_popup'] || is_user_logged_in() ){
			return;
		}
		$banner_image_url = !empty( $theme_options['ts_tiny_account_login_popup_banner']['url'] ) ? $theme_options['ts_tiny_account_login_popup_banner']['url'] : '';
		$banner_link = $theme_options['ts_tiny_account_login_popup_banner_link'];
		?>
		<div id="ts-login-popup-modal" class="ts-popup-modal">
			<div class="overlay"></div>
			<div class="login-popup-container popup-container">
				<span class="close"><?php esc_html_e('Close ', 'cozycorner'); ?></span>
				<div class="login-popup-content">
					<?php
					if( $banner_image_url ){
					?>
					<div class="banner-content">
						<?php if( $banner_link ){ ?>
						<a href="<?php echo esc_url($banner_link); ?>" target="_blank">
						<?php } ?>
							<img src="<?php echo esc_url($banner_image_url) ?>" loading="lazy" alt="<?php esc_attr_e('Banner', 'cozycorner'); ?>" />
						<?php if( $banner_link ){ ?>
						</a>
						<?php } ?>
					</div>
					<?php
					}
					?>
					<div class="form-content">
					<?php cozycorner_login_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/*** Tiny Cart ***/
if( !function_exists('cozycorner_tiny_cart') ){
	function cozycorner_tiny_cart( $show_cart_control = true, $show_cart_dropdown = true ){
		if( !class_exists('WooCommerce') ){
			return '';
		}
		$cart_empty = WC()->cart->is_empty();
		$cart_url = wc_get_cart_url();
		$checkout_url = wc_get_checkout_url();
		$cart_number = WC()->cart->get_cart_contents_count();
		ob_start();
		?>
			<div class="ts-tiny-cart-wrapper">
				<?php if( $show_cart_control ): ?>
				<div class="cart-icon">
					<a class="cart-control" href="<?php echo esc_url($cart_url); ?>">
						<span class="ic-cart"></span>
						<span class="cart-number"><?php echo esc_html($cart_number) ?></span>
					</a>
				</div>
				<?php endif; ?>
				
				<?php if( $show_cart_dropdown ): ?>
				<div class="cart-dropdown-form dropdown-container woocommerce <?php echo esc_attr( $cart_empty ? 'cart-empty': '' ); ?>">
					<div class="form-content">
					
						<h3 class="theme-title"><?php echo sprintf( 'Your cart (%s %s)', $cart_number, esc_html__('items', 'cozycorner') ) ?></h3>
							
						<?php if( $cart_empty ): ?>
							<label>
								<span><?php esc_html_e('Your cart is empty', 'cozycorner'); ?></span>
							</label>
							
							<?php cozycorner_free_shipping_message_bar(); ?>
							
							<div class="buttons">
								<a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="button continue-shopping-button"><?php esc_html_e('Continue shopping', 'cozycorner'); ?></a>
							</div>
						<?php
							else: 
						?>
							<div class="cart-wrapper">
								<div class="cart-content">
									<ul class="cart_list">
										<?php 
										foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
											$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
											if ( !( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) ){
												continue;
											}
											$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
											<li class="woocommerce-mini-cart-item">
											
												<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-cart_item_key="%s">'.esc_html__( 'Remove', 'cozycorner' ).'</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'cozycorner' ), $cart_item_key ), $cart_item_key ); ?>
												
												<a class="thumbnail" href="<?php echo esc_url($product_permalink); ?>">
													<?php echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
												</a>
												
												<div class="cart-item-wrapper">
													<?php
													if( taxonomy_exists('ts_product_brand') ){
														echo get_the_term_list($_product->get_id(), 'ts_product_brand', '<div class="product-brands"><span class="brand-links">', ', ', '</span></div>'); 
													}
													?>
													
													<h3 class="product-name">
														<a href="<?php echo esc_url($product_permalink); ?>">
															<?php echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key); ?>
														</a>
													</h3>
													
													<span class="price"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></span>
													
													<?php echo '<div class="subtotal">'. apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) . '</div>'; ?>
												</div>
												
												<?php
													if( $_product->is_sold_individually() ){
														$product_quantity = '<span class="quantity">1</span>';
													}else{
														$product_quantity = woocommerce_quantity_input( array(
															'input_name'  	=> "cart[{$cart_item_key}][qty]",
															'input_value' 	=> $cart_item['quantity'],
															'max_value'   	=> $_product->get_max_purchase_quantity(),
															'min_value'   	=> '0',
															'product_name'  => $_product->get_name()
														), $_product, false );
													}
													echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
												?>
											</li>
										
										<?php endforeach; ?>
									</ul>
									<div class="dropdown-footer">
										<div class="total"><span class="total-title"><?php esc_html_e('Subtotal', 'cozycorner');?></span><?php echo WC()->cart->get_cart_subtotal(); ?></div>
										
										<?php cozycorner_free_shipping_message_bar(); ?>
										
										<div class="buttons">
											<a href="<?php echo esc_url($checkout_url); ?>" class="button checkout-button"><?php esc_html_e('Checkout', 'cozycorner'); ?></a>
											<a href="<?php echo esc_url($cart_url); ?>" class="view-cart"><?php esc_html_e('View Cart', 'cozycorner'); ?></a>
											<a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="continue-shopping-button"><?php esc_html_e('Continue shopping', 'cozycorner'); ?></a>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		<?php
		return ob_get_clean();
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'cozycorner_tiny_cart_filter');
function cozycorner_tiny_cart_filter($fragments){
	$cart_sidebar = cozycorner_get_theme_options('ts_shopping_cart_sidebar');
	$fragments['.ts-tiny-cart-wrapper'] = cozycorner_tiny_cart(true, !$cart_sidebar);
	if( $cart_sidebar ){
		$fragments['#ts-shopping-cart-sidebar .ts-tiny-cart-wrapper'] = cozycorner_tiny_cart(false, true);
	}
	return $fragments;
}

add_action('wp_ajax_cozycorner_update_cart_quantity', 'cozycorner_update_cart_quantity');
add_action('wp_ajax_nopriv_cozycorner_update_cart_quantity', 'cozycorner_update_cart_quantity');
function cozycorner_update_cart_quantity(){
	check_ajax_referer( 'cozycorner-update-cart-nonce', 'security' );
	
	if( isset($_POST['cart_item_key'], $_POST['qty']) ){
		$cart_item_key = sanitize_text_field($_POST['cart_item_key']);
		$qty = sanitize_text_field($_POST['qty']);
		$cart =  WC()->cart->get_cart();
		if( isset($cart[$cart_item_key]) ){
			$qty = apply_filters( 'woocommerce_stock_amount_cart_item', wc_stock_amount( preg_replace( '/[^0-9\.]/', '', $qty ) ), $cart_item_key );
			if( !($qty === '' || $qty === $cart[$cart_item_key]['quantity']) ){
				if( !($cart[$cart_item_key]['data']->is_sold_individually() && $qty > 1) ){
					WC()->cart->set_quantity( $cart_item_key, $qty, false );
					$cart_updated = apply_filters( 'woocommerce_update_cart_action_cart_updated', true );
					if( $cart_updated ){
						WC()->cart->calculate_totals();
					}
				}
			}
		}
		WC_AJAX::get_refreshed_fragments();
	}
}

if( !function_exists('cozycorner_get_free_shipping_data') ){
	function cozycorner_get_free_shipping_data(){
		$shipping_country = WC()->customer->get_shipping_country();
		
		$delivery_zones = WC_Shipping_Zones::get_zones();
		
		if( ( empty( $shipping_country ) || 'default' === $shipping_country ) && !empty( $delivery_zones ) ){
			$first_zone      = reset( $delivery_zones );
			$first_zone_code = $first_zone['zone_locations'][0]->code;
			WC()->customer->set_shipping_country( $first_zone_code );
		}
		
		$is_available = false;
		$min_amount = 0;
		$ignore_discounts = 'no';
		
		$wc_shipping = WC()->shipping();
		$wc_cart = WC()->cart;
		if( $wc_shipping && $wc_cart && $wc_shipping->enabled && ( $packages = $wc_cart->get_shipping_packages() ) ){
			$shipping_methods = $wc_shipping->load_shipping_methods( $packages[0] );
			foreach( $shipping_methods as $shipping_method ){
				if( $shipping_method->is_enabled() && 0 != $shipping_method->instance_id && $shipping_method instanceof WC_Shipping_Free_Shipping ){
					if( in_array( $shipping_method->requires, array( 'min_amount', 'either', 'both' ) ) ){
						if( $shipping_method->is_available( $packages[0] ) ){
							$is_available = true;
						}
						$min_amount 		= $shipping_method->min_amount;
						$ignore_discounts 	= $shipping_method->ignore_discounts;
						break;
					}
				}
			}
		}
		
		return array( 'is_available' => $is_available, 'min_amount' => $min_amount, 'ignore_discounts' => $ignore_discounts );
	}
}

/*** @see WC_Shipping_Free_Shipping::is_available() ***/
if( !function_exists('cozycorner_get_free_shipping_cart_total') ){
	function cozycorner_get_free_shipping_cart_total( $ignore_discounts = 'no' ){
		$total = WC()->cart->get_displayed_subtotal();
		if( $ignore_discounts == 'no' ){
			$total = $total - (float) WC()->cart->get_discount_total();
			if( WC()->cart->display_prices_including_tax() ){
				$total = $total - (float) WC()->cart->get_discount_tax();
			}
		}
		return round( $total, wc_get_price_decimals() );
	}
}

if( !function_exists('cozycorner_free_shipping_message_bar') ){
	function cozycorner_free_shipping_message_bar(){
		if( !cozycorner_get_theme_options('ts_shopping_cart_free_shipping_message_bar') ){
			return;
		}
		$class = '';
		$message = '';
		$progress_width = '';
		
		$data = cozycorner_get_free_shipping_data();
		
		if( WC()->cart->is_empty() ){
			if( $data['min_amount'] != 0 ){
				$message = sprintf( __('Free shipping on all orders over %s', 'cozycorner'), wc_price( $data['min_amount'] ) );
			}
		}
		else{
			if( $data['is_available'] ){
				$message = __('Congratulations! You\'ve unlock free shipping', 'cozycorner');
				$progress_width = '100%';
				$class = 'success';
			}
			elseif( $data['min_amount'] != 0 ){
				$cart_total = cozycorner_get_free_shipping_cart_total( $data['ignore_discounts'] );
				$amount_left = $data['min_amount'] - $cart_total;
				$message = sprintf( __('Buy %s more to enjoy free shipping', 'cozycorner'), wc_price( $amount_left ) );
				$progress_width = number_format( $cart_total * 100 / $data['min_amount'], 2 ) . '%';
				$class = 'warning';
			}
		}
		
		if( $message || $progress_width ){
		?>
		<div class="ts-free-shipping-message-bar <?php echo esc_attr( $class ); ?>">
			<?php if( $message ){ ?>
			<div class="message"><?php echo wp_kses( $message, 'cozycorner_product_price' ); ?></div>
			<?php } ?>
			
			<?php if( $progress_width ){ ?>
				<div class="progress-bar">
					<span style="--ts-progress-width:<?php echo esc_attr($progress_width); ?>"></span>
				</div>
			<?php } ?>
		</div>
		<?php
		}
	}
}

/** Tini wishlist **/
function cozycorner_tini_wishlist(){
	if( !( class_exists('WooCommerce') && class_exists('TS_Wishlist') ) ){
		return;
	}
	
	ob_start();
	?>
	<a title="<?php esc_attr_e('Wishlist', 'cozycorner'); ?>" href="<?php echo esc_url( TS_WISHLIST()->get_wishlist_url() ); ?>" class="tini-wishlist">
		<span class="title"><?php esc_html_e('Wishlist', 'cozycorner'); ?></span>
		<span class="count-number"><?php echo absint( TS_WISHLIST()->get_wishlist_count() ); ?></span>
	</a>
	<?php
	return ob_get_clean();
}

if( !function_exists('cozycorner_woocommerce_multilingual_currency_switcher') ){
	function cozycorner_woocommerce_multilingual_currency_switcher(){
		if( class_exists('woocommerce_wpml') && class_exists('WooCommerce') && class_exists('SitePress') ){
			global $sitepress, $woocommerce_wpml;
			
			if( !isset($woocommerce_wpml->multi_currency) ){
				return;
			}
			
			$settings = $woocommerce_wpml->get_settings();
			
			$format = isset($settings['wcml_curr_template']) && $settings['wcml_curr_template'] != '' ? $settings['wcml_curr_template']:'%code%';
			$wc_currencies = get_woocommerce_currencies();
			if( !isset($settings['currencies_order']) ){
				$currencies = $woocommerce_wpml->multi_currency->get_currency_codes();
			}else{
				$currencies = $settings['currencies_order'];
			}
			
			$selected_html = '';
			foreach( $currencies as $currency ){
				if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
					$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
													array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						
					if( $currency == $woocommerce_wpml->multi_currency->get_client_currency() ){
						$selected_html = '<a href="javascript: void(0)" class="wcml-cs-active-currency">'.$currency_format.'</a>';
						break;
					}
				}
			}
			
			echo '<div class="wcml_currency_switcher">';
				echo wp_kses( $selected_html, 'cozycorner_link' );
				echo '<ul>';
			
				foreach( $currencies as $currency ){
					if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
						$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
														array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						echo '<li><a rel="' . esc_attr($currency) . '">' . esc_html($currency_format) . '</a></li>';
					}
				}
				
				echo '</ul>';
			echo '</div>';
		}
		else if( class_exists('WOOCS') && class_exists('WooCommerce') ){ /* Support WooCommerce Currency Switcher */
			global $WOOCS;
			$currencies = $WOOCS->get_currencies();
			if( !is_array($currencies) ){
				return;
			}
			?>
			<div class="wcml_currency_switcher">
				<a href="javascript: void(0)" class="wcml-cs-active-currency"><?php echo esc_html($WOOCS->current_currency); ?></a>
				<ul>
					<?php 
					foreach( $currencies as $key => $currency ){
						$link = add_query_arg('currency', $currency['name']);
						echo '<li rel="' . esc_attr($currency['name']) . '"><a href="' . esc_url($link) . '">' . esc_html($currency['name']) . '</a></li>';
					}
					?>
				</ul>
			</div>
			<?php
		}else{
			do_action('cozycorner_header_currency_switcher'); /* Allow use another currency switcher */
		}
	}
}

add_filter( 'wcml_multi_currency_ajax_actions', 'cozycorner_wcml_multi_currency_ajax_actions_filter' );
if( !function_exists('cozycorner_wcml_multi_currency_ajax_actions_filter') ){
	function cozycorner_wcml_multi_currency_ajax_actions_filter( $actions ){
		$actions[] = 'cozycorner_ajax_search';
		$actions[] = 'cozycorner_load_quickshop_content';
		$actions[] = 'cozycorner_update_cart_quantity';
		$actions[] = 'cozycorner_load_product_added_to_cart';
		$actions[] = 'ts_get_product_content_in_category_tab';
		$actions[] = 'ts_elementor_lazy_load';
		$actions[] = 'ts_add_to_wishlist';
		$actions[] = 'ts_remove_from_wishlist';
		$actions[] = 'ts_compare_fragments';
		$actions[] = 'ts_frequently_bought_together_fragments';
		return $actions;
	}
}

if( !function_exists('cozycorner_wpml_language_selector') ){
	function cozycorner_wpml_language_selector(){
		if( class_exists('SitePress') ){
			do_action('wpml_add_language_selector');
		}
		else{
			do_action('cozycorner_header_language_switcher'); /* Allow use another language switcher */
		}
	}
}