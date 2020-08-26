<?php

// Shortcode to evaluate buttons for sharing this recipe on the different platforms
add_shortcode('recipe_share', 'recipe_share_shortcode');
function recipe_share_shortcode( $atts = [], $content = null) {

  // Get the relevant links to inject in the following share icons
  $permalink = urlencode(get_permalink($post->ID));
  $title = urlencode(get_the_title($post->ID));

  $o = '<span>Share</span>
        <p>
          <a href="http://www.facebook.com/sharer.php?u=' . $permalink . '&t=' . $title . '" target="_blank"><i class="fab fa-facebook-f"></i><span class="show-for-sr">Share on Facebook</span></a>
          <a href="http://twitter.com/share?url=' . $permalink . '" target="_blank"><i class="fab fa-twitter"></i><span class="show-for-sr">Share on Twitter</span></a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&title=' . $title . '&source=LinkedIn"><i class="fab fa-linkedin-in" target="_blank"></i><span class="show-for-sr">Share on Linkedin</span></a>
          <a href="mailto:?subject=' . $title . ' | Check out this recipe&body=' . $permalink . '" title="Share by Email"><i class="fas fa-link"></i><span class="show-for-sr">Share via Email</span></a>
        </p>
';

  return $o;
}


