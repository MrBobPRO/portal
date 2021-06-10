// get JSON 
function getJson() {
  try {
    return JSON.parse($('#json-input').val());
  } catch (ex) {
    alert('Wrong JSON Format: ' + ex);
  }
}

// initialize
var editor = new JsonEditor('#json-display', getJson());

// enable translate button
  editor.load(getJson());

const formEl = document.getElementById('translate_form');
const translationsEl = formEl.querySelector('#json-input');
const preEl = document.getElementById('json-display');

formEl.onsubmit = (e) => {
  if(isValidJson(preEl.textContent)) {
    translationsEl.textContent = preEl.textContent;
  } else {
    alert('Исправьте ошибки прежде чем сохранить файл!');
    e.preventDefault();
  }
}

function isValidJson(str) {
  try {
    if (typeof str != 'string') return false;
    JSON.parse(str);
    return true;
  } catch (error) {
    return false;
  }
}