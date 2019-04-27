// Runs when an order item is added to the cart. 
// 'quantity' and 'assemblycost' are meta fields in wp_woocommerce_order_itemmeta
// calculated_field is stored in the same table. 

add_action( 'woocommerce_checkout_create_order_line_item', 'action_checkout_create_order_line_item_callback', 1000, 4 );
function action_checkout_create_order_line_item_callback( $item, $cart_item_key, $cart_item, $order ) {
    $quantity     = $item->get_meta('quantity');
    $assemblycost = $item->get_meta('assemblycost');
    if( isset($quantity) && isset($assemblycost) ) {
        $item->update_meta_data( 'calculated_field', $quantity * $assemblycost );
    }
}


// Sums all the calculated_field values in the order, and saves this as a meta item attached to the order

add_action( 'woocommerce_checkout_create_order', 'action_checkout_create_order_callback', 10, 2 );
function action_checkout_create_order_callback( $order, $data ) {
    $calculated_fields_sum = 0; // Initializing

    // Loop Through order items
    foreach ( $order->get_items() as $item ) {
        if( $value = $item->get_meta('calculated_field') ) {
            $calculated_fields_sum += $value;
        }
    }
    // Update order meta data
    if( $calculated_fields_sum > 0 ) {
        $item->update_meta_data( 'calculated_fields_sum', $calculated_fields_sum );
    }
}
