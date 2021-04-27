//Ajax request setup
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

//global variables
var id = document.getElementById('news_id').value,
   remove_like = document.getElementById('remove_like'),
   like = document.getElementById('like'),
   remove_dislike = document.getElementById('remove_dislike'),
   dislike = document.getElementById('dislike'),
   likes_count = document.getElementById('likes_count'),
   dislikes_count = document.getElementById('dislikes_count'),
   liked_modal_body = document.getElementById('liked_modal_body'),
   disliked_modal_body = document.getElementById('disliked_modal_body')
   ;


function ajaxLike(action) {

   //hide & show icons
   if (action == 'remove_like') {
      remove_like.style.display = 'none';
      like.style.display = 'inline-block';
   }
   //else if like button clicked
   else {
      like.style.display = 'none';
      remove_like.style.display = 'inline-block';
      dislike.style.display = 'inline-block';
      remove_dislike.style.display = 'none';
   }

   $.ajax({
      type: 'POST',
      url: '/news/like',
      data: {news_id: id, action: action },

      success: function (result) {
         switch (result.action) {
            case 'liked':
               //increment likes count
               var count = likes_count.innerHTML;
               count++;
               likes_count.innerHTML = count;

               //add user in like modal list
               liked_modal_body.innerHTML +=
                  '<div class="modal-item users-choice">' +
                  '<img src="/img/users/' + result.avatar + '">' +
                  ' ' + result.name + ' ' + result.surname +
                  '</div>';
               break;
               
            case 'changed_dislike_into_like':
               //increment likes count
               var count = likes_count.innerHTML;
               count++;
               likes_count.innerHTML = count;
               //decrement dislikes count
               var count = dislikes_count.innerHTML;
               count--;
               dislikes_count.innerHTML = count;
               //remove users choice from dislikes
               $('.users-choice')[0].remove();
               //add user in like modal list
               liked_modal_body.innerHTML +=
               '<div class="modal-item users-choice">' +
                  '<img src="/img/users/' + result.avatar + '">' +
                  ' ' + result.name + ' ' + result.surname +
                  '</div>';
               break;
               
            case 'removed_like':
               //decrement likes count
               var count = likes_count.innerHTML;
               count--;
               likes_count.innerHTML = count;
               //remove users choice from dislikes
               $('.users-choice')[0].remove();
               break;
         }
      },

      error: function () {
         alert('Could not send request!');
      }
   });
}


function ajaxDislike(action) {

   //hide & show icons
   if (action == 'remove_dislike') {
      remove_dislike.style.display = 'none';
      dislike.style.display = 'inline-block';
   }
   //else if dislike button clicked
   else {
      dislike.style.display = 'none';
      remove_dislike.style.display = 'inline-block';
      like.style.display = 'inline-block';
      remove_like.style.display = 'none';
   }

   $.ajax({
      type: 'POST',
      url: '/news/dislike',
      data: {news_id: id, action: action },

      success: function (result) {
         switch (result.action) {
            case 'disliked':
               //increment dislikes count
               var count = dislikes_count.innerHTML;
               count++;
               dislikes_count.innerHTML = count;

               //add user in like modal list
               disliked_modal_body.innerHTML +=
                  '<div class="modal-item users-choice">' +
                  '<img src="/img/users/' + result.avatar + '">' +
                  ' ' + result.name + ' ' + result.surname +
                  '</div>';
               break;
               
            case 'changed_like_into_dislike':
               //increment dislikes count
               var count = dislikes_count.innerHTML;
               count++;
               dislikes_count.innerHTML = count;
               //decrement likes count
               var count = likes_count.innerHTML;
               count--;
               likes_count.innerHTML = count;
               //remove users choice from likes
               $('.users-choice')[0].remove();
               //add user in dislike modal list
               disliked_modal_body.innerHTML +=
               '<div class="modal-item users-choice">' +
                  '<img src="/img/users/' + result.avatar + '">' +
                  ' ' + result.name + ' ' + result.surname +
                  '</div>';
               break;
               
            case 'removed_dislike':
               //decrement dislikes count
               var count = dislikes_count.innerHTML;
               count--;
               dislikes_count.innerHTML = count;
               //remove users choice from dislikes
               $('.users-choice')[0].remove();
               break;
         }
      },

      error: function () {
         alert('Could not send request!');
      }
   });
}
