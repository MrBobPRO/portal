<div class="no-selection dashboard-btn">
   <span class="material-icons-outlined m-lang" onclick="toogleDashboard()">menu</span>
   <div id="dashboard" class="dashboard" style="background-image: url({{asset('img/main/dashboard-bg.jpg')}})">
      <div class="profile-ava">
         <a href="#"><img src="{{ asset('img/users/' . \Auth::user()->avatar) }}">{{\Auth::user()->name}}</a>
      </div>

      <div class="dash-links">
         <a class="active" href=" {{ route('dashboard.profile.index') }} "><span class="material-icons-outlined">manage_accounts</span>{{ __('Профиль') }}</a>
         <a href="#"><span class="material-icons-outlined">emoji_events</span>{{ __('Награды') }}</a>
         <a href="#"><span class="material-icons-outlined">star_outline</span>{{ __('Бонусы') }}</a>
         <a href="#"><span class="material-icons-outlined">drive_file_rename_outline</span>{{ __('Настройки') }}</a>
         <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit"><span class="material-icons-outlined">logout</span>{{ __('Выйти') }}</button>
         </form>

      </div>
      
   </div>
</div>
