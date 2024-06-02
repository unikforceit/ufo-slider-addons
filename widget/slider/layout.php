<div class="ufo-slider-section"
     data-ufo-slideView="<?php echo $settings['slideView']['size']?>"
     data-ufo-slideGap="<?php echo $settings['slideGap']['size']?>"
     data-ufo-slideViewMobile="<?php echo $settings['slideViewMobile']['size']?>"
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
    <div class="swiper ufo-slider-wrapper" id="<?php echo 'sliderID'.uniqid();?>">
        <div class="swiper-wrapper">
        <?php if ($slider){
            foreach ($slider as $slide){
            ?>
            <div class="swiper-slide">
                <div class="ufo-slider-item-wrapper <?php echo 'elementor-repeater-item-'.$slide['_id'];?>">
                    <div class="ufo-slider-image-wrapper">
                        <div class="ufo-slider-image">
                            <?php echo wp_get_attachment_image($slide['Slider-image']['id'], 'full');?>
                        </div>
                       <?php if ($slide['show-toggle'] && !empty($slide['Slider-toggle-description'])){?>
                        <div class="ufo-toggle-content">
                            <?php echo ufochangeHeading($settings['title_tag'], $slide['Slider-toggle-heading']);?>
                            <?php echo $slide['Slider-toggle-description'];?>
                        </div>
                        <span class="ufo-toggle">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['plus'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
                        <?php } ?>
                    </div>
                    <div class="ufo-slider-content">
                        <?php echo ufochangeHeading($settings['title_tag'], $slide['Slider-heading']);?>
                        <div class="ufo-slider-info"><?php echo $slide['Slider-description'];?></div>
                    </div>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
    <?php if ($settings['navEnable']){?>
    <div class="swiper-button-next"><?php \Elementor\Icons_Manager::render_icon( $settings['Next'], [ 'aria-hidden' => 'true' ] ); ?></div>
    <div class="swiper-button-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['Prev'], [ 'aria-hidden' => 'true' ] ); ?></div>
    <?php }?>
</div>