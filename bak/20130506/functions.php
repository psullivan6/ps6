<?php
/*
 *  Author: Patrick Sullivan | @psullivan6
 *	Based off of: HTML5 Blank by Todd Motto | @toddmotto
 *  URL: psullivan6.com
 */

/*
 * ========================================================================
 * External Modules/Files
 * ========================================================================
 */

	// Load any external files you have here

/*
 * ========================================================================
 * Theme Support
 * ========================================================================
 */

if (!isset($content_width))
{
	$content_width = 900;
}


	/**
	 * @package six
	 */
	
	if ( ! function_exists('six_setup')) {
		
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which runs
		 * before the init hook. The init hook is too late for some features, such as indicating
		 * support post thumbnails.
		 *
		 * To override six_setup() in a child theme, add your own six_setup to your child theme's
		 * functions.php file.
		 */
		
		function six_setup() {
			
			/**
			 * Make theme available for translation
			 * Translations can be filed in the /languages/ directory
			 * If you're building a theme based on six, use a find and replace
			 * to change 'six' to the name of your theme in all the template files
			 */
			
			load_theme_textdomain('six', get_template_directory() . '/languages');
			
			$locale = get_locale();
			
			$locale_file = get_template_directory() . '/languages/' . $locale . '.php';
			
			if (is_readable($locale_file)) require_once($locale_file);
			
			
			// Add Menu Support
			add_theme_support('menus');
			
			//	Add default posts and comments RSS feed links to head
			add_theme_support('automatic-feed-links');
			
			//	Add support for the Aside and Gallery Post Formats
			add_theme_support('post-formats', array('aside', 'image', 'gallery'));
			
			//	Add ability to add additional image sizes
			add_theme_support( 'post-thumbnails' );
			
			// Add Support for Custom Backgrounds
			add_theme_support('custom-background', array(
			'default-color' => $default_background_color
			));
			
			// Enables post and comment RSS feed links to head
			add_theme_support('automatic-feed-links');
			
		}
		
	}
	add_action('after_setup_theme', 'six_setup'); // Tell WordPress to run six_setup() when the 'after_setup_theme' hook is run.
	
	//http://www.sitepoint.com/wordpress-change-img-tag-html/

	add_image_size('3col',  480);
	add_image_size('5col',  820);
	add_image_size('7col',  1160);
	add_image_size('9col',  1500);
	add_image_size('12col', 2010);
	add_image_size('14col', 2350);

	function add_image_sizes($html, $id, $alt, $title, $align, $size) {
		
		$col_2  = image_downsize($id, 'thumbnail');
		$col_3  = image_downsize($id, '3col');
		$col_4  = image_downsize($id, 'medium');
		$col_5  = image_downsize($id, '5col');
		$col_6  = image_downsize($id, 'large');
		$col_7  = image_downsize($id, '7col');
		$col_9 = image_downsize($id, '9col');
		$col_12 = image_downsize($id, '12col');
		$col_14 = image_downsize($id, '14col');
		
		return '<div class="piece"><img class="transition" src="' 
		. $col_3[0]
		. '" data-src-two="'          . $col_2[0]
		. '" data-src-two-retina="'   . $col_4[0]
		. '" data-src-three="'        . $col_3[0]
		. '" data-src-three-retina="' . $col_6[0]
		. '" data-src-four="'         . $col_4[0]
		. '" data-src-four-retina="'  . $col_7[0]
		. '" data-src-five="'         . $col_5[0]
		. '" data-src-five-retina="'  . $col_9[0]
		. '" data-src-six="'          . $col_6[0]
		. '" data-src-six-retina="'   . $col_12[0]
		. '" data-src-seven="'        . $col_7[0]
		. '" data-src-seven-retina="' . $col_14[0]
		. '"></div>';
		
	}
	add_filter('get_image_tag', 'add_image_sizes', 10, 6);

/*
 * ========================================================================
 * Functions
 * ========================================================================
 */

