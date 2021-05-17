
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
         alert('ERROR!');
      }
   });
}


//--------------------------Chat Start--------------------------------
// *var lastMsgId
//Chats last message id (lastMsgId) declared in blade via php and used to get newer messages
var skipMsgIds = [];
// *var skipMsgIds
// skipMsgIds array used to skip users pushed msgs and escape duplicate msgs on ajaxUpdateChat

var chat_input = document.getElementById('chat_input');
var chat_body = document.getElementById("chat_body");
//scroll to the bottom of chat on app start
chat_body.scrollTop = chat_body.scrollHeight;

// Ajax store message
function ajax_chat_push() {
   event.preventDefault();
   
   //stop autoUpdatingChat
   clearInterval(updateChatInterval);
   //check for newer messages before pushing msg
   ajaxUpdateChat();

   $.ajax({
      type: 'POST',
      url: '/chat/push',
      data: { text: chat_input.value},
      timeout: 600000,
      //add msg to chat, clear chat input value and scroll to the chat bottom on success
      success: function (response) {
         //push into skipMsgIds
         skipMsgIds.push(response.msgId);

         chat_body.innerHTML +=
            '<div class="chat-item users-msg">' +
               '<div>' +
                  '<h6>' + response.name + '</h6>' +
                  '<p>' + chat_input.value + '</p>' +
                  '<span>' + response.date + '</span>' +
               '</div>' +
               '<img src="/img/users/' + response.avatar + '">' +
            '</div>';
         
         chat_input.value = '';
         chat_body.scrollTop = chat_body.scrollHeight;
         updateChatInterval = setInterval(ajaxUpdateChat, 4000);
      },
      
      error: function () {
         console.log('error!');
      }
   });
}



//ajax update chat messages every 4 second
var updateChatInterval = setInterval(ajaxUpdateChat, 4000);
 
function ajaxUpdateChat() {

   $.ajax({
      type: 'POST',
      url: '/chat/update',
      data: { id: lastMsgId},
      timeout: 600000,

      success: function (response) {
         response.msgs.forEach(msg => {
            //if itsnt one of the users pushed msgs   
            if (!skipMsgIds.includes(msg.id)) {
               let d = new Date(msg.created_at);
               chat_body.innerHTML +=
               '<div class="chat-item">' +
                  '<img src="/img/users/' + msg.avatar + '">' +
                  '<div>' +
                     '<h6>' + msg.name + '</h6>' +
                     '<p>' + msg.text + '</p>' +
                     '<span>' + d.getHours() + ':' + ('0' + d.getMinutes()).slice(-2) + '</span>' +
                  '</div>' +
               '</div>';
            }
         });
         //Chats last message id (lastMsgId) declared in blade via php
         lastMsgId = response.lastMsgId;
      },
      
      error: function () {
         console.log('error!');
      }
   });
}




//load older messages on chat top scroll
var loading_older_msgs = false;
var chats_spinner = document.getElementById('chats_spinner');

function onChatScroll() {
   var scrollPosition = chat_body.scrollTop;
   if (scrollPosition < 350 && !loading_older_msgs) 
      ajaxLoadOlderMsgs()
}

function ajaxLoadOlderMsgs()
{
   loading_older_msgs = true;
   //show spinner on start
   chats_spinner.style.visibility = 'visible';

   $.ajax({
      type: 'POST',
      url: '/chat/load_older_msgs',
      data: { id: oldestMsgId},
      timeout: 600000,

      success: function (response) {

         let items = '';

         if (response.msgs.length > 0) {
            response.msgs.forEach(msg => {
               let d = new Date(msg.created_at);
               let clss = 'chat-item';
               //change msgs class if its users msg. UserId declared in blade via php
               if (userId == msg.user_id)
                  clss = 'chat-item users-msg';
               
               items = 
               '<div class="' + clss  + '">' +
                  '<img src="/img/users/' + msg.avatar + '">' +
                  '<div>' +
                     '<h6>' + msg.name + '</h6>' +
                     '<p>' + msg.text + '</p>' +
                     '<span>' + d.getHours() + ':' + ('0' + d.getMinutes()).slice(-2) + '</span>' +
                  '</div>' +
               '</div>' + items;
            });
         }

         //Chats oldest message id declared in blade via php
         oldestMsgId = response.oldestMsgId;
         //add new msgs
         $('#chat_body').prepend(items);
         // clear items
         items = '';

         loading_older_msgs = false;
         //hide spinner on the end
         chats_spinner.style.visibility = 'hidden';
      },
      
      error: function () {
         console.log('error!');
      }
   });

}





//show & hide chat functions
var chat = document.getElementById('chat');

function hideChat() {
   chat.classList.add('hidden-chat');
   ajaxStoreChatVisibility('hidden');
}

function showChat() {
   chat.classList.remove('hidden-chat');
   ajaxStoreChatVisibility('visible');
}

function ajaxStoreChatVisibility(vision) {
   $.ajax({
      type: 'POST',
      url: '/store_chat_visibility',
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


//--------------------------Chat end--------------------------------