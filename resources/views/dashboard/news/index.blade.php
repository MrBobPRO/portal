@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="news-page">
      
      <a class="add-button" href="{{route('dashboard.news.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="dash-search-container">
         {{-- news seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск новостей')}}..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allNews as $new)
                  <option value="{{ route('dashboard.news.single', $new->id)}}">{{$new->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- news seach end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">{{__('Заголовок')}}</div>
         <div class="width-33">{{__('Тип')}}</div>
         <div class="width-33">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($news as $new)
            <a class="primary-list-item" href="{{ route('dashboard.news.single', $new->id)}}">
               <div class="width-33">{{$new->title}}</div>
               <div class="width-33">
                  @if ($new->global)
                     {{__('Мировые новости')}}
                  @else
                     {{__('Новости компании')}}
                  @endif
               </div>
               <div class="width-33 admin-edit-btn">
                  <?php 
                     $date = \Carbon\Carbon::parse($new->created_at);
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

      {{$news->links()}}

   </section>

@endsection