
//Get URL and only run function if URL contains the text 'special-offer'
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'special-offer') !== false) {

   add_action( 'woocommerce_add_to_cart', 'check_product_added_to_cart', 10, 6 );

   function check_product_added_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {

    // Set HERE your targeted product ID
    $target_product_id = 4956;    
	
    // Set HERE the  product ID to remove
    $item_id_to_remove = 4567;    

    // Initialising some variables
    $has_item = false;
    $is_product_id = false;

    foreach( WC()->cart->get_cart() as $key => $item ){
        // Check if the item to remove is in cart
        if( $item['product_id'] == $item_id_to_remove ){
            $has_item = true;
            $key_to_remove = $key;
        }

        // Check if we add to cart the targeted product ID
        if( $product_id == $target_product_id ){
            $is_product_id = true;
        }
    }
	
	
    if( $has_item && $is_product_id ){
        WC()->cart->remove_cart_item($key_to_remove);

    
	}
}



} else {
    return;
}
