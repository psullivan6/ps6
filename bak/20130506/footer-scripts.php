<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script src="http://assets.psullivan6.com/js/onmediaquery.min.js"></script>
<script src="http://assets.psullivan6.com/js/ultra-img.js"></script>
<script src="http://assets.psullivan6.com/js/scrollto.js"></script>

<script>var navigation = responsiveNav("#nav", {insert: "before",label: ""});</script>

<?php if (!is_single()) : ?>
	
	<!-- [START] Twitter Feed -->
	<script type="text/javascript" src="http://assets.psullivan6.com/js/twitter.js"></script>
	<script src="https://api.twitter.com/1/statuses/user_timeline/psullivan6.json?callback=twitterCallback&amp;count=1" type="text/javascript"></script>
	<!-- [END] Twitter Feed -->
	
<?php endif; ?>

<!-- [START] UnSlider -->
<script src="js/unslider.min.js"></script>
<script>
	$(window).load(function () {
		var titles = $('.titles').unslider({
			fluid: true,
			dots: true,
			speed: 600
		}),
		social = $('.social-s').unslider({
			fluid: true,
			dots: true,
			speed: 600,
			delay: 6000
		});
	});
</script>
<!-- [END] UnSlider -->

<?php if ((is_single()) && (in_category( 'ad' ))) : ?>
	
	<!-- [START] Ad Code -->
	<script type="text/javascript" src="http://assets.psullivan6.com/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="http://assets.psullivan6.com/js/ads.js"></script>
	<!-- [END] Ad Code -->
	
<?php endif; ?>

<script type="text/javascript">
	
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-24494089-1']);
	_gaq.push(['_trackPageview']);
	
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
</script>