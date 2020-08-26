<?php 
/*
* Template Name: Landing Page
*
* This is the template that displays all pages by default.
*/

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <main id="main-content" role="main">

		<?php if ( have_rows( 'content_blocks' ) ): ?>

			<?php while ( have_rows( 'content_blocks' ) ) : the_row();

				 if ( get_row_layout() == 'slider_block' ) : 

				 	get_template_part( 'parts/content-blocks/slider' );

				 elseif ( get_row_layout() == 'split_content_block' ) :

				 	get_template_part( 'parts/content-blocks/split-content' ); 

				 elseif ( get_row_layout() == 'featured_categories' ) : 

				 	get_template_part( 'parts/content-blocks/featured-categories' );

				 elseif ( get_row_layout() == 'featured_testimonials' ) :

				 	get_template_part( 'parts/content-blocks/featured-testimonials' ); 

				 elseif ( get_row_layout() == 'featured_recipes' ) : 

				 	get_template_part( 'parts/content-blocks/featured-recipes' );

				 elseif ( get_row_layout() == 'tabbed_recipes' ) : 

				 	get_template_part( 'parts/content-blocks/tabbed-recipes' );

			 	elseif( get_row_layout() == 'image_with_quote' ):

			 		get_template_part( 'parts/content-blocks/image-with-quote' );

			 	elseif( get_row_layout() == 'meet_rachel' ):

			 		get_template_part( 'parts/content-blocks/meet-rachel' );

			 	elseif( get_row_layout() == 'full_width_content_editor' ):

			 		get_template_part( 'parts/content-blocks/fw-content-editor' );

				 endif;

			endwhile; ?>

		<?php else: ?>

			<?php // no layouts found ?>

		<?php endif; ?>    							
	    					
	</main> <!-- end #main -->

	<?php endwhile; endif; ?>

<?php get_footer(); ?>