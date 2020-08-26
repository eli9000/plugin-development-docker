<div class="small-12 medium-5 large-4 cell small-order-5 medium-order-1 large-order-1 show-for-medium">

	<div class="recipe-sb-cta text-center ">
		<div class="h6">Save Recipe</div>
	<?php if(is_user_logged_in()): ?>
		<p>Save recipe to your profile.</p>
		<?php the_favorites_button(); ?>
	<?php else: ?>
		<p>Sign in and save recipe to your profile.</p>
		<a class="button" title="Sign In" data-featherlight="#loginModal" href="#">Sign In</a>
	<?php endif; ?>
	</div>

	<div class="recipe-sb-cta text-center ">
		<?php echo do_shortcode('[gravityform id="1" title="false" description="true"]'); ?>
	</div>
		<style>
			.recipe-sb-cta .save-recipe {font-weight: 700;font-size:14px;text-transform:uppercase;display: inline-block;vertical-align: middle;margin: 0 0 1rem;font-family: inherit;padding: 1.8em 2.5em;-webkit-appearance: none;border: 1px solid transparent;border-radius: 0;transition: background-color .25s ease-out,color .25s ease-out;font-size: .9rem;line-height: 1;text-align: center;cursor: pointer;background-color: #e41e26;color: #fefefe;}
			.recipe-sb-cta .gform_description {text-align:center;display:block;}
			.recipe-sb-cta .gform_body {display: block !important;width: 100% !important;max-width: 100% !important;}
			.recipe-sb-cta .gform_footer {width: 100% !important;max-width: 100% !important;display: block !important;text-align: center !important;}
			.recipe-sb-cta #gform_submit_button_1 {width: 100%;height: 52px;line-height: 52px;margin: 0 auto;padding: 0 25px;display: block;max-width: 100%;}
		</style>
</div>