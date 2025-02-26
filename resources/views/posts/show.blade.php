@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <hr>
    
    <h3>نظرات کاربران</h3>
    @foreach($post->comments as $comment)
        <div class="mb-3 p-2 border rounded">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
        </div>
    @endforeach

    @auth
    <form action="{{ route('comments.store', ['type' => 'post', 'id' => $post->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="3" placeholder="نظر خود را بنویسید..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ارسال نظر</button>
    </form>
    @else
    <p>برای ارسال نظر، لطفاً <a href="{{ route('login') }}">وارد شوید</a>.</p>
    @endauth

</div>
@endsection
