<?php
/*
 * Plugin Name:  Video Markup
 * Plugin URI:   https://socialau.com/
 * Description:  Adds a markup object for video
 * Version:      1.0.0
 * Author:       Ilektronx
 * Author URI:   http://ilektronx.com
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * */

defined( 'ABSPATH' ) || die();

$ivp_dir = dirname( __FILE__ );

require_once "{$ivp_dir}/admin/video-markup-admin.php";

// Enqueue script for detecting Ad Blocker
function ad_block_script_enqueue() {
  wp_enqueue_script(
    'ad-block-script-enqueue',
    plugin_dir_url( __FILE__ ) . 'dfp.js',
    array( 'jquery' )
  );
  // global $post;
  // if( is_a( $post, 'WP_Post' ) && shortcode_exists( 'featuredvideo' ) ) {
  //   wp_enqueue_script(
  //     'ad-block-script-enqueue',
  //     plugin_dir_url( __FILE__ ) . 'dfp.js',
  //     array( 'jquery' )
  //   );
  // }
}
add_action('wp_enqueue_scripts', 'ad_block_script_enqueue', 10);
// add_action('init', 'ad_block_script_enqueue', 0);

// Add a shortcode for actually rendering the video
// add_shortcode( 'featuredvideo', 'featured_video_shortcode_init' );
// function wpvm_shortcode_handler_function( $atts ) {
//   $atts = shortcode_atts( array(
//     'unique_id' => 'wpvm-' . get_the_ID() . ''
//   ), $atts );

//   // ad_block_script_enqueue();

//   $primary_video_markup = get_post_meta(get_the_ID(), 'wpvm_primary_video', true);
//   $secondary_video_json = get_post_meta(get_the_ID(), 'wpvm_secondary_video', true);
//   $secondary_video_object = json_decode($secondary_video_json);
//   $secondary_video_markup = $secondary_video_object->html;

//   wp_register_script('wpvm-update-shortcode-content', plugin_dir_url( __FILE__ ) . 'assets/js/handle-shortcode.js', array( 'jquery' ));
//   wp_enqueue_script('wpvm-update-shortcode-content');
//   wp_localize_script('wpvm-update-shortcode-content', 'alt_video_data', array(
//     'html' => $secondary_video_markup,
//     'unique_id' => $atts['unique_id']
//   ));

//   $data = '<div id="' . $atts['unique_id'] . '" class="featured-video-shortcode">' . $primary_video_markup . '</div>';

//   return $data;
// }

function wpvm_handle_sc_script() {
  wp_register_script('wpvm-update-shortcode-content', plugin_dir_url( __FILE__ ) . 'assets/js/handle-shortcode.js', array( 'jquery' ));
}
add_action('wp_enqueue_scripts', 'wpvm_handle_sc_script', 20);

function wpvm_featured_video_shortcode_init() {
  add_shortcode( 'featuredvideo', 'wpvm_shortcode_handler_function' );

  function wpvm_shortcode_handler_function( $atts ) {
    $atts = shortcode_atts( array(
      'unique_id' => 'wpvm-' . get_the_ID() . ''
    ), $atts );
  
    // ad_block_script_enqueue();
  
    $primary_video_markup = get_post_meta(get_the_ID(), 'wpvm_primary_video', true);
    $secondary_video_json = get_post_meta(get_the_ID(), 'wpvm_secondary_video', true);
    $secondary_video_object = json_decode($secondary_video_json);
    $secondary_video_markup = $secondary_video_object->html;
  
    // wp_register_script('wpvm-update-shortcode-content', plugin_dir_url( __FILE__ ) . 'assets/js/handle-shortcode.js', array( 'jquery' ));
    wp_enqueue_script('wpvm-update-shortcode-content');
    wp_localize_script('wpvm-update-shortcode-content', 'alt_video_data', array(
      'html' => $secondary_video_markup,
      'unique_id' => $atts['unique_id']
    ));
  
    $data = '<div id="' . $atts['unique_id'] . '" class="featured-video-shortcode">' . $primary_video_markup . '</div>';
  
    return $data;
  }
}
add_action('init', 'wpvm_featured_video_shortcode_init', 9);