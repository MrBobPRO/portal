
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

    @case('projects') @case('projects.show')
        <link href="{{ asset('css/projects/styles.css') }}" rel="stylesheet">
    @break

    @case('knowledge') @case('knowledge.book')
        <link href="{{ asset('css/knowledge/styles.css') }}" rel="stylesheet">
    @break

    @case('english') @case('english.beginner') @case('english.intermediate')  @case('english.upperintermediate')
    @case('english.expert')  @case('english.mastery')
        <link href="{{ asset('css/knowledge/english/styles.css') }}" rel="stylesheet">
    @break

@endswitch