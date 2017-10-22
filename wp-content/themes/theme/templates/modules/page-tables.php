<?php 

    $table = get_sub_field( 'table' );

    if ( $table ) :

        echo '<section class="bbi-content-section bbi-page-table"><table class="table table-striped" border="0">';
    ?>

    <?php if(get_sub_field('table_title')) { ?>
        <h2><?php the_sub_field('table_title'); ?></h2>
    <?php } ?>

        <?php if ( $table['header'] ) {

            echo '<thead>';

                echo '<tr>';

                    foreach ( $table['header'] as $th ) {

                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }

                echo '</tr>';

            echo '</thead>';
        }

        echo '<tbody>';

            foreach ( $table['body'] as $tr ) {

                echo '<tr>';

                    foreach ( $tr as $td ) {

                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }

                echo '</tr>';
            }

        echo '</tbody>';

    echo '</table></section>';

endif; ?>