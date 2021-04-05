@extends('templates.master')
@section('content')
   
   <section class="news-page">
         
      <nav class="news__nav">
         <ul class="news__nav-list">
            <li class="news__nav-items">
               <a href="/news/companynews">
                  <img src="{{ asset('img/news/companynews.jpg') }}" alt="image">
                  {{ __('Новости компании') }}
               </a>
            </li>
            <li class="news__nav-items">
               <a href="/news/worldnews">
                  <img src="{{ asset('img/news/worldnews.jpg') }}" alt="image">
                  {{ __('Интересные мировые новости') }}
               </a>
            </li>
         </ul>
      </nav>

      <ul class="all-news-list">

         @foreach ($allNews as $new)

            <li class="all-news-items">
               <img src="{{ asset('img/news/'. $new->imageUrl) }}" alt="news" onclick="showModal('{{ asset('img/news/'. $new->imageUrl) }}')">
               <div class="right">
                  <h4>{{ $new->title }}</h4>
                  <?php $date = \Carbon\Carbon::parse($new->created_at)->locale('ru');
                  $formatted = $date->isoFormat('DD MMMM YYYY') ?>
                  <span>{{ $formatted }}</span>
                  
                  @if ($new->type)
                     <a href="news/{{ $new->id }}">
                        {{ $new->text }}
                     </a> 

                  @else
                     <a href="news/{{ $new->id }}">
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