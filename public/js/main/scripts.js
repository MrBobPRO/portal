// !MOBILE DASHBOARD SCRIPTS START
// show || hide dashboard
const menuEl = document.getElementById('menu-btn');
const menuIconEl = document.getElementById('menu-icon');
const mobDashEl = document.getElementById('mobile-dashboard');
menuEl.onclick = () => {
   mobDashEl.classList.toggle('hidden');
   if (menuIconEl.textContent == 'menu') {
      menuIconEl.textContent = 'menu_open';
   } else {
      menuIconEl.textContent = 'menu';
   }
}
// show search block
const mobSearchEl = document.getElementById('search-btn');
const searchBlockEl = document.getElementById('mobile-search');
mobSearchEl.onclick = () => {
   searchBlockEl.classList.toggle('hidden');
}
// hide search block 
const mobSearchCloseEl = document.getElementById('close-search-btn');
mobSearchCloseEl.onclick = () => {
   searchBlockEl.classList.toggle('hidden');
}
// show || hide dashboard
const dashBtnEl = document.getElementById('dash-btn');
const dashEl = document.getElementById('mobile-dash');
const dashArrowEl = document.getElementById('account-drop-arrow');
dashBtnEl.onclick = () => {
   dashEl.classList.toggle('hidden');
   if (dashArrowEl.textContent == 'arrow_drop_down') {
      dashArrowEl.textContent = 'arrow_drop_up';
   } else {
      dashArrowEl.textContent = 'arrow_drop_down'
   }
}
// close dashboard
const closeDashEl = document.getElementById('close-dash-btn');
closeDashEl.onclick = () => {
   mobDashEl.classList.toggle('hidden');
   if (menuIconEl.textContent == 'menu') {
      menuIconEl.textContent = 'menu_open';
   } else {
      menuIconEl.textContent = 'menu';
   }
}
// show || hide news categories
const newsLinkEl = document.getElementById('news-link-btn');
const newsLinksEl = document.getElementById('news-links');
const newsArrowEl = document.getElementById('news-drop-arrow');
newsLinkEl.onclick = () => {
   newsLinksEl.classList.toggle('hidden');
   if (newsArrowEl.textContent == 'arrow_drop_down') {
      newsArrowEl.textContent = 'arrow_drop_up';
   } else {
      newsArrowEl.textContent = 'arrow_drop_down';
   }
}
// show || hide projects categories
const projectsLinkEl = document.getElementById('projects-link-btn');
const projectsLinksEl = document.getElementById('projects-links');
const projectsArrowEl = document.getElementById('projects-drop-arrow');
projectsLinkEl.onclick = () => {
   projectsLinksEl.classList.toggle('hidden');
   if (projectsArrowEl.textContent == 'arrow_drop_down') {
      projectsArrowEl.textContent = 'arrow_drop_up';
   } else {
      projectsArrowEl.textContent = 'arrow_drop_down';
   }
}
// show || hide entertainment categories
const entertainmentLinkEl = document.getElementById('entertainment-link-btn');
const entertainmentLinksEl = document.getElementById('entertainment-links');
const entertainmentArrowEl = document.getElementById('entertainment-drop-arrow');
entertainmentLinkEl.onclick = () => {
   entertainmentLinksEl.classList.toggle('hidden');
   if (entertainmentArrowEl.textContent == 'arrow_drop_down') {
      entertainmentArrowEl.textContent = 'arrow_drop_up';
   } else {
      entertainmentArrowEl.textContent = 'arrow_drop_down';
   }
}
// !MOBILE DASHBOARD SCRIPTS END



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