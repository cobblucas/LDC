<?php if( have_rows('content_modules') ):

    $counter = 1; while ( have_rows('content_modules') ) : the_row();

        // Module type 1 for Regular text Editor

        if( get_row_layout() == 'regular_text_&_image' ):

            get_template_part('templates/modules/page-wysiwyg');

        // Module type 2 for Testimonial

        elseif( get_row_layout() == 'page_testimonial' ):

            get_template_part('templates/modules/page-testimonial');

        // Module type 3 for Image Gallery

        elseif( get_row_layout() == 'image_gallery' ):

            get_template_part('templates/modules/page-gallery');

        // Module type 4 for Buttons

        elseif( get_row_layout() == 'buttons' ):

            get_template_part('templates/modules/page-buttons');

        // Module type 5 for Videos

        elseif( get_row_layout() == 'video' ):

            get_template_part('templates/modules/page-videos');

        // Module type 6 for Table

        elseif( get_row_layout() == 'data_table' ):

            get_template_part('templates/modules/page-tables');

        // Module type 7 for Accordion

        elseif( get_row_layout() == 'accordion' ):

            include(locate_template('templates/modules/page-accordion.php'));

        // Module type 8 for blog posts

        elseif( get_row_layout() == 'latest_posts' ):

            get_template_part('templates/modules/page-posts');

         // Module type 9 for 2 columns

        elseif(get_row_layout() == "two_equal_columns"):

            get_template_part('templates/modules/page-two-col');

         // Module type 10 for 3 columns

        elseif(get_row_layout() == "three_equal_columns"):

            get_template_part('templates/modules/page-three-col');

         // Module type 11 for Landing Subpages

        elseif(get_row_layout() == "landing_subpages"):

            get_template_part('templates/modules/page-landing-subpages');

         // Module type 12 for Misc Posts display

        elseif(get_row_layout() == "personnel"):

            get_template_part('templates/modules/page-personnel');

         // Module type 13 for Tabbed Content

        elseif(get_row_layout() == "tabs"):

            include(locate_template('templates/modules/page-tabs.php'));

          // Module type 14 for Column Module

        elseif(get_row_layout() == "column_module"):

            get_template_part('templates/modules/page-column-module');

           // Module type 15 for Calendar Carousel

        elseif(get_row_layout() == "calendar_carousel"):

            get_template_part('templates/modules/page-calendar-carousel');

        endif;

    $counter++;
    endwhile;

endif; ?>
