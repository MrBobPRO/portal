@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="ads-page">
      
      <a class="add-button" href="{{route('dashboard.ads.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="primary-list-titles">
         <div class="width-50">{{__('Текст')}}</div>
         <div class="width-50">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($ads as $ad)
            <a class="primary-list-item" href="{{ route('dashboard.ads.single', $ad->id)}}">
               <div class="width-50">{{$ad->text}}</div>
               <div class="width-50">
                  <?php 
                     $date = \Carbon\Carbon::parse($ad->created_at);
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:ss');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

   </section>

@endsection