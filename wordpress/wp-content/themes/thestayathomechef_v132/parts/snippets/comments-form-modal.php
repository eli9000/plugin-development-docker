<div id="commentsModal" class="login-info">

	<div class="become-a-member">

    <?php 
      $comments_args = array(
              // Change the title of send button 
              'label_submit' => __( 'Submit Your Review', 'textdomain' ),
              // Change the title of the reply section
              'title_reply' => __( 'Leave A Review!', 'textdomain' ),
              'class_submit'=>'button',
              // Remove "Text or HTML to be displayed after the set of comment fields".
              'comment_notes_after' => '',
              // Redefine your own textarea (the comment body).
              'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Review:', 'noun' ) . '</label><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
      );
      comment_form( $comments_args );
    ?>

	</div>

</div>