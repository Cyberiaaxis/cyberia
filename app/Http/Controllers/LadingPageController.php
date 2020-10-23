<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LadingPageController extends Controller
{
    /**
     * Display a listing of the users.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listTopPlayer()
    {
        $user = new User();
    return response()->json($user->getTopPlayers());
    }
}
