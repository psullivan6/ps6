<?php get_template_part('sections/work/content','header'); ?>

<!-- ============================================================ -->

<div class="grid">
	
	<div class="g_row">
		
		<div class="g_col g_off S_off S4_off M_off L_1 XL_2">&nbsp;</div>
		
		<div class="g_col S_3 S4_4 M_6 L_7 XL_8">
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
				
				<div class="item-content clear">
					
					<?php the_content(__('[ Continue reading ]', 'six')); ?>
					
					<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'six'), 'after' => '</div>')); ?>
					
				</div> <!-- /.entry-content -->
				
				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
				
			</article> <!-- /#post-<?php the_ID(); ?> -->
			
		</div> <!-- /.g_col -->
		
		<div class="g_col g_off S_off S4_off M_off L_1 XL_2">&nbsp;</div>
		
	</div> <!-- /.g_row -->
	
</div> <!-- /.grid -->