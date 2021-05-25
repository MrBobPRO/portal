//Carousel start
var owl = $('.owl-carousel');

$('.owl-carousel').owlCarousel({
   loop: true,
   margin: 0,
   nav: false,
   items: 1,
   autoplay: false,
   autoplayTimeout: 4000,
   autoplayHoverPause: true,
});

// OWL CAROUSEL NAVIGATIONS
var owl = $('.owl-carousel');
owl.owlCarousel();

function nextSlide() {
   owl.trigger('next.owl.carousel');
}

function prevSlide() {
   owl.trigger('prev.owl.carousel');
}
//Carousel end
