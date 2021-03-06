@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="gallery-page">
      
      <a class="add-button" href="{{route('dashboard.galleries.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="dash-search-container">
         {{-- Galleries seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск галерей')}}..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allGalleries as $gal)
                  <option value="{{ route('dashboard.galleries.single', $gal->id)}}">{{$gal->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- Galleries seach end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="width-50">{{__('Заголовок')}}</div>
         <div class="width-50">{{__('Дата')}}</div>
      </div>

      <div class="primary-list">
         @foreach($galleries as $gallery)
            <a class="primary-list-item" href="{{ route('dashboard.galleries.single', $gallery->id)}}">
               <div class="width-50">{{$gallery->title}}</div>
               <div class="width-50 admin-edit-btn">
                  <?php 
                     $d = \Carbon\Carbon::parse($gallery->date);
                     $formatted = $d->isoFormat('DD MMMM YYYY');
                  ?>
                  <div>
                     {{$formatted}}
                  </div>
                  <span class="material-icons-outlined">edit</span>
               </div>
            </a>
         @endforeach
      </div>

      {{$galleries->links()}}

   </section>

@endsection