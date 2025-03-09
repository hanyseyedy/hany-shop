@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    @foreach($product->images as $image)
        <img src="{{ asset('storage/' . $image->image_path) }}" alt="تصویر محصول" width="150">
    @endforeach

    <p>قیمت: {{ number_format($product->price) }} تومان</p>
    <p>موجودی: {{ $product->stock }}</p>
    <p>{{ $product->description }}</p>

    <hr>
    <h3>نظرات کاربران</h3>
    @foreach($product->comments as $comment)
        <div class="mb-3 p-2 border rounded">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
        </div>
    @endforeach

    @auth
    <form action="{{ route('comments.store', ['type' => 'product', 'id' => $product->id]) }}" method="POST">
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
