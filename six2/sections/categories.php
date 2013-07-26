<?php if (have_posts()): ?>
	
	<?php $p_count = 0; ?>
	
	<div class="g_row">
		
		<div class="g_col">
			
			<h1 class="h1-u"><?php single_cat_title(); ?></h1>
			
		</div> <!-- /.g_col -->
		
	</div> <!-- /.g_row -->
	
	<br>
	
	<div class="g_row">
		
		<?php while (have_posts()) : the_post(); ?>
			
			<?php $p_count++; ?>
			
			<?php
				
				($p_count % 2 != 0) ? $l_c  = 'S_c' : $l_c  = '';
				($p_count % 3 == 1) ? $xl_c = ' M_c XL_c'   : $xl_c = '';
				
			?>
			
			<div class="g_col S_3 S4_2 M_2 L_3 XL_4 <?php echo $l_c . $xl_c; ?>">
				
				<?php get_template_part('sections/work/category'); ?>
				
			</div> <!-- /.g_col -->
			
		<?php endwhile; ?>
		
	</div> <!-- /.g_row -->
	
<?php endif; ?>
