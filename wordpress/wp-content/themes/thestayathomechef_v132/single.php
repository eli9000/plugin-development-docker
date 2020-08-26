<?php
/**
 * The template for displaying all posts
 */
get_header();

// Get the recipes inside the current post.
$recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

?>
<style>
    .rating {margin-top:12px;display:inline-block;}
    .entry-content .wprm-recipe-container {display:none;}
    .wc-comment-author {position: absolute;top: 30px;left: 41px;}
</style>
<div class="recipe-featured-image" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">

    <div class="overlay">

        <div class="recipe-intro">

            <header class="article-header">

                <h1 class="entry-title single-title dots" itemprop="headline"><?php the_title(); ?></h1>

                <?php if(has_excerpt()): the_excerpt(); else: echo "<p>" . wp_trim_words( get_the_content(), 40, '...' ) . "</p>"; endif; ?>

            </header><!-- end article header -->

        </div>

        <a href="#jump-to-recipe">

        <div id="recipe-page-jump" class="text-center">

            <img src="/wp-content/themes/stayathomechef/assets/images/double-down-arrow.png" alt="jump to recipe icon"/>

            <div class="h6">Jump to Recipe</div>
        </div>
        </a>
    </div>
</div>
<div id="main-content" class="content">
    <div class="grid-container">
        <div class="inner-content grid-x grid-margin-x grid-padding-x">

            <!-- SIDEBAR -->
            <?php get_template_part( 'parts/recipe-snippets/recipe-sidebar' ); ?>

            <div class="main small-12 medium-7 large-8 cell small-order-1 medium-order-2 large-order-2">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part( 'parts/loop', 'single-recipes' ); ?>

                <?php endwhile; else : ?>

                    <?php get_template_part( 'parts/content', 'missing' ); ?>

                <?php endif; ?>

            </div> <!-- end #main -->

            <!-- ADDITIONAL INFO SECTION -->
            <?php get_template_part( 'parts/recipe-snippets/additional-info' ); ?>

            <!-- RECIPE IMAGE GALLERY -->
            <?php get_template_part( 'parts/recipe-snippets/recipe-gallery' ); ?>

            <div id="jump-to-recipe" class="small-12 cell small-order-4 medium-order-4 large-order-4">
                <div class="single-recipe-save">
                  <?php the_favorites_button(); ?>
                </div>
                <!-- RECIPE CARD -->
                <?php

                // Access the first recipe, if there is one.
                if ( isset( $recipes[0] ) ) {
                    $recipe_id = $recipes[0];
                    $recipe = WPRM_Recipe_Manager::get_recipe( $recipe_id );

                    echo do_shortcode('[wprm-recipe id=' . $recipe_id . ']');
                }

                // Get the recipes inside the current post.
                $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

                // Access the first recipe, if there is one.
                if ( isset( $recipes[0] ) ) {
                  $recipe_id = $recipes[0];
                  $recipe = WPRM_Recipe_Manager::get_recipe( $recipe_id );

                }

                ?>

            </div>

            <div class="small-12 cell small-order-5 medium-order-5 large-order-5">

              <div class="grid-x">

                  <div class="small-12 cell text-center recipe-footer-ctas">
                    <!-- <a class="button add_a_question">Ask A Question</a> <span>OR</span>  -->
                    <a class="button" data-featherlight="#commentsModal">Leave A Review</a>
                  </div>

              </div>

            </div>

            <div id="recipe-feedback" class="small-12 cell small-order-6 medium-order-6 large-order-6">
                <?php get_template_part( 'parts/recipe-snippets/recipe-footer' ); ?>

                <div class="grid-x">
                    <div class="small-12 large-12 cell">

                        <?php comments_template(); ?>

                    </div>

                </div>

            </div>

        </div> <!-- end #inner-content -->

    </div>

</div> <!-- end #content -->

<!-- RECIPE FOOTER -->


<div id="recipes-modal">
  <?php get_template_part( 'parts/snippets/comments-form-modal' ); ?>
</div>

<?php get_footer(); ?>
