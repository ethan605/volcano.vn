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
});