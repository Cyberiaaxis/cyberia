@extends('layouts.player.player')
@section('content')
<style>
.imagebg {
    background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 5rem;
    display: block;

}
a{
    text-decoration:none;
}
</style>

<ul class="list-group">
    <li class="list-group-item d-flex bg-secondary bg-dark text-white text-center rounded-top">
        <span class="w-25">
            Rank
        </span>
        <span class="w-75">
            Gang Name
        </span>
        <span class="w-25">
            Territory
        </span>
    </li>
    @foreach ($gangs as $gang)
    <li class="list-group-item d-flex">
        <span class="text-center font-weight-bold w-25 pt-4">
             Rank
        </span>
        <span class="text-center font-weight-bold imagebg border w-75 pt-4">
            <a href="{{ route('gang.show', $gang->id) }}" class=" text-decoration-none text-dark list-group-item border-0"> {{$gang->name}} </a>
        </span>
        <span class="text-center font-weight-bold w-25 pt-4">
            Territory
        </span>
    </li>
    @endforeach

</ul>
@endsection
@section('js')
<script>
</script>
@endsection
