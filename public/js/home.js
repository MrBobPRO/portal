var owl = $('.owl-carousel');

$('.owl-carousel').owlCarousel({
   loop:true,
   margin:0,
   nav:true,
   items: 1,
   autoplay:true,
   autoplayTimeout:4000,
   autoplayHoverPause:true,
})

// $('.play').on('click',function(){
//     owl.trigger('play.owl.autoplay',[5000])
// })
// $('.stop').on('click',function(){
//     owl.trigger('stop.owl.autoplay')
// })