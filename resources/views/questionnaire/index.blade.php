@extends('templates.no_sidebar_master')

@section('content')
@include('templates.breadcrumbs')

   <section class="notifications-page">
      
      <div class="primary-list-titles">
         <div class="width-25">Опрос</div>
         <div class="width-25">Дата</div>
         <div class="width-25">Ваш выбор</div>
         <div class="width-25">Статус</div>
      </div>

      <div class="primary-list">
         @foreach($questions as $q)
            <a class="primary-list-item" href="{{ route('questionnaire.single', $q->id)}}">
               <div class="width-25">{{$q->text}}</div>
               <div class="width-25">
                  <?php 
                     $date = \Carbon\Carbon::parse($q->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
               <div class="width-25">
                  <?php 
                     //check if user has already voted
                     $optionsId = $q->options->pluck('id');
                     $usersChoice = Auth::user()->choices->whereIn('option_id', $optionsId)->first();
                  ?>
                  {{$usersChoice ? 'Выбрано' : 'Не выбрано'}}
               </div>
               <div class="width-25">
                  <?php 
                     $viewed = App\Models\Viewed::where('source', 'questionnaire')->where('questionnaire_id', $q->id)->where('user_id', $user_id)->first();
                  ?>
                  @if($viewed)
                     {{__('Просмотрено')}}
                  @else
                     <span class="list-new-item">{{__('НОВЫЙ')}}</span>
                  @endif
               </div>
            </a>
         @endforeach
      </div>

      {{$questions->links()}}

   </section>

@endsection