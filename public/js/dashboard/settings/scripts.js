function changeColor(color, name) {
   var r = document.querySelector(':root');
   var items = document.getElementsByClassName('color-items');
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
   input.value = img;
}

function changeMode() {
   var emojiInput = document.getElementById('darkbg');
   const overlay = document.getElementById('dashOverlay');

   if (emojiInput.checked == true) {
      overlay.classList.add('show');
   } else {
      overlay.classList.remove('show');
   }
}

//Change color start
function ajax_change_color() {
   event.preventDefault();
   //Variables
 
   //Send ajax request
   $.ajax({
         type: 'POST',
         url: '/update_password',
         data:{
            password: password
         },
         timeout: 600000,

         success: function (response) {
            
         },
         error: function () {
            alert('ERROR!');
         }
      });
}//Change color end

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