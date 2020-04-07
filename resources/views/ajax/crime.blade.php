
@isset($crimes)
<ul class="list-group crime accordion">
    <li class="list-group">
        <span class="head text-white p-1">Crimes</span>
    </li>
    sdfgdfhfghgfjghjhgjghjghjg
    @foreach($crimes as $crime) @empty($crime->parent_id)
    <li class="list-group-item d-flex border border-dark list-group-item-action"> &nbsp;
        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img "> &nbsp;
        <span class="border border-dark text-justify">
            {{ $crime->name ?? 'hue' }}
            &nbsp;
            </span>
        <span class="border border-dark text-justify"> &nbsp;
            -{{ $crime->nerve ?? 1 }} Nerve
            </span>
        <input class="m-auto crimeId" type="radio" name="exampleRadios" id="exampleRadios1" value="{{ $crime->id ?? 1 }}" data-toggle="collapse" href="#collapseExample{{ $crime->id }}"> @endempty @if($crime->id == $crime->parent_id)
        <div class="collapse" id="collapseExample{{ $crime->parent_id }}" data-parent=".crime">
            <div class="list-group-item d-flex border border-success list-group-item-action">
                <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" class="fluid-img img "> &nbsp;
                <span class="border border-dark text-justify">
          {{ $crime->name ?? 'hue' }}
          &nbsp;
          </span>
                <span class="border border-dark text-justify"> &nbsp;
          -{{ $crime->nerve ?? 1 }} Nerve
          </span>
                <input class="m-auto crimeId" type="radio" name="exampleRadios" id="exampleRadios1" value="{{ $crime->id ?? 1 }}">
            </div>
        </div>
        @endif @empty($crime->parent_id)
    </li>
    @endempty @endforeach
</ul>
@endisset
NItin Sharma
