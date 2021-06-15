@extends('dashboard.templates.no_sidebar_master')

@section('content')

   <section class="questionnaire-page formed-page">
      <form action="/store_questionnaire" method="POST" enctype="multipart/form-data">

         @csrf
         <div class="input-container-inline">
            <label>{{__('Текст')}}</label>
            <textarea name="text" rows="5" required></textarea>
         </div>

         <div class="input-container-inline">
            <label>{{__('Приватность')}}</label>

            <div class="checkbox-container">
               <input type="checkbox" id="private" name="private" value="1">
               <label class="no-selection" for="private">{{__('Приватный опрос')}}</label>
            </div>
         </div>

         <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Добавить</button>
     </form>
   </section>

@endsection