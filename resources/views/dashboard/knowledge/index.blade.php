@extends('dashboard.templates.no_sidebar_master')

@section('content')

    <section class="knowledge-page">

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

    <section class="knowledge-page">
        <div class="main-container" id="accordionSubject">
            @foreach ($subjects as $subject)
                {{-- Main accordion item start --}}
                <div class="subject accordion-item">
                    <h2 class="subject accordion-header" id="heading{{ $subject->name }}">
                    <button class="subject accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $subject->name }}" aria-expanded="true"
                        aria-controls="collapse{{ $subject->name }}">
                        {{ __($subject->name) }}

                        <span class="material-icons-outlined">expand_more</span>
                    </button>
                    </h2>
                    {{-- Main accordion item BODY start --}}
                    <div id="collapse{{ $subject->name }}" class="subject accordion-collapse collapse"
                    aria-labelledby="heading{{ $subject->name }}" data-bs-parent="#accordionSubject">
                    <div class="subject accordion-body">
                        {{-- Inner Accordion start  --}}
                        <div class="accordion" id="accordion{{ $subject->name }}">
                            @foreach ($subjectcats as $subjectcat)
                                @if ($subjectcat->subject_id == $subject->id)
                                {{-- Inner Accordion Item start  --}}
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $subjectcat->id }}">
                                    <button class="subjectcat accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $subjectcat->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $subjectcat->id }}">
                                        {{ __($subjectcat->name) }}

                                        <span class="material-icons-outlined">expand_more</span>
                                    </button>
                                </h2>
                                {{-- Inner Accordion Item BODY start --}}
                                <div id="collapse{{ $subjectcat->id }}" class="subjectcat accordion-collapse collapse"
                                    aria-labelledby="heading{{ $subjectcat->id }}" data-bs-parent="#accordion{{ $subject->name }}">
                                    <div class="subjectcat accordion-body">
                                        {{-- Materials list start --}}
                                        <ul class="mat-list">
                                            @foreach ($materials as $material)
                                            @if ($material->subjectcat_id == $subjectcat->id)
                                                <li class="mat-items">
                                                    @if ($material->type == 'book')
                                                        <a href="{{route('dashboard.knowledge.books.category')}}?material={{$material->id}}&category={{$material->category}}">
                                                            <span class="material-icons-outlined">auto_stories</span>
                                                            {{ __($material->name) }} 
                                                        </a>
                                                        
                                                    @elseif ($material->type == 'video')
                                                        <a href="{{route('dashboard.knowledge.videos.category')}}?material={{$material->id}}&category={{$material->category}}">
                                                            <span class="material-icons-outlined">videocam</span>
                                                            {{__($material->name)}}
                                                        </a>
                                                    @endif
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>  {{-- Materials list end --}}
                                    </div>
                                </div>  {{-- Inner Accordion Item BODY end --}}
                                </div>  {{-- Inner Accordion Item end  --}}
                                @endif
                            @endforeach
                        </div>  {{-- Inner Accordion end  --}}  
                    </div>
                    </div>  {{-- Main accordion item BODY end --}}
                </div>  {{-- Main accordion item end --}}
            @endforeach
        </div>
    </section>

@endsection