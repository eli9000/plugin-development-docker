
<div class="tabbed-recipes">

	<div class="grid-container">

		<div class="grid-d grid-padding-x">

			<div class="small-12 cell">

				<?php if ( have_rows( 'tabs_builder' ) ) : ?>

				<ul class="tabs" data-deep-link="true" data-responsive-accordion-tabs="tabs small-accordion large-tabs" data-allow-all-closed="true" id="recipe-tabs">
          
          <li class="tabs-title is-active"><a href="#recipe-tabs0" aria-selected="true">Newest Recipes</a></li>

					<?php $tab_num = 1; while ( have_rows( 'tabs_builder' ) ) : the_row(); ?>

						<li class="tabs-title"><a href="#recipe-tabs<?php echo $tab_num; ?>" aria-selected="true"><?php the_sub_field( 'tab_title' ); ?></a></li>

					<?php $tab_num++; endwhile; ?>

				</ul>

				<?php endif; ?>

				<?php if ( have_rows( 'tabs_builder' ) ) : ?>

				<div class="tabs-content" data-tabs-content="recipe-tabs" data-equalizer data-equalize-on="medium">
          
          <div class="tabs-panel is-active" id="recipe-tabs0">
            <?php 
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 4,
            );
            $blogs = new WP_Query( $args );

            if($blogs): ?>
            <div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">
              <?php while ($blogs->have_posts()) : $blogs->the_post(); ?>
            
										<div class="cell">

											<a href="<?php the_permalink(); ?>" data-equalizer-watch>

												<div class="h4"><?php the_title(); ?></div>

												<div class="time-save">
													
<!-- 													<span class="cook-time">1 hr 10 min</span> -->
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
													<span class="save"><i class="fas fa-share-square"></i></span>

												</div>

												<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>');"></div>
													
											</a>

										</div>
            
            <?php endwhile; ?>
              
            </div>
            
            <?php endif; wp_reset_postdata(); ?>
            
          </div>

					<?php $tab_panel = 1; while ( have_rows( 'tabs_builder' ) ) : the_row(); ?>

						<div class="tabs-panel" id="recipe-tabs<?php echo $tab_panel; ?>">

							<?php $post_objects = get_sub_field( 'tab_recipe_picker' ); ?>

							<?php if ( $post_objects ): ?>

								<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">

									<?php foreach ( $post_objects as $post ): setup_postdata( $post ); ?>

										<div class="cell">

											<a href="<?php the_permalink(); ?>" data-equalizer-watch>

												<div class="h4"><?php the_title(); ?></div>

												<div class="time-save">
													
<!-- 													<span class="cook-time">1 hr 10 min</span> -->
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
													<span class="save"><i class="fas fa-share-square"></i></span>

												</div>

												<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>');"></div>
													
											</a>

										</div>

									<?php endforeach; ?>

								</div>

							<?php wp_reset_postdata(); ?>

							<?php endif; ?>

						</div>

					<?php $tab_panel++; endwhile; ?>

				</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

</div>