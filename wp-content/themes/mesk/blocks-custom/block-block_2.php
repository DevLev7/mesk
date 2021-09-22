
    <div id="block_2" >
      
      <div class="container-fluid">
          <div class="block_2">
              <div class="row">
                  <div class="col-12">
                      <div class="content">
                          <div class=" animate__animated animate__backInLeft wow" data-wow-duration="2s" data-wow-delay="100ms"> 
                            <?php echo get_field('bl2_title'); ?>
                          </div>
                          <div class="favor_wrap">
                            <?php 
							while( have_rows('rep1') ): the_row(); 
							
                                $text = get_sub_field('text');
                                $title = get_sub_field('title');
							?>
								<div class="favor_item animate__animated animate__pulse wow" data-wow-duration="2s" data-wow-delay="100ms">
                                    <div class="favor_content">
                                       <div class="title">
                                       <?php echo $title; ?>
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