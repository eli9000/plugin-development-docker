
<div class="lp-testimonials" style="background-image: url('<?php the_sub_field('ft_background_image'); ?>');">

	<div class="overlay">

		<div class="grid-container">

			<div class="grid-x grid-padding-x text-center">

				<div class="small-12 cell">

					<?php if(get_sub_field('ft_section_header')) : ?>

						<div class="h2 dots"><?php the_sub_field( 'ft_section_header' ); ?></div>

					<?php endif; ?>

				</div>

			</div>

			<?php

			if ( get_sub_field( 'show_random_testimonials' ) == 1 ): endif;

			$testimonials = get_sub_field( 'ft_testimonials_picker' ); ?>
			
			<?php if ( $testimonials ): ?>

			<div class="grid-x grid-padding-x small-up-1">

				<?php foreach ( $testimonials as $post ): setup_postdata( $post ); ?>

					<div class="cell">

						<div class="testimonial-holder">

							<?php $post_thumbnail = get_the_post_thumbnail_url(); ?>

							<div class="testimonial-image" <?php if($post_thumbnail): ?>style="background-image: url('<?php the_post_thumbnail_url('') ?>')"<?php endif; ?>></div>

							<div class="content-container">

								<div class="h4"><?php the_title(); ?></div>

								<p class="date"><?php the_time('F jS, Y'); ?></p>

								<a class="view-recipe" href="<?php the_field('testimonial_recipe_url'); ?>">Go to Recipe</a>

								<div class="the-content"><?php the_content(); ?></div>

								<div class="triangle"></div>
				
							</div>

						</div>

					</div>

				<?php endforeach; ?>
				
			</div>

			<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</div>

</div>