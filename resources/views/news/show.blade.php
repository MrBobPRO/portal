@extends('templates.master')
@section('content')
   
   <section class="news-page">
      
      <div class="companynews-header">

         <h3 class="title">{{ $news->title }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href="/news">{{ __('Новости') }}</a>
               <i class="fa fa-square-full"></i>
            </li>

            @if ( $news->type == true)
               <li class="crumbs-items">
                  <a href="/news/companynews">{{ __('Новости компании') }}</a>
                  <i class="fa fa-square-full"></i>
               </li>
            @else
               <li class="crumbs-items">
                  <a href="/news/worldnews">{{ __('Интересные мировые новости') }}</a>
                  <i class="fa fa-square-full"></i>
               </li> 
            @endif

            <li class="crumbs-items">
               <a>{{ $news->title }}</a>
            </li>
         </ul>  

      </div>

      <div class="news">
         <img src="{{ asset('img/news/' . $news->imageUrl) }}" alt="img" onclick="showModal('{{ asset('img/news/'. $news->imageUrl) }}')">
         <p> {{ $news->text }} </p>
         <?php $date = \Carbon\Carbon::parse($news->created_at)->locale('ru');
         $formatted = $date->isoFormat('DD MMMM YYYY') ?>
         <span> {{ $formatted }} </span>
      </div>

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 
   
@endsection