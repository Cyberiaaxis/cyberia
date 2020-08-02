<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Attack extends Model
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
