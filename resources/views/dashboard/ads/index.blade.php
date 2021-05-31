@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="ads-page">
      
      {{-- Search is unavailable in sliders page --}}
      <div class="dash-search-container">
         <a href="{{route('dashboard.ads.create')}}">Добавить</a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-50">Текст</div>
         <div class="width-50">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($ads as $ad)
            <a class="primary-list-item" href="{{ route('dashboard.ads.single', $ad->id)}}">
               <div class="width-50">{{$ad->text}}</div>
               <div class="width-50">
                  <?php 
                     $date = \Carbon\Carbon::parse($ad->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:ss');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

   </section>

@endsection