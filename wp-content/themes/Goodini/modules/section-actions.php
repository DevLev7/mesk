<?php 
$header = get_sub_field('header'); 
$actionsIDs = get_sub_field('actions-section'); 


// Фон
$stylegroup = get_sub_field('style-group')['style-bg'];
$stylegroup_color = '';
if($stylegroup!='style-bg-none'){
	$stylegroup_color = "bg-color";
} 

// Массив стилей текста
$styletext_arr = get_sub_field('style-group')['style-text'];
foreach ($styletext_arr as $styletext_value) {
	$styletext .= ' '.$styletext_value;
}
?>

	<section id="<?php echo $building_row; ?>" class="actions-section <?php echo $stylegroup_color.' '.$stylegroup.$styletext;?>">
		<div class="container-fluid">
		<div class="row">
		<div class="col-m">
			<div class="header list">
				<?php echo $header; ?>
			</div>
			<div class="actions-block">
				<div class="slider">
					<?php					
					$args = array(
						'post_type' => array('actions'),
						'showposts' => -1,
						'post__in' => $actionsIDs,
					);
					
					$the_query = new WP_Query( $args );
					$count_actions = str_pad( $the_query->found_posts, 2, '0', STR_PAD_LEFT);
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$title = get_the_title();
						$image = get_field('image')['sizes']['team'];
						$intro = get_field('intro');
					?>			
					<div class="slide">
						<div class="item">
							<div class="image">
								<div class="img">
									<img data-lazy="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
								</div>
							</div>
							<div class="text">
								<div class="title">
									<h3><?php echo $title; ?></h3>
								</div>
								<div class="intro list">
									<?php echo $intro; ?>
								</div>
								<div class="button">
									<button class="btn"><span data-src="#popup-action" class="link" data-fancybox="">Участвовать в акции</span></button>
								</div>
							</div>
						</div>
					</div>
					<?php 
					endwhile;
					wp_reset_query();
					?>
				</div>			
				<div class="actions-slider-arrow"></div>
			</div>	
		</div>
		</div>
		</div>
	</section>