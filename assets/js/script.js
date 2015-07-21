function centerImage(){

	var imgWidth = $("#slider").width()
	var wrapWidth = $("#slider-holder").width()

	$("#slider").css("left", (wrapWidth - imgWidth) / 2 )

}




$(document).ready(function(){
	
$("#display-btn-links").on("click",function(){
	$("#link-list").addClass("active");
	$("#tool-list").removeClass("active");
	$("#article-list").removeClass("active");
});
$("#display-btn-tools").on("click",function(){
	$("#link-list").removeClass("active");
	$("#tool-list").addClass("active");
	$("#article-list").removeClass("active");
});
$("#display-btn-articles").on("click",function(){
	$("#link-list").removeClass("active");
	$("#tool-list").removeClass("active");
	$("#article-list").addClass("active");
});


	console.log("working")

	for (var i = 0; i < 5; i++){
		setTimeout(function(){
			centerImage()
		},Math.pow(10, i));
	}

	$("#testimonials").carousel();

});

