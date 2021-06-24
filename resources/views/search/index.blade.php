
@extends('templates.master')
@section('content')

   <section class="search-page">

      {{-- Results count start--}}
      @if ($resultsCount > 0)
         <p class="results_count">
            {{__('По ключевому слову')}}&nbsp;<b>"{{$keyword}}"</b>&nbsp;. {{__('Найдено')}} {{ $resultsCount }} {{__('результатов')}} !</p>          
      @else
         <div class="no_result">
            <span class="material-icons-outlined">sentiment_dissatisfied</span>  
            <p>{{__('Упс... По вашему запросу ничего не найдено.')}}</p>
         </div>
      @endif 
      {{-- Results count end--}}

      {{-- Generate needed column name from app locale --}}
      <?php $localedTitle = \App::currentLocale() . 'Title'; ?>
      <?php $localedText = \App::currentLocale() . 'Text'; ?>

      {{-- Search results list start--}}
      <div class="results-list">
         {{-- Books start --}}
         @foreach ($result->books as $book)  
            <a class="items" href="{{ route('knowledge.books.single', $book->id) }}">
               <div class="info">
                  <span class="title">{{ $book[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($book->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">{{__('Книги')}}</span>
               </div>

               <img class="result-image" src="{{ asset('img/search/books.jpg') }}">
            </a>
         @endforeach {{-- Books end --}}

         {{-- Entertainments start --}}
         @foreach ($result->entertainments as $video)  
            <a class="items" href="{{ route('entertainment.videos.single', $video->id) }}">
               <div class="info">
                  <span class="title">{{ $video[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">{{__('Развлечение')}}</span>
               </div>

               <img class="result-image" src="{{ asset('videos/entertainment/posters/' . $video->poster) }}">
            </a>
         @endforeach {{-- Entertainments end --}}
      
         {{-- Videos start --}}
         @foreach ($result->videos as $video)  
            <a class="items" href="{{ route('knowledge.videos.single', $video->id) }}">
               <div class="info">
                  <span class="title">{{ $video[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($video->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">{{__('Видео')}} / {{ $video->ruCategory }}</span>
               </div>

               <img class="result-image" src="{{ asset('videos/knowledge/posters/' . $video->poster) }}">
            </a>
         @endforeach {{-- Videos end --}}

         {{-- Galleries start --}}
         @foreach ($result->galleries as $gallery)  
            <a class="items" href="{{ route('entertainment.gallery.single', $gallery->id) }}">
               <div class="info">
                  <span class="title">{{ $gallery[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($gallery->created_at)->locale('ru');
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">{{__('Галерея')}}</span>
               </div>

               <img class="result-image" src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">
            </a>
         @endforeach  {{-- Galleries end --}}

         {{-- News end --}}
         @foreach ($result->news as $news)  
            <a class="items with-text" href="{{ route('news.single', $news->id) }}">
               <div class="info">
                  <span class="title">{{ $news[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($news->created_at);
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">
                     {{__('Новости')}} / 
                     @if ($news->global)
                        {{ __('Мировые новости') }}
                     @else
                        {{ __('Новости компании') }}
                     @endif
                  </span>
                  <div class="text">
                     <span>
                        {{$news[$localedText]}}
                     </span>
                     <img class="result-image" src="{{ asset('img/news/' . $news->image) }}">
                  </div>
               </div>
            </a>
         @endforeach  {{-- News end --}}

         {{-- Projects start --}}
         @foreach ($result->projects as $project)  
            <a class="items with-text" href="{{ route('projects.single', $project->id) }}">
               <div class="info">
                  <span class="title">{{ $project[$localedTitle] }}</span>
                  <span class="date">
                     <?php
                        $date = \Carbon\Carbon::parse($project->created_at);
                        $formatted = $date->isoFormat('DD MMMM YYYY');
                     ?>
                     {{$formatted}}   
                  </span>
                  <span class="category">{{__('Проекты')}} / 
                     @if ($project->completed)
                        {{ __('Выполненные проекты') }}
                     @else
                        {{ __('Действующие проекты') }}
                     @endif
                  </span>
                  <div class="text">
                     <span>
                        {{$project[$localedText]}}
                     </span>
                     <img class="result-image" src="{{ asset('img/projects/' . $project->image) }}">
                  </div>
               </div>
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