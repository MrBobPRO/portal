@extends('templates.master')
@section('content')

   <section class="home-page">

      {{-- <form action="/send_credentials" method="POST">
         @csrf
         <button type="submit">Отправить</button>
      </form> --}}

      {{-- Dropdown links start --}}
      <div class="dropdown navbar-dropdown">
         <a class="btn btn-secondary dropdown-toggle" href="{{route('home.index')}}" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           {{__('Главная')}}
         </a>
       
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
           <li><a class="dropdown-item" href="{{route('structure.index')}}">{{__('Структура')}}</a></li>
           <li><a class="dropdown-item" href="{{route('knowledge.index')}}">{{__('Центр знаний')}}</a></li>
           <li><a class="dropdown-item" href="{{route('news.index')}}">{{__('Новости')}}</a></li>
           <li><a class="dropdown-item" href="{{route('projects.index')}}">{{__('Проекты и инициативы')}}</a></li>
           <li><a class="dropdown-item" href="{{route('entertainment.index')}}">{{__('Развлечения')}}</a></li>
         </ul>
      </div>{{-- Dropdown links start --}}

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