@extends('templates.no_sidebar_master')

@section('content')
@include('templates.breadcrumbs')

   <section class="notifications-page">
      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Дата</div>
         <div class="width-33">Статус</div>
      </div>

      <div class="primary-list">
         @foreach($notifications as $not)
            <a class="primary-list-item" href="{{ route('notifications.single', $not->id)}}">
               <div class="width-33">{{$not->title}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($not->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
               <div class="width-33">
                  {!!$not->new ? '<span class="list-new-item">НОВЫЙ</span>' : 'ПОСМОТРЕНО'!!}
               </div>
            </a>
         @endforeach
      </div>

      {{$notifications->links()}}

   </section>

@endsection