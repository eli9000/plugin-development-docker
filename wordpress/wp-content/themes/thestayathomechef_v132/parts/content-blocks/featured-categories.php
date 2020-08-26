

<?php //var_dump( $fc_categories_picker_ids ); ?>		

<div class="featured-categories">

	<div class="grid-container">

		<div class="grid-x grid-padding-x">

			<div class="small-12 cell text-center">

				<div class="h2 dots"><?php the_sub_field( 'fc_section_header' ); ?></div>

			</div>

		</div>

		<?php 

		$fc_categories_picker = get_sub_field( 'fc_categories_picker' );

		if( $fc_categories_picker ):

		?>
	
		<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">

			<?php foreach($fc_categories_picker as $term): ?>

			<?php $category_featured_image = get_field('category_featured_image', $term); ?>

				<div class="cell">

					<a href="<?php echo get_term_link( $term ); ?>">

						<div class="term-img" style="background-image: url('<?php echo $category_featured_image['url']; ?>');">

							<div class="term-name"><?php echo $term->name; ?></div>

						</div>
							
					</a>

				</div>

			<?php endforeach; ?>

		</div>

		<?php endif; ?>

	</div>

</div>