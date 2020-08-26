<div class="meet-rachel">
	
	<div class="grid-x">
		
		<div class="small-12 large-6 cell">

			<div class="left-content">
			
				<div class="h2"><?php the_sub_field('mr_section_header'); ?></div>

					<?php if( get_sub_field('mr_left_show_social_icons') ): ?>

						<div class="social-icons">

							<?php get_template_part( 'parts/snippets/social-icons' ); ?>

						</div>

					<?php endif; ?>

				<?php the_sub_field('mr_left_text_editor'); ?>

			</div>

			<div class="mr-left-image" style="background-image: url('<?php the_sub_field('mr_left_featured_image'); ?>');"></div>

		</div>

		<div class="small-12 large-6 cell">

			<div class="mr-right-image show-for-large" style="background-image: url('<?php the_sub_field('mr_right_featured_image'); ?>');"></div>

			<div class="right-content">

				<?php the_sub_field('mr_right_text_editor'); ?>

				<div class="contact-rachel">

					<div class="h2">Contact Rachel</div>
					
					<?php the_sub_field('mr_right_contact_rachel'); ?>

				</div>

			</div>

		</div>

	</div>

</div>