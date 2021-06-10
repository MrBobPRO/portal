@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="translate-single-page">
    <pre id="json-display"></pre>

    <form id="translate_form" method="POST" action="/dashboard/translate">
        @csrf
        <input name="lang" type="hidden" value="{{$lang}}">
        <textarea name="translations" class="visually-hidden" id="json-input" autocomplete="off">{{$file}}</textarea>
        <button class="main-btn" type="submit"><span class="material-icons-outlined">edit</span> Сохранить изменения</button>
    </form>
    
</section>

@endsection