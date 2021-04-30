@extends('dashboard.templates.master')
@section('content')
    
   <section class="settings-page">
      
      <h2 class="title">Настройки</h2>
      
      <h3 class="color-title">Цвет</h3>   
      {{-- Change colorScheme block start --}}
      <ul class="color-list">
         <li class="color-items {{\Auth::user()->colorScheme == '#00bcd4' ? 'active' : ''}} lightblue" onclick="changeColor('#00bcd4','lightblue')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#9368e9' ? 'active' : ''}} purple" onclick="changeColor('#9368e9','purple')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#2ca8ff' ? 'active' : ''}} blue" onclick="changeColor('#2ca8ff','blue')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#18ce0f' ? 'active' : ''}} green" onclick="changeColor('#18ce0f','green')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#ff9800' ? 'active' : ''}} orange" onclick="changeColor('#ff9800','orange')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#f44336' ? 'active' : ''}} red" onclick="changeColor('#f44336','red')"></li>
         <li class="color-items {{\Auth::user()->colorScheme == '#e91e63' ? 'active' : ''}} burgundy" onclick="changeColor('#e91e63','burgundy')"></li>
      </ul>       
      <form action="/update_color" method="POST">
         @csrf
         <input name="colorscheme" id="color-scheme" class="visually-hidden" type="text">
         <button class="scheme-btn" type="submit">Изменить цвет</button>
      </form>  {{-- Change colorScheme block end --}}
   
      <h3 class="theme-title">Фон</h3>
      {{-- Change backgroung start --}}
      <ul class="theme-list">
         <li class="theme-items {{\Auth::user()->dashBg == 'dash1.jpg' ? 'active' : ''}}" onclick="changeDashBg('dash1.jpg', '0')">
            <img src="{{ asset('img/dashboards/dash1.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{\Auth::user()->dashBg == 'dash2.jpg' ? 'active' : ''}}" onclick="changeDashBg('dash2.jpg', '1')">
            <img src="{{ asset('img/dashboards/dash2.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{\Auth::user()->dashBg == 'dash3.jpg' ? 'active' : ''}}" onclick="changeDashBg('dash3.jpg', '2')">
            <img src="{{ asset('img/dashboards/dash3.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{\Auth::user()->dashBg == 'dash4.jpg' ? 'active' : ''}}" onclick="changeDashBg('dash4.jpg', '3')">
            <img src="{{ asset('img/dashboards/dash4.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{\Auth::user()->dashBg == 'dash5.jpg' ? 'active' : ''}}" onclick="changeDashBg('dash5.jpg', '4')">
            <img src="{{ asset('img/dashboards/dash5.jpg') }}" alt="img">
         </li>
      </ul>
      <form action="/update_background" method="POST">
         @csrf
         <div class="inputBox">
            <span class="title">Тёмный режим:</span>
            <input class="visually-hidden" type="checkbox" name="darkbg" id="darkbg" {{\Auth::user()->darkMode == '1' ? 'checked' : ''}}>
            <label for="darkbg" id="emoji" onclick="changeMode()">{{\Auth::user()->darkMode == '1' ? '😊' : '😡'}}</label>
         </div>
         <input class="visually-hidden" type="text" name="dashbg" id="dashbg">
         <button class="scheme-btn">Изменить фон</button>
      </form>{{-- Change backgroung end --}}

   </section>

@endsection