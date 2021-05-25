//------------------------Simditor------------------------
var editors = document.getElementsByClassName('simditor-wysiwyg');
var textareas = [];

//change Simditor default locale
Simditor.locale = 'en-US';

for (i = 0; i < editors.length; i++) {
   textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {
         url: '/upload/simditor_photo', //image upload url by server
         params: {
            folder: 'ideas' //used in store folder path
         },
         fileKey: 'simditor_photo', //name of input
         connectionCount: 10,
         leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      defaultImage: '/img/ideas/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true, //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'italic', 'underline', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment']
   });
}
 //----------------------Simditor-----------------------