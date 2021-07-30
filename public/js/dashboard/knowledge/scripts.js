// ---------------------On video select from catalog start-------------------------------
var catalog_input = document.getElementById('catalog');
var file_input = document.getElementById('file');

function catalog_video_selected(filename) {
   // change input value
   catalog_input.value = filename;
   // set file input value to null
   file_input.value = null;

   //get catalog modal as bootstrap modal instance & hide it
   var modal1 = document.getElementById('catalogModal');
   var catalog_modal = bootstrap.Modal.getInstance(modal1);
   catalog_modal.hide();
}
// ---------------------On video select from catalog end-------------------------

//---------------------Clear catalog input value on file input change start---------------------
function clear_catalog_input() {
   if(file_input.value != null)
      catalog_input.value = null;
}
//---------------------Clear catalog input value on file input end---------------------

// -------------------------Update catalog on search input change start--------------------------------
var catalog_list = document.getElementById('catalog_list');
var catalog_items = catalog_list.getElementsByTagName('div');
var catalog_search_input = document.getElementById('catalog_search_input');

function update_catalog() {
   var search_keyword = catalog_search_input.value.toLowerCase();
   for (i = 0; i < catalog_items.length; i++) {
      var cat_filename = catalog_items[i].dataset.catalogFilename.toLowerCase();
      if (cat_filename.includes(search_keyword))
         catalog_items[i].classList.remove('hidden')
      else
         catalog_items[i].classList.add('hidden')
   }
}
// -------------------------Update catalog on search input change end--------------------------------


// -------------------------Knowledge videos create start--------------------------------
function knowledge_videos_create() {
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
      url: '/store_knowledge_videos',
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
         // show alert msg if user hasnt selected videfile
         if (url == 'error')
            alert('Пожалуйста, добавьте видеофайл или выберите видео из каталога!');
         else
            window.location.href = url;
      },
      error: function () {
         console.log('Error!');
      }
   });
}

// -------------------------Knowledge videos create end--------------------------------


// -------------------------Knowledge videos update start--------------------------------
function knowledge_videos_update() {
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
      url: '/update_knowledge_videos',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,

      xhr: function () {  //show progress of uploading file
         
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

// -------------------------Knowledge videos update end--------------------------------
