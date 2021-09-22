<!-- <div class="sver"><img src="<?php echo THEME_IMAGES; ?>/sver.png" alt=""></div> -->

  <?php get_header(); ?>
  <?php get_template_part('blocks-custom/block','preloader'); ?>   

  <div class="wrapper">
    
      <?php get_template_part('blocks-custom/block','block_1'); ?>
    
      <?php get_template_part('blocks-custom/block','block_2'); ?>
     
        <?php get_template_part('blocks-custom/block','block_3'); ?>
        <?php get_template_part('blocks-custom/block','block_4'); ?>
    
      <?php get_template_part('blocks-custom/block','block_5'); ?>
      <?php get_template_part('blocks-custom/block','block_6'); ?>
      <?php get_template_part('blocks-custom/block','block_7'); ?>
      <?php get_template_part('blocks/block','docs'); ?>
      <?php get_template_part('blocks/block','clients'); ?>
      <?php get_template_part('blocks/block','contacts'); ?>
      <?php get_template_part('blocks/block','manager'); ?>
     
      <?php get_footer(); ?>
      </div>
 