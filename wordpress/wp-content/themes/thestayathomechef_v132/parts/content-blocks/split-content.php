
<?php $media_placement = get_sub_field( 'sc_media_placement' ); ?>

<div class="split-content">

	<div class="grid-container">

		<div class="grid-x grid-padding-x">
			
			<div class="small-12 medium-6 large-6 cell<?php if($media_placement == 'left'): echo " small-order-1 medium-order-1 large-order-2"; endif; ?>">

				<div class="h2"><?php the_sub_field('sc_section_header'); ?></div>

				<div class="text-content"><?php the_sub_field( 'sc_content_editor' ); ?></div>

			</div>

			<div class="small-12 medium-6 large-6 cell text-center<?php if($media_placement == 'left'): echo " small-order-2 medium-order-2 large-order-1"; endif; ?>">
			
				<?php 

				$media_type = get_sub_field( 'sc_media_options' );

				if($media_type == 'sc_image') {

					$sc_ft_image = get_sub_field( 'sc_ft_image' );

					echo "<div class='sc-image' style='background-image: url(" . $sc_ft_image['url'] . ");'></div>";

				} elseif($media_type == 'sc_video') {

					$sc_video = get_sub_field( 'sc_video_embed' );

					echo "<div class='sc-video'>" . $sc_video . "</div>";

				}
				
				?>

			</div>

		</div>

	</div>

</div>