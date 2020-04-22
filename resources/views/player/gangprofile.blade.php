@extends('layouts.player.player')
@section('content')
<style>
.w-20{
    width: 10%;
    border-right: 1px:
}
.w-80{
    width: 90%;
}
</style>
<div class="card text-center bg-transparent">
    <div class="card ml-2 shadow">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link active" href="#">Info</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Newsletters</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid mt-3 border border-white">
        <div class="row">
            <div class="col-4 border shadow">
                Announcement
            </div>
            <div class="col-4 border shadow">
                Newsletter
            </div>
            <div class="col-4 border shadow">
                Upcoming Tasks
            </div>
        </div>
    </div>
</div>
<hr>
<div class="card bg-transparent">
    <div class="card-body p-0">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item pr-2">
                    <a class="nav-link btn btn-outline-dark" data-toggle="tab" href="#info" role="tab">Info</a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link btn btn-outline-dark" data-toggle="tab" href="#terrotory" role="tab">Territory </a>
                </li>
                <li class="nav-item pr-2">
                    <a class="nav-link btn btn-outline-dark" data-toggle="tab" href="#storage" role="tab">Storage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-dark" data-toggle="tab" href="#settings" role="tab">Settings</a>
                </li>
            </ul>
        </div>
        <div class="ml-3 pb-2">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel">
                    <ul class="list-group">
                        <li class="list-group-item d-flex"><div class="w-20 text-center">Date</div><div class="w-80">Event</div></li>
                        <li class="list-group-item d-flex"><div class="w-20 text-center">Date</div><div class="w-80">Event</div></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="terrotory" role="terrotory">
                    <ul class="list-group">
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="storage" role="storage">
                    <ul class="list-group">
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="settings" role="settings">
                    <ul class="list-group">
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                        <li class="list-group-item"><span>Date</span><span>Event</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
</script>
@endsection
