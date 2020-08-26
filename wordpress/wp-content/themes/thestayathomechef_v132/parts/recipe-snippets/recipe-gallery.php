<?php $recipe_gallery = get_field('step_by_step_gallery'); ?>

<?php if($recipe_gallery): ?>

    <div class="small-12 cell small-order-3 medium-order-4 large-order-4 text-center gallery">

        <div class="h6 dots">Step-By-Step</div>

        <div class="recipe-gallery">

            <?php foreach( $recipe_gallery as $image ): ?>

                <div class="image" style="background-image: url('<?php echo $image['url']; ?>');"></div>

            <?php endforeach; ?>

        </div>

        <div class="gallery-prev"><i class="fas fa-angle-left"></i></div>

        <div class="gallery-next"><i class="fas fa-angle-right"></i></div>

    </div>

<?php endif; ?>