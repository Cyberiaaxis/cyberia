@extends('layouts.player.player')
@section('content')
<style>
    .crime .list-group-item {
        display: flex;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
    }

    .head {
        background: #000306 !important;
    }

    .list-group-item .img {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: black;
    }

    .list-group-item span {
        width: 45%;
        padding: 4px;
        border-top: none !important;
        border-bottom: none !important;
    }

    .crime .list-group-item .collapse.show {
        flex: 1 100%;
        width: 100%;
    }

    @media (max-width: 576px) {
        .list-group-item,
        .list-group-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }
</style>
<div class="crime-list fadeIn" data-url="{{ route('crime.index') }}"></div>
@section('js')
<script src="{{ asset('/js/requestprocess.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    /**
    * Get Crime
    **/
    let url = $('.crime-list').attr('data-url');
    $.getJSON(url,render);

    function render(data)
    {
      return $('.crime-list').html(data.html);
    }

    $(document).on("click",".crimeId",function() {
            let url = $(this).attr('data-url');
            let method = $(this).attr('data-method');
            let data = {
                url: url,
                method: method,
                crime_id: $(this).attr('data-id') || $(this).val(),
                csrfToken: csrfToken
            };

    requestProcess(data, message);
    });

    function message (response){
      return $('.crime-list').html(response.html);
    }
});
</script>
@stop
@endsection
