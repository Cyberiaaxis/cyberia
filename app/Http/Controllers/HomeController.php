<?php

namespace App\Http\Controllers;

use App\Model\UserStats;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserStats()
    {
        view()->composer(['*player'], function ($view) {
            $userStats = null;

            if (auth()->check())
            {
                $userStats = new UserStats();
                $userStats =  $userStats->userStats(auth()->user()->id);
            }

            $view->with(['userStats' => $userStats]);
        });

    }
}
