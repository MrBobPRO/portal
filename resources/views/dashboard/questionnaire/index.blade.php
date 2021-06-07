@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="questionnaire-page">
      
      <a class="add-button" href="{{route('dashboard.questionnaire.create')}}"><span class="material-icons-outlined">add</span></a>

      <div class="primary-list-titles">
         <div class="width-33">Текст</div>
         <div class="width-33">Дата добавления</div>
         <div class="width-33">Приватность</div>
      </div>

      <div class="primary-list">
         @foreach($questions as $qs)
            <a class="primary-list-item" href="{{ route('dashboard.questionnaire.single', $qs->id)}}">
               <div class="width-33">{{$qs->text}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($qs->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:ss');
                  ?>
                  {{$formatted}}
               </div>
               <div class="width-33">{{$qs->private ? 'Приватный' : 'Публичный'}}</div>
            </a>
         @endforeach
      </div>

      {{$questions->links()}}

   </section>

@endsection