<?php
// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
function joints_related_posts() {
	global $post;

	$post_categories = wp_get_post_categories( $post->ID );
	$cats = array();

	if($post_categories) {
		foreach( $post_categories as $c ) {
			$cats[] .= $c . ',';
		}
		$args = array(
			'cat' => $cats,
			'numberposts' => 3, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
		echo __( '<div class="h4">Similar Recipes</div>', 'jointswp' );
		echo '<div class="joints-related-posts grid-x grid-padding-x small-up-1 medium-up-3">';
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<div class="cell">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
						<div class="related_post" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
						</div>
            <div class="h6"><?php the_title(); ?></div>
            
					  <span class="cook-time">1 hr 10 min</span>

					  <span class="rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>
					</a>
				</div>
			<?php endforeach; }
			}
	wp_reset_postdata();
	echo '</div>';
} /* end joints related posts function */
