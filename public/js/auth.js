
//Ajax request setup
$.ajaxSetup({
   headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function ajax_forgot_password() {
   event.preventDefault();

   var email = document.getElementById('email').value;

      //send ajax request
   $.ajax({
         type: 'POST',
         url: '/forgot_password',
         data: { email: email},
         timeout: 600000,

         success: function (msg) {
            if (msg == 'success') {
               var container = document.getElementsByClassName('reset-password-email')[0];
               container.style.zIndex = '0';
            }
            else {
               console.log('error');
            }

         },
         error: function () {
            alert('ERROR!');
         }
      });
}