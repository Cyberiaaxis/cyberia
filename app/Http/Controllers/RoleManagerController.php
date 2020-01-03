<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleManagerController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth')->except('staff/logout');
    }
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function index()
    {
        return view('rolemanager');
    }
}
