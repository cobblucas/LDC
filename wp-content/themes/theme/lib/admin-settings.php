<?php

use Roots\Sage\Assets;


/**
 * CUSTOMIZE ADMIN COLOR SCHEME
 */

//remove default color schemes for all users

//remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

//new color schemes for backend based on theme colors

function additional_admin_color_schemes() {
    //Get the theme directory
    $theme_dir = get_template_directory_uri() . DIST_DIR;
 
    //BBpress
    wp_admin_css_color( 'bbcustom', __( 'Blackbaud Custom' ),
        $theme_dir . '/styles/admin.css'
    );
}
add_action('admin_init', 'additional_admin_color_schemes');


//set the default admin color to all new registered users.

function set_default_admin_color($user_id) {
	$args = array(
		'ID' => $user_id,
		'admin_color' => 'bbcustom'
	);
	wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');



/**
 * CUSTOMIZE ADMIN LOGIN PAGE
 */

// Add Admin Logo
//if (function_exists('get_field')) {
function my_login_logo() { ?>
          <?php
                   
            if(function_exists('get_field')) {
              $image = get_field('logo_retina', 'option'); 
            }
            $height = $image['sizes'][ $size . '-height' ];
            $size = 'large';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
          ?>
    <style type="text/css">
        body.login {background-color:<?php the_field("admin_bg_clr", "option"); ?>;}
        body.login div#login h1 a {
            background-image: url(<?php echo $thumb; ?>);
            background-position: 50%;
            background-size:contain;
            height:<?php echo $height; ?>px;
            max-width:<?php echo $width; ?>px;
            width:100%; 
        }
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { 
           body.login div#login h1 a { 
              background-image: url(<?php the_field("logo_retina", "option"); ?>);
              background-position: 50%;
              background-size:contain;
              max-width:<?php echo $width; ?>px;
           }
        }
    </style>
<?php } 
add_action( 'login_enqueue_scripts', 'my_login_logo' );
//}
// CUSTOM ADMIN LOGIN LOGO LINK
 
function change_wp_login_url() 
{
    echo '';  // OR ECHO YOUR OWN URL
}
add_filter('login_headerurl', 'change_wp_login_url');
 
// CUSTOM ADMIN LOGIN LOGO & ALT TEXT
 
function change_wp_login_title() 
{
    echo ''; // OR ECHO YOUR OWN ALT TEXT
}
add_filter('login_headertitle', 'change_wp_login_title');
