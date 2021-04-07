<nav class="main-nav">
   <ul class="navbar">
      <li class="navbar-items {{ $route == 'home' ? 'active' : ''}}">
         <a href="/">{{ __('Главная') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'about' 
                              || $route == 'about.aboutus' 
                              || $route == 'about.structure' 
                              || $route == 'about.leadership' ? 'active' : ''}}">
         <a href="/about">{{ __('О компании') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'news'  
                              || $route == 'news.companynews' 
                              || $route == 'news.worldnews' 
                              || $route == 'news.show' ? 'active' : ''}}">
         <a href="/news">{{ __('Новости') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'knowledge' 
                              || $route == 'knowledge.books' 
                              || $route == 'english' 
                              || $route == 'english.beginner' 
                              || $route == 'english.intermediate' 
                              || $route == 'english.upperintermediate' 
                              || $route == 'english.expert' 
                              || $route == 'english.mastery' 
                              || $route == 'russian' 
                              || $route == 'business' 
                              || $route == 'energetics' 
                              || $route == 'pgs' 
                              || $route == 'itprog' ? 'active' : ''}}">
         <a href="/entertainment">{{ __('Развлечения') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'projects' ? 'active' : ''}} || {{ $route == 'projects.show' ? 'active' : ''}}">
         <a href="/projects">{{ __('Проекты и инициативы') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'knowledge' ? 'active' : ''}}">
         <a href="/knowledge">{{ __('Центр знаний') }}</a>
      </li>
   </ul>
</nav>