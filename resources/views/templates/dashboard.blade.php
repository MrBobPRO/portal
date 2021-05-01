
<div class="no-selection dashboard-btn">

   <span class="material-icons-outlined m-lang" onclick="toogleDashboard()">menu</span>
   <div id="dashboard" class="dashboard {{session('dashboard') == 'hidden' ? 'hidden' : ''}}" 
      style="background-image: url({{asset('img/dashboards/' . \Auth::user()->dashBg)}})">

      <div id="dashOverlay" class="overlay {{\Auth::user()->darkMode == '1' ? '' : 'show'}}"></div>
      <div class="profile-ava">
         <a href="#"><img src="{{ asset('img/users/' . \Auth::user()->avatar) }}">{{\Auth::user()->name}}</a>
      </div>

      <div class="dash-links">
         <a class="{{$route == 'dashboard.profile.index' ? 'active' : ''}}" href=" {{ route('dashboard.profile.index') }} "><span class="material-icons-outlined">manage_accounts</span>{{ __('Профиль') }}</a>

         <a class="{{$route == 'dashboard.settings.index' ? 'active' : ''}}" href="{{ route('dashboard.settings.index') }}"><span class="material-icons-outlined">drive_file_rename_outline</span>{{ __('Настройки') }}</a>

         <a class="@if($route == 'dashboard.users.index' || $route == 'dashboard.users.single') active @endif"
          href="{{ route('dashboard.users.index') }}"><span class="material-icons-outlined">face</span>Сотрудники</a>

         <a href="#"><span class="material-icons-outlined">star_outline</span>{{ __('Бонусы') }}</a>

         <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"><span class="material-icons-outlined">logout</span>{{ __('Выйти') }}</button>
         </form>

      </div>
      
   </div>
</div>
