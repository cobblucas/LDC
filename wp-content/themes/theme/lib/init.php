<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'utility_navigation' => __('Utility Navigation', 'sage'),
    'social_navigation' => __('Social Media Icons', 'sage'),
    'sidebar_navigation' => __('Sidebar Navigation', 'sage'),
    'action_navigation' => __('Action Navigation', 'sage'),
    'footer_admin_navigation' => __('Footer Admin Navigation', 'sage'),
    'footer_sitemap_navigation' => __('Footer Sitemap Navigation', 'sage')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');


  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/editor-style.css'));

  /**
   * Register sidebars
   */
  function widgets_init() {

    register_sidebar(array(
    'name'          => __('Sidebar Single Posts', 'sage'),
    'id'            => 'sidebar-posts',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ));

    register_sidebar(array(
    'name'          => __('Sidebar Post Category', 'sage'),
    'id'            => 'sidebar-category',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ));


    register_sidebar(array(
    'name'          => __('Sidebar Single Events', 'sage'),
    'id'            => 'sidebar-events',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ));

    register_sidebar(array(
    'name'          => __('Sidebar Search Page', 'sage'),
    'id'            => 'sidebar-search',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ));

  }
  add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

