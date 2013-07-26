// DOM Ready
$(document).ready(function() {
	// jQuery Code
	
	// Responsive Projects, iPhone/iPad URL bar hides itself on pageload
	if (navigator.userAgent.indexOf('iPhone') != -1) {
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
	}
	
	function hideURLbar() {
		window.scrollTo(0, 0);
	}
	
	$('.job').toggle(
		function(){
			$(this).find('.j_description').slideDown(300);
			$(this).find('h1').css('font-weight','bold');
		},
		function(){
			$(this).find('.j_description').slideUp(300);
			$(this).find('h1').css('font-weight','500');
		}
	);
	
	var rando = Math.floor( (Math.random() * 6 ) + 1),
	quotes = {
		1 : "<i class='icon-globe'></i>",
		2 : '<i class="icon-cog"></i>',
		3 : '<i class="icon-comment-alt"></i>',
		4 : '<i class="icon-bolt"></i>',
		5 : '<i class="icon-umbrella"></i>',
		6 : '<i class="icon-cloud"></i>'
	}
	
	$('.quote').html('' + quotes[rando] + '');
	
	$('#portrait_icon').toggle(
		function(){
			$('.quotes').show();
		},
		function(){
			$('.quotes').hide();
		}
	);
	
	$('.construction_warning').click(function(){
		$(this).parents('.g_row').remove();
	});
	
});