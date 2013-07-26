<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<?php if (in_category( 'ad' )) : ?>
		
		<?php get_template_part('sections/work/content','ad'); ?>
		
	<?php else : ?>
		
		<?php get_template_part('sections/work/content','single'); ?>
		
	<?php endif; ?>
	
<?php endwhile; ?>

<?php else: ?>
	
	<article>
		
		<h1><?php _e( 'Sorry, nothing to display.', 'six' ); ?></h1>
		
	</article> <!-- /article -->
	
<?php endif; ?>