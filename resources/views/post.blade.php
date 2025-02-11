@extends('layouts.app')

@section('title', $post->title . ' - Hany Shop')

@section('content')
    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->image }}" class="img-fluid mb-3" alt="{{ $post->title }}">
    <p>{!! $post->content !!}</p>
    <hr>
    <h3>Comments</h3>
    @foreach($post->comments as $comment)
        <div class="mb-3">
            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
        </div>
    @endforeach
    <form method="POST" action="{{ url('/post/' . $post->id . '/comment') }}">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
