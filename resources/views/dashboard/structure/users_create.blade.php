
@extends('dashboard.templates.no_sidebar_master')

@section('content')

    <section class="single-users-page formed-page admin">

      <img src="{{ asset('img/users/default.jpg') }}">

      <h2>Персональная информация</h2>
      {{-- Personal data form start --}}
      <form id="update_profile" action="/dashboard/users_create" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="input-container-inline">
            <label for="name">Имя</label>
            <div class="value-replacer">
               <input 
                  id="name" 
                  name="name" 
                  type="text" 
                  placeholder="Имя" 
                  value="{{ old('name') ? old('name') : '' }}"
                  required
               >
            </div>
         </div>

         <div class="input-container-inline">
            <label for="surname">Фамилия</label>
            <div class="value-replacer">
               <input 
                  id="surname" 
                  name="surname" 
                  type="text" 
                  placeholder="Фамилия"
                  value="{{ old('surname') ? old('surname') : '' }}" 
                  required
               >
            </div>
         </div>

         <div class="input-container-inline">
            <label for="nickname">Ник</label>
            <div class="value-replacer" @error('nickname')style="border-color: red"@enderror>
               <input 
                  id="nickname" 
                  name="nickname" 
                  type="text"
                  placeholder="Ник" 
                  value="{{ old('nickname') ? old('nickname') : '' }}" 
                  required
               >
            </div>
            @error('nickname')
               <p style="display: block" class="input-error password-error">Пользователь с таким ником уже существует</p>
            @enderror
         </div>

         <div class="input-container-inline">
            <label for="birth_date">День рождения</label>
            <div class="value-replacer">
               <input 
                  id="birth_date" 
                  type="date" 
                  name="birth_date"
                  value="{{ old('birth_date') ? old('birth_date') : '' }}" 
                  required>
            </div>
         </div>

         <div class="input-container-inline">
            <label for="email">E-mail</label>
            <div class="value-replacer" @error('email')style="border-color: red"@enderror>
               <input 
                  id="email" 
                  name="email" 
                  type="text"
                  placeholder="Электронная почта"
                  value="{{ old('email') ? old('email') : '' }}" 
                  required>
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
                  <select 
                     name="department_id" 
                     class="select2_single" 
                     data-placeholder="Отдел" 
                     data-dropdown-css-class="select2_single_dropdown"
                  >
                     <option></option>
                     <?php $oldDep = old('department_id'); ?>
                     @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{$oldDep == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>   
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
                  <select 
                     name="designation_id" 
                     class="select2_single" 
                     data-placeholder="Позиция" 
                     data-dropdown-css-class="select2_single_dropdown"
                  >
                  <?php $oldDes = old('designation_id'); ?>
                     <option></option>
                     @foreach($designations as $designation)
                        <option value="{{ $designation->id }}" {{$oldDes == $designation->id ? 'selected' : ''}}>{{ $designation->name }}</option>   
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
                  <select 
                     name="position_id" 
                     class="select2_single" 
                     data-placeholder="Должность" 
                     data-dropdown-css-class="select2_single_dropdown"
                  >
                  <?php $oldPos = old('position_id'); ?>
                     <option></option>
                     @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{$oldPos == $position->id ? 'selected' : ''}}>{{ $position->name }}</option>   
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
                  <select 
                     name="languages[]" 
                     id="languages" 
                     class="select2_multiple" 
                     data-placeholder="Языки" 
                     data-dropdown-css-class="select2_multiple_dropdown" 
                     multiple required
                  >
                     <option></option>
                     <?php 
                        if(old('languages')) $oldLang = old('languages'); 
                        else $oldLang = ['-1,0'];
                     ?>
                     @foreach ($languages as $language)
                        <option value="{{$language->id}}"
                           @if(in_array($language->id, $oldLang)) selected @endif
                           >{{$language->name}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
         </div>

         <div class="input-container-inline">
            <label for="description">Описание</label>
            <div class="value-replacer value-replacer-text">
               <textarea 
                  id="description" 
                  name="description" 
                  rows="5" 
                  placeholder="Описание"
                  required>{{ old('description') ? old('description') : '' }}</textarea>
            </div>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> Добавить сотрудника</button>

      </form>
            
            {{-- Personal data form end --}}

    </section>

@endsection