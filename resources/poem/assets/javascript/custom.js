$(document).ready(function(){


	$(window).scroll(function(){

		var topPx = $("html").scrollTop();
		if(topPx>0){


			$("#logo-and-nav").addClass("position-top");
	   
			
		}else{
		   $("#logo-and-nav").removeClass("position-top");
		}
	})


})