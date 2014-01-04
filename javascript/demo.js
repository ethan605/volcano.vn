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
	$("#content-wrapper #whatwedo .technology .app").mouseover(function(){
		$("#content-wrapper #whatwedo img:nth-child(1)").show();
		$("#content-wrapper #whatwedo img:nth-child(2)").hide();
		$("#content-wrapper #whatwedo img:nth-child(3)").hide();
		$("#content-wrapper #whatwedo .technology .web img").show();
		$("#content-wrapper #whatwedo .technology .design img").show();
	});
	$("#content-wrapper #whatwedo .technology .web").mouseover(function(){
		$("#content-wrapper #whatwedo img:nth-child(2)").show();
		$("#content-wrapper #whatwedo img:nth-child(1)").hide();
		$("#content-wrapper #whatwedo img:nth-child(3)").hide();
		$("#content-wrapper #whatwedo .technology .app img").show();
		$("#content-wrapper #whatwedo .technology .design img").show();
	});
	$("#content-wrapper #whatwedo .technology .design").mouseover(function(){
		$("#content-wrapper #whatwedo img:nth-child(3)").show();
		$("#content-wrapper #whatwedo img:nth-child(1)").hide();
		$("#content-wrapper #whatwedo img:nth-child(2)").hide();
		$("#content-wrapper #whatwedo .technology .app img").show();
		$("#content-wrapper #whatwedo .technology .web img").show();
	});
	
	//init canvas
	_resultCanvas = document.getElementById("whoweare-canvas");
	_resultContext = _resultCanvas.getContext("2d");
	_resultContext.font = " 15pt Calibri";
	 _resultContext.fillStyle="white";
	_resultContext.fillText("Xin chao tat ca moi nguoi chung toi la volcano!",150,40);
	
	$("#content-wrapper #whoweare .member .nghia").mouseover(function(){
		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").show();
		$("#content-wrapper #whoweare .member .nghia img:nth-child(2)").fadeIn();
	});
	$("#content-wrapper #whoweare .member .nghia").mouseout(function(){
		$("#content-wrapper #whoweare .member .nghia img:nth-child(1)").hide();
	});
}