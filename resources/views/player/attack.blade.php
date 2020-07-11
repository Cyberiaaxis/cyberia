@extends('layouts.player.player')
@section('content')
<div class="card p-1">
    <form action="">
        <div class="card-body">
            <label for="weapon-select">Choose a Weapon:</label>
            <select name="weapons" id="weapon-select">
            <option value="{{$attackerEquipped['primaryWeaponId']}}">{{$attackerEquipped['primaryWeaponName']}}</option>
            <option value="{{$attackerEquipped['secondaryWeaponId']}}">{{$attackerEquipped['secondaryWeaponName']}}</option> --}}
            </select>
            <button type="button"> shoot </button>
            {{$defender->name}}
        </div>
    </form>
</div>
@endsection
