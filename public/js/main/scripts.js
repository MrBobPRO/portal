//show or hide dashboard on click
function toogleDashboard() {
   var dashboard = document.getElementById('dashboard');
   if (dashboard.classList.contains('hidden')) {
      dashboard.classList.remove('hidden');
      ajaxStoreDashVisibility('visible');
   }

   else {
      dashboard.classList.add('hidden');
      ajaxStoreDashVisibility('hidden');
   }

}

//Ajax request setup start
$.ajaxSetup({
   headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

function ajaxStoreDashVisibility(vision) {
   $.ajax({
      type: 'POST',
      url: '/store_dashboard_visibility',
      data:{
         visibility: vision
      },
      succes: function () {
         console.log('success');
      },
      error: function () {
         alert('ERROR!');
      }
   });
}
