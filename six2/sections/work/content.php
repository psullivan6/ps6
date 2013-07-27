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
			
			<a class="item-content" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
				
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					
					<div class="piece">
						
						<?php
							
							$col_12 = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), '12col'))->attributes()->src;
							$col_8  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), '8col'))->attributes()->src;
							$col_7  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), '7col'))->attributes()->src;
							$col_6  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), 'large'))->attributes()->src;
							$col_4  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), 'medium'))->attributes()->src;
							$col_3  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), '3col'))->attributes()->src;
							$col_2  = simplexml_load_string(get_the_post_thumbnail(get_the_ID(), 'thumbnail'))->attributes()->src;
							
							$full_src  = "<img class=\"feature\" src=\"" . $col_3;
							$full_src .= "\" data-src-two=\""          . $col_2;
							$full_src .= "\" data-src-two-retina=\""   . $col_4;
							$full_src .= "\" data-src-three=\""        . $col_3;
							$full_src .= "\" data-src-three-retina=\"" . $col_6;
							$full_src .= "\" data-src-four=\""         . $col_4;
							$full_src .= "\" data-src-four-retina=\""  . $col_6;
							$full_src .= "\" data-src-six=\""          . $col_6;
							$full_src .= "\" data-src-six-retina=\""   . $col_12;
							$full_src .= "\" data-src-seven=\""        . $col_7;
							$full_src .= "\" data-src-seven-retina=\"" . $col_12;
							$full_src .= "\" data-src-eight=\""        . $col_8;
							$full_src .= "\" data-src-eight-retina=\"" . $col_1;
							$full_src .= "\">";
							
							echo $full_src;
							
						?>
						
					</div> <!-- /.piece -->
					
				<?php else: ?>
					
					<?php the_content(__('', 'six')); ?>
					
					<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'six'), 'after' => '</div>')); ?>
					
				<?php endif; ?>
				
			</a> <!-- /.item-content -->
			
		<?php endif; ?>
		
	</div> <!-- /#post-<?php the_ID(); ?> -->
	
</article>