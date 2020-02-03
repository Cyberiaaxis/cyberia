<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Forum List
     */
    public function list(Request $request)
    {

        $forums = Forum::all();

        return view('forums.list',['forums' => $forums]);
    }
}