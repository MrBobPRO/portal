<div class="toolbar">
   <div class="toolbar-inner">
      
      {{-- Toolbar icons start --}}
      <ul class="toolbar-right">
         <a href="{{route('ideas.create')}}" title="Подать идею" class="toolbar-items idea-icon"><span class="material-icons-outlined">tungsten</span></a>

         <a href="{{route('complaints.create')}}" title="Написать жалобу" class="toolbar-items"><span class="material-icons-outlined">sentiment_dissatisfied</span></a>

         <a href="{{route('notifications.index')}}" title="Уведомления" class="toolbar-items">
            {{-- $notificationsCount declared in AppServiceProvider --}}
            @if($notificationsCount > 0)
               <span class="material-icons primary-color">notifications</span>
            @else
               <span class="material-icons-outlined">notifications</span>
            @endif
         </a>

         <a href="{{route('questionnaire.index')}}" title="Опросник" class="toolbar-items"><span class="material-icons-outlined">help_outline</span></a>
      
         <a type="button" title="Поиск" id="toobar-search-btn" class="toolbar-items toolbar-search-btn no-selection"><span class="material-icons-outlined">search</span></a>
      </ul>
      {{-- Toolbar icons end --}}

      {{-- Toolbar Search start --}}
      <form  class="search-form" action="/search" method="GET">
         <input type="text" name="keyword" minlength="3" required placeholder="{{ __('Поиск...') }}"/>
         <button type="submit"> <span class="material-icons-outlined">search</span></button>
      </form>
      {{-- Toolbar Search end --}}

      {{-- Language dropdown start --}}
      <div class="dropdown lang-dropdown">
         <button class="btn dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">

            <?php $appLocale = \App::currentLocale(); ?>

            @if($appLocale == 'ru')
               <img src="{{asset('img/main/russian.png')}}"> ru 
            @elseif($appLocale == 'en')
               <img src="{{asset('img/main/english.png')}}"> en
            @else
               <img src="{{asset('img/main/tajik.png')}}"> tj
            @endif
         </button>

         <ul class="dropdown-menu" aria-labelledby="langDropdown">
            {{-- If appLocale RU start --}}
            @if($appLocale == 'ru')
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                     ru</button>
               </form>
            </li>
            <li>
               <form action="/setLangTj" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                     tj</button>
               </form>
            </li>
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                     en</button>
               </form>
            </li> {{-- If appLocale RU end --}}

            {{-- If appLocale EN start --}}
            @elseif($appLocale == 'en')
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                     en</button>
               </form>
            </li>
            <li>
               <form action="/setLangTj" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                     tj</button>
               </form>
            </li>
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                     ru</button>
               </form>
            </li> {{-- If appLocale EN end --}}

            {{-- If appLocale TJ start --}}
            @else
            <li>
               <form action="/setLangTj" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/tajik.png')}}">
                     tj</button>
               </form>
            </li>
            <li>
               <form action="/setLangRu" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}">
                     ru</button>
               </form>
            </li>
            <li>
               <form action="/setLangEn" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}">
                     en</button>
               </form>
            </li> 
            @endif  {{-- Else If appLocale TJ end --}}
         </ul>
      </div> {{-- Language dropdown end --}}
   </div>
</div>