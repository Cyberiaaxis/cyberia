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
    public function preparationForAttack($request){
        $this->canAttack();
        $oldTurnNumber = session()->has('oldTurnNumber') ? session('oldTurnNumber') : session()->put('oldTurnNumber', 0);
        $nextTurnAssignment = $this->turn($oldTurnNumber);
        $turnOwner = $this->doTurn($nextTurnAssignment);
        $selectedAttackerWeapon = $this->selectedWeaponName($this->attacker->id, $request->weaponId );
        $defenderWeaponId = $this->equippedWeapons($this->defender->id);
        $selectedDefenderWeapon = $this->selectedWeaponName($this->defender->id, $defenderWeaponId['primaryWeaponId']);
        $selectedAttackerWeaponAttributes = $this->equippedWeaponAttributes($request->weaponId);
        $selectedDefenderWeaponAttributes = $this->equippedWeaponAttributes($defenderWeaponId['primaryWeaponId']);
        $attackerStats = $this->getStats($this->attacker->id);
        $defenderStats = $this->getStats($this->defender->id);
        return [
            'turnNumber' => $nextTurnAssignment,
            'turnOwner' => $turnOwner,
            'attackerStats' => $attackerStats,
            'defenderStats' => $defenderStats,
            'selectedAttackerWeapon' => $selectedAttackerWeapon,
            'selectedDefenderWeapon' =>   $selectedDefenderWeapon,
            'selectedAttackerWeaponAttributes' => $selectedAttackerWeaponAttributes,
            'selectedDefenderWeaponAttributes' => $selectedDefenderWeaponAttributes
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attack(Request $request, User $user)
    {
        $preparedForAttack = $this->preparationForAttack($request);
        $this->attackPerform($preparedForAttack);
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
    public function attackPerform($preparedForAttack){
        $hitRatio = $this->hitRatio($preparedForAttack);

        if (rand(1, 100) <= $hitRatio)
        {
            $genratedDamageRatio = $this->damage($preparedForAttack);
            $this->userStats->decrementHP($this->attacker->id, $genratedDamageRatio);
        }
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
    public function selectedWeaponName($userId, $weaponId)
    {
        $weapons = $this->equippedWeapons($userId);
        $correctWeaponSelected = $weapons['primaryWeaponId']  === $weaponId || $weapons['secondaryWeaponId']  === $weaponId;

        if($correctWeaponSelected){
            return $this->items->getWeaponNameById($weaponId);
        }

    abort(403, "This weapon isn't selectable");
    }


    public function equippedWeaponAttributes($itemId)
    {
        $weaponAtrributeId = $this->items->getItemAttributeById($itemId);
    return $this->weaponAttributes->getattributesById($weaponAtrributeId);
    }

    public function damage($preparedForAttack)
    {
        return (int)

        ( $preparedForAttack['selectedAttackerWeaponAttributes']['damage'] * $preparedForAttack['attackerStats']['strength'] /
          $preparedForAttack['defenderStats']['defense'])* (rand(8000, 12000) / 10000);
    }

    public function hitRatio($preparedForAttack)
    {
        return min(50 * $preparedForAttack['attackerStats']['agility'] / $preparedForAttack['defenderStats']['agility'] , 95);
    }

    public function ciritalHit($hitRatio)
    {
        return ($hitRatio + $this->attacker->level / 2) / 10;
    }

    public function getFightStats($userId)
    {
        $strength = $this->userSlots->getStrength($userId);
        $agility = $this->userSlots->getAgility($userId);
        $defense = $this->userSlots->getDefense($userId);
    return ['strength' => $strength, 'agility' => $agility, 'defense' => $defense];
    }
}
