<?php

/**
 *  This is the Blackbaud's custom dashboard
 *  1 - Sets up the branding logo in the admin bar - uses the blackbaud favicon + add any custom styles for the dashboard here
 *  2 - Sets up the full branding logo on top of the dashboard - uses the blackbaud logo found in /assets/images
 *  3 - Customizes the dasboard footer
 *  4 - Remove default widgets, help tab and screen options
 *  5 - Custom Welcome Panel
 *  6 - Custom Widget => NPengage Feed
 *  7 - Blackbaud Videos - youtube channel latest
 *  8 - 
 *
 *
 *
 */


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  1- Blackbaud Admin Bar Logo
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    //hook the administrative header output
    add_action('admin_head', 'my_custom_logo');

    function my_custom_logo() {
      echo '
      <style type="text/css">
      #wp-admin-bar-wp-logo { background-image: url('.get_template_directory_uri().'/dist/images/favicon.ico) !important; width:30px; height:30px; background-size:30px; }
      #wp-admin-bar-wp-logo:hover .ab-item {background:none !important;}
      #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {color:transparent;}
      .videoWrapper { position: relative; padding-bottom: 56.25%; height: 0; }
      .videoWrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
        #dashboard-widgets h3 {font-weight:bold !important;}
      }
      </style>
      ';
    }



/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  2- Blackbaud Branded Dashboard Logo
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


    // CUSTOM ADMIN DASHBOARD HEADER LOGO
     
    function custom_admin_logo()
    {
        echo 
        '<style type="text/css">
          body.wp-admin.index-php #wpbody-content .wrap h1 { 
            background-image: url('.get_template_directory_uri().'/dist/images/logo@2x.png) !important; 
            background-repeat:no-repeat;
            width:100%;
            height:50px;
            background-size:250px;
            color:transparent;
            position:relative;
            float:left;
          }
          body.wp-admin.index-php #wpbody-content .wrap h2 a {
            left:0;
            margin-top:115px;
            top:0;
            position:absolute;
          }
          
          @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { 
           body.wp-admin.index-php #wpbody-content .wrap h1 { 
              background-image: url('.get_template_directory_uri().'/dist/images/logo@2x.png);
           }
        }
        </style>';
    }
    add_action('admin_head', 'custom_admin_logo');




/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  3- Blackbaud branded Dashboard Footer
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    // Admin footer modification
 
      function remove_footer_admin () 
      {
          echo '<span id="footer-thankyou">Developed by <a href="http://blackbaud.com" target="_blank">Blackbaud</a></span>';
      }
      add_filter('admin_footer_text', 'remove_footer_admin');



/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  4- Remove default widgets and screen options
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */
  //removes defaults widgets
    function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8


      // bbpress
        remove_meta_box( 'bbp-dashboard-right-now', 'dashboard', 'normal');
      
      // yoast seo
        remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal');
      
      // gravity forms
        remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal');
     
      
    }
    add_action( 'admin_init', 'remove_dashboard_meta' );


    // removes Help tab
    add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
    }

    //removes Screen options
//     add_filter('screen_options_show_screen', '__return_false');

/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  5- Custom Welcome Panel
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

      
      function rc_my_welcome_panel() { ?>
    
      <script type="text/javascript">
      /* Hide default welcome message */
        jQuery(document).ready( function($) 
        {
          $('div.welcome-panel-content, .welcome-panel-close').hide();
        });
      </script>
      <?php wp_nonce_field( 'welcome-panel-nonce', 'welcomepanelnonce', true ); ?>
    <div class="custom-welcome-panel-content">
      <h3><?php _e( 'Welcome to your Blackbaud Website!' ); ?></h3>
      <p class="about-description"><?php _e( 'We’ve assembled some links to get you started:' ); ?></p>
      <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
          <h4><?php _e( 'Next Steps' ); ?></h4>
          <ul>
          <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
          <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
          <?php else : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
          <?php endif; ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
          </ul>
        </div>
        <div class="welcome-panel-column">
          <h4><?php _e( 'More Actions' ); ?></h4>
          <ul>
            <li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
            
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Watch Training Videos' ) . '</a>', __( '/wp-admin/admin.php?page=wp101' ) ); ?></li>
            
          </ul>
        </div>
        <div class="welcome-panel-column welcome-panel-last">
          <h4><?php _e( "Can we help?" ); ?></h4>
          <a class="button button-primary button-hero" href="https://www.blackbaud.com/support/needhelp.aspx" target="_blank"><?php _e( 'Get help from Blackbaud' ); ?></a>
            <p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
        </div>
      </div>
    </div>


    <?php }
    add_action( 'welcome_panel', 'rc_my_welcome_panel' );

    add_action( 'load-index.php', 'show_welcome_panel' );

      function show_welcome_panel() {
          $user_id = get_current_user_id();

          if ( 1 != get_user_meta( $user_id, 'show_welcome_panel', true ) )
              update_user_meta( $user_id, 'show_welcome_panel', 1 );
      }


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  6- Custom Widget - NPengage feed
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */

    add_action('wp_dashboard_setup', 'npengage_dashboard_widgets');
 
    function npengage_dashboard_widgets() {
      global $wp_meta_boxes;
      wp_add_dashboard_widget('custom_help_widget', 'Get ENGAGED', 'custom_dashboard_help');
    } 

    function custom_dashboard_help() {
      echo '<p><a href="http://npengage.com" target="_blank">
<img class="logo" alt="npENGAGE: Home" src="'.get_template_directory_uri().'/dist/images/npengage-logo.png">
</a></p>
      <p>Catapult your cause with innovative thought leadership, trends and best practices from the npENGAGE blogs.</p>
      <p>npENGAGE is the go to resource for nonprofits looking to advance their mission through fundraising, marketing, social media, management, technology and more.</p>
      <script language="JavaScript" src="http://www.feedroll.com/rssviewer/feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2Fnpengage&chan=y&desc=150>1&num=5&utf=y"  charset="UTF-8" type="text/javascript"></script>
            <noscript><a href="http://www.feedroll.com/rssviewer/feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2Fnpengage&chan=y&desc=1&utf=y&html=y">View RSS feed</a></noscript>
            <p><a class="button button-primary button-hero" href="http://npengage.com" target="_blank">Get Engaged</a></p>
            ';
    }




