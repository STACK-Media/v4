function get_device_type()
{
	return (is_phone()) ? 'phone' : 'desktop';
}

function is_phone()
{

	var matches_phone = window.matchMedia("only screen and (max-width: 768px)");

	return matches_phone.matches;

}

function init_nav(device)
{

	var resize_device = get_device_type();

	if (resize_device !== device){

		if (resize_device == 'phone')
		{

			//$('#navbar').hide();

		}

	}

	return resize_device;

}

(function ($, window) {

	"use strict";

	var device = init_nav();

	$( window ).resize(function() {

		var device = init_nav(device);

	});

	$('#navbar > ul li').hover(function(){

		if (device != 'phone'){
			$(this).find('.menu-submenu-content').hide().html("")
			$(this).find('.menu-main-content').show();
		}

	});

	$('#navbar .menu-inner .submenu li').hover(function(){

		if (device != 'phone'){

			var 
				$parent_li      = $(this).parent().closest('li'),
				submenu_content = $(this).find('.menu-preview').html();
			
			//var submenu_content = '';

			$parent_li.find('.menu-main-content').hide();
			$parent_li.find('.menu-submenu-content').html(submenu_content).show();

		}

	}, function(){

		// only revert if hover over parent again
		/*
		if (device != 'phone'){

			$(this).parent().closest('li').find('.menu-submenu-content').hide().html("");
			$(this).parent().closest('li').find('.menu-main-content').show();

		}
		*/

	});


	// on window.resize, re-evaluate is_phone

})(window.jQuery, window);