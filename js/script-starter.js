/*
	Any site-specific scripts you might have.
*/


$(window).load(function() {
  if ( $('.carousel-collections').length) {
	  $('.carousel-collections').flexslider({
	    animation: "slide",
	    animationLoop: true,
	    controlNav: false,
	    directionNav: true,
	    itemWidth: 245,
	    itemMargin: 5,
	    start: function(){
		    $('.carousel-collections').animate({
			   opacity: 1 
		    });
	    }
	  });
  }
  
});

if ( $('.blog-content').length) {
	var $container = $('.blog-content');
	
	$container.imagesLoaded( function(){
	  $container.isotope({
	        // options
		    itemSelector : 'article',
		    layoutMode : 'masonry',
		    itemPositionDataEnabled: true
	  });
	});
}

$(function() {
	$('.sub-menu').animate({opacity: 1 }, 100);
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
	
	//si el post en el listado tiene imagen
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
	
	//si hay post relacionados
	var yarpp = $('.single .yarpp-related');	
	$(yarpp).each(function() {	
	     var yarppthumb = $(this).find('.yarpp-thumbnail');	 
		 if(!$(yarppthumb).length > 0){
			$(this).css('display','none');
		} 
	});

	//si sub-menu esta visible o no
	if($('.sub-menu').css('display') == 'none') {
		$('.sub-menu').remove();
	} else if ($('.sub-menu').css('display') == 'block') {
		$('li.current_page_parent').addClass('current-menu-item');
		$('li.current_page_parent').prev().find('a').css('border-right','none');
		$('.sub-menu').animate({opacity: 1 });
	}
	
	if ( $('#sidebar .newsletter').length) {
		$('#sidebar .newsletter').parents('aside').css('padding','0');
		$('#sidebar .newsletter').parents('aside').css('width','100%');
	}

});

$(document).ready(function(){ 
  $('#searchform').find("input[type=search]").each(function(ev) {
      if(!$(this).val()) { 
		  $(this).attr("placeholder", "Buscar en blog");
	 }
  });
  
  $('li.no-text a').each(function() {
    if ($(this).text() == '-')
        $(this).text('');
   });
});