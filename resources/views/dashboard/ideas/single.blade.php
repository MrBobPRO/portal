@extends('dashboard.templates.master')

@section('content')

<section class="single-ideas-page formed-page">

   <div class="input-container-inline">
      <label>Заголовок</label>
      <div class="value-replacer">
         {{ $idea->title }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Текст</label>
      <div class="value-replacer">
         {{ $idea->text }}
      </div>
   </div>

   @if($idea->file != '')
      <div class="input-container-inline">
         <label>
            <form action="/ideas/download" method="POST" class="inlined-form-inside-label">
               @csrf
               <input type="hidden" name="file" value="{{$idea->file}}">
               <button type="submit">Скачать прикреплённый файл</button>
            </form>
         </label>
         <div class="value-replacer">
            {{ $idea->file }}
         </div>
      </div>
   @endif

   <div class="input-container-inline">
      <label>Дата</label>
      <div class="value-replacer">
         <?php 
            $date = \Carbon\Carbon::parse($idea->created_at)->locale('ru');
            $formatted = $date->isoFormat('DD MMMM YYYY');
         ?>
         {{ $formatted }}
      </div>
   </div>

</section>

@endsection