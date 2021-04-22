@extends('login.master')

@section('content')

   <div class="reset-password-request">
      <div class="reset-password-error">
         <div class="icon">
            <span class="material-icons-outlined">cancel</span>
         </div>
         <b class="title"> {{ __('Неправильная ссылка') }} </b>
         <p class="text">
            {{ __('Чтобы сбросить пароль, вернитесь на страницу входа и выберите «Забыли пароль», чтобы отправить новое электронное письмо.') }}
         </p>
         <a href=" {{ route('login') }} "> {{ __('Вернуться') }} </a>
      </div>
   </div>
   
@endsection

