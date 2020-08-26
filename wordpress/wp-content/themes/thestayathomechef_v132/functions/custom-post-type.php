<?php
/*Custom Post Type
This page creates custom post types and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function sahc_custom_post() {
	// creating (registering) the custom type
	// register_post_type( 'recipes', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	//  	// let's now add all the options for this post type
	// 	array('labels' => array(
	// 		'name' => __('Recipes', 'jointswp'), /* This is the Title of the Group */
	// 		'singular_name' => __('Recipe', 'jointswp'), /* This is the individual type */
	// 		'all_items' => __('All Recipes', 'jointswp'), /* the all items menu item */
	// 		'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
	// 		'add_new_item' => __('Add New Recipe', 'jointswp'), /* Add New Display Title */
	// 		'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
	// 		'edit_item' => __('Edit Recipes', 'jointswp'), /* Edit Display Title */
	// 		'new_item' => __('New Recipe', 'jointswp'), /* New Display Title */
	// 		'view_item' => __('View Recipe', 'jointswp'), /* View Display Title */
	// 		'search_items' => __('Search Recipe', 'jointswp'), /* Search Custom Type Title */
	// 		'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
	// 		'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
	// 		'parent_item_colon' => ''
	// 		), /* end of arrays */
	// 		'description' => __( 'This is the recipes custom post type', 'jointswp' ), /* Custom Type Description */
	// 		'public' => true,
	// 		'publicly_queryable' => true,
	// 		'exclude_from_search' => false,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
	// 		'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
	// 		'rewrite'	=> array( 'slug' => 'recipes', 'with_front' => false ), /* you can specify its url slug */
	// 		'has_archive' => 'recipes', /* you can rename the slug here */
	// 		'capability_type' => 'post',
	// 		'hierarchical' => false,
	// 		/* the next one is important, it tells what's enabled in the post editor */
	// 		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
	//  	) /* end of options */
	// ); /* end of register post type */

	register_post_type( 'testimonials', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Testimonials', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Testimonial', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Testimonials', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Testimonial', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Testimonials', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Testimonial', 'jointswp'), /* New Display Title */
			'view_item' => __('View Testimonial', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Testimonial', 'jointswp'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the testimonials custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-testimonial', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'testimonials', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'testimonials', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
	 	) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'recipes');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'recipes');

}

	// adding the function to the Wordpress init
	add_action( 'init', 'sahc_custom_post');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
    // register_taxonomy( 'recipes_cat',
    // 	array('recipes'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    // 	array('hierarchical' => true,     /* if this is true, it acts like categories */
    // 		'labels' => array(
    // 			'name' => __( 'Recipe Categories', 'jointswp' ), /* name of the custom taxonomy */
    // 			'singular_name' => __( 'Recipe Category', 'jointswp' ), /* single taxonomy name */
    // 			'search_items' =>  __( 'Search Recipe Categories', 'jointswp' ), /* search title for taxomony */
    // 			'all_items' => __( 'All Recipe Categories', 'jointswp' ), /* all title for taxonomies */
    // 			'parent_item' => __( 'Parent Recipe Category', 'jointswp' ), /* parent title for taxonomy */
    // 			'parent_item_colon' => __( 'Parent Recipe Category:', 'jointswp' ), /* parent taxonomy title */
    // 			'edit_item' => __( 'Edit Recipe Category', 'jointswp' ), /* edit custom taxonomy title */
    // 			'update_item' => __( 'Update Recipe Category', 'jointswp' ), /* update title for taxonomy */
    // 			'add_new_item' => __( 'Add New Recipe Category', 'jointswp' ), /* add new title for taxonomy */
    // 			'new_item_name' => __( 'New Recipe Category Name', 'jointswp' ) /* name title for taxonomy */
    // 		),
    // 		'show_admin_column' => true,
    // 		'show_ui' => true,
    // 		'query_var' => true,
    // 		'rewrite' => array( 'slug' => 'recipe-categories' ),
    // 	)
    // );

	// now let's add custom tags (these act like categories)
    // register_taxonomy( 'recipes_tag',
    // 	array('recipes'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    // 	array('hierarchical' => false,    /* if this is false, it acts like tags */
    // 		'labels' => array(
    // 			'name' => __( 'Recipe Tags', 'jointswp' ), /* name of the custom taxonomy */
    // 			'singular_name' => __( 'Recipe Tag', 'jointswp' ), /* single taxonomy name */
    // 			'search_items' =>  __( 'Search Recipe Tags', 'jointswp' ), /* search title for taxomony */
    // 			'all_items' => __( 'All Recipe Tags', 'jointswp' ), /* all title for taxonomies */
    // 			'parent_item' => __( 'Parent Recipe Tag', 'jointswp' ), /* parent title for taxonomy */
    // 			'parent_item_colon' => __( 'Parent Recipe Tag:', 'jointswp' ), /* parent taxonomy title */
    // 			'edit_item' => __( 'Edit Recipe Tag', 'jointswp' ), /* edit custom taxonomy title */
    // 			'update_item' => __( 'Update Recipe Tag', 'jointswp' ), /* update title for taxonomy */
    // 			'add_new_item' => __( 'Add New Recipe Tag', 'jointswp' ), /* add new title for taxonomy */
    // 			'new_item_name' => __( 'New Recipe Tag Name', 'jointswp' ) /* name title for taxonomy */
    // 		),
    // 		'show_admin_column' => true,
    // 		'show_ui' => true,
    // 		'query_var' => true,
    // 	)
    // );

    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/CMB2/CMB2
    */
