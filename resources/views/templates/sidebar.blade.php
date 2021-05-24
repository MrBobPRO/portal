
<div id="sidebar" class="sidebar">

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

   

   {{-- Sidebar Birthdays start --}}
   <?php $totalBDsCount = count($todayBDs) + count($tomorrowBDs) + count($afterTomorrowBDs); ?>

   @if($totalBDsCount > 0)
      <div class="birthdays">
         <h1>День рождении
            <span class="material-icons-outlined">star</span>
         </h1>
         
         @foreach ($todayBDs as $usser)
            <div class="single-birthday">
               <img src="{{asset('img/users/' . $usser->avatar)}}">
               <span>Сегодня</span>
               <p>{{$usser->name . ' ' . $usser->surname}}</p>
            </div>
         @endforeach

         @foreach ($tomorrowBDs as $usser)
            <div class="single-birthday">
               <img src="{{asset('img/users/' . $usser->avatar)}}">
               <span>Завтра</span>
               <p>{{$usser->name . ' ' . $usser->surname}}</p>
            </div>
         @endforeach

         @foreach ($afterTomorrowBDs as $usser)
            <div class="single-birthday">
               <img src="{{asset('img/users/' . $usser->avatar)}}">
               <span>После завтра</span>
               <p>{{$usser->name . ' ' . $usser->surname}}</p>
            </div>
         @endforeach
      </div>
   @endif
   {{-- Birthdays end --}}

</div>