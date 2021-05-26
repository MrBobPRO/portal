<nav class="main-nav">
   <ul class="navbar">
      <li class="{{ $route == 'home.index' ? 'active' : ''}}">
         <a href=" {{ route('home.index') }} ">{{ __('Главная') }}</a>
      </li>

      <li class="{{ $route == 'structure.index' ? 'active' : ''}}">
         <a href=" {{ route('structure.index') }} ">{{ __('Структура') }}</a>
      </li>

      <li class="{{ $route == 'knowledge.index' 
                              || $route == 'knowledge.books.index'
                              || $route == 'knowledge.books.showbook'
                              || $route == 'knowledge.videos.index' ? 'active' : ''}}">
         <a href=" {{ route('knowledge.index') }} ">{{ __('Центр знаний') }}</a>
      </li>

      <li class="{{ $route == 'news.index'  
                              || $route == 'news.inner' 
                              || $route == 'news.global' 
                              || $route == 'news.single' ? 'active' : ''}}">
         <a href=" {{ route('news.index') }} ">{{ __('Новости') }}</a>
      </li>


      <li class="{{ $route == 'projects.index' 
                              || $route == 'projects.single'
                              || $route == 'projects.completed'
                              || $route == 'projects.ongoing' ? 'active' : ''}}">
         <a href=" {{ route('projects.index') }} ">{{ __('Проекты и инициативы') }}</a>
      </li>

      <li class="{{ $route == 'entertainment.index'
                              || $route == 'entertainment.videos.index'
                              || $route == 'entertainment.gallery.index'
                              || $route == 'entertainment.gallery.single' ? 'active' : ''}}">
         <a href=" {{ route('entertainment.index') }} ">{{ __('Развлечения') }}</a>
      </li>

   </ul>
</nav>