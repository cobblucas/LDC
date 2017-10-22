<?php
use Roots\Sage\Config;
use Roots\Sage\Wrapper;
?>
<?php get_template_part('templates/head'); ?>
<body <?php if(get_field('turn_on_prototype', 'option')) { body_class( 'bbi-grayscale' ); } else { body_class(); } ?>>

    <!--[if lt IE 9]>
    <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    </div>
    <![endif]-->

     <?php if(get_field('tracking_type', 'option') == 'Google Tag Manager' && get_field("container_id", "option")) { ?>
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php the_field('container_id', 'option'); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php the_field("container_id", "option"); ?>');</script>
        <!-- End Google Tag Manager -->
    <?php } ?>

    <div id="bbi-wrapper" class="<?php if(get_field('menu_offcanvas', 'option')) { echo ' row-offcanvas'; if(get_field('offcanvas_position', 'option') == "Right") { echo ' row-offcanvas-right';} else { echo ' row-offcanvas-left'; }} ?>">

        <?php do_action('get_header'); ?>

        <?php get_template_part('templates/header'); ?>

         <?php if(!is_front_page()) {
             get_template_part('templates/sections/pages-banner');
             get_template_part('templates/sections/pages-toolbar');
        } ?>

        <section class="bbi-main-content <?php if(!Config\display_sidebar()) { echo 'no-sidebar'; } ?>">

            <?php if(!is_front_page()) { ?><div class="container-fluid"><?php } ?>

                <div class="row bbi-main-row">

                    <main id="bbi-primary-content" class="bbi-page-modules <?php if(Config\display_sidebar()) { echo 'col-sm-8 col-sm-push-4  col-md-9 col-md-push-3 with-sidebar'; } else {echo 'col-sm-12';} ?>">

                        <?php include Wrapper\template_path(); ?>

                    </main>

                    <?php if (Config\display_sidebar()) : ?>

                        <?php include Wrapper\sidebar_path(); ?>

                    <?php endif; ?>

                </div>

            <?php if(!is_front_page()) { ?></div><?php } ?>

        </section>




        <?php if(get_field('display_engagement_footer')) {
            get_template_part('templates/sections/engagement-section');
        } ?>


        <?php
            get_template_part('templates/footer');
            wp_footer();
        ?>
    </div>

        <!-- Font Resizer -->
        <?php if (get_field('font_resizer_js', 'option')) : ?>
            <script>
                (function($) {
                    $('p').jfontsize({
                        btnMinusClasseId: '#jfontsize-minus',
                        btnDefaultClasseId: '#jfontsize-default',
                        btnPlusClasseId: '#jfontsize-plus',
                        btnMinusMaxHits: 1, // How many times the size can be decreased
                        btnPlusMaxHits: 5, // How many times the size can be increased
                        sizeChange: 5 // Defines the range of change in pixels
                    });
                })(jQuery);
            </script>
        <?php endif; ?>

        <!-- Add This -->
        <?php if(get_field('add_this', 'option')) { ?>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php the_field("addthis_id", "option"); ?>">
                 var addthis_config = {
                 data_ga_property: '<?php the_field("tracking_id", "option"); ?>',
                 data_ga_social : true
              };

            </script>

        <?php } ?>
    </body>
</html>
