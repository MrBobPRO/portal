@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-page">

      <a class="add-button" href="{{route('dashboard.videos.create')}}"><span class="material-icons-outlined">add</span></a>
      
      <div class="dash-search-container">
         {{-- videos seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск видео..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allVideos as $vid)
                  <option value="{{ route('dashboard.videos.single', $vid->id)}}">{{$vid->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- videos seach end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="width-50">Заголовок</div>
         <div class="width-50">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($videos as $v)
            <a class="primary-list-item" href="{{ route('dashboard.videos.single', $v->id)}}">
               <div class="width-50">{{$v->title}}</div>
               <div class="width-50">
                  <?php 
                     $date = \Carbon\Carbon::parse($v->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$videos->links()}}

   </section>

@endsection