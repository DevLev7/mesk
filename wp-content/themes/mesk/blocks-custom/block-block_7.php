<div id="block_7" >
<img  class="bl7_1 lazy " src="<?php echo THEME_IMAGES; ?>/bl7_1.png" alt="">
<img  class="bl7_2 lazy " data-src="<?php echo THEME_IMAGES; ?>/bl7_2.png" alt="">
<img  class="bl7_3 lazy " data-src="<?php echo THEME_IMAGES; ?>/bl7_3.png" alt="">
<img  class="bl7_4 lazy " src="<?php echo THEME_IMAGES; ?>/bl7_4.png" alt="">
      <div class="container-fluid">
          <div class="block_7">
              <div class="row">
                  <div class="col-12">
                      <div class="content">
                      <div class="text-block ">
                          <?php echo get_field('bl7_title'); ?>
                    </div>
                    <div class="text-block2 " >
                        <?php echo get_field('text_right'); ?>
                    </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>

<script>

var block_show7 = false;

function scrollTracking6(){
    if (block_show7) {
        return false;
    }

    var wt = $(window).scrollTop();
    var et = $('#block_7').offset().top;

    if ( (et*0.89) < wt){
        block_show7 = true;
        $('#block_7').addClass('show')
	
		
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.src = "//api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&onload=init";
		$("#map-3").append(s);
		console.log(s)
    }
}
$(document).ready(function(){
  scrollTracking6();
  $(window).scroll(function(){
      scrollTracking6();
  });
});








</script>