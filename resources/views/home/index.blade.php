@extends('templates.master')
@section('content')

   <section class="home-page">
      
      <div class="owl-carousel owl-theme">
         <div class="item">
            <img src="{{ asset('img/home/k1.jpg') }}" alt="img">
         </div>
         <div class="item">
            <img src="{{ asset('img/home/k2.jpg') }}" alt="img">
         </div>
         <div class="item">
            <img src="{{ asset('img/home/k3.jpg') }}" alt="img">
         </div>
     </div>

   </section>
   
@endsection