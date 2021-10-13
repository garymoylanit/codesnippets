<?php

$sku = 'ITEM001';
$qty = 1;

// Get product_id from SKU — returns null if not found
$product_id = wc_get_product_id_by_sku( $sku );

// Process if product found
if ( $product_id != null ) {
    
    // Check for negative stock (backorders etc.) and set to 0
    if ( $qty <= 0 ) {
        $qty = 0;
    }
    
    // Set up WooCommerce product object
    $product = wc_get_product( $product_id );
    
    // Make changes to stock quantity and save
    $product->set_manage_stock( true );
    $product->set_stock_quantity( $qty );
    $product->save();

}
