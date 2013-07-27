<head>
	
	<meta charset="UTF-8">
	
	<base href="http://psullivan6.com/ps6/wp-content/themes/six2/">

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<!-- [ MOBILE META ] -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0; maximum-scale=6.0;">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<link rel="apple-touch-icon-precomposed" href="http://assets.psullivan6.com/i/apple-touch-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://assets.psullivan6.com/i/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://assets.psullivan6.com/i/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-startup-image" href="http://assets.psullivan6.com/i/apple-touch-startup-image.png">

	<!-- [ OTHER META ] -->
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<!-- [ FONTS ] -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>

	<!-- [ STYLES ] -->
	<link type="text/css" rel="stylesheet" href="http://assets.psullivan6.com/css/ps6.min.css" />

	<!-- [ Modernizer ] -->
	<script type="text/javascript" src="http://assets.psullivan6.com/js/modernizr.custom.22904.js"></script>

	<!-- [ Libraries ] -->
	<script type="text/javascript" src="http://assets.psullivan6.com/js/responsive-nav.js"></script>

	<!-- [ Apple Web App Links ] -->
	<script type="text/javascript">
		(function(document,navigator,standalone) {
			// prevents links from apps from oppening in mobile safari
			// this javascript must be the first script in your <head>
			if ((standalone in navigator) && navigator[standalone]) {
				var curnode, location=document.location, stop=/^(a|html)$/i;
				document.addEventListener('click', function(e) {
					curnode=e.target;
					while (!(stop).test(curnode.nodeName)) {
						curnode=curnode.parentNode;
					}
					// Condidions to do this only on links to your own app
					// if you want all links, use if('href' in curnode) instead.
					if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
						e.preventDefault();
						location.href = curnode.href;
					}
				},false);
			}
		})(document,window.navigator,'standalone');
	</script>
	
	<?php if ((is_single()) && (in_category( 'ad' ))) : ?>
		
		<!-- [START] Ad Code -->
		<link rel="stylesheet" type="text/css" href="http://assets.psullivan6.com/css/ads.css" >
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<!-- [END] Ad Code -->
		
	<?php endif; ?>
	
	<!-- CSS + jQuery + JavaScript -->
	<?php wp_head(); ?>
	
</head>