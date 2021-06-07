
@switch($route)

    @case('home.index')
        {{-- Owl Carousel --}}
        <script src="{{ asset('js/owl_carousel2-2.3.4/owl.carousel.min.js') }}"></script>
        
        <script src="{{ asset('js/home/scripts.js') }}"></script>
    @break

    @case('ideas.create')
        {{-- Simditor v2.3.28 --}}
        <script src="{{ asset('js/simditor/scripts/module.js') }}"></script>
        <script src="{{ asset('js/simditor/scripts/hotkeys.js') }}"></script>
        <script src="{{ asset('js/simditor/scripts/uploader.js') }}"></script>
        <script src="{{ asset('js/simditor/scripts/simditor.js') }}"></script>
        <script src="{{ asset('js/ideas/scripts.js') }}"></script>
    @break

    @case('news.single')
        <script src="{{ asset('js/news/scripts.js') }}"></script>
    @break

    @case('entertainment.videos.index') @case('entertainment.videos.single') 
        {{-- Plyr video player --}}
        <script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
        <script src="{{ asset('js/entertainment/videos/scripts.js') }}"></script>
    @break

    @case('entertainment.gallery.single')
        {{-- Gallery scripts --}}
        <script src="{{ asset('js/entertainment/gallery/lc_lightbox.lite.js') }}" type="text/javascript"></script>
    
        <script src="{{ asset('js/entertainment/gallery/scripts.js') }}"></script>
    @break

    @case('knowledge.videos.index') @case('knowledge.videos.single')
        {{-- Plyr video player --}}
        <script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
        <script src="{{ asset('js/knowledge/scripts.js') }}"></script>
    @break
  

@endswitch