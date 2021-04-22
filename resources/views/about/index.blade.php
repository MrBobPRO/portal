@extends('templates.master')
@section('content')

@include('templates.breadcrumbs')

   <section class="about-page">

      <div class="wrapper">
         <img src="{{ asset('img/about/wrapper1.jpg') }}">
         <a href="{{ route('about.aboutus') }}">
            <h2>{{ __('Кто мы') }}?</h2>
            <p>Нынешний успех ОАО “ТГЭМ” это результат более чем полувекового опыта накопленного инженерами и простыми рабочими приехавшие со всех уголков СССР и передовавшие этот опыт из поколения в поколение.</p>
         </a>
      </div>

      <div class="wrapper">
         <img src="{{ asset('img/about/wrapper2.jpg') }}">
         <a href="{{ route('about.structure') }}">
            <h2>{{ __('Структура') }}</h2>
            <p>Нынешний успех ОАО “ТГЭМ” это результат более чем полувекового опыта накопленного инженерами и простыми рабочими приехавшие со всех уголков СССР и передовавшие этот опыт из поколения в поколение.</p>
         </a>
      </div>

      <div class="wrapper">
         <img src="{{ asset('img/about/wrapper3.jpg') }}">
         <a href="{{ route('about.leadership') }}">
            <h2>{{ __('Руководство') }}</h2>
            <p>Нынешний успех ОАО “ТГЭМ” это результат более чем полувекового опыта накопленного инженерами и простыми рабочими приехавшие со всех уголков СССР и передовавшие этот опыт из поколения в поколение.</p>
         </a>
      </div>

   </section>

@endsection 