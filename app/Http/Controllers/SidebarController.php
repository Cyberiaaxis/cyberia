<?php

namespace App\Http\Controllers;

use App\Model\UserDetail;
use App\Model\UserStats;
use Illuminate\Http\Request;

class SidebarController extends Controller
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $user,
              $userDetails,
              $userStats;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });

        $this->userDetails = new UserDetail();
        $this->userStats = new UserStats();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarMaxEnergy($userId)
    {
        return $this->userBarStats->getEnergy($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarEnergy($userId)
    {
        return $this->userBarStats->getMaxEnergy($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarEnergyfill($userId)
    {
        return ($this->userBarEnergy($userId) / $this->userBarMaxEnergy($userId) * 100);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function energyBar($userId)
    {

        $userMaxEnergy = $this->userBarMaxEnergy($userId);
        $userEnergy = $this->userBarEnergy($userId);
        $userEnergyfill = $this->userBarEnergyfill($userId);
        return ['userMaxEnergy' => $userMaxEnergy, 'userEnergy' => $userEnergy, 'userEnergyfill' => $userEnergyfill];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarMaxHP($userId)
    {
        return $this->userBarStats->getHp($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarHP($userId)
    {
        return $this->userBarStats->getMaxHp($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarHpfill($userId)
    {
        return ($this->userBarHP($userId) / $this->userBarMaxHP($userId) * 100);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function hpBar($userId)
    {

        $userMaxHp = $this->userBarMaxHp($userId);
        $userHp = $this->userBarHp($userId);
        $userHpfill = $this->userBarHpfill($userId);
    return ['userMaxHp' => $userMaxHp, 'userHp' => $userHp, 'userHpfil' => $userHpfill];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarMaxNerve($userId)
    {
        return $this->userBarStats->maxNerve($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarNerve($userId)
    {
        return $this->userBarStats->haveNerve($userId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userBarNervefill($userId)
    {
        return ($this->userBarNerve($userId) / $this->userBarMaxNerve($userId) * 100);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function nerveBar($userId)
    {

        $userMaxNerve = $this->userBarMaxNerve($userId);
        $userNerve = $this->userBarNerve($userId);
        $userNervefill = $this->userBarNervefill($userId);
    return ['userMaxNerve' => $userMaxNerve, 'userNerve' => $userNerve, 'userNervefil' => $userNervefill];
    }

}
