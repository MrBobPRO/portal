
function showHidePassword(inpt, btn) {
   var input = document.getElementById(inpt);
   var button = document.getElementById(btn);

   if (button.innerHTML == 'visibility_off') {
      input.setAttribute('type', 'password');
      button.innerHTML = 'visibility';
   } else {
      input.setAttribute('type', 'text');
      button.innerHTML = 'visibility_off';
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
               passwordInput.value = '';
               passwordInput.style.borderColor = '#00bcd4';
               passwordError.style.display = 'none';

               newPasswordInput.value = '';
               newPasswordInput.style.borderColor = '#00bcd4';
               newPasswordError.style.display = 'none';

               confirmPasswordInput.value = '';
               confirmPasswordInput.style.borderColor = '#00bcd4';
               confirmPasswordError.innerHTML = 'Ваш пароль успешно изменен';
               confirmPasswordError.style.display = 'block';
               confirmPasswordError.style.color = 'limegreen';
            }

         },
         error: function () {
            alert('ERROR!');
         }
      });
}//Ajax request setup end
//Edit password end


