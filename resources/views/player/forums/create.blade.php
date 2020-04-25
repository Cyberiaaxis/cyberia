@extends('layouts.master')
@section('content')
<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center py-3">
                    <h2 class="text-white mb-0 mr-auto">Forums</h2></div>
            </div>
        </div>
    </div>
</section>
<nav class="bg-white border-bottom" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forums</li>
        </ol>
    </div>
</nav>
<div class="container">
    <div class="row">
         <form method="post" action="{{ route('thread.store', $forum->id) }}">
            @csrf
            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection
