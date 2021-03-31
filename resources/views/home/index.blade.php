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

         <p class="text-uppercase">Today</p>
         
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
         </ul>
      </div>

   </div>
   
@endsection