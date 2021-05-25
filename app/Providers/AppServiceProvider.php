<?php

namespace App\Providers;

use App\Models\Complaint;
use App\Models\Idea;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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

        // share route name
        view()->composer(['templates.master', 'templates.no_sidebar_master', 'dashboard.templates.master', 'dashboard.templates.no_sidebar_master', 'templates.breadcrumbs'], function ($view) {
            $view->with('route', \Route::currentRouteName());
        });

        //share with dashboard complaints counts
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
