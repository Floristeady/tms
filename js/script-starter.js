/*
	Any site-specific scripts you might have.
*/

$(window).load(function() {
  $('.carousel-collections').flexslider({
    animation: "slide",
    animationLoop: true,
    controlNav: false,
    directionNav: true,
    itemWidth: 245,
    itemMargin: 5,
    start: function(){
	    $('.carousel-collections').css('opacity','1');
    }
  });
});

var $container = $('.blog-content');

$container.imagesLoaded( function(){
  $container.isotope({
        // options
	    //itemSelector : 'article',
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
	
	var homecontent = $('.home-content article.post');
	
	$(homecontent).each(function() {
	     var that = $(this).find('.entry-header');	
	     var thumb = $(this).find('a.post-thumbnail');	 

		 if(!$(thumb).length > 0){
			$(that).find('.list-title').css('margin-top','0');
			$(that).find('.list-title').css('width','100%');
			$(that).find('.post-categories').css('margin-top','0');
			$(that).find('.post-categories').css('float','none');
		} 
	});
});

$(document).ready(function(){ 
  $('#searchform').find("input[type=search]").each(function(ev)
  {
      if(!$(this).val()) { 
     $(this).attr("placeholder", "Buscar en blog");
  }
  });
});