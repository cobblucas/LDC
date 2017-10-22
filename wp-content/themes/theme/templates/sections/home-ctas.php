<?php
	$bgtype = get_sub_field('background_type');
	$bgimg = get_sub_field('background_image');
	$bgposition = get_sub_field('background_position');
	$bgcolor = get_sub_field('background_color');
	$addfilter = get_sub_field('add_image_filter');
	$textColor = get_sub_field('white_text');
	$bgfix = get_sub_field('fix_background');
?>

<section class="bbi-page-section bbi-home-ctas <?php if($textColor) { ?>white-text <?php } ?><?php if($bgtype == "Image") { echo 'with-bg-img'; } else { ?>bg-color <?php echo $bgcolor; } ?><?php if($addfilter) { echo ' with-filter'; } ?>"
	<?php if($bgtype == "Image") { ?>style="background:url(<?php echo $bgimg; ?>) no-repeat <?php if($bgfix) { ?>fixed center <?php } else { echo $bgposition; } ?> center / cover;" <?php } ?>>

<?php if($addfilter) { echo '<div class="section-filter"></div>'; } ?>
	<div class="container">
		<div class="row">

			<?php $countctas = 0; while ( have_rows('home_ctas') ) : the_row();
				$total = $countctas++;

				$countctas++; endwhile; $rows = get_sub_field('home_ctas'); $total = count($rows);?>

			<?php while ( have_rows('home_ctas') ) : the_row(); ?>

				<div class="bbi-home-cta <?php if( $total == 4) { ?>col-sm-3<?php } else { ?>col-sm-4<?php } ?>">
					<?php get_template_part('templates/modules/page-link-subfield'); ?>
				</div>

			<?php  endwhile; wp_reset_query(); ?>

		</div>
	</div>
</section>