<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-bottom" id="off-canvas" data-off-canvas data-transition="overlap" data-content-scroll="false">

	<div class="text-center"><?php joints_off_canvas_nav(); ?></div>

	<div class="grid-x text-center">

		<div class="small-12 cell">

			<?php if(is_user_logged_in()): ?>
				<a id="recipe-box-mobile" class="recipe-box" href="/my-recipe-box/"><i class="fas fa-book" alt="" aria-hidden="true"></i> My Recipe Box</a>
			<?php else: ?>
				<button id="user-login-mobile" class="user-login" data-featherlight="#loginModal"><i class="fas fa-user" alt="" aria-hidden="true"></i> Login</button>
			<?php endif; ?>

		</div>

		<div class="small-12 cell text-center social-icons">

			<?php get_template_part( 'parts/snippets/social-icons' ); ?>

		</div>

	</div>

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
