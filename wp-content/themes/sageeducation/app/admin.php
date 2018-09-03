<?php

namespace App;

/**
 * Include all functions from 'inc' part
 */
include_functions_file();

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});


/**
 * ACF Options Page
 *
 */

add_action( 'init', function () {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'title'      => 'Site Options',
            'capability' => 'manage_options',
        ) );
    }
} );

function get_this_theme_part(){
    return get_theme_root().'/'.wp_get_theme().'/';
}

function include_functions_file(){
    $dir = get_this_theme_part().'app/inc';
    $catalog = opendir($dir);

    while ($filename = readdir($catalog ))
    {
        if (stristr($filename, '.php')) {
            $filename = $dir . "/" . $filename;
            require_once $filename;
        }
    }
    closedir($catalog);
}