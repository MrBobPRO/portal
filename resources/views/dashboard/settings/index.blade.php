@extends('dashboard.templates.master')
@section('content')
    
<section class="settings-page formed-page">

   {{-- Change language start --}}
   <div class="mob-set">
      <h2>{{__('Языки')}}</h2>

      <div class="input-container-inline">
         <label>{{__('Выберите язык')}}:</label>
         <ul class="colors-list languages-list">
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                     @if (App::currentLocale() == 'ru')
                        <span class="material-icons-outlined">radio_button_checked</span>
                     @endif
                     ru
                     <img src="{{asset('img/main/russian.png')}}">
                  </button>
               </form>
            </li>
            <li>
               <form action="/setLangTj" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                     @if (App::currentLocale() == 'tj')
                        <span class="material-icons-outlined">radio_button_checked</span>
                     @endif
                     tj
                     <img src="{{asset('img/main/tajik.png')}}">
                  </button>
               </form>
            </li>
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                     @if (App::currentLocale() == 'en')
                        <span class="material-icons-outlined">radio_button_checked</span>
                     @endif
                     en
                     <img src="{{asset('img/main/english.png')}}">
                  </button>
               </form>
            </li>
         </ul>
      </div>
   </div>
   {{-- Change language end --}}

   {{-- Change color scheme start --}}
   <h2>{{__('Цветовая схема')}}</h2>

   <div class="input-container-inline">
      <label>{{__('Выберите цвет')}}:</label>
      <ul class="colors-list">
         <li class="colors-item {{$user->colorScheme == '#00bcd4' ? 'active' : ''}} lightblue" onclick="changeColor('#00bcd4','lightblue')"></li>
         <li class="colors-item {{$user->colorScheme == '#9368e9' ? 'active' : ''}} purple" onclick="changeColor('#9368e9','purple')"></li>
         <li class="colors-item {{$user->colorScheme == '#2ca8ff' ? 'active' : ''}} blue" onclick="changeColor('#2ca8ff','blue')"></li>
         <li class="colors-item {{$user->colorScheme == '#18ce0f' ? 'active' : ''}} green" onclick="changeColor('#18ce0f','green')"></li>
         <li class="colors-item {{$user->colorScheme == '#ff9800' ? 'active' : ''}} orange" onclick="changeColor('#ff9800','orange')"></li>
         <li class="colors-item {{$user->colorScheme == '#f44336' ? 'active' : ''}} red" onclick="changeColor('#f44336','red')"></li>
         <li class="colors-item {{$user->colorScheme == '#e91e63' ? 'active' : ''}} burgundy" onclick="changeColor('#e91e63','burgundy')"></li>
      </ul>
   </div>

   <form action="/update_color" method="POST">
      @csrf
      <input name="colorscheme" id="color-scheme" class="visually-hidden" type="text" value="{{$user->colorScheme}}">
      <button class="main-btn" type="submit"><span class="material-icons">palette</span> {{__('Изменить цвет')}}</button>
   </form>
   {{-- Change color scheme end --}}


   <section class="dash-auto-hide">
      <form action="/update_dash_auto_hide" method="POST">
         @csrf
         <h2 class="title-seperator">{{__('Видимость левого бокового меню')}}</h2>
         <p>
            Если опция включена, то при обновлении или переходе на другую страницу, боковое меню будет скрыто.<br>
            А если опция выключена, то при обновлении или переходе на другую страницу, видимость бокового меню не изменится.
         </p>

         <div class="switch-container">
            {{__('Скрыть левое боковое меню по умолчанию')}}
            <label class="switch">
               <input type="checkbox" name="hidden" @if($user->dash_auto_hide) checked @endif>
               <span class="slider round"></span>
            </label>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons">visibility</span> {{__('Изменить видимость')}}</button>
      </form>
   </section>


   {{-- background change preview start --}}
   <div class="dashbg-settings">
      <h2 class="title-seperator">{{__('Фон левого бокового меню')}}</h2>
      
      <ul class="theme-list">
         <li class="theme-items {{$user->dashBg == 'dash1.jpg' ? 'active' : ''}}" onclick="backgroundChangePreview('dash1.jpg', '0')">
            <img src="{{ asset('img/dashboards/dash1.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{$user->dashBg == 'dash2.jpg' ? 'active' : ''}}" onclick="backgroundChangePreview('dash2.jpg', '1')">
            <img src="{{ asset('img/dashboards/dash2.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{$user->dashBg == 'dash3.jpg' ? 'active' : ''}}" onclick="backgroundChangePreview('dash3.jpg', '2')">
            <img src="{{ asset('img/dashboards/dash3.jpg') }}" alt="img">
         </li>
         <li class="theme-items {{$user->dashBg == 'dash4.jpg' ? 'active' : ''}}" onclick="backgroundChangePreview('dash4.jpg', '3')">
            <img src="{{ asset('img/dashboards/dash4.jpg') }}" alt="img">
         </li>

         {{-- custom background start --}}
         <li class="theme-items">
            <form id="update_custom_background_form">
               <label class="dashbg-label" for="custom-background-input">
                  <div class="own-theme">
                     <span class="material-icons-outlined">add_circle_outline</span>
                     <p>{{__('Добавить фон')}}</p>
                  </div>
               </label> 
               <input class="visually-hidden" id="custom-background-input" type="file" name="background" accept="image/*" required>   
            </form>
         </li>
         {{-- custom background end --}}
      </ul>
      {{-- background change preview end --}}


      {{-- Update background form start --}}
      <form action="/update_background" method="POST">
         @csrf
         
         {{-- Dark mode start --}}
         <div class="inputBox">
            <span class="title">{{__('Тёмный режим')}}:</span>
            <input class="visually-hidden" type="checkbox" name="darkbg" id="darkbg" {{\Auth::user()->darkMode == '1' ? 'checked' : ''}}>
            <label for="darkbg" id="emoji" onclick="changeMode()">{{\Auth::user()->darkMode == '1' ? '😊' : '😡'}}</label>
         </div>
         {{-- Dark mode end --}}

         <input type="hidden" name="custom_img" value="0" id="custom_img">
         <input class="visually-hidden" type="text" name="background" id="background-hidden-input" value="{{$user->dashBg}}">
         <button class="main-btn" id="form_submit_btn">
            <span class="material-icons-outlined" id="form_btn_ico">image</span>
            <span class="spinner-border spinner-border-sm visually-hidden" role="status" aria-hidden="true" id="form_btn_spinner"></span>
            <div id="form_btn_text">{{('Изменить фон')}}</div>
         </button>
      </form>
      {{-- Update background form start --}}
   </div>
   
</section>

@endsection