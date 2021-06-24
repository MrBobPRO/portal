@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="projects-page">

      <a class="add-button" href="{{route('dashboard.projects.create')}}"><span class="material-icons-outlined">add</span></a>
      
      <div class="dash-search-container">
         {{-- projects seach start --}}
         <div class="select2_single_container">
            <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск проектов')}}..." data-dropdown-css-class="select2_single_dropdown">
               <option></option>
               @foreach($allProjects as $pr)
                  <option value="{{ route('dashboard.news.single', $pr->id)}}">{{$pr->title}}</option>   
               @endforeach
            </select>
         </div>
         {{-- projects seach end --}}
      </div>

      
      <div class="primary-list-titles">
         <div class="width-33">{{__('Заголовок')}}</div>
         <div class="width-33">{{__('Статус')}}</div>
         <div class="width-33">{{__('Дата добавления')}}</div>
      </div>

      <div class="primary-list">
         @foreach($projects as $project)
            <a class="primary-list-item" href="{{ route('dashboard.projects.single', $project->id)}}">
               <div class="width-33">{{$project->title}}</div>
               <div class="width-33">
                  @if ($project->completed)
                      {{__('Выполнен')}}
                  @else
                     {{__('Действующий')}}
                  @endif
               </div>
               <div class="width-33 admin-edit-btn">
                  <?php 
                     $date = \Carbon\Carbon::parse($project->created_at);
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  <div>
                     {{$formatted}}
                  </div>
                  <span class="material-icons-outlined">edit</span>
               </div>
            </a>
         @endforeach
      </div>

      {{$projects->links()}}

   </section>

@endsection