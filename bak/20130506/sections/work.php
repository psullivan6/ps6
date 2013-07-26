<div class="g_row">
	
	<?php if (have_posts()): ?>
		
		<?php $p_count = 0; ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			<?php $p_count++; ?>
			
			<?php
				
				($p_count % 2 != 0) ? $l_c  = 'S_c' : $l_c  = '';
				($p_count % 3 == 1) ? $xl_c = ' M_c XL_c'   : $xl_c = '';
				
			?>
			
			<div class="g_col S3_3 S_2 M_2 L_4 XL_3 <?php echo $l_c . $xl_c; ?>">
				
				<?php get_template_part('sections/work/content'); ?>
				
			</div> <!-- /.g_col -->
			
		<?php endwhile; ?>
		
	<?php endif; ?>
	
</div> <!-- /.g_row -->