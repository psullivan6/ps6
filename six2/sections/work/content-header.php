<?php
	
	$col = get_post_meta(get_the_ID(), 'col', true);
	$bgc = get_post_meta(get_the_ID(), 'bgc', true);
	$bgc_arr = explode(', ', $bgc);
	
	
	if($bgc_arr[0]){
		
		if (!empty($col)){
			
			echo '<div class="grid ' . $col . ' ';
			
		}
		
		echo 'post-header_box" style="background-color:#' . $bgc_arr[1] . ';">';
		
	} else{
		
		echo '<div class="grid">';
		
	}
?>
	
	<div class="g_row">
		
		<div class="g_col g_off S_off S4_off M_1 L_2 XL_4">
			
			<h3 class="h3-u paginate"> &nbsp; <?php previous_post_link('%link', '<span class="arrow">&lsaquo;</span> Prev') ?> &nbsp; </h3>
			
		</div> <!-- /.g_col -->
		
		<div class="g_col S_3 S4_4 M_4 L_5 XL_4">
			
			<header>
				
				<div class="post-header">
					
					<h1 class="h1-u">
						
						<?php the_title(); ?>
						
					</h1>
					
					<div class="project_details">
						
						<h2 class="h3-u">
							
							<?php echo project_list('categories'); ?>
							
						</h2>
						
						<h2 class="h3-u">
							
							<?php echo project_list('roles'); ?>
							
						</h2>
						
						<?php
							
							$link = get_post_meta(get_the_ID(), 'live');
							if (!empty($link)) :
							
						?>
						
						<h2 class="h3">
							
							<span class="post-header_list h3-u">Live Project:</span>
							
							<?php echo '<a target="_blank" title="'. get_the_title() . '" href="' . $link[0] . '">' . $link[0] . '</a>'; ?>
							
						</h2>
						
						<?php endif; ?>
						
					</div> <!-- /.project_details -->
					
				</div>
				
				<article>
					
					<p class="item_description"><?php the_excerpt(); ?></p>
					
				</article>
				
			</header>
			
		</div> <!-- /.g_col -->
		
		<div class="g_col g_off S_off S4_off M_1 L_2 XL_4">
			
			<h3 class="h3-u paginate"> &nbsp; <?php next_post_link('%link', 'Next <span class="arrow">&rsaquo;</span>') ?> &nbsp; </h3>
			
		</div> <!-- /.g_col -->
		
	</div> <!-- /.g_row -->
	
</div> <!-- /.grid -->