<?php
//Code to empty cart on 'add to cart' if URL with button includes 'special-offer'
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'special-offer') !== false) {
   add_filter( 'woocommerce_add_to_cart_validation', 'remove_cart_item_before_add_to_cart', 20, 3 );
function remove_cart_item_before_add_to_cart( $passed, $product_id, $quantity ) {
    if( ! WC()->cart->is_empty())
        WC()->cart->empty_cart();
    return $passed;
}
} else {
    return;
}
//End empty cart code
?>
