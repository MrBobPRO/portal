@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="ideas-page">
      
      {{-- Ideas seach start --}}
      <div class="select2_single_container">
         <select class="select2_single select2_single_linked" data-placeholder="Поиск идей..." data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($allIdeas as $i)
               <option value="{{ route('dashboard.ideas.single', $i->id)}}">{{$i->title}}</option>   
            @endforeach
         </select>
      </div>
      {{-- Ideas seach end --}}
      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Автор</div>
         <div class="width-33">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($ideas as $idea)
            <a class="primary-list-item" href="{{ route('dashboard.ideas.single', $idea->id)}}">
               <div class="width-33">{{$idea->title}}</div>
               <div class="width-33">{{$idea->user->name}} {{$idea->user->surname}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($idea->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$ideas->links()}}

   </section>

@endsection