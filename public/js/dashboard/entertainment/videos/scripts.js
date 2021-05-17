
// -------------------------Entertainment update start--------------------------------
function videos_update() {
   event.preventDefault();

   //display file sizes if inputs contain files
   var file = document.getElementById('file').files[0];
   if (file) {
      document.getElementById('file_size').innerHTML = (file.size/1024/1024).toFixed(2) + ' мг. ' 
   }

   //generate new FormData object
   var form = $('#videos_update_form')[0];
   var data = new FormData(form);

   var check_uploading_file_size_interval = setInterval(ajax_check_uploading_file_size, 2000);

   //send video store ajax request
   $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/update_video',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,

      success: function () {
         location.reload();
      },
      error: function () {
         alert('error');
      }
   });
}

function ajax_check_uploading_file_size() {

   var id = $('#id')[0].value;

   $.ajax({
      type: 'POST',
      url: '/entertainmet/check_uploading_video_size',
      data: {id: id},
      timeout: 600000,

      success: function (response) {
         $('#uploaded_size')[0].innerHTML = response;
      },
      error: function () {
         alert('error');
      }
   });
}

// -------------------------Entertainment update end--------------------------------