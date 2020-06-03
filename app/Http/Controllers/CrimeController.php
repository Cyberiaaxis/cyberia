<?php

namespace App\Http\Controllers;

use DB;
use App\Model\{Crime, UserStats, CrimeMessage, UserCrime};
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    protected $crime;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLevel = auth()->user()->userdetails->level_id;
        $locationId = auth()->user()->userdetails->location_id;
        $crime = new Crime();
        $crimes = $crime->crimesList($locationId, $userLevel);
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
        $this->crime = new Crime();

        if(!$this->canDoCrime(auth()->user()->stats->nerve, $request->crime_id))
        {
            return "You don't have enough nerve";
        }

        $successRate = rand (5 , 50);
        $statusKey = 'fail';
        $statusType = 'bg-danger';


        if($successRate < 13 && $successRate > 10  ){
            $statusKey = 'success';
            $statusType = 'bg-success';
        } elseif ($successRate < 10 && $successRate > 5) {
            $statusKey = 'missed';
            $statusType = 'bg-warning';
        }
//1000 ** (1 / 3)  https://paste.gg/p/anonymous/5cd1ee6a26df41b2a601d794567e5c1e  https://paste.ubuntu.com/p/ZqM4mPCsft/
        $message = new CrimeMessage();
        $message = $message->message($statusKey, $request->crime_id);

        if($statusKey ==! 'missed') {
            $user = ['user_id' => auth()->user()->id, 'crime_id' => $request->crime_id];
            $userCrime = new UserCrime();
            $userCrime->addCrime($user, $statusKey);

        }

        $userStats = new UserStats();
        $userStats->decrementNerve(auth()->user()->id, auth()->user()->stats->nerve);

    return response()->json(['html' => view('ajax.crime', ['statusKey' => $statusKey, 'statusType' => $statusType, 'message' => $message])->render()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime;
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
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime;
     * @return \Illuminate\Http\Response
     */
    public function canDoCrime($userNerve, $crimeId)
    {
        $nerve =  $this->crime->getNerve($crimeId);

        if ($userNerve <= $nerve && $userNerve > 0 ) {
            return true;
        }

    return false;
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
