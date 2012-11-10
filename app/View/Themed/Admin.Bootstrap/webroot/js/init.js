$(function() {
	$('*[rel=tooltip]').each(function() {
		$(this).tooltip({
			placement: $(this).attr('tooltip-place')
		})
	})
})

function alert(message) {
	$.fallr({
		content: message,
        buttons: {
			button1: {
				text: "قبول",
				danger: false,
				onclick: function() {
					$.fallr("hide")
				}
			}
		}
	})
}
$(function(){
    // fix sub nav on scroll
    var $win = $(window)
      , $nav = $('#toolbar-menu')
      , navTop = $('#toolbar-menu').length && $('#toolbar-menu').offset().top - 40
      , isFixed = 0

    processScroll()

    $win.on('scroll', processScroll)

    function processScroll() {
      var i, scrollTop = $win.scrollTop()
      if (scrollTop >= navTop && !isFixed) {
        isFixed = 1
        $nav.addClass('toolbar-menu-fixed')
      } else if (scrollTop <= navTop && isFixed) {
        isFixed = 0
        $nav.removeClass('toolbar-menu-fixed')
      }
    }
})
/*
function confirm(message) {
	var flag = true;
	var a = $.fallr("show", {
		buttons: {
			button1: {
				text: "Yes",
				danger: true,
				onclick: function(){
				    return true
                    $.fallr("hide")
                    
				}
			},
			button2: {
				text: "Cancel",
				onclick: function() {
					$.fallr("hide")
				}
			}
		},
		content: "<p>"+message+"</p>",
		icon: "error"
	})
    console.log(flag)
    return a;
}
*/