// HTML5 Blank navigation
function six_nav() {
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load Custom Theme Scripts using Enqueue
function six_scripts() {
	if (!is_admin()) {
		wp_deregister_script('jquery'); // Deregister WordPress jQuery
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', array(), '1.8.2'); // Load Google CDN jQuery
		wp_enqueue_script('jquery'); // Enqueue it!

		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '2.6.2'); // Modernizr with version Number at the end
		wp_enqueue_script('modernizr'); // Enqueue it!

		wp_register_script('sixscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // HTML5 Blank script with version number
		wp_enqueue_script('sixscripts'); // Enqueue it!
	}
}

// Loading Conditional Scripts
function conditional_scripts() {
	if (is_page('pagenamehere')) {
		wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Our Script for Conditional loading
		wp_enqueue_script('scriptname'); // Enqueue it!
	}
}

// Load Optimised Google Analytics in the footer
function add_google_analytics() {
	$google = "<!-- Optimised Asynchronous Google Analytics -->";
	$google .= "<script>"; // Change the UA-XXXXXXXX-X to your Account ID
	$google .= "var _gaq=[['_setAccount','UA-XXXXXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));";
	$google .= "</script>";
	echo $google;
}

// jQuery Fallbacks load in the footer
function add_jquery_fallback() {
	$jqueryfallback = "<!-- Protocol Relative jQuery fall back if Google CDN offline -->";
	$jqueryfallback .= "<script>";
	#$jqueryfallback .= "window.jQuery || document.write('<script src='" . get_bloginfo('template_url') . "/js/jquery-1.8.2.min.js'><\/script>')";
	$jqueryfallback .= "window.jQuery || document.write('<script src=\"" . get_bloginfo('template_url') . "/js/jquery-1.8.2.min.js\"><\/script>')";
	$jqueryfallback .= "</script>";
	echo $jqueryfallback;
}

// Threaded Comments
function enable_threaded_comments() {
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
	}
}

// Register HTML5 Blank's Navigation
function register_html5_menu() {
	register_nav_menus(array( // Using array to specify more menus if needed
		'header-menu' => __('Header Menu', 'six'), // Main Navigation
		'sidebar-menu' => __('Sidebar Menu', 'six'), // Sidebar Navigation
		'extra-menu' => __('Extra Menu', 'six') // Extra Navigation if needed (duplicate as many as you need!)
	));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
	return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}

	return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages
	));
}

// Custom Excerpts
function html5wp_index($length) { // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
	return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length) {
	return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '') {
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	echo $output;
}

// Custom View Article link to Post
function html5wp_view_article($more) {
	return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'six') . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
	return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
	return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Define new string to put at the end of an excerpt
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
 * ========================================================================
 * Actions + Filters + ShortCodes
 * ========================================================================
 */

