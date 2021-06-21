
<?php $appUser = \Auth::user(); ?>
{{-- main block --}}
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
        <button id="dash-btn" class="account-btn" type="button">
            {{$appUser->name}} {{$appUser->surname}} 
            <span id="account-drop-arrow" class="material-icons-outlined">arrow_drop_down</span>
        </button>
        <button id="close-dash-btn" type="button">
            <span class="material-icons-outlined">close</span>
        </button>
    </div>

    {{-- dashboard block --}}
    <div id="mobile-dash" class="dash-block 
        {{$route == 'dashboard.profile.index'
        ||$route == 'dashboard.settings.index'
        ||$route == 'dashboard.users.index'
        ||$route == 'dashboard.users.single'
        ||$route == 'dashboard.ideas.index'
        ||$route == 'dashboard.ideas.single'
        ||$route == 'dashboard.ads.index'
        ||$route == 'dashboard.ads.single'
        ||$route == 'dashboard.ads.create'
        ||$route == 'dashboard.complaints.index'
        ||$route == 'dashboard.complaints.single'
        ||$route == 'dashboard.questionnaire.index'
        ||$route == 'dashboard.questionnaire.single'
        ||$route == 'dashboard.questionnaire.create' ? '' : 'hidden'}}"
    >
        <div class="content">
            {{-- User dashboard links --}}
            <ul class="users-dash">
                <li class="users-dash-items {{$route == 'dashboard.profile.index' ? 'active' : ''}}">
                    <a href="{{route('dashboard.profile.index')}}">
                        <span class="material-icons-outlined">manage_accounts</span>
                        {{__('Профиль')}}
                    </a>
                </li>
                <li class="users-dash-items {{$route == 'dashboard.settings.index' ? 'active' : ''}}">
                    <a href="{{route('dashboard.settings.index')}}">
                        <span class="material-icons-outlined">settings</span>
                        {{__('Настройки')}}
                    </a>
                </li>
                <li class="users-dash-items {{$route == 'dashboard.users.index' ||$route == 'dashboard.users.single' ? 'active' : ''}}">
                    <a href="{{route('dashboard.users.index')}}">
                        <span class="material-icons-outlined">badge</span>
                        {{__('Сотрудники')}}
                    </a>
                </li>
                <li class="users-dash-items {{$route == 'dashboard.ideas.index' ||$route == 'dashboard.ideas.single' ? 'active' : ''}}">
                    <a href="{{route('dashboard.ideas.index')}}">
                        <span class="material-icons-outlined">model_training</span>
                        {{__('Идеи')}}
                    </a>
                </li>
            </ul>
            <div class="dash-links-seperator"></div>
            {{-- Admin dashboard links --}}
            @if ($appUser->role == 'admin')
                <ul class="users-dash">
                    <li class="users-dash-items {{$route == 'dashboard.ads.index' ||$route == 'dashboard.ads.single' ||$route == 'dashboard.ads.create' ? 'active' : ''}}">
                        <a href="{{route('dashboard.ads.index')}}">
                            <span class="material-icons-outlined">new_releases</span>
                            {{__('Объявление')}}
                        </a>
                    </li>
                    <?php $newComplaintsCount = App\Models\Complaint::where('new', true)->count(); ?>
                    <li class="users-dash-items {{$route == 'dashboard.complaints.index' ||$route == 'dashboard.complaints.single' ||$route == 'dashboard.ads.create' ? 'active' : ''}}">
                        <a href="{{route('dashboard.complaints.index')}}">
                            <span class="material-icons-outlined">sentiment_dissatisfied</span>
                            {{__('Жалобы')}}
                            @if($newComplaintsCount > 0) ({{$newComplaintsCount}}) @endif
                        </a>
                    </li>
                    <li class="users-dash-items {{$route == 'dashboard.questionnaire.index' ||$route == 'dashboard.questionnaire.single' ||$route == 'dashboard.questionnaire.create' ? 'active' : ''}}">
                        <a href="{{route('dashboard.questionnaire.index')}}">
                            <span class="material-icons-outlined">help_outline</span>
                            {{__('Опросник')}}
                        </a>
                    </li>
                </ul>
            @endif
        </div>
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
{{-- Search block --}}
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

    <div class="content">
        {{-- todo:content --}}
    </div>
</div>
