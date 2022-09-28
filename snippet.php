if (!function_exists( 'evolution_hide_price_add_cart_not_logged_in' ) ) :
 /**
  * Preise nur für registrierte und eingeloggte User anzeigen
  */
 
function evolution_hide_price_add_cart_not_logged_in() { 
    
if ( !is_user_logged_in() ) {

 remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );  
 add_action( 'woocommerce_single_product_summary', 'print_login_to_see', 31 );
 add_action( 'woocommerce_after_shop_loop_item', 'print_login_to_see', 11 );
    }
}
add_action('init', 'evolution_hide_price_add_cart_not_logged_in');

/**
 * Zeigt einen Login-Link mit Message an
 */
function evolution_print_login_to_see() {
    
echo '<a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __('Logge Dich ein, um die Preise zu sehen', 'theme_name') . '</a>';
    
}
endif;
