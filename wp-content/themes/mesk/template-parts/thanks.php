<?php get_header(); ?>
<?php 
if ( !is_page_template(get_option( 'page_on_front' )) ) {
$hero_bg = get_field('group', get_option( 'page_on_front' ))['hero-bg']['url'];
$hero_bg_micro = get_field('group', get_option( 'page_on_front' ))['hero-bg']['sizes']['micro-item'];
?>
	<section id="hero" 
	class="<?php echo get_field('group', get_option( 'page_on_front' ))['hero-image'] ? "hero-image" : ""; ?>" 
	<?php echo $hero_bg ? 'style="background-image: url('.$hero_bg.'), url('.$hero_bg_micro.')"' : '' ; ?>
	>
<?php }else{ ?>
	<section id="hero" 	class="hero-image">	
<?php } ?>	
<svg class="setka" xmlns="http://www.w3.org/2000/svg" width="1920" height="801.916" viewBox="0 0 1920 801.916">
  <g id="сетка" transform="translate(-0.5 -200.5)">
    <line id="Линия_23" data-name="Линия 23" y2="801.916" transform="translate(483.563 200.5)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_24" data-name="Линия 24" y2="685.416" transform="translate(961.209 317)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_25" data-name="Линия 25" y2="801.916" transform="translate(1438.854 200.5)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_26" data-name="Линия 26" x2="1920" transform="translate(0.5 959)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_29" data-name="Линия 29" x2="1920" transform="translate(0.5 637)" fill="none" stroke="#4a4950" stroke-width="1"/>
    <line id="Линия_27" data-name="Линия 27" x2="1920" transform="translate(0.5 315)" fill="none" stroke="#4a4950" stroke-width="1"/>
  </g>
</svg>
<img  class="th_1 lazy "src="<?php echo THEME_IMAGES; ?>/th_1.png" alt="">
		<div class="container-fluid">
			<div class="row">
				<div class=" col-12">
					<div class="main">
						<div class="wrap">
							<div class="header list">
								<h1>Спасибо</h1>
								<h3>Ожидайте звонка менеджера</h3>
							</div>
							<div class="button">
								<button type="button" onclick="history.back();" class="btn"><span>Вернуться назад</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>