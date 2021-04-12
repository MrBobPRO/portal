
@switch($route)
    
    @case('home.index')
        <link href="{{ asset('css/home/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/media.css') }}" rel="stylesheet">
    @break
    
    @case('about.index') @case('about.aboutus') @case('about.structure') @case('about.leadership')
        <link href="{{ asset('css/about/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about/media.css') }}" rel="stylesheet">
    @break
    
    @case('news.index') @case('news.companynews') @case('news.worldnews') @case('news.shownews')
        <link href="{{ asset('css/news/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/news/media.css') }}" rel="stylesheet">
    @break

    @case('entertainment.index')
        <link href="{{ asset('css/entertainment/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/entertainment/media.css') }}" rel="stylesheet">
    @break

    @case('projects.index') @case('projects.showproject')
        <link href="{{ asset('css/projects/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/projects/media.css') }}" rel="stylesheet">
    @break

    @case('knowledge.index') 
        <link href="{{ asset('css/knowledge/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/knowledge/media.css') }}" rel="stylesheet">
    @break

@endswitch