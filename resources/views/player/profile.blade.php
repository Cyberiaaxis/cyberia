@extends('layouts.player.player') @section('content')

<style>
    .fixed-img {
        height: 9rem;
        width: 9rem;
    }

    .pagiImg {
        height: 3.5rem;
        width: 1.5rem;
    }
    /* carsouel ki css */

    @media (max-width: 768px) {
        .carousel-inner .carousel-item > div {
            display: none;
        }
        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }

    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
        display: flex;
    }

    @media (min-width: 768px) {
        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(33.333%);
        }
        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-33.333%);
        }
    }

    @media(min-width: 576px) {
        .col-md-1 {
            width: 100%;
        }
    }

    .carousel-inner .carousel-item-right,
    .carousel-inner .carousel-item-left {
        transform: translateX(0);
    }
</style>
<span id="time"></span>
<div class="row">
    <div class="col-2 text-center">
        @if($user->userdetails->hospital > 0)
            <p class="text-center m-0 shadow">Hospitalized for {{ $user->userdetails->hospital ?? 0 }}</p>
        @elseif ($user->userdetails->jail > 0)
            <p class="text-center m-0 shadow">Jailed for {{ $user->userdetails->jail ?? 0 }}</p>
        @endif
        <p class="text-center m-0 shadow">OK</p>
        <img class="img-fluid  fixed-img border border-primary mt-1" alt="No Image" src="https://www.broadheathcentral.co.uk/wp-content/uploads/2015/06/passport-photo-234x300.jpg">
        <p class="card-text text-center shadow">
            {{ getStatus($user->last_seen->diffInMinutes(date('m/d/Y h:i:s a', time()))) }}
         </p>
    </div>
    <div class="col-lg-8 mt-4">
        <ul class="list-group shadow">
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Name</span>
                <span class="w-100 text-left">{{ $user->name ?? 0 }}</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Rank</span>
                <span class="w-100 text-left">{{ $user->userdetails->rank->name ?? 0 }}</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Level</span>
                <span class="w-100 text-left">{{ $user->userdetails->level->name ?? 0 }} </span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Current Location</span>
                <span class="w-100 text-left">{{ $user->userdetails->location->name ?? 0 }}</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Last Active</span>
                <span class="w-100 text-left"><time title="{{ $user->last_seen }}">{{ $user->last_seen->diffForHumans() }}</time></span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class="w-100 text-left">Posts</span>
                <span class="w-100 text-left">Forum</span>
            </li>
            <li class="list-group-item p-0  d-flex justify-content-around">
                <span class=" w-100 text-left">Rate</span>
                <span class="w-100 text-left d-flex d-flex-inline">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-secondary fa fa-thumbs-up fa-2x rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
                        </li>
                        <li class="list-inline-item">
                            &nbsp;
                                {{ $user->userdetails->rates ?? 0 }}
                            &nbsp;
                        </li>
                        <li class="list-inline-item">
                            <button type="button" class="btn btn-outline-secondary fa fa-thumbs-down fa-2x rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
                        </li>
                    </ul>
                </span>
            </li>
        </ul>
    </div>
    <div class="col-2 text-center">
        <p class="text-center m-0">Gang In War</p>
        <img class="rounded-circle img-fluid shadow fixed-img border border-primary mt-1" alt="No Image" src="https://www.broadheathcentral.co.uk/wp-content/uploads/2015/06/passport-photo-234x300.jpg">
        <p class="card-text text-center">{{ $user->userdetails->gang->name }}
            <br> New Delhi</p>
    </div>
</div>
<div class="row border-top border-bottom">
    <ul class="list-inline m-auto">
        <li class="list-inline-item">
            <a class="btn btn-outline-secondary rpg-gun rounded btn-sm" href="{{ route('attacks',  $user->id )}}" data-toggle="tooltip" data-placement="right" title="Attack"></a>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
        <li class="list-inline-item">
            <button type="button" class="btn btn-outline-secondary rpg-gun rounded btn-sm" data-toggle="tooltip" data-placement="right" title="Attack"></button>
        </li>
    </ul>
</div>
<h4 class="pt-5 pb-0 text-center">Activity Achievements</h4>
<div class="card shadow border-top border-bottom m-auto">
    <ul class="list-inline m-auto">
        <li class="list-inline-item">
            <span> <h3> Player of The Hour : 11 </h3> </span>
        </li>
        <li class="list-inline-item pl-5">
            <span> <h3> Player of The Day: 11 </h3> </span>
        </li>
        <li class="list-inline-item pl-5">
            <span> <h3> Player of The Month: 11 </h3> </span>
        </li>
    </ul>
</div>
<h4 class="pt-5 text-center">Game Achievements</h4>
<div class="card shadow border-top border-bottom pt-4">
    <div id="recipeCarousel" class="carousel slide w-100" data-interval="false" data-ride="carousel">
        <div class="carousel-inner w-100" role="listbox">

        <div class="carousel-inner w-100" role="listbox">
 @foreach (array_chunk($user->rewards->toArray(),15) as $items)
            <div class="carousel-item @if($loop->first) active @endif">
                @foreach ($items as $item)
                <div class="col-md-1">
                    <div class="card border-0">
                    <button type="button" class="btn btn-outline-secondary rpg-medal rounded btn-sm m-2" data-toggle="tooltip" data-placement="right" title="{{ $item['name'] }}"></button>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        </div>
        <a class="carousel-control-prev w-auto pb-4" href="#recipeCarousel" role="button" data-slide="prev">
            <img class="img-fluid pagiImg next ml-auto" alt="No Image" src="{{ asset('img/pri.jpg') }}">
        </a>
        <a class="carousel-control-next w-auto pb-4" href="#recipeCarousel" role="button" data-slide="next">
            <img class="img-fluid pagiImg next ml-auto" alt="No Image" src="{{ asset('img/next.jpg') }}">
        </a>
    </div>
</div>
<div class="card border-top text-center mt-5">
    <div class="card-body">
        <h5 class="card-title">Player Comment Area</h5>
        <p class="card-text">Player Profile's Signatures</p>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#recipeCarousel').carousel({
        pause: true,        // init without autoplay (optional)
        interval: false,    // do not autoplay after sliding (optional)
        wrap:false
    })

    // $('.carousel .carousel-item').each(function() {
    //     var minPerSlide = 10;
    //     var next = $(this).next();
    //     console.log(next);
    //     if (!next.length) {
    //         next = $(this).siblings(':first');
    //     }
    //     next.children(':first-child').clone().appendTo($(this));

    //     // for (var i = 0; i < minPerSlide; i++) {
    //     //     next = next.next();
    //     //     if (!next.length) {
    //     //         next = $(this).siblings(':first');
    //     //     }

    //     //     next.children(':first-child').clone().appendTo($(this));
    //     // }
    // });
    // function updateTime() {
    // const now = "{{ time() }}";
    // const currentTime = new Date();
    // const v = currentTime.toLocaleString();
    // setTimeout("updateTime()",1000);
    //     document.getElementById('time').innerHTML=v;
    // }
    // updateTime();
</script>
@endsection
