<?php

namespace App\Http\Controllers;

use App\Model\{UserReward, UserDetail, UserCrime, User, Rank, Attack, Area, RealEstate, UserStats};
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The attributes that are assignable.
     *
     * @var
     */
    protected   $area,
                $attack,
                $userDetails,
                $userStats,
                $userRank,
                $userCrime,
                $realEstate,
                $userReward,
                $carbon;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->loginUser = auth()->user();
            return $next($request);
        });
        $this->rank = new Rank();
        $this->user = new User();
        $this->userDetails = new UserDetail();
        $this->userCrime = new UserCrime();
        $this->userStats = new UserStats();
        $this->carbon = new Carbon();
        $this->realEstate = new RealEstate();
        $this->userReward = new UserReward();
        $this->attack = new Attack();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = $this->user->getUserNameById($this->loginUser->id);

    return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function name()
    {
        return $this->user->getUserNameById($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function rank()
    {
        $rankId = $this->userDetails->getRankId($this->loginUser->id);
    return $this->rank->getRankById($rankId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function activeHouse()
    {
        $houseId = $this->userDetails->getActiveEstate($this->loginUser->id);
    return $this->realEstate->getHouseById($houseId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function area()
    {
        $areaId = $this->userDetails->getLocation($this->loginUser->id);
    return $this->area->getAreaById($areaId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalAwards()
    {
        return $this->userReward->getTotalRewards($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalCrimes()
    {
        return $this->userCrime->getSuccessCrimes($this->loginUser->id) + $this->userCrime->getFailCrimes($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalAttacks()
    {
        return $this->attack->getAttacks($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asAttackerLost()
    {
        $attack = new Attack();
        $totalAttacks = $this->totalAttacks();
        $asAttackerWon = $attack->getAttackSuccess(auth()->user()->id);
        $asAttackerSettlement = $attack->getSettlementAttacker(auth()->user()->id);
        $asAttackerEscaped = $attack->getEscapedAttacker(auth()->user()->id);
    return $totalAttacks - ($asAttackerWon + $asAttackerSettlement + $asAttackerEscaped);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asAttackerWon()
    {
        return $this->attack->getAttackSuccess($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asAttackerSettlement()
    {
        return $this->attack->getSettlementAttacker($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asAttackerEscaped()
    {
        return $this->attack->getEscapedAttacker($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asDefenderWon()
    {
        return $this->attack->getDefenseSuccess($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asDefenderLost()
    {
        // $attack = new Attack();
        // return $attack->getDefenseSuccess(auth()->user()->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asDefender()
    {
        return $this->attack->getDefenses($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asDefenderEscaped()
    {
        return $this->attack->getEscapedDefender($this->loginUser->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function asDefenderSettlement()
    {
        return $this->attack->getSettlementDefender($this->loginUser->id);
    }
}
