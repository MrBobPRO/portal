@extends('templates.master')

@section('content')

    <section class="profile-page">

        <h2 class="title">Профиль</h2>
        {{-- Edit profile form start --}}
        <form class="edit-info-form" action="/edit_profile" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Change user avatar block start --}}
            <div class="upload">
                <img src=" {{ asset('img/users/' . $user->avatar) }} " alt="img">
                <label>
                    <input type="file" accept=".jpg, .png" name="avatar" id="avatar">
                    <div class="upload-btn">Выберите файл</div>
                </label>
                <p class="image-description">Допустимые форматы: только .jpg, .png <br>Максимальный размер файла - 500 КБ, минимальный - 70 КБ</p>
            </div>{{-- Change user avatar block end --}}

            <h3 class="acc-info"> Информация </h3>
            {{-- Edit user information block start --}}
            <div class="info-block">
                <label class="name"> Имя
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </label>
                <label class="surname"> Фамилия
                    <input type="text" name="surname" id="surname" value="{{ $user->surname }}" required>
                </label>
                <label class="nickname"> Ник
                    <input type="text" name="nickname" id="nickname" value="{{ $user->nickname }}" required>
                </label>
                <label class="birth_date"> День рождения
                    <input type="date" name="birth_date" id="birth_date" value="{{$user->birth_date}}" required>
                </label>
                <label class="email"> E-mail
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                </label>
                <label class="position"> Должность
                    <input type="text" name="position" id="position" disabled value="{{ $user->position }}" required>
                </label>
                {{-- Language multiselect start --}}
                <label class="languages"> Языки
                    <div class="select2_multiple_container">
                        <select name="languages[]" id="languages" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown" multiple required>
                            @foreach ($languages as $language)
                                <option value="{{$language->name}}" {{ $language->user_id == $user->id ? 'selected' : '' }}>{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </label>{{-- Language multiselect end --}}

                <label class="description-label" for="description"> Описание
                    <div class="textarea">
                        <textarea spellcheck="false" class="description" name="description" id="description" required>{{ $user->description }}</textarea>
                    </div>
                </label>
            </div>{{-- Edit user information block end --}}

            <button class="edit-info-form-btn" type="submit">Сохранить изменения</button>

        </form>{{-- Edit profile form end --}}

        <h3 class="acc-info"> Изменить пароль </h3>
        {{-- Edit password form start --}}
        <form class="edit-password-form" action="/edit_password" method="POST">
            
            <label class="password" for="password">Password
                <input type="password" name="password" id="password">
                <span class="material-icons-outlined" id="password-btn" onclick="showHidePassword('password', 'password-btn')">visibility</span>
            </label>

            <label class="new-password" for="new-password">New password
                <input type="password" name="new-password" id="new-password">
                <span class="material-icons-outlined">visibility</span>
            </label>

            <label class="confirm-password" for="confirm-password">Confirm password
                <input type="password" name="confirm-password" id="confirm-password">
                <span class="material-icons-outlined">visibility</span>
            </label>

            <button class="edit-info-form-btn" type="submit">Сохранить изменения</button>

        </form>{{-- Edit password form end --}}

    </section>
    
@endsection