
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
        <script src="{{ asset('js/entertainment/scripts.js') }}"></script>
    @break

    @case('entertainment.videos.index')  
        <script src="{{ asset('js/entertainment/videos/scripts.js') }}"></script>
    @break

    @case('entertainment.gallery.index') @case('entertainment.gallery.show')
        {{-- Gallery scripts --}}
        <script src="{{ asset('js/entertainment/gallery/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/entertainment/gallery/lc_lightbox.lite.js') }}" type="text/javascript"></script>
    
        <script src="{{ asset('js/entertainment/gallery/scripts.js') }}"></script>
    @break

    @case('projects.index') @case('projects.single') 
        <script src="{{ asset('js/projects/scripts.js') }}"></script>
    @break

    @case('knowledge.videos.index')
        {{-- Plyr video player --}}
        <script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
        <script src="{{ asset('js/knowledge/scripts.js') }}"></script>
    @break

@endswitch