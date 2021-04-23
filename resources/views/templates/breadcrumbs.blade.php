
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('about.index')
         <a href="{{ route('about.index') }}"><span class="material-icons">grade <i>{{ __('О компании') }}</i></span></a>
      @break

            @case('about.whoweare')
               <a href="{{ route('about.index') }}"><span class="material-icons-outlined">grade <i>{{ __('О компании') }}</i></span></a>
               <a href="{{ route('about.whoweare') }}"><span class="material-icons">emoji_emotions <i>{{ __('Кто мы') }}  ?</i></span></a>
            @break

            @case('about.structure')
               <a href="{{ route('about.index') }}"><span class="material-icons-outlined">grade <i>{{ __('О компании') }}</i></span></a>
               <a href="{{ route('about.structure') }}"><span class="material-icons">grid_view <i>{{ __('Структура') }}</i></span></a>
            @break

            @case('about.leadership')
               <a href="{{ route('about.index') }}"><span class="material-icons-outlined">grade <i>{{ __('О компании') }}</i></span></a>
               <a href="{{ route('about.leadership') }}"><span class="material-icons">supervisor_account <i>{{ __('Руководство') }}</i></span></a>
            @break

      @case('news.index')
         <a href="{{ route('about.index') }}"><span class="material-icons">article <i>{{ __('Новости') }}</i></span></a>
      @break

      @endswitch
   </div>