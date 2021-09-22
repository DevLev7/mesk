<div id="block_4" >
    <div class="el1"></div>
        <div class="bl4_1">
        <img  class=" lazy  " data-src="<?php echo THEME_IMAGES; ?>/bl4_2.png" alt="">
        <img  class=" lazy el" data-src="<?php echo THEME_IMAGES; ?>/bl4_1.png" alt="">
        </div>
       
      <div class="container-fluid">
          <div class="block_4">
              <div class="row">
                  <div class="col-12">
                      
                      <div class="content">
                            <div class="title-block animate__fadeInLeft animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms"> 
                                <?php echo get_field('bl4_title'); ?>
                                <?php echo get_field('bl4_text'); ?>
                            </div>   
                                    <div class="favor_wrap">
                                        <?php 
                                        while( have_rows('rep3') ): the_row(); 
                                        $img = get_sub_field('img');
                                            $text = get_sub_field('text');
                                            $title = get_sub_field('title');
                                        ?>
                                            <div class="favor_item " >
                                                <div class="favor_content">
                                                    <div class="image wow " data-wow-duration="1s" data-wow-delay="100ms">
                                                   
                                                        <img class="lazy " src=" <?php echo $img; ?>" alt="" >
                                                    </div>
                                                    <div class="text_block">
                                                        <div class="title"> <?php echo $title; ?></div>
                                                        <div class="text"> <?php echo $text; ?></div>
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