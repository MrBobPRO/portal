
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
         <a href="{{ route('dashboard.users.index') }}"><span>{{__('Сотрудники')}}</span></a>
      @break

      @case('dashboard.users.single')
         <a href="{{ route('dashboard.users.index') }}"><span>{{__('Сотрудники')}}</span></a>
         <a href="{{ route('dashboard.users.single', $user->id) }}"><span>{{$user->name . ' ' . $user->surname}}</span></a>
      @break



      @case('dashboard.ads.index')
         <a href="{{ route('dashboard.ads.index') }}"><span>{{ __('Объявление') }}</span></a>
      @break

      @case('dashboard.ads.single')
         <a href="{{ route('dashboard.ads.index') }}"><span>{{ __('Объявление') }}</span></a>
         <a href="{{ route('dashboard.ads.single', $ad->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.ads.create')
         <a href="{{ route('dashboard.ads.index') }}"><span>{{ __('Объявление') }}</span></a>
         <a href="{{ route('dashboard.ads.create') }}"><span>{{__('Добавить')}}</span></a>
      @break

      @case('dashboard.questionnaire.index')
         <a href="{{ route('dashboard.questionnaire.index') }}"><span>{{ __('Опросник') }}</span></a>
      @break

      @case('dashboard.questionnaire.single')
         <a href="{{ route('dashboard.questionnaire.index') }}"><span>{{ __('Опросник') }}</span></a>
         <a href="{{ route('dashboard.questionnaire.single', $question->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.questionnaire.create')
         <a href="{{ route('dashboard.questionnaire.index') }}"><span>{{ __('Опросник') }}</span></a>
         <a href="{{ route('dashboard.questionnaire.create') }}"><span>{{__('Добавить')}}</span></a>
      @break

      @case('dashboard.news.index')
         <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
      @break

      @case('dashboard.news.single')
         <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
         <a href="{{ route('dashboard.news.single', $news->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.news.create')
         <a href="{{ route('dashboard.news.index') }}"><span>{{ __('Новости') }}</span></a>
         <a href="{{ route('dashboard.news.create') }}"><span>{{__('Добавить')}}</span></a>
      @break



      @case('dashboard.slider.index')
         <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
      @break

      @case('dashboard.slider.single')
         <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
         <a href="{{ route('dashboard.slider.single', $item->id) }}"><span>{{$item->priority}}</span></a>
      @break

      @case('dashboard.slider.create')
         <a href="{{ route('dashboard.slider.index') }}"><span>{{ __('Слайдер') }}</span></a>
         <a href="{{ route('dashboard.slider.create') }}"><span>{{__('Добавить')}}</span></a>
      @break

      @case('dashboard.ideas.index')
         <a href="{{ route('dashboard.ideas.index') }}"><span>{{ __('Идеи') }}</span></a>
      @break

      @case('dashboard.ideas.single')
         <a href="{{ route('dashboard.ideas.index') }}"><span>{{ __('Идеи') }}</span></a>
         <a href="{{ route('dashboard.ideas.index') }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.complaints.index')
         <a href="{{ route('dashboard.complaints.index') }}"><span>{{ __('Жалобы') }}</span></a>
      @break

      @case('dashboard.complaints.single')
         <a href="{{ route('dashboard.complaints.index') }}"><span>{{ __('Жалобы') }}</span></a>
         <a href="{{ route('dashboard.complaints.index') }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.videos.index')
         <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
      @break

      @case('dashboard.videos.single')
         <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
         <a href="{{ route('dashboard.videos.single', $video->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.videos.create')
         <a href="{{ route('dashboard.videos.index') }}"><span>{{ __('Видео') }}</span></a>
         <a href="{{ route('dashboard.videos.create') }}"><span>{{__('Добавить')}}</span></a>
      @break



      @case('dashboard.projects.index')
         <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
      @break

      @case('dashboard.projects.single')
         <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
         <a href="{{ route('dashboard.projects.single', $project->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.projects.create')
         <a href="{{ route('dashboard.projects.index') }}"><span>{{ __('Проекты') }}</span></a>
         <a href="{{ route('dashboard.projects.create') }}"><span>{{__('Добавить')}}</span></a>
      @break



      @case('dashboard.galleries.index')
         <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
      @break

      @case('dashboard.galleries.single')
         <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
         <a href="{{ route('dashboard.galleries.single', $gallery->id) }}"><span>{{__($crumbsTitle)}}</span></a>
      @break

      @case('dashboard.galleries.create')
         <a href="{{ route('dashboard.galleries.index') }}"><span>{{ __('Галерея') }}</span></a>
         <a href="{{ route('dashboard.galleries.create') }}"><span>{{__('Добавить')}}</span></a>
      @break

      @case('dashboard.knowledge.index')
         <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
      @break

            @case('dashboard.knowledge.create')
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.create') }}"><span>{{ __('Добавить материалы') }}</span></a>
            @break

            @case('dashboard.knowledge.books')
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.books') }}"><span>{{ __('Книги') }}</span></a>
            @break

            @case('dashboard.knowledge.books.single') 
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.books') }}"><span>{{ __('Книги') }}</span></a>
               <a href="{{ route('dashboard.knowledge.books.single', $book->id) }}"><span>{{ $book->title }}</span></a>
            @break

            @case('dashboard.knowledge.books.create') 
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.books') }}"><span>{{ __('Книги') }}</span></a>
               <a href="{{ route('dashboard.knowledge.books.create', $material->id) }}"><span>{{__($subject->name)}}/{{__($subjectcat->name)}}/{{__($material->name)}}</span></a>
            @break

            @case('dashboard.knowledge.videos')
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.videos') }}"><span>{{ __('Видео') }}</span></a>
            @break

            @case('dashboard.knowledge.videos.single') 
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.videos') }}"><span>{{ __('Видео') }}</span></a>
               <a href="{{ route('dashboard.knowledge.videos.single', $video->id) }}"><span>{{ __($video->ruTitle) }}</span></a>
            @break

            @case('dashboard.knowledge.videos.create') 
               <a href="{{ route('dashboard.knowledge.index') }}"><span>{{ __('Центр знаний') }}</span></a>
               <a href="{{ route('dashboard.knowledge.videos') }}"><span>{{ __('Видео') }}</span></a>
               <a href="{{ route('dashboard.knowledge.videos.create', $material->id) }}"><span>{{__($subject->name)}}/{{__($subjectcat->name)}}/{{__($material->name)}}</span></a>
            @break
         
            @case('dashboard.structure.index')
               <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
            @break

               @case('dashboard.structure.users.update')
                  <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
                  <a href="{{ route('dashboard.structure.users.update', $user->id) }}"><span>{{ $user->name }} {{ $user->surname }}</span></a>
               @break

               @case('dashboard.structure.users.create')
                  <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
                  <a href="{{ route('dashboard.structure.users.create') }}"><span>{{__('Добавить сотрудника')}}</span></a>
               @break

         @case('dashboard.structure.departments.index')
            <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
            <a href="{{ route('dashboard.structure.departments.index') }}"><span>{{__('Отделы')}}</span></a>
         @break

         @case('dashboard.structure.designations.index')
            <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
            <a href="{{ route('dashboard.structure.designations.index') }}"><span>{{__('Позиции')}}</span></a>
         @break

         @case('dashboard.structure.positions.index')
            <a href="{{ route('dashboard.structure.index') }}"><span>{{ __('Структура') }}</span></a>
            <a href="{{ route('dashboard.structure.positions.index') }}"><span>{{__('Должности')}}</span></a>
         @break

      @case('dashboard.translations.index')
         <a href="{{ route('dashboard.translations.index') }}"><span>{{ __('Переводы') }}</span></a>
      @break

      @case('dashboard.translations.single')
         <a href="{{ route('dashboard.translations.index') }}"><span>{{ __('Переводы') }}</span></a>
      @break

      @endswitch
   </div>