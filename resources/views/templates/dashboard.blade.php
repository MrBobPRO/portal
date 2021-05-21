
<?php $userr = \Auth::user(); ?>
<div class="no-selection dashboard-btn">
   {{-- Toogle button --}}
   <span class="material-icons-outlined dash-toogler" onclick="toogleDashboard()">menu</span>
   {{-- Dashboard start --}}
   <div id="dashboard" class="dashboard {{session('dashboard') == 'hidden' ? 'hidden' : ''}}" 
      style="background-image: url({{asset('img/dashboards/' . $userr->dashBg)}})">

      <div id="dashOverlay" class="overlay {{$userr->darkMode == '1' ? '' : 'show'}}"></div>

      <div class="profile-ava">
         <a href="#"><img src="{{ asset('img/users/' . $userr->avatar) }}">{{$userr->name}}</a>
      </div>

      {{-- Dashboard links start --}}
      <div class="dash-links">
         <a class="{{$route == 'dashboard.profile.index' ? 'active' : ''}}" href=" {{ route('dashboard.profile.index') }} "><span class="material-icons-outlined">manage_accounts</span>{{ __('Профиль') }}</a>

         <a class="{{$route == 'dashboard.settings.index' ? 'active' : ''}}" href="{{ route('dashboard.settings.index') }}"><span class="material-icons-outlined">drive_file_rename_outline</span>{{ __('Настройки') }}</a>

         <a class="@if($route == 'dashboard.users.index' || $route == 'dashboard.users.single') active @endif"
          href="{{ route('dashboard.users.index') }}"><span class="material-icons-outlined">face</span>Сотрудники</a>

         {{-- Admin links tart --}}
         @if($userr->role == 'admin')
            <div class="dash-links-seperator"></div>

            <a class="@if($route == 'dashboard.news.index' || $route == 'dashboard.news.single' || $route == 'dashboard.news.create') active @endif"
            href="{{ route('dashboard.news.index') }}"><span class="material-icons-outlined">article</span>{{ __('Новости') }}</a>

            <a class="@if($route == 'dashboard.ideas.index' || $route == 'dashboard.ideas.single') active @endif"
               href="{{ route('dashboard.ideas.index') }}"><span class="material-icons-outlined idea-icon">tungsten</span>Идеи
               @if($newIdeasCount > 0) ({{$newIdeasCount}}) @endif
            </a>

            <a class="@if($route == 'dashboard.complaints.index' || $route == 'dashboard.complaints.single') active @endif"
               href="{{ route('dashboard.complaints.index') }}"><span class="material-icons-outlined">sentiment_dissatisfied</span>Жалобы
               @if($newComplaintsCount > 0) ({{$newComplaintsCount}}) @endif   
            </a>

            <a class="@if($route == 'dashboard.videos.index' || $route == 'dashboard.videos.single' || $route == 'dashboard.videos.create') active @endif"
            href="{{ route('dashboard.videos.index') }}"><span class="material-icons-outlined">videocam</span>{{ __('Видео') }}</a>

            <a class="@if($route == 'dashboard.galleries.index' || $route == 'dashboard.galleries.single' || $route == 'dashboard.galleries.create') active @endif"
            href="{{ route('dashboard.galleries.index') }}"><span class="material-icons-outlined">image</span>Галерея</a>

            <a class="@if($route == 'dashboard.projects.index' || $route == 'dashboard.projects.single' || $route == 'dashboard.projects.create') active @endif"
            href="{{ route('dashboard.projects.index') }}"><span class="material-icons-outlined">equalizer</span>{{ __('Проекты') }}</a>

            <a class="@if($route == 'dashboard.knowledge.index' || $route == 'dashboard.knowledge.single') active @endif"
            href="#"><span class="material-icons-outlined">auto_stories</span>{{ __('Центр знаний') }}</a>

         @endif {{-- Admin links end --}}

         {{-- Logout button --}}
         <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"><span class="material-icons-outlined">logout</span>{{ __('Выйти') }}</button>
         </form>

      </div>{{-- Dashboard links end --}}
      
   </div> {{-- Dashboard end --}}
</div>
