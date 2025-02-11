@extends('layouts.app')

@section('title', 'Home - Hany Shop')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Latest Posts</h2>
            @foreach($posts as $post)
                <div class="card mb-3">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                        <a href="{{ url('/post/' . $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <h2>Latest Products</h2>
            @foreach($products as $product)
                <div class="card mb-3">
                    <img src="{{ $product->images[0] ?? '' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                        <a href="{{ url('/product/' . $product->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
