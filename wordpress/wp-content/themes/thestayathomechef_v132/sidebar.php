<?php 
/**
 * The sidebar containing the main widget area
 */
 ?>

<div id="sidebar1" class="sidebar small-12 medium-4 large-4 cell" role="complementary">

	<?php  
	wp_nav_menu(array(  
	  'menu' => 'Sidebar Nav',   // This will be different for you. 
	  'container_id' => 'gfsidebarmenu', 
	  'walker' => new gf_Sidebar_Menu_Maker_Walker()
	)); 
	?>

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php endif; ?>

</div>