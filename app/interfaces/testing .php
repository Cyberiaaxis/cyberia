<?php

interface Equipment {
    public function getName();
    public function applyStats($stats);
}

class Ak47 implements Equipment {
    protected $name = 'ak47';

    public function applyStats($stats) {

        // this gun adds 100 damage to the character's stats
        $stats['damage'] += 100;

        return $stats;
    }

    public function getName() {
        return $this->name;
    }
}

class BodyArmor implements Equipment {
    protected $name = 'body-armor';

    public function applyStats($stats) {

        // this gun adds 100 damage to the character's stats
        $stats['armor'] += 125;

        return $stats;
    }

    public function getName() {
        return $this->name;
    }
}

class Player {
    const EQUIPMENT_SLOTS = [
        'head',
        'neck',
        'primary',
        'secondary',
        'torso',
        'legs',
    ];

    protected $name;
    protected $hitpoints = 100;
    protected $energy = 0;
    protected $damage = 0;
    protected $armor = 0;
    protected $equipments = [];

    public function __construct($name, $hitpoints, $energy, $damage)
    {
        $this->name = $name;
        $this->hitpoints = $hitpoints;
        $this->energy = $energy;
        $this->damage = $damage;
    }

    public function equip($slot, Equipment $item) {
        if (!in_array($slot, self::EQUIPMENT_SLOTS)) {
            throw new Exception("INVALID_EQUIPMENT_SLOT_NAME: You may not equip an item to: $slot");
        }
        $this->equipments[$slot] = $item;
    }

    public function playerStats()
    {
        // 1st, get the stats
        $stats = [
            'hitpoints' => $this->hitpoints,
            'energy' => $this->energy,
            'damage' => $this->damage,
            'armor' => $this->armor,
        ];

        // 2nd, apply the stats for each equipment we have equipped
        foreach($this->equipments as $equipment) {
            $stats = $equipment->applyStats($stats);
        }

        // 3rd, finally, return the total accuminated stats of the player
        return $stats;
    }
}


$player = new Player('Rocky', 200, 100, 15);

$primarySlot = new Ak47;
$torsoSlot = new BodyArmor;
$player->equip('primary', $primarySlot);
$player->equip('torso', $torsoSlot);



echo '<pre>';

print_r($player->playerStats());
