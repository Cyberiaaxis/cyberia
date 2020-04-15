@extends('layouts.player.player') @section('content')
<style>
    .fixed-img {
        height: 9rem;
        width: 9rem;
    }
</style>
<div class="row">
    <div class="col-2 text-center">
        <p class="text-center m-0 shadow">In Hospital</p>
        <img class="img-fluid  fixed-img border border-primary mt-1" alt="No Image" src="https://www.broadheathcentral.co.uk/wp-content/uploads/2015/06/passport-photo-234x300.jpg">
        <p class="card-text text-center shadow">Online</p>
    </div>
    <div class="col-lg-8 mt-5">
        <ul class="list-group shadow">
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Name</span>
                <span class="w-100 text-left">Nitin Sharma</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Rank</span>
                <span class="w-100 text-left">Newbie</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Level</span>
                <span class="w-100 text-left">100</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Current Location</span>
                <span class="w-100 text-left">New Delhi</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Last Active</span>
                <span class="w-100 text-left">Date and Time</span>
            </li>

            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class=" w-100 text-left">Rate</span>
                <span class="w-100 text-left d-flex d-flex-inline">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-secondary rpg-like rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
                        </li>
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-secondary rpg-like rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
                        </li>
                    </ul>
                </span>
            </li>
        </ul>
    </div>
    <div class="col-2 text-center">
        <p class="text-center m-0">Gang In War</p>
        <img class="rounded-circle img-fluid shadow fixed-img border border-primary mt-1" alt="No Image" src="https://www.broadheathcentral.co.uk/wp-content/uploads/2015/06/passport-photo-234x300.jpg">
        <p class="card-text text-center">Gang of Eleven
            <br> New Delhi</p>
    </div>
</div>
<div class="row border-top border-bottom">
    <ul class="list-inline m-auto">
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack">
        </li>
    </ul>
</div>
<h4 class="pt-5 pb-0 text-center">Activity Achievements</h4>
<div class="card shadow border-top border-bottom m-auto">
    <ul class="list-inline m-auto">
        <li class="list-inline-item">
            <span> <h3> Player : 11 </h3> </span>
        </li>
        <li class="list-inline-item">
            <span> <h3> Player : 11 </h3> </span>
        </li>
        <li class="list-inline-item">
            <span> <h3> Player : 11 </h3> </span>
        </li>
    </ul>
</div>
<h4 class="pt-5 pb-0 text-center">Game Achievements</h4>
<div class="card shadow border-top border-bottom m-auto">
    <ul class="list-inline m-auto">
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Award">
        </li>
    </ul>
</div>
<div class="card border-top text-center mt-5">
    <div class="card-body">
        <h5 class="card-title">Player Comment Area</h5>
        <p class="card-text">Player Profile's Signatures</p>
    </div>
</div>
@endsection
https://jsfiddle.net/w63y7ajd/1/
