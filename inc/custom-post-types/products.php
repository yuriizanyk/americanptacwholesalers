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

function wcl_register_state_taxonomy() {
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
add_action('init', 'wcl_register_state_taxonomy');

// Add state column
function wcl_add_product_state_column($columns) {
    $columns['state'] = __('State', 'textdomain'); 
    return $columns;
}
add_filter('manage_product_posts_columns', 'wcl_add_product_state_column');

function wcl_fill_product_state_column($column, $post_id) {
    if ($column === 'state') {
        $terms = get_the_terms($post_id, 'state');
        if (!empty($terms) && !is_wp_error($terms)) {
            $states = wp_list_pluck($terms, 'name'); 
            echo esc_html(implode(', ', $states));
        } else {
            echo '—';
        }
    }
}
add_action('manage_product_posts_custom_column', 'wcl_fill_product_state_column', 10, 2);

// Add state filter
function wcl_product_filter_by_state() {
    global $typenow;

    if ($typenow === 'product') {
        $taxonomy = 'state';
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);

        wp_dropdown_categories([
            'show_option_all' => sprintf(__('All %s', 'textdomain'), $info_taxonomy->label),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => false,
        ]);
    }
}
add_action('restrict_manage_posts', 'wcl_product_filter_by_state');

// Convert state filter
function wcl_convert_state_filter_to_query($query) {
    global $pagenow;
    $taxonomy = 'state';
    $q_vars   = &$query->query_vars;

    if (
        $pagenow === 'edit.php'
        && isset($q_vars['post_type'])
        && $q_vars['post_type'] === 'product'
        && isset($_GET[$taxonomy]) 
        && is_numeric($_GET[$taxonomy]) 
        && $_GET[$taxonomy] != 0
    ) {
        $term = get_term_by('id', $_GET[$taxonomy], $taxonomy);
        if ($term) {
            $q_vars[$taxonomy] = $term->slug;
        }
    }
}
add_filter('parse_query', 'wcl_convert_state_filter_to_query');
