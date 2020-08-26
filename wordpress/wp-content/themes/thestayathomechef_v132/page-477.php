<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div id="main-content" class="content">

		<div class="grid-container">
		
			<div class="inner-content grid-x align-middle">
		
			    <main class="main small-12 cell" role="main">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="h2 dots">Become A Member</div>

					<div class="grid-x">

				    	<div class="small-12 large-6 cell become-a-member">

				    		<p>Sign up to save recipes in you recipe book, write reviews and more!</p>

							<div class="h5">Sign up with:</div>

							<?php get_template_part( 'parts/snippets/login-icons' ); ?>

							<div class="disclaimer">

								<p>By signing up you agree to thestayathomechef.com's <a>terms of use</a> and <a>privacy policy</a>.</p>

							</div>

				    	</div>

				    	<div class="small-12 large-6 cell already-a-member">

							<p>Already a member?</p>

							<div class="h5">Log in with:</div>
							
							<?php get_template_part( 'parts/snippets/login-icons' ); ?>

				    	</div>

				    </div>
				    
				    <?php endwhile; endif; ?>							
				    					
				</main> <!-- end #main -->
			    
			</div> <!-- end #inner-content -->

		</div>

	</div> <!-- end #content -->

<?php get_footer(); ?>