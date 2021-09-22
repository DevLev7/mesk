<?php 
	get_header();
?>
	
	<section id="hero">
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-7 col-12">
					<div class="main">
						<div class="wrap">
							<div class="header list ml3">
								<h1>Результаты поиска</h1>
							</div>
							
							<div class="intro list">
								<p>Вы искали <strong>"<?php echo get_search_query(); ?>"</strong>.<br>	Страницы, которые содержат данную фразу:</p>
							</div>
							
							<?php 
							if ( have_posts() ) : 
							?>
							<div class="list">
								<ol>
									<?php 
									while ( have_posts() ) : the_post(); 
									$alt_text = get_field('hero-header');
									preg_match('/<h1[^>]*?>(.*?)<\/h1>/si',$alt_text,$alt_preg);
									$alt = strip_tags($alt_preg[1]);
									
									$parent_ID = array_pop(get_post_ancestors(get_the_ID()));
									$parent_title = get_the_title( $parent_ID);
									if($parent_ID){
										$parent_title = '<span class="parent_title">'.$parent_title.'. — </span>';
									}else{
										$parent_title = "";
									}

									?>
									<li>
										<a href="<?php the_permalink(); ?>" class="link">
											<?php echo $parent_title.get_the_title().'. '.$alt; ?>
										</a>
									</li>
									<?php 
									endwhile; 
									?>
								</ol>
							</div>
							<?php
							else :
							echo "Извините, по Вашему запросу ничего не найдено";
							endif;
							?>
			
							<?php get_template_part('blocks/block','pagination');?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php 
	get_footer(); 
?>