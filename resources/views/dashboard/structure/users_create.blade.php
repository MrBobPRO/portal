
@extends('dashboard.templates.no_sidebar_master')

@section('content')

    <section class="structure-user-create formed-page">

      <img src="{{ asset('img/users/default.png') }}">

      <h2>{{__('Персональная информация')}}</h2>
      {{-- Personal data form start --}}
      <form id="update_profile" action="/store_user" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="input-container-inline">
            <label for="name">{{__('Имя')}}<span class="required">*</span></label>
            <input 
               id="name" 
               name="name" 
               type="text" 
               placeholder="{{__('Имя')}}" 
               value="{{ old('name') ? old('name') : '' }}"
               required
            >
         </div>

         <div class="input-container-inline">
            <label for="surname">{{__('Фамилия')}}<span class="required">*</span></label>
            <input 
               id="surname" 
               name="surname" 
               type="text" 
               placeholder="{{__('Фамилия')}}"
               value="{{ old('surname') ? old('surname') : '' }}" 
               required
            >
         </div>

         <div class="input-container-inline">
            <label for="nickname">{{__('Ник')}}<span class="required">*</span>. {{__('Вступает в качестве логина')}}!</label>
            <input 
               id="nickname" 
               name="nickname" 
               type="text"
               placeholder="{{__('Ник')}}" 
               value="{{ old('nickname') ? old('nickname') : '' }}" 
               required
               @error('nickname')style="border-color: red"@enderror
            >
            @error('nickname')
               <p style="display: block" class="input-error password-error">{{__('Пользователь с таким ником уже существует')}}</p>
            @enderror
         </div>

         <div class="input-container-inline">
            <label for="birth_date">{{__('День рождения')}}<span class="required">*</span></label>
            <input 
               id="birth_date" 
               type="date" 
               name="birth_date"
               value="{{ old('birth_date') ? old('birth_date') : '' }}" 
               required
            >
         </div>

         <div class="input-container-inline">
            <label for="email">E-mail<span class="required">*</span>. {{__('На эту почту будет отправлено')}}<br> {{__('письмо с логином и паролем пользователя')}}!</label>
            <input 
               id="email" 
               name="email" 
               type="text"
               placeholder="{{__('Электронная почта')}}"
               value="{{ old('email') ? old('email') : '' }}" 
               required
               @error('email')style="border-color: red"@enderror
            >
            @error('email')
               <p style="display: block" class="input-error password-error">{{_('Пользователь с таким email-ом уже существует')}}</p>
            @enderror
         </div>

         <div class="input-container-inline">
            <label for="dep-name">{{__('Отдел')}}<span class="required">*</span></label>
            {{-- department start --}}
            <div class="department select2_single_container">
               <select 
                  name="department_id" 
                  class="select2_single" 
                  data-placeholder="{{__('Отдел')}}" 
                  data-dropdown-css-class="select2_single_dropdown"
                  required
               >
                  <option></option>
                  <?php $oldDep = old('department_id'); ?>
                  @foreach($departments as $department)
                     <option value="{{ $department->id }}" {{$oldDep == $department->id ? 'selected' : ''}}>{{ __($department->name) }}</option>   
                  @endforeach
               </select>
            </div>
            {{-- department end --}}
         </div>

         <div class="input-container-inline">
            <label for="designation">{{__('Позиция')}}<span class="required">*</span></label>
            {{-- designation start --}}
            <div class="designation select2_single_container">
               <select 
                  name="designation_id" 
                  class="select2_single" 
                  data-placeholder="{{__('Позиция')}}" 
                  data-dropdown-css-class="select2_single_dropdown"
                  required
               >
               <?php $oldDes = old('designation_id'); ?>
                  <option></option>
                  @foreach($designations as $designation)
                     <option value="{{ $designation->id }}" {{$oldDes == $designation->id ? 'selected' : ''}}>{{ __($designation->name) }}</option>   
                  @endforeach
               </select>
            </div>
            {{-- designation end --}}
         </div>

         <div class="input-container-inline">
            <label for="position">{{__('Должность')}}<span class="required">*</span></label>
            {{-- position start --}}
            <div class="position select2_single_container">
               <select 
                  name="position_id" 
                  class="select2_single" 
                  data-placeholder="{{__('Должность')}}" 
                  data-dropdown-css-class="select2_single_dropdown"
                  required
               >
               <?php $oldPos = old('position_id'); ?>
                  <option></option>
                  @foreach($positions as $position)
                     <option value="{{ $position->id }}" {{$oldPos == $position->id ? 'selected' : ''}}>{{ __($position->name) }}</option>   
                  @endforeach
               </select>
            </div>
            {{-- position end --}}
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">add</span> {{__('Добавить сотрудника')}}</button>

      </form> {{-- Personal data form end --}}

    </section>

@endsection