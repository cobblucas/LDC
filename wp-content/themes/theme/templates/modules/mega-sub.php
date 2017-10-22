<?php

              $parent = array();
              $menu_name = 'primary_navigation';
              if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name]))
              {
                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $menu_items = wp_get_nav_menu_items($menu->term_id);
               
                $parent_id = 0;

                foreach((array)$menu_items as $key => $menu_item)
                {
                 
                  if($menu_item->menu_item_parent == 0)
                  {
                    $parent_id = $menu_item->db_id;
                    $title = $menu_item->title;
                    $url = $menu_item->url;
                    $id = $menu_item->ID; // this is the ID of the menu item, NOT the page
                    $class = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $menu_item->classes ), $menu_item) ) );
                    
                    $postid = get_post_meta( $menu_item->ID, '_menu_item_object_id', true ); // retrieve the ID of the page itself
                    $postparentid = get_post_meta( $parent_id, '_menu_item_object_id', true ); //retrieve the ID of the parent page 

                    array_push($parent, array("title" => $title, "url" => $url, "id" => $id, "postid" => $postid, "parentid" => $parent_id, "child" => array()));
                  }
                  else if($menu_item->menu_item_parent == $parent_id)
                  {
                    $title = $menu_item->title;
                    $url = $menu_item->url;

                    array_push($parent[count($parent) - 1]["child"], array("title" => $title, "url" => $url));
                  }
                  else{}
                }
              }
    ?>

  <ul class="bbi-nav bbi-mega-menu">

            <?php
            $currentpostID = get_the_ID(); // get the current page ID
            $currentpostparentID = $post->post_parent; // get the ID of the current page's parent


              foreach ($parent as $key => $value)
              {
                $postid = $value["postid"];
                $ancestor = $value["parentid"];
                //$menuparent = $value["menuparent"];

                echo $menuparent;
               
                if(empty($value["child"]))
                {
                  echo "<li><a href='" . $value["url"] . "'>" . $value["title"] . "</a></li>";
                }
                else
                { ?>
                 <li class="bbi-mega-item<?php if($currentpostID == $postid) { echo ' active-current-item'; } ?> <?php if($currentpostparentID == $postid) { echo ' current-menu-ancestor'; } ?>">
                    <a href="<?php echo $value["url"]; ?>" class="title">
                      <?php echo $value["title"]; ?>
                    </a>

                    <div class="mega-sub">
                      <div class="row">

                        <a href="<?php echo $value["url"]; ?>" class="col-sm-12 hidden-xs menu-section-title">
                            <?php the_field( 'submenu_link_title', $value["id"] ); ?>
                        </a>
                        
                        <div class="col-sm-7 col-sm-push-5 hidden-xs">
                          <div class="bbi-mega-content">
                            <?php the_field( 'submenu_content', $value["id"] ); ?>
                          </div>
                        </div>

                        <div class="col-sm-5 col-sm-pull-7">
                          <ul class="sub-menu">
                  

                              <?php foreach ($value["child"] as $key => $value)
                              { 
                                ?>
                                <li class="bbi-mega-sub-item">
                                  <a href="<?php echo $value["url"]; ?>">
                                    <?php echo $value["title"]; ?>
                                  </a>
                                </li>
                              <?php } ?>

                          </ul>
                        </div>
                      </div>
                    </div>
                </li>
               <?php  }
              }
            ?>
  </ul>