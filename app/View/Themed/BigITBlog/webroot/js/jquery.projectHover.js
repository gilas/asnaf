/*
Date: 30.7.2012
Copy: Copyright © CroDigital 

Permission to use this Javascript file ( whole file with whole content in it ) 
on your web page is granted provided that all of the code in this script 
(including these comments) is used without any alteration

*/

// GALLERY HOVER

(function($) {
	$.fn.projectHover = function(options){
		// Default configuration
		var defaults = {
			color: '#ff00000',		// Div color
			opacity: '0.5',			// Opacity of image on hover
			borderWidth: '3px',		// Border width
			count: 4,				// Number of images in a row
			animationSpeed: 200		// Animation speed
		};
		var options = $.extend(defaults, options);
		
		return this.each(function(){
		// Plugin code goes here
			obj = $(this);
			// Hex to rgb converter
			var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(options.color);
			var red = parseInt(result[1], 16);
			var green = parseInt(result[2], 16);
			var blue = parseInt(result[3], 16);
			// Image div
			obj.children('li').append('<div class="img_div"></div>');			
			
			
			// Last image in row
			var last_li = obj.children('li:nth-child('+ options.count +'n)');
			var last_div = $(last_li).children('div.des');
			
			
			
			// Hover function (except for last image in a row)
				obj.children('li').hover(
				function(){					
					// Width of div
					var marginWidth = obj.children('li').css('margin-right');
					var liWidth = obj.children('li').css('width');
					var divWidth = parseFloat(marginWidth) + parseFloat(liWidth);
					// Image div css
					var img_div_css = {
						'width' : obj.children('li').css('width'),
						'height' : obj.children('li').css('height'),
						'position' : 'absolute',
						'top' : '0',
						'background' : 'rgba('+ red +', '+ green +', '+ blue +', '+ options.opacity +')',
						'border-width' : options.borderWidth,
						'border-style' : 'solid',
						'border-color' : options.color,
						'opacity' : '0',
						'z-index' : '5',
						'cursor' : 'pointer'
					}
					obj.children('li').children('.img_div').css(img_div_css);					
					// Div 'des' css
					var div_des_css = {
						'width' : '0',
						'height' : obj.children('li').css('height'),
						'background' : options.color,
						'position' : 'absolute',
						'top' : '0',
						'left' : obj.children('li').css('width'),
						'z-index' : '9999'
					}
					$('div.des').css(div_des_css);
					// Pointer of div is set to none
					$(this).children('div.des').css('pointer-events', 'none');
					$('div.des').children('h2.proj_title, p.proj_desc').css('pointer-events', 'none');
					// Show div (except for last in a row)
						// If window width is less then 480px - do nothing (because of cellphones)
					if( $(window).width() > 767 ){
					
					$(this).not('.others').children('div.des').not(last_div).delay(options.animationSpeed).stop().animate({
						width : divWidth,
						left : liWidth,
						opacity : '1'
					}, options.animationSpeed, function(){
						$(this).not('.others').children('h2.proj_title, p.proj_desc').show().animate({
							opacity: '1',
							marginLeft: '4px'
						}, options.animationSpeed );
						$(this).not('.others').parent('li').children('div.img_div').click(
							function(){
								window.location = $(this).parent('li').children('a').attr('href');
							}
						);
						}
					);
					// Show div on image
					$(this).not('.others').children('.img_div').animate({
						opacity : '1'
					}, options.animationSpeed );
					// End of if
					}								
				},
				function(){
					$('div.des, div.img_div').stop(true, true);
					$('h2.proj_title, p.proj_desc').hide().css({'opacity' : '0', 'margin-left' : '0'});
					$(this).children('div.des').not(last_div).animate({
						width : '0',
						opacity : '0'
					}, options.animationSpeed );
					$(this).children('.img_div').animate({
						opacity : '0'
					}, options.animationSpeed );
				}
			);
			
			
			// Hover function for every N element
			
			$(last_li).hover(
				function(){
					// Width of div
					
					var marginWidth = obj.children('li').css('margin-right');
					var liWidth = obj.children('li').css('width');
					var divWidth = parseFloat(marginWidth) + parseFloat(liWidth);
					$(last_div).css({'left': '1px', 'margin-left' : '1px'});
						// If window width is less then 480px - do nothing (because of cellphones)
					if( $(window).width() > 767 ){					
					$(this).not('.others').children('div.des').delay(options.animationSpeed).stop().animate({
						//left : '0' - parseFloat(divWidth),
						//right : '' - parseFloat(liWidth),
						marginLeft: '1' - divWidth,
						width: divWidth,				
						opacity : '1'			
					}, options.animationSpeed, function(){		
						$(last_div).css({'left' : '0', 'margin-left' : '0' - divWidth});
						$(this).not('.others').children('h2.proj_title, p.proj_desc').show().animate({
							opacity: '1',
							marginLeft: '4px'
						}, options.animationSpeed );
						$(this).not('.others').parent('li').children('div.img_div').click(
							function(){
								window.location = $(this).parent('li').children('a').attr('href');
							}
						);
						}
					);
					//End of if
					}
				},
				function(){
					$('div.des, div.img_div').stop(true, true);
					// Width of div					
					var marginWidth = obj.children('li').css('margin-right');
					var liWidth = obj.children('li').css('width');
					var divWidth = parseFloat(marginWidth) + parseFloat(liWidth);
					$('h2.proj_title, p.proj_desc').hide().css({'opacity' : '0', 'margin-left' : '0'});
					$(this).children('div.des').animate({
						marginLeft : '1px',
						width : '0',
						opacity : '0'
					}, options.animationSpeed, function(){
						$(last_div).css('margin-left', '0');
					}
					);
				}
			);
		});
	}
})(jQuery);