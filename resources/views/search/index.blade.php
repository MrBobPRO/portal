
@extends('templates.master')
@section('content')

   <section class="search-page">

      @if ($resultsCount > 0)
         <b class="result">Найдено {{ $resultsCount }} результатов</b>          
      @else
         <div class="no_result">
            <span class="material-icons-outlined">sentiment_dissatisfied</span>  
            <b>Извините, ничего не найдено.</b>
         </div>
      @endif 

      @if (count($result->books))

         <ul>
            @foreach ($result->books as $book)  
               <li>
                  <a class="items" href="{{ route('knowledge.books.single', $book->id) }}">
                     <div class="info">
                        <span class="title">{{ $book->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($book->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Книги</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('img/main/book.jpeg') }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>
         
      @endif

      @if (count($result->entertainments))

         <ul>
            @foreach ($result->entertainments as $video)  
               <li>
                  <a class="items" href="{{ route('entertainment.videos.single', $video->id) }}">
                     <div class="info">
                        <span class="title">{{ $video->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Развлечение</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('videos/entertainment/posters/' . $video->poster) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif
      
      @if (count($result->videos))

         <ul>
            @foreach ($result->videos as $video)  
               <li>
                  <a class="items" href="{{ route('knowledge.videos.single', $video->id) }}">
                     <div class="info">
                        <span class="title">{{ $video->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Видео / {{ $video->ruCategory }}</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('videos/knowledge/posters/' . $video->poster) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif

      @if (count($result->galleries))
 
         <ul>
            @foreach ($result->galleries as $gallery)  
               <li>
                  <a class="items" href="{{ route('entertainment.gallery.single', $gallery->id) }}">
                     <div class="info">
                        <span class="title">{{ $gallery->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($gallery->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Галерея</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif

      @if (count($result->news))

         <ul>
            @foreach ($result->news as $news)  
               <li>
                  <a class="items" href="{{ route('news.single', $news->id) }}">
                     <div class="info">
                        <span class="title">{{ $news->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($news->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Новости / @if ($news->global)
                           {{ __('Мировые новости') }}
                        @else
                           {{ __('Новости компании') }}
                        @endif</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('img/news/' . $news->image) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif

      @if (count($result->projects))
        
         <ul>
            @foreach ($result->projects as $project)  
               <li>
                  <a class="items" href="{{ route('projects.single', $project->id) }}">
                     <div class="info">
                        <span class="title">{{ $project->ruTitle }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">Проекты / @if ($project->completed)
                           {{ __('Выполненные проекты') }}
                        @else
                           {{ __('Действующие проекты') }}
                        @endif</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('img/projects/' . $project->image) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif

      @if (count($result->users))

         <ul>
            @foreach ($result->users as $user)  
               <li>
                  <a class="items" href="{{ route('dashboard.users.single', $user->id) }}">
                     <div class="info">
                        <span class="title">{{ $user->name }} {{ $user->surname }}</span>
                        <span class="date">
                           <?php
                              $date = \Carbon\Carbon::parse($user->birth_date)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}   
                        </span>
                        <span class="category">{{ App\Models\Designation::find($user->designation_id)->name }}</span>
                     </div>
                     <div class="image">
                        <img src="{{ asset('img/users/' . $user->avatar) }}">
                     </div>
                  </a>
               </li>
            @endforeach  
         </ul>

      @endif

   </section>
   
@endsection 