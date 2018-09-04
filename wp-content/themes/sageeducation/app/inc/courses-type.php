<?php
// Register Custom Post Type
function courses_post_type() {

    $labels = array(
        'name'                  => 'Courses',
        'singular_name'         => 'Courses',
        'menu_name'             => 'Courses',
        'name_admin_bar'        => 'Courses',
        'archives'              => 'Courses Archives',
        'attributes'            => 'Courses Attributes',
        'parent_item_colon'     => 'Courses',
        'all_items'             => 'All Courses',
        'add_new_item'          => 'Add New Course',
        'add_new'               => 'Add New',
        'new_item'              => 'New Course',
        'edit_item'             => 'Edit Course',
        'update_item'           => 'Update Course',
        'view_item'             => 'View Course',
        'view_items'            => 'View Courses',
        'search_items'          => 'Search Course',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into Course',
        'uploaded_to_this_item' => 'Uploaded to this Course',
        'items_list'            => 'Courses list',
        'items_list_navigation' => 'Courses list navigation',
        'filter_items_list'     => 'Filter Courses list',
    );
    $args = array(
        'label'                 => 'Courses',
        'description'           => 'Courses type post',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhcxGoNjJHqFYhNVGUJfCHbv6OBJJ4v-Xi1_Tcuan2o7p6DwEomQ',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'courses_type', $args );

}
add_action( 'init', 'courses_post_type', 0 );