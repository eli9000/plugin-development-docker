<?php

// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	);

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			// 'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			// 'quote',             // a quick quote
			// 'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			// 'chat'               // chat transcript
		)
	);

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );

} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );

/***********************************************************************************************/
/* Extend Recent Posts Widget  */
// Adds different formatting to the default WordPress Recent Posts Widget
/***********************************************************************************************/

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <ul class="grid-x small-up-1 recent-post widget-area">
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li class="cell">
                    <a href="<?php the_permalink(); ?>">
                    <div class="grid-x single-recent-post">
                        <div class="small-4 cell">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="post-thumb" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                            <?php else: ?>
                            <div class="post-thumb" style="background-image: url('/wp-content/themes/utsacob/assets/images/utsa-college-of-business-blog-default.jpg');"></div> 
                            <?php endif; ?>
                            </div>
                            <div class="small-8 cell post-content">
                                    <div class="h4"><?php get_the_title() ? the_title() : the_ID(); ?></div>
                                    <p><?php
										echo wp_trim_words( get_the_excerpt(), 7, '' );
									?></p>
                                    <?php if ( $show_date ) : ?>
                                            <span class="post-date"><?php echo get_the_date(); ?></span>
                                    <?php endif; ?>
                            </div>
                    </div>
                    </a>
                </li>
            <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

// Estimated Reading Time
function prefix_estimated_reading_time( $content = '', $wpm = 300 ) {
    $clean_content = strip_shortcodes( $content );
    $clean_content = strip_tags( $clean_content );
    $word_count = str_word_count( $clean_content );
    $time = ceil( $word_count / $wpm );
    return $time;
}

// This is where shortcodes are being striped from the main content of the post
function wpdocs_remove_shortcode_from_index( $content ) {
    if ( is_single() ) {
    //     $content = strip_shortcodes( $content );
    //     $content .= "<div>Shortcodes have been stripped</div>";
    // } else {
		//     $content .= "<div>Shortcodes have NOT been stripped</div>";
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );

function my_login_redirect( $url, $request, $user ){
  if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
    if( $user->has_cap( 'subscriber')) {
      $url = home_url('/my-recipe-box/');
    } else {
      $url = admin_url();
    }
  }
  return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );