<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param
     * @return
     */
    public function index()
    {
        return view('player.gym');
    }
    /**
     * Show the profile for the given user.
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $stat = explode("=", $request->name);
        return (int) $stat[1];
    }
    // $request->validate(); auth()->user()->stats->update([])



}
