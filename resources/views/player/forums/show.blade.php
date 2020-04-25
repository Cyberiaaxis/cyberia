@extends('layouts.master')

@section('title')
{{ $forum->name }}
@endsection

@section('header_btn')
@empty($forum->is_category)

<a class="btn btn-dark btn-shadow" href="{{ route('thread.create',$forum->id)}}">
    Create new thread
</a>
@endempty
@endsection

@section('content')
<section class="pt-lg-5">
    <div class="container">
        <table class="table">
            @foreach ($forum->threads as $thread)
                {{ $thread }}
            @endforeach
        </table>

    </div>
</section>
@endsection
