@foreach ($courses as $course)
{{$course->id}}
<div class="row">
    <div class="card col mr-2">
        <p class="card-text">Course</p>
        <img class="card-img-top course rounded" src="{{ asset('img/city.jpg') }}" alt="Card image cap" value="{{ $course->id }}" data-url="{{ route('course.show',$course->id) }}"  data-method ="post" />
        <div class="card-body">
            <p class="card-text">Course details ke liye click kardena</p>
        </div>
    </div>
@endforeach

</div>
