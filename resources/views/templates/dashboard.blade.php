<div class="dashboard-btn">
   <span class="material-icons-outlined m-lang">menu</span>
   <div id="dashboard" class="dashboard" style="background-image: url({{asset('img/main/dashboard-bg.jpg')}})">
      <div class="profile-ava">
         <a href="#"><img src="{{ asset('img/main/' . \Auth::user()->avatar) }}">{{\Auth::user()->name}} {{\Auth::user()->surname}}</a>
      </div>

      <div class="dash-links">
         <a href="#"><span class="material-icons-outlined">manage_accounts</span>{{ __('Профиль') }}</a>
         <a href="#"><span class="material-icons-outlined">emoji_events</span>{{ __('Награды') }}</a>
         <a href="#"><span class="material-icons-outlined">star_outline</span>{{ __('Бонусы') }}</a>
         <a href="#"><span class="material-icons-outlined">drive_file_rename_outline</span>{{ __('Настройки') }}</a>
         <a href="#"><span class="material-icons-outlined">logout</span>{{ __('Выйти') }}</a>
      </div>
      
   </div>
</div>
