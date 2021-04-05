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
// News__Modal Images
function showModal(src) {
   document.getElementById('image-modal').style.display = "flex";
   document.getElementById('modal-img').src = src;
}
function hideModal() {
   document.getElementById('image-modal').style.display = "none";
}