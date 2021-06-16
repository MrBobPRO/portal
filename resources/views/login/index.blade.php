@extends('login.master')

@section('content')
<div class="login-page"
   style="background: url({{ asset("img/login/background.jpg") }}) no-repeat; background-size: cover;">
   <div class="container">
      <div class="row align-items-center top-row">
         <div class="col-6">
            @if(\App::currentLocale() == 'ru' || \App::currentLocale() == 'tj')
               <a href="/"><img class="logo" src="{{asset('img/main/logo-nav.png')}}"></a>
            @elseif(\App::currentLocale() == 'en')
               <a href="/"><img class="logo" src="{{asset('img/main/logo-eng.png')}}"></a>
            @endif
         </div>
         <div class="col-6">
            <div class="dropdown nav-lang-dropdown">
               <button class="btn dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  @if(\App::currentLocale() == 'ru')
                     <img src="{{asset('img/main/russian.png')}}"> Русский
                  @elseif(\App::currentLocale() == 'en')
                     <img src="{{asset('img/main/english.png')}}"> English
                  @else
                     <img src="{{asset('img/main/tajik.png')}}"> Точики
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
                     <form action="/setLangTj" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                           Точики</button>
                     </form>
                  </li>
                  <li>
                     <form action="/setLangEn" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                           English</button>
                     </form>
                  </li>

                  @elseif(\App::currentLocale() == 'en')
                  <li>
                     <form action="/setLangEn" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                           English</button>
                     </form>
                  </li>
                  <li>
                     <form action="/setLangTj" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                           Точики</button>
                     </form>
                  </li>
                  <li>
                     <form action="/setLangRu" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                           Русский</button>
                     </form>
                  </li>
                  {{-- else if TJ --}}
                  @else
                  <li>
                     <form action="/setLangTj" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                           Точики</button>
                     </form>
                  </li>
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
            <div class="login-form">
               <div class="form-box">
                  <div class="login-title">{{ __('Вход на сайт') }}</div>
                  <form action="{{route('login')}}" id="login-form" method="POST">
                     @csrf
                     <input type="text" name="nickname" value="{{old('nickname')}}" required placeholder="{{ __('Никнейм') }}">
                     <div class="password-item">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                           @if(count($errors))
                              style="border-color: red" placeholder="{{ __('Неверный логин или пароль!') }}" 
                           @else
                              placeholder="{{ __('Пароль') }}"
                           @endif
                           >
                        <button onclick="showHidePassword('password', 'password-btn-icon')" id="password-btn" type="button">
                           <span id="password-btn-icon" class="material-icons-outlined">visibility</span>
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
      </div>
      <div class="row bottom-row">
         <div class="col-lg-12">
            <div class="copyright">
               © {{date('Y')}} {{ __('ОАО «Точикгидроэлектромонтаж». Все права защищены.') }}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection