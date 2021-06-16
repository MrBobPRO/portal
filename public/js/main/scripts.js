
//Ajax request setup start
$.ajaxSetup({
   headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});


var dashboard = document.getElementById('dashboard');
//show or hide dashboard on click
function toogleDashboard() {
   if (dashboard.classList.contains('hidden')) {
      dashboard.classList.remove('hidden');
      ajaxStoreDashVisibility('visible');
   }

   else {
      dashboard.classList.add('hidden');
      ajaxStoreDashVisibility('hidden');
   }

}


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
         console.log('ERROR!');
      }
   });
}
// Media toolbar search button toggle
const searchEl = document.getElementById('toobar-search-btn');
const searchFormEl = document.getElementsByClassName('search-form')[0];
searchEl.onclick = () => {
   searchFormEl.classList.toggle('show');   
}