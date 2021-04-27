$(document).ready(function () {
   //Select2
   $('.select2_single').select2(
      {
         allowClear: true,
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

function showHidePassword(input, button) {
   var password = document.getElementById(input);
   var eye = document.getElementById(button);

   eye.onclick = function() {
      if (eye.innerHTML = 'visibility_off') {
         password.setAttribute('type', 'password');
         eye.innerHTML = 'visibility';
      } else {
         password.setAttribute('type', 'text');
         eye.innerHTML = 'visibility_off';
      }
   }
}