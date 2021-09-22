<?php /* Template Name: Простой шаблон */?>
<?php get_header(); ?>

	<section id="privacy">
		<div class="container-fluid">
			<div class="header">
				<h1><?php the_title();?></h1>
			</div>
			<div class="content list">
				<?php the_content();?>
			</div>
		</div>
	</section>

	
<?php get_footer(); ?>