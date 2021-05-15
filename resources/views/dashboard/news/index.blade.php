@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-page">
      
      <div class="dash-search-container">
         {{-- news seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск новостей..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allNews as $new)
                  <option value="{{ route('dashboard.news.single', $new->id)}}">{{$new->ruTitle}}</option>   
               @endforeach
            </select>
         </div>
         {{-- news seach end --}}

         <a href="{{route('dashboard.news.create')}}">Добавить</a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Тип</div>
         <div class="width-33">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($news as $new)
            <a class="primary-list-item" href="{{ route('dashboard.news.single', $new->id)}}">
               <div class="width-33">{{$new->ruTitle}}</div>
               <div class="width-33">{{$new->global ? 'Мировые новости' : 'Новости компании'}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$news->links()}}

   </section>

@endsection