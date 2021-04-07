
@switch($route)

    @case('home.index')
        <script src="{{ asset('js/home/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/home/scripts.js') }}"></script>
    @break

    @case('about.index')
        <script src="{{ asset('js/about/scripts.js') }}"></script>
    @break

    @case('news.index') @case('news.companynews') @case('news.worldnews') @case('news.shownews')
        <script src="{{ asset('js/news/scripts.js') }}"></script>
    @break

    @case('entertainment.index') 
        <script src="{{ asset('js/entertainment/scripts.js') }}"></script>
    @break

    @case('projects.index') @case('projects.showproject') 
        <script src="{{ asset('js/projects/scripts.js') }}"></script>
    @break

    @case('knowledge.index') @case('knowledge.showbook')
        <script src="{{ asset('js/knowledge/scripts.js') }}"></script>
    @break 

@endswitch