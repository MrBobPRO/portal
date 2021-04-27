
@switch($route)

    @case('home.index')
        {{-- Owl Carousel --}}
        <script src="{{ asset('js/home/owl.carousel.min.js') }}"></script>
        
        <script src="{{ asset('js/home/scripts.js') }}"></script>
    @break

    @case('news.single')
        <script src="{{ asset('js/news/scripts.js') }}"></script>
    @break

    @case('entertainment.index') 
        {{-- Plyr video player --}}
        <script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>

        <script src="{{ asset('js/entertainment/scripts.js') }}"></script>
    @break

    @case('projects.index') @case('projects.showproject') 
        <script src="{{ asset('js/projects/scripts.js') }}"></script>
    @break

    @case('knowledge.index') @case('knowledge.books.index') @case('knowledge.books.showbook') @case('knowledge.videos.index') @case('knowledge.videos.showvideo')
        <script src="{{ asset('js/knowledge/scripts.js') }}"></script>
    @break 

@endswitch