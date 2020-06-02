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
                    {{-- <li class="list-group-item border-0">{{ auth()->user()->name }}</li>
                    <li class="list-group-item border-0">{{ auth()->user()->userdetails->money }}</li>
                    <li class="list-group-item border-0">{{ auth()->user()->userdetails->rank->name }}</li>
                    <li class="list-group-item border-0">{{ auth()->user()->userdetails->level->name }}</li>
                    <li class="list-group-item border-0">{{ auth()->user()->userdetails->points }}</li> --}}
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
                {{-- <ul class="list-group w-50">
                    <li class="list-group-item border-0"> 1 </li>
                    <li class="list-group-item border-0">{{ auth()->user()->created_at->diffForHumans() }}</li>
                    <li class="list-group-item border-0">{{ auth()->user()->userdetails->location->name }}</li>
                    <li class="list-group-item border-0">{{  auth()->user()->scopeGetHouse()->name  }}</li>
                    <li class="list-group-item border-0">200</li>
                </ul> --}}
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
        @php
        // $totalLost = auth()->user()->attacks->attacks - auth()->user()->attacks->attacks_success + auth()->user()->attacks->defenses - auth()->user()->attacks->defenses_success;
        @endphp
        {{-- <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-top-0">Lost</li>
            <li class="list-group-item border-left-0">{{ auth()->user()->attacks->attacks - auth()->user()->attacks->attacks_success }}</li>
            <li class="list-group-item border-left-0">{{  auth()->user()->attacks->defenses - auth()->user()->attacks->defenses_success }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalLost }}</li>
        </ul> --}}
        @php
        // $totalWon = auth()->user()->attacks->attacks_success + auth()->user()->attacks->defenses_success;
        @endphp
        {{-- <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-top-0">Won</li>
            <li class="list-group-item border-left-0">{{ auth()->user()->attacks->attacks_success }}</li>
            <li class="list-group-item border-left-0">{{ auth()->user()->attacks->defenses_success }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalWon }}</li>
        </ul> --}}
        @php
        // $totalSettlement =  auth()->user()->attacks->settlement_attacker + auth()->user()->attacks->settlement_defender;
        @endphp
        {{-- <ul class="list-group w-25">
            <li class="list-group-item border-left-0 border-right-0 border-top-0">Settlement</li>
            <li class="list-group-item border-left-0">{{ auth()->user()->attacks->settlement_attacker }}</li>
            <li class="list-group-item border-left-0">{{  auth()->user()->attacks->settlement_defender }}</li>
            <li class="list-group-item border-left-0 border-bottom-0">{{ $totalSettlement }}</li>
        </ul> --}}
        @php
        // $totalRunaway =  auth()->user()->attacks->escaped_attacker  + auth()->user()->attacks->escaped_defender;
        @endphp
        {{-- <ul class="list-group w-25">
            <li class="list-group-item border-right-0 border-top-0">Run away</li>
            <li class="list-group-item border-right-0 border-left-0"> {{ auth()->user()->attacks->escaped_attacker }}</li>
            <li class="list-group-item border-right-0 border-left-0">{{ auth()->user()->attacks->escaped_defender }}</li>
            <li class="list-group-item border-right-0 border-left-0 border-bottom-0">{{ $totalRunaway }}</li>
        </ul> --}}
    </div>
</div>
<h5 class="card-header">Stats</h5>
<div class="row">
    <div class="col-sm-6">
        <div class="card border-0">
            <div class="card-body d-inline-flex">
                <ul class="list-group w-50">
                    <li class="list-group-item border-left-0 border-top-0">Strength</li>
                {{-- <li class="list-group-item border-left-0 border-bottom-0">{{ auth()->user()->stats->strength }}</li> --}}
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-right-0 border-top-0">Agility</li>
                    {{-- <li class="list-group-item border-right-0 border-bottom-0">{{ auth()->user()->stats->agility }}</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-0">

            <div class="card-body d-inline-flex">
                <ul class="list-group w-50">
                    <li class="list-group-item border-left-0 border-top-0">Defense</li>
                    {{-- <li class="list-group-item border-left-0 border-bottom-0">{{ auth()->user()->stats->defense }}</li> --}}
                </ul>
                <ul class="list-group w-50">
                    <li class="list-group-item border-right-0 border-top-0">Endurance</li>
                    {{-- <li class="list-group-item border-right-0 border-bottom-0">{{ auth()->user()->stats->endurance }}</li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
