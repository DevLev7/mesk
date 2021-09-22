	<div class="mobile menus">
		<?php if ( is_plugin_active( 'multycity/multycity.php' ) ) { ?>
		<div class="city">
			Ваш город:
			<span class="city_span" title="Изменить город">
				<?php echo do_shortcode( '[city_i]' ) ?>
			</span>
		</div>
		<?php } ?>
		
		<ul class="contacts ct">
			<li><?php echo do_shortcode('[phone]') ?></li>
			<li><span data-src="#popup-call" class="btn" data-fancybox=""><span>Обратный звонок</span></span></li>
			<li><?php echo do_shortcode('[adress]'); ?></li>
			<li><?php echo do_shortcode('[email]'); ?></li>
		</ul>
		
		
		<div class="flex">
			<div class="flexcolumn">
				<nav class="menu__nav">
					<?php wp_nav_menu( array(
						'theme_location' => 'main_menu',
						'fallback_cb' => ''
					) ); ?>
				</nav>	
			</div>
		</div>
		<?php get_template_part('template-parts/social-icons');?>
	</div>

	<div class="mobile-icon hidden-xl hidden-lg">
		<div class="open">
			<span class="cls"></span>
			<span></span>
			<span class="cls"></span>
		</div>
	</div>