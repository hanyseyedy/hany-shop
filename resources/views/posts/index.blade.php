@extends('layouts.app')

@section('content')
<div class="container">
    <h1>بلاگ</h1>
    @foreach($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">ادامه مطلب</a>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection
