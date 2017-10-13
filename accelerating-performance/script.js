$(document).ready(function() {
	$("#site_responsive_navigation").click(function() {
		$("#site_responsive_dropdown").slideToggle();
	});

	$(".menu-item-has-children").mouseenter(function() {
		$(".sub-menu").slideDown();
	});

	$(".menu-item-has-children").mouseleave(function() {
		$(".sub-menu").slideUp();
	});
	
	$("#fixed_site_responsive_navigation").click(function() {
		$("#fixed_site_responsive_dropdown").slideToggle();
	});

	$("#scroll_to_top").click(function() {
		$("html, body").animate({scrollTop: $("#top_bar").offset().top}, 500);
	});
	
	$(".socialmedia-buttons").children("br").remove();
	$("#s").attr("placeholder","Search for posts");
	$(".tagcloud").children("a").css("font-size", "1rem");
});

$(document).on('scroll', '', function() {
	if ($(window).width() > 700) {
		if ($("body").scrollTop() > 176) {
			$("#hidden_bar").slideDown();
			$("#scroll_to_top").slideDown();
		} else if ($("body").scrollTop() < 176) {
			$("#hidden_bar").slideUp();
			$("#scroll_to_top").slideUp();
		}
	} else if ($(window).width() < 700) {
		if ($("body").scrollTop() > 146) {
			$("#hidden_bar").slideDown();
			$("#scroll_to_top").slideDown();
		} else if ($("body").scrollTop() < 146) {
			$("#hidden_bar").slideUp();
			$("#scroll_to_top").slideUp();
		}
	}
});

$(window).resize(function() {
	$("#site_responsive_dropdown").slideUp();
	$("#fixed_site_responsive_dropdown").slideUp();
});