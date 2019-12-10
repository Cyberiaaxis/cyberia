<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function roles()
    {
        return view('role');
    }

}
