<h1>LOOP.PHP</h1>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<div class="grid">
		
		<div class="g_row">
		
			<div class="g_col L_4">
				
				<!-- Article -->
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'six'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						
						<?php if ('post' == get_post_type()): ?>
							
							<div class="entry-meta">
								
								<?php six_posted_on(); ?>
								
							</div> <!-- /.entry-meta -->
							
						<?php endif; ?>
						
					</header> <!-- /.entry-header -->
					
					<?php if (is_search()): ?>
						
						<div class="entry-summary">
							
							<?php the_excerpt(); ?>
							
						</div> <!-- /.entry-summary -->
						
					<?php else: ?>
						
						<div class="entry-content clear">
							
							<?php the_content(__('[ Continue reading ]', 'six')); ?>
							
							<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'six'), 'after' => '</div>')); ?>
							
						</div> <!-- /.entry-content -->
						
					<?php endif; ?>
					
					<footer class="entry-meta">
						
						<?php if ('post' == get_post_type()): ?>
							
							<?php $categories_list = get_the_category_list(__('&nbsp; &bull; &nbsp;', 'six')); ?>
							
							<?php if ($categories_list && six_categorized_blog()): ?>
								
								<span class="cat-links">Story
									
									<?php if (count(get_the_category()) > 1): ?>
										
										Categories:
										
									<?php else: ?>
										
										Category:
										
									<?php endif; ?>
									
									<?php printf(__('%1$s', 'six'), $categories_list); ?>
									
								</span>
								
							<?php endif; ?>
						
						<?php endif; ?>
						
						
						<?php if ('post' == get_post_type()): ?>
							
							<?php $tags_list = get_the_tag_list('', __(', ', 'six')); ?>
							
							<?php if ($tags_list): ?>
								
								<span class="tag-links"><?php printf(__('Tagged %1$s', 'six'), $tags_list); ?></span>
								
								<span class="sep"> | </span>
								
							<?php endif; ?>
							
						<?php endif; ?>
				
						<?php edit_post_link(__('Edit', 'six'), '<span class="sep"> &nbsp;| &nbsp;</span><span class="edit-link">', '</span>'); ?>
						
					</footer><!-- #entry-meta -->
					
				</article> <!-- /#post-<?php the_ID(); ?> -->
				
				<!-- /Article -->
				
			</div>
			
		</div>
		
	</div>
	
<?php endwhile; ?>

<?php else: ?>

	<!-- Article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /Article -->

<?php endif; ?>