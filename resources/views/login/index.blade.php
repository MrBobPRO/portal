@extends('login.master')

@section('content')
<div class="login-page"
   style="background: url({{ asset("img/login/background.jpg") }}) no-repeat; background-size: cover;">
   <div class="container">
      <div class="row align-items-center top-row">
         <div class="col-6">
            <a href="/"><img class="logo" src="{{asset('img/main/logo-nav.png')}}"></a>
         </div>
         <div class="col-6">
            <div class="dropdown nav-lang-dropdown">
               <button class="btn dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  @if(\App::currentLocale() == 'ru')
                  <img src="{{asset('img/main/russian.png')}}"> Русский
                  @else
                  <img src="{{asset('img/main/english.png')}}"> English
                  @endif
               </button>
               <ul class="dropdown-menu" aria-labelledby="langDropdown">
                  @if(\App::currentLocale() == 'ru')
                  <li>
                     <form action="/setLangRu" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                           Русский</button>
                     </form>
                  </li>
                  <li>
                     <form action="/setLangEn" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                           English</button>
                     </form>
                  </li>
                  @else
                  <li>
                     <form action="/setLangEn" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                           English</button>
                     </form>
                  </li>
                  <li>
                     <form action="/setLangRu" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                           Русский</button>
                     </form>
                  </li>
                  @endif
               </ul>
            </div>
         </div>
      </div>
      <div class="row align-items-center middle-row">
         <div class="col-12 col-lg-8">
            <div class="welcome-note">
               {{ __('Добро пожаловать на сайт') }}
               <span>{{ __('сотрудникам') }}</span>
               {{ __('компании ТГЭМ') }}
            </div>
         </div>
         <div class="col-12 col-lg-4">
            <div class="form-box">
               <div class="login-title">{{ __('Вход на сайт') }}</div>
               <form action="{{route('login')}}" id="login-form" method="POST">
                  @csrf
                  <input type="text" name="name" :value="old('name')" required autofocus 
                  @if(count($errors))
                     style="border-color: red" placeholder="{{ __('Неверный логин или пароль!') }}" 
                  @else
                     placeholder="{{ __('Имя пользователя') }}" 
                  @endif>
                  <div class="password-item">
                     <input id="password" type="password" name="password" required autocomplete="current-password"
                        placeholder="{{ __('Пароль') }}">
                     <button id="password-btn" type="button">
                        <i id="icon" class="fa fa-eye"></i>
                     </button>
                  </div>
                  <div class="submit-container">
                     <button class="submit-btn" type="submit">{{ __('Войти') }}</button>
                     <a href="{{route('login.forgot_password')}}">{{ __('Забыли пароль ?') }}</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="row bottom-row">
         <div class="col-lg-12">
            <div class="copyright">
               © {{date('Y')}} ОАО «Точикгидроэлектромонтаж». {{ __('Все права защищены') }}.
            </div>
         </div>
      </div>
   </div>
</div>
@endsection