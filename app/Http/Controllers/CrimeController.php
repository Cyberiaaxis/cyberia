<?php

namespace App\Http\Controllers;

use DB;
use App\{Crime, UserStats};
use App\model\CrimeMessage;
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
        $crimes = Crime::where('location_id', $location_id)->where('level', $user_level)->whereNull('parent_id')->get();
        // dd($request->ajax());
        if ($request->ajax()) {
            return response()->json(['html' => view('ajax.crime', ['crimes' => $crimes])->render()]);
        }

    return view('player.crime');
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
        $successRate = rand (5 , 50);
        $statusKey = 'fail';

        if($successRate < 13 && $successRate > 10  ){
            $statusKey = 'success';
        } elseif ($successRate < 10 && $successRate > 5) {
            $statusKey = 'missed';
        }

        $message = CrimeMessage::where('status', $statusKey)->where('crime_id', $request->crime_id)->first();

        if($statusKey ==! 'missed') {
            $user = ['user_id' => auth()->user()->id, 'crime_id' => $request->crime_id];
            UserCrime::updateOrCreate($user)->increment($statusKey);
        }

    return response()->json(['html' => view('ajax.crime', ['status' => $statusKey, 'message' => $message])->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Crime $crime)
    {
        $exists = $crime->subCrimes($crime->id)->exists();

        if ($exists) {
            $data = ['crimes' => $crime->subCrimes($crime->id)->get()];
        } else {
            $data = ['done_crime' => $crime];
        }

    return response()->json([ 'html' => view('ajax.crime', $data)->render() ]);
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
