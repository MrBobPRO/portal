
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

@case('dashboard.ideas.single')
    <link href="{{ asset('css/dashboard/ideas/styles.css') }}" rel="stylesheet">
@break

@case('dashboard.galleries.create') @case('dashboard.galleries.single') 
    <link href="{{ asset('css/dashboard/entertainment/galleries/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone-5.7.0/dist/min/basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/dropzone-5.7.0/dist/min/dropzone.min.css') }}" rel="stylesheet">
@break

@endswitch