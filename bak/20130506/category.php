<!DOCTYPE html>

<?php get_template_part('code-signature'); ?>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]--> 

<?php get_template_part('head'); ?>

<body <?php body_class(); ?>>
	
	<section>
		
		<div id="header" class="b-b">
			
			<div class="grid">
				
				<?php get_header(); ?>
				
			</div> <!-- /.grid -->
			
		</div> <!-- /#header -->
		
	</section> <!-- /.section -->
	
	<!-- ==================================== -->
	
	<section>
	
		<h1><?php _e( 'Categories for', 'html5blank' ); the_category(); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<!-- Pagination -->
		<div id="pagination">
			<?php html5wp_pagination(); ?>
		</div>
		<!-- /Pagination -->
	
	</section>
	
	<!-- ==================================== -->
	
	<section>
		
		<div id="footer" class="b-b">
			
			<div class="grid">
				
				<?php get_footer(); ?>
				
			</div> <!-- /.grid -->
			
		</div> <!-- /#header -->
		
	</section> <!-- /.section -->

</body>
</html>