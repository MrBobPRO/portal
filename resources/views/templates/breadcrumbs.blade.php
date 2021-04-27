
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('about.index')
         <a href="{{ route('about.index') }}"><span>{{ __('О компании') }}</span></a>
      @break

            @case('about.whoweare')
               <a href="{{ route('about.index') }}"><span>{{ __('О компании') }}</span></a>
               <a href="{{ route('about.whoweare') }}"><span>{{ __('Кто мы') }}  ?</span></a>
            @break

            @case('about.structure')
               <a href="{{ route('about.index') }}"><span>{{ __('О компании') }}</span></a>
               <a href="{{ route('about.structure') }}"><span>{{ __('Структура') }}</span></a>
            @break

            @case('about.leadership')
               <a href="{{ route('about.index') }}"><span>{{ __('О компании') }}</span></a>
               <a href="{{ route('about.leadership') }}"><span>{{ __('Руководство') }}</span></a>
            @break

      @case('news.index')
         <a href="{{ route('news.index') }}"><span>{{ __('Новости') }}</span></a>
      @break

            @case('news.inner')
               <a href="{{ route('news.index') }}"><span>{{ __('Новости') }}</span></a>
               <a href="{{ route('news.inner') }}"><span>{{ __('Новости компании') }}</span></a>
            @break

            @case('news.global')
               <a href="{{ route('news.index') }}"><span>{{ __('Новости') }}</span></a>
               <a href="{{ route('news.global') }}"><span>{{ __('Мировые новости') }}</span></a>
            @break

            @case('news.single')
               <a href="{{ route('news.index') }}"><span>{{ __('Новости') }}</span></a>
               @if($news->global)
                  <a href="{{ route('news.global') }}"><span>{{ __('Мировые новости') }}</span></a>
               @else
                  <a href="{{ route('news.inner') }}"><span>{{ __('Новости компании') }}</span></a>
               @endif
               <a href="{{ route('news.single', $news->id) }}"><span>{{ $crumbsTitle }}</span></a>
            @break

      @case('entertainment.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
      @break

      @endswitch
   </div>