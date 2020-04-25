<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * Forum List
     */
    public function create(Request $request, Forum $forum)
    {
       dd($forum);
        return view('player.forums.create', ['forum' => $forum]);
    }

    /**
     * Forum List
     */
    public function store(Request $request)
    {
        // return view('player.forums.create');
    }

    /**
     * Forum List
     */
    public function show(Request $request)
    {
       dd($request);
        return view('player.forums.create');
    }


}
