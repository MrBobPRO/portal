
@switch($route)
    @case('home')
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
    @break
@endswitch