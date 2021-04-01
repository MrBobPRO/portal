<div class="sidebar">
   <h3 class="text-center">День рождении</h3>
   <p class="text-center">Сегодня</p>
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
   <p class="text-center">Скоро</p>
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