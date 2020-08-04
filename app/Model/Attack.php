<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Attack extends Model
{
    /**
     * get attacks (attackers total attack number) from storage.
     * @param  $userId INT
     * @return attacks INT
     */
    public function getAttacks(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('attacks');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * get attackwon from storage.
     * @param  $userId INT
     * @return attacks_success INT
     */
    public function getAttackSuccess(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('attacks_success');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a defender from storage.
     * @param  $userId INT
     * @return defenses INT
     */
    public function getDefenses(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('defenses');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a defender won from storage.
     * @param  $userId INT
     * @return defenses_success INT
     */
    public function getDefenseSuccess(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('defenses_success');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a attacker settlement from storage.
     * @param  $userId INT
     * @return settlement_attacker INT
     */
    public function getSettlementAttacker(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('settlement_attacker');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a defender settlement from storage.
     * @param  $userId INT
     * @return settlement_defender INT
     */
    public function getSettlementDefender(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('settlement_defender');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a attacker escaped from storage.
     * @param  $userId INT
     * @return escaped_attacker INT
     */
    public function getEscapedAttacker(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('escaped_attacker');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * got number of fight as a defender escaped from storage.
     * @param  $userId INT
     * @return escaped_defender INT
     */
    public function getEscapedDefender(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('escaped_defender');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
