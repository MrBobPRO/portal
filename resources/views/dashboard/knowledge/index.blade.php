@extends('dashboard.templates.no_sidebar_master')

@section('content')

    <section class="knowledge-page">

        <a class="add-button" href="{{route('dashboard.knowledge.create')}}"><span class="material-icons-outlined">add</span></a>
        
        <div class="primary-list-titles">
            <div class="width-50">{{ __('Заголовок') }}</div>
            <div class="width-50">{{ __('Количество') }}</div>
         </div>
   
         <div class="primary-list">
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.books') }}">
                <div class="width-50">{{ __('Книги') }}</div>
                <div class="width-50 admin-edit-btn">
                    {{ $booksCount }}
                    <span class="material-icons-outlined">visibility</span>
                </div>
            </a>
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.videos') }}">
                <div class="width-50">{{ __('Видео') }}</div>
                <div class="width-50 admin-edit-btn">
                    {{ $videosCount }}
                    <span class="material-icons-outlined">visibility</span>
                </div>
            </a>
            <a class="primary-list-item" href="#">
                <div class="width-50">{{ __('Тесты') }}</div>
                <div class="width-50 admin-edit-btn">
                    0
                    <span class="material-icons-outlined">visibility</span>
                </div>
            </a>
         </div>

    </section>

@endsection