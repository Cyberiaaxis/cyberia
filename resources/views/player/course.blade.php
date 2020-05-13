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

<div class="courses" data-url="{{ route('course.index') }}"></div>


@section('js')
<script>
    $(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    let url = $('.courses').attr('data-url');
    console.log(url);
    $.getJSON(url,render);

    function render(data)
    {
      return $('.courses').html(data.html);
    }

    $(document).on("click",".course",function() {
        console.log($(this).attr('data-method'));
            let url = $(this).attr('data-url');
            let method = $(this).attr('data-method');
            let data = {
                url: url,
                // method: method,
                course_id: $(this).val(),
                csrfToken: csrfToken
            };

    requestProcess(data, message);
    });

    function message (response){
        console.log(response);
      return $('.courses').html(response.html);
    }
    });


</script>
@stop
@endsection
