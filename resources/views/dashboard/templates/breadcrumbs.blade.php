
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('dashboard.profile.index')
         <a href="{{ route('dashboard.profile.index') }}"><span>{{ __('Профиль') }}</span></a>
      @break

      @endswitch
   </div>