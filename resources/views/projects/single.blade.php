@extends('templates.master')
@section('content')
   
@include('templates.breadcrumbs')

   <section class="single-projects-page">

      {{-- Projects content start --}}
      <div class="projects-content">

         <?php 
            $appLocale = \App::currentLocale(); 
            //genereate translation column names
            $n_title = $appLocale . 'Title';
            $n_text = $appLocale . 'Text';
            //Generate News Date Locale from appLocale
            if($appLocale == 'en') $n_date_locale = 'en';
            else $n_date_locale = 'ru';
         ?>
         
         <h3>{{ $project[$n_title] }}</h3>
         <img src="{{ asset('img/projects/' . $project->image) }}">
         <div class="projects-content-text">{!! $project[$n_text] !!}</div>
         <div class="project-date">
            <span class="material-icons-outlined">event</span>
            <?php 
               $date = \Carbon\Carbon::parse($project->created_at)->locale($n_date_locale);
               $formatted = $date->isoFormat('DD MMMM YYYY');
            ?>
            {{$formatted}}
         </div>

      </div>
      {{-- Projects content end --}}

      {{-- Comments start --}}
      <div class="comments-container">
         <h3>Коментарии ({{$commentsCount}})</h3>

         <form action="/projects/comment" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$project->id}}">
            <img src="{{ asset('img/users/' . \Auth::user()->avatar) }}">
            <input type="text" name="body" placeholder="Напишите коментарий..." autocomplete="off" required/>
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