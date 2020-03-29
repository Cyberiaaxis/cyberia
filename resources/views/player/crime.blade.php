@extends('layouts.player.player') @section('content')
<style>
.crime .list-group-item{
  display:flex;
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
<ul class="list-group crime">
    <li class="list-group">
      <span class="head text-white p-1">Crimes</span>
    </li>
    @foreach($crimes as $crime)
    <li class="list-group-item d-flex border border-dark"> &nbsp;
       <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img ">
       &nbsp;
        <span class="border border-dark text-justify">  
        
        {{ $crime->name }} 
        &nbsp; 
        </span>
        <span class="border border-dark text-justify"> &nbsp; 
        -{{ $crime->nerve }} Nerve
        </span>
        <input class="m-auto" type="radio" name="exampleRadios" id="exampleRadios1" value="{{ $crime->id }}" checked>
    </li>
    @endforeach
</ul>
@section('js')
<script>
$(document).ready(function() {
  $( "#exampleRadios1" ).click(function() {
    console.log($(this).val());
  });
});
</script>
@stop


@endsection