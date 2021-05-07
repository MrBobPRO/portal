@extends('dashboard.templates.master')

@section('content')

<section class="single-complaints-page formed-page">

   <div class="input-container-inline">
      <label>Заголовок</label>
      <div class="value-replacer">
         {{ $complaint->title }}
      </div>
   </div>

   <div class="input-container-inline">
      <label>Текст</label>
      <div class="value-replacer">
         {{ $complaint->text }}
      </div>
   </div>

   @if($complaint->file != '')
      <div class="input-container-inline">
         <label>
            <form action="/complaints/download" method="POST" class="inlined-form-inside-label">
               @csrf
               <input type="hidden" name="file" value="{{$complaint->file}}">
               <button type="submit">Скачать прикреплённый файл</button>
            </form>
         </label>
         <div class="value-replacer">
            {{ $complaint->file }}
         </div>
      </div>
   @endif

   <div class="input-container-inline">
      <label>Дата</label>
      <div class="value-replacer">
         <?php 
            $date = \Carbon\Carbon::parse($complaint->created_at)->locale('ru');
            $formatted = $date->isoFormat('DD MMMM YYYY');
         ?>
         {{ $formatted }}
      </div>
   </div>

</section>

@endsection