<?php


/**
 * CUSTOM FACEBOOK WIDGET
 */


// Creating the widget 
class bbi_facebook_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'bbi_facebook_widget', 

    // Widget name will appear in UI
    __('Facebook Widget', 'bbi_facebook_widget_domain'), 

    // Widget description
    array( 'description' => __( 'Widget to display a Facebook timeline', 'bbi_facebook_widget_domain' ), ) 
  );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  $url = apply_filters( 'widget_title', $instance['url'] );
  $widget_id = apply_filters( 'widget_title', $instance['widget_id'] );
  $widget_title = apply_filters( 'widget_title', $instance['title'] );

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $url ) )
  echo $args['before_title'] . $widget_title . $args['after_title']; ?>

 <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

 <div class="bb-widget-fb__wrap">
	<div class="bb-widget-fb__outer">
		<div class="fb-page" data-href="<?php echo $url; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true" data-width="500"></div>
	</div>
</div>
  
<?php echo $args['after_widget']; }
    
// Widget Backend 
public function form( $instance ) {
  if ( isset( $instance[ 'url' ] ) ) {
    $url = $instance[ 'url' ];
    $widget_title = $instance['title'];
  }

  // Widget admin form
  ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Facebook Account URL:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
  </p>
  <?php 
}
  
// Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
    $instance['title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
    return $instance;
  }
} // Class bbi_facebook_widget ends here

// Register and load the widget
function bbi_load_facebook_widget() {
  register_widget( 'bbi_facebook_widget' );
}
add_action( 'widgets_init', 'bbi_load_facebook_widget' );



/**
 * CUSTOM TWITTER WIDGET
 */

// Creating the widget 
class bbi_twitter_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'bbi_twitter_widget', 

// Widget name will appear in UI
__('Twitter Widget', 'bbi_twitter_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget to display a twitter timeline', 'bbi_twitter_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  $url = apply_filters( 'widget_title', $instance['url'] );
  $widget_title = apply_filters( 'widget_title', $instance['title'] );

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $url ) )
   echo $args['before_title'] . $widget_title . $args['after_title']; ?>

 
<a class="twitter-timeline" href="<?php echo $url; ?>" data-height="500" data-chrome="noheader nofooter noscrollbar"  data-tweet-limit=""></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php echo $args['after_widget']; }
    
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
$widget_title = $instance['title'];
}


// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Twitter Account URL:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
</p>
<?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
$instance['title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
return $instance;
}
} // Class bbi_twitter_widget ends here

// Register and load the widget
function bbi_load_twitter_widget() {
  register_widget( 'bbi_twitter_widget' );
}
add_action( 'widgets_init', 'bbi_load_twitter_widget' );


/**
 * CUSTOM PINTEREST WIDGET
 */


// Creating the widget 
class bbi_pinterest_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'bbi_pinterest_widget', 

    // Widget name will appear in UI
    __('Pinterest Widget', 'bbi_pinterest_widget_domain'), 

    // Widget description
    array( 'description' => __( 'Widget to display a Pinterest board', 'bbi_pinterest_widget_domain' ), ) 
    );
  }

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  $url = apply_filters( 'widget_title', $instance['url'] );
  $widget_id = apply_filters( 'widget_title', $instance['widget_id'] );
  $widget_title = apply_filters( 'widget_title', $instance['title'] );

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $url ) )
  echo $args['before_title'] . $widget_title . $args['after_title']; ?>

  <a data-pin-do="embedBoard" data-pin-board-width="" data-pin-scale-height="350" data-pin-scale-width="60" href="<?php echo $url; ?>"></a>
  <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php echo $args['after_widget']; }
    
// Widget Backend 
  public function form( $instance ) {
  if ( isset( $instance[ 'url' ] ) ) {
    $url = $instance[ 'url' ];
    $widget_title = $instance['title'];
  }

  // Widget admin form
  ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Pinterest Board URL:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
  </p>
  <?php 
  }
    
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
    $instance['title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
  return $instance;
  }
  } // Class bbi_pinterest_widget ends here

// Register and load the widget
function bbi_load_pinterest_widget() {
  register_widget( 'bbi_pinterest_widget' );
}
add_action( 'widgets_init', 'bbi_load_pinterest_widget' );


/**
 * CUSTOM WYSIWYG WIDGET
 */

// Creating the widget 
class bbi_wysiwyg_widget extends WP_Widget {

function __construct() {
  parent::__construct(
  // Base ID of your widget
  'bbi_wysiwyg_widget', 

  // Widget name will appear in UI
  __('WYSIWYG Widget', 'bbi_wysiwyg_widget_domain'), 

  // Widget description
  array( 'description' => __( 'Widget to content from a WYSIWYG Editor', 'bbi_wysiwyg_widget_domain' ), ) 
  );
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
  //$url = apply_filters( 'widget_title', $instance['url'] );
  $widget_id = apply_filters( 'widget_title', $instance['widget_id'] );
  $widget_title = apply_filters( 'widget_title', $instance['title'] );
  $id = $instance['widget_id'];

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];

  echo $args['before_title'] . $widget_title . $args['after_title']; 

  echo get_field('widget_content', 'widget_' . $args['widget_id']);
  
?>
  
<?php echo $args['after_widget']; 

}
    
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
$widget_title = $instance['title'];
$id = $instance['id'];
}

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" />
</p>
<?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
$instance['title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
return $instance;
}
} // Class bbi_wysiwyg_widget ends here

// Register and load the widget
function bbi_load_wysiwyg_widget() {
  register_widget( 'bbi_wysiwyg_widget' );
}
add_action( 'widgets_init', 'bbi_load_wysiwyg_widget' );

