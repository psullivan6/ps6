<article>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
		
		<?php if (is_search()): ?>
			
			<div class="item-summary">
				
				<?php the_excerpt(); ?>
				
			</div> <!-- /.item-summary -->
			
		<?php else: ?>
			
			<header class="transition">
				
				<h1 class="h1-u transition">
					
					<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'six'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
					
				</h1>
				
			</header>
			
			<!-- ==================================== -->
			
			<a class="item-content" href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'six'), the_title_attribute('echo=0')); ?>" rel="bookmark">
				
				<?php the_content(__('', 'six')); ?>
				
				<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'six'), 'after' => '</div>')); ?>
				
			</a> <!-- /.item-content -->
			
		<?php endif; ?>
		
	</div> <!-- /#post-<?php the_ID(); ?> -->
	
</article>