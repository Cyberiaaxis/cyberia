<?php

namespace App\Http\Controllers;

use App\Model\{ Attack, User, Item, UserDetail, UserSlot, UserStats, WeaponAttribute};
use Auth;
use Exception;
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
    public function attackStart($user, $userDeatils, $userStats)
    {
        $this->canAttack($user, $userDeatils, $userStats);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(User $user)
    {
        $userDeatils = new UserDetail();
        $userStats = new UserStats();
        $this->attackStart($user, $userDeatils, $userStats);
        dd($this->attackPerform($user));
        $this->attackEnd($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackEnd($user)
    {
        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function canAttack($user, $userDeatils, $userStats)
    {
        $haveEnergy = $userStats->getEnergy($user->id) < (int) ($userStats->getMaxEnergy($user->id)/2);
        $isSameLocation = $userDeatils->getLocation($user->id) !== $this->attacker->userDetails->location_id;
        $isHospitalized = $userDeatils->getHospitalTime($user->id);
        $isJailed = $userDeatils->getJailTime($user->id);

        if($haveEnergy) {
            throw new Exception("You don't have enough energy");
        } elseif ($isSameLocation) {
            throw new Exception("Player isn't on same location");
        } elseif ($isHospitalized) {
            throw new Exception("Player already is hospitalized");
        } elseif ($isJailed) {
            throw new Exception("Player already is Jailed");
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function turn($oldTurnNumber)
    {
        return $oldTurnNumber++;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doTurn($attacker, $defender,  $nextTurnAssignment)
    {
        if($nextTurnAssignment%2 == 0)
        {
            return $defender;
        }

    return $attacker;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackPerform($user)
    {
        $equippedWeapon = $this->equippedWeapons($user);
        return $this->equippedWeaponAttributes($equippedWeapon['attackerPrimaryWeaponId']) ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equippedWeapons($user)
    {
        $userSlots = new UserSlot();
        $items = new Item();
        $attackerWeapons = $userSlots->getUserWeaponsById($this->attacker->id);
        $deffenderWeapons = $userSlots->getUserWeaponsById($user->id);
        $attackerPrimaryWeaponName = $items->getWeaponNameById($attackerWeapons->primary_slot);
        $attackerSecondaryWeaponName = $items->getWeaponNameById($attackerWeapons->secondary_slot);
        $defenderPrimaryWeaponName = $items->getWeaponNameById($deffenderWeapons->primary_slot);
        $defenderSecondaryWeaponName = $items->getWeaponNameById($deffenderWeapons->secondary_slot);
    return [
            'attackerPrimaryWeaponId' => $attackerWeapons->primary_slot,
            'attackerPrimaryWeaponName' => $attackerPrimaryWeaponName,
            'attackerSecondaryWeaponId' => $attackerWeapons->secondary_slot,
            'attackerSecondaryWeaponName' => $attackerSecondaryWeaponName,
            'defenderPrimaryWeaponId' => $deffenderWeapons->primary_slot,
            'defenderPrimaryWeaponName' => $defenderPrimaryWeaponName,
            'defenderSecondaryWeaponId' => $deffenderWeapons->secondary_slot,
            'defenderSecondaryWeaponName' => $defenderSecondaryWeaponName
          ];
    }

    public function equippedWeaponAttributes($itemId)
    {
        $items = new Item();
        $weaponAttributes = new WeaponAttribute();
        $weaponAtrributeId = $items->getItemAttributeById($itemId);
    return $weaponAttributes->getattributesById($weaponAtrributeId);
    }
}






//     protected $message = [];

//     protected $attacker ;

//     /**
//      * Instantiate a new AttacksController instance.
//      */
//     public function __construct()
//     {
//         $this->middleware(function ($request, $next) {
//             $this->attacker = auth()->user();
//             return $next($request);
//         });
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function attackPerform($defender)
//     {

//         $effect = UserSlot::find(1);
//         dd($effect->getWeaponValue('damage'));
//         // dd (UserSlot::getSlot("primary_slot", $this->attacker)->get()); , 'fire_rate', 'accuracy'
//         // dd($attack->where("item_id", $this->attacker->userslot->primary_slot)->select('damage')->value('damage'));
//         // $mydamage =
//         //     (int) (($r1['damage'] * $youdata['strength'] / $odata['guard'])
//         //         * (rand(8000, 12000) / 10000));
//         // $hitratio = min(50 * $ir['agility'] / $odata['agility'], 95);
//         // $damage = $this->attacker->stats->strength - (20 / 2);
//         // dd($damage);
//     }
// // damage = mydamagepower * mystrength / defence * (rand(8000, 12000) / 10000));
//     /**
//      * To verify the Attacker's hospital, jail, energy and hp status.
//      *
//      * @param  \App\User  $defender
//      * @return Boolean
//      */
//     public function attack(User $defender)
//     {
//         if(!$this->canBeAttackedBy($defender))
//         {
//             return $this->message;
//         }

//         if(!$this->canAttack())
//         {
//             return $this->message;
//         }
//         if(!$this->canBeAttacked($defender))
//         {
//             return $this->message;
//         }
//         $this->attackPerform($defender);
//     }

//     /**
//      * To verify the Attacker's hospital, jail, energy and hp status.
//      *
//      * @param
//      * @return Boolean
//      */
//     public function canAttack()
//     {
//         if(!empty($this->attacker->userdetails->hospital))
//         {
//             $this->message = 'You are in hospital.';
//         return false;
//         }

//         if (!empty($this->attacker->userdetails->jail))
//         {
//             $this->message = 'You are in jail.';
//         return false;
//         }

//         if($this->attacker->stats->energy < (int) ((50 / 100) * (int) $this->attacker->stats->max_energy))
//         {
//             $this->message = 'Your energy is down.';
//         return false;
//         }

//         if($this->attacker->stats->hp < 10)
//         {
//             $this->message = 'Your hp is down.';
//         return false;
//         }

//     return true;
//     }

//     /**
//      * To verify the defender's hospital and jail status.
//      *
//      * @param  \App\User  $defender
//      * @return Boolean
//      */
//     public function canBeAttacked($defender)
//     {
//         if (!empty($defender->userdetails->hospital))
//         {
//             $this->message = 'Defender are in hospital.';
//         return false;
//         }

//         if (!empty($defender->userdetails->jail))
//         {
//            $this->message = 'Defender are in jail.';
//         return false;
//         }

//     return true;
//     }

//     /**
//      * To verify the defender and attacker location and protection from self attack.
//      *
//      * @param  \App\User  $defender
//      * @return Boolean
//      */
//     public function canBeAttackedBy($defender)
//     {
//         // if ($this->attacker->id === $defender->id)
//         // {
//         //     $this->message = 'You can not attack on yourself.';
//         // return false;
//         // }
//         if ($this->attacker->userdetails->location->name !== $defender->userdetails->location->name)
//         {
//             $this->message = 'Both should be on same location.';
//         return false;
//         }

//     return true;
//     }
