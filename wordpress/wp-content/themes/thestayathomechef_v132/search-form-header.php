<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text show-for-sr">Search Stay At Home Chef Recipes</label>
        <input type="search" id="s" name="s" value="" aria-label="search stay at home chef" placeholder="ex. recipe, ingredients..." />

        <button type="submit" id="searchsubmit" ><?php _e('Search','stayathomechef'); ?></button>
    </div>
</form>