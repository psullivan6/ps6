/*
**                   
**             File: adverts.js
**            Title: The Register-Guard Advertisement Javascript
**         Site URL: http://www.registerguard.com/
**      Description: Javascript utilities used for RG-specific advertising.
**          Created: 10/13/09
**         Modified: 10/13/09
**           Author: Micky Hulse <micky.hulse@registerguard.com>
**     Dependencies: 
**                   [1]
**                       jQuery Javascript Library
**                       http://jquery.com/
**                   [2]
**                       jQuery Cookie Plugin
**                       http://plugins.jquery.com/project/cookie
**             Todo: 
**                   - Make jQuery plugin(s).
**                   - Rethink nameCookie?
** 
*/

/*
** =========================================================
** Global:
** =========================================================
*/

function checkCookie(key) { return ($.cookie(key)) ? true : false; }
function setCookie(key, val) { return ($.cookie(key, val, { path: '/', domain: 'registerguard.com', expires: 1 })) ? true : false; }
function getCookie(key) { return $.cookie(key); }

function nameCookie(type) {
	
	/*
	** Updated: 2010/09/08
	*/
	
	$obj = $('#pushdown object');
	return ($obj.length) ? $obj.attr('id') : 'default';
	
}

/*
** =========================================================
** Billboard specific:
** =========================================================
*/

//function asControl(name) {
function asControl() {
	
	$obj = $('#pushdown object')[0];
	if ($obj && typeof $obj.asClosed != 'undefined') {
		$obj.asClosed();
	}
	
}

function billboardControl(height_closed, height_open) {
	
	var $billboard = $('#pushdown');
	//var billboard_name = $('#billboard object').attr('name');
	var speed = 1000;
	
	height_closed = (height_closed !== null) ? height_closed : '90';
	height_open = (height_open !== null) ? height_open : '415';
	
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
	** My tests show that hiding the Flash embed until the page fully loads
	** Allows Flash to make the jQuery connection.
	** 
	*/
	
	var $billboard = $('#pushdown');
	if ($billboard.length > 0) {
		$billboard.find('div').show();
	} // $billboard
	
});
// End closure.
