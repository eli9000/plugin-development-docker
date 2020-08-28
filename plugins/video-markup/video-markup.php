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

function wpvm_featured_video_shortcode_init() {

  function wpvm_shortcode_handler_function( $atts ) {
    $atts = shortcode_atts( array(
      'unique_id' => 'wpvm-' . get_the_ID() . ''
    ), $atts );
  
    $primary_video_markup = get_post_meta(get_the_ID(), 'wpvm_primary_video', true);
    $secondary_video_json = get_post_meta(get_the_ID(), 'wpvm_secondary_video', true);
    $secondary_video_object = json_decode($secondary_video_json);
    $secondary_video_markup = $secondary_video_object->html;

    wp_enqueue_script('wpvm-update-shortcode-content', plugin_dir_url( __FILE__ ) . 'assets/js/handle-shortcode.js');
    wp_localize_script('wpvm-update-shortcode-content', 'alt_video_data', array(
      'html' => $secondary_video_markup,
      'unique_id' => $atts['unique_id']
    ));
  
    $data = '<div id="' . $atts['unique_id'] . '" class="featured-video-shortcode">' . $primary_video_markup . '</div>';
  
    return $data;
  }
  add_shortcode( 'featuredvideo', 'wpvm_shortcode_handler_function' );
}
add_action('init', 'wpvm_featured_video_shortcode_init');