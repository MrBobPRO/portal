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
      if (eye.innerHTML == 'visibility_off') {
         password.setAttribute('type', 'password');
         eye.innerHTML = 'visibility';
      } else {
         password.setAttribute('type', 'text');
         eye.innerHTML = 'visibility_off';
      }
   }
}

//Edit password start
//Ajax request setup start
$.ajaxSetup({
   headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function ajax_edit_password() {
   event.preventDefault();
   //Variables
   var password = document.getElementById('password').value;
   var passwordInput = document.getElementById('password');
   var passwordError = document.getElementsByClassName('password-error')[0];
   
   var newPassword = document.getElementById('new-password').value;
   var newPasswordInput = document.getElementById('new-password');
   var newPasswordError = document.getElementsByClassName('new-password-error')[0];

   var confirmPassword = document.getElementById('confirm-password').value;
   var confirmPasswordInput = document.getElementById('confirm-password');
   var confirmPasswordError = document.getElementsByClassName('confirm-password-error')[0];
   
   //Send ajax request
   $.ajax({
         type: 'POST',
         url: '/update_password',
         data:{
            password: password,
            newPassword: newPassword,
            confirmPassword: confirmPassword
         },
         timeout: 600000,

         success: function (response) {
            if (response == 'passwordNotMatched') {
               passwordError.style.display = 'block';
               passwordInput.style.borderColor = 'red';
            } else if (response == 'newPasswordDoesntMatch') {
               passwordError.style.display = 'none';
               passwordInput.style.borderColor = '#00bcd4';
               
               newPasswordError.style.display = 'block';
               confirmPasswordError.style.display = 'block';
               confirmPasswordError.innerHTML = 'Пароли не совпадают';
               confirmPasswordError.style.color = 'red';
               newPasswordInput.style.borderColor = 'red';
               confirmPasswordInput.style.borderColor = 'red';
            } else {
               password = '';
               passwordInput.style.borderColor = '#00bcd4';
               passwordError.style.display = 'none';

               newPassword = '';
               newPasswordInput.style.borderColor = '#00bcd4';
               newPasswordError.style.display = 'none';

               confirmPassword = '';
               confirmPasswordInput.style.borderColor = '#00bcd4';
               confirmPasswordError.innerHTML = 'Ваш пароль успешно изменен';
               confirmPasswordError.style.color = 'green';
            }

         },
         error: function () {
            alert('ERROR!');
         }
      });
}//Ajax request setup end

//Edit password end