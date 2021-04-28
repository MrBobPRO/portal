
@switch($route)

@case('dashboard.profile.index') 
    <link href="{{ asset('css/dashboard/profile/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/profile/media.css') }}" rel="stylesheet">
@break

@endswitch