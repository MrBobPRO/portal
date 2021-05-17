<?php

namespace App\Providers;

use App\Models\Chat;
use App\Models\Complaint;
use App\Models\Idea;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

        \Schema::defaultStringLength(191);

        // share chat data with all routes
        view()->composer('templates.chat', function ($view) {
            $view->with('chat', Chat::latest()->take(20)->get()->reverse());
        });

        view()->composer('templates.chat', function ($view) {
            $view->with('oldestMsgId', Chat::latest()->take(20)->get()->reverse()->first()->id);
        });

        view()->composer('templates.chat', function ($view) {
            $view->with('lastMsgId', Chat::latest()->first()->id);
        });

        //route name
        view()->composer('templates.master', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        view()->composer('templates.no_sidebar_master', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        view()->composer('dashboard.templates.master', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        view()->composer('dashboard.templates.no_sidebar_master', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        view()->composer('templates.breadcrumbs', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        //share with dashboard ideas and complaints counts
        view()->composer('templates.dashboard', function ($view) {
            $view->with('newIdeasCount', Idea::where('new', true)->count());
        });
        
        view()->composer('templates.dashboard', function ($view) {
            $view->with('newComplaintsCount', Complaint::where('new', true)->count());
        });

        //share notifications count with toolbar
        view()->composer('templates.toolbar', function ($view) {
            $view->with('notificationsCount', Notification::where('new', true)
                 ->where('user_id', Auth::user()->id)
                 ->count());
        });

        //sidebar news and bdays
        view()->composer('templates.sidebar', function ($view) {
            $latest_news = News::latest()->take(2)->get();
            $view->with('latest_news', $latest_news);
        });

        view()->composer('templates.sidebar', function ($view) {
            $todayBDs = User::whereMonth('birth_date', date('m'))
            ->whereDay('birth_date', date('d'))
            ->get();

            $view->with('todayBDs', $todayBDs);
        });

        view()->composer('templates.sidebar', function ($view) {
            $tomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 1 day')))
                            ->whereDay('birth_date', date('d', strtotime('+ 1 day')))
                            ->get();
            $view->with('tomorrowBDs', $tomorrowBDs);
        });

        view()->composer('templates.sidebar', function ($view) {
            $afterTomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 2 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 2 day')))
                                ->get();
            $view->with('afterTomorrowBDs', $afterTomorrowBDs);
        });
    }
}
