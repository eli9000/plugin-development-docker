<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Adds functions for Advanced Custom Fields
require_once(get_template_directory().'/functions/acf.php');

// Adds functions for Gravity Forms
require_once(get_template_directory().'/functions/gforms.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php');

// Add custom shortcodes
require_once(get_template_directory().'/functions/shortcodes.php');

// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php');

function convertToHoursMins($time, $format = '%02d:%02d') {
 	if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function filter_recipes($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if(isset($_GET['meal_type']) OR isset($_GET['cuisine']) OR isset($_GET['sides'])) {
            $categories = array();
            $queryCats = array($_GET['meal_type'], $_GET['cuisine'], $_GET['sides']);

            foreach($queryCats as $cat) {
                if($cat) {
                    array_push($categories, $cat);
                }
            }
            $query->set( 'category__and', $categories );
        }
        elseif (is_search())
        {
          // If we are on the search page, only allow posts to show, not pages
          $query->set('post_type', 'post');
        }
    }
}
add_action( 'pre_get_posts', 'filter_recipes' );

add_filter( 'favorites/button/css_classes', 'custom_favorites_button_css_classes', 10, 3 );

function custom_favorites_button_css_classes($classes, $post_id, $site_id)
{
    $classes = 'save-recipe simplefavorite-button';
	return $classes;
}


// tell WordPress about our new query var
function wpse52480_query_vars( $query_vars ){
    $query_vars[] = 'filter_my_recipes';
    return $query_vars;
}
add_filter( 'query_vars', 'wpse52480_query_vars' );

// check if our query var is set in any query
function wpse52480_pre_get_posts( $query ){
    if( isset( $query->query_vars['filter_my_recipes'] ) ) {
        $categories = array();
        $queryCats = array($_GET['meal_type'], $_GET['cuisine'], $_GET['sides']);

        foreach($queryCats as $cat) {
            if($cat) {
                array_push($categories, $cat);
            }
        }
        $query->set( 'category__and', $categories );

        if($_GET['order']) {
            $query->set('order', $_GET['order']);
        }
        if($_GET['orderby']) {
            $query->set('orderby', $_GET['orderby']);
        }
    }

    return $query;
}
add_action( 'pre_get_posts', 'wpse52480_pre_get_posts' );
