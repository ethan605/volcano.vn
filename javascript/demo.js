$(document).ready(function() {
  //Bootstraping variable
  headerWrapper   = parseInt($('#header-wrapper').height());
  offsetTolerance = 40;
  
  //Detecting user's scroll
  $(window).scroll(function() {
    //Check scroll position
    scrollPosition  = parseInt($(this).scrollTop());
    
    //Move trough each menu and check its position with scroll position then add selected-nav class
    $('.navigation a').each(function() {
      thisHref          = $(this).attr('href');
      thisTruePosition  = parseInt($(thisHref).offset().top);
      thisPosition      = thisTruePosition - headerWrapper - offsetTolerance;
      
      if(scrollPosition >= thisPosition) {
        $('.selected-nav').removeClass('selected-nav');
        $('.navigation a[href='+ thisHref +']').parent('li').addClass('selected-nav');

        if (!$('#pull').is(':hidden'))
          $('.navigation').slideUp();
      }
    });
    
    //If we're at the bottom of the page, move pointer to the last section
    bottomPage  = parseInt($(document).height()) - parseInt($(window).height());
    
    if(scrollPosition == bottomPage || scrollPosition >= bottomPage) {
      $('.selected-nav').removeClass('selected-nav');
      $('.navigation a:last').parent('li').addClass('selected-nav');
    }
  });

  $(function() {
    var pull        = $('#pull');
        menu        = $('.navigation');
        menuHeight  = menu.height();

    pull.click(function(e) {
      e.preventDefault();
      menu.slideToggle();
    });
  });

  $(window).resize(function() {
    var width = $(window).width();
    if (width > 480 && menu.is(':hidden'))
      menu.removeAttr('style');
  });
  window.onload=function(){
		init();
	};
});
function init(){
	//init what we do
	$("#content-wrapper #whatwedo .technology .app").mouseover(function() {
		$("#content-wrapper #whatwedo > img").hide();
    $("#content-wrapper #whatwedo > img:nth-child(1)").show();
	});
	
  $("#content-wrapper #whatwedo .technology .web").mouseover(function() {
    $("#content-wrapper #whatwedo > img").hide();
		$("#content-wrapper #whatwedo > img:nth-child(2)").show();
	});

	$("#content-wrapper #whatwedo .technology .design").mouseover(function() {
    $("#content-wrapper #whatwedo > img").hide();
		$("#content-wrapper #whatwedo > img:nth-child(3)").show();
	});
	
	//init who we are
	_introduceCanvas = document.getElementById("whoweare-canvas");
	_introduceContext = _introduceCanvas.getContext("2d");
	_introduceContext.font = " 15pt Calibri";
	_introduceContext.fillStyle="white";
	_introduceContext.fillText("Xin chao tat ca moi nguoi chung toi la volcano!",150,50);
	
	$("#content-wrapper #whoweare .member .nghia").mouseover(function(){
		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").show();
	});
	$("#content-wrapper #whoweare .member .nghia").mouseout(function(){
		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").hide();
	});
	
	$("#content-wrapper #whoweare .member .dang").mouseover(function(){
		$("#content-wrapper #whoweare .member .dang img:nth-child(1)").show();
	});
	$("#content-wrapper #whoweare .member .dang").mouseout(function(){
		$("#content-wrapper #whoweare .member .dang img:nth-child(1)").hide();
	});
	
	//init contact us
	$("#content-wrapper #contactus .contact .icon_info img:nth-child(1)").mouseover(function(){
		$("#content-wrapper #contactus .contact .info img:nth-child(1)").show();
	});
	$("#content-wrapper #contactus .contact .icon_info img:nth-child(1)").mouseout(function(){
		$("#content-wrapper #contactus .contact .info img:nth-child(1)").hide();
	});
	
	$("#content-wrapper #contactus .contact .icon_info img:nth-child(2)").mouseover(function(){
		$("#content-wrapper #contactus .contact .info img:nth-child(2)").show();
	});
	$("#content-wrapper #contactus .contact .icon_info img:nth-child(2)").mouseout(function(){
		$("#content-wrapper #contactus .contact .info img:nth-child(2)").hide();
	});
	
	$("#content-wrapper #contactus .contact .send").click(function(){
		alert("Name : " + $("#content-wrapper #contactus .contact .messagesentry #messages").val() + "\n"
				+ "Email : " + $("#content-wrapper #contactus .contact .username #username").val() + "\n"
				+ "Message : "+$("#content-wrapper #contactus .contact .emailaddress #email").val());
		$("#content-wrapper #contactus .contact .messagesentry #messages").val("");
		$("#content-wrapper #contactus .contact .username #username").val("");
		$("#content-wrapper #contactus .contact .emailaddress #email").val("");
	});
}