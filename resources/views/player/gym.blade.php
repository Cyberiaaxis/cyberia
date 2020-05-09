@extends('layouts.player.player') @section('content')
<div class="container-fluid">
    <h4 class="card-header text-center">Message should be come after consume all energy</h4>
    <div class="card-group">
        <div class="card">
            <div class="card-header">Strength</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="form-inline gym" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-50" name="strength" placeholder="Strength" /> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Agility</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="form-inline gym" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-50" name="agility" placeholder="Agility" /> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Endurance</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="form-inline gym" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-50" name="endurance" placeholder="Endurance" /> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Defence</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="form-inline gym" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-50" name="defence" placeholder="Defence" /> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function () {
        const csrfToken = $('meta[name="csrf-token"]').attr("content");
        $(".gym").on("submit", function (event) {
            event.preventDefault();
            let data = {
                url: $(this).attr("action"),
                name: $(this).serialize(),
                method: "post",
                csrfToken: csrfToken,
            };
            console.log(data);
            requestProcess(data);
        });
    });
</script>
@stop @endsection
