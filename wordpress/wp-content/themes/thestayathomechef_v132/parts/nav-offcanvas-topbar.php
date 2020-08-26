<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div id="centered-logo-bottom-menu" class="template-header">

	<div class="grid-container">

		<div class="grid-x align-middle">

			<div class="cell small-4 small-order-1 medium-order-1 large-order-1">
	
	            <div id="header-search-bar" class="show-for-large">

              		<i class="fas fa-search" aria-hidden="true"></i>

              		<?php get_template_part('search-form-header'); ?>

	            </div>

				<?php if (!is_search()) : ?>
	            <div class="hide-for-large">

	            	<a id="search-mobile" class="button" href="/?s="><i class="fas fa-search" aria-hidden="true"></i> Search</a>

	            </div>
				<?php endif; ?>

			</div>

			<div class="cell small-4 small-order-2 medium-order-2 large-order-2 text-center">

				<div class="header-logo text-center">
					<?php 

					$image = get_field( 'header_logo', 'option' );

					if( !empty($image) ): ?>

						<a href="/">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="66" width="198" />
						</a>

					<?php endif; ?>

				</div>

			</div>

			<div class="cell small-12 large-4 small-order-4 medium-order-4 large-order-3 text-center large-text-right">
	
			<?php if(is_user_logged_in()): ?>
				<a id="recipe-box" href="/my-recipe-box/"><i class="fas fa-book" aria-hidden="true"></i> My Recipe Box</a>
			<?php else: ?>
				<button id="user-login" data-featherlight="#loginModal"><i class="fas fa-user" aria-hidden="true"></i> Login</button>
			<?php endif; ?>
			</div>

			<div class="cell small-4 large-12 hide-for-large small-order-3 medium-order-3 large-order-4 text-right">

				<div id="mobile-menu">

					<a data-toggle="off-canvas" aria-pressed="false"><?php _e( '<i class="fas fa-bars" aria-hidden="true"><span class="show-for-sr">Toggle Mobile Menu</span></i>', 'jointswp' ); ?> </a>

				</div>

			</div>


		</div>

		<div class="grid-x">

			<div class="cell small-4 large-12 nav-container text-center show-for-large small-order-4 medium-order-4 large-order-4">

				<?php joints_top_nav(); ?>

			</div>

		</div>

	</div>

	<div id="nav-pattern"></div>

</div>