/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  7- Custom Widget - Blackbaud Videos
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */



  
add_action( 'wp_dashboard_setup', 'video_dashboard_setup' );
 function video_dashboard_setup() {
     wp_add_dashboard_widget(
         'video-dashboard-widget',
         'Watch Nonprofit Videos',
         'video_dashboard_content',
         $control_callback = null
     );
 }
  
 function video_dashboard_content() {
     echo '<p>Learn nonprofit best practices and news a la video on through the Blackbaud YouTube channel.</p>
     <div class="videoWrapper"><iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=blackbaudinc" width="480" height="400" frameBorder="0"></iframe></div>
     <p><a class="button button-primary button-hero" href="https://www.youtube.com/user/blackbaudinc" target="_blank">Watch More Videos</a></p>';
 }



/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  8- Custom Widget - BB Commmunity
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */



  
add_action( 'wp_dashboard_setup', 'community_dashboard_setup' );
 function community_dashboard_setup() {
     wp_add_dashboard_widget(
         'community-dashboard-widget',
         'Join the Conversation',
         'community_dashboard_content',
         $control_callback = null
     );
 }
  
 function community_dashboard_content() {
     echo '<p><img src="'.get_template_directory_uri().'/dist/images/blackbaud-community.png" /></p><p><h3>Have a question? Want to share a great idea? Be part of the conversation.</h3><br/><a class="button button-primary button-hero" href="https://community.blackbaud.com/home" target="_blank">Join the Community</a></p>';
 }               


/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  9- Custom Widget - BB Facebook Feed
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */



  
add_action( 'wp_dashboard_setup', 'fbfeed_dashboard_setup' );
 function fbfeed_dashboard_setup() {
     wp_add_dashboard_widget(
         'bbfacebook-dashboard-widget',
         'Join our Facebook Community',
         'fbfeed_dashboard_content',
         $control_callback = null
     );
 }
  
 function fbfeed_dashboard_content() {
     echo '
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));
        </script>
     <p>Connect with more than 10,000 nonprofit enthusiasts like you on the Blackbaud Facebook page.</p>
     <div class="fb-page" data-href="https://www.facebook.com/blackbaud" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true" data-width="500"></div>
     <p><a class="button button-primary button-hero" href="https://www.facebook.com/blackbaud" target="_blank">Connect on Facebook Page</a></p>';
 }

 /*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  10- Custom Widget -  BBinteractive Twitter
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


// add_action( 'wp_dashboard_setup', 'bbtwitter_dashboard_setup' );
//   function bbtwitter_dashboard_setup() {
//       wp_add_dashboard_widget(
//           'bbtwitter-dashboard-widget',
//           'Blackbaud Interactive',
//           'bbtwitter_dashboard_content',
//           $control_callback = null
//       );
//   }
  
//   function bbtwitter_dashboard_content() {
//       echo '<p>The latest and greatest in online, social, mobile and more from the Blackbaud team.</p>
//             <a class="twitter-timeline" data-link-color="#8cbe4f" data-height="350" href="https://twitter.com/BBInteractive">Tweets by blackbaud</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
//             <p><a class="button button-primary button-hero" href="https://twitter.com/bbinteractive" target="_blank">Connect on Twitter</a></p>
//             ';
//   }
                  

/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  11- Custom Widget -  Blackbaud Twitter
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


add_action( 'wp_dashboard_setup', 'bbmaintwitter_dashboard_setup' );
  function bbmaintwitter_dashboard_setup() {
      wp_add_dashboard_widget(
          'bbmaintwitter-dashboard-widget',
          'Blackbaud Twitter Feed',
          'bbmaintwitter_dashboard_content',
          $control_callback = null
      );
  }
  
  function bbmaintwitter_dashboard_content() {
      echo '<p>We are the world’s leading cloud software company powering social good. We are here to help #goodtakeover the world.</p>
      <a class="twitter-timeline" data-link-color="#8cbe4f" data-height="350" href="https://twitter.com/blackbaud">Tweets by blackbaud</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      <p><a class="button button-primary button-hero" href="https://twitter.com/blackbaud" target="_blank">Connect on Twitter</a></p>
      ';
  }
   
/*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  
  12- Custom Widget -  Blackbaud Support Twitter
=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*  */


add_action( 'wp_dashboard_setup', 'bbsupporttwitter_dashboard_setup' );
  function bbsupporttwitter_dashboard_setup() {
      wp_add_dashboard_widget(
          'bbsupporttwitter-dashboard-widget',
          'Blackbaud Support Twitter Feed',
          'bbsupporttwitter_dashboard_content',
          $control_callback = null
      );
  }
  
  function bbsupporttwitter_dashboard_content() {
      echo '<p>Have a Blackbaud product question? We have the answer. Check out Knowledgebase: <a href="http://www.kb.blackbaud.com" target="_blank">http://www.kb.blackbaud.com</a></p>
      <a class="twitter-timeline" data-link-color="#8cbe4f" data-height="350" href="https://twitter.com/BBSupport">Tweets by BBSupport</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      <p><a class="button button-primary button-hero" href="https://twitter.com/BBSupport" target="_blank">Connect on Twitter</a></p>
      ';
  }