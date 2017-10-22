<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = array(
    'lib/utils.php',                        // Utility functions
    'lib/init.php',                         // Initial theme setup and constants
    'lib/wrapper.php',                      // Theme wrapper class
    'lib/conditional-tag-check.php',        // ConditionalTagCheck class
    'lib/config.php',                       // Configuration
    'lib/assets.php',                       // Scripts and stylesheets
    'lib/titles.php',                       // Page titles
    'lib/extras.php',                       // Custom functions
    'lib/customizer.php',                   // Theme Options
    'lib/nav.php',                          // Custom nav modifications
    'lib/gallery.php',                      // Custom [gallery] modifications
    'lib/cpt.php',                          // Custom Post Type
    'lib/admin-settings.php',               // Admin customizations
    'lib/admin-dashboard.php',              // Admin dashboard
    'lib/custom-widgets.php',               // Custom Widgets
    'lib/breadcrumbs.php',                  // Breadcrumbs
    'lib/theme-updater.php',                // Blackbaud's automatic theme updater
    'templates/vendors/bootstrap-pagination.php' // Bootstrap pagination
);


# Include dependencies and libraries.
foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);


# Advanced Custom Fields filters.
function acf_location_rules_types($choices) {
    $choices['Basic']['user'] = 'User';
    return $choices;
}

function acf_location_rules_operators($choices) {
    $choices['<'] = 'is less than';
    $choices['>'] = 'is greater than';
    return $choices;
}

function acf_location_rules_values_user($choices) {
    $users = get_users();
    if ($users) {
        foreach ($users as $user) {
            $choices[$user->data->ID] = $user->data->display_name;
        }
    }
    return $choices;
}

function acf_location_rules_match_user($match, $rule, $options) {
    $current_user = wp_get_current_user();
    $selected_user = (int) $rule['value'];
    if ($rule['operator'] == "==") {
        $match = ($current_user->ID == $selected_user);
    } elseif ($rule['operator'] == "!=") {
        $match = ($current_user->ID != $selected_user);
    }
    return $match;
}

function fix_gmaps_api_key() {
	if(mb_strlen(acf_get_setting("google_api_key")) <= 0){
		acf_update_setting("google_api_key", "AIzaSyAruQyoaby0Hx_3fMmzUrC-Vt9SND4Qr3A");
	}
}
add_action( 'admin_enqueue_scripts', 'fix_gmaps_api_key' );

# WordPress database filters.
if (function_exists('get_field') && get_field('hide_acf', 'option')) {
    define( 'ACF_LITE', true );
}

add_filter('acf/location/rule_types', 'acf_location_rules_types');
add_filter('acf/location/rule_operators', 'acf_location_rules_operators');
add_filter('acf/location/rule_values/user', 'acf_location_rules_values_user');
add_filter('acf/location/rule_match/user', 'acf_location_rules_match_user', 10, 3);

add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');
add_filter('login_errors',create_function('$a', "return null;"));



function my_mce_buttons_2($buttons) {
  /**
   * Add in a core button that's disabled by default
   */
  $buttons[] = 'superscript';
  $buttons[] = 'subscript';

  return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

add_action('acf/input/admin_head', 'my_acf_admin_head');

function my_acf_admin_head() {

    ?>
    <script type="text/javascript">
    (function($) {

        $(document).ready(function(){

            $('.acf-field-57b23bd83f94b .acf-input').append( $('#postdivrich') );

        });

    })(jQuery);
    </script>
    <style type="text/css">
        .acf-field #wp-content-editor-tools {
            background: transparent;
            padding-top: 0;
        }
    </style>
    <?php

}

add_image_size( 'banner-img', 1400, false ); // (cropped)
add_image_size( 'home-features', 760, 425, true ); // (cropped) - ratio that will make sure a photo will have same size as possible as an video iframe
add_image_size( 'grid-template', 760, 760, true ); // (cropped)
// add_image_size('w800', 800, 9999);

add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
        'home-features' => 'Medium',
        'banner-img' => 'Large',
        'grid-template' => 'Square',
    );
    return array_merge( $sizes, $custom_sizes );
}


