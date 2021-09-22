<div id="block_6" >
<img  class="bl6_1 lazy " src="<?php echo THEME_IMAGES; ?>/bl6_1.png" alt="">
<img  class="bl6_2 lazy animate__tada animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms" src="<?php echo THEME_IMAGES; ?>/bl6_2.png" alt="">
<div class="bl6_3 img_anima animate__fadeInRight animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms">
  <img  class=" lazy "  src="<?php echo THEME_IMAGES; ?>/bl6_3.png" alt="">
</div>  


<img  class="bl6_4 lazy " src="<?php echo THEME_IMAGES; ?>/bl6_4.png" alt="">
<svg class="linii3" xmlns="http://www.w3.org/2000/svg" width="1920.707" height="1968.354" viewBox="0 0 1920.707 1968.354">
  <g id="Сгруппировать_1816" data-name="Сгруппировать 1816" transform="translate(-0.146 -5894.146)">
    <line id="Линия_170" data-name="Линия 170" y1="960" x2="960" transform="translate(960.5 5894.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_173" data-name="Линия 173" x1="960" y1="960" transform="translate(960.5 5894.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_171" data-name="Линия 171" x1="960" y1="960" transform="translate(0.5 5894.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_172" data-name="Линия 172" y1="960" x2="960" transform="translate(0.5 5894.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <line id="Линия_169" data-name="Линия 169" y2="1719" transform="translate(960.5 6143.5)" fill="none" stroke="#363636" stroke-width="1"/>
    <g id="Сгруппировать_1798" data-name="Сгруппировать 1798" transform="translate(1 -114)">
      <line id="Линия_174" data-name="Линия 174" x2="19" y2="19" transform="translate(470.5 6478.5)" fill="none" stroke="#8d8d8e" stroke-width="2"/>
      <line id="Линия_175" data-name="Линия 175" x1="19" y2="19" transform="translate(470.5 6478.5)" fill="none" stroke="#8d8d8e" stroke-width="2"/>
    </g>
    <g id="Сгруппировать_1799" data-name="Сгруппировать 1799" transform="translate(960 -114)">
      <line id="Линия_174-2" data-name="Линия 174" x2="19" y2="19" transform="translate(470.5 6478.5)" fill="none" stroke="#8d8d8e" stroke-width="2"/>
      <line id="Линия_175-2" data-name="Линия 175" x1="19" y2="19" transform="translate(470.5 6478.5)" fill="none" stroke="#8d8d8e" stroke-width="2"/>
    </g>
  </g>
</svg>

      <div class="container-fluid">
          <div class="block_6">
              <div class="row">
                  <div class="col-12">
                      <div class="content">
                          <div class="text-block "  >
                             <?php echo get_field('bl6_title'); ?>
                        </div>
                          <div class="favor_wrap">
                            <?php 
							while( have_rows('rep5') ): the_row(); 
                                $name= get_sub_field('name');
                                $text = get_sub_field('text');
                            
							?>
								<div class="favor_item wow" data-wow-duration="2s" data-wow-delay="100ms" >
                                    <div class="favor_content">
                                    <div class="name">
                                            <?php echo $name; ?>
                                        </div>
                                        <div class="text">
                                            <?php echo $text; ?>
                                        </div>
                                    </div>
								</div>
                            <?php 
							endwhile;
							wp_reset_query();
							?>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>