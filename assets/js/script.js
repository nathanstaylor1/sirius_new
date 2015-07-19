function centerSliders(){
	var imgWidth = $("#slider").width()
	var wrapWidth = $("#slider-holder").width()

	$("#slider").css("left", (wrapWidth - imgWidth) / 2 )

	console.log(imgWidth,wrapWidth)
}



$(document).ready(function(){

centerSliders();
	
$("#testimonials").carousel();

});

