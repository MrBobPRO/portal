@extends('templates.master')
@section('content')
   <div class="content">
      
      <ul class="news-list">
         @foreach ($news as $new)
            <li class="news-items clearfix">
               <img src="{{ asset('img/news/' . $new->imageUrl) }}" alt="Loading...">
               <div>
                  <h3>{{ $new->title }}</h3>
                  <p>{{ $new->text }}</p> 
                  <p class="date">
                     {{ _('Дата') }}: {{ $new->created_at }}
                  </p>
               </div>
            </li>
         @endforeach
      </ul>

      <div class="BD-card">
         <h3 class="text-center">День рождении</h3>
         <p>Сегодня</p>
         <ul class="BD-list">

            @foreach ($todayBDs as $todayBD)

                  <li class="BD-items">
                     <img src="{{ asset('img/home/' . $todayBD->avaUrl) }}" alt="Avatar...">
                     <dl>
                        <dt>{{ $todayBD->name}} {{ $todayBD->surname }}</dt>
                        <dd>{{ $todayBD->birth_date }}</dd>
                     </dl>
                     <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam,
                        atque facilis sequi cupiditate ab magnam nemo natus, 
                        perspiciatis saepe odio vitae.
                     </p>
                  </li>

            @endforeach

            @if (count($todayBDs) == 0)

               <li class="BD-items">
                  <p>
                     На сегодня день рождений нет...
                  </p>
               </li>

            @endif

         </ul>
         <p>Скоро</p>
         <ul class="BD-list">

            @foreach ($tomorrowBDs as $tomorrowBD)

                  <li class="BD-items">
                     <img src="{{ asset('img/home/' . $tomorrowBD->avaUrl) }}" alt="Avatar...">
                     <dl>
                        <dt>{{ $tomorrowBD->name}} {{ $tomorrowBD->surname }}</dt>
                        <dd>{{ $tomorrowBD->birth_date }}</dd>
                     </dl>
                     <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam,
                        atque facilis sequi cupiditate ab magnam nemo natus, 
                        perspiciatis saepe odio vitae.
                     </p>
                  </li>
                  
            @endforeach

            @foreach ($afterTomorrowBDs as $afterTomorrowBD)

                  <li class="BD-items">
                     <img src="{{ asset('img/home/' . $afterTomorrowBD->avaUrl) }}" alt="Avatar...">
                     <dl>
                        <dt>{{ $afterTomorrowBD->name}} {{ $afterTomorrowBD->surname }}</dt>
                        <dd>{{ $afterTomorrowBD->birth_date }}</dd>
                     </dl>
                     <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam,
                        atque facilis sequi cupiditate ab magnam nemo natus, 
                        perspiciatis saepe odio vitae.
                     </p>
                  </li>
                  
            @endforeach

            @if (count($tomorrowBDs) == 0 && count($afterTomorrowBDs) == 0)

               <li class="BD-items">
                  <p>
                     В ближайшее время нет день рождений...
                  </p>
               </li>

            @endif

         </ul>
      </div>

   </div>
   
@endsection