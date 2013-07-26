<?php get_template_part('sections/work/content','header'); ?>

<!-- ============================================================ -->

<div class="g_row">
	
	<div class="g_col g_off S3_off S_off M_1">&nbsp;</div>
	
	<div class="g_col S_4 L_6 XL_7 <?php echo $c_class; ?>">
		
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

<div class="g_row">

	<!-- FIGURE OUT HOW TO PUT THE ADS HERE, BUT DO SO DYNAMICALLY -->
	<!-- shortcodes?  custom fields? -->

	<!-- Access the array values in normal php here, they are passed in from a full entry of the shortcode, but simply as an array rather than "shortcode" -->

	<!-- ==================================== -->
	
	<div class="g_col S_4 M_6 L_8 XL_9">
		
		<?php
			
			$ad_billboard_collapsed = get_post_meta(get_the_ID(), 'ad_billboard_collapsed');
			if (!empty($ad_billboard_collapsed)) echo do_shortcode($ad_billboard_collapsed[0]);
			
			$ad_billboard_expanded = get_post_meta(get_the_ID(), 'ad_billboard_expanded');
			if (!empty($ad_billboard_expanded)) echo do_shortcode($ad_billboard_expanded[0]);
			
			$ad_leaderboard = get_post_meta(get_the_ID(), 'ad_leaderboard');
			if (!empty($ad_leaderboard)) echo do_shortcode($ad_leaderboard[0]);
			
			$ad_medium_rectangle = get_post_meta(get_the_ID(), 'ad_medium_rectangle');
			if (!empty($ad_medium_rectangle)) echo do_shortcode($ad_medium_rectangle[0]);
			
		?>
		
	</div> <!-- /.g_col -->
	
</div> <!-- /.g_row -->

<!--
	[ad type="Medium Rectangle" file="http://psullivan6.com/ps6/wp-content/uploads/2013/03/Guaranty_Civil-War_300x250_10-15.swf" link="http://civilwarsale.com" width="300" height="250"]
-->