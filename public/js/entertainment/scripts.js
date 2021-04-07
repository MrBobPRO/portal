$(document).ready(function () {
   $(".video-gallery-items").click(function () {
      let video_id = $(this).children("img").attr("data-id");
      $(this).children(".play-icon")
      .addClass("active").parent()
      .siblings()
      .children(".play-icon")
      .removeClass("active")
      let newUrl = `${video_id}`;
      $("#video_id").attr("src", newUrl);
   })
});