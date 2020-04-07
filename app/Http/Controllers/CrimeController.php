<?php

namespace App\Http\Controllers;

use DB;
use App\{Crime, UserStats};
use App\Model\UserCrime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_level = auth()->user()->stats->location_id;
        $location_id = auth()->user()->stats->level;
        $crimes = Crime::where('location_id', $location_id)->where('level', $user_level)->get();

        if ($request->ajax()) {
            return $crimes;
        }

    return view('player.crime', ['crimes' => $crimes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'crime_id' => ['required','int'] ]);
        $successRate = rand (15 , 30);
        $statusKey = 'fail';
        $messageType = false;

        if($successRate > 25){
            $statusKey = 'success';
            $messageType = true;
        }

        $user = ['user_id' => auth()->user()->id, 'crime_id' => $request->crime_id ];
        UserCrime::updateOrCreate($user)->increment($statusKey);

        return redirect()->route('crime.show', $request->crime_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Crime $crimes)
    {
        return response()->json([
            'html' => view('ajax.crime', ['crime' => $crimes])->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        //
    }
}
