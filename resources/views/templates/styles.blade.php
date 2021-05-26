
@switch($route)
    
    @case('home.index')
        {{-- Owl Carousel --}}
        <link href="{{ asset('js/owl_carousel2-2.3.4/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/owl_carousel2-2.3.4/assets/owl.theme.default.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/media.css') }}" rel="stylesheet">
    @break
    
    @case('structure.index')  
        <link href="{{ asset('css/structure/styles.css') }}" rel="stylesheet">
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

    @case('ideas.create')
        {{-- Simditor v2.3.28 --}}
        <link href="{{ asset('js/simditor/styles/simditor.css') }}" rel="stylesheet">
        {{-- Dashboard styles linked because of list & form styles --}}
        <link href="{{ asset('css/dashboard/main/styles.css') }}" rel="stylesheet">
    @break

    @case('complaints.create')
        {{-- Dashboard styles linked because of list & form styles --}}
        <link href="{{ asset('css/dashboard/main/styles.css') }}" rel="stylesheet">
    @break

    @case('notifications.index') @case('notifications.single')
        {{-- Dashboard styles linked because of list & form styles --}}
        <link href="{{ asset('css/dashboard/main/styles.css') }}" rel="stylesheet">
    @break

@endswitch