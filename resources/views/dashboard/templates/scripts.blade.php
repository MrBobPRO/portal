
@switch($route)

@case('dashboard.profile.index') 
    <script src="{{ asset('js/dashboard/profile/scripts.js') }}"></script>
@break

@case('dashboard.settings.index') 
    <script src="{{ asset('js/dashboard/settings/scripts.js') }}"></script>
@break

@case('dashboard.ideas.single') 
    <script src="{{ asset('js/dashboard/ideas/scripts.js') }}"></script>
@break

@case('dashboard.news.create') @case('dashboard.news.single') 
    <script src="{{ asset('js/dashboard/news/scripts.js') }}"></script>
@break

@case('dashboard.videos.create') @case('dashboard.videos.single') 
    <script src="{{ asset('js/dashboard/entertainment/videos/scripts.js') }}"></script>
@break

@case('dashboard.projects.create') @case('dashboard.projects.single') 
    <script src="{{ asset('js/dashboard/projects/scripts.js') }}"></script>
@break

@case('dashboard.galleries.create') @case('dashboard.galleries.single') 
    <script src="{{ asset('js/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/entertainment/galleries/scripts.js') }}"></script>
@break

@endswitch