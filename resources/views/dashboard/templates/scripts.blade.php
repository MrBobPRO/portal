
@switch($route)

@case('dashboard.profile.index') 
    <script src="{{ asset('js/dashboard/profile/scripts.js') }}"></script>
@break

@case('dashboard.settings.index') 
    <script src="{{ asset('js/dashboard/settings/scripts.js') }}"></script>
@break

@case('dashboard.news.create') @case('dashboard.news.single') 
    <script src="{{ asset('js/dashboard/news/scripts.js') }}"></script>
@break

@case('dashboard.videos.create') @case('dashboard.videos.single') 
    <script src="{{ asset('js/dashboard/entertainment/videos/scripts.js') }}"></script>
@break

@endswitch