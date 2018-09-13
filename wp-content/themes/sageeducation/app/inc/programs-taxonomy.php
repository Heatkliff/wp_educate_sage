<?php
// Register Custom Taxonomy
function programs_taxonomy() {

    $labels = array(
        'name'                       => 'Program',
        'singular_name'              => 'Programs',
        'menu_name'                  => 'Programs',
        'all_items'                  => 'All Programs',
        'parent_item'                => 'Parent Program',
        'parent_item_colon'          => 'Parent Program:',
        'new_item_name'              => 'New Program Name',
        'add_new_item'               => 'Add New Program',
        'edit_item'                  => 'Edit Program',
        'update_item'                => 'Update Program',
        'view_item'                  => 'View Program',
        'separate_items_with_commas' => 'Separate Programs with commas',
        'add_or_remove_items'        => 'Add or remove Programs',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Programs',
        'search_items'               => 'Search Programs',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No Programs',
        'items_list'                 => 'Programs list',
        'items_list_navigation'      => 'Programs list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'programs', array( 'courses_type' ), $args );

}
add_action( 'init', 'programs_taxonomy', 0 );