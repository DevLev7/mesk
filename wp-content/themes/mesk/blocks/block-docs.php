<section id="block_8" class="gallery gallery-docs ">

	
	<div class="sq4"></div>		
<div class="row">
<div class="col-12">
	<div class="container-fluid">
	<div class="header list">
		<div class="animate__backInLeft animate__animated wow" data-wow-duration="2s" data-wow-delay="100ms">
		<?php the_field('docs-header','option'); ?>
       </div>		
		<div class="slider-arrow">
		<a class="prev">
		<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18"><path id="icons8-chevron_down" d="M0,10V6L9,0l9,6v4L9,4Z" transform="translate(0 18) rotate(-90)" fill="#fff"/></svg>

			</a>
			<a class="next">
			<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18"><path id="icons8-chevron_down" d="M3,8v4l9,6,9-6V8l-9,6Z" transform="translate(-8 21) rotate(-90)" fill="#674500"/></svg>

			</a>
		</div>
		</div>
	</div>
	
	</div>
	<div class="left-block"></div>
	<div class=" docs">
	
		<div class="slider slider-docs1 swiper-container">
			<div class="swiper-wrapper">
				<?php
				$gallery_arr = get_field('docs-repeater','option');
				foreach( $gallery_arr as $image ):
				?>
					<div class="image swiper-slide">
						<? if(get_field('docs-setting','option')['zoom']) { ?>
						<a href="<?php echo $image['url']; ?>" class="frame1" data-fancybox='docs-<?php echo $building_row; ?>'>
						<? }else{ ?>
						<div class="">
						<? } ?>
							<img class="lazy" data-src="<?php echo $image['sizes']['team']; ?>" >
						<? echo get_field('docs-setting','option')['zoom'] ? '</a>' : '</div>' ; ?>
						<div class="name">
						<?php echo $image['title']; ?>
				</div>
					</div>
				
				<?php 
				endforeach;
				?>
				
			</div>
		</div>
		<div class="gallery-arrow-docs"></div>
	</div>
	
</div>

<div class="row">
	<div class="col-s">
		<div class="footer list">
			<?php the_field('docs-footer','option'); ?>
		</div>
	</div>
</div>
</section>


<script>
const swiper = new Swiper('#block_8 .swiper-container', {
ion: {
el: ".swiper-pagination",
loop: true,
type: "fraction",
},

direction: 'horizontal',

slidesPerView: 4.7,

navigation: {
nextEl: '.next',
prevEl: '.prev',
},
breakpoints: {
200: {
		slidesPerView: 1.5
			  },
499: {
		slidesPerView: 2.5
			  },
1023: {
		slidesPerView: 4
	  },
 1151: {
		slidesPerView: 4.2
	  },
// 1921: {
// slidesPerView: 3
// },
},


});
</script>