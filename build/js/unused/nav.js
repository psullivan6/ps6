	$n_mini = $('.n-mini');
	$n_list = $('.n-list');
	
	var mini_click = false;
	
	$n_mini.click(function(){
		
		console.log('mini_click: ' + mini_click);
		
		if ($n_list.hasClass('hide')){
			$n_list.hide();
			$n_list.removeClass('hide');
			$n_list.slideDown(600);
			$('.n-mini-icon').addClass('icon-remove').removeClass('icon-reorder');
			mini_click = true;
		}
		else{
			$n_list.slideUp(600);
			$n_list.addClass('hide');
			$('.n-mini-icon').addClass('icon-reorder').removeClass('icon-remove');
			mini_click = false;
		};
		
	});
	
	$('.scroll').click(function(event){
		$('html,body').animate({ scrollTop : $(this.hash).offset().top - 50 }, 900);
		
		if ( mini_click ){
			$n_list.slideUp(300);
			$n_list.addClass('hide');
			$('.n-mini-icon').addClass('icon-reorder').removeClass('icon-remove');
			mini_click = false;
		}
		
		return false;
	});