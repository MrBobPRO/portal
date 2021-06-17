
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
            <button class="search-btn" type="button">
                <span class="material-icons-outlined">search</span>
            </button>
            <button class="account" type="button">
                {{__('Личный кабинет')}}
            </div>
            <button class="close-btn" type="button">
                <span class="material-icons-outlined">close</span>
            </button>
        </div>

</div>

