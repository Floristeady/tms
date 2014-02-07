/*
	Any site-specific scripts you might have.
*/
var $container = $('.blog-content');

$container.imagesLoaded( function(){
  $container.isotope({
        // options
	    itemSelector : 'article.post',
	    layoutMode : 'masonry',
	    itemPositionDataEnabled: true
  });
});

$(function() {
	var blogcontent = $('.blog-content article');
	
	$(blogcontent).each(function() {
	     var that = $(this).find('.entry-header');	
	     var thumb = $(this).find('a.post-thumbnail');	 

		 if(!$(thumb).length > 0){
			$(that).find('.list-title').css('margin-top','0');
			$(that).find('.list-title').css('width','357');
			$(that).find('.post-categories').css('margin-top','0');
			$(that).find('.post-categories').css('float','none');
		} 
	});
});

