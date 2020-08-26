<div class="image-with-quote">
	
	<div class="grid-container">
		
		<div class="small-12 cell text-center">
      
      <?php if(get_sub_field('make_title_h1') == 'true'): ?>
			
			<h1 class="h2 dots"><?php the_sub_field('iwq_section_header'); ?></h1>
      
      <?php else: ?>
      
      <div class="h2 dots"><?php the_sub_field('iwq_section_header'); ?></div>
      
      <?php endif; ?>

			<p><?php the_sub_field('iwq_text_area'); ?></p>

		</div>

	</div>

	<div class="image-container" style="background-image: url('<?php the_sub_field('iwq_featured_image'); ?>');">

		<blockquote><p><?php the_sub_field('iwq_quote'); ?></p></blockquote>

	</div>

</div>