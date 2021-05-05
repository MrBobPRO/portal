
@switch($route)
    
    @case('home.index')
        {{-- Owl Carousel --}}
        <link href="{{ asset('css/home/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/owl.theme.default.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/media.css') }}" rel="stylesheet">
    @break
    
    @case('about.index') @case('about.whoweare') @case('about.structure') @case('about.leadership')
        <link href="{{ asset('css/about/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about/media.css') }}" rel="stylesheet">
    @break
    
    @case('news.index') @case('news.single') @case('news.inner') @case('news.global')
        <link href="{{ asset('css/news/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/news/media.css') }}" rel="stylesheet">
    @break

    @case('entertainment.index')  
        <link href="{{ asset('css/entertainment/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/entertainment/media.css') }}" rel="stylesheet">
    @break

    @case('entertainment.videos.index') 
        {{-- Plyr video player --}}
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />

        <link href="{{ asset('css/entertainment/videos/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/entertainment/videos/media.css') }}" rel="stylesheet">
    @break

    @case('entertainment.gallery.index') @case('entertainment.gallery.single')
        {{-- Gallery --}}
        <link rel="stylesheet" href="{{ asset('css/entertainment/gallery/lc_lightbox.css') }}">
        <!-- Gallery themes -->
        <link rel="stylesheet" href="{{ asset('css/entertainment/gallery/minimal.css') }}">

        <link href="{{ asset('css/entertainment/gallery/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/entertainment/gallery/media.css') }}" rel="stylesheet">
    @break

    @case('projects.index') @case('projects.single') @case('projects.completed') @case('projects.ongoing')
        <link href="{{ asset('css/projects/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/projects/media.css') }}" rel="stylesheet">
    @break

    @case('knowledge.index') @case('knowledge.books.index')
        <link href="{{ asset('css/knowledge/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/knowledge/media.css') }}" rel="stylesheet">
    @break

    @case('knowledge.videos.index')
        {{-- Plyr video player --}}
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />
        <link href="{{ asset('css/knowledge/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/knowledge/media.css') }}" rel="stylesheet">
    @break

@endswitch