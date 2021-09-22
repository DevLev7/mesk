
    <div id="block_5" >
        
        <div class="sq1"></div>
        <img  class="bl5_1 lazy " data-src="<?php echo THEME_IMAGES; ?>/bl5_1.png" alt="">
        <div class="sq2"></div>
       
        <div class="sq3"></div>

    <svg class="linii2" xmlns="http://www.w3.org/2000/svg" width="1977.018" height="1770.98" viewBox="0 0 1977.018 1770.98">
  <g id="Сгруппировать_1728" data-name="Сгруппировать 1728" transform="translate(-0.5 -931.074)">
    <line id="Линия_9" data-name="Линия 9" x2="1920" transform="translate(0.5 1428.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_11" data-name="Линия 11" y2="1554.055" transform="translate(694 950)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_12" data-name="Линия 12" y2="1752.055" transform="translate(940 950)" fill="none" stroke="#363636" stroke-width="1"/>
    <path id="Контур_28" data-name="Контур 28" d="M1037.018,829.009c0-286.365-232.144-518.509-518.509-518.509S0,542.644,0,829.009" transform="translate(940 1118)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_13" data-name="Линия 13" x1="1627" y2="1002" transform="translate(122.5 931.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_17" data-name="Линия 17" y2="983" transform="translate(122.5 950)" fill="none" stroke="#363636" stroke-width="1"/>
    <path id="Контур_44" data-name="Контур 44" d="M572,310.5c0,157.953-128.047,286-286,286S0,468.453,0,310.5" transform="translate(122.5 832.259)" fill="none" stroke="#363636" stroke-width="1"/>
  </g>
</svg>

      <div class="container-fluid">
          <div class="block_5">
              <div class="row">
                  <div class="col-12">
                      <div class="content">
                          <div class="text_block animate__fadeInRight animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms">
                            <?php echo get_field('bl5_text'); ?>
                          </div>
                          
                          <div class="favor_wrap">
                            <?php 
							while( have_rows('rep4') ): the_row(); 
							
                                $text = get_sub_field('text');
                                $title = get_sub_field('title');
                                $number = get_sub_field('number');
							?>
								<div class="favor_item animate__fadeIn animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms">
                                   
                                    <div class="favor_content">
                                        <div class="number">
                                            <?php echo $number; ?>
                                        </div>
                                        <div class="favor_text">
                                            <div class="title"> <?php echo $title; ?></div>
                                           <div class="text"><?php echo $text; ?></div>
                                            
                                        </div>
                                    </div>
								</div>
                            <?php 
							endwhile;
							wp_reset_query();
							?>
                        </div>
                            <div class="text-block2 animate__fadeInUp animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms">
                            <?php echo get_field('bl5_text2'); ?>
                            <div class="button">
                                    <a data-src="#popup-order" data-fancybox class="btn"><span><?php echo get_field('bl5_name_btn'); ?></span></a>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>


