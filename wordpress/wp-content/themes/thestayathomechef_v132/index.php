

<?php
/**
 * Displays archive pages if a specific template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

//Total Number of Recipes
global $wp_query;
$count_posts = $wp_query->found_posts;

?>
	<main id="main-content" class="content" role="main">

    	<section>

      <h1 class="page-title text-center">Recipe Index</h1>

			<?php get_template_part( 'parts/snippets/recipes-filter' ); ?>

			<div class="num-of-posts text-center"><?php echo $count_posts . " Recipes Found"; ?></div>

    	</section>

		<div class="grid-container">

			<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="activated_filters"><h4>Filter By:</h4></div>
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

	</main> <!-- end #content -->
<script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js"></script>

<style>
	li[data-index="0"] {display:none;}
	@media screen and (max-width: 1023px) {
		.dropdown.menu {margin-bottom:20px;}
	}
</style>
<?php get_footer(); ?>
