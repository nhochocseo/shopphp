$(document).ready( function (){
	$.fn.slideUp = function() {
  		this.velocity("slideUp", 300, function() {
	  		$(this).parent().removeClass("icy");
	  		$(this).prev().removeClass("active");
 		});
	};
	$.fn.slideDown = function() {
		this.velocity("slideDown", 300, function() {
			$(this).parent().addClass("icy");
			$(this).prev().addClass("active");
		});
	};
	$('.icy-menu li').on('click', function(event) {
		var $panel = $(this),
		$activePanelContents = $(".active").find("div");
		$panelContents = $panel.find("ul"),
		$activePanelContents = $(".icy").find("ul");
		if ($panel.hasClass("icy")) {
			$panelContents.slideUp();
		} else {
			$activePanelContents.slideUp();
			$panelContents.slideDown();
		}
		event.stopPropagation();
	});
});