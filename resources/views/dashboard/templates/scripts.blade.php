
@switch($route)

@case('dashboard.profile.index') 
    <script src="{{ asset('js/dashboard/profile/scripts.js') }}"></script>
@break

@case('dashboard.settings.index') 
    <script src="{{ asset('js/dashboard/settings/scripts.js') }}"></script>
@break

@endswitch