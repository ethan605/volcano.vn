jQuery(document).ready(function($) {
	// Call function scrollTo
	$('a.scrollTo').click(function () {
		// $('a.scrollTo').removeClass('selected');
		// $(this).addClass('selected');
		// current = $(this);
		$('body').scrollTo($(this).attr('href'), 800);
		return false;
	});
	
	// width & height
	function wah(){
		var sec = $("section");
		var width = $(window).width(); // láº¥y giÃ¡ trá»‹ ngang mÃ ng hÃ¬nh hiá»‡n táº¡i
		var height = $(window).height();// láº¥y giÃ¡ trá»‹ dá»�c mÃ ng hÃ¬nh hiá»‡n táº¡i
		
		sec.css({'width': "820px",'height':height}); // láº¥y giÃ¡ dá»�c vÃ  ngang cho section
	}
	// 
	
	
	wah(); // Gá»�i cháº¡y function width vÃ  height

	// Thay Ä‘á»•i width & height khi thay Ä‘á»•i mÃ ng hÃ¬nh
	$(window).resize(function(){
		wah(); // Gá»�i cháº¡y function width vÃ  height
	})
});
