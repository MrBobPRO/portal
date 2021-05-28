@extends('templates.no_sidebar_master')

@section('content')
@include('templates.breadcrumbs')

   <section class="notifications-page">
      
      <div class="primary-list-titles">
         <div class="width-33">Опрос</div>
         <div class="width-33">Дата</div>
         <div class="width-33">Статус</div>
      </div>

      <div class="primary-list">
         @foreach($questions as $q)
            <a class="primary-list-item" href="{{ route('questionnaire.single', $q->id)}}">
               <div class="width-33">{{$q->text}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($q->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
               <div class="width-33">
                  
               </div>
            </a>
         @endforeach
      </div>

      {{$questions->links()}}

   </section>

@endsection