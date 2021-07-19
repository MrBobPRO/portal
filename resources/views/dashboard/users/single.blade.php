@extends('dashboard.templates.master')

@section('content')

<section class="single-users-page formed-page">

   <img src="{{ asset('img/users/' . $user->avatar) }}">
   <h2>Персональная информация</h2>

   <div class="input-container-inline">
      <label>Имя</label>
      <div class="value-replacer">
         {{ $user->name }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Фамилия</label>
      <div class="value-replacer">
         {{ $user->surname }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>{{__('Отчество')}}</label>
      <input type="text" name="patronymic" value="{{ $user->patronymic }}">
   </div>

   <div class="input-container-inline">
      <label>День рождения</label>
      <div class="value-replacer">
         <?php 
               $date = \Carbon\Carbon::parse($user->birth_date)->locale('ru');
               $formatted = $date->isoFormat('DD MMMM YYYY');
            ?>
         {{ $formatted }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>{{__('Телефон')}}</label>
      <input type="text" name="phone" value="{{ $user->phone }}">
   </div>

   <div class="input-container-inline">
      <label>E-mail</label>
      <div class="value-replacer">
         {{ $user->email }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Отдел</label>
      <div class="value-replacer">
         {{ $user->department->name }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Позиция</label>
      <div class="value-replacer">
         {{ $user->designation->name }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Должность</label>
      <div class="value-replacer">
         {{ $user->position->name }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Знание языков</label>
      <div class="value-replacer">
         <?php $langName = App::currentLocale() . 'Name'; ?>
         @foreach ($user->languages as $lang)
            {{$lang[$langName]}}
         @endforeach
      </div>
   </div>

   <div class="input-container-inline">
      <label>Описание</label>
      <div class="value-replacer">
         {{ $user->description }}
      </div>
   </div>

</section>

@endsection