
<div id="sidebar" class="sidebar">
   {{-- Sidebar Birthdays start --}}
   <div class="birthdays">
      <h1>День рождении
         <span class="material-icons-outlined">star</span>
      </h1>
      
      <div class="single-birthday">
         <img src="{{asset('img/users/6.jpg')}}">
         <span>Сегодня</span>
         <p>Нурова Шакира</p>
      </div>

      <div class="single-birthday">
         <img src="{{asset('img/users/7.jpg')}}">
         <span>Завтра</span>
         <p>Расул Икромов</p>
      </div>
   </div>
   {{-- Birthdays end --}}

   {{-- Sidebar News start --}}
   <div class="sidebar-news">
      <h1>Последние новости
         <span class="material-icons-outlined">article</span>
      </h1>

      @foreach($latest_news as $new)
         <div class="sidebar-single-news">
            <a href=" {{ route('news.single', $new->id) }} ">
               <img src="{{ asset('img/news/' . $new->image) }}" alt="Loading...">

               <?php
                  $appLocale = \App::currentLocale();

                  // Generate News title from appLocale
                  $sidebarNewsTitle = $new[$appLocale . 'Title'];

                  //Generate News Date Locale from appLocale
                  if($appLocale == 'en') 
                     $sidebarNewsDateLocale = 'en';
                  else
                     $sidebarNewsDateLocale = 'ru';

                  // Generate News text from appLocale
                  $sidebarNewsText = $new[$appLocale . 'Text'];
                  //Replace all tags by space
                  $sidebarNewsText = preg_replace('#<[^>]+>#', ' ', $sidebarNewsText);
               ?>

               <h4>{{ $sidebarNewsTitle }}</h4>
               <p>{!! $sidebarNewsText !!}</p> 

               <span>
                  <?php 
                     $date = \Carbon\Carbon::parse($new->created_at)->locale($sidebarNewsDateLocale);
                     $formatted = $date->isoFormat('DD MMMM YYYY');
                  ?>
                  {{$formatted}}
               </span>
               
            </a>
         </div>
      @endforeach

   </div>  {{-- Sidebar News end --}}
</div>