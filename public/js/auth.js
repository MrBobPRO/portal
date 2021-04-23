
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
   label.innerHTML = 'Email address';
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
   //Display spinner
      spinner.style.display = 'flex';
      sendBtn.setAttribute('disabled', 'disabled');
   var email = document.getElementById('email').value;

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
               label.innerHTML = 'Invalid email address';
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