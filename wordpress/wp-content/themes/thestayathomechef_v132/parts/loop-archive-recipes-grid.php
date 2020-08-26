<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

// Adjust the amount of rows in the grid
$grid_columns = 12; 

?>

<?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <div class="grid-x grid-padding-x archive-grid" data-equalizer> <!--Begin Grid--> 

<?php endif; ?> 

		<!--Item: -->
		<div class="small-12 medium-6 large-3 cell panel" tabindex="0" data-equalizer-watch>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

				
			
					<section class="featured-image" itemprop="text" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">

						<div class="overlay">

						<a href="<?php the_permalink() ?>" class="view-recipe" rel="bookmark" title="<?php the_title_attribute(); ?>">See Recipe</a>
							<?php the_favorites_button(); ?>
							<!-- <button class="save-recipe">Save Recipe</button> -->

						</div>
						
					</section> <!-- end article section -->
				
					<section class="article-header">

						<div class="title h3"><?php the_title(); ?></div>	
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
					
					</section> <!-- end article header -->

					
								    							
			</article> <!-- end article -->
			
		</div>

<?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   </div>  <!--End Grid --> 

<?php endif; ?>

