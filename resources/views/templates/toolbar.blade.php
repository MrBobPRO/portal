<div class="toolbar">
   <ul class="toolbar-right">
      <li class="toolbar-items"> <i class="far fa-envelope"></i> </li>
      <li class="toolbar-items"> <i class="far fa-bell"></i> </li>
      <li class="toolbar-items"> <i class="far fa-comment"></i> </li>
   </ul>
   <form  class="search-form" action="/search" method="GET">
      <input type="text" name="keyword" minlength="3" required placeholder="{{ __('Поиск...') }}"/>
      <button type="submit"> <i class="fa fa-search"></i> </button>
   </form>
   <div class="dropdown nav-lang-dropdown">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
         @if(\App::currentLocale() == 'ru')
            <img src="{{asset('img/main/russian.png')}}"> Русский 
         @else
            <img src="{{asset('img/main/english.png')}}"> English
         @endif
         <i class="fa fa-sort-down"></i>
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
</div>