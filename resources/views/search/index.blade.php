
@extends('templates.master')
@section('content')

   <section class="search-page">

      {{-- Results count start--}}
      @if ($resultsCount > 0)
         <p class="results_count">
            По ключевому слову&nbsp;<b>"{{$keyword}}"</b>&nbsp;. Найдено {{ $resultsCount }} результатов !</p>          
      @else
         <div class="no_result">
            <span class="material-icons-outlined">sentiment_dissatisfied</span>  
            <b>Упс... По вашему запросу ничего не найдено.</b>
         </div>
      @endif 
      {{-- Results count end--}}

      {{-- Search results list start--}}
      <div class="results-list">
         {{-- Books start --}}
         @foreach ($result->books as $book)  
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

               <img class="result-image" src="{{ asset('img/main/book.jpeg') }}">
            </a>
         @endforeach {{-- Books end --}}

         {{-- Entertainments start --}}
         @foreach ($result->entertainments as $video)  
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

               <img class="result-image" src="{{ asset('videos/entertainment/posters/' . $video->poster) }}">
            </a>
         @endforeach {{-- Entertainments end --}}
      
         {{-- Videos start --}}
         @foreach ($result->videos as $video)  
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

               <img class="result-image" src="{{ asset('videos/knowledge/posters/' . $video->poster) }}">
            </a>
         @endforeach {{-- Videos end --}}

         {{-- Galleries start --}}
         @foreach ($result->galleries as $gallery)  
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

               <img class="result-image" src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">
            </a>
         @endforeach  {{-- Galleries end --}}

         {{-- News end --}}
         @foreach ($result->news as $news)  
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

               <img class="result-image" src="{{ asset('img/news/' . $news->image) }}">
            </a>
         @endforeach  {{-- News end --}}

         {{-- Projects start --}}
         @foreach ($result->projects as $project)  
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

               <img class="result-image" src="{{ asset('img/projects/' . $project->image) }}">
            </a>
         @endforeach {{-- Projects end --}}

         {{-- Users start --}}
         @foreach ($result->users as $user)  
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

               <img class="result-image" src="{{ asset('img/users/' . $user->avatar) }}">
            </a>
         @endforeach  
         {{-- Users end --}}

      </div> {{-- Search results list end--}}
   </section>
   
@endsection 