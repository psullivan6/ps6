console.log('ultra-img called');

var queries = [
	{
		context: 's2',
		callback: function() { breaker('three','three'); }
	}, {
		context: 's3',
		callback: function() { breaker('three','three'); }
	}, {
		context: 's4',
		callback: function() { breaker('three','four'); }
	}, {
		context: 'm',
		callback: function() { breaker('three','six'); }
	}, {
		context: 'l',
		callback: function() { breaker('three','seven'); }
	}, {
		context: 'xl',
		callback: function() { breaker('four','eight'); }
	}
];
MQ.init(queries);

function breaker(content, content_single){
	
	console.log(content, content_single);
	
	var dpr = 1;
	if(window.devicePixelRatio !== undefined) dpr = window.devicePixelRatio;
	
	$('.item-content img').each(function(){
		
		$this = $(this);
		
		if ( $('.post').hasClass('content-single') ){
			
			if (dpr > 1){ $this.attr('src', $this.attr('data-src-' + content_single + '-retina')); }
			else{         $this.attr('src', $this.attr('data-src-' + content_single)); }
			
		} else{
			
			if (dpr > 1){ $this.attr('src', $this.attr('data-src-' + content + '-retina')); }
			else{         $this.attr('src', $this.attr('data-src-' + content)); }
		
		}
		
	});
	
};