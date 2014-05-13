"use strict";

!function ($) {
	$(function(){
		var $switcher = $("#switcher");
		$switcher.find(".toggle a").on("click", function(){
			if ($switcher.css("left") == "-150px") {
				$("#switcher").animate({
			      "left": "0"
			    }, "slow");
			}
			else {
				$("#switcher").animate({
			      "left": "-150px"
			    }, "slow");
			}			
		    return false;
		});
		$switcher.find("li a").on("click", function(){
			$("#style").attr("href", $(this).attr('rel'));
			return false;
		})
		
	})
}(window.jQuery)