@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="single-news-page">

      {{-- News content start --}}
      <div class="news-content">
         <h3>{{$news->title}}</h3>
         <img src="{{ asset('img/news/'. $news->image) }}">
         <div class="news-content-text">{{$news->text}}</div>

         <div class="grades-container">
            <div class="news-content-date">
               <span class="material-icons">watch_later</span>
               <?php 
                  $date = \Carbon\Carbon::parse($news->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD MMMM YYYY H:m:s');
               ?>
               {{$formatted}}
            </div>

            {{-- used in ajax requests --}}
            <input id="news_id" type="hidden" value="{{$news->id}}">

            <div class="grade-icons-container no-selection">
               <span id="likes_count" class="grades-count" data-bs-toggle="modal" data-bs-target="#likedModal" title="Посмотреть кто лайкнул">{{count($likes)}}</span>
               {{-- Like buttons --}}
               <div class="like-icons">
                  <span id="remove_like" class="material-icons {{$usersGrade == 'like'? '' : 'hidden'}}" onclick="ajaxLike('remove_like')">thumb_up</span>
                  <span id="like" class="material-icons-outlined {{$usersGrade == 'like'? 'hidden' : ''}}" onclick="ajaxLike('like')">thumb_up</span>
               </div>
               {{-- Dislike buttons --}}
               <div class="dislike-icons">
                  <span id="remove_dislike" class="material-icons {{$usersGrade == 'dislike'? '' : 'hidden'}}" onclick="ajaxDislike('remove_dislike')">thumb_down</span>
                  <span id="dislike" class="material-icons-outlined {{$usersGrade == 'dislike'? 'hidden' : ''}}" onclick="ajaxDislike('dislike')">thumb_down</span>
               </div>

               <span id="dislikes_count" class="grades-count" data-bs-toggle="modal" data-bs-target="#dislikedModal" title="Посмотреть кто дислайкнул">{{count($dislikes)}}</span>
            </div>
         </div>
      </div>
      {{-- News content end --}}

      {{-- Comments start --}}
      <div class="comments-container">
         <h3>Коментарии ({{$commentsCount}})</h3>

         <form action="/news/comment" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$news->id}}">
            <img src="{{ asset('img/users/' . \Auth::user()->avatar) }}">
            <input type="text" name="body" placeholder="Напишите коментарий..." autocomplete="off"/>
            <button type="submit"><span class="material-icons" title="Отправить">send</span></button>
         </form>

         <div class="comments-list">
            @foreach ($comments as $comment)
                <div class="single-comment">
                   <img src="{{ asset('img/users/' . $comment->user->avatar) }}">
                   <div class="comment-body">
                      <h6>{{$comment->user->name}}</h6>
                      <span>
                        <?php 
                           $date = \Carbon\Carbon::parse($comment->created_at)->locale('ru')->diffForHumans();
                        ?>
                        {{$date}}
                      </span>
                      <p>{{$comment->body}}</p>
                   </div>
                </div>
            @endforeach
         </div>
      </div>
      {{-- Comments end --}}

   </section>

<!-- Liked Modal -->
<div class="modal fade grades-modal" id="likedModal" tabindex="-1" aria-labelledby="likedModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="likedModalLabel"><span class="material-icons">thumb_up</span> Лайкнули ({{count($likes)}})</h5>
       </div>
       <div class="modal-body" id="liked_modal_body">
         @foreach ($likes as $like)
         <?php $u = App\Models\User::find($like->user_id); 
               $current_users_id = \Auth::user()->id;
         ?>
            <div class="modal-item
               {{-- Highlite users grade. Used for deleting on grade change --}}
               {{$current_users_id == $u->id ? 'users-choice' : ''}} 
            ">
               <img src="{{ asset('img/users/' . $u->avatar)}}"> {{$u->name}} {{$u->surname}}
            </div>
         @endforeach
       </div>
       <div class="modal-footer">
         <button type="button" class="main-btn" data-bs-dismiss="modal">Закрыть</button>
       </div>
     </div>
   </div>
</div>


<!-- Disliked Modal -->
<div class="modal fade grades-modal" id="dislikedModal" tabindex="-1" aria-labelledby="dislikedModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="dislikedModalLabel"><span class="material-icons">thumb_up</span> Дислайкнули ({{count($dislikes)}})</h5>
       </div>
       <div class="modal-body" id="disliked_modal_body">
         @foreach ($dislikes as $like)
         <?php $u = App\Models\User::find($like->user_id); 
               $current_users_id = \Auth::user()->id;
         ?>
            <div class="modal-item
               {{-- Highlite users grade. Used for deleting on grade change --}}
               {{$current_users_id == $u->id ? 'users-choice' : ''}} 
            ">
               <img src="{{ asset('img/users/' . $u->avatar)}}"> {{$u->name}} {{$u->surname}}
            </div>
         @endforeach
       </div>
       <div class="modal-footer">
         <button type="button" class="main-btn" data-bs-dismiss="modal">Закрыть</button>
       </div>
     </div>
   </div>
</div>
   
@endsection