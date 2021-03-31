@extends('templates.master')
@section('content')
   <div class="content">
      
      <ul class="news-list">
         <li class="info">
            {{ __('Мы направляем наш огромный интеллектуальный
            и технический потенциал на достижение максимальной 
            энергоэффективности и энергонезависимости нашей страны') }}
         </li>

         <li class="news-items clearfix">
            <img src="{{ asset('img/home/news.jpg') }}" alt="Loading...">
            <div>
               <h3>Title</h3>
               <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic?
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum!   
               </p> 
               <p class="date">
                  Date: {{ date('Y-m-d H:i:s') }}
               </p>
            </div>
         </li>
      </ul>

      <div class="BD-card">

         <p class="text-uppercase">Today</p>
         <ul class="BD-list">
            <li class="BD-items">
               <img src="{{ asset('img/home/ava.jpg') }}" alt="Avatar...">
               <dl>
                  <dt>Name & surname</dt>
                  <dd>Date of birth</dd>
               </dl>
               <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam,
                  atque facilis sequi cupiditate ab magnam nemo natus, 
                  perspiciatis saepe odio vitae.
               </p>
            </li>
         </ul>

         <p class="text-uppercase">This month</p>
         <ul class="BD-list">
            <li class="BD-items">
               <img src="{{ asset('img/home/ava.jpg') }}" alt="Avatar...">
               <dl>
                  <dt>Name & surname</dt>
                  <dd>Date of birth</dd>
               </dl>
               <p>
                  Description
               </p>
            </li>
         </ul>

      </div>

   </div>
   
@endsection