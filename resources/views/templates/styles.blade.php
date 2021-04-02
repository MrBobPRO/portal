
@switch($route)
    @case('home')
        <link href="{{ asset('css/home/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
    @break
    @case('about') @case('about.aboutus') @case('about.structure') @case('about.leadership')
        <link href="{{ asset('css/about/styles.css') }}" rel="stylesheet">
    @break
@endswitch