// Add Actions
add_action('init', 'six_scripts'); // Add Custom Scripts
add_action('wp_print_scripts', 'conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_footer', 'add_google_analytics'); // Google Analytics optimised in footer
add_action('wp_footer', 'add_jquery_fallback'); // jQuery fallbacks loaded through footer
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5wp_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/* ============================================================
   Shortcodes
   ============================================================ */
	function download_links($atts) {
		
		extract(shortcode_atts(array(
			'psd'   => '',
			'ai'    => '',
			'fl'    => '',
			'ind'   => '',
			'ac'    => '',
			'sheet' => ''
		), $atts));
		
		$dl_html = '<div class="dl_bar">';
		$dl_html .= '	<div class="dl_box">';
		$dl_html .= '		<i class="icon-download-alt"></i>';
		$dl_html .= '		<span>&nbsp;&nbsp; Download</span>';
		$dl_html .= '	</div>';
		$dl_html .= '	<span class="dl_colon">:</span>';
		
		($psd) ? $dl_html    .= '<a target="_blank" href="' . $psd    . '"><span class="dl_Ps">Photoshop</span></a>' : false;
		
		($ai) ? $dl_html     .= '<a target="_blank" href="' . $ai     . '"><span class="dl_Ai">Illustrator</span></a>' : false;
		
		($fl) ? $dl_html     .= '<a target="_blank" href="' . $fl     . '"><span class="dl_Fl">Flash</span></a>' : false;
		
		($ind) ? $dl_html    .= '<a target="_blank" href="' . $ind    . '"><span class="dl_InD">Flash</span></a>' : false;
		
		($ac) ? $dl_html     .= '<a target="_blank" href="' . $ac     . '"><span class="dl_Ac">Flash</span></a>' : false;
		
		($sheet) ? $dl_html  .= '<a target="_blank" href="' . $sheet  . '"><span class="dl_sheet"><i class="icon-list-alt"></i></span></a>' : false;
		
		$dl_html .= '	<div class="clear"></div>';
		$dl_html .= '</div>';
		
		return $dl_html;
	}
	add_shortcode('dl', 'download_links');
	
	// ------------------------------
	
	function ad_code($attributes) {
		
		extract(shortcode_atts(array(
			'type'   => '',
			'file'   => '',
			'backup' => '',
			'link'   => '',
			'width'  => '',
			'height' => '',
			'onoff'  => ''
		), $attributes));
		
		$ad_class = strtolower(str_replace(' ', '', $type));
		
		$ad_html  = '<div class="' . $ad_class . ' ' . $onoff . '">
						<h1 class="h3-u ad_title">' . $type . ' (' . $width . ' x ' . $height . ' )</h1>
						<div class="ad_unit loading" style="width:' . $width . 'px;height:' . $height . 'px;">
							<div id="swf' . $width . $height . '">' . $backup . '</div>
							<script type="text/javascript">
								var flashvars = {};
								var params = {wmode:"transparent"};
								var attributes = {};
									flashvars.clickTAG = "' . $link . '";
									params.bgcolor = "#FFFFFF";
									params.allowscriptaccess = "always";
									params.quality = "best";
								swfobject.embedSWF("' . $file . '", "swf' . $width . $height . '", "' . $width . '", "' . $height . '", "9.0.115.0", false, flashvars, params, attributes);
							</script>
						</div>
					</div> <!-- /.' . $ad_class . ' -->';
		
		$output = '<h1>' . $file . $link . $width . $height . '</h1>';
		
		return $ad_html;
	}
	add_shortcode('ad', 'ad_code');
	
	// ============================================================
	
	/**
	 * Register widgetized area and update sidebar with default widgets
	 */
	
	function six_widgets_init() {
		
		register_sidebar(
			array(
				'name'          => __('Sidebar 1', 'six'),
				'description'   => __('Description for this widget-area...', 'six'),
				'id'            => 'sidebar-1',
				'before_widget' => '<aside id="%1$s" class="widget %2$s w_col w_B300 w_C300"><section>',
				'after_widget'  => '</section></aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>'
			)
		);
		
		register_sidebar(
			array(
				'name'          => __('Sidebar 2', 'six'),
				'description'   => __('Description for this widget-area...', 'six'),
				'id'            => 'sidebar-2',
				'description'   => __('An optional second sidebar area', 'six'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s w_col w_B300 w_C300">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>'
			)
		);
		
	}
	add_action('init', 'six_widgets_init');
	
	// ============================================================
	
	if ( ! function_exists('six_posted_on')) {
		
		/**
		 * Prints HTML with meta information for the current post-date/time and author.
		 * Create your own six_posted_on to override in a child theme
		 */
		
		function six_posted_on() {

			printf(
				
				__('<span class="date"><a href="%1$s" title="Work from %4$s" rel="bookmark"><time class="item-date" datetime="%3$s" pubdate>%4$s</time></a></span>', 'six'),
				esc_url(get_permalink()),
				esc_attr(get_the_time()),
				esc_attr(get_the_date('c')),
				esc_html(get_the_date())
			);
			
		}
		
	}
	
	// ============================================================
	
	/**
	 * Adds twitter and facebook input fields to each user.
	 */
	
	function six_contactmethods( $contactmethods ) {
		// Add Twitter
		$contactmethods['twitter'] = 'Twitter';
		//add Facebook
		$contactmethods['facebook'] = 'Facebook';
	
		return $contactmethods;
	}
	add_filter('user_contactmethods','six_contactmethods',10,1);
	
	
	// ============================================================
	
	function remove_more_jump_link($link) {
		$offset = strpos($link, '#more-');
		if ($offset) { $end = strpos($link, '"',$offset); }
		if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');
	
	// ============================================================
	
	/**
	 * Returns true if a blog has more than 1 category
	 */
	
	function six_categorized_blog() {
		
		if (false === ($all_catgs = get_transient('all_catgs'))) {
			
			// Create an array of all the categories that are attached to posts:
			
			$all_catgs = get_categories(array('hide_empty' => 1));
			
			// Count the number of categories that are attached to the posts:
			
			$all_catgs = count($all_catgs);
			
			set_transient('all_catgs', $all_catgs);
			
		}
		
		// TRUE: This blog has more than 1 category.
		// FALSE: This blog has only 1 category.
		
		return ('1' != $all_catgs) ? true : false;
		
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Flush out the transients used in octavo_categorized_blog
	 */
	
	function octavo_category_transient_flusher() {
		
		// Like, beat it. Dig?
		
		delete_transient('all_catgs');
		
	}
	add_action('edit_category', 'octavo_category_transient_flusher');
	add_action('save_post', 'octavo_category_transient_flusher');
	
	//--------------------------------------------------------------------
	
?>