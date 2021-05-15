
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

      @endswitch
   </div>