<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\User;
use Illuminate\Pagination\Paginator;


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

        view()->composer('templates.master', function ($view) {
            $view->with('route', \Route::currentRouteName());
        });
        
        view()->composer('templates.master', function ($view) {
            $news = News::latest()->take(2)->get();
            $view->with('news', $news);
        });

        view()->composer('templates.master', function ($view) {
            $todayBDs = User::whereMonth('birth_date', date('m'))
            ->whereDay('birth_date', date('d'))
            ->get();

            $view->with('todayBDs', $todayBDs);
        });

        view()->composer('templates.master', function ($view) {
            $tomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 1 day')))
                            ->whereDay('birth_date', date('d', strtotime('+ 1 day')))
                            ->get();
            $view->with('tomorrowBDs', $tomorrowBDs);
        });

        view()->composer('templates.master', function ($view) {
            $afterTomorrowBDs = User::whereMonth('birth_date', date('m', strtotime('+ 2 day')))
                                ->whereDay('birth_date', date('d', strtotime('+ 2 day')))
                                ->get();
            $view->with('afterTomorrowBDs', $afterTomorrowBDs);
        });
    }
}
