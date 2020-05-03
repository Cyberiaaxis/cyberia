<?php

namespace App\Http\Controllers;

use App\{ Attack, User};
use Auth;
use Illuminate\Http\Request;

class AttacksController extends Controller
{
    protected $message = [];

    protected $attacker ;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->attacker = auth()->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackPerform($defender)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(User $defender)
    {
        try {
            $this->isAttackable($defender);
            $this->isSameLocation($defender);
            $this->canAttack();
            $this->canBeAttacked($defender);
            $this->attackPerform($defender);
            // $defender->canBeAttackedBy();
        }catch (\Exception $e){
             return $e->getMessage();
        }

        // try {
        //     $this->attacker->canAttack();
        //     $defender->canBeAttacked();
        //     $defender->canBeAttackedBy();
        //     $this->doAttack($src, $dst);
        // } catch (Engine\Attack\Exception $e) {
        //     // ... reporting
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function canAttack()
    {
        if(!empty($this->attacker->userdetails->hospital))
        {
            throw new \ErrorException('You are in hospital.');
        }

        if (!empty($this->attacker->userdetails->jail))
        {
            throw new \ErrorException('You are in jail.');
        }

        if($this->attacker->stats->energy < (int) ((50 / 100) * (int) $this->attacker->stats->max_energy))
        {
            throw new \ErrorException('Your energy is down.');
        }

        if($this->attacker->stats->hp > 10)
        {
            throw new \ErrorException('Your energy is hp.');
        }

    return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attack  $attack
     * @return \Illuminate\Http\Response
     */
    public function canBeAttacked($defender)
    {
        if (!empty($defender->userdetails->hospital)) {
            throw new \ErrorException('Defender are in hospital.');
        }

        if (!empty($defender->userdetails->jail)) {
            throw new \ErrorException('Defender are in jail.');
        }

    return 'true';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attack  $attack
     * @return \Illuminate\Http\Response
     */
    public function isAttackable($defender)
    {
        if ($this->attacker->id === $defender->id) {
            throw new \ErrorException('You can not attack on yourself.');
        }

    return 'true';
    }

    public function isSameLocation($defender)
    {
        if ($this->attacker->userdetails->location !== $defender->userdetails->location) {
            throw new \ErrorException('Both should be on same location.');
        }

    return 'true';
    }
}

// https://pastebin.com/hd8hAJPA
