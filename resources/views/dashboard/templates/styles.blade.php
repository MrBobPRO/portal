
@switch($route)

    {{--------------- User routes start ---------------}}
    @case('dashboard.profile.index') 
        <link href="{{ asset('css/dashboard/profile/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/profile/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.settings.index') 
        <link href="{{ asset('css/dashboard/settings/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/settings/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.users.index') @case('dashboard.users.single') 
        <link href="{{ asset('css/dashboard/users/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/users/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.ideas.single')
        <link href="{{ asset('css/dashboard/ideas/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/ideas/media.css') }}" rel="stylesheet">
    @break
    {{--------------- User routes end ---------------}}


    {{--------------- Admin routes start ---------------}}
    @case('dashboard.questionnaire.single')
        <link href="{{ asset('css/dashboard/questionnaire/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/questionnaire/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.slider.single') @case('dashboard.slider.create')
        {{-- Spectrum colorPicker --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
    @break

    @case('dashboard.structure.index') @case('dashboard.structure.users.update') @case('dashboard.structure.users.create') @case('dashboard.structure.departments.index') @case('dashboard.structure.designations.index') @case('dashboard.structure.positions.index')
        <link href="{{ asset('css/dashboard/structure/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/structure/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.knowledge.create')  
    @case('dashboard.knowledge.books.single')  
    @case('dashboard.knowledge.books.create')  
    @case('dashboard.knowledge.videos.single')  
    @case('dashboard.knowledge.videos.create')  
        <link href="{{ asset('css/dashboard/knowledge/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/knowledge/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.videos.create') @case('dashboard.videos.single') 
        <link href="{{ asset('css/dashboard/entertainment/videos/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/entertainment/videos/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.galleries.create') @case('dashboard.galleries.single') 
        {{-- Dropzone 5.7.0 --}}
        <link href="{{ asset('js/dropzone-5.7.0/dist/min/basic.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/dropzone-5.7.0/dist/min/dropzone.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/dashboard/entertainment/galleries/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard/entertainment/galleries/media.css') }}" rel="stylesheet">
    @break

    @case('dashboard.translations.single')
        <link rel="stylesheet" href="{{ asset('css/dashboard/translations/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/translations/media.css') }}">
        {{-- Json-viewer --}}
        <link rel="stylesheet" href="{{ asset('css/dashboard/translations/jquery.json-viewer.css') }}">
    @break
    {{--------------- Admin routes end ---------------}}


@endswitch