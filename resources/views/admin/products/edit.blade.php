@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ویرایش محصول</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name">نام محصول:</label>
            <input type="text" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description">توضیحات:</label>
            <textarea name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price">قیمت:</label>
            <input type="number" name="price" required>
        </div>
        <div class="mb-3">
            <label for="stock">موجودی:</label>
            <input type="number" name="stock" required>
        </div>
        <div class="mb-3">
            <label for="images">تصاویر محصول:</label>
            <input type="file" name="images[]" multiple>
        </div>
        <button type="submit">ویرایش محصول</button>
    </form>
</div>
@endsection
