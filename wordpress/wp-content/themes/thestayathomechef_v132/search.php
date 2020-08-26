<?php
/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

//Total Number of Recipes
// $count_posts = wp_count_posts( 'recipes' )->publish;

// Total number of search results
$allsearch = new WP_Query("s=$s&showposts=0");

$count = $allsearch ->found_posts;

//print_r($allsearch);

if($count == 1) {
	$text = " Recipe Found";
} else {
	$text = " Recipes Found";
}

?>

	<main id="main-content" class="content" role="main">

    	<header class="entry-content">

    		<h1 class="page-title text-center"><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>

			<div class="num-of-posts text-center"><?php echo $count . $text; ?></div>

    	</header>

    	<div class="grid-container">

			<div id="header-search-bar" class="hide-for-large">

				<i class="fas fa-search" aria-hidden="true"></i>

				<?php get_template_part('search-form-header'); ?>

			</div>

			<div class="inner-content grid-x grid-padding-x">

			    <div class="main small-12 cell">

			    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'archive-recipes-grid' ); ?>

					<?php endwhile; ?>

						<?php joints_page_navi(); ?>

					<?php else : ?>

						<?php get_template_part( 'parts/content', 'missing' ); ?>

					<?php endif; ?>

				</div> <!-- end #main -->

		    </div> <!-- end #inner-content -->

		</div>

	</main> <!-- end #main-content -->

<?php get_footer(); ?>
