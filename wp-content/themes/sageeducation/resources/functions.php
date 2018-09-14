<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

define('ACF_EARLY_ACCESS', '5');

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);


add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

function load_more()
{
    $add_courses = "";
    $courses_in_page = array();
    $get_courses_in_page = get_field('dedicated_courses_posts', 'option');
    foreach ($get_courses_in_page as $course) {
        array_push($courses_in_page, $course->ID);
    }
    $all_courses = new WP_Query(
        array(
            'post__not_in' => $courses_in_page,
            'posts_per_page' => -1,
            'post_type' => 'courses_type',
        ));
    foreach ($all_courses->posts as $course) {
        $course_fields = get_field('fields_cources_post', $course->ID, 'option');
        $add_courses = $add_courses.course_post_output($course,$course_fields);
    }
    echo $add_courses;
}



function course_post_output($course, $course_fields)
{
    return '<div class="courses-pre-post">
    <div class="image-pre-post">
        <img src="'.get_the_post_thumbnail_url($course->ID, "medium").'" alt="">
    </div>
    <div class="title-pre-post">
        '.$course->post_title.'
    </div>
    <div class="short-text-pre-post">
        '.$course_fields["short_text_cources"] .'
    </div>
    <hr>
    <div class="time-pre-post">
        Time : '.$course_fields["time_field_cource"] .'
        <hr>
    </div>
    <div class="teacher-pre-post">
        Teacher : '.get_the_title($course_fields["teacher_field_cource"]).'
        <hr>
    </div>
    <div class="join-courses">
        <button type="button" class="btn btn-success">
            <a href="#">
                Join Now
            </a>
        </button>
    </div>
</div>
';
}

function get_all_teachers(){
    $returned_posts = [];
    $all_teachers = new WP_Query(
        array(
            'posts_per_page' => -1,
            'post_type' => 'teachers_type',
        ));
    foreach ($all_teachers->posts as $teacher) {
        $teacher_fields = get_field('position_teacher', $teacher->ID, 'option');
        array_push($returned_posts, ['post' => $teacher,'position'=>$teacher_fields]);
    }
    return $returned_posts;
}

function subscribe_send(){
    if( isset( $_POST) ){
        $email = $_POST['email'];
        $login = explode("@", $email)[0];
        $password = generateRandomString(8);
        wp_create_user($login, $password, $email);
    }
}

add_action('wp_ajax_subscribe_send', 'subscribe_send');
add_action('wp_ajax_nopriv_subscribe_send', 'subscribe_send');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function my_acf_init() {

    acf_update_setting('google_api_key', get_field('google_maps_api_key','option'));
}

add_action('acf/init', 'my_acf_init');
