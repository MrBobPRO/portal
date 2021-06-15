
<?php $appUser = \Auth::user(); ?>

<div class="no-selection dashboard-btn">
   {{-- Toogle button --}}
   <span class="material-icons-outlined dash-toogler" onclick="toogleDashboard()">menu</span>
   {{-- Dashboard start --}}
   <div id="dashboard" class="dashboard {{session('dashboard') == 'hidden' ? 'hidden' : ''}}" 
      style="background-image: url({{asset('img/dashboards/' . $appUser->dashBg)}})">

      <div id="dashOverlay" class="overlay {{$appUser->darkMode == '1' ? '' : 'hidden'}}"></div>

      <div class="profile-ava">
         <a href="{{ route('dashboard.profile.index') }}"><img src="{{ asset('img/users/' . $appUser->avatar) }}">{{$appUser->name}}</a>
      </div>

      {{-- Dashboard links start --}}
      <div class="dash-links">
         <a class="{{$route == 'dashboard.profile.index' ? 'active' : ''}}" href=" {{ route('dashboard.profile.index') }} "><span class="material-icons-outlined">manage_accounts</span>{{ __('Профиль') }}</a>

         <a class="{{$route == 'dashboard.settings.index' ? 'active' : ''}}" href="{{ route('dashboard.settings.index') }}"><span class="material-icons-outlined">drive_file_rename_outline</span>{{ __('Настройки') }}</a>

         <a class="@if($route == 'dashboard.users.index' || $route == 'dashboard.users.single') active @endif"
          href="{{ route('dashboard.users.index') }}"><span class="material-icons-outlined">face</span>{{__('Сотрудники')}}</a>

          <a class="@if($route == 'dashboard.ideas.index' || $route == 'dashboard.ideas.single') active @endif"
          href="{{ route('dashboard.ideas.index') }}"><span class="material-icons-outlined idea-icon">tungsten</span>{{__('Идеи')}}</a>

         {{-- Admin links tart --}}
         @if($appUser->role == 'admin')
            <div class="dash-links-seperator"></div>

            <a class="@if($route == 'dashboard.ads.index' || $route == 'dashboard.ads.single' || $route == 'dashboard.ads.create') active @endif"
            href="{{ route('dashboard.ads.index') }}"><span class="material-icons-outlined">new_releases</span>{{ __('Объявление') }}</a>

            <?php $newComplaintsCount = App\Models\Complaint::where('new', true)->count(); ?>
            <a class="@if($route == 'dashboard.complaints.index' || $route == 'dashboard.complaints.single') active @endif"
               href="{{ route('dashboard.complaints.index') }}"><span class="material-icons-outlined">sentiment_dissatisfied</span>{{__('Жалобы')}}
               @if($newComplaintsCount > 0) ({{$newComplaintsCount}}) @endif
            </a>

            <a class="@if($route == 'dashboard.questionnaire.index' || $route == 'dashboard.questionnaire.single' || $route == 'dashboard.questionnaire.create') active @endif"
            href="{{ route('dashboard.questionnaire.index') }}"><span class="material-icons-outlined">help_outline</span>{{ __('Опросник') }}</a> 

            <a class="@if($route == 'dashboard.slider.index' || $route == 'dashboard.slider.single' || $route == 'dashboard.slider.create') active @endif"
            href="{{ route('dashboard.slider.index') }}"><span class="material-icons-outlined">slideshow</span>{{ __('Слайдер') }}</a>

            <a class="@if($route == 'dashboard.structure.index'
                        || $route == 'dashboard.structure.users.update'
                        || $route == 'dashboard.structure.users.create'
                        || $route == 'dashboard.structure.departments.index'
                        || $route == 'dashboard.structure.designations.index'
                        || $route == 'dashboard.structure.positions.index') active @endif" 
               href="{{ route('dashboard.structure.index') }}"><span class="material-icons-outlined">groups</span>{{ __('Структура') }}</a>
            
            <a class="@if($route == 'dashboard.knowledge.index' 
                        || $route == 'dashboard.knowledge.books'
                        || $route == 'dashboard.knowledge.books.single'
                        || $route == 'dashboard.knowledge.books.create'
                        || $route == 'dashboard.knowledge.videos'
                        || $route == 'dashboard.knowledge.videos.single'
                        || $route == 'dashboard.knowledge.videos.create'
                        || $route == 'dashboard.knowledge.create') active @endif"
               href="{{ route('dashboard.knowledge.index') }}"><span class="material-icons-outlined">auto_stories</span>{{ __('Центр знаний') }}</a>

            <a class="@if($route == 'dashboard.news.index' || $route == 'dashboard.news.single' || $route == 'dashboard.news.create') active @endif"
            href="{{ route('dashboard.news.index') }}"><span class="material-icons-outlined">article</span>{{ __('Новости') }}</a>

            <a class="@if($route == 'dashboard.projects.index' || $route == 'dashboard.projects.single' || $route == 'dashboard.projects.create') active @endif"
            href="{{ route('dashboard.projects.index') }}"><span class="material-icons-outlined">equalizer</span>{{ __('Проекты') }}</a>

            <a class="@if($route == 'dashboard.videos.index' || $route == 'dashboard.videos.single' || $route == 'dashboard.videos.create') active @endif"
            href="{{ route('dashboard.videos.index') }}"><span class="material-icons-outlined">videocam</span>{{ __('Видео') }}</a>

            <a class="@if($route == 'dashboard.galleries.index' || $route == 'dashboard.galleries.single' || $route == 'dashboard.galleries.create') active @endif"
            href="{{ route('dashboard.galleries.index') }}"><span class="material-icons-outlined">image</span>{{__('Галерея')}}</a>

            <a class="@if($route == 'dashboard.translations.index' || $route == 'dashboard.translations.single') active @endif"
            href="{{ route('dashboard.translations.index') }}"><span class="material-icons-outlined">translate</span>{{__('Переводы')}}</a>

         @endif {{-- Admin links end --}}

         {{-- Logout button --}}    
         <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"><span class="material-icons-outlined">logout</span>{{ __('Выйти') }}</button>
         </form>

      </div>{{-- Dashboard links end --}}
      
   </div> {{-- Dashboard end --}}
</div>
