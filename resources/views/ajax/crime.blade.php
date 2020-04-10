@isset($crimes)
<ul class="list-group crime accordion">
    <li class="list-group">
        <span class="head text-white p-1">Crimes</span>
    </li>
    @foreach($crimes as $crime)
    <li class="list-group-item d-flex border border-dark list-group-item-action"> &nbsp;
        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img "> &nbsp;
        <span class="border border-dark text-justify">
            {{ $crime->name ?? 'hue' }}
        </span>
        <span class="border border-dark text-justify"> &nbsp;
            -{{ $crime->nerve }} Nerve
        </span>
        <input class="m-auto crimeId" type="radio" name="crime" value="{{ $crime->id }}" data-url="{{ ($crime->parent_id) ?  route('crime.store') : route('crime.show',$crime->id) }}"  @if($crime->parent_id) data-method ="post" @endif data-toggle="collapse" href="#collapseExample{{ $crime->id }}">
    </li>
    @endforeach
</ul>
@endisset
@isset($message)
<div class="card text-white {{$statusType}}">
  <div class="card-header">Result</div>
  <div class="card-body">
    <h5 class="card-title">{{$statusKey}}</h5>
    <p class="card-text text-white"> {{$message->message}} Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
  </div>
</div>
<button type="button" class="btn btn-success crimeId" data-id="{{$message->crime_id}}"data-method ="post" data-url="{{ route('crime.store') }}">Do crime</button>
<a href="{{ route('crime.index') }}" class="btn btn-danger">Change Crime</a>
@endisset
