@extends('layouts.app')

@section('title', $product->name . ' - Hany Shop')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @foreach($product->images as $image)
                <img src="{{ $image }}" class="img-fluid mb-3" alt="{{ $product->name }}">
            @endforeach
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">${{ $product->price }}</p>
            <p>{!! $product->description !!}</p>
            <a href="#" class="btn btn-success">Add to Cart</a>
        </div>
    </div>
    <hr>
    <h3>Comments</h3>
    @foreach($product->comments as $comment)
        <div class="mb-3">
            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
        </div>
    @endforeach
    <form method="POST" action="{{ url('/product/' . $product->id . '/comment') }}">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" placeholder="Write a comment..." rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
