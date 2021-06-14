//Russian translations for select2 messages
$.fn.select2.amd.define('select2/i18n/ru',[],function () {
   return {
       errorLoading: function () {
           return 'Результат не может быть загружен.';
       },
       inputTooLong: function (args) {
           var overChars = args.input.length - args.maximum;
           var message = 'Пожалуйста, удалите ' + overChars + ' символ';
           if (overChars >= 2 && overChars <= 4) {
               message += 'а';
           } else if (overChars >= 5) {
               message += 'ов';
           }
           return message;
       },
       inputTooShort: function (args) {
           var remainingChars = args.minimum - args.input.length;

           var message = 'Пожалуйста, введите ' + remainingChars + ' или более символов';

           return message;
       },
       loadingMore: function () {
           return 'Загружаем ещё ресурсы…';
       },
       maximumSelected: function (args) {
           var message = 'Вы можете выбрать ' + args.maximum + ' элемент';

           if (args.maximum  >= 2 && args.maximum <= 4) {
               message += 'а';
           } else if (args.maximum >= 5) {
               message += 'ов';
           }

           return message;
       },
       noResults: function () {
         return 'Ничего не найдено';
       },
       searching: function () {
         return 'Поиск…';
       }
   };
});

$(document).ready(function () {
   //Select2
   $('.select2_single').select2(
        {
            // allowClear: true,
            language: 'ru'
        }
   );  

   //MultiSelect2
   $('.select2_multiple').select2(
        {
            closeOnSelect: false,
            language: 'ru',
            width: '100%'
            // tags: true, means that user can create new option
            // tokenSeparators: [',', ' '], Automatic tokenization into tags
        }
    );
});


//Chaange search placeholder on select2 show and focus on it
$('.select2_single').on('select2:open', function (e) {
   // $('.select2-search__field')[0].placeholder = 'Поиск...';
   $('.select2-search__field')[0].focus();
});

//----------------Linked Select2--------------------------
//Change window url on linked selects
$('.select2_single_linked').on('select2:select', function (e) {
   window.location = e.params.data.id;
});
//----------------Linked Select2--------------------------
// ---------------------Entertainment & Knowledge select video from catalog start-------------------------
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
// ---------------------Entertainment $ Knowledge select video from catalog end-------------------------

//clear catalog input value on file input change
function clear_catalog_input() {
   if(file_input.value != null)
      catalog_input.value = null;
}