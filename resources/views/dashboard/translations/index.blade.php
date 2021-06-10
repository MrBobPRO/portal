@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="translate-index-page">

     <div class="primary-list">
        <a class="primary-list-item" href="{{ route('dashboard.translations.single', 1) }}">
            <div class="width-100">{{ __('Английский перевод') }}</div>
        </a>
        <a class="primary-list-item" href="{{ route('dashboard.translations.single', 2) }}">
            <div class="width-100">{{ __('Таджикский перевод') }}</div>
        </a>
     </div>
    
</section>

@endsection