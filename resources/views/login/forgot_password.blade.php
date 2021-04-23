@extends('login.master')
@section('content')

   <section class="forgot-password-page">

      <div class="reset-password-request">
         <img src=" {{ asset('img/login/password.png') }} " alt="img">
         <b class="title"> {{ __('Забыли Ваш пароль?') }} </b>
         <p class="text"> {{ __('Введите свой адрес электронной почты и мы отправим инструкции по сбросу пароля.') }} </p>
         <form method="POST" onsubmit="ajax_forgot_password()">
            @csrf
            <label id="email-label" for="email"> {{ __('Адрес электронной почты') }} </label>
            <input name="email" onfocus="resetStyle()" type="text" id="email" placeholder=" {{ __('Введите Ваш email') }} ">
            <button id="send-link-btn" type="submit"> {{ __('Продолжить') }}
            {{-- Spinner --}}
               <div class="spinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  {{ __('Загрузка') }}...
               </div>
            </button>
         </form>
         <a href="{{route('login')}}"> {{ __('Вернуться') }} </a>
         {{-- Success card --}}
         <div class="reset-password-email">
            <div class="icon">
               <span class="material-icons-outlined">mail</span>
            </div>
            <b class="title"> {{ __('Проверьте свою почту') }} </b>
            <p class="text">
               {{ __('Пожалуйста, проверьте свою почту для инструкции по сбросу пароля.') }}
            </p>
            <button onclick="resendEmail()" id="resend-email" type="button"> {{ __('Отправить повторно') }} </button>
         </div>
      </div>

   </section>
   
@endsection