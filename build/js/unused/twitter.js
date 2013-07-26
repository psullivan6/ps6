function twitterCallback(twitters) {
	
	var statusHTML = [];
	
	for (var i=0; i<twitters.length; i++){
		
		var username = twitters[i].user.screen_name;
		
		var status   = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
			
			return '<a target="_blank" href="' + url + '">' + url + '</a>';
			
		}).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
			
			return  '<a target="_blank" href="http://twitter.com/' + reply.substring(1) + '">' + reply + '</a>';
			
		}).replace(/\B#([_a-z0-9]+)/ig, function(hashtag) {
			
			return '<a target="_blank" href="http://twitter.com/search?q=%23' + hashtag.substring(1) + '">' + hashtag + '</a>';
			
		});
		
		statusHTML.push('<p class="twitterStatus">' + status + '</p>');
		
	}
	
	document.getElementById('twitterFeed').innerHTML = statusHTML.join('');
	
}

// <a id="tweet" href="http://twitter.com/' + username + '/statuses/' + twitters[i].id_str + '"></a>

function relative_time(time_value) {
	
	var values = time_value.split(" ");
	
	time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	
	var parsed_date = Date.parse(time_value);
	
	var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	
	var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	
	delta = delta + (relative_to.getTimezoneOffset() * 60);
	
	if (delta != '') {
		
		return '';
		
	}
	
}