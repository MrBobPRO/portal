
@extends('dashboard.templates.master')

@section('content')

    <section class="single-users-page formed-page admin">

      <img src="{{ asset('img/users/' . $user->avatar) }}">

      <h2>Персональная информация</h2>
      {{-- Personal data form start --}}
      <form id="update_profile" action="/update_employee_profile" method="POST" enctype="multipart/form-data">
         @csrf
         <input name="user_id" type="hidden" value="{{ $user->id }}">
         <div class="input-container-inline">
            <label for="name">Имя</label>
            <div class="value-replacer">
               <input id="name" name="name" type="text" value="{{ $user->name }}" required>
            </div>
         </div>

         <div class="input-container-inline">
            <label for="surname">Фамилия</label>
            <div class="value-replacer">
               <input id="surname" name="surname" type="text" value="{{ $user->surname }}" required>
            </div>
         </div>

         <div class="input-container-inline">
            <label for="birth_date">День рождения</label>
            <div class="value-replacer">
               <input type="date" name="birth_date" value="{{ $user->birth_date }}" required>
            </div>
         </div>

         <div class="input-container-inline">
            <label for="email">E-mail</label>
            <div class="value-replacer" @error('email')style="border-color: red"@enderror>
               <input id="email" name="email" type="text" value="{{ old('email') ? old('email') : $user->email }}" required>
            </div>
            @error('email')
               <p style="display: block" class="input-error password-error">Пользователь с таким email-ом уже существует</p>
            @enderror
         </div>

         <div class="input-container-inline">
            <label for="dep-name">Отдел</label>
            <div class="value-replacer value-replacer-department">
               {{-- department start --}}
               <div class="department select2_single_container">
                  <select name="department_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                     @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{$user->department_id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>   
                     @endforeach
                  </select>
               </div>
               {{-- department end --}}
            </div>
         </div>

         <div class="input-container-inline">
            <label for="designation">Позиция</label>
            <div class="value-replacer value-replacer-designation">
               {{-- designation start --}}
               <div class="designation select2_single_container">
                  <select name="designation_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                     @foreach($designations as $designation)
                        <option value="{{ $designation->id }}" {{$user->designation_id == $designation->id ? 'selected' : ''}}>{{ $designation->name }}</option>   
                     @endforeach
                  </select>
               </div>
               {{-- designation end --}}
            </div>
         </div>

         <div class="input-container-inline">
            <label for="position">Должность</label>
            <div class="value-replacer value-replacer-position">
               {{-- position start --}}
               <div class="position select2_single_container">
                  <select name="position_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
                     @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{$user->position_id == $position->id ? 'selected' : ''}}>{{ $position->name }}</option>   
                     @endforeach
                  </select>
               </div>
               {{-- position end --}}
               {{-- <input id="position" type="text" value="{{ $user->position->name }}" required> --}}
            </div>
         </div>

         <div class="input-container-inline">
            <label for="languages">Языки</label>
            <div class="value-replacer value-replacer-lang">
               <div class="select2_multiple_container">
                  <select name="languages[]" id="languages" class="select2_multiple" data-dropdown-css-class="select2_multiple_dropdown" multiple required>
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
         </div>

         <div class="input-container-inline">
            <label for="description">Описание</label>
            <div class="value-replacer value-replacer-text">
               <textarea id="description" name="description" rows="5" required>{{ $user->description }}</textarea>
            </div>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Обновить профиль</button>

      </form>
            
            {{-- Personal data form end --}}

    </section>

@endsection