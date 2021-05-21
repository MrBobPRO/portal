
// -------------------------Entertainment videos update start--------------------------------
function videos_update() {
   event.preventDefault();

   //display file sizes if inputs contain files
   var file = document.getElementById('file').files[0];
   if (file) {
      document.getElementById('spinner_file_size').innerHTML = (file.size / 1024 / 1024).toFixed(2) + ' мг. ';
      window.scrollTo(0, 0);
      document.getElementById('spinner-container').classList.add('show');
   }

   //generate new FormData object
   var form = $('#videos_update_form')[0];
   var data = new FormData(form);


   //send video update ajax request
   $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/update_video',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,

      xhr: function () {  //show progress of uploading file
         

         var xhr = new XMLHttpRequest();
         var total = 0;
         var spinner_uploaded_percent = $('#spinner_uploaded_percent')[0];
                     
           
         //if file exists
         if (file) {
            // Get the total size of file
            total = file.size;

            // Called when upload progress changes. xhr2
            xhr.upload.addEventListener("progress", function (evt) {
               // get loading state in percent
               var loaded = (evt.loaded / total).toFixed(2) * 100;
               
               spinner_uploaded_percent.innerHTML = loaded + ' %';
            }, false);
         }
            
         return xhr;
         
      },

      success: function () {
         window.scrollTo(0, 0);
         location.reload();
      },
      error: function () {
         alert('Error!');
      }
   });
}

// -------------------------Entertainment videos update end--------------------------------



// -------------------------Entertainment videos create start--------------------------------
function videos_create() {
   event.preventDefault();

   //display file sizes & show spinner
   var file = document.getElementById('file').files[0];
   document.getElementById('spinner_file_size').innerHTML = (file.size / 1024 / 1024).toFixed(2) + ' мг. ';
   window.scrollTo(0, 0);
   document.getElementById('spinner-container').classList.add('show');

   //generate new FormData object
   var form = $('#videos_create_form')[0];
   var data = new FormData(form);


   //send video store ajax request
   $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/store_video',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,

      xhr: function () {  //show progress of uploading file
         
         var xhr = new XMLHttpRequest();
         var total = 0;
         var spinner_uploaded_percent = $('#spinner_uploaded_percent')[0];
                     
         // Get the total size of file
         total = file.size;

         // Called when upload progress changes. xhr2
         xhr.upload.addEventListener("progress", function (evt) {
            // get loading state in percent
            var loaded = (evt.loaded / total).toFixed(2) * 100;
            
            spinner_uploaded_percent.innerHTML = loaded + ' %';
         }, false);
            
         return xhr;
         
      },

      success: function () {
         window.scrollTo(0, 0);
         location.reload();
      },
      error: function () {
         alert('Error!');
      }
   });
}

// -------------------------Entertainment videos create end--------------------------------