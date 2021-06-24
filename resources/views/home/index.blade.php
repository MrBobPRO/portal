@extends('templates.master')
@section('content')

   <section class="home-page">
      {{-- Owl Carousel --}}
      <div class="owl-carousel-container">
         <div class="owl-carousel owl-theme">
            @foreach ($items as $item)
               @if($item->url == '')
                  <div class="item">
                     <img src="{{ asset('img/slider/' . $item->image) }}">
                     <p style="color: {{$item->color}}">{{$item->title}}</p>
                  </div>
               @else
                  <a href="{{$item->url}}" class="item">
                     <img src="{{ asset('img/slider/' . $item->image) }}">
                     <p style="color: {{$item->color}}">{{$item->title}}</p>
                  </a>
               @endif

            @endforeach
        </div>
        {{-- Carousel navs --}}
         <span class="material-icons-outlined owl-navs no-selection owl-nav-prev" onclick="prevSlide()">arrow_back_ios</span>
         <span class="material-icons-outlined owl-navs no-selection owl-nav-next" onclick="nextSlide()">arrow_forward_ios</span>
      </div>

      <div class="mobile-sidebar">
         {{-- Sidebar Ads start --}}
         @if(count($ads))
         <div class="sidebar-ads">
            <h1>{{__('Объявление')}}
               <span class="material-icons-outlined">new_releases</span>
            </h1>
            @foreach ($ads as $ad)
               <div class="ads-single">{{$ad->text}}</div>
            @endforeach
         </div>
         @endif
         {{-- Sidebar Ads end --}}
         {{-- Sidebar News start --}}
         <div class="sidebar-news">
            <h1>{{__('Последние новости')}}
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
         </div>{{-- Sidebar News end --}}
         {{-- Sidebar Birthdays start --}}
         <?php $totalBDsCount = count($todayBDs) + count($tomorrowBDs) + count($afterTomorrowBDs); ?>
         @if($totalBDsCount > 0)
            <div class="birthdays">
               <h1>{{__('День рождении')}}
                  <span class="material-icons-outlined">star</span>
               </h1>
               @foreach ($todayBDs as $usser)
                  <div class="single-birthday">
                     <img src="{{asset('img/users/' . $usser->avatar)}}">
                     <span>{{__('Сегодня')}}</span>
                     <p>{{$usser->name . ' ' . $usser->surname}}</p>
                  </div>
               @endforeach
               @foreach ($tomorrowBDs as $usser)
                  <div class="single-birthday">
                     <img src="{{asset('img/users/' . $usser->avatar)}}">
                     <span>{{__('Завтра')}}</span>
                     <p>{{$usser->name . ' ' . $usser->surname}}</p>
                  </div>
               @endforeach
               @foreach ($afterTomorrowBDs as $usser)
                  <div class="single-birthday">
                     <img src="{{asset('img/users/' . $usser->avatar)}}">
                     <span>{{__('После завтра')}}</span>
                     <p>{{$usser->name . ' ' . $usser->surname}}</p>
                  </div>
               @endforeach
            </div>
         @endif
         {{-- Birthdays end --}}
      </div>


     <div class="text-block">
         <p>Нынешний успех ОАО “ТГЭМ” это результат более чем полувекового опыта накопленного инженерами и простыми рабочими приехавшие со всех уголков СССР и передовавшие этот опыт из поколения в поколение.</p>
         <p>В истории развития энергетики молодого Таджикистана ОАО “ТГЭМ” занимает почетное место, так как такие мега проекты как Нурекская ГЭС, Алюминиевый Завод, Сангтудинская ГЭС-1, Сангтудинская ГЭС-2 были воздвинуты с помощью инженеров и рабочих тогдашнего Таджикского монтажного управления Гидроэлектромонтаж.</p>
         <p>Сегодня ОАО “ТГЭМ” это ведущая компания в сфере строительства энергетических объектов на рынке Таджикистана. Технический и кадровый потенциал ОАО “ТГЭМ” позволяет реализовывать проекты любой сложности, не только в сфере энергетики, но и в других отраслях.</p>
         <p>ОАО “ТГЭМ” осуществляет весь комплекс проектных, инжиниринговых и сервисных услуг в строительстве, реконструкции и техническом перевооружении объектов энергетики. Компания традиционно использует в своей деятельности современные научно-технические достижения, а также прогрессивные методы организации и управления  производством.</p>
         <p>ОАО “ТГЭМ” устойчиво набирая обороты, выходит за границы рынка Таджикистана. В этом году ОАО “ТГЭМ” выполняет ряд проектов по строительству воздушных линий электропередач в Исламской Республике Афганистан, и уже в следуюшем году планирует выйти на рынок Российской Федерации.</p>
         <p>Наша гордость – это наш высококвалифицированный персонал. Профессионализм и надёжность наших сотрудников служат залогом успеха и развития нашей компании.</p>
     </div>

   </section>
   
@endsection