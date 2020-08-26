<?php if (is_user_logged_in()): ?>
	<?php
 /*
  * Template Name: Recipe Box
  *
  * This is the template that displays all pages by default.
  */
 $current_user = wp_get_current_user();

 get_header();
 ?>

<div id="main-content">

  <div id="my-recipe-box" class="grid-x">

    <div class="cell medium-3">

      <div class="recipe-box-user">

        <div class="grid-x align-middle">

          <div class="small-3 medium-12 large-3 cell">

            <div class="user-img" style="background-image: url('<?php  ?>');"></div>

          </div>

          <div class="small-9 medium-12 large-9 cell">

            <p>Hi, <strong><?php echo $current_user->user_firstname; ?>!</strong></p>

          </div>

        </div>

      </div>

      <ul class="vertical tabs" data-responsive-accordion-tabs="tabs small-accordion medium-tabs large-tabs" id="recipe-box-tabs" data-deep-link="true">

        <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">My Recipe Box</a></li>

        <li class="tabs-title"><a href="#panel2v">My Reviews</a></li>

      </ul>

      <a href="<?php echo wp_logout_url('/'); ?>" class="button">Sign Out</a>

    </div>

    <div class="cell medium-9">

      <div class="tabs-content" data-tabs-content="recipe-box-tabs">

        <div class="tabs-panel is-active" id="panel1v">

          <h1 class="h2 dots hide-for-small-only">My Recipe Box</h1>

        <?php
  /* get_template_part( 'parts/snippets/recipes-filter' ); */
  ?>

            <div class="grid-x grid-padding-x samll-up-1 medium-up-2 large-up-3 archive-grid" data-equalizer> <!--Begin Grid-->

              <!--Item: Loop through the users saved recipes-->
              <?php
              $args = array(
                'post__in' => get_user_favorites($current_user->ID),
                'filter_my_recipes' => true,
                'paged' => get_query_var( 'paged' )
              );
              $my_recipes = new WP_Query($args);

              if ($my_recipes->have_posts()):
                while ($my_recipes->have_posts()):
                  $my_recipes->the_post(); ?>
                <div class="cell panel" data-equalizer-watch>

                <article id="post-<?php the_ID(); ?>" <?php post_class(
    ''
  ); ?> role="article">

                  <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

                    <section class="featured-image" itemprop="text" style="background-image: url(<?php the_post_thumbnail_url(
                      'full'
                    ); ?>);">

                      <div class="overlay">

                        <button class="view-recipe">See Recipe</button>

                        <?php the_favorites_button(); ?>

                      </div>

                    </section> <!-- end article section -->

                    <header class="article-header">

                      <h3 class="title"><?php the_title(); ?></h3>
                      <?php
                      $recipe = WPRM_Recipe_Manager::get_recipe_ids_from_post(
                        get_the_ID()
                      );
                      $cook_time = "";
                      if (isset($recipe[0])) {
                        $recipe_id = $recipe[0];
                        $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);
                        $cook_time = convertToHoursMins(
                          $recipe->cook_time(),
                          '%02d hr %02d min'
                        );
                      }
                      ?>
                      <?php if (
                        !empty($cook_time)
                      ): ?><span class="cook-time" data-time=""><?php echo $cook_time; ?></span><?php endif; ?>

                      <span class="rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>

                    </header> <!-- end article header -->

                  </a>

                </article> <!-- end article -->
              </div>
              <?php endwhile; endif; ?>

           </div>  <!--End Grid -->
          <?php joints_page_navi($my_recipes);
                wp_reset_postdata(); ?>

        </div>

        <div class="tabs-panel" id="panel2v">

        <div class="h2 dots hide-for-small-only">My Reviews</div>

        <div class="grid-x grid-padding-x small-up-1 large-up-2 lp-testimonials">

            <?php
            $args = array(
              'user_id' => $current_user->ID // use user_id
            );
            $comments = get_comments($args);

            foreach ($comments as $comment):

              //print_r($comment);
              $comment_ID = $comment->comment_ID;
              $d = "F jS, Y";
              $comment_date = get_comment_date($d, $comment_ID);
              ?>

            <div class="cell">

              <div class="testimonial-holder">

                <div class="content-container">

                  <div class="h4"><?php echo $comment->comment_author; ?></div>

                  <p class="date"><?php echo $comment_date; ?></p>

                  <a class="view-recipe" href="<?php echo get_permalink(
                    $comment->comment_post_ID
                  ); ?>">Go to Recipe</a>

                  <div class="the-content">

                    <?php echo $comment->comment_content; ?>

                  </div>

                  <div class="triangle"></div>

                </div>

              </div>

            </div>

          <?php
            endforeach;
            ?>

        </div>

        </div>

      </div>

    </div>

  </div>

</div>
<script>
	jQuery(document).ready(function($){
		var activeFilters = $('.active-filters').data();
		const search = location.search.substring(1);
    const params = new URLSearchParams(search);

		Object.assign(activeFilters, params);

		$(document).on('click', '.is-dropdown-submenu-item', function(e){
			e.preventDefault();

			const filter = $(this).parent().data('filter');

			if(filter == 'sort') {
				var sort = $(this).find('a').data('sort');
				sort = sort.split('&');
				for(var i = 0;i < sort.length; i++) {
					const keyVal = sort[i].split('=');
					const key = keyVal[0];
					const val = keyVal[1];
					activeFilters[key] = val;
				}
			} else {
				var catType = $(this).find('a').data('type');
				var category = $(this).find('a').data('category');
				activeFilters[catType] = category;
			}

			const queryParams = $.param(activeFilters);
			window.location = window.location.href.split('?')[0] + '?' + queryParams;
		});
	});
</script>


<script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js"></script>

<style>
	li[data-index="0"] {display:none;}
	@media screen and (max-width: 1023px) {
		.dropdown.menu {margin-bottom:20px;}
	}
</style>
<script>
	jQuery(document).ready(function($){
		$('.dropdown.menu select').selectric();
	});
</script>

<?php get_footer(); ?>
<?php else: ?>
	<?php auth_redirect(); ?>
<?php endif; ?>
