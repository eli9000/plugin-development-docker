<?php if ( have_rows( 'social_media', 'option' ) ) : ?>

	<?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>

		<a class="social-link" href="<?php the_sub_field( 'social_media_url' ); ?>" target="_blank" rel="noopener">
			<?php the_sub_field( 'icon' ); ?>
      <span class="show-for-sr"><?php the_sub_field('social_label'); ?></span>
		</a>

	<?php endwhile; ?>

<?php endif; ?>