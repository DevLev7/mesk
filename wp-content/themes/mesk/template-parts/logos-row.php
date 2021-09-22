<?
	$items = $logos.'-repeater';
	if ($type == 'section'){
		$header = get_sub_field('header');
		$footer = get_sub_field('footer');
	}else{
		$header = get_field($logos.'-header','option');
		$footer = get_field($logos.'-footer','option');
	}
?>
	
	<section class="logos-row hor-scroll">
	<div class="sq5 wow" data-wow-duration="2s" data-wow-delay="100ms" ></div>
		<div class="sq6 wow" data-wow-duration="2s" data-wow-delay="100ms" ></div>
		<div class="sq7 wow" data-wow-duration="2s" data-wow-delay="100ms" ></div>
		<div class="sq8 wow" data-wow-duration="2s" data-wow-delay="100ms" ></div>
		<div class="container-fluid">
			
			<? if( $header) { ?>
			<div class="header " >
				<? echo $header; ?>
			</div>
			<? } ?>
			<a class="more_cl">Посмотреть все компании</a>
			<div class="items">
			<?php
			$id_logo=0;
			while( have_rows($items,'option') ): the_row(); 
				$logo = get_sub_field('logo');
				$desc = get_sub_field('desc');
				$link = get_sub_field('link');
				$id_logo++;
			?>
				<?php  if($id_logo <=7 ) { ?>
				<<? echo $link ? 'a href="'.$link.'"' : 'div'; ?> class="item">
					<?php if($logo){ ?>
					<div class="logo">
						<img class="lazy" data-src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>' >
					</div>
					<?php } ?>
					<div class="desc">
						<?php echo $desc; ?>
					</div>
				</<? echo $link ? 'a' : 'div'; ?>>
				<?php	} 	?>
				
				<?php  if($id_logo > 8 ) { ?>
				<<? echo $link ? 'a href="'.$link.'"' : 'div'; ?> class="item more_logo">
					<?php if($logo){ ?>
					<div class="logo">
						<img class="lazy" data-src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>' >
					</div>
					<?php } ?>
					<div class="desc">
						<?php echo $desc; ?>
					</div>
				</<? echo $link ? 'a' : 'div'; ?>>
				<?php	} 	?>
			<?php 
			endwhile; 
			?>
			</div> 
			<? if( $footer) { ?>
			<div class="footer list">
				<? echo $footer; ?>
			</div>
			<? } ?>
		</div> 
	</section>

	<script>

$('div.more_logo').hide()

$('.logos-row  .more_cl').click(function(){
if($('.logos-row .more_logo').css('display') == 'none'){
	$('.logos-row .more_cl span').text('Свернуть')
}else{
	$('.logos-row .more_cl span').text('Смотреть ещё')
	
}
$('.logos-row div.more_logo').slideToggle();

})

	</script>