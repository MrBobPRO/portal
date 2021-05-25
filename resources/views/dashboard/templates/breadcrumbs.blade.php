
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('dashboard.profile.index')
         <a href="{{ route('dashboard.profile.index') }}"><span>{{ __('Профиль') }}</span></a>
      @break

      @case('dashboard.settings.index')
         <a href="{{ route('dashboard.settings.index') }}"><span>{{ __('Настройки') }}</span></a>
      @break

      @case('dashboard.users.index')
         <a href="{{ route('dashboard.users.index') }}"><span>Сотрудники</span></a>
      @break

         @case('dashboard.users.single')
            <a href="{{ route('dashboard.users.index') }}"><span>Сотрудники</span></a>
            <a href="{{ route('dashboard.users.single', $user->id) }}"><span>{{$user->name . ' ' . $user->surname}}</span></a>
         @break


      @case('dashboard.news.index')
         <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
      @break

         @case('dashboard.news.single')
            <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
            <a href="{{ route('dashboard.news.single', $news->id) }}"><span>{{$crumbsTitle}}</span></a>
         @break

         @case('dashboard.news.create')
            <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
            <a href="{{ route('dashboard.news.create') }}"><span>Добавить</span></a>
         @break

         @case('dashboard.slider.index')
            <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
         @break

            @case('dashboard.news.single')
               <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
               <a href="{{ route('dashboard.slider.single', $item->id) }}"><span>{{$item->priority}}</span></a>
            @break

            @case('dashboard.news.create')
               <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
               <a href="{{ route('dashboard.slider.create') }}"><span>Добавить</span></a>
            @break


      @case('dashboard.ideas.index')
         <a href="{{ route('dashboard.ideas.index') }}"><span>{{ __('Идеи') }}</span></a>
      @break

         @case('dashboard.ideas.single')
            <a href="{{ route('dashboard.ideas.index') }}"><span>{{ __('Идеи') }}</span></a>
            <a href="{{ route('dashboard.ideas.index') }}"><span>{{$crumbsTitle}}</span></a>
         @break


      @case('dashboard.complaints.index')
         <a href="{{ route('dashboard.complaints.index') }}"><span>{{ __('Жалобы') }}</span></a>
      @break

         @case('dashboard.complaints.single')
            <a href="{{ route('dashboard.complaints.index') }}"><span>{{ __('Жалобы') }}</span></a>
            <a href="{{ route('dashboard.complaints.index') }}"><span>{{$crumbsTitle}}</span></a>
         @break


      @case('dashboard.videos.index')
         <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
      @break

         @case('dashboard.videos.single')
            <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
            <a href="{{ route('dashboard.videos.single', $video->id) }}"><span>{{$crumbsTitle}}</span></a>
         @break

         @case('dashboard.videos.create')
            <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
            <a href="{{ route('dashboard.videos.create') }}"><span>Добавить</span></a>
         @break

      @case('dashboard.projects.index')
         <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
      @break

         @case('dashboard.projects.single')
            <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
            <a href="{{ route('dashboard.projects.single', $project->id) }}"><span>{{$crumbsTitle}}</span></a>
         @break

         @case('dashboard.projects.create')
            <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
            <a href="{{ route('dashboard.projects.create') }}"><span>Добавить</span></a>
         @break

      @case('dashboard.galleries.index')
         <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
      @break

         @case('dashboard.galleries.single')
            <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
            <a href="{{ route('dashboard.galleries.single', $gallery->id) }}"><span>{{$crumbsTitle}}</span></a>
         @break

         @case('dashboard.galleries.create')
            <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
            <a href="{{ route('dashboard.galleries.create') }}"><span>Добавить</span></a>
         @break

      @endswitch
   </div>