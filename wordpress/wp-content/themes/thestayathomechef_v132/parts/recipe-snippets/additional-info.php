<?php 
$ai_img = get_field('additional_info_image');
$ai_content = get_field('additional_info');

if($ai_content || $ai_img): ?>

    <div class="small-12 cell small-order-2 medium-order-3 large-order-3 ai-info-container">

        <div class="grid-x grid-padding-x grid-margin-x">
         
            <div class="small-12 medium-6 large-4 cell">

                <div class="ai-img" style="background-image: url('<?php echo $ai_img; ?>');">
                    
                </div>

            </div>
            
            <div class="small-12 medium-6 large-8 cell">

              <?php echo $ai_content; ?>

            </div>
            
        </div>

    </div>

<?php endif; ?>
