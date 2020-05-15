@extends('layouts.player.player')
@section('content')

<style>
    .card-img-top {
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
    }
    .card-img-top:hover {
        -webkit-filter: grayscale(0);
        filter: grayscale(0);
    }
</style>

<div class="mycontent">
    <div class="row">
    @isset($courses)
    @foreach ($courses as $course)
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">{{ $course->name }}</div>
            <a href="{{ route('course.show',$course->id) }}" class="course">
                <img class="card-img-top" src="{{ asset('img/city.jpg') }}" alt="Card image cap">
            </a>
            <div class="card-body p-1">
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endisset

    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){
  const csrfToken = $('meta[name="csrf-token"]').attr('content');

  $(document).on('click','.course',function(e){
        e.preventDefault();

        let url = $(this).attr('href');

        $.getJSON(url,function(data){
            $('.mycontent').html(data.html);
        });
    });

    $(document).on('click','.joinCourse',function(e){
        e.preventDefault();
        console.log( $(this).serializeArray());
        let data = {
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            csrfToken: csrfToken
        };

        $.each($(this).serializeArray(), function() {
                 data[this.name] = this.value;
        });
        // console.log(data);
    requestProcess(data);
    });
});
</script>
@endsection
