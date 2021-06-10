
@switch($route)

    {{--------------- User routes start ---------------}}
    @case('dashboard.profile.index') 
        <script src="{{ asset('js/dashboard/profile/scripts.js') }}"></script>
    @break

    @case('dashboard.settings.index') 
        <script src="{{ asset('js/dashboard/settings/scripts.js') }}"></script>
    @break

    @case('dashboard.ideas.single') 
        <script src="{{ asset('js/dashboard/ideas/scripts.js') }}"></script>
    @break
    {{--------------- User routes end ---------------}}


    {{--------------- Admin routes start ---------------}}
    @case('dashboard.slider.single') @case('dashboard.slider.create')
        {{-- Spectrum colorPicker --}}
        <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
        
        <script src="{{ asset('js/dashboard/slider/scripts.js') }}"></script>
    @break

    @case('dashboard.knowledge.videos.create') @case('dashboard.knowledge.videos.single')
        <script src="{{ asset('js/dashboard/knowledge/scripts.js') }}"></script>
    @break

    @case('dashboard.news.create') @case('dashboard.news.single') 
        <script src="{{ asset('js/dashboard/news/scripts.js') }}"></script>
    @break

    @case('dashboard.projects.create') @case('dashboard.projects.single') 
        <script src="{{ asset('js/dashboard/projects/scripts.js') }}"></script>
    @break

    @case('dashboard.videos.create') @case('dashboard.videos.single') 
        <script src="{{ asset('js/dashboard/entertainment/videos/scripts.js') }}"></script>
    @break

    @case('dashboard.galleries.create') @case('dashboard.galleries.single') 
        {{-- Dropzone 5.7.0 --}}
        <script src="{{ asset('js/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>
        
        <script src="{{ asset('js/dashboard/entertainment/galleries/scripts.js') }}"></script>
    @break
    {{--------------- Admin routes end ---------------}}

@case('dashboard.translate.index') 
    <script src="{{ asset('js/dashboard/translate/scripts.js') }}"></script>
@break

@case('dashboard.translate.single')
    <script src="{{ asset('js/dashboard/translate/jquery.json-viewer.js') }}"></script>
    <script src="{{ asset('js/dashboard/translate/jquery.json-editor.js') }}"></script>
    <script src="{{ asset('js/dashboard/translate/scripts.js') }}"></script>
@break

@endswitch