
@switch($route)

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

@case('dashboard.questionnaire.single')
    <link href="{{ asset('css/dashboard/questionnaire/styles.css') }}" rel="stylesheet">
@break

@case('dashboard.ideas.single')
    <link href="{{ asset('css/dashboard/ideas/styles.css') }}" rel="stylesheet">
@break

@case('dashboard.slider.single') @case('dashboard.slider.create')
    {{-- Spectrum colorPicker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
@break

@case('dashboard.galleries.create') @case('dashboard.galleries.single') 
    <link href="{{ asset('css/dashboard/entertainment/galleries/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone-5.7.0/dist/min/basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone-5.7.0/dist/min/dropzone.min.css') }}" rel="stylesheet">
@break

@case('dashboard.knowledge.index') @case('dashboard.knowledge.create') 
    <link href="{{ asset('css/dashboard/knowledge/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/knowledge/media.css') }}" rel="stylesheet">
@break

@endswitch