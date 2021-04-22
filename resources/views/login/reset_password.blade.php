@extends('login.master')
@section('content')

    <section class="reset-password-page">

        <div class="reset-password">
            <img src=" {{ asset('img/login/password.png') }} " alt="img">
            <b class="title"> {{ __('Изменить пароль') }} </b>
            <p class="text">
                {{ __('Введите новый пароль ниже, чтобы изменить свой пароль.') }}
            </p>
            <form method="POST" onsubmit="ajax_reset_password()">
                @csrf
                <input type="hidden" id="token" name="token" value="{{$token}}">
                <label class="new-password" for="password">
                    <input id="password" name="password" type="password" placeholder="{{ __('Новый пароль') }}">
                    <span onclick="showHidePassword('password', 'password-btn')" id="password-btn" class="material-icons-outlined">visibility</span>
                </label>
                <label for="confirm-password">
                    <input id="confirm-password" name="confirm-password" type="password" placeholder=" {{ __('Подтвердите новый пароль') }} ">
                    <span onclick="showHidePassword('confirm-password', 'confirm-btn')" id="confirm-btn" class="material-icons-outlined">visibility</span>
                </label>
                <div id="errors"></div>
                <button id="send-link-btn" type="submit"> {{ __('Сброс пароля') }} 
                {{-- Spinner --}}
                <div class="spinner">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    {{ __('Загрузка') }}...
                </div>
                </button>
            </form>

            <div class="reset-password-success">
                <div class="icon">
                    <span class="material-icons-outlined">check_circle</span>
                </div>
                <b class="title"> {{ __('Пароль изменен') }} </b>
                <p class="text">
                    {{ __('Ваш пароль был успешно изменен.') }}
                </p>
                <a href=" {{ route('login') }} "> {{ __('Вернуться') }} </a>
            </div>

        </div>

    </section>

@endsection