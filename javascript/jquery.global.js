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
		var width = $(window).width(); // lấy giá trị ngang màng hình hiện tại
		var height = $(window).height();// lấy giá trị dọc màng hình hiện tại

		$("body").css('width', width*2); // gán thuộc tính ngang cho màng hình
		sec.css({'width': width,'height':height}); // lấy giá dọc và ngang cho section
	}
	// 
	
	
	wah(); // Gọi chạy function width và height

	// Thay đổi width & height khi thay đổi màng hình
	$(window).resize(function(){
		wah(); // Gọi chạy function width và height
	})
});
