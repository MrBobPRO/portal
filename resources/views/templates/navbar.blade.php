<nav class="main-nav">
   <ul class="navbar">
      <li class="navbar-items {{ $route == 'home' ? 'active' : ''}}">
         <a href="/">{{ __('Главная') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'about' || $route == 'about.aboutus' || $route == 'about.structure' || $route == 'about.leadership' ? 'active' : ''}}">
         <a href="/about">{{ __('О компании') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'news' ? 'active' : ''}} || {{ $route == 'news.companynews' ? 'active' : ''}} || {{ $route == 'news.worldnews' ? 'active' : ''}} || {{ $route == 'news.show' ? 'active' : ''}}">
         <a href="/news">{{ __('Новости') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'entertainment' ? 'active' : ''}}">
         <a href="/entertainment">{{ __('Развлечения') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'projects' ? 'active' : ''}}">
         <a href="/projects">{{ __('Проекты и инициативы') }}</a>
      </li>
      <li class="navbar-items {{ $route == 'knowledge' ? 'active' : ''}}">
         <a href="/knowledge">{{ __('Центр знаний') }}</a>
      </li>
   </ul>
</nav>