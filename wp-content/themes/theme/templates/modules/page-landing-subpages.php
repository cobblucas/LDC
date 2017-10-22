<section class="bbi-page-section bbi-landing-subpages">

    <?php
	$landing_items = get_sub_field('landing_items_per_row');
    $max_columns = $landing_items; //columns will arrange to any number (as long as it is evenly divisible by 12)
    $column = 12/$max_columns; //column number
    $total_items = count( get_sub_field('subpages'));
    $remainder = $total_items%$max_columns; //how many items are in the last row
    $first_row_item = ($total_items - $remainder); //first item in the last row
    ?>

    <?php $i=0; // counter ?>

	<?php if(get_sub_field('optional_title')) { ?>
		<h2><?php the_sub_field('optional_title'); ?></h2>
	<?php } ?>

	<?php if( have_rows('subpages') ): ?>
	    <?php while ( have_rows('subpages') ) : the_row(); ?>

	        <?php if ($i%$max_columns==0) { // if counter is multiple of 3 ?>
	        <div class="row">
	        <?php } ?>

		        <div class="bbi-subpage col-md-<?php echo $column; ?>">

		            <?php $image = get_sub_field('subpage_background_image'); $size = 'home-features'; $thumb = $image['sizes'][ $size ]; ?>

					<?php
				  		$text = get_sub_field('link_text');
						$location = get_sub_field('link_location');
				  		$currenturl = get_sub_field('select_page_url');
				  		$externalurl = get_sub_field('external_url');
				  		$linktarget = get_sub_field('link_target');
				    ?>

				    <a class="bbi-feature-wrap" onClick="_gaq.push(['_trackEvent', 'Landing Subpage', 'Click', '<?php echo $text; ?>']);"
					<?php if($location == "Current Site") { ?>
						href="<?php echo $currenturl; ?>"
					<?php } else { ?>
						href="<?php echo $externalurl; ?>"<?php if($linktarget) { ?> target="_blank"
					<?php } } ?>>

				    	<img alt="<?php echo $image['alt']; ?>" title="" src="<?php echo $thumb; ?>" />
				    	<div class="bbi-info-wrap">
				    		<h3><?php echo $text; ?></h3>
				    		<?php if(get_sub_field('subpage_excerpt')) { ?>
				    			<p><?php the_sub_field('subpage_excerpt'); ?></p>
				    		<?php } ?>
				    	</div>

				    </a>

		        </div>

		    <?php $i++; ?>

		    <?php if($i%$max_columns==0) { // if counter is multiple of 3 ?>
		    </div>
		    <?php } ?>

		<?php endwhile; ?>
	<?php endif;  ?>

</section>