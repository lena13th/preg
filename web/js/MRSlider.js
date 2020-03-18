$(function(){
	/*Saving #bool in variable to reduce processes of searching*/
	var Bool = $("#bool");
	var Item = $("#bool").find("li");

	/*Function for Transforming all slides with Cross-browser compatibility */
	$.fn.Transform = function () {
		$(this).css({
			"-webkit-transform":"translateZ(" + z + "px)",
			"-moz-transform:":"translateZ(" + z + "px)",
			"-o-transform":"translateZ(" + z + "px)",
			"-ms-transform":"translateZ(" + z + "px)",
			"transform":"translateZ(" + z + "px)",
		});
	};
	
	/* Delay in transitions like domino*/
	$.fn.Transit = function () {
		$(this).css({
			"transition-delay":"" + t + "s"		
		});
	};

	$( document ).ready(function() {
		/*When document (page) is ready body fadeIn slowly*/
		// $("body").css("display","none").delay(250).fadeIn(1000);
		/*Z is var. for position of slides, in this case - for first slide */
		z=300;
		bol=true;
		/*Set delay in 500 ms for showing of mini slider*/	
		// setTimeout(function(){
		// 	Item.each(function () {
		// 		/*Distance between slides in mini slider = 50px*/
		// 		$(this).Transform();
		// 		z=z-100;
		// 	});
		// }, 500);

	});


	/* open slider */
    	$( document ).ready(function() {
			$(".panel").toggleClass("down");
			$(".cube").toggleClass("cube2");
			if (bol==true) {
				t = Item.length/10;
				z=100;
				$("#bool").find("li").each(function () {
					$(this).Transit();
					$(this).Transform();
					z=z-100;
					t=t-0.1;
				});
				bol=false;
			} 
			else {
				z=200;
				t=0;
			
				$("#bool").find("li").each(function () {
					$(this).Transform();
					z=z-100;
					$(this).Transit();
				});
				bol=true;
			};
		});





	$(function(){
		$("#right").click(function(){
				$("#bool li:first").css({
					"-webkit-transition": "all 0.3s ease",
					"-webkit-transform":"translateX(100px) translateZ(100px)",
					"opacity":"0",
				});
				setTimeout(
					function(){
						$("#bool li:first").insertAfter("ul li:last");
						Item.css({
							"-webkit-transform":"translateZ(" + z + "px)"
						});
						z=100;
						t=0;
						v=1;
						$("#bool").find("li").each(function () {
							$(this).css({
								"transition-delay":"" + t + "s",	
							});
							$(this).Transform();
							z=z-100;
						});
						z=z+100;
						$("#bool li:last").css({
							"-webkit-transform":"translateX(-100px) translateZ(" + z + "px)"
						});
					},  
				300)
				
				setTimeout(
					function(){
						$("#bool li:last").css({
							"-webkit-transform":"translateX(0px) translateZ(" + z + "px)"
						});
						Item.css({
							"opacity":"1"
						});
					}, 
				400)
			});
					
		$("#left").click(function(){	
			$("#bool li:last").css({
				"-webkit-transition": "all 0.3s ease",
				"-webkit-transform":"translateX(-100px) translateZ(" + z + "px)",
				"opacity":"0",
			});
			setTimeout(
				function(){
					$("#bool li:last").insertBefore("#bool li:first");
					z=100;
					t=0;
					$("#bool").find("li").each(function () {
						$(this).css({
							"transition-delay":"" + t + "s"
						});
						$(this).Transform();
						z=z-100;
					});
					$("#bool li:first").css({
						"-webkit-transform":"translateX(100px) translateZ(100px)"
					});
				},
			300)

			setTimeout(
				function(){
					$("#bool li:first").css({
						"-webkit-transform":"translateX(0px) translateZ(100px)"
					});
					Item.css({
						"opacity":"1"
					});
				},
			400)
		});
	});
});
