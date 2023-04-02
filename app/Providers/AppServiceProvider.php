<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Calendar\CalendarView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view)
        {
            $view->with('calendar', new CalendarView(time()));
        });
    }
}
