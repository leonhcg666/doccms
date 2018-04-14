// JavaScript Document

	$(document).ready(function(){ 
		// var height=$("#navbar-custom").height()+50;
		// var nav=$("#navbar-custom");
		// 	$(window).scroll(function(){ 
		// 		if($(this).scrollTop()>height){
		// 			nav.addClass("nav-fixed-top"); 
		// 		}else{
		// 			nav.removeClass("nav-fixed-top");
		// 		}	
		// 	})
		$("#navbar-btn").click(function(){
			var expanded=$(this).attr("aria-expanded");
			if(expanded=="false"){;
				$(".widget").addClass("sleep");
				nav.addClass("awake");
			}else{
				$(".widget").removeClass("sleep");
				nav.removeClass("awake");
			}
		})
		$('a[data-toggle="tab"]').hover(function(){
			$(this).tab('show');
		})
		$(window).resize(function(){
			var width=$(this).width();
			var nav=$("#navbar-custom");
			
			if (width>999){
				$(".widget").removeClass("sleep");
				nav.removeClass("awake");
			}
		});
		$(".widget").click(function(){
			var expanded=$("#navbar-btn").attr("aria-expanded");
			if(expanded=="true"){
				$(".widget").removeClass("sleep");
				nav.removeClass("awake");
				$('#navbar-btn').collapse({
				  toggle: false
				})
				$(".navbar-collapse").collapse('toggle');
			}
		});
		// $(".widget").swipe( {
		// 	swipeLeft:function(event, direction, distance, duration, fingerCount){
				
		// 		var expanded=$("#navbar-btn").attr("aria-expanded");
		// 		if(expanded=="false"){;
		// 			$(".widget").addClass("sleep");
		// 			nav.addClass("awake");
		// 			$('#navbar-btn').collapse({
		// 			  toggle: false
		// 			})
		// 			$(".navbar-collapse").collapse('toggle');
		// 		}
				
		// 	},
		// 	threshold:10,
		// 	allowPageScroll:"auto",
		// });
					
		$(".content a").css("color","#008eb7");
		$(".content img").css("max-width","100%");
		$(".news-date")
	});
	function getDate(strDate) {    
          var date = eval('new Date(' + strDate.replace(/\d+(?=-[^-]+$)/,    
           function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');    
          return date;    
     }