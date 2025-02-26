@extends('layouts.app')

@section('content')
<div class="container">
    <h1>مدیریت محصولات</h1>
    <a href="#" class="btn btn-primary mb-3">افزودن محصول جدید</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>موجودی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} تومان</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">ویرایش</a>
                    <a href="#" class="btn btn-danger btn-sm">حذف</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
