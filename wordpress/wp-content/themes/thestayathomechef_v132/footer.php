<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">

					<div class="grid-container">
					
						<div class="inner-footer grid-x grid-padding-x align-middle">

							<div class="small-12 medium-4 large-4 cell text-center large-text-left">

								<p id="footer-snippet"><?php the_field( 'footer_snippet', 'option' ); ?></p>

							</div>
							
							<div class="small-12 medium-4 large-4 cell text-center">

								<?php $footer_logo = get_field( 'footer_logo', 'option' ); ?>

								<?php if ( $footer_logo ) { ?>

									<a href="/" title="Stay At Home Chef Logo"><img id="footer-logo" src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" /></a>

								<?php } ?>

		    				</div>

							<div class="small-12 medium-4 large-4 cell text-center large-text-right">

								<nav role="navigation">

		    						<?php joints_footer_links(); ?>

		    					</nav>

								<?php get_template_part( 'parts/snippets/social-icons' ); ?>
								
							</div>
							
							<div class="small-12 medium-12 large-12 cell text-center">

								<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>All rights reserved</p>

							</div>
						
						</div> <!-- end #inner-footer -->

					</div>
				
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->

		<div id="login-modal"><?php get_template_part( 'parts/snippets/login-modal' ); ?></div>
		
		<?php wp_footer(); ?>
		
	</body>

	
</html> <!-- end page -->
