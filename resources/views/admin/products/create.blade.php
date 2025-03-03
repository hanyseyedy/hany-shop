@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>افزودن محصول</h1>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">نام محصول</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description">توضیحات:</label>
            <textarea name="description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">قیمت</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">موجودی</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">ثبت</button>
    </form>
</div>
@endsection
