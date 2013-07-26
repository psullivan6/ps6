/*
** =========================================================
** Global:
** =========================================================
*/

function checkCookie(key)    { return ($.cookie(key)) ? true : false; }
function setCookie(key, val) { return ($.cookie(key, val, { path: '/', domain: 'psullivan6.com', expires: 1 })) ? true : false; }
function getCookie(key)      { return $.cookie(key); }

function nameCookie(type) {
	
	$obj = $('#' + type + ' object');
	return ($obj.length) ? $obj.attr('id') : 'default';
	
}

/*
** =========================================================
** Billboard specific:
** =========================================================
*/

//function asControl(name) {
function asControl() {
	
	$obj = $('#billboard object')[0];
	if ($obj && typeof $obj.asClosed != 'undefined') {
		$obj.asClosed();
	}
	
}

function billboardControl(height_closed, height_open) {
	
	var $billboard = $('#billboard');
	//var billboard_name = $('#billboard object').attr('name');
	var speed = 1000;
	
	height_closed = (height_closed !== null) ? height_closed : '30';
	height_open = (height_open !== null) ? height_open : '420';
	
	if ($billboard.height() < height_open) {
		$billboard.animate({ height: height_open }, speed);
	} else {
		$billboard.animate({ height: height_closed }, speed, function() {
			//asControl(billboard_name);
			asControl();
		});
	}
	
}

// Start closure:
$(window).load(function () {
	
	/*
	** 
	** Because flash peel & billboard is talking to jQuery
	** we need to wait for the jquery library to fully load
	** before Flash/AS3 can use the jQuery functions.
	** Tests show that hiding the Flash embed until the page fully loads
	** allows Flash to make the jQuery connection.
	** 
	*/
	
	
	var $billboard = $('#billboard');
	if ($billboard.length > 0) {
		$billboard.find('div').show();
	} // $billboard
	
});
// End closure.
