@extends('layouts.player.player')
@section('content')
<style>

</style>
<div class="container-fluid">
    <h4 class="mess text-center"></h4>
    <div class="card-group">
        <div class="card">
            <div class="card-header">Strength</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="gym form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control w-50" name="strength" placeholder="Strength" min="1" required/> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Agility</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="gym form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control w-50" name="agility" placeholder="Agility" min="1" required/> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Endurance</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="gym form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control w-50" name="endurance" placeholder="Endurance" min="1" required/> &nbsp;
                        <button type="submit" class="btn btn-primary">Do</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Defense</div>
            <div class="card-body">
                <form method="post" action="{{ route('gym.store') }}" class="gym form-inline" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control w-50" name="defense" placeholder="Defense" min="1" required/> &nbsp;
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
        $(".message").hide();
        const csrfToken = $('meta[name="csrf-token"]').attr("content");
        $(document).on("submit", "form", function (event) {
            event.preventDefault();
            let data = {
                url: $(this).attr("action"),
                method: "post",
                csrfToken: csrfToken,
            };
            $.each($(this).serializeArray(), function () {
                data[this.name] = this.value;
            });
            // console.log(data);
            requestProcess(data, showResult);
        });
        // console.log(data);
    function showResult(response) {
        // console.log(response);
         $('.mess').show();
        if(response.success)
        {
            $('.mess').text(response.message);
        } else {
            $('.mess').text(response.message);
        }


    }
    });
</script>
@stop
@endsection
