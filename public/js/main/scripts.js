//show or hide dashboard on click
function toogleDashboard() {
   var dashboard = document.getElementById('dashboard');
   if (dashboard.classList.contains('hidden')) 
      dashboard.classList.remove('hidden');
   else
      dashboard.classList.add('hidden');
}
