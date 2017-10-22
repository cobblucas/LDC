<section class="bbi-page-subnav">
  <div class="container-fluid">
    <nav class="bbi-sidebar-navigation">
      <?php if (has_nav_menu('sidebar_navigation')) :
        wp_nav_menu(array('container' => false, 'theme_location' => 'sidebar_navigation', 'depth' => 2, 'menu_class' => 'bbi-nav nav-menu'));
      endif; ?>
    </nav>  
  </div>
</section>