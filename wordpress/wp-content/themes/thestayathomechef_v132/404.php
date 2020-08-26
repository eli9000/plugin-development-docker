<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>
			
	<main id="main-content" class="content archive grid-container" role="main">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
			<div class="main small-12 cell text-center">

				<article class="content-not-found">
				
					<header class="article-header">
						<h1 ><?php _e( 'Page Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->
			
					<section class="entry-content">
						<p><?php _e( 'The page you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
	
			</div> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</main> <!-- end #main-content -->

<?php get_footer(); ?>