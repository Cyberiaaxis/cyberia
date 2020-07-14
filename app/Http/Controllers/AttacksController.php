<?php

namespace App\Http\Controllers;

use App\Model\{ AttackLog, User, Item, UserDetail,  UserSlot, UserStats, WeaponAttribute};
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
               $stepEvent = [],
               $attackLog,
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
        $this->attackLog = new AttackLog();
        $this->items = new Item();
    }

     public function __invoke(Request $request, User $defender)
     {
        //  dd($request->user());
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
        $attackerStats = $this->getFightStats($this->attacker->id);
        $defenderStats = $this->getFightStats($this->defender->id);
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
    public function attack(Request $request, User $defender)
    {
        $this->defender = $defender;
        $preparedForAttack = $this->preparationForAttack($request);
    return  $this->attackPerform($preparedForAttack);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAttackStepEvent($preparedForAttack, $damage)
    {
        $weaponName =  ($preparedForAttack['turnNumber'] % 2) ? $preparedForAttack['selectedDefenderWeapon'] : $preparedForAttack['selectedAttackerWeapon'];
    return $preparedForAttack['turnNumber'] ." ". $preparedForAttack['turnOwner'] . " " . $weaponName . " " . $damage . " " . date('Y-m-d H:i:s');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attackLog()
    {
        // dd($this->stepEvent);
        return $this->attackLog->addLog($this->stepEvent);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function canAttack()
    {
        // dd($this->defender);
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

        if((int)$preparedForAttack['attackerStats']['HP'] <= 0 || (int)$preparedForAttack['defenderStats']['HP'] <= 0)
        {
            return $this->attackLog();
        }

        $hitRatio = $this->hitRatio($preparedForAttack);
        $genratedDamageRatio = '';

        if (mt_rand(1, 100) <= (int) $hitRatio)
        {
            $genratedDamageRatio = $this->damage($preparedForAttack);
            $userId = ($preparedForAttack['turnNumber'] % 2) ? $this->defender->id : $this->attacker->id;
            $this->userStats->decrementHP($userId, $genratedDamageRatio);
        }

        $genratedDamageRatio = 'missed';
    return $this->stepEvent[] = $this->saveAttackStepEvent($preparedForAttack, $genratedDamageRatio);
    }
// http://criminalimpulse.com/attackstart/96?weaponId=1
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
        $correctWeaponSelected = (int) $weapons['primaryWeaponId']  === (int) $weaponId || (int) $weapons['secondaryWeaponId']  === (int) $weaponId;

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

        if ($preparedForAttack['turnNumber'] % 2)
        {
            return (int) ($preparedForAttack['selectedDefenderWeaponAttributes']['damage'] * $preparedForAttack['defenderStats']['strength'] /
                $preparedForAttack['attackerStats']['defense']) * (rand(8000, 12000) / 10000);
        }

    return (int) ($preparedForAttack['selectedAttackerWeaponAttributes']['damage'] * $preparedForAttack['attackerStats']['strength'] /
        $preparedForAttack['defenderStats']['defense']) * (rand(8000, 12000) / 10000);
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
        $strength = $this->userStats->getStrength($userId);
        $agility = $this->userStats->getAgility($userId);
        $defense = $this->userStats->getDefense($userId);
        $hp = $this->userStats->getHp($userId);
    return ['strength' => $strength, 'agility' => $agility, 'defense' => $defense, 'HP' => $hp];
    }
}
