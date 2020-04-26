@extends('layouts.master')

@section('title')

<a href="{{ route('forums.show', $forum->id) }}"> {{ $forum->name }}</a> - {{ $thread->title }}

@isset($post_list)
{{ $post_list->links() }}
@endisset
@endsection

@section('content')
<div class="post-list mt-3">
@isset($post_list)
@foreach ($post_list as $post)
@if($post->is_topic)
<div class="card mb-3 thread-{{ $thread->id }}">
  <div class="row no-gutters">
    <div class="col-md-2 text-center">
        <img src="{{ asset('img/contact/1.jpg') }}" alt="{{ $post->poster }}" class="img-fluid rounded-circle">
        <div class="user-info list-group">
        <div class="list-group-item p-1">{{ $post->user->userdetails->level }}</div>
            <div class="list-group-item p-1">{{ $post->poster }}</div>
        </div>
    </div>
    <div class="col">
      <div class="card-body">
        <h5 class="card-title">{{ $thread->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>
      </div>
    </div>
  </div>
    <div class="card-footer offset-2 col-md-10">
        Posted on : {{ $post->created_at }}
    </div>
</div>
@else
<div class="card mb-3 post-{{ $post->id }}">
  <div class="row no-gutters">
    <div class="col-md-2 text-center">
        <img src="{{ asset('img/contact/1.jpg') }}" alt="{{ $post->poster }}" class="img-fluid rounded-circle">
        <div class="user-info list-group">
            <div class="list-group-item p-1">Name: {{ $post->poster }}</div>
            <div class="list-group-item p-1">Level :  {{ $post->user->userdetails->level->name  }}</div>
            <div class="list-group-item p-1">Post :{{  $post->user->total_posts }}</div>
            <div class="list-group-item p-1">Rank {{ $post->user->userdetails->rank->name }}</div>
            <div class="list-group-item p-1">Last Seen {{ $post->user->last_seen->diffInMinutes( now()) }}</div>
        </div>
    </div>
    <div class="col-md-10">
      <div class="card-body">
        @if($post->subject)
        <h5 class="card-title">{{ $post->subject }}</h5>
        @endif
        <p class="card-text">{{ $post->content }}</p>
      </div>
    </div>
  </div>
    <div class="card-footer offset-2 col-md-10">
        <div class="posted">Posted on : {{ $post->created_at }}</div>

        <div class="ml-auto">
            <a href="#" class="btn btn-sm btn-outline-primary">Reply</a>
        </div>

    </div>
</div>
@endif
@endforeach
    <div class="card">
        <div class="card-header">Post new Reply</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="message" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post reply</button>
            </form>
        </div>
    </div>
</div>
@endisset
</div>
@endsection
