$(document).ready(function() {
  var navigationHeight = $("#header-wrapper").height(),
      offsetTolerance = 40,
      willSelectNavigationSection = true;

  $(".navigation .section").click(function(e) {
    e.preventDefault();
    var sectionName = this.classList[1];

    willSelectNavigationSection = false;
    $("body, html").animate(
      {scrollTop: $("#" + sectionName).offset().top - navigationHeight},
      500,
      "swing",
      function() {
        willSelectNavigationSection = true;
      });
  });

  //Detecting user's scroll
  $(window).scroll(function() {
    //Check scroll position
    var scrollPosition  = $(window).scrollTop();

    //Move trough each menu and check its position with scroll position then add selected-nav class
    $(".navigation .section").each(function() {
      var sectionName = this.classList[1],
	  originSectionPosition  = $("#" + sectionName).offset().top,
	  sectionPosition = originSectionPosition - navigationHeight - offsetTolerance;

      if (scrollPosition >= sectionPosition && scrollPosition - 400 < sectionPosition ) {
        console.log(sectionName, scrollPosition, sectionPosition);
        $(".navigation .section").removeClass("selected-nav");
        $(".navigation ." + sectionName).addClass("selected-nav");
      }
    });
  });

  var allwhatwedos =[["Audi","Volvo","BMW"], ["Honda","Suzuki","Yamaha"], ["Thongnhat","Giant","Mini"]];
  $( ".anchor" ).click(function() {
    var whatwedos = $(this).data("text").split(';'),
	anchor = $(this).data("anchor");

    $(".magma").fadeOut(200);
    $(".magma"+ anchor).fadeIn(200);
    $(".text").fadeOut(200, function(){
      $(".text1").text(whatwedos[0]);
      $(".text2").text(whatwedos[1]);
      $(".text3").text(whatwedos[2]);
    });

    $(".text").fadeIn(200);
  });
})

// $(document).ready(function() {
//   $(function() {
//     var pull        = $('#pull');
//         menu        = $('.navigation');
//         menuHeight  = menu.height();

//     pull.click(function(e) {
//       e.preventDefault();
//       menu.slideToggle();
//     });
//   });

//   $(window).resize(function() {
//     var width = $(window).width();
//     if (width > 480 && menu.is(':hidden'))
//       menu.removeAttr('style');
//   });
//   window.onload = function(){
// 		init();
// 	};
// });
// function init(){
// 	//init what we do
// 	$("#content-wrapper #whatwedo .technology .app").mouseover(function(){
// 		$("#content-wrapper #whatwedo img:nth-child(1)").show();
// 		$("#content-wrapper #whatwedo img:nth-child(2)").hide();
// 		$("#content-wrapper #whatwedo img:nth-child(3)").hide();
// 		$("#content-wrapper #whatwedo .technology .web img").show();
// 		$("#content-wrapper #whatwedo .technology .design img").show();
// 		$("#content-wrapper #whatwedo .technology .app img").hide();
// 	});
// 	$("#content-wrapper #whatwedo .technology .web").mouseover(function(){
// 		$("#content-wrapper #whatwedo img:nth-child(2)").show();
// 		$("#content-wrapper #whatwedo img:nth-child(1)").hide();
// 		$("#content-wrapper #whatwedo img:nth-child(3)").hide();
// 		$("#content-wrapper #whatwedo .technology .app img").show();
// 		$("#content-wrapper #whatwedo .technology .design img").show();
// 	});
// 	$("#content-wrapper #whatwedo .technology .design").mouseover(function(){
// 		$("#content-wrapper #whatwedo img:nth-child(3)").show();
// 		$("#content-wrapper #whatwedo img:nth-child(1)").hide();
// 		$("#content-wrapper #whatwedo img:nth-child(2)").hide();
// 		$("#content-wrapper #whatwedo .technology .app img").show();
// 		$("#content-wrapper #whatwedo .technology .web img").show();
// 	});

// 	//init who we are
// 	_introduceCanvas = document.getElementById("whoweare-canvas");
// 	_introduceContext = _introduceCanvas.getContext("2d");
// 	_introduceContext.font = " 15pt Calibri";
// 	_introduceContext.fillStyle="white";
// 	_introduceContext.fillText("Xin chao tat ca moi nguoi chung toi la volcano!",150,50);

// 	$("#content-wrapper #whoweare .member .nghia").mouseover(function(){
// 		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").show();
// 	});
// 	$("#content-wrapper #whoweare .member .nghia").mouseout(function(){
// 		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").hide();
// 	});

// 	$("#content-wrapper #whoweare .member .dang").mouseover(function(){
// 		$("#content-wrapper #whoweare .member .dang img:nth-child(1)").show();
// 	});
// 	$("#content-wrapper #whoweare .member .dang").mouseout(function(){
// 		$("#content-wrapper #whoweare .member .dang img:nth-child(1)").hide();
// 	});

// 	//init contact us
// 	$("#content-wrapper #contactus .contact .icon_info img:nth-child(1)").mouseover(function(){
// 		$("#content-wrapper #contactus .contact .info img:nth-child(1)").show();
// 	});
// 	$("#content-wrapper #contactus .contact .icon_info img:nth-child(1)").mouseout(function(){
// 		$("#content-wrapper #contactus .contact .info img:nth-child(1)").hide();
// 	});

// 	$("#content-wrapper #contactus .contact .icon_info img:nth-child(2)").mouseover(function(){
// 		$("#content-wrapper #contactus .contact .info img:nth-child(2)").show();
// 	});
// 	$("#content-wrapper #contactus .contact .icon_info img:nth-child(2)").mouseout(function(){
// 		$("#content-wrapper #contactus .contact .info img:nth-child(2)").hide();
// 	});

// 	$("#content-wrapper #contactus .contact .send").click(function(){
// 		alert("Name : " + $("#content-wrapper #contactus .contact .messagesentry #messages").val() + "\n"
// 				+ "Email : " + $("#content-wrapper #contactus .contact .username #username").val() + "\n"
// 				+ "Message : "+$("#content-wrapper #contactus .contact .emailaddress #email").val());
// 		$("#content-wrapper #contactus .contact .messagesentry #messages").val("");
// 		$("#content-wrapper #contactus .contact .username #username").val("");
// 		$("#content-wrapper #contactus .contact .emailaddress #email").val("");
// 	});
// }
