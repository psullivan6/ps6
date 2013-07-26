<?php get_template_part('sections/work/content','header'); ?>

<!-- ============================================================ -->

<div class="g_row">
	
	<div class="g_col g_off S3_off S_off M_1">&nbsp;</div>
	
	<div class="g_col S_4 M_4 L_6 XL_9">
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
			
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					
				</a>
				
			<?php endif; ?>
			
			<div class="item-content clear">
				
				<?php the_content(__('[ Continue reading ]', 'six')); ?>
				
				<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'six'), 'after' => '</div>')); ?>
				
			</div> <!-- /.entry-content -->
			
			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			
		</article> <!-- /#post-<?php the_ID(); ?> -->
		
	</div> <!-- /.g_col -->
	
	<div class="g_col g_off S3_off S_off M_1">&nbsp;</div>
	
</div> <!-- /.g_row -->