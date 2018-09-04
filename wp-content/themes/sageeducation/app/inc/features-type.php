<?php
// Register Custom Post Type
function custom_post_features() {

    $labels = array(
        'name'                  => 'Features',
        'singular_name'         => 'Features',
        'menu_name'             => 'Features',
        'name_admin_bar'        => 'Admin',
        'archives'              => 'Features Archives',
        'attributes'            => 'Features Attributes',
        'parent_item_colon'     => '',
        'all_items'             => 'All Items',
        'add_new_item'          => 'Add New Item',
        'add_new'               => 'Add New',
        'new_item'              => 'New Features',
        'edit_item'             => 'Edit Features',
        'update_item'           => 'Update Item',
        'view_item'             => 'View Features',
        'view_items'            => 'View Features',
        'search_items'          => 'Search Features',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Features',
        'uploaded_to_this_item' => 'Uploaded to this Features',
        'items_list'            => 'Features list',
        'items_list_navigation' => 'Features list navigation',
        'filter_items_list'     => 'Filter features list',
    );
    $rewrite = array(
        'slug'                  => 'features',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => 'Features',
        'description'           => 'Features post',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'https://bukmeker-obzor.com/wp-content/plugins/bets/images/grey.png',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'post_features', $args );

}
add_action( 'init', 'custom_post_features', 0 );