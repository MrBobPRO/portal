@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="single-projects-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('projects.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Проекты и инициативы')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      {{-- Projects content start --}}
      <div class="projects-content">
         <h3>{{$project->title}}</h3>
         <img src="{{ asset('img/projects/' . $project->image) }}">
         <div class="projects-content-text">{!!$project->text!!}</div>
         <div class="project-date">
            <span class="material-icons-outlined">event</span>
            
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
   
@endsection