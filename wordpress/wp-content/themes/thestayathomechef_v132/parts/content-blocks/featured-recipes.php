<div class="featured-recipes">

	<div class="grid-container">

		<div class="grid-x grid-padding-x">

			<div class="small-12 cell text-center">

				<?php if( get_sub_field( 'fr_section_header' ) ) : ?>

					<div class="h2 dots"><?php the_sub_field( 'fr_section_header' ); ?></div>

				<?php endif; ?>

			</div>

		</div>

		<?php $post_objects = get_sub_field( 'fr_recipes_picker' ); ?>

		<?php if ( $post_objects ): ?>

		<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">

			<?php foreach ( $post_objects as $post ): setup_postdata( $post ); ?>
      
      <?php
        // Get the recipes inside the current post.
        $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

        // Access the first recipe, if there is one.
        if ( isset( $recipes[0] ) ) {
          $recipe_id = $recipes[0];
          $recipe = WPRM_Recipe_Manager::get_recipe( $recipe_id );

          // Output the recipe name.
          //echo $recipe->name();

        }
      ?>

				<div class="cell text-center medium-text-left">

					<a href="<?php the_permalink(); ?>">

					<div class="featured-image-container">
						<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');"></div>
					</div>

					<div class="h4"><?php the_title(); ?></div>

							<?php 
                            $recipe = WPRM_Recipe_Manager::get_recipe_ids_from_post(get_the_ID());
                            $cook_time = "";
                            if ( isset( $recipe[0] ) ) {
								$recipe_id = $recipe[0];
								$recipe = WPRM_Recipe_Manager::get_recipe( $recipe_id );
								$cook_time = convertToHoursMins($recipe->total_time(), '%2d hr %2d min');
								$cook_time = str_replace('0 hr ', '', $cook_time);
                            }
                          ?>
                          <?php if(!empty($cook_time)):?><span class="cook-time" data-time=""><?php echo $cook_time; ?></span><?php endif;?>

					<span class="rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>

					</a>

				</div>

			<?php endforeach; ?>

		</div>

		<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		</div>

	</div>
