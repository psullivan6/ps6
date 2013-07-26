<div class="g_row">
	
	<div class="g_col g_off S3_off S_off M_1 XL_2">
		
		<h3 class="h3-u paginate"> &nbsp; <?php previous_post_link('%link', '<span class="arrow">&lsaquo;</span> Prev') ?> &nbsp; </h3>
		
	</div> <!-- /.g_col -->
	
	<div class="g_col S_4 M_4 XL_5">
		
		<header>
			
			<div class="post-header">
				
				<hgroup>
					
					<h1 class="h1-u">
						
						<?php the_title(); ?>
						
					</h1>
					
					<h2 class="h3-u">
						
						<?php the_category(' &middot; '); ?>
						
					</h2>
					
				</hgroup>
				
			</div>
			
			<article>
				
				<p class="item_description"><?php the_excerpt(); ?></p>
				
			</article>
			
		</header>
		
	</div> <!-- /.g_col -->
	
	<div class="g_col g_off S3_off S_off M_1 XL_2">
		
		<h3 class="h3-u paginate"> &nbsp; <?php next_post_link('%link', 'Next <span class="arrow">&rsaquo;</span>') ?> &nbsp; </h3>
		
	</div> <!-- /.g_col -->
	
</div> <!-- /.g_row -->