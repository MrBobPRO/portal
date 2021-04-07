<div class="sidebar">
   <div class="div">
      <h3 class="title title_top"> {{ __('День рождении') }} </h3>
      <p class="text-center"> {{ __('Сегодня') }} </p>
      <ul class="BD-list">
   
         @foreach ($todayBDs as $todayBD)
   
               <li class="BD-items">
                  <img src="{{ asset('img/main/' . $todayBD->avaUrl) }}" alt="Avatar...">
                  <dl>
                     <dt>{{ $todayBD->name}} {{ $todayBD->surname }}</dt>
                     <dd>{{ $todayBD->birth_date }}</dd>
                  </dl>
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
      <p class="text-center"> {{ __('Скоро') }} </p>
      <ul class="BD-list">
   
         @foreach ($tomorrowBDs as $tomorrowBD)
   
               <li class="BD-items">
                  <img src="{{ asset('img/main/' . $tomorrowBD->avaUrl) }}" alt="Avatar...">
                  <dl>
                     <dt>{{ $tomorrowBD->name}} {{ $tomorrowBD->surname }}</dt>
                     <dd>{{ $tomorrowBD->birth_date }}</dd>
                  </dl>
               </li>
               
         @endforeach
   
         @foreach ($afterTomorrowBDs as $afterTomorrowBD)
   
               <li class="BD-items">
                  <img src="{{ asset('img/main/' . $afterTomorrowBD->avaUrl) }}" alt="Avatar...">
                  <dl>
                     <dt>{{ $afterTomorrowBD->name}} {{ $afterTomorrowBD->surname }}</dt>
                     <dd>{{ $afterTomorrowBD->birth_date }}</dd>
                  </dl>
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

   {{-- News --}}

   <h3 class="title "> {{ __('Последние новости') }} </h3>

      <ul class="news-list">

         @foreach ($news as $new)

            <li class="news-items">
               <img src="{{ asset('img/news/' . $new->imageUrl) }}" alt="Loading...">
               <div>
                  <h4 class="news-title">{{ $new->title }}</h4>
                  <p  class="text">{{ $new->text }}</p> 
                  <p class="date">
                     {{ $new->created_at }}
                  </p>
               </div>
            </li>

         @endforeach

      </ul>

   </div>
</div>