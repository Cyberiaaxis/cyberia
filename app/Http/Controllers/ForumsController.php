<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Forum List
     */
    public function index()
    {
        $forums = new Forum();
        $forumsCount = $forums->withCount(['threads', 'posts'])->get();
        return view('player.forums.index',['forums' => $forumsCount]);
    }

    /**
     * Forum List
     */
    public function show()
    {
        // return view('player.forums.create');
    }

    /**
     * Forum List
     */
    public function create()
    {
        return view('player.forums.create');
    }


}
