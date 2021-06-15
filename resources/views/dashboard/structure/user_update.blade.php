
@extends('dashboard.templates.master')

@section('content')

<section class="structure-user-update formed-page">

   <img src="{{ asset('img/users/' . $user->avatar) }}">

   <h2>{{__('Персональная информация')}}</h2>
   {{-- Personal data form start --}}
   <form id="update_profile" action="/update_user" method="POST" enctype="multipart/form-data">
      @csrf
      <input name="user_id" type="hidden" value="{{ $user->id }}">
      <div class="input-container-inline">
         <label for="name">{{__('Имя')}}<span class="required">*</span></label>
         <input id="name" name="name" type="text" value="{{ $user->name }}" required>
      </div>

      <div class="input-container-inline">
         <label for="surname">{{__('Фамилия')}}<span class="required">*</span></label>
         <input id="surname" name="surname" type="text" value="{{ $user->surname }}" required>
      </div>

      <div class="input-container-inline">
         <label for="nickname">{{__('Ник')}}<span class="required">*</span></label>
         <input id="nickname" @error('nickname')style="border-color: red"@enderror name="nickname" type="text" value="{{ old('nickname') ? old('nickname') : $user->nickname }}" required>
         @error('nickname')
            <p style="display: block" class="input-error password-error">{{__('Пользователь с таким ником уже существует')}}</p>
         @enderror
      </div>

      <div class="input-container-inline">
         <label for="birth_date">{{__('День рождения')}}<span class="required">*</span></label>
         <input type="date" name="birth_date" value="{{ $user->birth_date }}" required>
      </div>

      <div class="input-container-inline">
         <label for="email">E-mail<span class="required">*</span></label>
         <input id="email" @error('email')style="border-color: red"@enderror name="email" type="text" value="{{ old('email') ? old('email') : $user->email }}" required>
         @error('email')
            <p style="display: block" class="input-error password-error">{{__('Пользователь с таким email-ом уже существует')}}</p>
         @enderror
      </div>

      <div class="input-container-inline">
         <label for="dep-name">{{__('Отдел')}}<span class="required">*</span></label>
         {{-- department start --}}
         <div class="select2_single_container">
            <select name="department_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
               @foreach($departments as $department)
                  <option value="{{ $department->id }}" {{$user->department_id == $department->id ? 'selected' : ''}}>{{ __($department->name) }}</option>   
               @endforeach
            </select>
         </div>
         {{-- department end --}}
      </div>

      <div class="input-container-inline">
         <label for="designation">{{__('Позиция')}}<span class="required">*</span></label>
         {{-- designation start --}}
         <div class="designation select2_single_container">
            <select name="designation_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
               @foreach($designations as $designation)
                  <option value="{{ $designation->id }}" {{$user->designation_id == $designation->id ? 'selected' : ''}}>{{ __($designation->name) }}</option>   
               @endforeach
            </select>
         </div>
         {{-- designation end --}}
      </div>

      <div class="input-container-inline">
         <label for="position">{{__('Должность')}}<span class="required">*</span></label>
         {{-- position start --}}
         <div class="position select2_single_container">
            <select name="position_id" class="select2_single" data-dropdown-css-class="select2_single_dropdown">
               @foreach($positions as $position)
                  <option value="{{ $position->id }}" {{$user->position_id == $position->id ? 'selected' : ''}}>{{ __($position->name) }}</option>   
               @endforeach
            </select>
         </div>
         {{-- position end --}}
      </div>

      <div class="input-container-inline">
         <label for="languages">{{__('Знание языков')}}</label>
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
         <label for="description">{{__('Описание')}}<span class="required">*</span></label>
         <textarea id="description" name="description" rows="5" required>{{ $user->description }}</textarea>
      </div>

      <div class="spaced-btw-btns">
         <button class="main-btn delete-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="material-icons-outlined">delete</span> {{__('Удалить')}}</button>
         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> {{__('Обновить профиль')}}</button>
      </div>

   </form>{{-- Personal data form end --}}

</section>

<!-- Delete Modal start-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteModal">{{__('Удалить')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            {{__('Вы уверены что хотите удалить?')}}
         </div>
         <div class="modal-footer">
            <button type="button" class="main-btn" data-bs-dismiss="modal">{{__('Отмена')}}</button>

            <form action="/remove_user" method="POST">
               {{ csrf_field() }}
               <input type="hidden" value="{{ $user->id }}" name="id"/>
               <button type="submit" class="main-btn delete-btn">{{__('Удалить')}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal end-->

@endsection