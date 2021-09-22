
    <div id="block_3" >
    <svg class="linii" xmlns="http://www.w3.org/2000/svg" width="1921" height="1171" viewBox="0 0 1921 1171">
  <g id="линий" transform="translate(-0.5 -2786)">
    <line id="Линия_31" data-name="Линия 31" x2="1921" transform="translate(0.5 3016.5)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_32" data-name="Линия 32" y2="1171" transform="translate(680 2786)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_36" data-name="Линия 36" y2="1171" transform="translate(1796 2786)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_35" data-name="Линия 35" y2="1171" transform="translate(122 2786)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_33" data-name="Линия 33" y2="1171" transform="translate(1239 2786)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_34" data-name="Линия 34" x2="1674" transform="translate(122.5 3486.5)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_37" data-name="Линия 37" x2="1674" transform="translate(122.5 3956.5)" fill="none" stroke="#4a4950" stroke-width="1"/>
  </g>
</svg>
      <div class="container-fluid">
          <div class="block_3">
              <div class="row">
                  <div class="col-12">
                      <div class="content">
                      <div class="title_block animate__animated  wow animate__backInLeft" data-wow-duration="1s" data-wow-delay="100ms"> 
                          <?php echo get_field('bl3_text'); ?>
                    </div>
                          <div class="favor_wrap">
                            <?php 
                            $id=0;
							while( have_rows('rep2') ): the_row(); 
								$img = get_sub_field('img');
                                $name = get_sub_field('name');
                                $city = get_sub_field('city');
                                $year= get_sub_field('year');
                                $task = get_sub_field('task');
                                $decision = get_sub_field('decision');
                                $time = get_sub_field('time');
                                $id++;
                                
							?>
                                <? if ( $id <=2){?>
								<div class="favor_item " >
                                    <div class="favor_content">
                                        <div class="image " >
                                            <img class="lazy  wow" data-src="<?php echo $img; ?>" alt="" data-wow-duration="1s" data-wow-delay="100ms">
                                            
                                        </div>
                                        <div class="favor_text" style="background-image:url(<?php echo $img; ?>)">
                                        <div class="layer">
                                        </div>
                                        <div class="text  wow" data-wow-duration="1s" data-wow-delay="500ms">
                                            <div class="name">  <?php echo $name; ?></div>
                                            <div class="city">  <?php echo $city; ?></div>
                                            <div class="year">  <?php echo $year; ?></div>
                                            <div class="task_block">
                                                <span class="span_name">Задача:</span>
                                                <span>  <?php echo $task; ?></span>
                                            </div>
                                            <div class="decision_block">
                                                <span class="span_name">Решение:</span>
                                                <span>  <?php echo $decision; ?></span>
                                            </div>
                                            <div class="time_block">
                                                <span class="span_name">Срок:</span>
                                                <span>  <?php echo $time; ?></span>
                                            </div>
                                            </div> 
                                            </div>
                                    </div>
								</div>
                                <? } ?>
                                <? if ( $id > 2){?>
								<div class="favor_item more_list animate__animated animate__fadeInUp wow" data-wow-duration="2s" data-wow-delay="100ms">
                                    <div class="favor_content">
                                        <div class="image">
                                            <img class="lazy" data-src="<?php echo $img; ?>" alt="">
                                            
                                        </div>
                                        <div class="favor_text" style="background-image:url(<?php echo $img; ?>)">
                                        <div class="layer">
                                        </div>
                                        <div class="text">
                                            <div class="name">  <?php echo $name; ?></div>
                                            <div class="city">  <?php echo $city; ?></div>
                                            <div class="year">  <?php echo $year; ?></div>
                                            <div class="task_block">
                                                <span class="span_name">Задача:</span>
                                                <span>  <?php echo $task; ?></span>
                                            </div>
                                            <div class="decision_block">
                                                <span class="span_name">Решение:</span>
                                                <span>  <?php echo $decision; ?></span>
                                            </div>
                                            <div class="time_block">
                                                <span class="span_name">Срок:</span>
                                                <span>  <?php echo $time; ?></span>
                                            </div>
                                            </div> 
                                            </div>
                                    </div>
								</div>
                                <? } ?>
                            <?php 
							endwhile;
							wp_reset_query();
							?>
                        </div>
                        <a class="more"><span>Смотреть ещё</span></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>


<script>

$('div.more_list').hide()

$('#block_3  .more').click(function(){
if($('#block_3  .more_list').css('display') == 'none'){
	$('#block_3   .more span').text('Свернуть')
}else{
	$('#block_3   .more span').text('Смотреть ещё')
	
}
$('#block_3  div.more_list').slideToggle();

})


</script>