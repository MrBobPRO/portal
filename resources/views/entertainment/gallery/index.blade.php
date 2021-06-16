@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="entertainment-gallery-page">

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('entertainment.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Развлечения')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('home.index')}}">{{__('Главная')}}</a></li>
            <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
            <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
            <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
            <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

      <div class="galleries-list">
         @foreach ($galleries as $gallery)
            <a href="{{ route('entertainment.gallery.single', $gallery->id) }}">
               <img src="{{ asset('img/entertainment/galleries/' . $gallery->image) }}">

               <div>

                  @switch(\App::currentLocale())
                     @case('ru')
                        <p>{{$gallery->ruTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break

                     @case('tj')
                        <p>{{$gallery->tjTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('ru');
                              $formatted = $date->isoFormat('DD.MM.YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break

                     @case('en')
                        <p>{{$gallery->enTitle}}</p>
                        <span>
                           <?php 
                              $date = \Carbon\Carbon::parse($gallery->date)->locale('en');
                              $formatted = $date->isoFormat('DD MMMM YYYY');
                           ?>
                           {{$formatted}}
                        </span>
                     @break
                  @endswitch   

               </div>
            </a>
         @endforeach
      </div>

      {{ $galleries->links() }}

   </section>
   
@endsection
