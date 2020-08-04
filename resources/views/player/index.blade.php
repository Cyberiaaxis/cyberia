@extends('layouts.player.player') @section('content')

<p>Home</p>
<div class="row">
    <div class="col-sm-12">
        <h5 class="card-header">Details</h5>
    </div>
    <div class="col-sm-6">
        <div class="card border-0">
            <div class="card-body d-inline-flex">
                <ul class="list-group border-0 w-50">

                    <li class="list-group-item border-0">Name :</li>
                    <li class="list-group-item border-0">Money :</li>
                    <li class="list-group-item border-0">Rank :</li>
                    <li class="list-group-item border-0">Level :</li>
                    <li class="list-group-item border-0">Points :</li>
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-0">{{ $name }}</li>
                    <li class="list-group-item border-0">{{ $money }}</li>
                    <li class="list-group-item border-0">{{ $rank }}</li>
                    <li class="list-group-item border-0">{{ $level }}</li>
                    <li class="list-group-item border-0">{{ $points }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-0">
            <div class="card-body d-inline-flex">
                <ul class="list-group w-50">
                    <li class="list-group-item border-0">Awards :</li>
                    <li class="list-group-item border-0">Age :</li>
                    <li class="list-group-item border-0">Location :</li>
                    <li class="list-group-item border-0">House :</li>
                    <li class="list-group-item border-0">Total Crime :</li>
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-0"> {{$totalAwards}} </li>
                    <li class="list-group-item border-0">{{ $age }}</li>
                    <li class="list-group-item border-0">{{ $area }}</li>
                    <li class="list-group-item border-0">{{ $activeHouse  }}</li>
                    <li class="list-group-item border-0">{{ $totalCrimes }}</li>
                    {{-- auth()->user()->created_at->diffForHumans() --}}
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 w-100">
    <div class="card-header">Attacking Status</div>
    <div class="card-body  d-inline-flex">
        <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-top-0">Attacks</li>
            <li class="list-group-item border-left-0">As Attacker</li>
            <li class="list-group-item border-left-0">As Defender </li>
            <li class="list-group-item border-left-0 border-bottom-0">Total</li>
        </ul>
        <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-top-0">Lost</li>
            <li class="list-group-item border-left-0">{{ $asAttackerLost }}</li>
            <li class="list-group-item border-left-0">{{  $asDefenderLost }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalLost }}</li>
        </ul>
        <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-top-0">Won</li>
            <li class="list-group-item border-left-0">{{ $asAttackerWon }}</li>
            <li class="list-group-item border-left-0">{{ $asDefenderWon }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalWon }}</li>
        </ul>
        <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-right-0 border-top-0">Settlement</li>
            <li class="list-group-item border-left-0">{{ $asAttackerSettlement }}</li>
            <li class="list-group-item border-left-0">{{  $asDefenderSettlement }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalSettlement }}</li>
        </ul>
        <ul class="list-group w-25">
            <li class="list-group-item border-right-0 border-top-0">Run away</li>
            <li class="list-group-item border-right-0 border-left-0"> {{ $asAttackerEscaped }}</li>
            <li class="list-group-item border-right-0 border-left-0">{{ $asDefenderEscaped }}</li>
            <li class="list-group-item border-right-0 border-left-0 border-bottom-0">{{ $totalEscaped }}</li>
        </ul>
    </div>
</div>
<h5 class="card-header">Stats</h5>
<div class="row">
    <div class="col-sm-6">
        <div class="card border-0">
            <div class="card-body d-inline-flex">
                <ul class="list-group w-50">
                    <li class="list-group-item border-left-0 border-top-0">Strength</li>
                <li class="list-group-item border-left-0 border-bottom-0">{{ $strength }}</li>
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-right-0 border-top-0">Agility</li>
                    <li class="list-group-item border-right-0 border-bottom-0">{{ $agility }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-0">

            <div class="card-body d-inline-flex">
                <ul class="list-group w-50">
                    <li class="list-group-item border-left-0 border-top-0">Defense</li>
                    <li class="list-group-item border-left-0 border-bottom-0">{{ $defense }}</li>
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-right-0 border-top-0">Endurance</li>
                    <li class="list-group-item border-right-0 border-bottom-0">{{ $endurance }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
