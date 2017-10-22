<?php

add_action( 'init', 'bbtheme_post_type' );
function bbtheme_post_type() {


if (function_exists('get_field') && get_field('testimonials', 'option')) {
   $args1 = array(
    'labels' => array(
      'name' => __( 'Testimonials' ),
      'singular_name' => __( 'Testimonial' )
    ),
    'public' => true,
    'exclude_from_search' => true,
    'menu_icon' => 'dashicons-editor-quote',
    'supports' => array( 'title', 'page-attributes' )
  );

  register_post_type( 'Testimonials', $args1);
}

if (function_exists('get_field') && get_field('misc_posts', 'option')) {
  $args2 = array(
    'labels' => array(
      'name' => __( 'Misc Posts' ),
      'singular_name' => __( 'Misc Post' )
    ),
    'public' => true,
    'exclude_from_search' => true,
    'menu_icon' => 'dashicons-admin-post',
    'supports' => array( 'title', 'page-attributes', 'thumbnail' )
  );

  register_post_type( 'Misc Posts', $args2);

  register_taxonomy( 'misc_post_category', array( 'miscposts' ), array(
    'hierarchical'      => true,
    //'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
  ) );

  add_action( 'restrict_manage_posts', 'my_filter_list' );
  function my_filter_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'miscposts' ) {
        wp_dropdown_categories( array(
            'show_option_all' => 'Sort by Category',
            'taxonomy' => 'misc_post_category',
            'name' => 'misc_post_category',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['misc_post_category'] ) ? $wp_query->query['misc_post_category'] : '' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => false,
            'hide_empty' => true,
        ) );
    }
  }
  add_filter( 'parse_query','perform_filtering' );
  function perform_filtering( $query ) {
    $qv = &$query->query_vars;
    if ( ( $qv['misc_post_category'] ) && is_numeric( $qv['misc_post_category'] ) ) {
        $term = get_term_by( 'id', $qv['misc_post_category'], 'misc_post_category' );
        $qv['misc_post_category'] = $term->slug;
    }
  }
}

if (function_exists('get_field') && get_field('engagement_section', 'option')) {
  $args3 = array(
      'labels' => array(
        'name' => __( 'Engagement Section' ),
        'singular_name' => __( 'Engagement Section' )
      ),
      'public' => true,
      'exclude_from_search' => true,
      'menu_icon' => 'dashicons-nametag',
      'supports' => array( 'title' )
    );

    register_post_type( 'Engagement Section', $args3);
}

  flush_rewrite_rules();
}