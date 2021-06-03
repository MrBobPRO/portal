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
                <div class="width-50">{{ App\Models\Book::count() }}</div>
            </a>
            <a class="primary-list-item" href="{{ route('dashboard.knowledge.videos') }}">
                <div class="width-50">{{ __('Видео') }}</div>
                <div class="width-50">{{ App\Models\Video::count() }}</div>
            </a>
            <a class="primary-list-item" href="#">
                <div class="width-50">{{ __('Тесты') }}</div>
                <div class="width-50">0</div>
            </a>
         </div>

    </section>

@endsection