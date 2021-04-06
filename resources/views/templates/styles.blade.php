
@switch($route)
    
    @case('home')
        <link href="{{ asset('css/home/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
    @break
    
    @case('about') @case('about.aboutus') @case('about.structure') @case('about.leadership')
        <link href="{{ asset('css/about/styles.css') }}" rel="stylesheet">
    @break
    
    @case('news') @case('news.companynews') @case('news.worldnews') @case('news.show')
        <link href="{{ asset('css/news/styles.css') }}" rel="stylesheet">
    @break

    @case('entertainment')
        <link href="{{ asset('css/entertainment/styles.css') }}" rel="stylesheet">
    @break

@endswitch