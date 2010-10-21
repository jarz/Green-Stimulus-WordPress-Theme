$(document).ready(function() {  
	$('.play-video').click(function() {
    $(this).next().next().lightbox_me({ destroyOnClose: true, centered: true });
    return false;
	});
	$('.video-embed .close').click(function() {
    $(this).append('body>.video-embed');
	});
    $('#main-nav li').hover(function(){ 
        $(this).addClass('active');
        $(this).find('ul:first').fadeIn("medium");
    }, function() {
        $(this).removeClass('active');
        $(this).find('ul:first').fadeOut("medium");
    });
});
