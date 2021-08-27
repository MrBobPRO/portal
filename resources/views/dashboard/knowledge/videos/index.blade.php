@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="knowledge-page">
      
      <a class="add-button" href="{{route('dashboard.knowledge.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="dash-search-container">
         {{-- Books search start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск видео')}} ..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allVideos as $allVideo)
                  <option value="{{ route('dashboard.knowledge.videos.single', $allVideo->id)}}">{{$allVideo->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Books search end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="width-25">{{__('Заголовок')}}</div>
         <div class="width-25">{{__('Категория')}}</div>
         <div class="width-25">{{__('Приоритет')}}</div>
         <div class="width-25">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($videos as $video)
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.videos.single', $video->id)}}">
               <div class="width-25">{{$rank++}}. {{ $video->title }}</div>
               <div class="width-25">{{ __($video->ruCategory) }}</div>
               <div class="width-25">{{$video->priority}}</div>
               <div class="width-25 admin-edit-btn">
                  <?php 
                     $date = \Carbon\Carbon::parse($video->created_at);
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  <div>
                     {{$formatted}}
                  </div>
                  <span class="material-icons-outlined">edit</span>
               </div>
            </a>
         @endforeach
      </div>

      {{$videos->links()}}
      
   </section>

@endsection