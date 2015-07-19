function centerImage(){

	var imgWidth = $("#slider").width()
	var wrapWidth = $("#slider-holder").width()

	$("#slider").css("left", (wrapWidth - imgWidth) / 2 )

}


$(document).ready(function(){
	

	for (var i = 0; i < 5; i++){
		setTimeout(function(){
			centerImage()
		},Math.pow(10, i));
	}



	$("#testimonials").carousel();

});

