<div class="card">
    <div class="card-header">
        {{ $title.' Course' ?? 'Course' }}

        @if(isset($sub_courses) || isset($course_display))
        <a class="float-right course" href="{{ route('course.index') }}">back to Education</a>
        @endif
    </div>
    <div class="card-body">

        @isset($course_list)
        <div class="row">
            @foreach ($course_list as $course)
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
        </div>
        @endisset

        @isset($sub_courses)
            <ul class="list-group">
            @foreach ($sub_courses as $sub_course)
                <li class="list-group-item {{ auth()->user()->doneCourse($sub_course->id) ? 'disabled' : '' }}" data-id="{{ $sub_course->id }}">
                    <a href="{{ route('course.show',$sub_course->id) }}" class="course">
                    {{ $sub_course->name }}
                    </a>
                    @if(auth()->user()->doneCourse($sub_course->id))
                    <span class="badge badge-success">Completed</span>
                    @endif
                </li>
            @endforeach
            </ul>
        @endisset

        @isset($course_display)
            <form class="joinCourse" action="{{ route('course.store') }}" method="POST">
            <p class="card-text">{{ $course->description }}</p>
            <p class="card-text">{{ $course->duration }}</p>
            <input name="courseId" type="hidden" value="{{ $course->id }}">
            <button class="btn btn-primary">join</button>
            </form>
        @endisset
    </div>
</div>
