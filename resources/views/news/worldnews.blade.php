@extends('templates.master')
@section('content')
   
   <section class="worldnews-page">
      
      <div class="worldnews-header">

         <h3 class="title">{{ __('Интересные мировые новости') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} ">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href=" {{ route('news.index') }} ">{{ __('Новости') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Интересные мировые новости') }}</a>
            </li>
         </ul>  

      </div>

      <ul class="companynews-list">

         @foreach ($worldNews as $new)

            <li class="companynews-items">
               <div class="image" onclick="showModal('{{ asset('img/news/' . $new->image) }}')">
                  <img src="{{ asset('img/news/' . $new->image) }}" alt="img">
                  <div class="image-hover">
                     Смотреть...
                  </div>
               </div>
               <div class="right">
                  <a href=" {{ route('news.shownews', $new->id) }} " alt="img"> {{ $new->title }} </a>
                  <?php $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD MMMM YYYY') ?>
                  <span> {{ $formatted }} </span>
                  <a href=" {{ route('news.shownews', $new->id) }} " class="text"> {{ $new->text }} </a>
               </div>
            </li>

         @endforeach

      </ul>

      {{ $worldNews->links() }}

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 
   
@endsection