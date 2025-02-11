@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
    <h1>Manage Products</h1>
    <a href="{{ url('/admin/products/create') }}" class="btn btn-success mb-3">Add New Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/admin/products/' . $product->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
