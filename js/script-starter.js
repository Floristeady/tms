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
  
$(function() {  
	//isotope para blog
	if( $('.blog-content').length) {
		var $container = $('.blog-content');
		
		$container.imagesLoaded( function(){
		  $container.isotope({
			    itemSelector : 'article',
			    layoutMode : 'masonry',
			    itemPositionDataEnabled: true
		  });
		});
	}

	//css blog
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
	
	//css para newsletter form
	if ( $('#sidebar .newsletter').length) {
		$('#sidebar .newsletter').parents('aside').css('padding','0');
		$('#sidebar .newsletter').parents('aside').css('width','100%');
	}

	//cambio texto placeholder buscador
    $('#searchform').find("input[type=search]").each(function(ev) {
	      if(!$(this).val()) { 
			  $(this).attr("placeholder", "Buscar en blog");
		 }
    });
  
    //eliminar línea menu
    $('li.no-text a').each(function() {
	    if ($(this).text() == '-')
	        $(this).text('');
     });
});  


$(function() { 

	
  $(".home a.modal").leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });

  // if the cookie doesn't exist create it and show the modal  -- suscribe
  if (!$.cookie('suscribe') ) {
	// create the cookie. Set it to expire in 1 day
	$.cookie('suscribe', true, { expires: 5 });
    //call the reveal modal
    var delay=1000; 
    setTimeout(function(){
         $(".modal").click();
		 },delay);
   }
});