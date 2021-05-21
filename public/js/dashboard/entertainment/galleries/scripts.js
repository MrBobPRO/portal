
//Dropzone File uploader
Dropzone.autoDiscover = false;
$("#dropzone").dropzone({
   url: "/upload/dropzone_photo",
   headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') },
   uploadMultiple: true,
   paramName: 'files',
   acceptedFiles: 'image/*',
   dictDefaultMessage: 'Для добавления картинки в галерею выберите или перетащите файлы сюда !',
   dictInvalidFileType: 'Неверный формат файла !',
   dictUploadCanceled: 'Отменено',
   init: function() {
      this.on("sending", function(file, xhr, formData){
              formData.append("gallery_id", $('input[name="id"]').val());
      });
  }
});

function ajax_delete_gallery_image(filename) {

      $.ajax({
         type: 'POST',
         url: '/delete_gallery_image',
         data: { filename: filename},
         
         success: function () {
            //remove image from gallery
            let img = $('img[src$="' + filename + '"]');
            img.parent().remove();
         }
      });
}