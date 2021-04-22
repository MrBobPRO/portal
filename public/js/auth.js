
function showHidePassword(input, btn) {
   var icon = document.getElementById(btn);
   var password = document.getElementById(input);
   if (icon.innerHTML == 'visibility') {
      password.setAttribute('type', 'text')
      icon.innerHTML = 'visibility_off';
   } else {
      icon.innerHTML = 'visibility'
      password.setAttribute('type', 'password')
   }
};

var label = document.getElementById('email-label');
var input = document.getElementById('email');
var spinner = document.getElementsByClassName('spinner')[0];
var sendBtn = document.getElementById('send-link-btn');

function resetStyle() {
   label.innerHTML = 'Адрес электронной почты';
   label.style.color = '#0C81B1';
   input.style.borderColor = '#0C81B1';
}

function resendEmail() {
   document.getElementsByClassName('reset-password-email')[0]
           .style.zIndex = '-1';
   document.getElementById('email').value = '';
   spinner.style.display= 'none';
   sendBtn.removeAttribute('disabled')
}

//Ajax request setup
$.ajaxSetup({
   headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function ajax_forgot_password() {
   event.preventDefault();
   //Variables
      var spinner = document.getElementsByClassName('spinner')[0];
      var sendBtn = document.getElementById('send-link-btn');
      var email = document.getElementById('email').value;
   //Display spinner
      spinner.style.display = 'flex';
      sendBtn.setAttribute('disabled', 'disabled');
   //Send ajax request
   $.ajax({
         type: 'POST',
         url: '/forgot_password',
         data: { email: email},
         timeout: 600000,

         success: function (msg) {
            if (msg == 'success') {
               //Show success card
               document.getElementsByClassName('reset-password-email')[0]
                       .style.zIndex = '0';
            }
            else {
               //Show errors visually
               label.innerHTML = 'Неверный адрес электронной почты';
               label.style.color = 'red';
               input.style.borderColor = 'red';

               spinner.style.display = 'none';
               sendBtn.removeAttribute('disabled')
            }

         },
         error: function () {
            alert('Could not send ajax request!');
         }
      });
}
function ajax_reset_password() {
   event.preventDefault();
   //Variables
      var spinner = document.getElementsByClassName('spinner')[0];
      var sendBtn = document.getElementById('send-link-btn');
      var token = document.getElementById('token').value;
      var password = document.getElementById('password').value;
      var confirmPassword = document.getElementById('confirm-password').value;
      var error = document.getElementById('errors');
      var successCard = document.getElementsByClassName('reset-password-success')[0];
   //Display spinner
      spinner.style.display = 'flex';
      sendBtn.setAttribute('disabled', 'disabled');

   if ( password.length < 6) {
      document.getElementById('password').style.borderColor = 'red';
      document.getElementById('confirm-password').style.borderColor = 'red';
      error.innerHTML = 'Пароль должен содержать минимум 6 символов';
      error.style.display = 'block';
      spinner.style.display = 'none';
      sendBtn.removeAttribute('disabled');
      return 
   } else if ( password != confirmPassword ) {
      document.getElementById('password').style.borderColor = 'red';
      document.getElementById('confirm-password').style.borderColor = 'red';
      error.innerHTML = 'Пароли не совпадают';
      error.style.display = 'block';
      spinner.style.display = 'none';
      sendBtn.removeAttribute('disabled');
      return 
   }
   //Send ajax request
   $.ajax({
      type: 'POST',
      url: '/reset_password',
      data: {token: token,
            password: password},
      timeout: 600000,

      success: function (msg) {
         if (msg == 'success') {
            //Show success card
            successCard.style.zIndex = '0';
         }
         else {
            console.log('error');
         }
      },
      error: function () {
         alert('Could not send ajax request!');
      }
   });
}