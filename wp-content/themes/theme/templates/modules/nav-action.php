 <nav class="bbi-nav-action">
  <?php
    if (has_nav_menu('action_navigation')) {
      wp_nav_menu(array('container' => false, 'theme_location' => 'action_navigation', 'menu_class' => 'bbi-nav'));
    }
    ?>    
</nav>     