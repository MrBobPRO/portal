<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Idea;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\Notification;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\Viewed;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

        // share route name
        view()->composer(['templates.master', 'templates.no_sidebar_master', 'dashboard.templates.master', 'dashboard.templates.no_sidebar_master', 'templates.breadcrumbs'], function ($view) {

            $view->with('route', \Route::currentRouteName());

        });

        //share notifications count & new questionnaires count with toolbar
        view()->composer('templates.toolbar', function ($view) {

            $user = Auth::user();
            $userCreatedAt = \Carbon\Carbon::parse($user->created_at);
            $formatted = $userCreatedAt->isoFormat('YYYY-MM-DD');

            //get all ideas and minus by already viewed ideas by current user
            $questionnairesCount = Questionnaire::whereDate('created_at', '>=', $formatted)->count();
            $viewedCount = Viewed::whereDate('created_at', '>=', $formatted)->where('source', 'questionnaire')->where('user_id', $user->id)->count();
            $newQuestionnairesCount = $questionnairesCount - $viewedCount;

            $nootificationsCount = Notification::where('new', true)
                                    ->where('user_id', Auth::user()->id)
                                    ->count();

            $view->with('notificationsCount', $nootificationsCount)
                 ->with('newQuestionnairesCount', $newQuestionnairesCount);

        });

        //share new ideas count with dashboard
        view()->composer('templates.dashboard', function ($view) {

            $user = Auth::user();
            $userCreatedAt = \Carbon\Carbon::parse($user->created_at);
            $formatted = $userCreatedAt->isoFormat('YYYY-MM-DD');

            //get all ideas and minus by already viewed ideas by current user
            $ideasCount = Idea::whereDate('created_at', '>=', $formatted)->count();
            $viewedCount = Viewed::whereDate('created_at', '>=', $formatted)->where('source', 'idea')->where('user_id', $user->id)->count();
            $newIdeasCount = $ideasCount - $viewedCount;

            $view->with('newIdeasCount', $newIdeasCount);

        });

        //sidebar ads & news & birthdays
        view()->composer(['templates.sidebar', 'home.index'], function ($view) {

            $ads = Ads::latest()->get();
            $latest_news = News::latest()->take(2)->get();

            $todayBDs = User::whereMonth('birth_date', date('m'))
                                ->whereDay('birth_date', date('d'))
                                ->get();

            $tomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 1 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 1 day')))
                                ->get();

            $afterTomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 2 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 2 day')))
                                ->get();
            
            $soonBD3 = User::whereMonth('birth_date', date('m', strtotime('+ 3 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 3 day')))
                                ->get();

            $soonBD4 = User::whereMonth('birth_date', date('m', strtotime('+ 4 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 4 day')))
                                ->get();

            $soonBD5 = User::whereMonth('birth_date', date('m', strtotime('+ 5 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 5 day')))
                                ->get();

            $soonBD6 = User::whereMonth('birth_date', date('m', strtotime('+ 6 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 6 day')))
                                ->get();

            $soonBD7 = User::whereMonth('birth_date', date('m', strtotime('+ 7 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 7 day')))
                                ->get();

            $soonBDs = [$soonBD3, $soonBD4, $soonBD5, $soonBD6, $soonBD7];

            $view->with('ads', $ads)
                ->with('latest_news', $latest_news)
                ->with('todayBDs', $todayBDs)
                ->with('tomorrowBDs', $tomorrowBDs)
                ->with('afterTomorrowBDs', $afterTomorrowBDs)
                ->with('soonBDs', $soonBDs);
                
        });

    }
}
