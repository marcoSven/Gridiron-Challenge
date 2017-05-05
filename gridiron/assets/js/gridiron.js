/**
 * Gridiron Challenge
 * https://marcosven.com
 *
 * Licensed under the GPLv2+ license.
 */


(function($){

var $s = $("#scrimmage"), dragStyle = {};

	dragStyle.mouseover = function() {
	  $s.addClass('grab');
	};
	dragStyle.mousedown = function() {
	  $s.removeClass('grab').addClass('grabbing');
	};
	dragStyle.mouseup = function() {
	  $s.removeClass('grabbing').addClass('grab');
	}

$.dragg = ( function () {

	var fieldWidth = $("#field").width();

	if ( fieldWidth <= 634 ) {

		var fieldOffset = $("#field").offset().top + 3,
			fieldHeight = $("#field").height(),
			yardHeight = $ (".yard").outerHeight(),
			y1Limit = yardHeight + fieldOffset,
			y2Limit = fieldHeight -  yardHeight + fieldOffset;

		$s.fadeTo(500, 1).css({ "top" : yardHeight * 4.4, "left" : "initial" } ).find("span").text( 34 );
		$s.draggable({ containment: [ 0, y1Limit, 0, y2Limit ], scroll: false, axis: "y",drag: function(){
			var offset = $(this).position(),
				yPos = offset.top;
			if ( yPos >= ( fieldHeight / 2 ) ) {
				$(this).find("span").text( $.right( yPos, yardHeight ) );
			} else {
				$(this).find("span").text( $.left( yPos, yardHeight ) );
			}
		} });

	} else {

		var fieldOffset = $("#field").offset().left + 3,
			yardWidth = $ (".yard").outerWidth(),
			x1Limit = yardWidth + fieldOffset,
			x2Limit = fieldWidth -  yardWidth + fieldOffset;

		$s.fadeTo(500, 1).css({ "left" : yardWidth * 4.4, "top" : "initial" }).find("span").text( 34 );
		$s.draggable({ containment: [ x1Limit, 0, x2Limit, 0 ], scroll: false, axis: "x",drag: function(){
			var offset = $(this).position(),
				xPos = offset.left;
			if ( xPos >= ( fieldWidth / 2 ) ) {
				$(this).find("span").text( $.right( xPos, yardWidth ) );
			} else {
				$(this).find("span").text( $.left( xPos, yardWidth ) );
			}
		} }).bind(dragStyle);

	}

});

$.left = ( function ( xPos, yardWidth ) {

	return Math.round( ( xPos - yardWidth  ) / ( yardWidth /10 ) );

});

$.right = ( function ( xPos, yardWidth ) {

	return Math.round( 100 - ( xPos - yardWidth  ) / ( yardWidth /10 ) );

});

$.init = ( function () {
	$.dragg();
})();


var debounce = function (func, wait, immediate) {

	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};

		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};

};

var fieldResize = debounce (function() {

	$s.draggable("destroy").css('opacity', 0);
	$.dragg();

}, 250);

window.addEventListener('resize', fieldResize);

})(jQuery);
