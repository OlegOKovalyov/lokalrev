<?php
/**
 * Plugin Name: Ajax Cat
 * Description: Ajax подгрузка постов из категорий.
 * Author: FlexiIT
 * Author URI:
 * Plugin URI:
 */
add_action( 'wp_ajax_get_cat', 'ajax_show_cats_posts' );
add_action( 'wp_ajax_nopriv_get_cat', 'ajax_show_cats_posts' );
function ajax_show_cats_posts() {

    $args = [
        'exclude' => 1,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1,
    ];

    $category_id = [];
    if(isset($_POST['link']) && !empty($_POST['link'])) {
        $links = [];
        foreach($_POST['link'] as $link) {
            $links .= esc_attr($link) . ',';
        }

        $args['category'] = $links;
    }

    $posts = get_posts($args);

    if (!$posts) {
        die('Post not found');
    }

    include_once('ajax-template.php');
    wp_die();
}

add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {
    wp_enqueue_script( 'custom', plugins_url( 'custom.js', __FILE__ ), array( 'jquery' ) );

    wp_localize_script( 'custom', 'localizeScriptObject', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ) );
}