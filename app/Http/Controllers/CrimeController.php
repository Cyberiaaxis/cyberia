<?php

namespace App\Http\Controllers;

use App\Model\{Crime, UserStats, CrimeMessage, UserCrime};
use Illuminate\Http\Request;

class CrimeController extends Controller
{

    protected $mode = ['easy', 'medium', 'hard'];
    protected $chances = [
        'easy' => ['success' => 70, 'fail' => 15, 'missed' => 15],
        'medium' => ['success' => 50, 'fail' => 20, 'missed' => 30],
        'hard' => ['success' => 25, 'fail' => 50, 'missed' => 25]
    ];

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $crime,
              $usercrime,
              $crimeMessage,
              $userStats;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
        $this->crime = new Crime();
        $this->usercrime =  new UserCrime();
        $this->crimeMessage = new CrimeMessage();
        $this->userStats = new UserStats();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLevel = auth()->user()->userdetails->level_id;
        $locationId = auth()->user()->userdetails->location_id;
        $crimes = $this->crime->crimesList($locationId, $userLevel);

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

        if(!$this->canDoCrime(auth()->user()->stats->nerve, $request->crime_id))
        {
            return response()->json(['html' => view('ajax.crime', ['error' => "You don't have enough nerve"])->render()]);
        }

        // return $this->getDifficulty($request->crime_id);
        $successRate = mt_rand (5 , 50);
        $statusKey = 'fail';
        $statusType = 'bg-danger';

        if($successRate < 13 && $successRate > 10  ){
            $statusKey = 'success';
            $statusType = 'bg-success';
        } else if ($successRate < 10 && $successRate > 5) {
            $statusKey = 'missed';
            $statusType = 'bg-warning';
        }

        $crimeMessage = $this->crimeMessage->message($statusKey, $request->crime_id);

        if($statusKey ==! 'missed') {
            $user = ['user_id' => auth()->user()->id, 'crime_id' => $request->crime_id];
            $this->userCrime->addCrime($user, $statusKey);

        }

        $this->userStats->decrementNerve(auth()->user()->id, auth()->user()->stats->nerve);

    return response()->json(['html' => view('ajax.crime', ['statusKey' => $statusKey, 'statusType' => $statusType, 'message' => $crimeMessage])->render()]);
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
    public function getDifficulty($crimeId)
    {
        $crime = new Crime();

        // echo (($iq * mt_rand($min, $max)) / $nerve) + ($level / 4) ?? 0;
// <newbie-chan> Player damage formula:  (attackers_attack + attackers_level) - (defenders_defense + difficulty_variable) + (random_number + (attackers_luck))
        // dd($this->mode);
        // $difficulty = array_rand($this->mode, 1);

        // return current($this->mode[$difficulty]);


        // $chance = mt_rand(1,100);

        // if($chance <  && $chance ){
        //     $color = 'bg-success';
        // } else if ($chance   && $chance ) {
        //     $color = 'bg-warning';
        // } else if ($chance   && $chance ) {
        //     $color = 'bg-danger';
        // }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime;
     * @return \Illuminate\Http\Response
     */
    public function canDoCrime($userNerve, $crimeId)
    {
        $getRequiredNerve =  $this->crime->getNerve($crimeId);
    return $userNerve >= $getRequiredNerve;
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
