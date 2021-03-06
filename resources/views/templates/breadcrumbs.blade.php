
   <div class="breadcrumbs">
      <a class="brd-home" href="{{ route('home.index') }}"><span class="material-icons">home</span></a>
      @switch($route)
      
      @case('structure.index')
         <a href="{{ route('structure.index') }}"><span>{{ __('Структура') }}</span></a>
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
         <a href="{{ route('news.single', $news->id) }}"><span>{{ $news->title }}</span></a>
      @break



      @case('entertainment.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
      @break

      @case('entertainment.videos.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.videos.index') }}"><span>{{ __('Видео') }}</span></a>
      @break

      @case('entertainment.videos.single')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.videos.index') }}"><span>{{ __('Видео') }}</span></a>
         <a href="{{ route('entertainment.videos.single', $entertainment->id) }}"><span>{{ $entertainment->ruTitle }}</span></a>
      @break

      @case('entertainment.gallery.index')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.gallery.index') }}"><span>{{ __('Галерея') }}</span></a>
      @break

      @case('entertainment.gallery.single')
         <a href="{{ route('entertainment.index') }}"><span>{{ __('Развлечения') }}</span></a>
         <a href="{{ route('entertainment.gallery.index') }}"><span>{{ __('Галерея') }}</span></a>
         <a href="{{ route('entertainment.gallery.single', $gallery->id) }}"><span>{{ $crumbsTitle }}</span></a>
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
         <a href="{{ route('projects.single', $project->id) }}"><span>{{ $project->title }}</span></a>
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
         <a href="{{ route('knowledge.videos.index', $material->id) }}"><span>{{__($subject->name)}} / {{__($subjectcat->name)}} / {{__($material->name)}}</span></a>
      @break

      @case('knowledge.videos.single')
         <a href="{{ route('knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
         <a href="{{ route('knowledge.videos.single', $video->id) }}"><span>{{$video->ruTitle}}</span></a>
      @break

      @case('knowledge.books.index')
         <a href="{{ route('knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
         <a href="{{ route('knowledge.books.index', $material->id) }}"><span>{{__($subject->name)}} / {{__($subjectcat->name)}} / {{__($material->name)}}</span></a>
      @break



      @case('ideas.create')
         <a href="{{ route('ideas.create') }}"><span>{{__('Подать идею')}}</span></a>
      @break

      @case('complaints.create')
         <a href="{{ route('ideas.create') }}"><span>{{__('Написать жалобу')}}</span></a>
      @break

      @case('notifications.index')
         <a href="{{ route('notifications.index') }}"><span>{{__('Уведомления')}}</span></a>
      @break

      @case('notifications.single')
         <a href="{{ route('notifications.index') }}"><span>{{__('Уведомления')}}</span></a>
         <a href="{{ route('notifications.single', $notification->id) }}"><span>{{$crumbsTitle}}</span></a>
      @break

      @case('questionnaire.index')
         <a href="{{ route('questionnaire.index') }}"><span>{{__('Опросник')}}</span></a>
      @break

      @case('questionnaire.single')
         <a href="{{ route('questionnaire.index') }}"><span>{{__('Опросник')}}</span></a>
         <a href="{{ route('questionnaire.single', $question->id) }}"><span>{{$crumbsTitle}}</span></a>
      @break

      @endswitch
   </div>