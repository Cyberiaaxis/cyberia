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
        // return $request;
        if ($request->has('strength'))
        {
            $request->validate(['strength' => ['required', 'integer']]);
            $gymtimes = $request->strength;
            $field = 'strength';
        }

        if ($request->has('agility'))
        {
            $request->validate(['agility' => ['required', 'integer']]);
            $gymtimes = $request->agility;
            $field = 'agility';
        }

        if ($request->has('endurance'))
        {
            $request->validate(['endurance' => ['required', 'integer']]);
            $gymtimes = $request->endurance;
            $field = 'endurance';
        }

        if ($request->has('defence'))
        {
            $request->validate(['defence' => ['required', 'integer']]);
            $gymtimes = $request->defence;
            $field = 'defence';

        }

        $updatedenergy = (int) auth()->user()->stats->energy - (int) $gymtimes;
        $totalgain = 0; $will = 0;
        for ($i = 0; $i <= $gymtimes && auth()->user()->stats->energy > 0; $i++){
            $gain = rand(1, 3) / rand(800, 1000) * rand(800, 1000)
                * ((auth()->user()->stats->will + 20) / 150);
            $totalgain += $gain;
            $willrandom = (int) (rand(1, 3));
            if (auth()->user()->stats->will >= $willrandom) {
                $will = auth()->user()->stats->will -= $willrandom;
            }
        }
        auth()->user()->stats()->increment($field, $totalgain);
        auth()->user()->stats()->update(['energy'=> $updatedenergy, 'will' => $will]);
        return response()->json(['success' => true, "You've successfully gained $field"]);
    }



}
