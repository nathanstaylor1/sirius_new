function centerImage(){

	var imgWidth = $("#slider").width()
	var wrapWidth = $("#slider-holder").width()

	$("#slider").css("left", (wrapWidth - imgWidth) / 2 )

}




$(document).ready(function(){
	
$("#display-btn-links").on("click",function(){
	$("#display-btn-links").addClass("color");
	$("#display-btn-tools").removeClass("color");
	$("#display-btn-articles").removeClass("color");
	$("#link-list").addClass("active");
	$("#tool-list").removeClass("active");
	$("#article-list").removeClass("active");
});
$("#display-btn-tools").on("click",function(){
	$("#display-btn-links").removeClass("color");
	$("#display-btn-tools").addClass("color");
	$("#display-btn-articles").removeClass("color");
	$("#link-list").removeClass("active");
	$("#tool-list").addClass("active");
	$("#article-list").removeClass("active");
});
$("#display-btn-articles").on("click",function(){
	$("#display-btn-links").removeClass("color");
	$("#display-btn-tools").removeClass("color");
	$("#display-btn-articles").addClass("color");
	$("#link-list").removeClass("active");
	$("#tool-list").removeClass("active");
	$("#article-list").addClass("active");
});

$(".edit-button").on("click",function(){

	var identifier = $(this).attr("id")

    $("." + identifier + " .hideable").toggleClass("show");

});



	for (var i = 0; i < 5; i++){
		setTimeout(function(){
			centerImage()
		},Math.pow(10, i));
	}

	$("#testimonials").carousel();

});

