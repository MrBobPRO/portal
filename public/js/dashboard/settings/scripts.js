function changeColor(color, name) {
   var r = document.querySelector(':root');
   var items = document.getElementsByClassName('colors-item');
   var activeBtn = document.getElementsByClassName(name)[0];
   var input = document.getElementById('color-scheme');

   r.style.setProperty('--color-scheme', color);
   for (i=0; i<items.length; i++) {
      items[i].classList.remove('active');
   }

   activeBtn.classList.add('active');
   input.value = color; 
}

function changeDashBg(img, i) {
   var dashboard = document.getElementById('dashboard');
   var activeBtn = document.getElementsByClassName('theme-items')[i];
   var items = document.getElementsByClassName('theme-items');
   var input = document.getElementById('dashbg');

   dashboard.style.backgroundImage = 'url(/img/dashboards/' + img + ')';
   for (i=0; i<items.length; i++) {
      items[i].classList.remove('active');
   }

   activeBtn.classList.add('active');
   $('#custom_img')[0].value = 0;
   input.value = img;
}

function changeMode() {
   var emojiInput = document.getElementById('darkbg');
   const overlay = document.getElementById('dashOverlay');

   if (emojiInput.checked == true) {
      overlay.classList.add('hidden');
   } else {
      overlay.classList.remove('hidden');
   }
}

// Checkbox emoji start
const emojiInput = document.getElementById('darkbg');
const emoji = document.getElementById('emoji');

emojiInput.addEventListener('click', ()=> {
   if (emojiInput.checked == true) {
      emoji.innerHTML = '😊';
   } else {
      emoji.innerHTML = '😡';
   }
});
// Checkbox emoji start

document.getElementById('dashbg-input').onchange = ajax_edit_dashbg;
var q = 0;
function ajax_edit_dashbg() {
//generate new FormData object
var form = $('#dashbg_update_form')[0];
var data = new FormData(form);
var dashboard = document.getElementById('dashboard');
var input = document.getElementById('dashbg');

//Send ajax request
$.ajax({
   type: 'POST',
   enctype: 'multipart/form-data',
   url: '/update_dashbg',
   data: data,
   processData: false,
   contentType: false,
   cache: false,
   timeout: 600000,

   success: function (fileName) {
      dashboard.style.backgroundImage = 'url(/img/dashboards/temp/default.jpg)';
      dashboard.style.backgroundImage = 'url(/img/dashboards/temp/' + fileName + '?q=' + q + ')';
      q++;
      $('#custom_img')[0].value = 1;
      input.value = fileName;
   },
   error: function () {
      alert('ERROR!');
   }
   });
   //Ajax request end
}




