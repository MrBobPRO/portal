<nav class="main-nav">
   <ul class="navbar">
      <li class="navbar-items {{ $route == 'home.index' ? 'active' : ''}}">
         <a href=" {{ route('home.index') }} ">{{ __('Главная') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'about.index' 
                              || $route == 'about.aboutus' 
                              || $route == 'about.structure' 
                              || $route == 'about.leadership' ? 'active' : ''}}">
         <a href=" {{ route('about.index') }} ">{{ __('О компании') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'news.index'  
                              || $route == 'news.companynews' 
                              || $route == 'news.worldnews' 
                              || $route == 'news.shownews' ? 'active' : ''}}">
         <a href=" {{ route('news.index') }} ">{{ __('Новости') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'entertainment.index' ? 'active' : ''}}">
         <a href=" {{ route('entertainment.index') }} ">{{ __('Развлечения') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'projects.index' 
                              || $route == 'projects.showproject' ? 'active' : ''}}">
         <a href=" {{ route('projects.index') }} ">{{ __('Проекты и инициативы') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'knowledge.index' 
                              || $route == 'knowledge.books.index'
                              || $route == 'knowledge.books.showbook'
                              || $route == 'knowledge.videos.index' ? 'active' : ''}}">
         <a href=" {{ route('knowledge.index') }} ">{{ __('Центр знаний') }}</a>
      </li>
   </ul>
</nav>