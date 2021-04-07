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
                              || $route == 'knowledge.showbook' 
                              || $route == 'english.index' 
                              || $route == 'english.beginner' 
                              || $route == 'english.intermediate' 
                              || $route == 'english.upperintermediate' 
                              || $route == 'english.expert' 
                              || $route == 'english.mastery' 
                              || $route == 'russian.index' 
                              || $route == 'business.index' 
                              || $route == 'energy.index' 
                              || $route == 'pgs.index' 
                              || $route == 'itprog.index' ? 'active' : ''}}">
         <a href=" {{ route('knowledge.index') }} ">{{ __('Центр знаний') }}</a>
      </li>
   </ul>
</nav>