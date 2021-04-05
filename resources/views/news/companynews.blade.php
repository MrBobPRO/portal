@extends('templates.master')
@section('content')
   
   <section class="companynews-page">
      
      <div class="companynews-header">

         <h3 class="title">{{ __('Новости компании') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href="/">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a href="/news">{{ __('Новости') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Новости компании') }}</a>
            </li>
         </ul>  

      </div>

      <ul class="companynews-list">

         @foreach ($companyNews as $new)

            <li class="companynews-items">
               <div class="image" onclick="showModal('{{ asset('img/news/' . $new->imageUrl) }}')">
                  <img src="{{ asset('img/news/' . $new->imageUrl) }}" alt="img">
                  <div class="image-hover">
                     Смотреть...
                  </div>
               </div>
               <div class="right">
                  <a href="{{ $new->id }}" alt="img"> {{ $new->title }} </a>
                  <?php $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD MMMM YYYY') ?>
                  <span> {{ $formatted }} </span>
                  <a href="{{ $new->id }}" class="text"> {{ $new->text }} </a>
               </div>
            </li>

         @endforeach

      </ul>

      {{ $companyNews->links() }}

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 
   
@endsection