<?php
// Register Sidebars
function dark_footer_sidebars() {

    $args = array(
        'id'            => 'first-sidebar-footer',
        'class'         => 'first-sidebar-dark-footer',
        'name'          => 'Left sidebar in footer',
        'before_title'  => '<div class="title-sidebar-dark">',
        'after_title'   => '</div>',
        'before_widget' => '<div class="widget-sidebar-dark">',
        'after_widget'  => '</div>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'second-sidebar-footer',
        'class'         => 'second-sidebar-dark-footer',
        'name'          => 'Left-center sidebar in footer',
        'before_title'  => '<div class="title-sidebar-dark">',
        'after_title'   => '</div>',
        'before_widget' => '<div class="widget-sidebar-dark">',
        'after_widget'  => '</div>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'third-sidebar-footer',
        'class'         => 'third-sidebar-dark-footer',
        'name'          => 'Right-center sidebar in footer',
        'before_title'  => '<div class="title-sidebar-dark">',
        'after_title'   => '</div>',
        'before_widget' => '<div class="widget-sidebar-dark">',
        'after_widget'  => '</div>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'fourth-sidebar-footer',
        'class'         => 'fourth-sidebar-dark-footer',
        'name'          => 'Right sidebar in footer',
        'before_title'  => '<div class="title-sidebar-dark">',
        'after_title'   => '</div>',
        'before_widget' => '<div class="widget-sidebar-dark">',
        'after_widget'  => '</div>',
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'dark_footer_sidebars' );