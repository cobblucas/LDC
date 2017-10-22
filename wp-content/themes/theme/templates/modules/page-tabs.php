<section class="bbi-page-tabs bbi-content-section" id="accordion-<?php echo $counter; ?>">


		<?php if(get_sub_field('tab_section_title')) { ?>
			<h2><?php the_sub_field('tab_section_title'); ?></h2>
		<?php } ?>

		<?php if( have_rows('tab_module') ): ?>
			<ul  class="bbi-tabs nav nav-pills nav-tabs responsive">
				<?php $count = 1; while ( have_rows('tab_module') ) : the_row(); ?>

					<li class="<?php if($count == 1) { ?>active<?php } ?> bbi-single-tab">
						<a href="#tab<?php echo $counter; ?><?php echo $count; ?>" data-toggle="tab" class="section-title">
							<?php the_sub_field('tab_title'); ?>
						</a>
					</li>

		   		<?php $count++; endwhile;  ?>
		   	</ul>
		   	<div class="tab-content clearfix responsive">
		   	<?php $count = 1; while ( have_rows('tab_module') ) : the_row(); ?>


			  			<div class="tab-pane <?php if($count == 1) { ?>active<?php } ?>" id="tab<?php echo $counter; ?><?php echo $count; ?>">
          					<?php the_sub_field('tab_content'); ?>
						</div>

			<?php $count++; endwhile;  ?>
			</div>
	   	<?php endif;  ?>


</section>