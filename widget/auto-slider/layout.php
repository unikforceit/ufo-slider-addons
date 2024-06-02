<div class="ufo-auto-slider-section"
     data-ufo-slideView="<?php echo $settings['slideAuto'] == 'true' ? 'true' : $settings['slideView']['size'];?>"
     data-ufo-slideGap="<?php echo $settings['slideGap']['size'];?>"
     data-ufo-slideViewMobile="<?php echo $settings['slideViewMobile']['size'];?>"
     data-ufo-centered="<?php
     if ($settings['centered'] == 'true'){
         echo 'true';
     }else {
         echo 'false';
     }
     ?>"
     data-ufo-navEnable="<?php
     if ($settings['navEnable'] == 'true'){
         echo 'true';
     }else {
         echo 'false';
     }
     ?>"
>
    <div class="swiper ufo-auto-slider-wrapper" id="<?php echo 'sliderID'.uniqid();?>">
        <div class="swiper-wrapper">
        <?php if ($slider){
            foreach ($slider as $slide){
            ?>
            <div class="swiper-slide <?php echo 'elementor-repeater-item-'.$slide['_id'];?>">
                <div class="ufo-auto-slider-item-wrapper <?php echo $settings['AutoHeight'];?> <?php echo 'elementor-repeater-item-'.$slide['_id'];?>">
                    <div class="ufo-auto-slider-content">
                        <?php echo ufochangeHeading($settings['title_tag'], $slide['Slider-heading']);?>
                        <div class="ufo-auto-slider-info"><?php echo $slide['Slider-description'];?></div>
                    </div>
                    <div class="ufo-auto-slider-image">
                        <?php echo wp_get_attachment_image($slide['Slider-image']['id'], 'full');?>
                    </div>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
    <?php if ($settings['navEnable']){?>
    <div class="swiper-nav-wrapper">
        <div class="swiper-button-next"><?php \Elementor\Icons_Manager::render_icon( $settings['Next'], [ 'aria-hidden' => 'true' ] ); ?></div>
        <div class="swiper-button-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['Prev'], [ 'aria-hidden' => 'true' ] ); ?></div>
    </div>
    <?php }?>
</div>