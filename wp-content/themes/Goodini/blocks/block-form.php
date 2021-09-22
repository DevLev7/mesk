		<div class="form form-style-1 hideLabels">
			<?php if($formTitle){ ?>
			<div class="form-header">
				<div class="form-head animate-top">
					<?php echo $formTitle; ?>
				</div>
				<?php if($formDesk){ ?>
				<div class="form-desk animate-top">
					<?php echo $formDesk; ?>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			
            <form method="POST" action="<?php echo $formUrl ? $formUrl : get_page_link(get_page_by_title('Страница благодарности'));?>" class="form_block" enctype="multipart/form-data">
				<input type="hidden" name="formid" value="<?php echo $formTitle; ?>">
				<input type="hidden" name="title" value="<?php echo get_the_title(); ?>">
				<input type="hidden" name="url" value="<?php echo get_permalink(); ?>">
				<div class="hidden"><input type="text" name="e-mail"/></div>
				
				<div class="form-group animate-top">
					<input type="text" name="name1" class="form-control "/>
					<label>Ваше имя</label>
				</div>
				
				<div class="form-group animate-top">
					<input type="tel" name="phone" class="form-control required  inp"/>
					<label>Номер телефона</label>
				</div>
				
				<?php if($formEmail){ ?>
					<div class="form-group animate-top">
						<input type="email" name="email" class="form-control "/>
						<label><?php echo $formEmail; ?></label>
					</div>
				<?php } ?>
				
				<?php if($formTextarea){ ?>
				<div class="form-group animate-top">
					<textarea type="text" name="textarea" class="form-control" rows="3"></textarea>
					<label><?php echo $formTextarea; ?></label>
				</div>
				<?php } ?>	
				
				<?php if($formFile){ ?>
				<div class="box">
					<input type="file" name="attachment[]" id="attachment" class="inputfile inputmyfile" data-multiple-caption="Выбрано файлов: {count} шт." multiple="multiple">
					<label for="attachment">
						<svg viewBox="0 0 56.2 66.42"><path d="M50.59,1.5A11.25,11.25,0,0,0,35.24,5.61l-16.75,29A3.39,3.39,0,0,0,24.37,38L41.12,9a4.45,4.45,0,1,1,7.71,4.45L25,54.77A9.75,9.75,0,1,1,8.09,45l17.7-30.66A3.39,3.39,0,0,0,19.91,11L2.21,41.62A16.53,16.53,0,1,0,30.85,58.16L54.7,16.85A11.25,11.25,0,0,0,50.59,1.5Zm0,0"></path></svg> 
						<span><?php echo $formFile; ?></span>
					</label>
					<?php $file_mime_arr_option = get_field('file-mime' , 'option');
					if( is_array( $file_mime_arr_option ) ){
						
						$file_mime_arr = [] ;
						foreach( $file_mime_arr_option as $file_mime ){
							$file_mime_arr[] = $file_mime['label'];
					}}?>
					<small>Допустимые форматы: <?php echo implode( ', ', $file_mime_arr );?></small>
				</div>	
				<?php } ?>				
				
				<div class="button animate-top">
					<button type="submit" name="send" class="btn" anim="ripple"><span><?php echo $formBtn; ?></span></button>
				</div>
				
				<div class="agreement-check lt animate-top">
					<input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных" name="Agreement">
					<label class="agreement-label">
						<span class="check"></span>Я даю свое согласие на обработку персональных данных и соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" >политикой конфиденциальности</a>
					</label>
				</div>
		
			</form>
			
			<!--div class="phone">
				<div>или позвоните нам:</div>
				<?php echo do_shortcode('[phone]') ?>
			</div-->
		</div>
		