@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="complaints-page">
      
      {{-- complaints seach start --}}
      <div class="select2_single_container">
         <select class="select2_single select2_single_linked" data-placeholder="{{__('Поиск жалоб')}} ..." data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($allComplaints as $c)
               <option value="{{ route('dashboard.complaints.single', $c->id)}}">{{$c->title}}</option>   
            @endforeach
         </select>
      </div>
      {{-- complaints seach end --}}
      
      <div class="primary-list-titles">
         <div class="width-25">{{__('Заголовок')}}</div>
         <div class="width-25">{{__('Автор')}}</div>
         <div class="width-25">{{__('Дата добавления')}}</div>
         <div class="width-25">{{__('Статус')}}</div>
      </div>

      <div class="primary-list">
         @foreach($complaints as $complaint)
            <a class="primary-list-item" href="{{ route('dashboard.complaints.single', $complaint->id)}}">
               <div class="width-25">{{$complaint->title}}</div>
               <div class="width-25">{{$complaint->user->name}} {{$complaint->user->surname}}</div>
               <div class="width-25">
                  <?php 
                     $date = \Carbon\Carbon::parse($complaint->created_at);
                     $formatted = $date->isoFormat('DD MMMM YYYY H:mm:s');
                  ?>
                  {{$formatted}}
               </div>
               <div class="width-25">
                  @if($complaint->new)
                     <span class="list-new-item">{{__('НОВЫЙ')}}</span>
                  @else
                     {{__('Просмотрено')}}
                  @endif
               </div>
            </a>
         @endforeach
      </div>

      {{$complaints->links()}}

   </section>

@endsection