<?php 
              //$menu = wp_get_nav_menu_object( 'primary_navigation' );

              

              // $menu_name = 'Primary Navigation';
              // $menu_obj  = get_term_by( 'name', $menu_name, 'nav_menu' );
              // $menu_id   = $menu_obj->term_id;
              // $menu = wp_get_nav_menu_object( $menu_id );

              // $menu_items = wp_get_nav_menu_items( $menu->term_id );
 
              // echo '<ul class="bbi-nav menu-primary">';
              // foreach( $menu_items as $menu_item ) { 

              //   $id = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );
              //     $page = get_page( $id );
              //     $link = get_page_link( $id ); 

                  // item does not have a parent so menu_item_parent equals 0 (false)
       // if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        //$parent_id = $item->ID; ?>

                  <!-- <li class="item">
                      <a href="<?php// echo $link; ?>" class="title">
                          <?php //echo $page->post_title; ?>
                      </a>
                      <?php //the_field( 'submenu_content', $menu_item->ID ); ?>
                  </li> -->
                 

              <?php //}

              //echo '</ul>';
            ?>




<?php
    $menu_name = 'Primary Navigation';
    $menu_obj  = get_term_by( 'name', $menu_name, 'nav_menu' );
    $menu_id   = $menu_obj->term_id;
    $menu = wp_get_nav_menu_object( $menu_id );

    $menu_items = wp_get_nav_menu_items( $menu->term_id );


  // $menu_name = 'primary_nav';
  // $locations = get_nav_menu_locations();
  // $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>

<ul class="bbi-nav bbi-mega-menu">
    <?php
    $count = 0;
    $submenu = false;

    foreach( $menu_items as $item ):

        $link = $item->url;
        $title = $item->title;
        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>

    <li class="item">
        <a href="<?php echo $link; ?>" class="title">
            <?php echo $title; ?>
        </a>
        <div class="mega-sub">
          <div class="row">

            <a href="<?php echo $link; ?>" class="col-sm-12 hidden-xs menu-section-title">
                <?php the_field( 'submenu_link_title', $item->ID ); ?>
            </a>
            
            <div class="col-sm-7 col-sm-push-5 hidden-xs">
              <div class="bbi-mega-content">
                <?php the_field( 'submenu_content', $item->ID ); ?>
              </div>
            </div>

    <?php endif; ?>

    
      
        <?php if ( $parent_id == $item->menu_item_parent ): ?>

            <?php if ( !$submenu ): $submenu = true; ?>
            <div class="col-sm-5 col-sm-pull-7">
            <ul class="sub-menu">

            <?php endif; ?>

                <li class="item">
                    <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
                </li>

                

            <?php //if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            <?php if ( !isset($menuitems[ $count + 1 ]) || $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
          </div>
            <?php $submenu = false; endif; ?>

        <?php endif; ?>

       
     
 

    <?php //if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    <?php if ( !isset($menuitems[ $count + 1 ]) || $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </div>
    </div>
    </li>                           
    <?php $submenu = false; endif; ?>

<?php $count++; endforeach; ?>

</ul>