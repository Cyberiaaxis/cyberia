@extends('layouts.master') @section('title') {{ $forum->name }} @endsection @section('header_btn')

<a class="btn btn-dark btn-shadow" href="{{ route('thread.create',$forum->id)}}">
    Create new thread
</a> @endsection @section('content')
<nav class="bg-white border-bottom" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forums</li>
        </ol>
    </div>
</nav>
<section class="pt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-dashed mb-5">
                    <tbody>
                        <thead>
                            <tr>
                                <th class="d-none d-md-table-cell" style="width: 5%;" scope="col"></th>
                                <th scope="col">Forum</th>
                                <th class="text-center" style="width: 5%" scope="col">Topics</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 5%" scope="col">Replies</th>
                                <th class="d-none d-lg-table-cell" style="width: 25%" scope="col">Latest Topic</th>
                            </tr>
                        </thead>
                        @foreach ($forum->threads as $thread) {{--
                        <h6 class="table-title">{{ $forum->name }}</h6> --}}
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fa fa-comments"></i></td>
                            <td>
                                <h6 class="table-title"><a href="{{ route('thread.show',[$forum->id,$thread->id]) }}">{{ $thread->title }}</a></h6>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
