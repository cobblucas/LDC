<section class="bbi-page-testimonial bbi-content-section">

	<div class="quote"><i class="fa fa-quote-left"></i></div>

	<div class="row">
		

		<?php if(get_sub_field('add_author_image')) { ?>

			<div class="col-xs-3 col-sm-3 author-img">

				<div class="imgWrap">
					<?php $image = get_sub_field('bb_page_testimonial_image'); $size = 'grid-template'; $thumb = $image['sizes'][ $size ]; ?>
					<img alt="<?php echo $image['alt']; ?>" src="<?php echo $thumb; ?>" />
				</div>

			</div>

		<?php } ?>

		<div class="testimonial <?php if(get_sub_field('add_author_image')) { ?>col-xs-9 col-sm-9<?php } else { ?>col-xs-12 col-sm-12 no-img<?php } ?>">

			<?php the_sub_field('bb_page_testimonial'); ?>

			<?php if(get_sub_field('bb_page_testimonial_author')) { ?>
				<h5><?php the_sub_field('bb_page_testimonial_author'); ?></h5>
			<?php } ?>
		</div>
	</div>

</section>