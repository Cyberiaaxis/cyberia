@extends('layouts.master')
 @section('content')
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
                @foreach ($forums as $forum)
                @if($forum->is_category)
                 <h6 class="table-title">{{ $forum->name }}</h6>
                <table class="table table-bordered table-dashed mb-5">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell" style="width: 5%;" scope="col"></th>
                            <th scope="col">Forum</th>
                            <th class="text-center" style="width: 5%" scope="col">Topics</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 5%" scope="col">Replies</th>
                            <th class="d-none d-lg-table-cell" style="width: 25%" scope="col">Latest Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                    @endif
                    @empty($forum->is_category)
                        <tr>
                            <td class="d-none d-md-table-cell table-icon"><i class="fa fa-comments"></i></td>
                            <td>
                                <h6 class="table-title"><a href="{{ route('forums.show',$forum->id) }}">{{ $forum->name }}</a></h6>
                                <p class="table-text">{{ $forum->description }}.</p>
                            </td>
                            <td class="text-center">{{ $forum->threads_count }}</td>
                            <td class="d-none d-sm-table-cell text-center">{{ $forum->posts_count }}</td>
                            <td class="d-none d-lg-table-cell">
                                <a class="table-subtitle" href="#">{{ $forum->latestPost->content  ?? '' }}</a>
                                <div class="table-meta"><a href="#">{{ $forum->latestPost->poster ?? '' }}</a> on {{ $forum->latestPost->created_at ?? '' }}</div>
                            </td>
                        </tr>
                    @endempty
                @if ($forum->is_category)
                     </tbody>
                </table>
                @endif

                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
