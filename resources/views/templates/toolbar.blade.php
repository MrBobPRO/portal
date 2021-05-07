<div class="toolbar">
   <div class="toolbar-inner">
      <ul class="toolbar-right">
         <a href="{{route('ideas.create')}}" title="Подать идею" class="toolbar-items idea-icon"><span class="material-icons-outlined">tungsten</span></a>

         <a href="{{route('complaints.create')}}" title="Написать жалобу" class="toolbar-items"><span class="material-icons-outlined">sentiment_dissatisfied</span></a>

         <a href="#" title="Уведомления" class="toolbar-items"><span class="material-icons-outlined">notifications</span></a>
      </ul>

      <form  class="search-form" action="/search" method="GET">
         <input type="text" name="keyword" minlength="3" required placeholder="{{ __('Поиск...') }}"/>
         <button type="submit"> <span class="material-icons-outlined">search</span> </button>
      </form>

      <div class="dropdown lang-dropdown">
         <button class="btn dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if(\App::currentLocale() == 'ru')
               <img src="{{asset('img/main/russian.png')}}"> ru 
            @else
               <img src="{{asset('img/main/english.png')}}"> en
            @endif
         </button>

         <ul class="dropdown-menu" aria-labelledby="langDropdown">
            @if(\App::currentLocale() == 'ru')
               <li>
                  <form action="/setLangRu" method="POST">
                     @csrf
                     <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}"> ru</button>
                  </form>
               </li>

               <li>
                  <form action="/setLangEn" method="POST">
                     @csrf
                     <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}"> en</button>
                  </form>
               </li>

            @else
               <li>
                  <form action="/setLangEn" method="POST">
                     @csrf
                     <button type="submit" class="dropdown-item"><img src="{{asset('img/main/english.png')}}"> en</button>
                  </form>
               </li>
               <li>
                  
                  <form action="/setLangRu" method="POST">
                     @csrf
                     <button type="submit" class="dropdown-item"><img src="{{asset('img/main/russian.png')}}"> ru</button>
                  </form>
               </li>
            @endif
         </ul>
      </div>
   </div>
</div>