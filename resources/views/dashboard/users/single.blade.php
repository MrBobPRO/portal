
@extends('dashboard.templates.master')

@section('content')

    <section class="single-users-page formed-page">

      <img src="{{ asset('img/users/' . $user->avatar) }}">

      <h2>Персональная информация</h2>
      {{-- Personal data form start --}}
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
               <label>Языки</label>
               <div class="value-replacer">
                  @foreach ($user->languages as $lang)
                      {{$lang->name}}
                  @endforeach
               </div>
         </div>

         <div class="input-container-inline">
               <label>Описание</label>
               <div class="value-replacer">
                  {{ $user->description }}
               </div>
         </div>
            
            {{-- Personal data form end --}}

    </section>

@endsection