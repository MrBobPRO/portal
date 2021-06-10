var dashboard = document.getElementById('dashboard');

// ----------------------Color scheme change start----------------------
var r = document.querySelector(':root');
var colorInput = document.getElementById('color-scheme');

function changeColor(color, name) {
   var activeBtn = document.getElementsByClassName(name)[0];

   //change root color variable
   r.style.setProperty('--color-scheme', color);

   //remove active class from all color btns
   var items = document.getElementsByClassName('colors-item');
   for (i=0; i<items.length; i++) {
      items[i].classList.remove('active');
   }

   activeBtn.classList.add('active');
   //change color scheme input value
   colorInput.value = color; 
}
// ----------------------Color scheme change end----------------------


// ----------------------Dashboard background preview start----------------------
var bgHiddenInput = document.getElementById('background-hidden-input');

function backgroundChangePreview(img, index) {

   //change custom image input value
   $('#custom_img')[0].value = 0;
   //change update background forms input
   bgHiddenInput.value = img;

   //change dashboards background and remove active class from all images 
   dashboard.style.backgroundImage = 'url(/img/dashboards/' + img + ')';
   var items = document.getElementsByClassName('theme-items');
   for (i=0; i<items.length; i++) {
      items[i].classList.remove('active');
   }

   //add active class for selected image
   var activeBtn = document.getElementsByClassName('theme-items')[index];
   activeBtn.classList.add('active');
}
// ----------------------Dashboard background preview start----------------------


// ----------------------Dashboard custom background start----------------------
// Main form variables
var form_submit_btn = document.getElementById('form_submit_btn'),
   form_btn_ico = document.getElementById('form_btn_ico'),
   form_btn_spinner = document.getElementById('form_btn_spinner');
   form_btn_text = document.getElementById('form_btn_text');
   
document.getElementById('custom-background-input').onchange = ajax_update_background_temporarily;

//used to uncache background image
var q = 0;

function ajax_update_background_temporarily() {

   //disable update form submit button
   form_submit_btn.disabled = true;
   form_btn_text.textContent  = 'Загрузка';
   //hide image-ico and show spinner-ico
   form_btn_ico.classList.add('visually-hidden');
   form_btn_spinner.classList.remove('visually-hidden');

   //generate new FormData object
   var form = $('#update_custom_background_form')[0];
   var data = new FormData(form);

   //Send ajax request
   $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/update_background_temporarily',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,

      success: function (fileName) {
         dashboard.style.backgroundImage = 'url(/img/dashboards/temp/' + fileName + '?q=' + q + ')';
         q++;

         //set custom image boolean true
         $('#custom_img')[0].value = 1;

         //change update forms inputs value
         var input = document.getElementById('background-hidden-input');
         input.value = fileName;

         //enable update form submit button
         form_submit_btn.disabled = false;
         form_btn_text.textContent  = 'Изменить фон';
         //hide image-ico and show spinner-ico
         form_btn_ico.classList.remove('visually-hidden');
         form_btn_spinner.classList.add('visually-hidden');
      },
      
      error: function () {
         alert('ERROR!');
      }
   });
   //Ajax request end
}
// ----------------------Dashboard custom background end----------------------


// ----------------------Change mode start----------------------
function changeMode() {
   var emojiInput = document.getElementById('darkbg');
   const overlay = document.getElementById('dashOverlay');

   if (emojiInput.checked == true) {
      overlay.classList.add('hidden');
   } else {
      overlay.classList.remove('hidden');
   }
}
// ----------------------Change mode end----------------------


// ----------------------Checkbox emoji start----------------------
const emojiInput = document.getElementById('darkbg');
const emoji = document.getElementById('emoji');

emojiInput.addEventListener('click', ()=> {
   if (emojiInput.checked == true) {
      emoji.innerHTML = '😊';
   } else {
      emoji.innerHTML = '😡';
   }
});
// ----------------------Checkbox emoji end----------------------


