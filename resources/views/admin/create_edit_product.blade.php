@extends('layouts.admin')

@section('title', isset($product) ? 'Edit Product' : 'Create Product')

@section('content')
    <h1>{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h1>
    <form action="{{ isset($product) ? url('/admin/products/' . $product->id) : url('/admin/products') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price ?? '' }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ $product->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            @if(isset($product->images))
                <div class="mt-3">
                    @foreach($product->images as $image)
                        <img src="{{ $image }}" alt="" class="img-thumbnail" width="100">
                    @endforeach
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
