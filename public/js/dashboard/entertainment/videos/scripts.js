

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

      xhr: function () { //xhr function must return xhr (empty function will return error)
         
         var xhr = new XMLHttpRequest();
           
         //show progress of uploading file if exists
         if (file) {
            var spinner_uploaded_percent = $('#spinner_uploaded_percent')[0];
            // Get the total size of file
            var total = file.size;

            // Called when upload progress changes. xhr2
            xhr.upload.addEventListener("progress", function (evt) {
               // get loading state in percent
               var loaded = (evt.loaded / total).toFixed(2) * 100;
               
               spinner_uploaded_percent.innerHTML = loaded + ' %';
            }, false);
         }
            
         return xhr;
         
      },

      success: function (url) {
         window.location.href = url;
      },
      error: function () {
         console.log('Error!');
      }
      
   });
}

// -------------------------Entertainment videos update end--------------------------------



// -------------------------Entertainment videos create start--------------------------------
function videos_create() {
   event.preventDefault();

   //display file sizes & show spinner if uploading new file (not from catalog)
   var uploading_new_file = true;
   if (document.getElementById('file').files.length == 0) 
      uploading_new_file = false;
   
   if (uploading_new_file) {
      var file = document.getElementById('file').files[0];
      document.getElementById('spinner_file_size').innerHTML = (file.size / 1024 / 1024).toFixed(2) + ' мг. ';
      window.scrollTo(0, 0);
      document.getElementById('spinner-container').classList.add('show');
   }

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

      xhr: function () {  //xhr function must return xhr (empty function will return error)
         
         var xhr = new XMLHttpRequest();
         
         //show progress of uploading file if itsnt file from catalog
         if (uploading_new_file) {
            var spinner_uploaded_percent = $('#spinner_uploaded_percent')[0];
            // Get the total size of file
            var total = file.size;

            // Called when upload progress changes. xhr2
            xhr.upload.addEventListener("progress", function (evt) {
               // get loading state in percent
               var loaded = (evt.loaded / total).toFixed(2) * 100;
               
               spinner_uploaded_percent.innerHTML = loaded + ' %';
            }, false);
         }

         return xhr;
         
      },

      success: function (url) {
         window.location.href = url;
      },
      error: function () {
         console.log('Error!');
      }
   });
}

// -------------------------Entertainment videos create end--------------------------------