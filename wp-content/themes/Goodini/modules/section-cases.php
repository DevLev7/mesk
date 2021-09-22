	<section class="cases">
		<div class="container-fluid">
			<div class="header-block">
				<div class="header list">
					<?php the_sub_field('header'); ?>
				</div>
				<div class="cases-arrow"></div>
			</div>
			<?php if(get_sub_field('type')== 'slider'){ ?>
			<div class="slider">
			<?php 		
				if(get_sub_field('items')){
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'post__in' => get_sub_field('items'),
						'order' => 'ASC',
					);
				}else{
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}	
				$the_query = new WP_Query( $args );
				$case_num = "";
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$case_num++;
					$gallery_arr = get_field('gallery');
					$customer = get_field('detail')['customer'];
					$year = get_field('detail')['year'];
					$town = get_field('detail')['town'];
					$intro = get_field('detail')['intro'];
					$budget = get_field('detail')['budget'];
					$worklist = get_field('work-list');
					$workequipment = get_field('work-equipment');
				?>
					<div class="item">
						<div class="case">
							<div class="row">
								<div class="col-ml-5 col-12">
									<div class="case-gallery">
										<div class="case-gallery-slider">
											<?php
											foreach( $gallery_arr as $image ):
											?>
												<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" style="background-image: url(<?php echo $image['sizes']['item']; ?>);">
												</a>
											<?php
											endforeach;
											?>
										</div>
									</div>
								</div>
								<div class="col-ml-7 col-12">
									<div class="content">
										
										<div class="title">
											<h3><?php the_title();?></h3>
										</div>
										
										<?php if($customer || $town || $year || $intro){ ?>
										<div class="info-block">
										
											<?php if($intro){ ?>
											<div class="intro list">
												<?php echo $intro;?>
											</div>
											<?php } ?>
											
											<?php if($customer || $town || $year){ ?>
											<div class="info">
												<?php if($customer){ ?>
												<div class="detail">
													<svg viewBox="0 0 24 24">
														<path d="M20,6H16V4A2,2 0 0,0 14,2H10C8.89,2 8,2.89 8,4V6H4C2.89,6 2,6.89 2,8V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V8A2,2 0 0,0 20,6M10,4H14V6H10V4M12,9A2.5,2.5 0 0,1 14.5,11.5A2.5,2.5 0 0,1 12,14A2.5,2.5 0 0,1 9.5,11.5A2.5,2.5 0 0,1 12,9M17,19H7V17.75C7,16.37 9.24,15.25 12,15.25C14.76,15.25 17,16.37 17,17.75V19Z" />
													</svg>
													<?php echo $customer; ?>
												</div>
												<?php } ?>
												<?php if($town){ ?>
												<div class="detail">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano"><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.5 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5L406.23 251.687c13.375-24.76 20.438-52.77 20.438-81.02C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.28-85.333-85.333S208.948 85.334 256 85.334s85.333 38.28 85.333 85.333S303.052 256 256 256z"/></svg>
													<?php echo $town; ?>
												</div>
												<?php } ?>
												<?php if($year){ ?>
												<div class="detail">
													<svg viewBox="0 0 24 24">
														<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M17 13H11V7H12.5V11.5H17V13Z" />
													</svg>
													<?php echo is_numeric($year) ? $year . " г." : $year; ?>
												</div>
												<?php } ?>
												<?php if($budget){ ?>
												<li class="budget">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" xmlns:v="https://vecta.io/nano"><path d="M2 5h20v15H2V5m18 13V7H4v11h16M17 8a2 2 0 0 0 2 2v5a2 2 0 0 0-2 2H7a2 2 0 0 0-2-2v-5a2 2 0 0 0 2-2h10m0 5v-1c0-1.1-.67-2-1.5-2s-1.5.9-1.5 2v1c0 1.1.67 2 1.5 2s1.5-.9 1.5-2m-1.5-2a.5.5 0 0 1 .5.5v2a.5.5 0 1 1-1 0v-2a.5.5 0 0 1 .5-.5M13 13v-1c0-1.1-.67-2-1.5-2s-1.5.9-1.5 2v1c0 1.1.67 2 1.5 2s1.5-.9 1.5-2m-1.5-2a.5.5 0 0 1 .5.5v2a.5.5 0 1 1-1 0v-2a.5.5 0 0 1 .5-.5M8 15h1v-5H8l-1 .5v1l1-.5v4z"/></svg>
													<?php echo $budget; ?>
												</li>
												<?php } ?>
											</div>
											<?php } ?>
										</div>
										<?php } ?>
										
										<div class="work">
										<?php if($worklist){ ?>
										<div class="worklist list">
											<div class="head">
												Задача:
											</div>
											<?php echo $worklist;?>
										</div>
										<?php } ?>
										
										<?php if($workequipment){ ?>
										<div class="workequipment list">
											<div class="head">
												Решение:
											</div>
											<?php echo $workequipment;?>
										</div>
										<?php } ?>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php 
				endwhile; 
				wp_reset_query();
				?>
			</div>
			<?php }elseif(get_sub_field('type')== 'grid'){ ?>
			<div class="grid">
			<?php 			
				if(get_sub_field('items')){
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'post__in' =>get_sub_field('items'),
						//'order' => 'ASC',
						'orderby' => 'post__in',
					);
				}else{
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}	
				$the_query = new WP_Query( $args );
				$case_num = "";
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$case_num++;
					$gallery_arr = get_field('gallery');
					$logo = get_field('detail')['logo'];
					$year = get_field('detail')['year'];
					$intro = get_field('detail')['intro'];
					$doc = get_field('detail')['doc'];
					if($case_num <=12){
				?>
					<div class="item item-<?php echo $case_num; ?>">
						<div class="case">
							<div class="images">
								<?php
								$image_item = "";
								foreach( $gallery_arr as $image ):
								$image_item++;
								$image_style = "";
								if($image_item==1){
								?>
									<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" <? echo $image_style; ?>>
										<div class=" progressive replace" data-href="<?php echo $image['url']; ?>">
											<img src="<? echo $gallery_arr[0]["sizes"]['micro'];?>" class="preview" alt="<?php the_title();?>" />
										</div>
									</a>
								<?php
								}else{
								?>
									<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>'></a>
								<?php
								}
								endforeach;
								?>
							</div>
							<div class="wrap <?php echo $intro ? "intro-on" : "" ;?>">
								<div class="title">
									<h3><?php the_title();?></h3>
								</div>
								<div class="intro">
									<?php echo $intro;?>
								</div>
							</div>
						</div>
					</div>
				<?php 
					}
				endwhile; 
				wp_reset_query();
				?>
			</div>
			<?php } ?>
			
			<?php if(get_sub_field('footer')){ ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
			<?php } ?>
		</div>
	</section>