<?php

namespace App\Http\Controllers;

use App\Model\{ Attack, User, Item, UserDetail, UserItem, UserSlot, UserStats, WeaponAttribute};
use Auth;
use Exception;
use Illuminate\Http\Request;


class AttacksController extends Controller
{

    protected $message = [];
    protected  $attacker,
               $defender,
               $userDetails,
               $userStats,
               $weaponAttributes,
               $userSlots,
               $items;

    /**
     * Instantiate a new AttacksController instance.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->attacker = auth()->user();
            return $next($request);
        });
        $this->userDetails = new UserDetail();
        $this->userStats = new UserStats();
        $this->items = new Item();
        $this->weaponAttributes = new WeaponAttribute();
        $this->userSlots = new UserSlot();
        $this->items = new Item();
    }

     public function __invoke(Request $request, User $defender)
     {
        $this->defender = $defender;
        $this->canAttack();
        return view('player.attack',[
             'attacker' => $this->attacker,
             'defender' => $this->defender,
             'defenderEquipped' => $this->equippedWeapons($this->defender->id),
             'attackerEquipped' => $this->equippedWeapons($this->attacker->id)
             ]);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackStart($request)
    {
        $oldTurnNumber = session()->has('oldTurnNumber') ? session('oldTurnNumber') : session()->put('oldTurnNumber', 0);
        $nextTurnAssignment = $this->turn($oldTurnNumber);
        $turnOwner = $this->doTurn($nextTurnAssignment);
        $selectedAttackerWeapon = $this->selectedWeaponName($this->attacker->id, $request->weaponId );
        $selectedDefenderWeapon = $this->selectedWeaponName($this->defender->id);
    return [
            'turnNumber' => $nextTurnAssignment,
            'turnOwner' => $turnOwner,
            'selectedAttackerWeapon' => $selectedAttackerWeapon
            'selectedDefenderWeapon' =>   $selectedDefenderWeapon
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(Request $request, User $user)
    {
        $this->attackStart($request);
        $this->attackPerform($user, $userStats);
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
    public function canAttack()
    {
        $haveEnergy = (int) $this->userStats->getEnergy($this->defender->id) < (int) ($this->userStats->getMaxEnergy($this->defender->id)/2);
        $notSameLocation = $this->userDetails->getLocation($this->defender->id) !== $this->userDetails->getLocation($this->attacker->id);
        $defenderHospitalized = $this->userDetails->getHospitalTime($this->defender->id);
        $defenderJailed = $this->userDetails->getJailTime($this->defender->id);
        $selfAttack = $this->defender->id === $this->attacker->id;

        if ($selfAttack) {
            abort(403, "You can't attack yourself.");
        }elseif($haveEnergy) {
            abort(403, "You don't have enough energy.");
        } elseif ($notSameLocation) {
            abort(403, "Player isn't on same location.");
        } elseif ($defenderHospitalized) {
            abort(403, "Player already is hospitalized.");
        } elseif ($defenderJailed) {
            abort(403, "Player already is Jailed.");
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
    public function doTurn($nextTurnAssignment)
    {
        if($nextTurnAssignment%2 == 0)
        {
            return $this->defender->name;
        }

    return $this->attacker->name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackPerform($user, $userStats)
    {
        $equippedWeapons = $this->equippedWeapons($user);
        $equippedWeaponAttributes = $this->equippedWeaponAttributes($equippedWeapons['attackerPrimaryWeaponId']) ;
        $defenderDefense = $userStats->getDefense($user->id);
        $damage = $this->damage($equippedWeaponAttributes, $defenderDefense);
        $defenderAgility = $userStats->getAgility($user->id);
        return $this->hitRatio($defenderAgility);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equippedWeapons($userId)
    {
        $weapons = $this->userSlots->getUserWeaponsById($userId);
        $primaryWeaponName = $this->items->getWeaponNameById($weapons->primary_slot);
        $secondaryWeaponName = $this->items->getWeaponNameById($weapons->secondary_slot);
    return [
            'primaryWeaponId' => $weapons->primary_slot,
            'primaryWeaponName' => $primaryWeaponName,
            'secondaryWeaponId' => $weapons->secondary_slot,
            'secondaryWeaponName' => $secondaryWeaponName
          ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectedWeaponName($userId, $weaponId = null)
    {
        $wepaons = $this->equippedWeapons($userId);
        $weaponId = ($weaponId === NULL)? $wepaons['primaryWeaponId'] : $weaponId;
        $correctWeaponSelected = $wepaons['primaryWeaponId']  === $weaponId || $wepaons['secondaryWeaponId']  === $weaponId;

        if($correctWeaponSelected){
            return $this->items->getWeaponNameById($weaponId);
        }

    abort(403, "This weapon isn't selectable");
    }


    public function equippedWeaponAttributes($itemId)
    {
        $items = new Item();
        $weaponAttributes = new WeaponAttribute();
        $weaponAtrributeId = $items->getItemAttributeById($itemId);
    return $weaponAttributes->getattributesById($weaponAtrributeId);
    }

    public function damage($equippedWeaponAttributes, $defenderDefense)
    {
        return (int)
            ( $equippedWeaponAttributes['damage'] * $this->attacker->stats->strength / $defenderDefense)*
            (rand(8000, 12000) / 10000);
    }

    public function hitRatio($defenderAgility)
    {
        return min(50 * $this->attacker->stats->agility / $defenderAgility, 95);
    }

    public function ciritalHit($hitRatio)
    {
        return ($hitRatio + $this->attacker->level / 2) / 10;
    }

}
