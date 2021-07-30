@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="single-projects-page">

      {{-- Projects content start --}}
      <div class="projects-content">
         <h3>{{$project->title}}</h3>
         <img src="{{ asset('img/projects/' . $project->image) }}">
         <div class="projects-content-text">{!!$project->text!!}</div>

         <div class="project-manager-info">
            <div class="project-manager">
            {{__('Менеджер проекта')}} :
               <a href="{{ route('dashboard.users.single', $manager_id) }}">{{$manager_name}}</a>.
               <span>Количество участников : </span>
               <a href="javascripts:void(0)" data-bs-toggle="modal" data-bs-target="#participantsModal">
                  {{$project->participants->count()}}
               </a>
            </div>

            <div class="project-date">
               <?php
                  $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD.MM.YYYY');
               ?>
               <span>Дата : {{$formatted}}</span>
            </div>
         </div>

      </div>
      {{-- Projects content end --}}

      {{-- Comments start --}}
      <div class="comments-container">
         <h3>{{__('Коментарии')}} ({{$commentsCount}})</h3>

         <form action="/projects/comment" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$project->id}}">
            <img src="{{ asset('img/users/' . \Auth::user()->avatar) }}">
            <input type="text" name="body" placeholder="{{__('Напишите коментарий')}} ..." autocomplete="off" required/>
            <button type="submit"><span class="material-icons" title="Отправить">send</span></button>
         </form>

         <div class="comments-list">
            @foreach ($comments as $comment)
                <div class="single-comment">
                   <img src="{{ asset('img/users/' . $comment->user->avatar) }}">
                   <div class="comment-body">
                      <h6>{{$comment->user->name}} {{$comment->user->surname}}</h6>
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


      <!-- Disliked Modal -->
      <div class="modal fade participants-modal" id="participantsModal" tabindex="-1" aria-labelledby="participantsModalModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="participantsModal"><span class="material-icons">thumb_down</span> Участники</h5>
               </div>
               <div class="modal-body" id="disliked_modal_body">
                  @foreach ($project->participants as $part)
                     <div class="modal-item">
                        <img src="{{ asset('img/users/' . $part->avatar)}}"> {{$part->name}} {{$part->surname}}
                     </div>
                  @endforeach
               </div>
               <div class="modal-footer">
                  <button type="button" class="main-btn" data-bs-dismiss="modal">Закрыть</button>
               </div>
            </div>
         </div>
      </div>


   </section>
   
@endsection