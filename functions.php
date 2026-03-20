<?php
function gametechxd_files() {
    wp_enqueue_style('gametechxd_main', get_stylesheet_uri());
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    wp_enqueue_script('font_awesome', '//kit.fontawesome.com/ef3b619be6.js');
}

add_action('wp_enqueue_scripts', 'gametechxd_files');

function gametechxd_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('excerpt');
    add_post_type_support( 'review', 'excerpt' );
}

add_action('setup_theme', 'gametechxd_features');

function gametechxd_post_types() {
    register_post_type('news', array(
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'News',
      'add_new_item' => 'Create a News',
      'edit_item' => 'Edit New',
      'all_items' => 'All News',
      'singular_name' => 'New'
    ),
    'menu_icon' => 'dashicons-media-document'
  ));

    register_post_type('affiliate', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Affiliate Links',
            'add_new_item' => 'Create a Affiliate Link',
            'edit_item' => 'Edit Affiliate Link',
            'all_items' => 'All Affiliate Links',
            'singular_name' => 'Affiliate Link'
        ),
        'menu_icon' => 'dashicons-admin-links'
    ));

    register_post_type('review', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Reviews',
            'add_new_item' => 'Create a Review',
            'edit_item' => 'Edit Review',
            'all_items' => 'All Reviews',
            'singular_name' => 'Review'
        ),
        'menu_icon' => 'dashicons-star-half'
    ));

    register_post_type('guide', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Tips & Guides',
            'add_new_item' => 'Create a Tips & Guides',
            'edit_item' => 'Edit Tip & Guide',
            'all_items' => 'All Tips & Guides',
            'singular_name' => 'Guide'
        ),
        'menu_icon' => 'dashicons-games'
    ));

}

add_action('init', 'gametechxd_post_types'); 