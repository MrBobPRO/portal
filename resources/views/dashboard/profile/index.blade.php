@extends('dashboard.templates.master')

@section('content')

    <section class="profile-page formed-page">
        {{-- Edit profile avatar start --}}
        <div class="change-ava-container">
            <img src="{{ asset('img/users/' . $user->avatar) }}">
            <div>
                <button data-bs-toggle="modal" data-bs-target="#avaModal" class="main-btn">
                    <span class="material-icons-outlined">photo_camera</span> {{__('Изменить фото')}}
                </button>
                <p>{{__('Рекомендуется загрузить квадратную фотку')}}.<br>{{__('Иначе фото автоматический будет вырезан при загрузке')}} !</p>
            </div>
        </div>  {{-- Edit profile avatar end --}}
        
        <h2>{{__('Персональная информация')}}</h2>
        {{-- Personal data form start --}}
        <form id="update_profile" action="/update_profile" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-container-inline">
                <label>{{__('Имя')}}<span class="required">*</span></label>
                <input type="text" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="input-container-inline">
                <label>{{__('Фамилия')}}<span class="required">*</span></label>
                <input type="text" name="surname" value="{{ $user->surname }}" required>
            </div>

            <div class="input-container-inline">
                <label>{{__('Отчество')}}</label>
                <input type="text" name="patronymic" value="{{ $user->patronymic }}">
             </div>

             <div class="input-container-inline">
                <label>Id</label>
                <input type="text" value="{{ $user->login_id }}" readonly>
             </div>

            <div class="input-container-inline">
                <label>{{__('День рождения')}}<span class="required">*</span></label>
                <input type="date" name="birth_date" value="{{ $user->birth_date }}" required>
            </div>

            <div class="input-container-inline">
                <label>{{__('Телефон')}}</label>
                <input type="text" name="phone" value="{{ $user->phone }}">
             </div>

            <div class="input-container-inline">
                <label>E-mail<span class="required">*</span></label>
                <input type="email" ''
                    name="email" 
                    value="{{ old('email') ? old('email') : $user->email }}" 
                    @error('email')
                        style="border-color: red"
                    @enderror
                    required
                >
                @error('email')
                    <p style="display: block" class="input-error password-error">Пользователь с таким email-ом уже существует</p>
                @enderror
            </div>

            <div class="input-container-inline">
                <label>{{__('Отдел')}}</label>
                <input type="text" value="{{ $user->department->name }}" readonly>
            </div>

            <div class="input-container-inline">
                <label>{{__('Позиция')}}</label>
                <input type="text" value="{{ $user->designation->name }}" readonly>
            </div>

            <div class="input-container-inline">
                <label>{{__('Должность')}}</label>
                <input type="text" value="{{ $user->position->name }}" readonly>
            </div>

            <div class="input-container-inline">
                <label>{{__('Знание языков')}}</label>
                <div class="select2_multiple_container">
                    <select name="languages[]" id="languages" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown" multiple>
                        @foreach ($languages as $language)
                            <option value="{{$language->id}}" 
                                @foreach($user->languages as $userLang)
                                    @if($userLang->id == $language->id) 
                                        selected
                                    @endif
                                @endforeach
                            >{{$language->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="input-container-inline">
                <label>{{__('Участвовал в проектах')}}</label>
                <div class="select2_multiple_container">
                    <select name="projects[]" id="projects" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown" multiple>
                        @foreach ($projects as $pr)
                            <option value="{{$pr->id}}" 
                                @foreach($user->projects as $user_pr)
                                    @if($user_pr->id == $pr->id) 
                                        selected
                                    @endif
                                @endforeach
                            >{{$pr->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="input-container-inline">
                <label>{{__('О себе')}}<span class="required">*</span></label>
                <textarea name="description" rows="5" required>{{ $user->description }}</textarea>
            </div>

            <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Обновить профиль</button>
        </form>  {{-- Personal data form end --}}

        <h2 class="title-seperator">{{__('Изменить пароль')}}</h2>
        {{-- Change password form start --}}
        <form id="update_password" onsubmit="ajax_edit_password()">
            @csrf
            <div class="input-container-inline">
                <label>{{__('Старый пароль')}}<span class="required">*</span></label>
                <div class="input-password-container">
                    <input type="password" name="password" id="password" required>
                    <span class="material-icons-outlined no-selection" id="password-btn" onclick="showHidePassword('password', 'password-btn')">visibility</span>
                </div>
                <p class="input-error password-error">{{__('Неправильный пароль')}}</p>
            </div>

            <div class="input-container-inline">
                <label>{{__('Новый пароль')}}<span class="required">*</span></label>
                <div class="input-password-container">
                    <input type="password" name="new-password" id="new-password" required>
                    <span class="material-icons-outlined no-selection" id="new-password-btn" onclick="showHidePassword('new-password', 'new-password-btn')">visibility</span>
                </div>
                <p class="input-error new-password-error">{{__('Пароли не совпадают')}}</p>
            </div>

            <div class="input-container-inline">
                <label>{{__('Подтвердите новый пароль')}}<span class="required">*</span></label>
                <div class="input-password-container">
                    <input type="password" name="confirm-password" id="confirm-password" required>
                    <span class="material-icons-outlined no-selection" id="confirm-password-btn" onclick="showHidePassword('confirm-password', 'confirm-password-btn')">visibility</span>
                </div>
                <p class="input-error confirm-password-error">{{__('Пароли не совпадают')}}</p>
            </div>

            <button class="main-btn" type="submit"><span class="material-icons">vpn_key</span> {{__('Обновить пароль')}}</button>

        </form>  {{-- Change password form end --}}

    </section>
    
<!-- Avatar change modal -->
<div class="modal fade avatar-modal" id="avaModal" tabindex="-1" aria-labelledby="avadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="avadModalLabel">{{__('Изменить фото')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update_avatar_modal" action="/update_avatar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar" accept="image/*" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="document.getElementById('update_avatar_modal').submit()" class="main-btn">{{__('Изменить')}}</button>
            </div>
      </div>
    </div>
</div>

@endsection