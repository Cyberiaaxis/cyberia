@extends('layouts.player.player') @section('content')
<style>
.crime .list-group-item{
  display:flex;
  flex-wrap: wrap;
  margin: 0;
  padding: 0;
}
.head{
  background: #000306 !important;
}
.list-group-item .img{
  width:2rem;
  height:2rem;
  border-radius: 50%;
  background: black;
}
.list-group-item span {
  width:45%;
  padding: 4px;
  border-top: none !important;
  border-bottom: none !important;

  }
.crime .list-group-item .collapse.show{
    flex: 1 100%;
    width: 100%;
 }
@media (max-width: 576px) {
  .list-group-item,
  .list-group-item span{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
}
</style>
<p>Crime</p>
<ul class="list-group crime accordion">
  <li class="list-group">
    <span class="head text-white p-1">Crimes</span>
  </li>
@foreach($crimes as $crime)
    @empty($crime->parent_id)
    <li id="crime" class="list-group-item d-flex border border-dark list-group-item-action"> &nbsp;
        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img "> &nbsp;
        <span class="border border-dark text-justify">
            {{ $crime->name ?? 'hue' }}
            &nbsp;
            </span>
        <span class="border border-dark text-justify"> &nbsp;
            -{{ $crime->nerve ?? 1 }} Nerve
            </span>
        <input class="m-auto crimeId" type="radio" name="exampleRadios" id="exampleRadios1" value="{{ $crime->id ?? 1 }}" data-toggle="collapse" href="#collapseExample{{ $crime->id }}">

    @endempty

    @if($crime->id <=> $crime->parent_id)
	  <div class="collapse p-1" id="collapseExample{{ $crime->parent_id }}" data-parent=".crime">
          <div class="list-group-item d-flex border border-dark list-group-item-action">
              <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img "> &nbsp;
              <span class="border border-dark text-justify">
          {{ $crime->name }}
          &nbsp;
          </span>
              <span class="border border-dark text-justify"> &nbsp;
          -{{ $crime->nerve }} Nerve
          </span>
              <input class="m-auto crimeId" type="radio" url="{{ route('crime.store')  }}" name="crimeId" id="exampleRadios1" value="{{ $crime->id ?? 1 }}">
          </div>
      </div>
	  @endif
@empty($crime->parent_id)
    </li>
@endempty
      @endforeach
      <li class="list-group-item"><div id='message'></div></li>
      <li class="list-group-item"><button type="button" class="btn btn-outline-secondary">Try Again</button>
<div class="crime-list fadeIn" data-url="{{ route('crime.index') }}"></div>
</ul>
@section('js')
<script src="{{ asset('/js/requestprocess.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
  const csrfToken = $('meta[name="csrf-token"]').attr('content');
  $( ".crimeId" ).click(function() {
    console.log($(this).val());
        let url = $(this).attr('url');
        let data = {
            url: url,
            method: 'post',
            crime_id: $(this).val(),
            csrfToken: csrfToken
        };
        console.log(requestProcess(data, message));
  });
  let events = {};
  requestProcess(events,myreplacefunction);
function myreplacefunction(data) {
    $('.crime-list').html(data.html).fadeIn();
}

});
function message (selector, type, content){
  const mess = "<div class='alert alert-'+ type +'>'+ content +'<div>";
  return $('selector').html(mess);;
}
</script>
@stop


@endsection
