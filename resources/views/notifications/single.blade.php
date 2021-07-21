@extends('templates.no_sidebar_master')

@section('content')
@include('templates.breadcrumbs')

<section class="single-ideas-page formed-page">

   <div class="input-container-inline">
      <label>{{__('Заголовок')}}</label>
      <div class="value-replacer">
         {{ $notification->title }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>{{__('Дата')}}</label>
      <div class="value-replacer">
         <?php 
            $date = \Carbon\Carbon::parse($notification->created_at)->locale('ru');
            $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
         ?>
         {{ $formatted }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>{{__('Ответ администрации')}}</label>
      <div class="value-replacer">
         {{ $notification->text }}
      </div>
   </div>

</section>

@endsection