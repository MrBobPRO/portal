
<nav>
   <ul class="main-navbar">
      <li class="navbar-items">
         <a href="/"><i class="fas fa-home"></i>{{ __('Главная') }}</a><div class="{{ $route == 'home' ? 'active' : ''}}"></div>
      </li>
      <li class="navbar-items">
         <a href="/about"><i class="fas fa-crown"></i>{{ __('О компании') }}</a><div class="{{ $route == 'about' ? 'active' : ''}}"></div>
      </li>
      <li class="navbar-items">
         <a href="/news"><i class="fas fa-rss-square"></i>{{ __('Новости') }}</a><div class="{{ $route == 'news' ? 'active' : ''}}"></div>
      </li>
      <li class="navbar-items">
         <a href="/entertainment"><i class="fas fa-futbol"></i>{{ __('Развлечения') }}</a><div class="{{ $route == 'entertainment' ? 'active' : ''}}"></div>
      </li>
      <li class="navbar-items">
         <a href="/projects"><i class="fas fa-thumbtack"></i>{{ __('Проекты и инициативы') }}</a><div class="{{ $route == 'projects' ? 'active' : ''}}"></div>
      </li>
      <li class="navbar-items">
         <a href="/knowledge"><i class="fas fa-book"></i>{{ __('Центр знаний') }}</a><div class="{{ $route == 'knowledge' ? 'active' : ''}}"></div>
      </li>
   </ul>
   <div class="dropdown nav-lang-dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
         @if(\App::currentLocale() == 'ru')
            Ru <img src="{{asset('img/main/russian.png')}}"> 
         @else
            En <img src="{{asset('img/main/english.png')}}"> 
         @endif
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
         @if(\App::currentLocale() == 'ru')
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}"> Русский</button>
               </form>
            </li>
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}"> English</button>
               </form>
            </li>
         @else
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}"> English</button>
               </form>
            </li>
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}"> Русский</button>
               </form>
            </li>
         @endif
      </ul>
   </div>
</nav>