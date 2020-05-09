<?php

namespace App\Http\Controllers;

use App\{ Attack, ItemEffect, User};
use App\Model\UserSlot;
use Auth;
use Illuminate\Http\Request;

class AttacksController extends Controller
{
    protected $message = [];

    protected $attacker ;

    /**
     * Instantiate a new AttacksController instance.
     */
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

        $effect = UserSlot::find(1);
        dd($effect->getWeaponValue('damage'));
        // dd (UserSlot::getSlot("primary_slot", $this->attacker)->get()); , 'fire_rate', 'accuracy'
        // dd($attack->where("item_id", $this->attacker->userslot->primary_slot)->select('damage')->value('damage'));
        // $mydamage =
        //     (int) (($r1['damage'] * $youdata['strength'] / $odata['guard'])
        //         * (rand(8000, 12000) / 10000));
        // $hitratio = min(50 * $ir['agility'] / $odata['agility'], 95);
        // $damage = $this->attacker->stats->strength - (20 / 2);
        // dd($damage);
    }
// damage = mydamagepower * mystrength / defence * (rand(8000, 12000) / 10000));
    /**
     * To verify the Attacker's hospital, jail, energy and hp status.
     *
     * @param  \App\User  $defender
     * @return Boolean
     */
    public function attack(User $defender)
    {
        if(!$this->canBeAttackedBy($defender))
        {
            return $this->message;
        }

        if(!$this->canAttack())
        {
            return $this->message;
        }
        if(!$this->canBeAttacked($defender))
        {
            return $this->message;
        }
        $this->attackPerform($defender);
    }

    /**
     * To verify the Attacker's hospital, jail, energy and hp status.
     *
     * @param
     * @return Boolean
     */
    public function canAttack()
    {
        if(!empty($this->attacker->userdetails->hospital))
        {
            $this->message = 'You are in hospital.';
        return false;
        }

        if (!empty($this->attacker->userdetails->jail))
        {
            $this->message = 'You are in jail.';
        return false;
        }

        if($this->attacker->stats->energy < (int) ((50 / 100) * (int) $this->attacker->stats->max_energy))
        {
            $this->message = 'Your energy is down.';
        return false;
        }

        if($this->attacker->stats->hp < 10)
        {
            $this->message = 'Your hp is down.';
        return false;
        }

    return true;
    }

    /**
     * To verify the defender's hospital and jail status.
     *
     * @param  \App\User  $defender
     * @return Boolean
     */
    public function canBeAttacked($defender)
    {
        if (!empty($defender->userdetails->hospital))
        {
            $this->message = 'Defender are in hospital.';
        return false;
        }

        if (!empty($defender->userdetails->jail))
        {
           $this->message = 'Defender are in jail.';
        return false;
        }

    return true;
    }

    /**
     * To verify the defender and attacker location and protection from self attack.
     *
     * @param  \App\User  $defender
     * @return Boolean
     */
    public function canBeAttackedBy($defender)
    {
        // if ($this->attacker->id === $defender->id)
        // {
        //     $this->message = 'You can not attack on yourself.';
        // return false;
        // }
        if ($this->attacker->userdetails->location->name !== $defender->userdetails->location->name)
        {
            $this->message = 'Both should be on same location.';
        return false;
        }

    return true;
    }
}

// https://pastebin.com/hd8hAJPA
