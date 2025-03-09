@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>افزودن محصول</h1>
    <!-- <form action="{{ route('admin.products.store') }}" method="POST">
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
    </form> -->

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
        <button type="submit">ثبت محصول</button>
    </form>

</div>
@endsection
