 $('#myCarousel').carousel({
    interval: 10000
})

$('#myCarousel.carousel .item').each(function(){
	var next = $(this).next();
    
	if (!next.length) {
            next = $(this).siblings(':first');            
	}
    
	next.children(':first-child').clone().appendTo($(this));
  
	for (var i=0; i<3; i++) {
        
        next=next.next();
        
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
	}
});

$('#myCarouselBig').on('slide.bs.carousel', function (event) {
    if (event.direction == 'left') $('#myCarousel').carousel('next');
    else {
        $('#myCarousel').carousel('prev');
        $('#myCarousel').carousel('pause');
    }
})
