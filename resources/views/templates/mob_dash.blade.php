
<?php $appUser = \Auth::user(); ?>

<div 
    id="mobile-dashboard"
    class="mobile-dashboard hidden" 
    @if ($appUser->dashBg != 'null')
        style="background-image: url({{asset('img/dashboards/' . $appUser->dashBg)}})"
    @endif
    
>

    <div id="dashOverlay" class="overlay {{$appUser->darkMode == '1' ? '' : 'hidden'}}"></div>
    
    <div class="dashtools">
        <button id="search-btn" type="button">
            <span class="material-icons-outlined">search</span>
        </button>
        <button class="account-btn" type="button">
            {{__('Панель')}}
            <span class="material-icons-outlined">arrow_drop_down</span>
        </button>
        <button id="close-dash-btn" type="button">
            <span class="material-icons-outlined">close</span>
        </button>
    </div>

    <div class="dash-content">
        <ul class="navigation">
            <li class="navigation-items {{$route == 'home.index' ? 'active' : ''}}">
                <a href="{{route('home.index')}}">
                    {{__('Главная')}}
                </a>
            </li>
            <li class="navigation-items {{$route == 'structure.index' ? 'active' : ''}}">
                <a href="{{route('structure.index')}}">
                    {{__('Структура')}}
                </a>
            </li>
            <li class="navigation-items 
                {{$route == 'knowledge.index' 
                || $route == 'knowledge.books.index'
                || $route == 'knowledge.books.showbook'
                || $route == 'knowledge.videos.index'
                || $route == 'knowledge.videos.single' ? 'active' : ''}}"
            >
                <a href="{{route('knowledge.index')}}">
                    {{__('Центр знаний')}}
                </a>
            </li>
            <li class="navigation-items">
                <button id="news-link-btn" class="page-link-btn" type="button">
                    {{__('Новости')}}
                    <span id="news-drop-arrow" class="material-icons-outlined">arrow_drop_down</span>
                </button>
                <ul id="news-links" class="page-list {{$route == 'news.global' || $route == 'news.inner' || $route == 'news.single' ? '' : 'hidden'}}">
                    <li class="page-items {{$route == 'news.global' || ($route == 'news.single' && $news->global) ? 'active' : ''}}">
                        <a href="{{route('news.global')}}">{{__('Мировые новости')}}</a>
                    </li>
                    <li class="page-items {{$route == 'news.inner' || ($route == 'news.single' && !$news->global) ? 'active' : ''}}">
                        <a href="{{route('news.inner')}}">{{__('Новости компании')}}</a>
                    </li>
                </ul>
            </li>
            <li class="navigation-items">
                <button id="projects-link-btn" class="page-link-btn" type="button">
                    {{__('Проекты и инициативы')}}
                    <span id="projects-drop-arrow" class="material-icons-outlined">arrow_drop_down</span>
                </button>
                <ul id="projects-links" class="page-list {{$route == 'projects.completed' || $route == 'projects.ongoing' || $route == 'projects.single' ? '' : 'hidden'}}">
                    <li class="page-items {{$route == 'projects.completed' || ($route == 'projects.single' && $project->completed) ? 'active' : ''}}">
                        <a href="{{route('projects.completed')}}">{{__('Выполненные проекты')}}</a>
                    </li>
                    <li class="page-items {{$route == 'projects.ongoing' || ($route == 'projects.single' && !$project->completed) ? 'active' : ''}}">
                        <a href="{{route('projects.ongoing')}}">{{__('Действующие проекты')}}</a>
                    </li>
                </ul>
            </li>
            <li class="navigation-items">
                <button id="entertainment-link-btn" class="page-link-btn" type="button">
                    {{__('Развлечения')}}
                    <span id="entertainment-drop-arrow" class="material-icons-outlined">arrow_drop_down</span>
                </button>
                <ul id="entertainment-links" class="page-list {{$route == 'entertainment.videos.index' || $route == 'entertainment.videos.single' || $route == 'entertainment.gallery.index' || $route == 'entertainment.gallery.single' ? '' : 'hidden'}}">
                    <li class="page-items {{$route == 'entertainment.videos.index' || $route == 'entertainment.videos.single' ? 'active' : ''}}">
                        <a href="{{route('entertainment.videos.index')}}">{{__('Видео')}}</a>
                    </li>
                    <li class="page-items {{$route == 'entertainment.gallery.index' || ($route == 'entertainment.gallery.single') ? 'active' : ''}}">
                        <a href="{{route('entertainment.gallery.index')}}">{{__('Галерея')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>

<div 
    id="mobile-search" 
    class="search-block hidden"
    @if ($appUser->dashBg != 'null')
        style="background-image: url({{asset('img/dashboards/' . $appUser->dashBg)}})"
    @endif
>
    <div id="dashOverlay" class="overlay {{$appUser->darkMode == '1' ? '' : 'hidden'}}"></div>
    
    <div class="dashtools">
        <form  class="mob-search-form" action="/search" method="GET">
            <input type="text" name="keyword" minlength="3" required placeholder="{{ __('Поиск...') }}"/>
            <button type="submit"> <span class="material-icons-outlined">search</span></button>
        </form>
        <button id="close-search-btn" class="close-search-btn" type="button">
            <span class="material-icons-outlined">close</span>
        </button>
    </div>
</div>
