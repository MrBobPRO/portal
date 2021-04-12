$(document).ready(function () {
   $(".subjectcat-items").click(function () {
      $(this).children("h4")
      .addClass("hide").parent()
      .siblings()
      .children("h4")
      .removeClass("hide")

      $(this).children("ul")
      .addClass("show").parent()
      .siblings()
      .children("ul")
      .removeClass("show")
   })
});