<?php

function wcl_register_post_type_product() {
    $args = [
        'rewrite'       => [ 'slug' => 'products' ],
        'has_archive'   => true,
        'show_in_rest'  => false,
        'menu_icon' => 'dashicons-products',
    ];

    wcl_register_post_type( 'Product', 'Products', $args);
}

add_action( 'init', 'wcl_register_post_type_product' );

function register_state_taxonomy() {
    $labels = [
        'name' => 'States',
        'singular_name' => 'State',
        'search_items' => 'Search States',
        'all_items' => 'All States',
        'edit_item' => 'Edit State',
        'update_item' => 'Update State',
        'add_new_item' => 'Add New State',
        'new_item_name' => 'New State Name',
        'menu_name' => 'States',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'state'],
    ];

    register_taxonomy('state', ['product'], $args);
}
add_action('init', 'register_state_taxonomy');