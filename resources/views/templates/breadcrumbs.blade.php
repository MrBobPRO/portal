
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('about.index')
         <a href="{{ route('about.index') }}"><span class="material-icons">language <i>{{ __('О компании') }}</i></span></a>
      @break

      @endswitch
   </div>