function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

  $style_formats = array(
    // Each array child is a format with it's own settings
    // array(
    //   'title' => 'Featured Block',
    //   'block' => 'div',
    //   'classes' => 'featured-block',
    //   'wrapper' => true,
    // ),
    array(
      'title' => 'Primary Button',
      'selector' => 'a',
      'classes' => 'btn btn-primary',
      'wrapper' => false,
    ),
    array(
      'title' => 'Alt Button',
      'selector' => 'a',
      'classes' => 'alt-button',
      'wrapper' => false,
    ),
    array(
      'title' => 'Brand Color Bold text',
      'inline' => 'span',
      'classes' => 'bold-brand',
      'wrapper' => false,
    ),
    array(
      'title' => 'Sidebar Block Background',
      'block' => 'div',
      'classes' => 'sidebar-block',
      'wrapper' => true,
    ),
    array(
      'title' => 'Small Width Centered Text',
      'block' => 'div',
      'classes' => 'bbi-medium-cont',
      'wrapper' => true,
    ),
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init',  __NAMESPACE__ . '\\my_mce_before_init_insert_formats' );

add_shortcode('wpbsearch', 'get_search_form');
function wpbsearchform( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" placeholder="Type your search phrase here" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    <i class="fa fa-search"></i>

    </div>
    </form>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');

// function get_excerpt_by_id($post_id){
//   $the_post = get_post($post_id); //Gets post ID
//   $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
//   $excerpt_length = 45; //Sets excerpt length by word count
//   $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
//   $words = explode(' ', $the_excerpt, $excerpt_length + 1);
//   if(count($words) > $excerpt_length) :
//   array_pop($words);
//   array_push($words, '…');
//   $the_excerpt = implode(' ', $words);
//   endif;
//   $the_excerpt = '<p>' . $the_excerpt . '</p>';
//   return $the_excerpt;
// }

function km_add_unfiltered_html_capability_to_editors( $caps, $cap, $user_id ) {
  if ( 'unfiltered_html' === $cap && user_can( $user_id, 'site-admin' ) ) {
    $caps = array( 'unfiltered_html' );
  }
  return $caps;
}
add_filter( 'map_meta_cap', 'km_add_unfiltered_html_capability_to_editors', 1, 3 );

/*
 *
 * Register Sidebars
 */

function sidebar_widgets_init() { //Register the default sidebar
   register_sidebar( array(
   'name' => 'Sidebar',
   'id' => 'default-sidebar',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h1 class="widget-title">',
   'after_title' => '</h1>',
   ) );
   include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
   if (is_plugin_active('advanced-custom-fields-pro/acf.php')){ //Check to see if ACF is installed
   if (get_field('sidebars','option')){
   while (has_sub_field('sidebars','option')){ //Loop through sidebar fields to generate custom sidebars
   $s_name = get_sub_field('sidebar_name','option');
   $s_id = str_replace(" ", "-", $s_name); // Replaces spaces in Sidebar Name to dash
   $s_id = strtolower($s_id); // Transforms edited Sidebar Name to lowercase
   register_sidebar( array(
   'name' => $s_name,
   'id' => $s_id,
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h1 class="widget-title">',
   'after_title' => '</h1>',
   ) );
   };
   };
   };
};

add_action( 'widgets_init', 'sidebar_widgets_init' );

/*
 * ACF Sidebar Loader
 */

function my_acf_load_sidebar( $field )
{
 // reset choices
 $field['choices'] = array();
 // $field['choices']['default-sidebar'] = 'Default Sidebar';
 // $field['choices']['none'] = 'No Sidebar';

 $field['choices']['sidebar-posts'] = 'Sidebar Single Posts';
 $field['choices']['sidebar-category'] = 'Sidebar Post Category';
 $field['choices']['sidebar-events'] = 'Sidebar Single Events';
 $field['choices']['sidebar-search'] = 'Sidebar Search Page';

 // load repeater from the options page
 if(get_field('sidebars', 'option'))
 {
 // loop through the repeater and use the sub fields "value" and "label"
 while(has_sub_field('sidebars', 'option'))
 {

 $label = get_sub_field('sidebar_name');
 $value = str_replace(" ", "-", $label);
 $value = strtolower($value);

$field['choices'][ $value ] = $label;

}
 }

 // Important: return the field
 return $field;
}

add_filter('acf/load_field/name=select_widgets_sidebar', 'my_acf_load_sidebar');


function custom_field_excerpt() {
  global $post;
  $text = get_sub_field('main_editor');
  if ( '' != $text ) {
    //$text = strip_shortcodes( $text );
    //$text = apply_filters('the_content', $text);
    //$text = str_replace(']]>', ']]>', $text);
   // $excerpt_length = 200; // 20 words
    //$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text );
  }
  return apply_filters('the_excerpt', $text);
}


// GET FEATURED IMAGE
function BBI_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function BBI_columns_head($defaults) {
    $defaults['bbi_featured_image'] = 'Featured Image';
    return $defaults;
}

// SHOW THE FEATURED IMAGE
function BBI_columns_content($column_name, $post_ID) {
    if ($column_name == 'bbi_featured_image') {
        $post_featured_image = BBI_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}

add_filter('manage_posts_columns', 'BBI_columns_head');
add_action('manage_posts_custom_column', 'BBI_columns_content', 10, 2);

/**
 * Custom WP gallery
 */
add_shortcode('gallery', 'my_gallery_shortcode');
function my_gallery_shortcode($attr) {
   $post = get_post();

  static $instance = 0;
  $instance++;

  if ( ! empty( $attr['ids'] ) ) {
      // 'ids' is explicitly ordered, unless you specify otherwise.
      if ( empty( $attr['orderby'] ) )
          $attr['orderby'] = 'post__in';
      $attr['include'] = $attr['ids'];
  }

  // Allow plugins/themes to override the default gallery template.
  $output = apply_filters('post_gallery', '', $attr);
  if ( $output != '' )
      return $output;

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if ( !$attr['orderby'] )
          unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
      'order'      => 'ASC',
      'orderby'    => 'menu_order ID',
      'id'         => $post->ID,
      'itemtag'    => 'li',
      'icontag'    => 'figure',
      'captiontag' => 'figcaption',
      'columns'    => 3,
      'size'       => 'thumbnail',
      'include'    => '',
      'exclude'    => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
      $orderby = 'none';

  if ( !empty($include) ) {
      $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

      $attachments = array();
      foreach ( $_attachments as $key => $val ) {
          $attachments[$val->ID] = $_attachments[$key];
      }
  } elseif ( !empty($exclude) ) {
      $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
      $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
      return '';

  if ( is_feed() ) {
      $output = "\n";
      foreach ( $attachments as $att_id => $attachment )

          $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
      return $output;
  }

  $itemtag = tag_escape($itemtag);
  $captiontag = tag_escape($captiontag);
  $icontag = tag_escape($icontag);
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) )
      $itemtag = 'div';
  if ( ! isset( $valid_tags[ $captiontag ] ) )
      $captiontag = 'figcaption';
  if ( ! isset( $valid_tags[ $icontag ] ) )
      $icontag = 'figure';

  $columns = intval($columns);
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery-{$instance}";

  $gallery_style = $gallery_div = '';
  if ( apply_filters( 'use_default_gallery_style', true ) )
      $gallery_style = "";
  $size_class = sanitize_html_class( $size );
  $gallery_div = "<div id='$selector' class='page-gallery gallery row fbx-instance'>";
  $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

  $i = 0;
  foreach ( $attachments as $id => $attachment ) {

      $link = wp_get_attachment_url($id, $size, false, false);
      $bbimg = wp_get_attachment_image($id, $size = 'grid-template', true) . "\n";

      $output .= "<div class='gallery-item col-xs-6 col-sm-3 col-md-2'>";
      $output .= '<a href="'. $link. '" class="foobox"><div class="imgWrap">';
      $output .= $bbimg;
      if ( $captiontag && trim($attachment->post_excerpt) ) {
          $output .= "
              <p class='gallery-caption hidden'>
              " . wptexturize($attachment->post_excerpt) . "
              </p>";
      }
      $output .= "</div></a></div>";
  }

  $output .= "
      </div>\n";

  return $output;
}


// ACF SEARCH FUNCTION
/**
* Extend WordPress search to include custom fields
*
* http://adambalee.com
*/

/**
* Join posts and postmeta tables
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
*/
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
* Modify the search query with posts_where
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
*/
function cf_search_where( $where ) {
    global $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
* Prevent duplicates
*
* http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
*/
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/**
* Enable Page Excerpts
*/
add_action('init', 'add_excerpt_pages');
function add_excerpt_pages() {
add_post_type_support( 'page', 'excerpt' );
}
