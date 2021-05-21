@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="projects-page">
      
      <div class="dash-search-container">
         {{-- projects seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="Поиск проектов..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allProjects as $pr)
                  <option value="{{ route('dashboard.news.single', $pr->id)}}">{{$pr->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- projects seach end --}}

         <a href="{{route('dashboard.projects.create')}}">Добавить</a>
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">Заголовок</div>
         <div class="width-33">Статус</div>
         <div class="width-33">Дата добавления</div>
      </div>

      <div class="primary-list">
         @foreach($projects as $project)
            <a class="primary-list-item" href="{{ route('dashboard.projects.single', $project->id)}}">
               <div class="width-33">{{$project->title}}</div>
               <div class="width-33">{{$project->completed ? 'Выполнен' : 'Действующий'}}</div>
               <div class="width-33">
                  <?php 
                     $date = \Carbon\Carbon::parse($project->created_at)->locale('ru');
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
            </a>
         @endforeach
      </div>

      {{$projects->links()}}

   </section>

@endsection