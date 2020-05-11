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
        if($this->energy(auth()->user()->stats->energy) === false){
            return response()->json(['success' => false, 'message' => "You've no more enegry to train"]);
        }

        $getTrain = $this->canTrain($request);
        $updatedenergy = (int) auth()->user()->stats->energy - $getTrain['gymtimes'];
        $totalgain = 0; $will = 0;

        for ($i = 0; $i <= $getTrain['gymtimes'] && auth()->user()->stats->energy > 0; $i++)
        {
            $gain = rand(1, 3) / rand(800, 1000) * rand(800, 1000)
                * ((auth()->user()->stats->will + 20) / 150);
            $totalgain += $gain;
            $willrandom = (int) (rand(1, 3));

            if (auth()->user()->stats->will >= $willrandom)
            {
                $will = auth()->user()->stats->will -= $willrandom;
            }
        }

        auth()->user()->stats()->increment($getTrain['field'], $totalgain, ['energy'=> $updatedenergy, 'will' => $will]);
    return response()->json(['success' => true, 'message' => "You've successfully gained ". $getTrain['field'] . " " . $totalgain ]);
    }

    /**
     * Show the profile for the given user.
     *
     * @param
     * @return
     */
    public function canTrain($request){

        $gymtimes = $field = null;

        if ($request->has('strength')) {
            $request->validate(['strength' => ['required', 'integer', 'min:1']]);
            $gymtimes = ($request->strength > auth()->user()->stats->energy) ?  (int) auth()->user()->stats->energy : (int) $request->strength;
            $field = 'strength';
        }

        if ($request->has('agility')) {
            $request->validate(['agility' => ['required', 'integer', 'min:1']]);
            $gymtimes = ($request->agility > auth()->user()->stats->energy) ? (int) auth()->user()->stats->energy : (int) $request->agility;
            $field = 'agility';
        }

        if ($request->has('endurance')) {
            $request->validate(['endurance' => ['required', 'integer', 'min:1']]);
            $gymtimes = ($request->endurance > auth()->user()->stats->energy) ? (int) auth()->user()->stats->energy : (int) $request->endurance;
            $field = 'endurance';
        }

        if ($request->has('defense')) {
            $request->validate(['defense' => ['required', 'integer', 'min:1']]);
            $gymtimes = ($request->defense > auth()->user()->stats->energy) ? (int) auth()->user()->stats->energy : (int) $request->defense;
            $field = 'defense';
        }

    return ['gymtimes' => $gymtimes, 'field' => $field];
    }

    public function energy($energy)
    {
        if ($energy <= 0)
        {
            return false;
        }
    }

}
