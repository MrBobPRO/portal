@extends('dashboard.templates.no_sidebar_master')
@section('content')

<section class="translate-index-page">

     <div class="primary-list">
        <a class="primary-list-item" href="{{ route('dashboard.translate.single', 1) }}">
            <div class="width-100">{{ __('Русский-Английский') }}</div>
        </a>
        <a class="primary-list-item" href="{{ route('dashboard.translate.single', 2) }}">
            <div class="width-100">{{ __('Русский-Таджикский') }}</div>
        </a>
     </div>
    
</section>

@endsection