@extends('layouts.app')

@section('content')
<div class="container">
    <h1>محصولات</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">قیمت: {{ number_format($product->price) }} تومان</p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">مشاهده</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
@endsection
