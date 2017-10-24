
<footer id="bbi-footer">

	<div class="bbi-footer-wrap">

		<div class="container-mid">

			<div class="row">

				<div class="bbi-footer-col col-sm-6">
					<?php the_field('statement_of_purpose', 'option'); ?>
				</div>

				<div class="bbi-footer-col col-sm-2 col-sm-offset-1">
					<h4>Connect With Us</h4>
					<?php get_template_part('templates/modules/nav-social'); ?>
				</div>

				<div class="bbi-footer-col col-sm-3">
					<?php the_field('footer_info', 'option'); ?>
				</div>
			</div>

			<div class="row">

				<div class="bbi-footer-col col-sm-12">
					<div class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, <span>All Rights Reserved.</span>
					</div>
					<?php get_template_part('templates/modules/nav-footer-admin'); ?>
				</div>

			</div>

		</div>

	</div>

</footer>
