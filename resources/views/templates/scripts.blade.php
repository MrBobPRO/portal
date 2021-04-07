
@switch($route)

    @case('home')
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
    @break

    @case('news') @case('news.companynews') @case('news.worldnews') @case('news.show')
        <script src="{{ asset('js/news.js') }}"></script>
    @break

    @case('entertainment') 
        <script src="{{ asset('js/entertainment.js') }}"></script>
    @break

    @case('projects') @case('projects.show') 
        <script src="{{ asset('js/projects.js') }}"></script>
    @break

    @case('knowledge') @case('knowledge.book')
        <script src="{{ asset('js/knowledge.js') }}"></script>
    @break

    @case('english') @case('english.beginner') @case('english.intermediate')  @case('english.upperintermediate')
    @case('english.expert')  @case('english.mastery')
        <script src="{{ asset('js/english.js') }}"></script>
    @break    

@endswitch