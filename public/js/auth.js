// Login form
document.getElementById("password-btn").addEventListener('click', showHide);
const password = document.getElementById('password');
const toggle = document.getElementById('icon');

function showHide() {
   if (password.type == 'password') {
      password.setAttribute('type', 'text');
      toggle.classList.add('fa-eye-slash');
   } else {
      password.setAttribute("type", "password");
      toggle.classList.remove("fa-eye-slash");
   }
}