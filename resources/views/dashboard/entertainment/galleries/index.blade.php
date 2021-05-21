@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="gallery-page">
      
      <div class="dash-search-container">
         {{-- Galleries seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск галерей..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allGalleries as $gal)
                  <option value="{{ route('dashboard.galleries.single', $gal->id)}}">{{$gal->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Galleries seach end --}}

         <a href="{{route('dashboard.galleries.create')}}">Добавить</a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-50">Заголовок</div>
         <div class="width-50">Дата</div>
      </div>

      <div class="primary-list">
         @foreach($galleries as $gallery)
            <a class="primary-list-item" href="{{ route('dashboard.galleries.single', $gallery->id)}}">
               <div class="width-50">{{$gallery->title}}</div>
               <div class="width-50">
                  <?php 
                     $d = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                     $formatted = $d->isoFormat('DD MMMM YYYY');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$galleries->links()}}

   </section>

@endsection