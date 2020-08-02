<?php

namespace App\Providers;

use App\Model\UserStats;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer(['*player'], function ($view) {
        //     $userStats = null;
        //     if (auth()->check()) {
        //         $userStats = new UserStats();
        //         $userStats =  $userStats->userStats(auth()->user()->id);
        //     }
        //     $view->with([
        //         'userStats' => $userStats
        //     ]);
        // });
    }
}
