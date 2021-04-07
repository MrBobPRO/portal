//Add class to active navbar item
$(document).ready(function () {
   $(".navbar-items").click(function () {
      $(this).children("div")
         .addClass("active").parent()
         .siblings()
         .children("div")
         .removeClass("active")
   })
});
