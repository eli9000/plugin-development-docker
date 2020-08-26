<div class="slider-container">
	
<?php $slide_count = 1; if ( have_rows( 'slides_builder' ) ) : ?>

	<div class="lp-slider">

	<?php while ( have_rows( 'slides_builder' ) ) : the_row(); ?>

		<div><!-- slide -->
			
			<div class="slide-bg" style="background-image: url('<?php the_sub_field( 'background_image' ); ?>');">

				<div class="grid-container" data-equalizer>

					<div class="slide-content" data-equalizer-watch>

						<?php if ( get_sub_field( 'title' ) ) { 
                if($slide_count == 1) {
            ?>
              <h1><?php the_sub_field( 'title' ); ?></h1>
            
              <?php } else {  ?>
            
							<div class="h1"><?php the_sub_field( 'title' ); ?></div>

						<?php
                  }
                } ?>

						<?php if ( get_sub_field( 'description' ) ) { ?>

							<p><?php the_sub_field( 'description' ); ?></p>

						<?php } ?>
				
						<?php if ( get_sub_field( 'button_url' ) && get_sub_field( 'button_text' ) ) { ?>

							<a href="<?php the_sub_field( 'button_url' ); ?>" tabindex="-1"><?php the_sub_field( 'button_text' ); ?></a>

						<?php } ?>

					</div>

				</div>

			</div>

		</div><!-- end slide -->

	<?php $slide_count++; endwhile; ?>

	</div>

	<div class="prev"><i class="fas fa-angle-left"></i></div>
	<div class="next"><i class="fas fa-angle-right"></i></div>

<?php endif; ?>

</div>