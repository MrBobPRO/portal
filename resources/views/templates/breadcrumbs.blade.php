
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

      @case('entertainment.videos.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.videos.index') }}"><span>{{ __('Видео') }}</span></a>
      @break

      @case('entertainment.gallery.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.gallery.index') }}"><span>{{ __('Галерея') }}</span></a>
      @break

      @case('entertainment.gallery.single')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.gallery.index') }}"><span>{{ __('Галерея') }}</span></a>
         <a href="{{ route('entertainment.gallery.single', $gallery->id) }}"><span>{{ $gallery->name }}</span></a>
      @break

      @case('projects.index')
         <a href="{{ route('projects.index') }}"><span>{{ __('Проекты и инициативы') }}</span></a>
      @break

         @case('projects.single')
            <a href="{{ route('projects.index') }}"><span>{{ __('Проекты и инициативы') }}</span></a>
            @if ($project->completed)
               <a href="{{ route('projects.completed') }}"><span>{{ __('Выполненные проекты') }}</span></a> 
            @else
                  <a href="{{ route('projects.ongoing') }}"><span>{{ __('Действующие проекты') }}</span></a>
            @endif
            <a href="{{ route('news.single', $project->id) }}"><span>{{ $crumbsTitle }}</span></a>
         @break

         @case('projects.completed')
            <a href="{{ route('projects.index') }}"><span>{{ __('Проекты и инициативы') }}</span></a>
            <a href="{{ route('projects.completed') }}"><span>{{ __('Выполненные проекты') }}</span></a>
         @break

         @case('projects.ongoing')
            <a href="{{ route('projects.index') }}"><span>{{ __('Проекты и инициативы') }}</span></a>
            <a href="{{ route('projects.ongoing') }}"><span>{{ __('Действующие проекты') }}</span></a>
         @break

      @case('knowledge.index')
         <a href="{{ route('knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
      @break

         @case('knowledge.videos.index')
            <a href="{{ route('knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
            <a href="{{ route('knowledge.videos.index', $material->id) }}"><span>{{$subject->name}} / {{$subjectcat->name}} / {{$material->name}}</span></a>
         @break

      @case('knowledge.books.index')
         <a href="{{ route('knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
         <a href="{{ route('knowledge.books.index', $material->id) }}"><span>{{$subject->name}} / {{$subjectcat->name}} / {{$material->name}}</span></a>
      @break

      @endswitch
   </div>