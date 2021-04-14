@extends('templates.master')
@section('content')
   
   <section class="news-page">

      <div class="companynews-header">

         <h3 class="title">{{ __('Новости') }}</h3>

         <ul class="crumbs">
            <li class="crumbs-items">
               <a href=" {{ route('home.index') }} ">{{ __('Главная') }}</a>
               <i class="fa fa-square-full"></i>
            </li>
            <li class="crumbs-items">
               <a>{{ __('Новости ') }}</a>
            </li>
         </ul>  

      </div>
         
      <nav class="news__nav">
         <ul class="news__nav-list">
            <li class="news__nav-items">
               <a href=" {{ route('news.companynews') }} ">
                  <img src="{{ asset('img/news/companynews.jpg') }}" alt="image">
                  {{ __('Новости компании') }}
               </a>
            </li>
            <li class="news__nav-items">
               <a href=" {{ route('news.worldnews') }} ">
                  <img src="{{ asset('img/news/worldnews.jpg') }}" alt="image">
                  {{ __('Интересные мировые новости') }}
               </a>
            </li>
         </ul>
      </nav>

      <ul class="all-news-list">

         @foreach ($allNews as $new)

            <li class="all-news-items">
               <img src="{{ asset('img/news/'. $new->image) }}" alt="news" onclick="showModal('{{ asset('img/news/'. $new->image) }}')">
               <div class="right">
                  <h4>{{ $new->title }}</h4>
                  <?php $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD MMMM YYYY') ?>
                  <span>{{ $formatted }}</span>
                  
                  @if ($new->type)
                     <a href=" {{ route('news.shownews', $new->id) }} ">
                        {{ $new->text }}
                     </a> 

                  @else
                     <a href=" {{ route('news.shownews', $new->id) }} ">
                        {{ $new->text }}
                     </a>
                  @endif
               </div>
            </li>

         @endforeach

      </ul>

         {{ $allNews->links() }}

   </section>

   <div class="image-modal" id="image-modal">
      <img id="modal-img" src="#" alt="img">
      <span class="close" onclick="hideModal()"><i class="fa fa-times"></i> </span>
   </div> 

@endsection